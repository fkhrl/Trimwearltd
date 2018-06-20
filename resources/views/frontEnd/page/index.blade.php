@extends('frontEnd.layout.master')
@section('title','Home Page')
@section('slider')
@include('frontEnd.include.slider')
@endsection
@section('content')
<section>
    <div class="home-category color-scheme-2">
        <div class="container">
            <div class="row">
                @if(isset($cat))
                <?php $i=1;?>
                @foreach($cat as $ca)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="home-category-block">
                        <div class="home-category-title">
                            <?php

                            if($i==1){
                            echo'<i class="fa fa-male"></i>';
                            }elseif ($i==2) {
                                echo '<i class="fa fa-female"></i> ';
                            }elseif ($i==3) {
                                echo '<i class="fa fa-child"></i> ';
                            }
                            ?>
                            
                            <a href="{{url('/category/'.$ca['id'].'/'.$ca['name'])}}">{{$ca['name']}}</a> 
                        </div>
                        <div class="home-category-option">
                            <ul class="list-unstyled home-category-list">
                                @if(isset($ca['scat']))
                                @foreach($ca['scat'] as $sca)
                                <li><a href="{{$sca['id']}}"><i class="fa fa-check"></i>{{$sca['name']}}</a></li>
                                @endforeach
                                @endif
                            </ul>
                            <img class="img-responsive" src="{{ URL::asset('upload/category/'.$ca['photo']) }}" alt="">
                        </div>
                    </article>

                </div>
                <?php $i++; ?>
                @endforeach
                @endif
                
            </div>
        </div>
    </div>
</section>

<section>
    <div class="color-scheme-2">
        <div class="container">
            <div class="row">
                @if(isset($pro))
                @foreach($pro as $data)
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <article class="banner wow fadeInLeft" data-wow-duration="1s">
                        <a href="{{url('/product/'.$data->id.'/'.$data->name)}}">
                            <img style="height: 400px;" src="{{ URL::asset('upload/product/'.$data->photo) }}" class="img-responsive" alt="">
                        </a> 
                    </article>
                </div>
                @endforeach
                @endif
            </div>
        </div>  
    </div>
</section>


{{-- <section class="block-chess-banners">
    <div class="block">
        <div class="container">
            <div class="header-for-dark">
                <h1 class="wow fadeInRight animated" data-wow-duration="2s">New <span>Collections</span></h1>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <article class="block-chess wow fadeInLeft" data-wow-duration="2s">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="#"><img class="img-responsive" src="img/preview/banner6.jpg" alt=""></a>

                            </div>
                            <div class="col-md-8">
                                <div class="chess-caption-right">
                                    <a href="#" class="col-name">Modern collection</a>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-md-3">
                    <article class="block-chess wow fadeInRight" data-wow-duration="2s">
                        <a href="#"><img class="img-responsive" src="img/preview/banner2.jpg" alt=""></a>
                    </article>
                </div>
            </div> 
            <div class="row">

                <div class="col-md-3">
                    <article class="block-chess wow fadeInLeft" data-wow-duration="2s">
                        <a href="#"><img class="img-responsive" src="img/preview/banner1.jpg" alt=""></a>
                    </article>
                </div>
                <div class="col-md-9">
                    <article class="block-chess wow fadeInRight" data-wow-duration="2s">
                        <div class="row">

                            <div class="col-md-8">
                                <div class="chess-caption-left">
                                    <a href="#" class="col-name">Classic collection</a>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <a href="#"><img class="img-responsive" src="img/preview/banner5.jpg" alt=""></a> 
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- <section>
    <div class="block">
        <div class="container">
            <div class="row">
                <article class="col-md-4">
                    <div class="widget-title">
                        <i class="fa fa-tags"></i> Tags
                    </div>
                    <div class="widget-block wow fadeInUp" data-wow-duration="1s">
                        <ul class="list-unstyled tags">
                            <li><a href="#">men</a></li>
                            <li><a href="#">women</a></li>
                            <li><a href="#">clothes</a></li>
                            <li><a href="#">top</a></li>
                            <li><a href="#">sale</a></li>
                            <li><a href="#">dresses</a></li>
                            <li><a href="#">short</a></li>
                            <li><a href="#">skirt</a></li>
                            <li><a href="#">top</a></li>
                            <li><a href="#">bestseller</a></li>
                            <li><a href="#">new</a></li>
                        </ul>
                    </div>
                </article>
                <article class="col-md-4">
                    <div class="widget-title">
                        <i class="fa fa-tasks"></i> Catalog
                    </div>
                    <div class="widget-block wow fadeInUp" data-wow-duration="1s">
                        <ul class="list-unstyled catalog">
                            <li><a href="#"><i class="fa fa-male"></i>Clothes for men</a></li>
                            <li><a href="#"><i class="fa fa-female"></i>Dresses for women</a></li>
                            <li><a href="#"><i class="fa fa-child"></i>Shirts for child</a></li>
                        </ul>
                    </div>
                </article>
                <article class="col-md-4">
                    <div class="widget-title">
                        <i class="fa fa-thumbs-up"></i> Services
                    </div>
                    <div class="panel-group wow fadeInUp" data-wow-duration="1s" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                                        Money exchange
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
                                        Packing your request
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
                                        Send as Gift
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolort. 
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section> -->
@endsection