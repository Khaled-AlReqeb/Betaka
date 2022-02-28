@extends('website.layout.index')

@section('content')

    <section id="show_page" class="bg-1">
        <div class="container align-items-center justify-content-center">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                    <div class="show_card text-center">
                        <div class="user_area">
                            <div class="imgthumb">
                                <img class="user-img" src="https://d1fdloi71mui9q.cloudfront.net/uSp49IdiTjmtahkyylrE_3r8h90Btr108i87t" alt="Profile Image">
                            </div><!-- imgthumb -->
                            <h3>@Betaka</h3>
                        </div><!-- user_area -->
                        <div class="links">
                            <div class="link">
                                <a class="btn btn-link" target="_blank" rel="noopener" href="http://www.yahoo.com">Yahoo</a>
                            </div><!-- link -->
                            <div class="link">
                                <a class="btn btn-link" target="_blank" rel="noopener" href="http://www.yahoo.com">Twitter</a>
                            </div><!-- link -->
                            <div class="link">
                                <a class="btn btn-link" target="_blank" rel="noopener" href="http://www.yahoo.com">Facebook</a>
                            </div><!-- link -->
                            <div class="link">
                                <a class="btn btn-link" target="_blank" rel="noopener" href="http://www.yahoo.com">Linkden</a>
                            </div><!-- link -->
                        </div><!-- links -->
                    </div><!-- show_card -->
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
        <div class="show_copyrights">
            <a href="index.html" title="#">
                <img src="assets/images/logo.png" alt="#">
            </a>
        </div><!-- show_copyrights -->
    </section><!-- show_page -->


@endsection

@push('js')
@endpush
