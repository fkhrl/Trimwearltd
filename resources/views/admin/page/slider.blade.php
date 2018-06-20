@extends('admin.layouts.master')
@section('title','Slider')
@include('admin.include.msg')
@section('content')
<section id="file-exporaat">


    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-card-center">

                        @if(isset($edit))
                        <i class="icon-user-plus"></i> Edit Slider
                        @else
                        <i class="icon-user-plus"></i> Add Slider
                        @endif
                    </h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <form class="form" method="post" 
                              @if(isset($edit))
                              action="{{url('/admin-slider/update/'.$edit->id)}}"
                              @else
                              action="{{url('/admin-slider-add/')}}"
                              @endif
                              " enctype="multipart/form-data">
                              {!! csrf_field() !!}
                              @if(isset($edit)) <input type="hidden" name="eximage" value="{{$edit->photo}}"> @endif
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Title</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput1" class="form-control" placeholder="Slider Name" name="title" 
                                    @if(isset($edit))
                                           value="{{$edit->title}}" 
                                           @endif>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Photo</label>
                                <div class="col-md-9">
                                    @if(isset($edit))<img width="30%" class="card-img-top img-fluid" src="{{ URL::asset('upload/slider/'.$edit->photo) }}">@endif
                                    <input type="file" id="projectinput1" class="form-control-file" name="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Product Link</label>
                                <div class="col-md-9">
                                    <select name="pid" class="select2 form-control">

                                            <option selected="selected" disabled="">Select Product</option>
                                            @if(isset($pro))
                                            @foreach($pro as $row)
                                            <option 
                                            @if(isset($edit)) 
                                                @if($edit->pid==$row->id) 
                                                selected="selected"
                                                @endif 
                                            @endif
                                            value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                </div>
                            </div>
                            <div class="form-actions center">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="icon-cross2"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Both borders end-->
    <div class="row">
        <div class="col-xs-12">                                            
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="icon-file-o"></i> Slider List</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Slider Name</th>
                                    <th>Image</th>
                                    <th width="300">Product Name</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($slider))
                                @foreach($slider as $row)
                                <tr>
                                    <td><?= $row->id; ?></td>
                                    <td>
                                        <?php
                                            if($row->title=='0'){
                                                echo '<span class="tag tag-default tag-defult">Name Not Found !</span>';
                                            }else{
                                                echo $row->title;
                                            }
                                        ?>
                                         
                                     </td>
                                    <td><img width="30%" class="card-img-top img-fluid" src="{{ URL::asset('upload/slider/'.$row->photo) }}"></td>
                                    <td><?= $row->proname; ?></td>
                                    <td>
                                        <a href="{{url('admin-slider/edit/'.$row->id)}}" title="Edit" class="btn btn-sm btn-outline-info"><i class="icon-pencil22"></i></a>
                                        <a  href="{{url('admin-slider/delete/'.$row->id)}}" title="Delete" class="btn btn-sm btn-outline-danger"><i class="icon-cross"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Both borders end -->


</section>

@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">   
<style type="text/css">
    div.dataTables_length{
        padding-left: 10px;
        padding-top: 15px;
    }

    .dataTables_length>label{
        margin-bottom: 0px !important;
        display:block !important;
    }

    div.dataTables_filter
    {
        padding-right: 10px;
    }

    div.dataTables_info{
        padding-left: 10px;
    }

    div.dataTables_paginate{
        padding-right: 10px;
        padding-top: 5px;
    }


</style>
<link rel="stylesheet" type="text/css" href="{{asset('app-assets//vendors/css/forms/selects/select2.min.css')}}">


@endsection
@section('js')
<script src="{{asset('app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</script><script src="{{asset('app-assets//vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets//js/scripts/forms/select/form-select2.min.js')}}" type="text/javascript"></script>


@endsection
