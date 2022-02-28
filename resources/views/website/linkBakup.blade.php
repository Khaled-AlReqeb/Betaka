<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="ar"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="ar"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ar" dir="rtl"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>لوحة التحكم</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- App favicon -->

    @include('website.layout.css')

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
                <a href="{{ route('link' , ['id' => auth()->user()->id]) }}" title="الروابط" class="active">الروابط</a>
                <a href="{{ route('appearance' , ['id' => auth()->user()->id]) }}" title="المظهر الخارجي">المظهر الخارجي</a>
            </div><!-- position-absolute -->
            <div class="share_link">
                رابط بطاقتي : <a href="{{ url('/'.auth()->user()->name) }}" title="#" target="_blank">https://betaka.com/{{ auth()->user()->name }}</a>
            </div><!-- share_link -->
        </nav><!-- nav -->
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                <div class="all_links">
                    <div class="repeater">
                        <button type="button" data-repeater-create class="add_new_link">إضافة رابط جديد</button>
                        @if (!empty($links) && $links->count() > 0)
                            <form action="{{ route('link.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <table class="order-column"
                                       id="table">
                                    <tbody id="tablecontents">
                                    @foreach($links as $link)

                                        <?php
                                        $links = \App\Link::where('user_id' , auth()->user()->id)->get();
                                        foreach($links as $linkDate){
                                            $startDate =  \Carbon\Carbon::createFromFormat('Y-m-d',$linkDate->startDate)->format('m/d/Y');
                                            $finishDate =  \Carbon\Carbon::createFromFormat('Y-m-d',$linkDate->finishDate)->format('m/d/Y');
                                        }
                                        ?>

                                        <div data-repeater-list="outer-list" id="sort_links">
                                            <div data-repeater-item class="inner_item">
                                                <div class="inner-repeater">
                                                    <div data-repeater-list="inner-list">
                                                        <div class="item">
                                                            <div class="sort_area" data-id="{{ $link->id }}">
                                                                <tr class="row1" data-id="{{ $link->id }}">
                                                                    <td class="pl-3"><i class="fa fa-sort"></i></td></tr>
                                                            </div>
                                                            <div class="content">
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <div class="col_right">
                                                                        <div class="name_link_title mb-2">
                                                                            <input type="text" name="title[]" value="{{ $link->title }}" class="name_link_field[]" placeholder="أكتب العنوان">
                                                                            <span class="name-txt">أكتب العنوان</span>
                                                                            <i></i>
                                                                        </div><!-- name_link_title -->
                                                                        <div class="link_title mb-2">
                                                                            <input type="text"  name="link[]"  value="{{ $link->link }}"  class="link_field[]" placeholder="http://url">
                                                                            <span class="link-txt">http://url</span>
                                                                            <i></i>
                                                                        </div><!-- link_title -->
                                                                        <div class="schedule_area p-3">
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-6">
                                                                                    <div class="item_date">
                                                                                        <label for="start">يبدأ في</label>
                                                                                        <input type="text"  name="startDate[]" value="{{ $startDate }}" id="start" class="datepicker">
                                                                                    </div><!-- item_date -->
                                                                                </div><!-- col-12 -->
                                                                                <div class="col-12 col-md-6">
                                                                                    <div class="item_date">
                                                                                        <label for="end">ينتهي في</label>
                                                                                        <input type="text" name="finishDate[]" value="{{ $finishDate }}"  id="end" class="datepicker">
                                                                                    </div><!-- item_date -->
                                                                                </div><!-- col-12 -->
                                                                            </div><!-- d-flex -->
                                                                        </div><!-- schedule_link_area -->
                                                                    </div><!-- col_right -->

                                                                    <div class="col_left">
                                                                        <label class="checkbox_area">
                                                                            @if($link->is_active == 1)
                                                                                <input type="checkbox" name="is_active[]" checked>
                                                                            @elseif($link->is_active == 0)
                                                                                <input type="checkbox" name="is_active[]">
                                                                            @endif
                                                                            <span class="checkmark"></span>
                                                                        </label><!-- checkbox_area -->

                                                                        <input type="text" name="linkID[]" value="{{ $link->id ?? '' }}">

                                                                        <button type="button" data-repeater-delete class="delete_item d-block border-0 p-0"></button>
                                                                    </div><!-- col_left -->
                                                                </div><!-- d-flex -->
                                                                <div id="accordionExample">
                                                                    <div class="icons_area">
                                                                        <button class="stats" type="button" data-toggle="collapse" data-target="#stats_area" aria-expanded="false" aria-controls="stats_area"></button>
                                                                        <button class="schedule" type="button" data-toggle="collapse" data-target="#schedule_link" aria-expanded="false" aria-controls="schedule_link"></button>
                                                                        <button class="thumbnail" type="button" data-toggle="collapse" data-target="#thumbnail_upload" aria-expanded="false" aria-controls="thumbnail_upload"></button>
                                                                        <!-- <button class="forwarding" type="button" data-toggle="collapse" data-target="#forwarding" aria-expanded="false" aria-controls="forwarding"></button> -->
                                                                    </div><!-- icons_area -->
                                                                    <div id="stats_area" class="collapse_area collapse" aria-labelledby="stats_area" data-parent="#accordionExample">
                                                                        <div class="title d-flex align-items-center justify-content-between">
                                                                            <span>إحصائيات</span>
                                                                            <button type="button" data-toggle="collapse" data-target="#stats_area" aria-expanded="false" aria-controls="stats_area" class="close_collapse d-block border-0 p-0"></button>
                                                                        </div><!-- title -->
                                                                        <div class="chart_area p-3">
                                                                            <div class="d-flex align-items-center justify-content-between">
                                                                                <span>أخر 7 أيام : 43</span>
                                                                                <p class="mb-0">عدد[] الضغطات : 210</p>
                                                                            </div><!-- d-flex -->
                                                                        </div><!-- chart_area -->
                                                                    </div><!-- stats_area -->
                                                                    <div id="schedule_link" class="collapse_area collapse" aria-labelledby="schedule_link" data-parent="#accordionExample">
                                                                        <div class="title d-flex align-items-center justify-content-between">
                                                                            <span>جدولة الرابط</span>
                                                                            <button type="button" data-toggle="collapse" data-target="#schedule_link" aria-expanded="false" aria-controls="schedule_link" class="close_collapse d-block border-0 p-0"></button>
                                                                        </div><!-- title -->
                                                                        {{--                                                                    <div class="schedule_area p-3">--}}
                                                                        {{--                                                                        <div class="row">--}}
                                                                        {{--                                                                            <div class="col-12 col-md-6">--}}
                                                                        {{--                                                                                <div class="item_date">--}}
                                                                        {{--                                                                                    <label for="start">يبدأ في</label>--}}
                                                                        {{--                                                                                    <input type="text"  name="startDate" id="start" class="datepicker">--}}
                                                                        {{--                                                                                </div><!-- item_date -->--}}
                                                                        {{--                                                                            </div><!-- col-12 -->--}}
                                                                        {{--                                                                            <div class="col-12 col-md-6">--}}
                                                                        {{--                                                                                <div class="item_date">--}}
                                                                        {{--                                                                                    <label for="end">ينتهي في</label>--}}
                                                                        {{--                                                                                    <input type="text" name="finishDate"  id="end" class="datepicker">--}}
                                                                        {{--                                                                                </div><!-- item_date -->--}}
                                                                        {{--                                                                            </div><!-- col-12 -->--}}
                                                                        {{--                                                                        </div><!-- d-flex -->--}}
                                                                        {{--                                                                    </div><!-- schedule_link_area -->--}}
                                                                    </div><!-- schedule_link -->
                                                                    <div id="thumbnail_upload" class="collapse_area collapse" aria-labelledby="thumbnail_upload" data-parent="#accordionExample">
                                                                        <div class="title d-flex align-items-center justify-content-between">
                                                                            <span>أضف صورة مصغرة</span>
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
                                    </tbody>
                                </table>



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
                                    @foreach($links as $link)
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
                                    @foreach($links as $link)
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
                                    @foreach($links as $link)
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
                                    @foreach($links as $link)
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
                                    @foreach($links as $link)
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


@include('website.layout.footer')

@include('website.layout.js')

<script type="text/javascript">
    $(function () {

        var table = $("#table");
        $("#table").DataTable({
            "processing": true,
            "searching": false,
            "ordering": false,
            columnDefs: [{orderable: !1, targets: [0]}, {searchable: !1, targets: [0]}, {className: "dt-right"}],

        });

        $( "#tablecontents" ).sortable({
            items: "tr",
            cursor: 'move',
            opacity: 0.6,
            update: function() {
                sendOrderToServer();
            }
        });

        function sendOrderToServer() {
            var order = [];
            var token = $('meta[name="csrf-token"]').attr('content');
            $('tr.row1').each(function(index,element) {
                order.push({
                    id: $(this).attr('data-id'),
                    position: index+1
                });
            });

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('/link/order') }}",
                data: {
                    order: order,
                    _token: token
                },
                success: function(response) {
                    if (response.status == "success") {
                        console.log(response);
                        toastr['success'](data.message, '');
                        table.api().ajax.reload();
                    } else {
                        console.log(response);
                    }
                }
            });
        }
    });
</script>


</body>
</html>
