@extends(admin_layout_vw().'.index')

@section('css')

    <link href="{{url(assets('admin'))}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>

@endsection
@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-md-12">


                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-edit font-dark"></i>
                            <span class="caption-subject bold uppercase"> Website Settings</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        {!! Form::open(['method'=>'put','class'=>'form-horizontal','files'=>true,'id'=>'form']) !!}
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Settings( contact us data )</h3>
                                </div>
                                <div class="col-md-12">


                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light ">
{{--                                        <div class="portlet-title">--}}
{{--                                            <div class="caption font-dark">--}}
{{--                                                <i class="fa fa-edit font-dark"></i>--}}
{{--                                                <span class="caption-subject bold uppercase"> Settings( contact us data )</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="portlet-body">

                                            {!! Form::open(['method'=>'put','class'=>'form-horizontal','files'=>true,'id'=>'form']) !!}
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <div class="form-body">
                                                    {{--                                <ul class="nav nav-tabs">--}}

                                                    {{--                                    @foreach(config('languages.name') as $key => $lang)--}}
                                                    {{--                                        <li @if($loop->first) class="active" @endif>--}}
                                                    {{--                                            <a href="#tab_{{$key}}" data-toggle="tab"> {{ucfirst($lang)}} </a>--}}
                                                    {{--                                        </li>--}}
                                                    {{--                                    @endforeach--}}

                                                    {{--                                </ul>--}}
                                                    <div class="tab-content">

                                                        @foreach(config('languages.name') as $key => $lang)

                                                            <div class="tab-pane fade @if($loop->first) active in @endif "
                                                                 id="tab_{{$key}}">

                                                                <input type="hidden" name="language" value="{{$key}}">



                                                                <div class="row">

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">youtube url ({{$lang}}
                                                                                ):</label>
                                                                            <div class="col-md-9">
                                                                                <input type="url" name="youtube_url[{{$key}}]" id="title"
                                                                                       class="form-control"
                                                                                       value="{{$settings->translation($key)->youtube_url ?? ''}}"
                                                                                       placeholder="Add youtube url ({{$lang}})...">

                                                                                <small> Just embed <b> SRC </b> video from youtube</small>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">facebook url ({{$lang}}
                                                                                ):</label>
                                                                            <div class="col-md-9">
                                                                                <input type="url" name="facebook_url[{{$key}}]" id="title"
                                                                                       class="form-control"
                                                                                       value="{{$settings->translation($key)->facebook_url ?? ''}}"
                                                                                       placeholder="Add facebook url ({{$lang}})...">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Instagram url ({{$lang}}
                                                                                ):</label>
                                                                            <div class="col-md-9">
                                                                                <input type="url" name="instagram_url[{{$key}}]" id="title"
                                                                                       class="form-control"
                                                                                       value="{{$settings->translation($key)->instagram_url ?? ''}}"
                                                                                       placeholder="Add instagram url ({{$lang}})...">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Twitter url ({{$lang}}
                                                                                ):</label>
                                                                            <div class="col-md-9">
                                                                                <input type="url" name="twitter_url[{{$key}}]" id="title"
                                                                                       class="form-control"
                                                                                       value="{{$settings->translation($key)->twitter_url ?? ''}}"
                                                                                       placeholder="Add twitter url ({{$lang}})...">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Linkenin url ({{$lang}}
                                                                                ):</label>
                                                                            <div class="col-md-9">
                                                                                <input type="url" name="linkenin_url[{{$key}}]" id="title"
                                                                                       class="form-control"
                                                                                       value="{{$settings->translation($key)->linkenin_url ?? ''}}"
                                                                                       placeholder="Add linkenin url ({{$lang}})...">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Phone number 1 ({{$lang}}
                                                                                ):</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" name="phone_1[{{$key}}]" id="title"
                                                                                       class="form-control"
                                                                                       value="{{$settings->translation($key)->phone_1 ?? ''}}"
                                                                                       placeholder="Add phone number 1({{$lang}})...">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">phone number 2 ({{$lang}}
                                                                                ):</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" name="phone_2[{{$key}}]" id="title"
                                                                                       class="form-control"
                                                                                       value="{{$settings->translation($key)->phone_2 ?? ''}}"
                                                                                       placeholder="Add phone number 2 ({{$lang}})...">

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Email ({{$lang}}
                                                                                ):</label>
                                                                            <div class="col-md-9">
                                                                                <input type="email" name="email[{{$key}}]" id="title"
                                                                                       class="form-control"
                                                                                       value="{{$settings->translation($key)->email ?? ''}}"
                                                                                       placeholder="Add email ({{$lang}})...">

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <!-- END FORM-->
                                                            </div>

                                                        @endforeach
                                                    </div>
                                            </div>
                                        </div>
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                    </div>
                                </div>
                            </div>
                                @can('Add settings')
                            <div class="form-body">
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-circle green btn-md save">
                                                <i class="fa fa-check"></i>
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endcan
                            {!! Form::close() !!}


                            <div class="clearfix margin-bottom-20"></div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    @endsection

    @section('js')
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="{{url(assets('admin'))}}/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"
                    type="text/javascript"></script>

            <script src="{{url(assets('admin'))}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
                    type="text/javascript"></script>
            <script src="{{url(assets('admin'))}}/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->


            <script src="{{url(assets('admin'))}}/js/settings.js" type="text/javascript"></script>


            <script>
                $(document).ready(function()
                {
                    @foreach(config('languages.name') as $key => $lang)
                    CKEDITOR.replace('facebook_url[{{$key}}]');
                    CKEDITOR.replace('instagram_url[{{$key}}]');
                    CKEDITOR.replace('twitter_url[{{$key}}]');
                    CKEDITOR.replace('linkenin_url[{{$key}}]');
                    CKEDITOR.replace('phone_1[{{$key}}]');
                    CKEDITOR.replace('phone_2[{{$key}}]');
                    CKEDITOR.replace('email[{{$key}}]');
                    @endforeach

                });
            </script>


@stop
