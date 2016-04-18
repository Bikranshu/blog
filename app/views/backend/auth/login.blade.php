<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        {{ HTML::style('common/css/bootstrap.min.css', array('rel' => 'stylesheet')) }}
        {{ HTML::style('backend/css/AdminLTE.min.css', array('rel' => 'stylesheet')) }}
        {{ HTML::style('backend/css/style.css', array('rel' => 'stylesheet')) }}

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-box-body">
                <h2>Login</h2>
                @if ($errors->has('login'))
                <div class="alert alert-error">{{ $errors->first('login', ':message') }}</div>
                @endif
                {{ Form::open(['url' => 'auth/login', 'role' => 'form']) }}
                <div class="form-group has-feedback">
                    {{ Form::text('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'])}}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        {{ Form::submit('Sign In', ['class' => 'btn btn-primary btn-block btn-flat']) }}

                    </div><!-- /.col -->
                </div>
                {{ Form::close() }}
            </div>
        </div>

        {{ HTML::script("common/js/jquery-1.11.2.min.js") }} 
        {{ HTML::script("common/bootstrap/js/bootstrap.min.js") }}
    </body>
</html>