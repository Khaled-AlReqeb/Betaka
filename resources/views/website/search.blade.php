<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="ar"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="ar"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ar" dir="rtl"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>التحقق</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- App favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{url('/')}}/assets/website/assets/images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{url('/')}}/assets/website/assets/images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{url('/')}}/assets/website/assets/images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('/')}}/assets/website/assets/images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{url('/')}}/assets/website/assets/images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{url('/')}}/assets/website/assets/images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{url('/')}}/assets/website/assets/images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{url('/')}}/assets/website/assets/images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('/')}}/assets/website/assets/images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{url('/')}}/assets/website/assets/images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('/')}}/assets/website/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{url('/')}}/assets/website/assets/images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/')}}/assets/website/assets/images/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{url('/')}}/assets/website/assets/images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- App Css -->
    <link rel="stylesheet" href="{{url('/')}}/assets/website/assets/css/app.css">
    <!-- Arabic Font -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <!-- Englesh Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
</head>
<body>
@include('website.layout.nav')

<section id="auth_login">
    <div class="container align-items-center justify-content-center">
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-12 col-sm-10 col-md-10 col-lg-8 col-xl-8">
            <div class="table-responsive">
                    <table id="opened-Auctions" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th>
                                User Name
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td class="td-w"> <a href="#"> {{ $user->name }}</a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <ul class="pagination right-align m-t-15" style="margin-right: 500px">
                        <li class="page-item" style="color: white">
                            {!! $users->links() !!}
                        </li>
                    </ul>
                </div>
                <div class="bg-light text-center rounded-lg p-4 d-flex align-items-center justify-content-center flex-column">
                    <a href="{{ url('/website') }}" title="#" class="d-block rounded-pill px-4 py-1 link_button text-white h6 mb-0">رجوع</a>
                </div><!-- bg-light  -->
                </div><!-- col  -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- auth_login -->


@include('website.layout.footer')

<!--[if lt IE 8 ]>
<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

<script type="text/javascript" src="{{url('/')}}/assets/website/assets/js/app.js"></script>

</body>
</html>

