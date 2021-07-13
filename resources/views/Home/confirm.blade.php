<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .container {
            margin-top: 80px;
        }

    </style>

</head>

<body>

    <div class="container-fluid">
        @include('/Home/navbar/confirmheader')
    </div>

    <div class="container">
        <h3 class="text-center text-primary ">CONFIRM BOOKING</h3>
        @if(Session::get('failed')) <h5 class="text-danger text-center">{{session::get('failed')}}</h5> @endif
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-sm-8 col-md-5 d-flex justify-content-center align-items-center ">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('Images/' . $ownerdata->image_path) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"> <span class="text-success"><b>{{ $ownerdata->name }}</b></span> </h5>
                        <h6>Room No: <span class="text-primary">{{ $ownerdata->room }}</span></h6>
                        <h6>Room location:<span class="text-primary"> {{ $ownerdata->location }}</span></h6>
                        <h6>Price: <span class="text-primary">{{ $ownerdata->price }} Rs/day</span></h6>
                        <h6>Minimum booking day: <span class="text-primary">{{ $ownerdata->min_booking }} days</span>
                        </h6>
                        <h6>Maximum booking day: <span class="text-primary">{{ $ownerdata->max_booking }} days</span>
                        </h6>

                    </div>
                    <div class="card-body">
                        <form action="{{Route('booking')}}" method="POST">
                            @csrf

                            <input type="hidden"  name="booking_id" value="{{$ownerdata->id}}"  id="">
                            <span class="text-danger">@error('booking_id'){{$message}} @enderror</span>
                            <div class="form-group">
                                <label for="fromdate">From date</label>
                                <input type="date" class="form-control" id="fromdate" name="fromdate">
                                <span class="text-danger">@error('fromdate'){{$message}} @enderror</span>

                            </div>

                            <div class="form-group">
                                <label for="todate">To date</label>
                                <input type="date" class="form-control" id="todate" min="" name="todate">
                                <span class="text-danger">@error('todate'){{$message}} @enderror</span>

                            </div>

                            <input type="submit" value="Confirm" class="btn btn-success w-100">
                            <h6 class="text-center mt-2">  <a href="{{Route('Home.Main')}}" class="card-link text-danger">Cancel</a></h6>
                          

                        </form>

                    </div>
                   
                </div>
            </div>
        </div>
    </div>
















    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
<!-- Jquery for prevent past date in from and todate -->
    <script>
        $(Document).ready(function(){

            
                var dtToday=new Date();
                var month=dtToday.getMonth()+1;
                var day=dtToday.getDate();
                var year=dtToday.getFullYear();
                if(month<10){
                    month='0'+month.toString();
                }
                if(day<10){
                    day='0'+day.toString();
                }

                var maxdate=year+'-'+month+'-'+day;
                $('#fromdate,#todate').attr('min',maxdate);
        
        })
    </script>

</body>

</html>
