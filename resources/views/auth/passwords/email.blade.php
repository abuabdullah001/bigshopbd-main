<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Recover password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ $settings->site_logo_footer }}">
    <!-- App css -->
    <link href="{{ asset('/backend/') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/backend/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/backend/') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" />
</head>

<body id="body" class="auth-page" style="background-image: url('/backend/assets/images/p-1.png'); background-size: cover; background-position: center center;">
    <!-- Log In page -->
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 auth-header-box bg-dark">
                                <div class="text-center p-3">
                                    <a href="{{ route('dashboard') }}" class="logo logo-admin">
                                        <img src="{{ $settings->site_logo_footer }}" height="50" alt="logo" class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Reset Password For {{ config('app.name') }}</h4>   
                                    <p class="text-muted mb-0" style="color: lightblue !important;">Enter your Email and instructions will be sent to you!</p>  
                                </div>
                            </div>
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <div class="card-body pt-0">
                                <form class="my-4" action="{{ route('password.email') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Enter Email Address" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!--end form-group--> 

                                    <div class="form-group mb-0 row">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Reset <i class="fas fa-sign-in-alt ms-1"></i></button>
                                        </div><!--end col--> 
                                    </div> <!--end form-group-->                           
                                </form><!--end form-->
                                <div class="text-center text-muted">
                                    <p class="mb-1">Remember It ?  <a href="{{ route('dashboard') }}" class="text-primary ms-2">Sign in here</a></p>
                                </div>
                            </div><!--end card-body-->
                            <div class="card-body bg-light-alt text-center">
                                &copy; <script>
                                    document.write(new Date().getFullYear())
                                </script> {{ config('app.name') }}
                            </div>
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <!-- vendor js -->
    
    <script src="{{ asset('/backend/') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/backend/') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('/backend/') }}/assets/libs/feather-icons/feather.min.js"></script>
    <!-- App js -->
    <script src="{{ asset('/backend/') }}/assets/js/app.js"></script>  
</body>
</html>