<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home-page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/home.css" />
</head>

<body>

    <div class="container-fluid">
        @include('/Home/navbar/header')
    </div>

    <h3 class="text-center text-primary  home-heading">AVAILABLE PG FOR BOOKINGS <span
            class="text-danger">({{ $count }})</span></h3>

    <br /><br />


    @foreach ($user as $item)


        <div class="container-fluid ">
            <div class="row ">


                <div class="col-sm-12 col-md-3 mt-2 d-flex justify-content-center align-items-center ">

                    <div>
                        <img src="{{ asset('Images/' . $item->image_path) }}" width="200px" height="200px"
                            class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 mt-2 d-flex justify-content-center align-items-center">

                    <div>
                        <h4> House Name: <span class="text-primary">{{ $item->name }}</span></h4>
                        <h4>Floor: <span class="text-primary">{{ $item->floor }}</span></h4>
                        <h4>price/day: <span class="text-primary">{{ $item->price }} Rs</span></h4>
                        <h4>Status: <span class="text-success">{{ $item->status }}</span> </h4>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mt-2 d-flex justify-content-center align-items-center">

                    <div>
                        <h4> Loation: <span class="text-primary"> {{ $item->location }} </span></h4>
                        <h4>BHK: <span class="text-primary">{{ $item->bhk }}</span></h4>
                        <h4>Roomsfor: <span class="text-primary">{{ $item->roomsfor }}</span></h4>
                        <h4>Wifi: <span class="text-primary">{{ $item->wifi }} </span></h4>



                    </div>
                </div>
                <div class="col-sm-12 col-md-2 mt-2 d-flex justify-content-center align-items-center">

                    <div>

                        <button class="btn btn-success"><a href="{{url('confirm/'.$item->id)}}" style="color: white">BOOK NOW</a></button>

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
