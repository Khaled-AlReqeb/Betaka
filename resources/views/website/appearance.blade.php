<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="ar"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="ar"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ar" dir="rtl"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>المظهر الخارجي</title>
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
                <a href="{{ route('link' , ['id' => auth()->user()->id]) }}" title="الروابط">روابطي</a>
                <a href="{{ route('appearance' , ['id' => auth()->user()->id]) }}" title="المظهر الخارجي" class="active">المظهر الخارجي</a>
                <a href="{{ route('add.link' , ['id' => auth()->user()->id]) }}" title="المظهر الخارجي">إضافة روابط</a>

            </div><!-- position-absolute -->
            <div class="share_link">
                رابط بطاقتي : <a href="{{ url('/'.auth()->user()->name) }}" title="#" target="_blank">https://betaka.com/{{ auth()->user()->name }}</a>
            </div><!-- share_link -->
        </nav><!-- nav -->
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                <div class="appearance_page">
                    <form action="{{ route('profileImage.update' , [$user->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                    <div class="change_avatar bg-white rounded-lg border p-3 d-flex align-items-center justify-content-start my-4">
                        <div class="imgthumb">
                             @if(auth()->user()->image == '')
                            <img src="https://d1fdloi71mui9q.cloudfront.net/uSp49IdiTjmtahkyylrE_3r8h90Btr108i87t" id="avatar_img">
                             @else
                            <img src="{{ auth()->user()->image }}" value="{{ auth()->user()->image }}" id="avatar_img">
                            @endif
                        </div><!-- imgthumb -->
                        <div class="desc d-flex align-items-start justify-content-center flex-column align-self-stretch">
                            <div class="buttons_area d-flex align-items-center justify-content-start mb-3">
                                <div class="add_avatar">
                                    <input type="file" name="image" value="{{ auth()->user()->image }}" onchange="readURL(this);" /> حمل صورة
                                </div><!-- add_avatar -->
                                <button type="button" class="remove_avatar" onclick="deleteImage()">مسح</button>
                            </div><!-- buttons_area -->
                            <div class="profile_title">
                                <input type="text" name="userName" value="{{ auth()->user()->userName }}" class="profile-field" placeholder="{{ auth()->user()->userName }}">
                                <span class="profile-txt">عنوان الملف الشخصي</span>
                                <i></i>
                            </div><!-- profile_title -->
                        </div><!-- d-flex -->
                        <button  class="btn btn-primary" style="background-color: #01cedb;border-style: none" type="submit">حفظ</button>
                        <?php
                           $imageName = explode('http://localhost/betaka/public/upload/', auth()->user()->image)
                        ?>
{{--                        {{ dd($imageName[1]) }}--}}
                        @if(auth()->user()->image != '')
                        <input type="text" class="form-control" name="imageName"  value="{{ $imageName[1] }}" hidden>
                        @endif
                    </div><!-- change_avatar -->
                    </form>

                    <form action="{{ route('users.background.update' , [$user->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}

                    <h5 class="text-body">المظهر</h5>
                    <div class="border bg-white rounded-lg p-3 mb-4">
                        <div class="appearance_blocks">
                            <label for="custom_radio">
                                <input type="radio" id="custom_radio" name="imageUrl" value="" {{ isset($user) && $user->{'imageUrl'} == '' ? 'checked' :'' }}>
                                <div class="card_item image-0"></div>
                            </label>
                            <label for="card-1">
                                <input type="radio" class="colourway" name="imageUrl" value="card-1" id="card-1" {{ isset($user) && $user->{'imageUrl'} == 'card-1' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-1.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                            <label for="card-2">
                                <input type="radio" class="colourway" name="imageUrl" value="card-2" id="card-2" {{ isset($user) && $user->{'imageUrl'} == 'card-2' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-2.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                            <label for="card-3">
                                <input type="radio" class="colourway" name="imageUrl" value="card-3" id="card-3" {{ isset($user) && $user->{'imageUrl'} == 'card-3' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-3.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                            <label for="card-4">
                                <input type="radio" class="colourway" name="imageUrl" value="card-4" id="card-4" {{ isset($user) && $user->{'imageUrl'} == 'card-4' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-4.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                            <label for="card-5">
                                <input type="radio" class="colourway" name="imageUrl" value="card-5" id="card-5" {{ isset($user) && $user->{'imageUrl'} == 'card-5' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-5.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                            <label for="card-6">
                                <input type="radio" class="colourway" name="imageUrl" value="card-6" id="card-6" {{ isset($user) && $user->{'imageUrl'} == 'card-6' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-6.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                            <label for="card-7">
                                <input type="radio" class="colourway" name="imageUrl" value="card-7" id="card-7" {{ isset($user) && $user->{'imageUrl'} == 'card-7' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-7.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                            <label for="card-8">
                                <input type="radio" class="colourway" name="imageUrl" value="card-8" id="card-8" {{ isset($user) && $user->{'imageUrl'} == 'card-8' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-8.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                            <label for="card-9">
                                <input type="radio" class="colourway" name="imageUrl" value="card-9" id="card-9" {{ isset($user) && $user->{'imageUrl'} == 'card-9' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-9.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                            <label for="card-10">
                                <input type="radio" class="colourway" name="imageUrl" value="card-10" id="card-10" {{ isset($user) && $user->{'imageUrl'} == 'card-10' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-10.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                            <label for="card-11">
                                <input type="radio" class="colourway" name="imageUrl" value="card-11" id="card-11" {{ isset($user) && $user->{'imageUrl'} == 'card-11' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-11.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                            <label for="card-12">
                                <input type="radio" class="colourway" name="imageUrl" value="card-12" id="card-12" {{ isset($user) && $user->{'imageUrl'} == 'card-12' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-12.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                            <label for="card-13">
                                <input type="radio" class="colourway" name="imageUrl" value="card-13" id="card-13" {{ isset($user) && $user->{'imageUrl'} == 'card-13' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-13.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                            <label for="card-14">
                                <input type="radio" class="colourway" name="imageUrl" value="card-14" id="card-14" {{ isset($user) && $user->{'imageUrl'} == 'card-14' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-14.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                            <label for="card-15">
                                <input type="radio" class="colourway" name="imageUrl" value="card-15" id="card-15" {{ isset($user) && $user->{'imageUrl'} == 'card-15' ? 'checked' :'' }}>
                                <div class="card_item">
                                    <div class="card_iside">
                                        <img src="{{url('/')}}/assets/website/assets/images/appearance/bg-15.jpg" alt="#">
                                        <div class="buttons">
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                            <div class="button_link"></div>
                                        </div><!-- buttons -->
                                    </div><!-- card_iside -->
                                </div><!-- card_item -->
                            </label>
                        </div><!-- appearance_blocks -->
                    </div><!-- border -->

                        <button class="btn btn-primary col-lg-6 col-md-3 col-sm-3" type="submit" style="margin-right: 153px ;border-style: none; background-color: #01cedb">حفظ</button>
                    </form>

                    @if(auth()->user()->imageUrl == '')
                    <form action="{{ route('users.uploadBackground.update' , [$user->id]) }}" method="post" enctype="multipart/form-data" style="display: block">
                        @else
                    <form action="{{ route('users.uploadBackground.update' , [$user->id]) }}" method="post" enctype="multipart/form-data" style="display: none">
                        @endif
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                    <section id="custom-appearance" class="mt-5">
                        <h5 class="text-body">تخصيص المظهر</h5>
                        <div class="border bg-white rounded-lg p-3 mb-4">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-7 col-lg-5 col-xl-4">
                                    <label>تحميل صورة</label>
                                    <div class="upload_image_customize">
                                      @if(auth()->user()->backgroundImage == '')
                                        <img src="https://d1fdloi71mui9q.cloudfront.net/uSp49IdiTjmtahkyylrE_3r8h90Btr108i87t" id="image_customize">
                                            <input type="text" value="https://d1fdloi71mui9q.cloudfront.net/uSp49IdiTjmtahkyylrE_3r8h90Btr108i87t">
                                      @else
                                            <?php
                                            $backgroundName = explode('http://localhost/betaka/public/upload/', auth()->user()->backgroundImage)
                                            ?>
                                        <img src="{{ auth()->user()->backgroundImage }}"  id="image_customize">
                                          <input type="text" name="backgroundImageValue" value="{{ $backgroundName[1] }}">
                                      @endif
                                        <input type="file" name="backgroundImage" onchange="imageCustomize(this);" />
                                    </div><!-- upload_image_customize -->
                                </div><!-- col-12 -->
                                <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                    <div class="color_customize">
                                        <label>لون الخلفية</label>
                                        <input id="mycolor" name="color" class="colorPicker evo-cp0" />
                                    </div><!-- color_customize -->
                                </div><!-- col-12 -->
                            </div><!-- row -->
                            <button  class="btn btn-primary" type="submit" style="float: left; margin-top: -35px; background-color: #01cedb ;border-style: none">حفظ</button>
                        </div><!-- border -->
                    </section><!-- custom-appearance -->
                    </form>
                </div><!-- appearance_page -->
            </div><!-- col-12 -->

{{--            @if(auth()->user()->imageUrl == '')--}}
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


<script>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
    }
</script>

<script type="text/javascript">
    function Copy()
    {
        //var Url = document.createElement("textarea");
        urlCopied.innerHTML = window.location.href;
        //Copied = Url.createTextRange();
        //Copied.execCommand("Copy");
    }
</script>
<script>
    var popupMeta = {
        width: 400,
        height: 400
    }
    jQuery(document).on('click', '.social-share', function(event){
        event.preventDefault();

        var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
            hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

        var url = $(this).attr('href');
        var popup = window.open(url, 'Social Share',
            'width='+popupMeta.width+',height='+popupMeta.height+
            ',left='+vPosition+',top='+hPosition+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            return false;
        }
    });
</script>

<script>
    $('.colourway').click(function () {
        $(".backgroundImage").css({"background-image": ""});
    });
    $('.colourway').click(function () {
        $(".backgroundColor").css({"background-color": ""});
    });

</script>


</body>
</html>
