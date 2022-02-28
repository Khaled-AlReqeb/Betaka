<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="ar"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="ar"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ar" dir="rtl"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>حسابي</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- App favicon -->

    @include('website.layout.css')

</head>
<body>

{{--@include('website.layout.nav_auth')--}}

    <?php
    $imageName = explode('card-',$user->imageUrl)
    ?>

     @if($user->imageUrl == '' && $user->color == '' && $user->backgroundImage == '')
        <section id="show_page" class="bg-1">
     @elseif($user->imageUrl != '' && $user->color == '' && $user->backgroundImage == '')
        <section id="show_page" class="bg-{{$imageName[1]}}">
     @elseif($user->imageUrl == '' && $user->color != '' && $user->backgroundImage == '')
        <section id="show_page"  style="background-color:{{ $user->color }} !important;">
     @elseif($user->imageUrl == '' && $user->color == '' && $user->backgroundImage != '')
        <section id="show_page" style="background-image: url({{ $user->backgroundImage }}) !important;">
     @elseif($user->imageUrl != '' && $user->color != '' && $user->backgroundImage != '')
        <section id="show_page" class="bg-{{$imageName[1]}}">
     @elseif($user->imageUrl != '' && $user->color != '' && $user->backgroundImage == '')
                <section id="show_page" class="bg-{{$imageName[1]}}">
     @elseif($user->imageUrl == '' && $user->color != '' && $user->backgroundImage != '')
        <section id="show_page"  style="background-image: url({{ $user->backgroundImage }}) !important;">
     @elseif($user->imageUrl != '' && $user->color == '' && $user->backgroundImage != '')
        <section id="show_page" class="bg-{{$imageName[1]}}">
     @endif

        <div class="container align-items-center justify-content-center">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                <div class="show_card text-center">
                    <div class="user_area">
                        <div class="imgthumb">
                            @if($user->image != '')
                            <img class="user-img" src="{{$user->image}}" alt="Profile Image">
                            @else
                             <img class="user-img" src="https://d1fdloi71mui9q.cloudfront.net/uSp49IdiTjmtahkyylrE_3r8h90Btr108i87t" alt="Profile Image">
                            @endif
                        </div><!-- imgthumb -->
                        <h3>{{'@'.$user->name}}</h3>
                    </div><!-- user_area -->
                    <div class="links">
                        @foreach($links as $link)
                        <div class="link">
                            <a href="{{ $link->link }}" target="_blank" data-toggle="tooltip" data-original-title="Delete" data-id="{{$link->id}}"  class="btn btn-link" rel="noopener" id="viewBtn">
                                {{ $link->title }}

                            </a>
                        </div><!-- link -->
                        @endforeach
                    </div><!-- links -->
                </div><!-- show_card -->
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
    <div class="show_copyrights">
        <a href="{{url('/website')}}" title="#">
            <img src="{{url('/')}}/assets/website/assets/images/logo.png" alt="#">
        </a>
    </div><!-- show_copyrights -->
</section><!-- show_page -->


@include('website.layout.js')

<script type="text/javascript">
                    $('body').on('click', '#viewBtn', function () {

                        var link_id = $(this).data('id');
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "PUT",
                            url: "{{ url('click/view') }}"+'/'+link_id,
                            success: function (data) {
                                // $("#alert-delete").modal('show');
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
