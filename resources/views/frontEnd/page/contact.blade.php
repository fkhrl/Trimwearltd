@extends('frontEnd.layout.master')
@section('title','Contact Us')
@section('content')
<section>
            <div class="second-page-container">
                <div class="block-breadcrumb">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Page</a></li>
                            <li class="active">Contact</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="container">
                        <div class="header-for-light">
                            <h1 class="wow fadeInRight animated" data-wow-duration="1s"><span>Contact</span> Information </h1>
                        </div>
                        <div class="row">
                            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="block-form box-border wow fadeInLeft animated" data-wow-duration="1s">
                                    <h3><i class="fa fa-thumb-tack"></i>Our Address</h3>
                                    <p>
                                        @if(isset($site)) {{$site->address}} @endif
                                    </p>
                                    <span id="ajaxMessage"></span>
                                    <hr>
                                    @if(!empty(session('status')))
                                         <div class="alert alert-danger">
                                             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                             {{ session('status') }}
                                             
                                         </div>
                                @endif

                                    <h3><i class="fa fa-envelope-o"></i>Send Message</h3>
                                    <div id="form-wrapper">
                                        <div id="form-inner">
                                            <form id="MyContactForm"  method="post" >
                                                <input type="hidden" name="ajaxURL" value="{{url('contact-request')}}">
                                                 {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputFirstName" class="control-label">Name:<span class="text-error">*</span></label>
                                                            <div>
                                                                <input type="text" class="form-control" name="name" id="name">
                                                                <label for="name" id="nameLb"><span class="error">*Name Field Required</span></label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputLastName" class="control-label">Email:<span class="text-error">*</span></label>
                                                            <div>
                                                                <input type="email"  class="form-control" name="email" id="email">
                                                                <label for="email" id="emailLb">
                                                                    <span class="error error1">*Email Field Required</span> 
                                                                    <span class="error error2">*Email Not Valid</span>
                                                                </label> 
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="inputSubject" class="control-label">Phone:<span class="text-error">*</span></label>
                                                            <div>
                                                                <input type="text" name="phone" class="form-control" id="phone">
                                                                <label for="phone" id="phoneLb"><span class="error">*Telephone Field Required</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="inputText" class="control-label">Message:<span class="text-error">*</span></label>
                                                            <div>
                                                                <textarea name="message" id="message" class="form-control" rows="4"></textarea>
                                                                <label for="message" id="messageLb"><span class="error">*Message Field Required</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <hr>
                                                <input type="submit" class="btn-default-1 contact-btn" value="Submit">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="block-form box-border wow fadeInRight animated" data-wow-duration="1s">
                                    <h3> <i class="fa fa-adn"></i>Map</h3>
                                    <hr>
                                    <div class="google-map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.4355343219863!2d90.37899291456449!3d23.874169884528538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c416c0184d51%3A0xaa7a23366fc31bad!2sSonargaon+Janapath%2C+Dhaka+1230!5e0!3m2!1sen!2sbd!4v1527068461478" style="overflow:hidden;height:100%;width:100%;" frameborder="0"allowfullscreen></iframe>
                                        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d335900.93392687745!2d2.3504871190777603!3d48.87296719673322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2s!4v1394030722365" style="overflow:hidden;height:100%;width:100%;" frameborder="0" ></iframe> --}}
                                    </div>

                                </div>
                            </article>

                        </div>
                    </div>
                </div>
            </div> 
        </section>


@endsection
@section('js')
<script src="{{url('js/vendor/contact.js')}}"></script>
@endsection