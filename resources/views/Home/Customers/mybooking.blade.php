<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mybookings</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/home.css" />
</head>

<body>

    <div class="container-fluid">
        @include('/Home/navbar/confirmheader')
    </div>

    <h3 class="text-center text-primary  home-heading">MY BOOKINGS</h3>

    <br /><br />


    @foreach ($booking_data as $booking)


        <div class="container-fluid ">
            <div class="row ">


                <div class="col-sm-12 col-md-3 mt-2 d-flex justify-content-center align-items-center ">



                    <div>
                        <img src="{{ asset('Images/' . $owner_data->image_path) }}" width="200px" height="200px"
                            class="img-fluid" alt="">
                    </div>



                </div>
                <div class="col-sm-12 col-md-3 mt-2 d-flex justify-content-center align-items-center">


                    <div>
                        <h4> House Name: <span class="text-primary">{{ $owner_data->name }}</span></h4>
                        <h4> Room no: <span class="text-primary">{{ $owner_data->room }}</span></h4>
                        <h4>Floor: <span class="text-primary">{{ $owner_data->floor }}</span></h4>
                        <h4>Price: <span class="text-primary">{{ $owner_data->price }} /day</span></h4>

                    </div>



                </div>
                <div class="col-sm-12 col-md-4 mt-2 d-flex justify-content-center align-items-center">

                    <div>
                        <h4> Total price: <span class="text-primary"> {{ $booking->total_price }} Rs </span></h4>
                        <h4>Checkin date: <span class="text-primary">{{ $booking->from_date }}</span></h4>
                        <h4>Checkout date: <span class="text-primary">{{ $booking->to_date }}</span></h4>

                    </div>
                </div>
                <div class="col-sm-12 col-md-2 mt-2 d-flex justify-content-center align-items-center">

                    <div>

                        <button class="btn btn-success"><a href="" style="color: white">Manage</a></button>

                    </div>
                </div>

            </div>




        </div>
        <br><br>


    @endforeach












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
