<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="ar"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="ar"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ar" dir="rtl"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>لوحة التحكم</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- App favicon -->

    @include('website.layout.css')


    <style>
        .list-group-item {
            display: flex;
            align-items: center;
        }

        .highlight {
            background: #f7e7d3;
            min-height: 30px;
            list-style-type: none;
        }

        #handle {
            min-width: 18px;
            background: #607D8B;
            height: 15px;
            display: inline-block;
            cursor: move;
            margin-right: 10px;
        }
    </style>

</head>
<body>

@include('website.layout.nav_auth')

<section id="links_panel">
    <div class="container">
        @if(auth()->user()->email_verified_at != '')
        @else
            @include('website.verificationEmail')
        @endif
        <nav>
            <div class="links">
                <a href="{{ route('link' , ['id' => auth()->user()->id]) }}" title="الروابط" class="active">روابطي</a>
                <a href="{{ route('appearance' , ['id' => auth()->user()->id]) }}" title="المظهر الخارجي">المظهر الخارجي</a>
                <a href="{{ route('add.link' , ['id' => auth()->user()->id]) }}" title="المظهر الخارجي">إضافة روابط</a>
            </div><!-- position-absolute -->
            <div class="share_link">
                رابط بطاقتي : <a href="{{ url('/'.auth()->user()->name) }}" title="#" target="_blank">https://betaka.com/{{ auth()->user()->name }}</a>
            </div><!-- share_link -->
        </nav><!-- nav -->
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                <div class="all_links">
                    {{--                   @foreach($errors as $error)--}}
                    {{--                       <ul>--}}
                    {{--                           <li>{{ $error }}</li>--}}
                    {{--                       </ul>--}}
                    {{--                    @endforeach--}}

                    {{--                    @foreach($errors as $error)--}}

                    {{--                    {{dd($errors)}}--}}

                    @if($errors->any())
                        {{--                        {{ dd($errors->all()) }}--}}

                        <ul>
                            {{--                            @foreach($errors->all() as $error)--}}
                            <li class="alert alert-warning" style="background-color: #f55a5a;color: #ffffff" role="alert">
                                {{$errors->all()}}
                            </li>
                            {{--                            @endforeach--}}
                        </ul>
                    @endif
                    {{--                    @endforeach--}}


                    {{--                    <ul>--}}
                    {{--                        @error('title')--}}
                    {{--                        <li class="alert alert-warning" style="background-color: #f55a5a;color: #ffffff" role="alert">--}}
                    {{--                            {{ $message }}--}}
                    {{--                        </li>--}}
                    {{--                        @enderror--}}
                    {{--                        @error('link')--}}
                    {{--                        <li class="alert alert-warning" style="background-color: #f55a5a;color: #ffffff" role="alert">--}}
                    {{--                            {{ $message }}--}}
                    {{--                        </li>--}}
                    {{--                        @enderror--}}
                    {{--                        @error('link')--}}
                    {{--                        <li class="alert alert-warning" style="background-color: #f55a5a;color: #ffffff" role="alert">--}}
                    {{--                            {{ $message }}--}}
                    {{--                        </li>--}}
                    {{--                        @enderror--}}
                    {{--                    </ul>--}}


                    <div class="repeater" style="margin-top: 24px">
                        {{--                        <button type="button" data-repeater-create class="add_new_link">إضافة رابط جديد</button>--}}
                        @if (!empty($links) && $links->count() > 0)
                            <form action="{{ route('link.store') }}" method="post" enctype="multipart/form-data" id="link_form">
                                @csrf
                                @foreach($links as $link)

{{--                                    <?php--}}
{{--//                                    $viewWeek =  $link->where(\Carbon\Carbon::now()->subYear(7))--}}
{{--                                    $viewWeek = $link->where('created_at', '>=', new DateTime('-7 days'))->get('views');--}}

{{--                                    ?>--}}

{{--                                    {{ dd($viewWeek ) }}--}}

                                    <div data-repeater-list="outer-list" id="sort_links">
                                        <div data-repeater-item class="inner_item" id="handle">
                                            <div class="inner-repeater">
                                                <div data-repeater-list="inner-list">
                                                    <div class="item">
{{--                                                        <div class="sort_area row1" id="handle" data-id="{{ $link->id }}"></div>--}}
{{--                                                        <div class="list-group-item" data-id="{{$link->id}}"></div>--}}
                                                        <ul class="sort_menu list-group">
                                                                <li class="list-group-item" data-id="{{$link->id}}">
{{--                                                                    <div  id="handle" data-id="{{ $link->id }}" ></div>--}}
                                                        </ul>
                                                        <div class="content">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="col_right">
                                                                    <div class="mb-2">
{{--                                                                    <div class="name_link_title mb-2">--}}
                                                                        <input type="text" name="title[]" value="{{ $link->title }}" class="name_link_field[]"
                                                                               placeholder="أكتب العنوان" style="border: none;border-bottom: 1px solid #b4b4b4">
                                                                        <span class="name-txt" style="padding: 10px"><i class="fa fa-pen" style="color:  #b4b4b4"></i> </span>
{{--                                                                        <span class="name-txt">أكتب العنوان</span>--}}
                                                                        <i></i>
                                                                    </div><!-- name_link_title -->
                                                                    <div class="mb-2">
{{--                                                                    <div class="link_title mb-2">--}}
                                                                        <input type="text"  name="link[]"  value="{{ $link->link }}"  class="link_field[]"
                                                                               placeholder="http://url" style="border: none;border-bottom: 1px solid #b4b4b4;margin-top: 10px">
                                                                        <span class="name-txt" style="padding: 10px"><i class="fa fa-pen" style="color:  #b4b4b4"></i> </span>
{{--                                                                        <span class="link-txt">http://url</span>--}}
                                                                        <i></i>
                                                                    </div><!-- link_title -->
{{--                                                                    <div class="schedule_area p-3">--}}
{{--                                                                        <div class="row">--}}
{{--                                                                            <div class="col-12 col-md-6">--}}
{{--                                                                                <div class="item_date">--}}
{{--                                                                                    <label for="start">يبدأ في</label>--}}
{{--                                                                                    <?php--}}
{{--                                                                                        $startDate =  \Carbon\Carbon::createFromFormat('Y-m-d',$link->startDate)->format('m/d/Y');--}}
{{--                                                                                        $finishDate =  \Carbon\Carbon::createFromFormat('Y-m-d',$link->finishDate)->format('m/d/Y');--}}

{{--                                                                                    ?>--}}
{{--                                                                                    <input type="text"  name="startDate[]" value="{{ $startDate }}" id="start" class="datepicker">--}}
{{--                                                                                </div><!-- item_date -->--}}
{{--                                                                            </div><!-- col-12 -->--}}
{{--                                                                            <div class="col-12 col-md-6">--}}
{{--                                                                                <div class="item_date">--}}
{{--                                                                                    <label for="end">ينتهي في</label>--}}
{{--                                                                                    <input type="text" name="finishDate[]" value="{{ $finishDate }}"  id="end" class="datepicker">--}}
{{--                                                                                </div><!-- item_date -->--}}
{{--                                                                            </div><!-- col-12 -->--}}
{{--                                                                        </div><!-- d-flex -->--}}
{{--                                                                    </div><!-- schedule_link_area -->--}}
                                                                </div><!-- col_right -->

                                                                <div class="col_left">
                                                                    <label class="checkbox_area">
                                                                        {{--                                                                        @if($link->is_active == 1)--}}
                                                                        {{--                                                                            <input type="checkbox" id="linkStatus" name="is_active" data-id="{{ $link->id }}" checked>--}}
                                                                        {{--                                                                        @elseif($link->is_active == 0)--}}
                                                                        {{--                                                                            <input type="checkbox" id="linkStatus" name="is_active" data-id="{{ $link->id }}">--}}
                                                                        {{--                                                                        @endif--}}



                                                                        @if($link->is_active == 1 )
                                                                            {{--                                                                            <form action="{{ route('activeLink'  , [$link->id]) }}" method="post" enctype="multipart/form-data">--}}
                                                                            {{--                                                                                {{ csrf_field() }}--}}
                                                                            {{--                                                                                <input type="hidden" value="{{ $link->id }}" name="is_active" >--}}
                                                                            <input value="{{ $link->id }}"  name="activeId" type="hidden">
{{--                                                                                                                                                            <button class="btn t-btn" typy="submit"  style="width: 0px;height: 0px;margin-right: 8px;border-style: none;background-color: green" id="activeBtn">--}}
{{--                                                                                                                                                                <input type="checkbox">--}}
{{--                                                                                                                                                                <span class="checkmark" style="margin-top: -12px;margin-right: -17px;background-color: #00d775"> </span>                                                                                    </button>--}}
{{--                                                                                                                                                        </form>--}}

                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Active" data-id="{{$link->id}}" class="btn btn-circle btn-icon-only red delete" id="activeBtn">
{{--                                                                                <button class="btn t-btn" typy="button"  style="width: 0px;height: 0px;margin-right: 8px;border-style: none;background-color: green" id="activeBtn">--}}
                                                                                <input type="checkbox" checked>
                                                                                <span class="checkmark" style="margin-top: -7px;margin-left: -11px;"></span>
{{--                                                                                    <span class="checkmark" style="margin-top: -12px;margin-right: -17px;background-color: #00d775"> </span>                                                                                    </button>--}}


                                                                            </a>


                                                                        @elseif($link->is_active == 0)
                                                                            {{--                                                                            <form action="{{ route('inActiveLink'  , [$link->id]) }}" method="post" enctype="multipart/form-data">--}}
                                                                            {{--                                                                                {{ csrf_field() }}--}}
                                                                            {{--                                                                                <input type="hidden" value="{{ $link->id }}" name="is_active">--}}
                                                                            <input value="{{ $link->id }}"  name="activeId" type="hidden">
{{--                                                                                                                                                            <button class="btn t-btn" typy="submit"  style="width: 0px;height: 0px;margin-right: 8px;border-style: none;background-color: gray" id="inActiveBtn">--}}
{{--                                                                                                                                                                <input type="checkbox">--}}
{{--                                                                                                                                                                <span class="checkmark" style="margin-top: -12px;margin-right: -18px;background-color: #acb5bf"> </span>--}}
{{--                                                                                                                                                            </button>--}}
                                                                            {{--                                                                            </form>--}}

                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="InActive" data-id="{{$link->id}}" class="btn btn-circle btn-icon-only red delete" id="inActiveBtn">
{{--                                                                                <button class="btn t-btn" typy="submit"  style="width: 0px;height: 0px;margin-right: 8px;border-style: none;background-color: gray" id="inActiveBtn">--}}
                                                                                <input type="checkbox">
                                                                                <span class="checkmark" style="margin-top: -7px;margin-left: -15px;"></span>
{{--                                                                                    <span class="checkmark" style="margin-top: -12px;margin-right: -18px;background-color: #acb5bf"> </span>--}}
{{--                                                                                </button>--}}

                                                                            </a>

                                                                        @endif



                                                                    </label><!-- checkbox_area -->

                                                                    <input type="text" name="linkID[]" value="{{ $link->id ?? '' }}" hidden>


                                                                    {{--                                                                    <form action="{{route('link.delete' , ['id' => $link]) }}" id="del_event" method="POST">--}}
                                                                    {{--                                                                        {{csrf_field()}}--}}
                                                                    {{--                                                                        {{ method_field('delete')}}--}}

                                                                    {{--                                                                           <button type="submit" rel="tooltip" title="Delete" class="btn btn-white btn-link btn-sm" id="deleteBtn" data-title="Remove">--}}
                                                                    {{--                                                                               <i class="fa fa-trash" style="color:#ff4141;font-size: 22px"></i>--}}
                                                                    {{--                                                                            </button>--}}
                                                                    {{--                                                                    </form>--}}


                                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Delete" data-id="{{$link->id}}" class="btn btn-circle btn-icon-only red delete" id="deleteBtn">
                                                                        <i class="fa fa-trash" style="color:#ff4141;font-size: 22px;margin-left: -10px;margin-top: 10px"></i>

                                                                    </a>

                                                                    {{--                                                                    <button type="button" class="btn btn-circle btn-icon-only red delete" id="deleteBtn">--}}
                                                                    {{--                                                                        <i class="fa fa-trash" style="color:#ff4141;font-size: 22px"></i>--}}

                                                                    {{--                                                                    </button>--}}

                                                                </div><!-- col_left -->
                                                            </div><!-- d-flex -->
                                                            <div id="accordionExample">
                                                                <div class="icons_area">
                                                                    <button class="stats" type="button" data-toggle="collapse" data-target="#stats_area" aria-expanded="false" aria-controls="stats_area"></button>
                                                                    <button class="schedule" type="button" data-toggle="collapse" data-target="#schedule_link" aria-expanded="false" aria-controls="schedule_link"></button>
{{--                                                                    <button class="thumbnail" type="button" data-toggle="collapse" data-target="#thumbnail_upload" aria-expanded="false" aria-controls="thumbnail_upload"></button>--}}
                                                                    <!-- <button class="forwarding" type="button" data-toggle="collapse" data-target="#forwarding" aria-expanded="false" aria-controls="forwarding"></button> -->
                                                                </div><!-- icons_area -->
                                                                <div id="stats_area" class="collapse_area collapse" aria-labelledby="stats_area" data-parent="#accordionExample">
                                                                    <div class="title d-flex align-items-center justify-content-between">
                                                                        <span>إحصائيات</span>
                                                                        <button type="button" data-toggle="collapse" data-target="#stats_area" aria-expanded="false" aria-controls="stats_area" class="close_collapse d-block border-0 p-0"></button>
                                                                    </div><!-- title -->
                                                                    <div class="chart_area p-3">
                                                                        <div class="d-flex align-items-center justify-content-between">
<!--                                                                            --><?php
//                                                                            $viewWeek =  $link->where(\Carbon\Carbon::now()->subYear(7))
//                                                                            ?>


{{--                                                                            {{ dd($viewWeek) }}--}}
{{--                                                                            <span>أخر 7 أيام : {{ $link->where('created_at', '>=', \Carbon\Carbon::now()->subDay(7)) }}</span>--}}
{{--                                                                            <span>أخر 7 أيام : {{ $link->views->DB::raw("Date(created_at) as day") }}</span>--}}
                                                                            <p class="mb-0"> عدد الضغطات : {{ $link->views }}</p>
                                                                        </div><!-- d-flex -->
                                                                    </div><!-- chart_area -->
                                                                </div><!-- stats_area -->
                                                                <div id="schedule_link" class="collapse_area collapse" aria-labelledby="schedule_link" data-parent="#accordionExample">
                                                                    <div class="title d-flex align-items-center justify-content-between">
                                                                        <span>جدولة الرابط</span>
                                                                        <button type="button" data-toggle="collapse" data-target="#schedule_link" aria-expanded="false" aria-controls="schedule_link" class="close_collapse d-block border-0 p-0"></button>
                                                                    </div><!-- title -->
                                                                    <div class="schedule_area p-3">
                                                                        <div class="row">
                                                                            <div class="col-12 col-md-6">
                                                                                   <?php
                                                                                        $startDate =  \Carbon\Carbon::createFromFormat('Y-m-d',$link->startDate)->format('m/d/Y');
                                                                                        $finishDate =  \Carbon\Carbon::createFromFormat('Y-m-d',$link->finishDate)->format('m/d/Y');

                                                                                    ?>
                                                                                <div class="item_date">
                                                                                    <label for="start">يبدأ في</label>
                                                                                    <input type="text"  name="startDate[]" value="{{ $startDate }}" id="start" class="datepicker">                                                                                                                                                </div><!-- item_date -->
                                                                            </div><!-- col-12 -->
                                                                            <div class="col-12 col-md-6">
                                                                                <div class="item_date">
                                                                                    <label for="end">ينتهي في</label>
                                                                                    <input type="text" name="finishDate[]" value="{{ $finishDate }}" id="end" class="datepicker">                                                                                                                                                </div><!-- item_date -->
                                                                            </div><!-- col-12 -->
                                                                        </div><!-- d-flex -->
                                                                    </div><!-- schedule_link_area -->
                                                                </div><!-- schedule_link -->

                                                                <div id="thumbnail_upload" class="collapse_area collapse" aria-labelledby="thumbnail_upload" data-parent="#accordionExample">
                                                                    <div class="title d-flex align-items-center justify-content-between">
                                                                        <span>أضف صورة مصغرة</span>
{{--                                                                        <input type="file" name="image">--}}
                                                                        <button type="button" data-toggle="collapse" data-target="#schedule_link" aria-expanded="false" aria-controls="schedule_link" class="close_collapse d-block border-0 p-0"></button>
                                                                    </div><!-- title -->
                                                                </div><!-- thumbnail_upload -->
                                                                <!-- <div id="forwarding" class="collapse_area collapse" aria-labelledby="forwarding" data-parent="#accordionExample">
                                                                </div> -->
                                                            </div><!-- accordionExample -->
                                                        </div><!-- content -->
                                                    </div><!-- item -->
                                                </div><!-- inner-list -->
                                            </div><!-- inner-repeater -->
                                        </div><!-- data-repeater-item -->
                                    </div><!-- outer-list -->
                                @endforeach

                                {{--                                <tbody id="tablecontents">--}}
                                {{--                                @foreach($links as $link)--}}

                                {{--                                    <?php--}}
                                {{--                                    $links = \App\Link::where('user_id' , auth()->user()->id)->get();--}}
                                {{--                                    foreach($links as $linkDate){--}}
                                {{--                                        $startDate =  \Carbon\Carbon::createFromFormat('Y-m-d',$linkDate->startDate)->format('m/d/Y');--}}
                                {{--                                        $finishDate =  \Carbon\Carbon::createFromFormat('Y-m-d',$linkDate->finishDate)->format('m/d/Y');--}}
                                {{--                                    }--}}
                                {{--                                    ?>--}}

                                {{--                                    <div data-repeater-list="outer-list" id="sort_links">--}}
                                {{--                                        <div data-repeater-item class="inner_item">--}}
                                {{--                                            <div class="inner-repeater">--}}
                                {{--                                                <div data-repeater-list="inner-list">--}}
                                {{--                                                    <div class="item">--}}
                                {{--                                                        <div class="sort_area row1" data-id="{{ $link->id }}"></div>--}}
                                {{--                                                        <div class="content">--}}
                                {{--                                                            <div class="d-flex align-items-center justify-content-between">--}}
                                {{--                                                                <div class="col_right">--}}
                                {{--                                                                    <div class="name_link_title mb-2">--}}
                                {{--                                                                        <input type="text" name="title[]" value="{{ $link->title }}" class="name_link_field[]" placeholder="أكتب العنوان">--}}
                                {{--                                                                        --}}{{--                                                                <input type="text" name="rows[][title]" class="name_link_field" placeholder="أكتب العنوان">--}}
                                {{--                                                                        <span class="name-txt">أكتب العنوان</span>--}}
                                {{--                                                                        <i></i>--}}
                                {{--                                                                    </div><!-- name_link_title -->--}}
                                {{--                                                                    <div class="link_title mb-2">--}}
                                {{--                                                                        <input type="text"  name="link[]"  value="{{ $link->link }}"  class="link_field[]" placeholder="http://url">--}}
                                {{--                                                                        --}}{{--                                                                <input type="text"  name="rows[][link]"  class="link_field" placeholder="http://url">--}}
                                {{--                                                                        <span class="link-txt">http://url</span>--}}
                                {{--                                                                        <i></i>--}}
                                {{--                                                                    </div><!-- link_title -->--}}
                                {{--                                                                    <div class="schedule_area p-3">--}}
                                {{--                                                                        <div class="row">--}}
                                {{--                                                                            <div class="col-12 col-md-6">--}}
                                {{--                                                                                <div class="item_date">--}}
                                {{--                                                                                    <label for="start">يبدأ في</label>--}}
                                {{--                                                                                    <input type="text"  name="startDate[]" value="{{ $startDate }}" id="start" class="datepicker">--}}
                                {{--                                                                                </div><!-- item_date -->--}}
                                {{--                                                                            </div><!-- col-12 -->--}}
                                {{--                                                                            <div class="col-12 col-md-6">--}}
                                {{--                                                                                <div class="item_date">--}}
                                {{--                                                                                    <label for="end">ينتهي في</label>--}}
                                {{--                                                                                    <input type="text" name="finishDate[]" value="{{ $finishDate }}"  id="end" class="datepicker">--}}
                                {{--                                                                                </div><!-- item_date -->--}}
                                {{--                                                                            </div><!-- col-12 -->--}}
                                {{--                                                                        </div><!-- d-flex -->--}}
                                {{--                                                                    </div><!-- schedule_link_area -->--}}
                                {{--                                                                </div><!-- col_right -->--}}

                                {{--                                                                <div class="col_left">--}}
                                {{--                                                                    <label class="checkbox_area">--}}
                                {{--                                                                        @if($link->is_active == 1)--}}
                                {{--                                                                            <input type="checkbox" name="is_active[]" checked>--}}
                                {{--                                                                        @elseif($link->is_active == 0)--}}
                                {{--                                                                            <input type="checkbox" name="is_active[]">--}}
                                {{--                                                                        @endif--}}
                                {{--                                                                        <span class="checkmark"></span>--}}
                                {{--                                                                    </label><!-- checkbox_area -->--}}

                                {{--                                                                    <input type="text" , name="linkID[]" value="{{ $link->id ?? 9 }}">--}}

                                {{--                                                                    <button type="button" data-repeater-delete class="delete_item d-block border-0 p-0"></button>--}}
                                {{--                                                                </div><!-- col_left -->--}}
                                {{--                                                            </div><!-- d-flex -->--}}
                                {{--                                                            <div id="accordionExample">--}}
                                {{--                                                                <div class="icons_area">--}}
                                {{--                                                                    <button class="stats" type="button" data-toggle="collapse" data-target="#stats_area" aria-expanded="false" aria-controls="stats_area"></button>--}}
                                {{--                                                                    <button class="schedule" type="button" data-toggle="collapse" data-target="#schedule_link" aria-expanded="false" aria-controls="schedule_link"></button>--}}
                                {{--                                                                    <button class="thumbnail" type="button" data-toggle="collapse" data-target="#thumbnail_upload" aria-expanded="false" aria-controls="thumbnail_upload"></button>--}}
                                {{--                                                                    <!-- <button class="forwarding" type="button" data-toggle="collapse" data-target="#forwarding" aria-expanded="false" aria-controls="forwarding"></button> -->--}}
                                {{--                                                                </div><!-- icons_area -->--}}
                                {{--                                                                <div id="stats_area" class="collapse_area collapse" aria-labelledby="stats_area" data-parent="#accordionExample">--}}
                                {{--                                                                    <div class="title d-flex align-items-center justify-content-between">--}}
                                {{--                                                                        <span>إحصائيات</span>--}}
                                {{--                                                                        <button type="button" data-toggle="collapse" data-target="#stats_area" aria-expanded="false" aria-controls="stats_area" class="close_collapse d-block border-0 p-0"></button>--}}
                                {{--                                                                    </div><!-- title -->--}}
                                {{--                                                                    <div class="chart_area p-3">--}}
                                {{--                                                                        <div class="d-flex align-items-center justify-content-between">--}}
                                {{--                                                                            <span>أخر 7 أيام : 43</span>--}}
                                {{--                                                                            <p class="mb-0">عدد[] الضغطات : 210</p>--}}
                                {{--                                                                        </div><!-- d-flex -->--}}
                                {{--                                                                    </div><!-- chart_area -->--}}
                                {{--                                                                </div><!-- stats_area -->--}}
                                {{--                                                                <div id="schedule_link" class="collapse_area collapse" aria-labelledby="schedule_link" data-parent="#accordionExample">--}}
                                {{--                                                                    <div class="title d-flex align-items-center justify-content-between">--}}
                                {{--                                                                        <span>جدولة الرابط</span>--}}
                                {{--                                                                        <button type="button" data-toggle="collapse" data-target="#schedule_link" aria-expanded="false" aria-controls="schedule_link" class="close_collapse d-block border-0 p-0"></button>--}}
                                {{--                                                                    </div><!-- title -->--}}
                                {{--                                                                    <div class="schedule_area p-3">--}}
                                {{--                                                                        <div class="row">--}}
                                {{--                                                                            <div class="col-12 col-md-6">--}}
                                {{--                                                                                --}}{{--                                                                        <div class="item_date">--}}
                                {{--                                                                                --}}{{--                                                                            <label for="start">يبدأ في</label>--}}
                                {{--                                                                                --}}{{--                                                                            <input type="text"  name="startDate" id="start" class="datepicker">--}}
                                {{--                                                                                --}}{{--                                                                        </div><!-- item_date -->--}}
                                {{--                                                                            </div><!-- col-12 -->--}}
                                {{--                                                                            <div class="col-12 col-md-6">--}}
                                {{--                                                                                --}}{{--                                                                        <div class="item_date">--}}
                                {{--                                                                                --}}{{--                                                                            <label for="end">ينتهي في</label>--}}
                                {{--                                                                                --}}{{--                                                                            <input type="text" name="finishDate"  id="end" class="datepicker">--}}
                                {{--                                                                                --}}{{--                                                                        </div><!-- item_date -->--}}
                                {{--                                                                            </div><!-- col-12 -->--}}
                                {{--                                                                        </div><!-- d-flex -->--}}
                                {{--                                                                    </div><!-- schedule_link_area -->--}}
                                {{--                                                                </div><!-- schedule_link -->--}}
                                {{--                                                                <div id="thumbnail_upload" class="collapse_area collapse" aria-labelledby="thumbnail_upload" data-parent="#accordionExample">--}}
                                {{--                                                                    <div class="title d-flex align-items-center justify-content-between">--}}
                                {{--                                                                        <span>أضف صورة مصغرة</span>--}}
                                {{--                                                                        <button type="button" data-toggle="collapse" data-target="#schedule_link" aria-expanded="false" aria-controls="schedule_link" class="close_collapse d-block border-0 p-0"></button>--}}
                                {{--                                                                    </div><!-- title -->--}}
                                {{--                                                                </div><!-- thumbnail_upload -->--}}
                                {{--                                                                <!-- <div id="forwarding" class="collapse_area collapse" aria-labelledby="forwarding" data-parent="#accordionExample">--}}
                                {{--                                                                </div> -->--}}
                                {{--                                                            </div><!-- accordionExample -->--}}
                                {{--                                                        </div><!-- content -->--}}
                                {{--                                                    </div><!-- item -->--}}
                                {{--                                                </div><!-- inner-list -->--}}
                                {{--                                            </div><!-- inner-repeater -->--}}
                                {{--                                        </div><!-- data-repeater-item -->--}}
                                {{--                                    </div><!-- outer-list -->--}}
                                {{--                                @endforeach--}}
                                {{--                                </tbody>--}}

                                <button  class="btn btn-primary" style="background-color: #01cedb;border-style: none" type="submit">حفظ</button>

                            </form>
                        @endif
                    </div><!-- repeater -->
                </div><!-- all_links -->
            </div><!-- col-12 -->

            @if(auth()->user()->imageUrl == '' && auth()->user()->color == '' && auth()->user()->backgroundImage == '')
                <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="phone_area position-sticky">
                        <div class="preview_phone">
                            <div id="mobile_preview" class="card-0">
                                <div class="user-area">
                                    <div class="text-xs-center">
                                        @if(auth()->user()->image == '')
                                            <span class="img-circle"><img class="user-img" src="https://d1fdloi71mui9q.cloudfront.net/uSp49IdiTjmtahkyylrE_3r8h90Btr108i87t" alt="Profile Image"></span>
                                        @else
                                            <span class="img-circle"><img class="user-img" src="{{ auth()->user()->image }}" alt="Profile Image"></span>
                                        @endif                                    <h3><a class="user-name">{{ auth()->user()->userName }}</a></h3>
                                    </div><!-- text-xs-center -->
                                </div><!-- user-area -->
                                <div class="links">
                                    @foreach($linksView as $link)
                                        <div class="link">
                                            <a class="btn btn-link" target="_blank" rel="noopener" href="{{ $link->link }}">{{ $link->title }}</a>
                                        </div><!-- link -->
                                    @endforeach
                                </div><!-- links -->
                            </div><!-- mobile_preview -->



                            {{--                        <button onclick="myFunction()" style="background: none; color: #3FABF3;text-align: center;margin-right: 87px;margin-top: 10px"><i class="fas fa-share-alt" style="color:#3FABF3;"></i>  {{ trans('lang.share_works') }}</button>--}}
                            {{--                        <input type="text" style="margin-top: 4px;height: 38px" value="{{ url(auth()->user()->name) }}" id="myInput">--}}


                        </div><!-- preview_phone -->
                    </div><!-- phone_area -->
                </div><!-- col-12 -->
            @elseif(auth()->user()->imageUrl != '')
                <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="phone_area position-sticky">
                        <div class="preview_phone">
                            <div id="mobile_preview" class="{{ auth()->user()->imageUrl }}">
                                {{--                        <div id="mobile_preview" class="card-1">--}}
                                <div class="user-area">
                                    <div class="text-xs-center">
                                        @if(auth()->user()->image == '')
                                            <span class="img-circle"><img class="user-img" src="https://d1fdloi71mui9q.cloudfront.net/uSp49IdiTjmtahkyylrE_3r8h90Btr108i87t" alt="Profile Image"></span>
                                        @else
                                            <span class="img-circle"><img class="user-img" src="{{ auth()->user()->image }}" alt="Profile Image"></span>
                                        @endif
                                        <h3><a class="user-name">{{ auth()->user()->userName }}</a></h3>
                                    </div><!-- text-xs-center -->
                                </div><!-- user-area -->
                                <div class="links">
                                    @foreach($linksView as $link)
                                        <div class="link">
                                            <a class="btn btn-link" target="_blank" rel="noopener" href="{{ $link->link }}">{{ $link->title }}</a>
                                        </div><!-- link -->
                                    @endforeach
                                </div><!-- links -->
                            </div><!-- mobile_preview -->



                            {{--                        <button onclick="myFunction()" style="background: none; color: #3FABF3;text-align: center;margin-right: 87px;margin-top: 10px"><i class="fas fa-share-alt" style="color:#3FABF3;"></i>  {{ trans('lang.share_works') }}</button>--}}
                            {{--                        <input type="text" style="margin-top: 4px;height: 38px" value="{{ url(auth()->user()->name) }}" id="myInput">--}}


                        </div><!-- preview_phone -->
                    </div><!-- phone_area -->
                </div><!-- col-12 -->
            @elseif(auth()->user()->imageUrl == '' && auth()->user()->color != '' && auth()->user()->backgroundImage == '')
                <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="phone_area position-sticky">
                        <div class="preview_phone">
                            <div id="mobile_preview" class="backgroundColor" style="background-color: {{ auth()->user()->color }}">
                                {{--                        <div id="mobile_preview" class="card-1">--}}
                                <div class="user-area">
                                    <div class="text-xs-center">
                                        @if(auth()->user()->image == '')
                                            <span class="img-circle"><img class="user-img" src="https://d1fdloi71mui9q.cloudfront.net/uSp49IdiTjmtahkyylrE_3r8h90Btr108i87t" alt="Profile Image"></span>
                                        @else
                                            <span class="img-circle"><img class="user-img" src="{{ auth()->user()->image }}" alt="Profile Image"></span>
                                        @endif
                                        <h3><a class="user-name">{{ auth()->user()->userName }}</a></h3>
                                    </div><!-- text-xs-center -->
                                </div><!-- user-area -->
                                <div class="links">
                                    @foreach($linksView as $link)
                                        <div class="link">
                                            <a class="btn btn-link" target="_blank" rel="noopener" href="{{ $link->link }}">{{ $link->title }}</a>
                                        </div><!-- link -->
                                    @endforeach
                                </div><!-- links -->
                            </div><!-- mobile_preview -->



                            {{--                        <button onclick="myFunction()" style="background: none; color: #3FABF3;text-align: center;margin-right: 87px;margin-top: 10px"><i class="fas fa-share-alt" style="color:#3FABF3;"></i>  {{ trans('lang.share_works') }}</button>--}}
                            {{--                        <input type="text" style="margin-top: 4px;height: 38px" value="{{ url(auth()->user()->name) }}" id="myInput">--}}


                        </div><!-- preview_phone -->
                    </div><!-- phone_area -->
                </div><!-- col-12 -->
            @elseif(auth()->user()->imageUrl == '' && auth()->user()->color != '' && auth()->user()->backgroundImage != '')
                <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="phone_area position-sticky">
                        <div class="preview_phone">
                            <div id="mobile_preview" class="backgroundImage" style="background-image: url({{ auth()->user()->backgroundImage }})">
                                {{--                        <div id="mobile_preview" class="card-1">--}}
                                <div class="user-area">
                                    <div class="text-xs-center">
                                        @if(auth()->user()->image == '')
                                            <span class="img-circle"><img class="user-img" src="https://d1fdloi71mui9q.cloudfront.net/uSp49IdiTjmtahkyylrE_3r8h90Btr108i87t" alt="Profile Image"></span>
                                        @else
                                            <span class="img-circle"><img class="user-img" src="{{ auth()->user()->image }}" alt="Profile Image"></span>
                                        @endif
                                        <h3><a class="user-name">{{ auth()->user()->userName }}</a></h3>
                                    </div><!-- text-xs-center -->
                                </div><!-- user-area -->
                                <div class="links">
                                    @foreach($linksView as $link)
                                        <div class="link">
                                            <a class="btn btn-link" target="_blank" rel="noopener" href="{{ $link->link }}">{{ $link->title }}</a>
                                        </div><!-- link -->
                                    @endforeach
                                </div><!-- links -->
                            </div><!-- mobile_preview -->



                            {{--                        <button onclick="myFunction()" style="background: none; color: #3FABF3;text-align: center;margin-right: 87px;margin-top: 10px"><i class="fas fa-share-alt" style="color:#3FABF3;"></i>  {{ trans('lang.share_works') }}</button>--}}
                            {{--                        <input type="text" style="margin-top: 4px;height: 38px" value="{{ url(auth()->user()->name) }}" id="myInput">--}}


                        </div><!-- preview_phone -->
                    </div><!-- phone_area -->
                </div><!-- col-12 -->
            @elseif(auth()->user()->imageUrl != '' && auth()->user()->color != '' && auth()->user()->backgroundImage != '')
                <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="phone_area position-sticky">
                        <div class="preview_phone">
                            <div id="mobile_preview" class="{{ auth()->user()->imageUrl }}">
                                {{--                        <div id="mobile_preview" class="card-1">--}}
                                <div class="user-area">
                                    <div class="text-xs-center">
                                        @if(auth()->user()->image == '')
                                            <span class="img-circle"><img class="user-img" src="https://d1fdloi71mui9q.cloudfront.net/uSp49IdiTjmtahkyylrE_3r8h90Btr108i87t" alt="Profile Image"></span>
                                        @else
                                            <span class="img-circle"><img class="user-img" src="{{ auth()->user()->image }}" alt="Profile Image"></span>
                                        @endif
                                        <h3><a class="user-name">{{ auth()->user()->userName }}</a></h3>
                                    </div><!-- text-xs-center -->
                                </div><!-- user-area -->
                                <div class="links">
                                    @foreach($linksView as $link)
                                        <div class="link">
                                            <a class="btn btn-link" target="_blank" rel="noopener" href="{{ $link->link }}">{{ $link->title }}</a>
                                        </div><!-- link -->
                                    @endforeach
                                </div><!-- links -->
                            </div><!-- mobile_preview -->



                            {{--                        <button onclick="myFunction()" style="background: none; color: #3FABF3;text-align: center;margin-right: 87px;margin-top: 10px"><i class="fas fa-share-alt" style="color:#3FABF3;"></i>  {{ trans('lang.share_works') }}</button>--}}
                            {{--                        <input type="text" style="margin-top: 4px;height: 38px" value="{{ url(auth()->user()->name) }}" id="myInput">--}}


                        </div><!-- preview_phone -->
                    </div><!-- phone_area -->
                </div><!-- col-12 -->
            @endif


        </div><!-- row -->
    </div><!-- container -->
</section><!-- links_panel -->
{{--<form action="{{ url('/link/delete/'. $link->id) }}" method="post">--}}
{{--    {{ csrf_token() }}--}}
{{--    {{ csrf_field('delete') }}--}}
<div class="sm-modal">
    <div class="modal fade" id="package-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="msg-info" style="display: flex;">
                        <i class="fa fa-trash" style="color:#ff4141;font-size: 22px;margin-left: 10px"></i>
                        <p> هل انت متأكد من حذف هذا الرابط ؟</p>
                    </div>
                </div>
                <div class="modal-footer-btn modal-footer-2-btn" style="text-align: center;padding: 18px;">
                    {{--                    <a  href="{{ url('/link/delete/'. $link->id) }}"  class="btn btn-danger"> حذف </a>--}}

                    {{--                 <input type="text" value="{{$link->id}}">--}}
                    <button type="submit" class="btn btn-danger">حذف</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إالغاء</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{--</form>--}}

<div class="sm-modal">
    <div class="modal fade" id="alert-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="msg-info" style="display: flex;">
                        <i class="fa fa-trash" style="color:#ff4141;font-size: 22px;margin-left: 10px"></i>
                        <p>تم حذف  الرابط بنجاح</p>
                    </div>
                </div>
                <div class="modal-footer-btn modal-footer-2-btn" style="text-align: center;padding: 18px;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sm-modal">
    <div class="modal fade" id="alert-active" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="msg-info" style="display: flex;">
                        <i class="fa fa-check-circle" style="color:#00d775;font-size: 22px;margin-left: 10px"></i>
                        <p>تم تفعيل الرابط بنجاح</p>
                    </div>
                </div>
                <div class="modal-footer-btn modal-footer-2-btn" style="text-align: center;padding: 18px;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sm-modal">
    <div class="modal fade" id="alert-inActive" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="msg-info" style="display: flex;">
                        <i class="fa fa-times-circle" style="color:#ff4141;font-size: 22px;margin-left: 10px"></i>
                        <p>تم تعطيل الرابط بنجاح</p>
                    </div>
                </div>
                <div class="modal-footer-btn modal-footer-2-btn" style="text-align: center;padding: 18px;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('website.layout.footer')

@include('website.layout.js')

<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>



<script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>

<script>
    $(document).ready(function(){

        function updateToDatabase(idString){
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});

            $.ajax({
                url:'{{url('/menu/update-order')}}',
                method:'POST',
                data:{ids:idString},
                success:function(){
                    alert('Successfully updated')
                    //do whatever after success
                }
            })
        }

        var target = $('#link_form');
        target.sortable({
            handle: '#handle',
            placeholder: 'highlight',
            axis: "y",
            update: function (e, ui){
                var sortData = target.sortable('toArray',{ attribute: 'data-id'})
                updateToDatabase(sortData.join(','))
            }
        })

    })
</script>


{{--<script type="text/javascript">--}}
{{--    $(function () {--}}

{{--        var table = $("#table");--}}

{{--        $( "#tablecontents" ).sortable({--}}
{{--            items: "tr",--}}
{{--            cursor: 'move',--}}
{{--            opacity: 0.6,--}}
{{--            update: function() {--}}
{{--                sendOrderToServer();--}}
{{--            }--}}
{{--        });--}}

{{--        function sendOrderToServer() {--}}
{{--            var order = [];--}}
{{--            var token = $('meta[name="csrf-token"]').attr('content');--}}
{{--            $('tr.row1').each(function(index,element) {--}}
{{--                order.push({--}}
{{--                    id: $(this).attr('data-id'),--}}
{{--                    position: index+1--}}
{{--                });--}}
{{--            });--}}

{{--            $.ajax({--}}
{{--                type: "POST",--}}
{{--                dataType: "json",--}}
{{--                url: "{{ url('/link/order') }}",--}}
{{--                data: {--}}
{{--                    order: order,--}}
{{--                    _token: token--}}
{{--                },--}}
{{--                success: function(response) {--}}
{{--                    if (response.status == "success") {--}}
{{--                        console.log(response);--}}
{{--                        toastr['success'](data.message, '');--}}
{{--                        table.api().ajax.reload();--}}
{{--                    } else {--}}
{{--                        console.log(response);--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}



<script type="text/javascript">
    // $(document).on('click', '#deleteBtn', function(){
    //     var x =  $("#package-delete").modal('show');
    //     if (x) {
    //         return true;
    //     }
    //     else {
    //         event.preventDefault();
    //         return false;
    //     }
    // });


    $('body').on('click', '#deleteBtn', function () {

        var link_id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "{{ url('link/delete') }}"+'/'+link_id,
            success: function (data) {
                $("#alert-delete").modal('show');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });



</script>
<script type="text/javascript">
    $('body').on('click', '#activeBtn', function () {

        var link_id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "PUT",
            url: "{{ url('link-active') }}"+'/'+link_id,
            success: function (data) {
                $("#alert-inActive").modal('show');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    $('body').on('click', '#inActiveBtn', function () {

        var link_id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "PUT",
            url: "{{ url('link-inActive') }}"+'/'+link_id,
            success: function (data) {
                $("#alert-active").modal('show');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });



</script>

</body>
</html>
