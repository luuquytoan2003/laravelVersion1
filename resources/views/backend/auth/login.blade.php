<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LARAVEL</title>

    <link href="backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="backend/css/animate.css" rel="stylesheet">
    <link href="backend/css/style.css" rel="stylesheet">
    <link href="backend/css/customize.css" rel="stylesheet">


</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Welcome to Dashboard</h3>
            <p>This is Toan's page dashboard</p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="email"
                        value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="error-message">* {{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password"
                        value="{{ old('password') }}">
                    @if ($errors->has('password'))
                        <span class="error-message">* {{ $errors->first('password') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">
                    Login
                </button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2024</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
