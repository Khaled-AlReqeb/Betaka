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
                            <i class="fa fa-plus font-dark"></i>
                            <span class="caption-subject bold uppercase"> Test</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        {!! Form::open(['method'=>'post','class'=>'form-horizontal','files'=>true,'id'=>'form']) !!}
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div class="form-body">

                                <div class="tab-content">


                                    <div class="row">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">Image</label>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new"
                                                             data-provides="fileinput">
                                                            <div class="fileinput-preview thumbnail"
                                                                 data-trigger="fileinput"
                                                                 style="width: 200px; height: 150px;">
                                                                <img
                                                                    src="url('assets/apps/img/unknown.png')}}"
                                                                    alt=""/>

                                                            </div>
                                                            <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> choose </span>
                                                                <span class="fileinput-exists"> change </span>
                                                                <input type="file" name="image"
                                                                       id="image"> </span>
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

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-2">title:</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="title" id="title"
                                                           class="form-control"
                                                           placeholder="Add title...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                            <!-- END FORM-->
                                        </div>

                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-circle green btn-md save">
                                                <i class="fa fa-check"></i>
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

            <script src="{{url(assets('admin'))}}/js/test.js" type="text/javascript"></script>

        <script>
            //    $(document).ready(function () {
            //        $('.select2').select2();

            $("#checkAll").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);

            });

            $(".all_category").click(function () {
                var data_category = $(this).attr('data-category');
                $('input:checkbox.'+data_category).not(this).prop('checked', this.checked);

            });
            //    });
        </script>

@stop
