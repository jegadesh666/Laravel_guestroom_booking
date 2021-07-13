<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\owner;
use App\Models\booking;

class Home extends Controller
{


    //view for mainpage and show the all users availabe room
     function show()
    {

        $ownerdata=owner::all();
        $count=owner::all()->where('status','=','Available')->count();
        return view('/Home/Main',['user'=>$ownerdata,'count'=>$count]);
    }

    //view for house owner dasboard and show house owners created room
    function houseowner(){

        $userid=Session('loggeduser');
        $userdata=customer::where('id','=',$userid)->first();

        $ownerdata=owner::all()->where('email','=',$userdata->email);
        return view('/Home/Houseowner/Houseowners',['ownerdata'=>$ownerdata]);
    }

    //view for house owners create new room

    function rooms(){
        return view('/Home/Houseowner/rooms');
    }

    //view for save house owners newly created room detials in OWNERS database
    function save(Request $request){

       $request->validate([
            'name'=>'required',
            'location'=>'required',
            'room'=>'required',
            'minbooking'=>'required',
            'maxbooking'=>'required',
            'floor'=>'required',
            'bhk'=>'required',
            'wifi'=>'required',
            'roomsfor'=>'required',
            'price'=>'required',
            'image'=>'required | mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName=Session('loggeduser').'-'.time().'.'.$request->image->extension();
        $request->image->move(public_path('Images'),$newImageName);
     

        $userid=Session('loggeduser');
        $userdata=customer::where('id','=',$userid)->first();


        

        $owner =new owner;
        $owner->email=$userdata->email;
        $owner->name=$request->name;
        $owner->location=$request->location;
        $owner->room=$request->room;
        $owner->min_booking=$request->minbooking;
        $owner->max_booking=$request->maxbooking;
        $owner->floor=$request->floor;
        $owner->bhk=$request->bhk;
        $owner->wifi=$request->wifi;
        $owner->roomsfor=$request->roomsfor;
        $owner->price=$request->price;
        $owner->image_path=$newImageName;
        $result=$owner->save();
         

        if($result){
           return  redirect('Home/Houseowner');
        }else{
            return back()->with('failed','Failed somthing went wrong');
        }

        
    }


    //view for edit house owners rooms
    function edit($id){

       $owner= owner::find($id);
        return view('Home/Houseowner/Edit/Edit',['ownerdata'=>$owner]);
    }
//view for update a new data in owners data base
    function update(request $request,$id){

        $request->validate([
            'name'=>'required',
            'location'=>'required',
            'room'=>'required',
            'minbooking'=>'required',
            'maxbooking'=>'required',
            'floor'=>'required',
            'bhk'=>'required',
            'wifi'=>'required',
            'roomsfor'=>'required',
            'price'=>'required',
            'image'=>'required | mimes:jpg,png,jpeg|max:5048'
        ]);


       
           
        $owner=owner::find($id);
        $owner->name=$request->name;
        $owner->location=$request->location;
        $owner->room=$request->room;
        $owner->min_booking=$request->minbooking;
        $owner->max_booking=$request->maxbooking;
        $owner->floor=$request->floor;
        $owner->bhk=$request->bhk;
        $owner->wifi=$request->wifi;
        $owner->roomsfor=$request->roomsfor;
        $owner->price=$request->price;

if($request->image){


    $desti='Images/'.$owner->image_path;

    if(File::exists($desti)){
        File::delete($desti);
    }
    $newImageName=Session('loggeduser').'-'.time().'.'.$request->image->extension();
    $request->image->move(public_path('Images'),$newImageName);
    $owner->image_path=$newImageName;
       
}

$result=$owner->update();
 
if($result){
    return  redirect('Home/Houseowner');
 }else{
     return back()->with('failed','Failed somthing went wrong');
 }

        



    }


    //view for delete house owners rooms

    function delete($id){
        $data=owner::find($id);
        $data->delete();

      return  redirect('Home/Houseowner');


    }


//view for users click the booknow button and go to confirm booking page
    function confirm($id){

        $data=owner::find($id);

        return view('/Home/confirm',['ownerdata'=>$data]);

    }

//view for users book room and verify
    function booking(request $request){


        $request->validate([
            'fromdate'=>'required',
            'todate'=>'required',
            'booking_id'=>'required|unique:bookings'
        ]);
        //check day diffrence between from and to date
        $fromdate=$request->fromdate;
        $todate=$request->todate;
        $date1=date_create($fromdate);
        $date2=date_create($todate);

        $date_di=date_diff($date1,$date2);
        $date_difference=$date_di->format('%R%a');

        
        //%a diiference days
        //%R enable negative or positive values
       $ownerid=$request->booking_id;

      

       $ownerdata=owner::find($ownerid);

       $minbooking=$ownerdata->min_booking;
       $maxbooking=$ownerdata->max_booking;

      
       if($date_difference<$minbooking or $date_difference> $maxbooking){
        return back()->with('failed','check min and max date for booking');
       }else{

       
        $userid=Session('loggeduser');
        $userdata=customer::where('id','=',$userid)->first();
        
        $fromdate=$request->fromdate;
        $todate=$request->todate;
        $ownerid=$request->booking_id;
        $useremail=$userdata->email;

        $total_price=$date_difference* $ownerdata->price;
       
        $bookings=new booking;
        $bookings->email=$useremail;
        $bookings->booking_id=$ownerid;
        $bookings->from_date=$fromdate;
        $bookings->to_date=$todate;
        $bookings->total_price=$total_price;
       $result= $bookings->save();


       if(!$result){
           return back()->with('failed','Booking failred try again!');
       }else{
           
        $owner =owner::find($ownerid);
        $owner->status='Booked';
       $final_result= $owner->update();

       if(!$final_result){
        return back()->with('failed','Data Not Updated in booked!');

       }

       return redirect('/Home');
        
       }

       }   
    }


    //view for manage user booking detials in mybooking dashboard
    function mybooking(){
        $userid=Session('loggeduser');
        $userdata=customer::find($userid);

        $user_email=$userdata->email;
        $booking_data=booking::all()->where('email','=',$user_email);

     $ownerid=$booking_data[0]->booking_id;
      $ownerdata=owner::find($ownerid);
       return view('/Home/Customers/mybooking',['booking_data'=>$booking_data,'owner_data'=>$ownerdata]);
    }


    //view for logout the application and reset session
    function logout(){
        if(Session()->has('loggeduser')){

            Session()->pull('loggeduser');
           return redirect('/login');
        }
    }
}
