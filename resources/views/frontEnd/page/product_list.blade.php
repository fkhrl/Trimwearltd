@extends('frontEnd.layout.master')
@section('title','Product')
@section('content')
<section>
    <div class="second-page-container">

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="block-breadcrumb">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li>@yield('title')</li>
                            
                        </ul>
                    </div>
                    <div class="block-blog">
                       
                        <div class="block" style="padding: 0px;">
                            <div class="header-for-light">
                                <h2 class="wow fadeInRight animated" data-wow-duration="1s"> @if(isset($pro)) {{$pro->name}} @endif</span></h2>
                                <hr>
                            </div>
                            <p class="wow fadeInRight animated" data-wow-duration="2s">
                                @if(isset($pro))
                                <?= html_entity_decode($pro->Details); ?>
                                @endif
                            </p>
                        </div>
                        
                    </div>
                </div>
                <aside class="col-md-3">
                    <div class="main-category-block wow fadeInLeft animated "data-wow-duration="1s">
                        <div class="main-category-title">
                            <i class="fa fa-list"></i> Catalog

                        </div>

                        <div class="widget-block">
                            <ul class="list-unstyled ul-side-category">
                                    @if(isset($cat))
                                    @foreach($cat as $ca)
                                    <li><a href=""><i class="fa fa-angle-right"></i> {{$ca['name']}}</a>
                                        <ul class="sub-category">
                                            @if(isset($ca['scat']))
                                            @foreach($ca['scat'] as $sca)
                                            <li><a href="{{url('category/'.$ca['id'].'/subcategory/'.$sca['id'].'/'.$sca['name'])}}">{{$sca['name']}}</a></li>
                                            @endforeach
                                            @endif
                                            
                                        </ul>
                                    </li>
                                    @endforeach
                                    @endif

                                </ul>
                        </div>
                    </div>
                </aside>

            </div>
        </div>  
    </div>

</section>

@endsection