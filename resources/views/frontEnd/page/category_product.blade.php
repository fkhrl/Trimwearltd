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
                                    <li class="active">@yield('title')</li>
                                </ul>
                            </div>

                            <div class="header-for-light">
                                <h1 class="wow fadeInRight animated" data-wow-duration="1s">
                                    @if(isset($catName)) {{ $catName->name }} @endif</h1>

                            </div>
                        
                            <div class="row">
                                @if(isset($pro))
                                @if ($pro->isNotEmpty())
                                @foreach($pro as $p)
                                <div class="col-xs-12 col-sm-6 col-md-4 text-center mb-25">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay"> 
                                            <a href="{{url('/product/'.$p->id.'/'.$p->name)}}">
                                            <img style="max-height: 400px; min-height: 200px !important;" class="img-responsive" src="{{ URL::asset('upload/product/'.$p->photo) }}" alt="{{ $p->name }}" title="{{ $p->name }}">
                                        </a>
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="{{url('/product/'.$p->id.'/'.$p->name)}}" class="product-name">{{ $p->name }}</a>
                                            </div>
                                            
                                            {{-- <p class="description">{{ $p->name }}</p> --}}
                                        </div>

                                    </article>
                                </div>
                                @endforeach
                                @else
                                <code>Product Not Found!</code>
                                    <a href="{{url('/home')}}" class='btn'>Back To Home</a>
                                @endif
                                @endif
                                

                            </div>

                        </div>
                        <aside class="col-md-3">

                            <div class="main-category-block wow fadeInLeft animated "data-wow-duration="1s"">
                                <div class="main-category-title">
                                    <i class="fa fa-list"></i> Category

                                </div>
                            </div>
                            <div class="widget-block">
                                <ul class="list-unstyled ul-side-category">
                                    @if(isset($cat))
                                    @foreach($cat as $ca)
                                    <li><a href="#"><i class="fa fa-angle-right"></i> {{$ca['name']}}</a>
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
                        </aside>

                    </div>
                </div>  
            </div>

        </section>


@endsection