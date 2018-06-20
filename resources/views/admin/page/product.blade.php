@extends('admin.layouts.master')
@section('title','Product')
@include('admin.include.msg')
@section('content')
<section id="file-exporaat">


    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-card-center">

                        @if(isset($edit))
                        <i class="icon-file-o"></i> Edit Product
                        @else
                        <i class="icon-file-o"></i> Add Product
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
                              action="{{url('/admin-product/update/'.$edit->id)}}"
                              @else
                              action="{{url('/admin-product-add/')}}"
                              @endif
                              " enctype="multipart/form-data">
                              {!! csrf_field() !!}
                              @if(isset($edit)) <input type="hidden" name="eximage" value="{{$edit->photo}}"> @endif
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Category Name</label>
                                <div class="col-md-9">
                                    <select id="cid" name="cid" class="form-control">

                                            <option selected="selected" disabled="">Select Category Name</option>
                                            @if(!empty($cat))
                                            @foreach($cat as $row)

                                                <option 
                                                @if(isset($edit)) 
                                                @if($edit->cid==$row->id) 
                                                selected="selected"
                                                @endif 
                                            @endif
                                                 value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Sub Category Name</label>
                                <div class="col-md-9">
                                    <select id="scid" name="scid" class="form-control">
                                        @if(isset($edit))
                                        <option value="">Select SubCategory Name</option>
                                        <option value="{{$scat->id}}" selected="selected">
                                            {{$scat->name}}
                                        </option>
                                        @else
                                            <option selected>Select SubCategory Name</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Product Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput1" class="form-control" placeholder="Product Name" name="name"
                                    @if(isset($edit))
                                           value="{{$edit->name}}" 
                                           @endif>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Product Photo</label>
                                <div class="col-md-9">
                                     @if(isset($edit))<img width="30%" class="card-img-top img-fluid" src="{{ URL::asset('upload/product/'.$edit->photo) }}">@endif
                                    <input type="file" class="form-control-file" name="photo" >
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput9">Product Details</label>
                                    <div class="col-md-9">
                                        <textarea rows="5" class="summernote" name="Details" placeholder="Compose News">
                                           @if(isset($edit))
                                          {{$edit->Details}} 
                                           @endif
                                        </textarea>
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
                    <h4 class="card-title"><i class="icon-file-o"></i> Product List</h4>
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
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Product Name</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($pro))
                                @foreach($pro as $row)
                                <tr>
                                    <td><?= $row->id; ?></td>
                                    <td><?= $row->cname; ?></td>
                                    <td><?= $row->sname; ?></td>
                                    <td><?= $row->name; ?></td>
                                    <td>
                                        <a href="{{url('admin-product/edit/'.$row->id)}}" title="Edit" class="btn btn-sm btn-outline-info"><i class="icon-pencil22"></i></a>
                                        <a  href="{{url('admin-product/delete/'.$row->id)}}" title="Delete" class="btn btn-sm btn-outline-danger"><i class="icon-cross"></i></a>

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

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/summernote.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/codemirror.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/theme/monokai.css')}}">

@endsection
@section('js')
<script src="{{asset('app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</script><script src="{{asset('app-assets//vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets//js/scripts/forms/select/form-select2.min.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/vendors/js/editors/codemirror/lib/codemirror.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/editors/codemirror/mode/xml/xml.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/editors/summernote/summernote.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/js/scripts/editors/editor-summernote.min.js')}}" type="text/javascript"></script>    

<script type="text/javascript">
    $(document).ready(function(){
        $('.summernote').summernote({
            height: 250, //set editable area's height
            placeholder: 'Product Details',
            codemirror: {// codemirror options
                theme: 'flatly'
            },
        });
// ajax load District
$("#cid").click(function () {
    
    var cid = $(this).val();
    if (cid == null || cid == 0)
    {
        var loadingscid = '<option value="0">Please Select Category</option>';
        $("#scid").html(loadingscid);
    } else
    {
        var loadingscid = '<option value="0">Loading Please Wait...</option>';
        $("#scid").html(loadingscid);
        $.post("{{url('ajax/subcatData')}}", {'cid': cid, '_token': '<?php echo csrf_token(); ?>'}, function (catdata) {
            //console.log(cdata);
            var loadingscid = '<option value="0">Please Select subCategory</option>';
            $.each(catdata, function (index, val) {
                //console.log(val);
                loadingscid += '<option value="' + val.id + '">' + val.name + '</option>';
            });
            var getlength = catdata.length;
            //console.log(getlength);
            if (getlength == 0)
            {
                var loadingscid = '<option value="0">Please Select Another Category</option>';
                $("#scid").html(loadingscid);
            } else
            {
                $("#scid").html(loadingscid);
            }
        });
    }
});
    });

</script>
@endsection
