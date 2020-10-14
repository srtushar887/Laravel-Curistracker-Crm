<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset($gn->icon)}}">

    <!-- App css -->
    <link href="{{asset('assets/dashboard/pages/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('assets/dashboard/pages/')}}/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{asset('assets/dashboard/pages/')}}/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="{{asset('assets/dashboard/pages/')}}/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="{{asset('assets/dashboard/pages/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="auth-fluid-pages loading pb-0" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>


<div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>

<div class="auth-fluid" style="background-image: url('{{asset($gn->login_page_image)}}');">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div>
            <div class="card-body">

                <!-- Logo -->
                <div class="auth-brand text-center">
                    <div class="auth-logo">
                        <a href="index.html" class="logo auth-logo-dark">
                                    <span class="logo-lg">
                                        <img src="{{asset($gn->logo)}}" alt="" height="26">
                                    </span>
                        </a>

                        <a href="index.html" class="logo auth-logo-light">
                                    <span class="logo-lg">
                                        <img src="{{asset($gn->logo)}}" alt="" height="26">
                                    </span>
                        </a>
                    </div>
                </div>

                <!-- title-->
                <div class="text-center pt-3">
                    <h4 class="mt-0">Sign In</h4>
                    <p class="text-muted mb-4">Enter your email address and password to access account.</p>
                </div>

                <!-- form -->
                <form action="{{route('super.admin.login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="emailaddress">Email address</label>
                        <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <a href="pages-recoverpw.html" class="text-muted float-right"><small>Forgot your password?</small></a>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                    </div>

                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-primary btn-block" type="submit">Log In </button>
                    </div>

                </form>
                <!-- end form-->

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <?php
                        $date = \Carbon\Carbon::now()->format('Y');
                    ?>
                    <p class="text-muted">{{$date}} &copy; {{$gn->site_name}}</p>
                </footer>

            </div> <!-- end .card-body -->
        </div>
    </div>
    <!-- end auth-fluid-form-box-->

</div>
<!-- end auth-fluid-->

<!-- Vendor js -->
<script src="{{asset('assets/dashboard/pages/')}}/js/vendor.min.js"></script>

<!-- App js -->
<script src="{{asset('assets/dashboard/pages/')}}/js/app.min.js"></script>

</body>

</html>
