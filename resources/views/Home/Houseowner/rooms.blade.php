<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/rooms.css" />
</head>
<body>

<div class="container-fluid">
    @include('/Home/Houseowner/navbar/navrooms')
</div>

<h3 class="text-center text-primary rooms-heading">CREATE NEW ROOMS</h3>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-10 col-md-5">


            <form  action="{{Route('Rooms.save')}}" class="room-form"  method="POST" enctype="multipart/form-data">
                
                @csrf
                @if(Session::get('failed')) <h5 class="text-danger text-center">{{session::get('failed')}}</h5> @endif
                <div class="form-row">
                    <div class="col">
                        <label for="house-name">House Name</label>
                        <input type="text" class="w-100"  id="house-name" name="name" placeholder="Enter your house Name">
                        <span class="text-danger">@error('name'){{$message}} @enderror</span>
                    </div>
                </div>

                <div class="form-row mt-2">
                    <div class="col">
                        <label for="house-location">House Location</label>
                        <input type="text" class="w-100" id="house-location" name="location" placeholder="Enter your house Location">
                        <span class="text-danger">@error('location'){{$message}} @enderror</span>
                        
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="room-no">Room No</label>
                        <input type="text" class="w-100" id="room-no" name="room" placeholder="Enter your Room No">
                        <span class="text-danger">@error('room'){{$message}} @enderror</span>
                       
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="Minimum booking day">Minimum booking day</label>
                        <input type="text" class="w-100" id="Minimum booking day" name="minbooking" placeholder="Enter  Minimum booking day">
                        <span class="text-danger">@error('minbooking'){{$message}} @enderror</span>
                       
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="Maximum booking day">Maximum booking day</label>
                        <input type="text" class="w-100" id="Maximum booking day" name="maxbooking" placeholder="Enter  Maximum booking day">
                        <span class="text-danger">@error('maxbooking'){{$message}} @enderror</span>
                       
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col">
                        <label for="house-floor">House Floor</label>
                        <select class="custom-select" id="house-floor" name="floor" required>
                            
                            <option value="Ground">ground</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                          </select>
                          <span class="text-danger">@error('floor'){{$message}} @enderror</span>
                       
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col">
                        <label for="bhk">BHK</label>
                        <select class="custom-select" id="bhk" name="bhk" required>
                            
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                           
                          </select>
                          <span class="text-danger">@error('bhk'){{$message}} @enderror</span>
                       
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col">
                        <label for="wifi">Wifi Option</label>
                        <select class="custom-select" id="wifi" name="wifi" required>
                            
                            <option value="Available">Available</option>
                            <option value="Not-Available">Not-Available</option>
                            
                           
                          </select>
                          <span class="text-danger">@error('wifi'){{$message}} @enderror</span>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col">
                        <label for="roomsfor">Rooms for</label>
                        <select class="custom-select" id="roomsfor" name="roomsfor" required>
                            <option value="Family">Family</option> 
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        
                          </select>
                          <span class="text-danger">@error('roomsfor'){{$message}} @enderror</span>
                       
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="price">Price per day/inr</label>
                        <input type="text" class="w-100" id="price" name="price" placeholder="Enter price per day INR">
                        <span class="text-danger">@error('price'){{$message}} @enderror</span>
                       
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="images">Room Image</label>
                        <input type="file" class="w-100" id="images" name="image">
                        <span class="text-danger">@error('image'){{$message}} @enderror</span>
                       
                    </div>
                </div>
                <div class="form-check mt-3">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="" required>By click agree our <a href="user-agreement/user-agreement.php" target="_blank">terms</a> and <a href="user-agreement/user-agreement.php" target="_blank">condition.</a>
                    </label>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="submit" value="submit" name="signup-button" class="w-100 signup-button">
                    </div>
                </div>
                
               
            </form>

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
    
</body>
</html>