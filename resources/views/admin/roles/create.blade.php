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
                            <span class="caption-subject bold uppercase"> Roles</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        {!! Form::open(['method'=>'post','class'=>'form-horizontal','files'=>true,'id'=>'form']) !!}
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div class="form-body">

                                <div class="tab-content">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Name:</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="name" id="name"
                                                           class="form-control"
                                                           placeholder="Add name...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group form-md-line-input">
                                        <label class="col-md-2 control-label" for="form_control_1">Admin permissions</label>
                                        <div class="col-md-10">
                                            <div class="md-checkbox-inline">
                                                <div class="md-checkbox note note-success" style="width: 100%;background-color: lightgreen">
                                                    <input   id="checkAll" type="checkbox" class="md-check">
                                                    <label for="checkAll">
                                                        <span></span>
                                                        <span class="check" style="margin-top: 15px;margin-left: 10px"></span>
                                                        <span class="box" style="margin-top: 15px;margin-left: 10px"></span> <b>Choose all</b> </label>
                                                </div>
                                                <?php $category=[]; ?>
{{--                                                {{ dd($permissions) }}--}}
{{--                                                @foreach($permissions as $permission)--}}
{{--                                                    @if(!in_array($permission->category,$category))--}}

{{--                                                <div class="md-checkbox">--}}
{{--                                                    <input type="checkbox" id="{{ $permission->category }}" class="all_category md-check" data-category="{{$permission->category}}">--}}
{{--                                                    <label for="{{ $permission->category }}">--}}
{{--                                                        <span></span>--}}
{{--                                                        <span class="check"></span>--}}
{{--                                                        <span class="box"></span> {{ $permission->category }} </label>--}}
{{--                                                </div>--}}
{{--                                                    @endif--}}
{{--                                                @endforeach--}}
                                                <hr>
                                                        @foreach($permissions as $permission)
                                                    @if(!in_array($permission->category,$category))

                                                        <div class="md-checkbox note note-success" style="width: 100%">
                                                            <input type="checkbox" id="{{ $permission->category }}" class="all_category md-check" data-category="{{$permission->category}}">
                                                            <label for="{{ $permission->category }}">
                                                                <span></span>
                                                                <span class="check" style="margin-top: 15px;margin-left: 10px"></span>
                                                                <span class="box" style="margin-top: 15px;margin-left: 10px"></span> <b>Choose {{ $permission->category }} permissions</b> </label>
                                                        </div>
{{--                                                        <br>--}}

                                                    @endif


                                                        <div class="md-checkbox" style="margin-bottom: 20px">
                                                            <?php $category[]= $permission->category ;?>
                                                                <input class="{{$permission->category}}" id="{{ $permission->name }}"  name="permissions[]" value="{{$permission->id}}" type="checkbox">
                                                            <label for="{{ $permission->name }}">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> {{ $permission->name }} </label>
                                                        </div>
{{--                                                        <br>--}}
{{--                                                        <hr>--}}
                                                     @endforeach
                                                <hr>

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

            <script src="{{url(assets('admin'))}}/js/roles.js" type="text/javascript"></script>

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
