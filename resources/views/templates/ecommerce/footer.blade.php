     <!-- Footer -->
        <footer>
            <div class="footer-newsletter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-7">
                            {!! Form::open(['id' => 'newsletter-validate-detail']) !!}
                                <h3 class="hidden-sm">@lang('lang.signUpForNewsLetter')</h3>
                                <div class="newsletter-inner">
                                    {!! Form::text('email', '', ['class' => 'newsletter-email', 'placeholder' => trans('lang.enterYourEmail')]) !!}

                                    {!! Form::button(trans('lang.subscribe'), ['class' => 'button subscribe', 'type' => 'submit']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="social col-md-4 col-sm-5">
                            <ul class="inline-mode">
                                <li class="social-network fb"><a title="@lang('lang.connectUsOnFacebook')" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-network googleplus"><a title="@lang('lang.connectUsOnGoogle')" target="_blank" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="social-network tw"><a title="@lang('lang.connectUsOnTwitter')" target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-network linkedin"><a title="@lang('lang.connectUsOnLinkedin')" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li class="social-network rss"><a title="Connect us on RSS" target="_blank" href="#"><i class="fa fa-rss"></i></a></li>
                                <li class="social-network instagram"><a title="@lang('lang.connectUsOnInstagram')" target="_blank" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-xs-12 col-lg-3">
                        <div class="footer-logo"><a href="{{ route('home') }}">{{ Html::image(asset('templates/ecommerce/images/footer-logo.png'), 'fotter logo') }}</a></div>
                        <div class="footer-content">
                            <div class="email"> <i class="fa fa-envelope"></i>
                                <p><a href="mailto:support@template.com">@lang('lang.myEmail')</a></p>
                            </div>
                            <div class="phone"> <i class="fa fa-phone"></i>
                                <p>@lang('lang.numberPhone')</p>
                            </div>
                            <div class="address"> <i class="fa fa-map-marker"></i>
                                <p>@lang('lang.address')</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
                        <div class="footer-links">
                            <h3 class="links-title">@lang('lang.information')<a class="expander visible-xs" href="#TabBlock-1">@lang('lang.plus')</a></h3>
                            <div class="tabBlock" id="TabBlock-1">
                                <ul class="list-links list-unstyled">
                                    <li><a href="#">@lang('lang.deliveryInformation')</a></li>
                                    <li><a href="#">@lang('lang.discount')</a></li>
                                    <li><a href="">@lang('lang.sitemap')</a></li>
                                    <li><a href="">@lang('lang.faqs')</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
                        <div class="footer-links">
                            <h3 class="links-title">@lang('lang.insider')<a class="expander visible-xs" href="#TabBlock-3">@lang('lang.plus')</a></h3>
                            <div class="tabBlock" id="TabBlock-3">
                                <ul class="list-links list-unstyled">
                                    <li> <a href="">@lang('lang.sitemap')</a> </li>
                                    <li> <a href="">@lang('lang.aboutUs')</a> </li>
                                    <li> <a href="">@lang('lang.contactUs')</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2 col-xs-12 col-lg-3 collapsed-block">
                        <div class="footer-links">
                            <h3 class="links-title">@lang('lang.service')<a class="expander visible-xs" href="#TabBlock-4">@lang('lang.plus')</a></h3>
                            <div class="tabBlock" id="TabBlock-4">
                                <ul class="list-links list-unstyled">
                                    <li> <a href="">@lang('lang.account')</a> </li>
                                    <li> <a href="">@lang('lang.wishlist')</a> </li>
                                    <li> <a href="">@lang('shoppingCart')</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-coppyright">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12 coppyright">@lang('lang.copyWrite')</div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="payment">
                                <ul>
                                    <li><a href="#">{{ Html::image(asset('templates/ecommerce/images/visa.png"')) }}</li>
                                    <li><a href="#">{{ Html::image(asset('templates/ecommerce/images/paypal.png"')) }}</a></li>
                                    <li><a href="#">{{ Html::image(asset('templates/ecommerce/images/discover.png"')) }}</a></li>
                                    <li><a href="#">{{ Html::image(asset('templates/ecommerce/images/master-card.png"')) }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a href="#" class="totop"> </a> 
        <!-- End Footer --> 
    </div>


    <!-- JS -->

    <!-- owl.carousel.min js -->
    {{ Html::script(asset('templates/ecommerce/js/owl.carousel.min.js')) }}
    <!-- Slider Js -->
    {{ Html::script(asset('templates/ecommerce/js/revolution-slider.js')) }}
    <!-- megamenu js -->
    {{ Html::script(asset('templates/ecommerce/js/megamenu.js')) }}

    <!-- jquery.mobile-menu js -->
    {{ Html::script(asset('templates/ecommerce/js/mobile-menu.js')) }}
    {{ Html::script(asset('templates/ecommerce/js/jquery-ui.js')) }}
    <!-- main js -->
    {{ Html::script(asset('templates/ecommerce/js/main.js')) }}
    <!-- countdown js --> 
    {{ Html::script(asset('templates/ecommerce/js/countdown.js')) }}
    <!-- Revolution Slider -->
    {{ Html::script(asset('templates/ecommerce/js/jquery.flexslider.js')) }}
    {{ Html::script(asset('templates/ecommerce/js/jquery.magnifying-zoom.js')) }}
    {{ Html::script(asset('templates/ecommerce/js/footer.js')) }}
    {{ Html::script(asset('templates/ecommerce/js/script.js')) }}
    </body>
</html>
