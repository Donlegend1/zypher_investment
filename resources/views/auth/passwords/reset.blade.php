
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zypher Assets Limited</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/odometer.css">
    <link rel="stylesheet" href="/css/nice-select.css">
    <link rel="stylesheet" href="/css/owl.min.css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/flaticon.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="shortcut icon" href="/icon-removebg-preview.png" type="image/x-icon">
</head>

<body>
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <!--============= Password Reset Section Starts Here =============-->
    <div class="account-section bg_img" data-background="/images/account-bg.jpg">
        <div class="container">
            <div class="account-title text-center">
                <a href="/" class="back-home"><i class="fas fa-angle-left"></i><span>Back <span class="d-none d-sm-inline-block">To Zypher Assets</span></span></a>
                <a href="#0" class="logo">
                    <img src="/default-removebg-preview.png" alt="logo">
                </a>
            </div>
            <div class="account-wrapper">
                <div class="account-body">
                    <h4 class="title mb-20">Reset Your Password</h4>

                    <!-- Display session status messages -->
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="account-form" method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="mb-2 mt-2">Reset Password</button>
                        </div>
                    </form>
                </div>
                <div class="or">
                    <span>OR</span>
                </div>
                <div class="account-header pb-0">
                    <span class="d-block mb-30 mt-2">Sign up with your work email</span>
                    <a href="#0" class="sign-in-with"><img src="/images/icon/google.png" alt="icon"><span>Sign Up with Google</span></a>
                    <span class="d-block mt-15">Don't have an account? <a href="sign-up.html">Sign Up Here</a></span>
                </div>
            </div>
        </div>
    </div>
    <!--============= Password Reset Section Ends Here =============-->

    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/modernizr-3.6.0.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/magnific-popup.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/wow.min.js"></script>
    <script src="/js/odometer.min.js"></script>
    <script src="/js/viewport.jquery.js"></script>
    <script src="/js/nice-select.js"></script>
    <script src="/js/owl.min.js"></script>
    <script src="/js/paroller.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>

