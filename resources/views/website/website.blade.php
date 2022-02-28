@extends('website.layout.index')

@section('content')

    <section id="intro">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="txt">
                    <h1>بطاقتك التعريفية</h1>
                    <h2>برابط واحد</h2>
                    <form action="#">
                        <div class="start_link">
                            <span>betaka.com /</span>
                            <input type="text">
                            <button type="submit">إبدأ</button>
                        </div><!-- start_link -->
                    </form>
                </div><!-- txt -->
                <div class="show_phones">
                    <div class="phone_1"></div>
                    <div class="phone_2"></div>
                    <div class="phone_3"></div>
                </div><!-- show_phones -->
            </div><!-- d-flex -->
        </div><!-- container -->
    </section><!-- intro -->

    <section id="whyus">
        <div class="container">
            <div class="title">لماذا بطاقة</div>
            <div class="desc">صفحة تعريفية واحدة تجمع لك الروابط الخاصة بك</div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
                <div class="col">
                    <div class="item">
                        <div class="imgthumb">
                            <img src="{{url('/')}}/assets/website/assets/images/feature_icon_1.svg" alt="#">
                        </div><!-- imgthumb -->
                        <span>الميزة الاولى</span>
                        <p>لوريم إيبسوم هو ببساطة نص شكلي بمعنى أن الغاية هي الشكل وليس المحتوى ويُستخدم في صناعات المطابع</p>
                    </div><!-- item -->
                </div><!-- col -->
                <div class="col">
                    <div class="item">
                        <div class="imgthumb">
                            <img src="{{url('/')}}/assets/website/assets/images/feature_icon_2.svg" alt="#">
                        </div><!-- imgthumb -->
                        <span>الميزة الثانية</span>
                        <p>لوريم إيبسوم هو ببساطة نص شكلي بمعنى أن الغاية هي الشكل وليس المحتوى ويُستخدم في صناعات المطابع</p>
                    </div><!-- item -->
                </div><!-- col -->
                <div class="col">
                    <div class="item">
                        <div class="imgthumb">
                            <img src="{{url('/')}}/assets/website/assets/images/feature_icon_3.svg" alt="#">
                        </div><!-- imgthumb -->
                        <span>الميزة الثالثة</span>
                        <p>لوريم إيبسوم هو ببساطة نص شكلي بمعنى أن الغاية هي الشكل وليس المحتوى ويُستخدم في صناعات المطابع</p>
                    </div><!-- item -->
                </div><!-- col -->
                <div class="col">
                    <div class="item">
                        <div class="imgthumb">
                            <img src="{{url('/')}}/assets/website/assets/images/feature_icon_4.svg" alt="#">
                        </div><!-- imgthumb -->
                        <span>الميزة الرابعة</span>
                        <p>لوريم إيبسوم هو ببساطة نص شكلي بمعنى أن الغاية هي الشكل وليس المحتوى ويُستخدم في صناعات المطابع</p>
                    </div><!-- item -->
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </section><!-- whyus -->
@endsection

@push('js')
@endpush

