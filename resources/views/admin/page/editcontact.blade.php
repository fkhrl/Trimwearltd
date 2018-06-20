@extends('admin.layouts.master')
@section('title','Reply Contact Request')
@include('admin.include.msg')
@section('content')
<section id="file-exporaat">


    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-card-center">
                        <i class="icon-file-o"></i> Reply Contact Request 
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
                              
                              action="{{url('/admin/contact/request/update/'.$edit->id)}}"
                              
                              " enctype="multipart/form-data">
                              {!! csrf_field() !!}
                              
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput1" class="form-control" placeholder="Name" name="name"
                                    @if(isset($edit))
                                           value="{{$edit->name}}" 
                                           @endif readonly="">
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Email</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput1" class="form-control" placeholder="Name" name="email"
                                    @if(isset($edit))
                                           value="{{$edit->email}}" 
                                           @endif readonly="">
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Phone</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput1" class="form-control" placeholder="Name" name="phone"
                                    @if(isset($edit))
                                           value="{{$edit->phone}}" 
                                           @endif readonly="">
                                </div>
                            </div>  
                            
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput9">Message Details</label>
                                    <div class="col-md-9">
                                        <textarea rows="5" class="form-control" name="message" readonly>
                                            @if(isset($edit))
                                                <?= html_entity_decode($edit->message); ?>
                                            @endif
                                        </textarea>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Your Email</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput1" class="form-control" placeholder="Name" name="currentemail"
                                    @if(isset($edit))
                                           value="{{ Auth::user()->email }}" 
                                           @endif >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput9">Reply Message</label>
                                    <div class="col-md-9">
                                        <textarea rows="5" class="form-control" name="reply" placeholder="Compose News">
                                            @if(isset($edit))
                                                <?= html_entity_decode($edit->reply); ?>
                                            @endif
                                        </textarea>
                                    </div>
                            </div>

                            <div class="form-actions center">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="icon-cross2"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Sent
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</section>

@endsection
