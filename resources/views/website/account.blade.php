<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="ar"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="ar"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ar" dir="rtl"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>حسابي</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- App favicon -->

    @include('website.layout.css')

</head>
<body>

@include('website.layout.nav_auth')

<section id="account_page">
    <div class="container">
        @if(auth()->user()->email_verified_at != '')
        @else
            @include('website.verificationEmail')
        @endif
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
                <div class="title">حسابي</div>
                {!! Form::open(['method'=>'PUT']) !!}
{{--                <form action="#">--}}
                    <div class="block">
                        <h1 class="h4 mb-3 text-body">معلوماتي</h1>
                        <div class="content bg-white border rounded-lg p-3">
                            <div class="form-group mt-3 position-relative">
                                <label for="username">اسم المستخدم</label>
{{--                                <label for="username" class="label_input">اسم المستخدم</label>--}}
                                <input type="text" name="userName" id="username" value="{{auth()->user()->userName ?? ""}}" class="auth_input  @error('userName') is-invalid @enderror" autocomplete="off">
                             @error('userName')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!-- form-group -->
                            <div class="form-group input_space position-relative">
                                <label for="email" >البريد الإلكتروني</label>
                                <input type="email" name="email" id="email" value="{{auth()->user()->email ?? ""}}" class="auth_input @error('email') is-invalid @enderror" autocomplete="off">
                             @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!-- form-group -->
                        </div><!-- content -->
                        <div class="d-flex align-items-center justify-content-end mt-2">
                            <button type="submit" class="btn">حفظ</button>
                        </div>
                    </div><!-- block -->
                {!! Form::close() !!}


                <form method="POST" action="{{ route('change.password') }}">
                    @csrf

{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <p class="text-danger">{{ $error }}</p>--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <p class="text-danger">{{ $error }}</p>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    @endforeach--}}
                    <div class="block">
                        <h1 class="h4 mt-5 mb-3 text-body">كلمة المرور</h1>
                        <div class="content bg-white border rounded-lg p-3">
                            <div class="form-group mt-3 position-relative">
                                <label for="password-old" >كلمة المرور الحالية</label>
                                <input type="password" id="password-old" name="current_password"  class="auth_input @error('current_password') is-invalid @enderror" autocomplete="off">
                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!-- form-group -->
                            <div class="form-group input_space position-relative">
                                <label for="password-new" >كلمة المرور الجديدة</label>
                                <input type="password" name="new_password" id="password-new" class="auth_input @error('new_password') is-invalid @enderror" autocomplete="off">
                                @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!-- form-group -->
                            <div class="form-group input_space position-relative">
                                <label for="password-confirm" >تأكيد كلمة المرور الجديدة</label>
                                <input type="password" id="password-confirm" name="new_confirm_password" class="auth_input @error('new_confirm_password') is-invalid @enderror" autocomplete="off">
                                @error('new_confirm_password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!-- form-group -->
                        </div><!-- content -->
                        <div class="d-flex align-items-center justify-content-end mt-2">
                            <button type="submit" class="btn">حفظ</button>
                        </div>
                    </div><!-- block -->
                </form>
            </div><!-- col-12 -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- account_page -->


@include('website.layout.footer')

@include('website.layout.js')

{{--<script src="{{url('/')}}/assets/js/account.js" type="text/javascript"></script>--}}

</body>
</html>
