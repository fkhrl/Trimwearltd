<header id="header">
            <div class="header-top-row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="top-welcome hidden-xs hidden-sm">
                                @if(isset($site))

                                <p>Welcome To {{$site->name}}  &nbsp;&nbsp;<i class="fa fa-phone"></i> {{$site->phone}} &nbsp; <i class="fa fa-envelope"></i> {{$site->email}}</p> 
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="pull-right">
                                

                                <!-- header - currency -->
                                <div class="socials-block pull-right">
                                    <ul class="list-unstyled list-inline">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /header - currency -->
                            </div>

                        </div>
                    </div>




                </div>
            </div>
            <!-- /header-top-row -->
            <div class="header-bg">
                <div class="header-main" id="header-main-fixed">
                    <div class="header-main-block1">
                        <div class="container">
                            <div id="container-fixed">
                                <div class="row">
                                    <div class="col-md-3">
                                        @if(isset($site))<a href="{{url('/home')}}" class="header-logo"> <img  src="{{ URL::asset('upload/logo/'.$site->logo) }}"  alt="{{$site->name}}"></a>@endif        
                                    </div>
                                    <div class="col-md-offset-4 col-md-5">
                                        <div class="top-search-form pull-left">
                                            <form action="{{url('search')}}" method="post">
                                                {!! csrf_field() !!}
                                                <input type="text" name="search" placeholder="Search ..." class="form-control">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </form>  
                                        </div>        
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="header-main-block2">
                        <nav class="navbar yamm  navbar-main" role="navigation">

                            <div class="container">
                                <div class="navbar-header">
                                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                                    <!-- <a href="index.html" class="navbar-brand"><i class="fa fa-home"></i></a> -->
                                </div>
                                <div id="navbar-collapse-1" class="navbar-collapse collapse ">
                                    <ul class="nav navbar-nav navbar-right">
                                        <!-- Classic list -->
                                        <li class="dropdown"><a href="{{url('/home')}}">Home </a></li>
                                        <li><a href="{{url('/about')}}">About Us </a></li>
                                        <!-- With content -->
                                        <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Product <i class="fa fa-caret-right fa-rotate-45"></i></a>
                                            <ul class="dropdown-menu list-unstyled  fadeInUp animated">
                                                <li>
                                                    <div class="yamm-content">
                                                        <div class="row">
                                                            @if(isset($cat))
                                                            @foreach($cat as $ca)
                                                            <div class="col-md-4">
                                                                <div class="header-menu">
                                                                    <h4><a href="{{url('/category/'.$ca['id'].'/'.$ca['name'])}}">{{$ca['name']}}</a></h4>
                                                                </div> 
                                                                <ul class="list-unstyled">
                                                                    @if(isset($ca['scat']))
                                                                    @foreach($ca['scat'] as $sca)
                                                                    <li><a href="{{url('category/'.$ca['id'].'/subcategory/'.$sca['id'].'/'.$sca['name'])}}">{{$sca['name']}}</a></li>
                                                                    @endforeach
                                                                    @endif

                                                                </ul>
                                                            </div>
                                                             @endforeach
                                                            @endif
                                                            
                                                        </div>

                                                    </div>
                                                </li>
                                            </ul>
                                        </li>                                       

                                        <li><a href="{{url('/contact')}}">Contact Us</a></li>
                                    </ul>
                                    <!-- <ul class="nav navbar-nav navbar-right">
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul> -->
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                <!-- /header-main-menu -->
            </div>
        </header>