<footer id="footer-block">
    <div class="footer-information">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="header-footer" style="margin-right: 120px;">
                        <h3>Information</h3>
                    </div>
                    <ul class="footer-categories list-unstyled">
                        <li><a href="{{url('/about')}}">About Us</a></li>
                        <li><a href="{{url('/contact')}}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="header-footer" style="margin-right: 120px;">
                        <h3>Category</h3>
                    </div>
                    <ul class="footer-categories list-unstyled">
                        @if(isset($cat))
                        @foreach($cat as $ca)
                        <li><a href="{{url('/category/'.$ca['id'].'/'.$ca['name'])}}">{{$ca['name']}}</a></li>
                        @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="header-footer" style="margin-right: 80px;">
                        <h3>Get In Touch</h3>
                    </div>
                     @if(isset($site)) 
                    <p><strong>Phone: {{$site->phone}} </strong><br><strong>Email:</strong> {{$site->email}} </p>
                    <p><strong>Address.</strong><br>{{$site->address}} </p>
                    <p><a href="{{url('/contact')}}"><i class="icon-map-marker"></i> Location in Google Maps</a></p>
                    @endif
                </div>
                <div class="col-md-3">
                    <div class="header-footer">
                        <h3>Social Media</h3>

                    </div>
                    <div class="fb-page" data-href="https://www.facebook.com/Shamimtwl/" data-tabs="timeline" data-width="300" data-height="180" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/Shamimtwl/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Shamimtwl/">Trim Wear Limited</a></blockquote></div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copy color-scheme-1">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="index.html" class="logo-copy pull-left"></a>
                </div>
                <div class="col-md-4">
                    <p class="text-center">
                        <a href="">Copyright © {{date('Y')}}</a> Trim Wear Limited | All rights reserved.<br>Designed & Develop by <a href="http://selfcode.space/" target="_blank">SelfCode</a>
                    </p>
                </div>
                {{-- <div class="col-md-4">
                    <ul class="footer-payments pull-right">
                        <li><img src="img/payment-maestro.jpg" alt="payment" /></li>
                        <li><img src="img/payment-discover.jpg" alt="payment" /></li>
                        <li><img src="img/payment-visa.jpg" alt="payment" /></li>
                        <li><img src="img/payment-american-express.jpg" alt="payment" /></li>
                        <li><img src="img/payment-paypal.jpg" alt="payment" /></li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
</footer>