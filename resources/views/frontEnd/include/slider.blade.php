<section>
    <div class="revolution-container">
        <div class="revolution">
            <ul class="list-unstyled">	<!-- SLIDE  -->
                @if(isset($slider))
                @foreach($slider as $row)
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                    <!-- MAIN IMAGE -->
                    <img src="{{ URL::asset('upload/slider/'.$row->photo) }}"  alt="slide Image"  data-bgfit="cover"  data-bgposition="center center" data-bgrepeat="no-repeat">
                    <!-- LAYERS -->
                    <div class="tp-caption skewfromrightshort customout"
                         data-x="20"
                         data-y="335"
                         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="500"
                         data-start="700"
                         data-easing="Power4.easeOut"
                         data-endspeed="500"
                         data-endeasing="Power4.easeIn"
                         data-captionhidden="on"
                         style="z-index: 4">
                        {{-- <img src="img/preview/slider/1-1.png" alt=""> --}}
                        <h2 style="font-size: 40px; color: #fff;font-family: 'Fredoka One', cursive;">
                            <?php 
                                if($row->title=='0') {
                                    echo'';
                                }else{
                                    echo $row->title;
                                }
                            ?>
                        </h2>
                    </div> 
                    <div class="tp-caption customin customout hidden-xs"
                         data-x="20"
                         data-y="430"
                         data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
                         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="500"
                         data-start="1000"
                         data-easing="Power4.easeOut"
                         data-endspeed="500"
                         data-endeasing="Power4.easeIn"
                         data-captionhidden="on"
                         style="z-index: 2">
                        <?php 
                                if($row->pid=='0') {
                                    echo'';
                                }else{
                                    ?>
                                    <a href='{{url('product/'.$row->pid.'/'.$row->proname)}}' class='btn-home'>Read more</a>
                                    <?php
                                }
                            ?>
                        
                    </div>

                </li>
                @endforeach
                @endif
            </ul>
            <div class="revolutiontimer"></div>
        </div>
    </div>
</section>
