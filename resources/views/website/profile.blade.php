@extends('website.layout.index')

@section('content')

    <header class="sticky-top bg-white py-2">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <a href="index.html" title="#">
                <img src="assets/images/logo.png" alt="#">
            </a>
        </div><!-- logo -->
        <div class="user_links">
            <button type="button" id="user_links_Button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu" aria-labelledby="user_links_Button">
                <a class="dropdown-item" href="account.html">حسابي</a>
                <a class="dropdown-item" href="#">تسجيل خروج</a>
            </div><!-- dropdown-menu -->
        </div><!-- user_links -->
    </div><!-- container -->
</header>

<section id="account_page">
    <div class="container">
        @if(auth()->user()->email_verified_at != '')
        @else
            @include('website.verificationEmail')
        @endif
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
                <div class="title">حسابي</div>
                <form action="#">
                    <div class="block">
                        <h1 class="h4 mb-3 text-body">معلوماتي</h1>
                        <div class="content bg-white border rounded-lg p-3">
                            <div class="form-group mt-3 position-relative">
                                <label for="username" >اسم المستخدم</label>
                                <input type="text" id="username" class="auth_input" autocomplete="off">
                            </div><!-- form-group -->
                            <div class="form-group input_space position-relative">
                                <label for="email" >البريد الإلكتروني</label>
                                <input type="email" id="email" class="auth_input" autocomplete="off">
                            </div><!-- form-group -->
                        </div><!-- content -->
                        <div class="d-flex align-items-center justify-content-end mt-2">
                            <button type="submit" class="btn">حفظ</button>
                        </div>
                    </div><!-- block -->
                </form>
                <form action="#">
                    <div class="block">
                        <h1 class="h4 mt-5 mb-3 text-body">كلمة المرور</h1>
                        <div class="content bg-white border rounded-lg p-3">
                            <div class="form-group mt-3 position-relative">
                                <label for="password-old" >كلمة المرور الحالية</label>
                                <input type="password" id="password-old" class="auth_input" autocomplete="off">
                            </div><!-- form-group -->
                            <div class="form-group input_space position-relative">
                                <label for="password-new" >كلمة المرور الجديدة</label>
                                <input type="password" id="password-new" class="auth_input" autocomplete="off">
                            </div><!-- form-group -->
                            <div class="form-group input_space position-relative">
                                <label for="password-confirm" >تأكيد كلمة المرور الجديدة</label>
                                <input type="password" id="password-confirm" class="auth_input" autocomplete="off">
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


@endsection

@push('js')
@endpush
