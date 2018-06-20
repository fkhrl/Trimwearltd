@extends('admin.layouts.master')
@section('title','Dashboard')
@include('admin.include.msg')
@section('content')
<section class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-head">
            <div class="card-header">
               <h4 class="card-title">Dashboard</h4>
               <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
               
            </div>  
         </div>
         <!-- project-info -->
         <div id="project-info" class="card-block row">
            <div class="project-info-count col-lg-4 col-md-12">
               <div class="project-info-icon">
                  <h2>{{$countuser}}</h2>
                  <div class="project-info-sub-icon">
                     <span class="icon-head"></span>
                  </div>
               </div>
               <div class="project-info-text pt-1">
                  <h5>Users</h5>
               </div>
            </div>
            <div class="project-info-count col-lg-4 col-md-12">
               <div class="project-info-icon">
                  <h2>
                    {{$todayproduct}}
                    </h2>
                  <div class="project-info-sub-icon">
                     <span class="icon-check2"></span>
                  </div>
               </div>
               <div class="project-info-text pt-1">
                  <h5>Today Product</h5>
               </div>
            </div>
            <div class="project-info-count col-lg-4 col-md-12">
               <div class="project-info-icon">
                  <h2>{{$allpro}}</h2>
                  <div class="project-info-sub-icon">
                     <span class="icon-product-hunt"></span>
                  </div>
               </div>
               <div class="project-info-text pt-1">
                  <h5>Total Product</h5>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section>
   <!-- Both borders end-->
    <div class="row">
        <div class="col-xs-12">                                            
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="icon-file-o"></i>Today Contact Request</h4>
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
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($contact))
                                @foreach($contact as $row)
                                <tr>
                                    <td><?= $row->id; ?></td>
                                    <td><?= $row->name; ?></td>
                                    <td><?= $row->phone; ?></td>
                                    <td><?= $row->email; ?></td>
                                    <td><?= $row->message; ?></td>
                                    <td>
                                        <a href="{{url('admin/contact/request/edit/'.$row->id)}}" title="Reply" class="mr-1 mb-1 btn btn-outline-success"><i class="icon-search"></i> Reply</a>

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
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/project.min.css')}}">
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


@endsection
@section('js')
<script src="{{asset('app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}" type="text/javascript"></script>

@endsection


