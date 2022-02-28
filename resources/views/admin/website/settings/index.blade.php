@extends(admin_layout_vw().'.index')

@section('css')

    <link href="{{url(assets('admin'))}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>

    <style>
         .control-label {
            text-align: left !important;
        }
    </style>
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
                            <span class="caption-subject bold uppercase"> Settings</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        {!! Form::open(['method'=>'put','class'=>'form-horizontal','files'=>true,'id'=>'form']) !!}
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Website Settings</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">Logo Image</label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new"
                                                         data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail"
                                                             data-trigger="fileinput"
                                                             style="width: 200px; height: 150px;">
                                                            <img
                                                                    src="{{$settings->logo_image ?? url('assets/apps/img/unknown.png')}}"
                                                                    alt=""/>

                                                        </div>
                                                        <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> choose </span>
                                                                <span class="fileinput-exists"> change </span>
                                                                <input type="file" name="logo_image"
                                                                       id="logo_image"> </span>
                                                            <a href="javascript:;"
                                                               class="btn red fileinput-exists"
                                                               data-dismiss="fileinput">
                                                                cancel </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <ul class="nav nav-tabs">

                                        @foreach(config('languages.name') as $key => $lang)
                                            <li @if($loop->first) class="active" @endif>
                                                <a href="#tab_{{$key}}" data-toggle="tab"> {{ucfirst($lang)}} </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <div class="tab-content">

                                        @foreach(config('languages.name') as $key => $lang)

                                            <div class="tab-pane fade @if($loop->first) active in @endif "
                                                 id="tab_{{$key}}">

                                                <input type="hidden" name="language" value="{{$key}}">

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Header title({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="header_title[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add header title ({{$lang}})...">{{$settings->translation($key)->header_title ?? ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Header subTitle ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="header_subTitle[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add header subTitle ({{$lang}})...">{{$settings->translation($key)->header_subTitle ?? ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Sectors title ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="sector_title[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add sectors title ({{$lang}})...">{{$settings->translation($key)->sector_title ?? ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">About us title ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="about_title[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add about us title  ({{$lang}})...">{{$settings->translation($key)->about_title ?? ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">About us content({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="about_content[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add about us content ({{$lang}})...">{{$settings->translation($key)->about_content ?? ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Investor title({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="investor_title[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add investor title ({{$lang}})...">{{$settings->translation($key)->investor_title ?? ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Investor content ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="investor_content[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add investor content ({{$lang}})...">{{$settings->translation($key)->investor_content ?? ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Teams title ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="team_title[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add teams title ({{$lang}})...">{{$settings->translation($key)->team_title ?? ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Partners title({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="partner_title[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add partners title ({{$lang}})...">{{$settings->translation($key)->partner_title ?? ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Projects title({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="project_title[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add projects title ({{$lang}})...">{{$settings->translation($key)->project_title ?? ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Footer content ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="footer_content[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add footer content ({{$lang}})...">{{$settings->translation($key)->footer_content ?? ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Address ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                 <input type="text" name="address[{{$key}}]"
                                                                           id="description"
                                                                           class="form-control"
                                                                          value="{{$settings->translation($key)->address ?? ''}}"
                                                                           placeholder="Add description ({{$lang}})...">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Terms conditions({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                 <textarea type="text" name="terms[{{$key}}]"
                                                                           id="description"
                                                                           class="form-control"
                                                                           rows="5"
                                                                           placeholder="Add terms conditions ({{$lang}})...">{{$settings->translation($key)->terms ?? ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Privacy policy ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                 <textarea type="text" name="policy[{{$key}}]"
                                                                           id="description"
                                                                           class="form-control"
                                                                           rows="5"
                                                                           placeholder="Add privacy policy ({{$lang}})...">{{$settings->translation($key)->policy ?? ''}}</textarea>
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
            <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

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
                    CKEDITOR.replace('header_title[{{$key}}]');
                    CKEDITOR.replace('header_subTitle[{{$key}}]');
                    CKEDITOR.replace('sector_title[{{$key}}]');
                    CKEDITOR.replace('about_title[{{$key}}]');
                    CKEDITOR.replace('about_content[{{$key}}]');
                    CKEDITOR.replace('investor_title[{{$key}}]');
                    CKEDITOR.replace('investor_content[{{$key}}]');
                    CKEDITOR.replace('team_title[{{$key}}]');
                    CKEDITOR.replace('project_title[{{$key}}]');
                    CKEDITOR.replace('partner_title[{{$key}}]');
                    CKEDITOR.replace('footer_content[{{$key}}]');
                    CKEDITOR.replace('facebook_url[{{$key}}]');
                    CKEDITOR.replace('instagram_url[{{$key}}]');
                    CKEDITOR.replace('twitter_url[{{$key}}]');
                    CKEDITOR.replace('linkenin_url[{{$key}}]');
                    CKEDITOR.replace('phone_1[{{$key}}]');
                    CKEDITOR.replace('phone_2[{{$key}}]');
                    {{--CKEDITOR.replace('address[{{$key}}]');--}}
                    CKEDITOR.replace('terms[{{$key}}]');
                    CKEDITOR.replace('policy[{{$key}}]');
                    CKEDITOR.replace('email[{{$key}}]');
                    @endforeach

                });
            </script>
@stop
