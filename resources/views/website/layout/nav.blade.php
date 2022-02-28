<header class="sticky-top bg-white py-2">
    <div class="container d-flex align-items-center justify-content-between flex-column flex-sm-row">
        <div class="logo mb-3 mb-sm-0">
            <a href="{{ route('website') }}" title="#">
                <img src="{{url('/')}}/assets/website/assets/images/logo.png" alt="#">
            </a>
        </div><!-- logo -->
        <div class="main_menu d-flex align-items-center justify-content-end">
            <a href="#" title="#" class="ml-2 ml-sm-3">عن بطاقة</a>
            <a href="#" title="#" class="ml-2 ml-sm-3">المميزات</a>
            <a href="#" title="#" class="ml-2 ml-sm-3">الاسعار</a>
            <a href="#" title="#" class="ml-2 ml-sm-3">تواصل معنا</a>
            @if(auth()->user())
                <div class="user_links">
                    <button type="button" id="user_links_Button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu" aria-labelledby="user_links_Button">
                        <a class="dropdown-item" href="{{ url('/account/'.auth()->user()->id.'/edit') }}">حسابي</a>
                        <a class="dropdown-item" href="{{ url('/links/'.auth()->user()->id) }}">الروابط</a>
                        <a class="dropdown-item" href="javascript:;"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل خروج</a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div><!-- dropdown-menu -->
                </div><!-- user_links -->
            @else
                <a href="{{ route('register') }}" title="اشترك" class="signup text-white rounded">اشترك</a>
            @endif


        </div><!-- main_menu -->
    </div><!-- container -->
</header><!-- header -->
