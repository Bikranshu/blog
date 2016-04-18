<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin| Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


        {{ HTML::style('common/css/bootstrap.min.css', array('rel' => 'stylesheet')) }}
        {{ HTML::style('backend/css/ionicons.min.css', array('rel' => 'stylesheet')) }}
        {{ HTML::style('backend/css/AdminLTE.min.css', array('rel' => 'stylesheet')) }}
        {{ HTML::style('backend/css/jquery-ui.css', array('rel' => 'stylesheet')) }}
        {{ HTML::style('backend/css/skins/_all-skins.min.css', array('rel' => 'stylesheet')) }}
        {{ HTML::style('backend/js/plugins/datatables/dataTables.bootstrap.css', array('rel' => 'stylesheet')) }}
        {{ HTML::style('backend/css/style.css', array('rel' => 'stylesheet')) }}
        {{ HTML::style('backend/css/icon.css', array('rel' => 'stylesheet')) }}

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('backend.includes.header')
            @include('backend.includes.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('page-header')
                    <ol class="breadcrumb">
                        @yield('breadcrumbs')
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            @include('backend.includes.footer')

        </div><!-- ./wrapper -->

        {{  HTML::script("common/js/jquery-1.11.2.min.js") }}  
        {{  HTML::script("common/bootstrap/js/bootstrap.min.js") }}
        {{  HTML::script("backend/js/theme/app.min.js") }}

        {{  HTML::script("backend/js/plugins/jQueryUI/jquery-ui.min.js") }}
        {{  HTML::script("backend/js/plugins/datatables/jquery.dataTables.min.js") }}
        {{  HTML::script("backend/js/plugins/datatables/dataTables.bootstrap.min.js") }}
        {{  HTML::script("backend/js/tinymce/tinymce.min.js") }}
        {{  HTML::script("common/js/jquery.validate.min.js") }}  
        {{  HTML::script("backend/js/utils/common.js") }}
        {{  HTML::script("backend/js/post/post.js") }}
        {{  HTML::script("backend/js/post/postList.js") }}
        {{  HTML::script("backend/js/utils/tinyImpl.js") }}
    </body>
</html>