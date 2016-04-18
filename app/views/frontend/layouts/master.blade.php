<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Blog</title>
        {{ HTML::style('common/css/bootstrap.min.css', array('rel' => 'stylesheet')) }}
        {{ HTML::style('frontend/css/clean-blog.min.css', array('rel' => 'stylesheet')) }}

        <!-- Custom Fonts -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        @include('frontend.includes.header')

        <!-- Main Content -->
        <div class="container">
            <div class="row">
                @yield('content')

            </div>
        </div>

        <hr>

        @include('frontend.includes.footer')

        {{ HTML::script('common/js/jquery-1.11.2.min.js') }}
        {{ HTML::script('common/bootstrap/js/bootstrap.min.js') }}
        {{ HTML::script('frontend/js/clean-blog.min.js') }}
    </body>

</html>