<div class="footer-top">
    <div class="container">
        <div class="foo-grids row" style="display: flex;align-items: baseline;justify-content: center;">
            <div class="col-md-3 footer-grid">
                <spna class="footer-head">Who We Are</spna>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout.</p>
                <p>The point of using Lorem Ipsum is that it has a more-or-less normal letters, as opposed to using
                    'Content here.</p>
            </div>
            <div class="col-md-3 footer-grid">
                <span class="footer-head">Help</span>
                <ul>
                    <li><a href="howitworks.html">How it Works</a></li>
                    <li><a href="sitemap.html">Sitemap</a></li>
                    <li><a href="{{ route('faq.website') }}">Faq</a></li>
                    <li><a href="feedback.html">Feedback</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="typography.html">Shortcodes</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <span class="footer-head">Information</span>
                <ul>
                    <li><a href="regions.html">Locations Map</a></li>
                    <li><a href="terms.html">Terms of Use</a></li>
                    <li><a href="popular-search.html">Popular searches</a></li>
                    <li><a href="privacy.html">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <span class="footer-head">Contact Us</span>
                <span class="hq">Our headquarters</span>
                <address>
                    @foreach (config('settings.contacts') as $item)
                        <ul class="location">
                            <li><span class="glyphicon glyphicon-map-marker {{ $item['icon'] }}"></span></li>
                            <li>{{ $item['value'] }}</li>
                            <div class="clearfix"></div>
                        </ul>
                    @endforeach
                </address>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="footer-bottom text-center">
    <div class="container">
        <div class="footer-logo">
            <a href="/">
                <span class="cl1">US</span>
                <span class="cl2">HA</span>
                <span class="cl3">KI</span>
                <span class="cl4">KI</span></a>
        </div>
        <div class="footer-social-icons">
            <ul>
                <li><a class="facebook" href="#"><span>Facebook</span></a></li>
                <li><a class="twitter" href="#"><span>Twitter</span></a></li>
                <li><a class="flickr" href="#"><span>Flickr</span></a></li>
                <li><a class="googleplus" href="#"><span>Google+</span></a></li>
                <li><a class="dribbble" href="#"><span>Dribbble</span></a></li>
            </ul>
        </div>
        <div class="copyrights">
            <p> © 2021. All Rights Reserved | Design by USHAKIKI
        </div>
        <div class="clearfix"></div>
    </div>
</div>
