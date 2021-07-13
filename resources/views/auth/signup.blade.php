<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Signup-page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/auth.css" />
</head>

<body>

    <!-- navbar section -->
    <div class="container-fluid">

        @include('navbar.header')


    </div>


    <!-- user signup section -->
    <div class="container mb-5">

        <div class="row d-flex justify-content-center main">

            <div class="col-sm-10 col-md-7 col-lg-6">
                <form class="form w-100" action="{{Route('saved')}}" method="POST">
                    @csrf

                    <h3 class="text-center">SIGNUP</h3>
                    @if(Session::get('success')) <h5 class="text-success text-center">{{session::get('success')}}</h5> @endif
                    @if(Session::get('failed')) <h5 class="text-danger text-center">{{session::get('failed')}}</h5> @endif
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        <span class="text-danger">@error('name'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" id="Email" name="email" placeholder="Enter your email">
                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="phone">Mobile Number</label>
                        <input type="number" class="form-control" id="phone" name="mobile"
                            placeholder="Enter your mobile number">
                            <span class="text-danger">@error('mobile'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" name="password" id="Password"
                            placeholder="Enter new Password">
                            <span class="text-danger">@error('password'){{$message}} @enderror</span>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                    <h5 class="mt-2">Already have an account <a href="{{ Route('auth.login') }}">Login</a></h5>
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
