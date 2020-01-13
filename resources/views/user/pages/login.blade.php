<!DOCTYPE html>
<html lang="en">

<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>User Login</title>
    <meta name="description" content="Admin Template.">
    <meta name="author" content="Ruman Chowdhury">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link id="base-style" href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link id="base-style-responsive" href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->
    {{--    toaster bootstrap--}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="{{asset('admin/css/ie.css')}}" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="{{ asset('admin/css/ie9.css') }}" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.ico')}}">
    <!-- end: Favicon -->

    <style type="text/css">
        body { background: #66512c !important; }
    </style>



</head>

<body>
<div class="container-fluid-full">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a href="index.html"><i class="halflings-icon home"></i></a>
                    <a href="#"><i class="halflings-icon cog"></i></a>
                </div>
                <h2>
                    <strong>Login to your account</strong>
                </h2>
@include('message.error')
                <form class="form-horizontal" method="post" action="{{route('login')}}" >
                    {{csrf_field()}}
                    <fieldset>
                        <div class="input-prepend" title="Email">
                            <span class="add-on"><i class="halflings-icon user"></i></span>
                            <input class="input-large span10" name="email" id="username" type="email" placeholder="email" value="{{ old('email') }}"/>

                        </div>
                        <div class="clearfix"></div>


                        <div class="input-prepend" title="Password">
                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                            <input class="input-large span10" name="password" id="password" type="password" placeholder="password"/>

                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="clearfix"> </div>
                    </fieldset>
                </form>

                <hr>
                <h3>Forgot Password?</h3>
                <p>
                    <a href="#" class="text-primary"> <strong>Click here</strong> </a> to get a new password.
                </p>
            </div><!--/span-->
        </div><!--/row-->


    </div><!--/.fluid-container-->
</div><!--/fluid-row-->

<!-- start: JavaScript-->

<script src="{{asset('admin/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('admin/js/jquery-migrate-1.0.0.min.js')}}"></script>
<script src="{{asset('admin/js/jquery-ui-1.10.0.custom.min.js')}}"></script>

<script src="{{asset('admin/js/modernizr.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.cookie.js')}}"></script>

<script src="{{asset('admin/js/excanvas.js')}}"></script>
<script src="{{asset('admin/js/jquery.uniform.min.js')}}"></script>
<script src="{{asset('admin/js/custom.js')}}"></script>

{{--toaster js--}}
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<!-- end: JavaScript-->

</body>

</html>
