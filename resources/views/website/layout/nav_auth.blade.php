<header class="sticky-top bg-white py-2">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <a href="{{ url('/appearance/'.auth()->user()->id) }}" title="#">
                <img src="{{url('/')}}/assets/website/assets/images/logo.png" alt="#">
            </a>
        </div><!-- logo -->
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
    </div><!-- container -->
</header>
