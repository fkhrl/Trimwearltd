@extends('admin.layouts.master')
@section('title','SEO Setting')
@include('admin.include.msg')
@section('content')
<section id="file-exporaat">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic"><i class="icon-file-o"></i>
                       
                       @if(isset($edit))
                        Edit SEO Setting
                       @else
                       Add SEO Setting
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
                        <form class="form form-horizontal" method="post" 
                            @if(isset($edit))
                              action="{{url('/admin-seosetting/update/'.$edit->id)}}"
                              @else
                              action="{{url('/admin-seosetting-add/')}}"
                              @endif
                       enctype="multipart/form-data" >
                       
                       {!! csrf_field() !!}
                            <div class="form-body">
                                
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput1">Keywords</label>
                                    <div class="col-md-9">
                                        <textarea id="projectinput9" rows="5" class="form-control" name="keywords" placeholder="keywords">@if(isset($edit)) {{$edit->keywords}} @endif</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput1">Description</label>
                                    <div class="col-md-9">
                                        <textarea id="projectinput9" rows="5" class="form-control" name="description" placeholder="Description">@if(isset($edit)) {{$edit->description}} @endif</textarea>
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
</div>

    <!-- Both borders end-->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="icon-file-o"></i> SEO Setting List</h4>
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
                                    <th>Keywords</th>
                                    <th>Description</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @if(!empty($seo))
                                @foreach($seo as $row)
                                <tr>
                                    <td><?= $row->id; ?></td>
                                    <td><?= $row->keywords; ?></td>
                                    <td><?= $row->description; ?></td>
                                    <td>
                                        <a href="{{url('admin-seosetting/edit/'.$row->id)}}" title="Edit" class="btn btn-sm btn-outline-info"><i class="icon-pencil22"></i></a>
                                        <a  href="{{url('admin-seosetting/delete/'.$row->id)}}" title="Delete" class="btn btn-sm btn-outline-danger"><i class="icon-cross"></i></a>

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
<!-- END VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">   


<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/checkboxes-radios.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/switch.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-switch.min.css')}}">
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
    .lbl {
        line-height: 25px;
        min-height: 18px;
        min-width: 18px;
        font-weight: normal;
    }
    .scrollbar{
        max-height: 207px;
        min-height: 207px;
        display: block;
        overflow:hidden;
    }
    .scrollbar:hover {
        overflow-y: scroll;
    }
    /* Let's get this party started */
    .scrollbar::-webkit-scrollbar {
        width: 8px;
    }

    /* Track */
    .scrollbar::-webkit-scrollbar-track {
        /*    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); */
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    /* Handle */
    .scrollbar::-webkit-scrollbar-thumb {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: #1d2b36; 
        /*    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); */
    }
    .scrollbar::-webkit-scrollbar-thumb:window-inactive {
        background: #1d2b36; 
    }
    .uploadimg img{
        max-width:220px;
        max-height: 115px;
    }
    .uploadimg input[type=file]{
        padding:10px;

    }
</style>


@endsection
@section('js')
<!-- END PAGE VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->


@endsection
