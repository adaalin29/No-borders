<footer id="footer">
    <div class="container">
        <div class="footer-container">
            {{-- mobile --}}

            <div class="footer-element-mobile">
                <div class="footer-element-title-mobile-container">
                    <div class="footer-element-title-mobile">{{ __('site.footer-despre') }}</div>
                    <div class="footer-element-image-mobile"><img class="full-width" src="images/sageata-footer.svg">
                    </div>
                </div>
                <div class="footer-element-mobile-container">
                    <div class="footer-element"><a class="footer-element-link"
                            href="about">{{ __('site.despre-noi') }}</a>
                    </div>
                    <div class="footer-element"><a class="footer-element-link"
                            href="recruit">{{ __('site.recruit') }}</a></div>
                    <div class="footer-element"><a class="footer-element-link"
                            href="steps">{{ __('site.steps') }}</a></div>


                    <div class="footer-element"><a class="footer-element-link"
                            href="partners">{{ __('site.partenerii-nostri') }}</a></div>
                    <div class="footer-element"><a class="footer-element-link" href="contact">Contact</a></div>
                </div>
            </div>



            <div class="footer-element-mobile">
                <div class="footer-element-title-mobile-container">
                    <div class="footer-element-title-mobile">{{ __('site.resurse') }}</div>
                    <div class="footer-element-image-mobile"><img class="full-width" src="images/sageata-footer.svg">
                    </div>
                </div>
                <div class="footer-element-mobile-container">
                    <div class="footer-element"><a class="footer-element-link" href="terms">{{ __('site.termeni') }}</a>
                    </div>
                    <div class="footer-element"><a class="footer-element-link" href="cookies">{{ __('site.cookie') }}</a>
                    </div>
                    <div class="footer-element"><a class="footer-element-link"
                            href="politica">{{ __('site.confidentialitate') }}</a></div>
                </div>
            </div>

            <div class="footer-element-mobile">
                <div class="footer-element-title-mobile-container">
                    <div class="footer-element-title-mobile">{{ __('site.find') }}</div>
                    <div class="footer-element-image-mobile"><img class="full-width" src="images/sageata-footer.svg">
                    </div>
                </div>
                <div class="footer-element-mobile-container">
                    <div class="footer-element"><a class="footer-element-link" href="{{setting('site.facebook')}}">Facebook</a>
                    </div>
                    <div class="footer-element"><a class="footer-element-link" href="{{setting('site.youtube')}}">Youtube</a>
                    </div>
                    <div class="footer-element"><a class="footer-element-link" href="{{setting('site.linkedin')}}">Linkedin</a>
                    </div>
                </div>
            </div>





            <div class="footer-element-container">
                <div class="footer-title">{{ __('site.footer-despre') }}</div>
                <div class="footer-element"><a class="footer-element-link" href="about">{{ __('site.despre-noi') }}</a>
                </div>
                <div class="footer-element"><a class="footer-element-link"
                        href="recruit">{{ __('site.recruit') }}</a></div>

                <div class="footer-element"><a class="footer-element-link"
                        href="steps">{{ __('site.steps') }}</a></div>

                <div class="footer-element"><a class="footer-element-link"
                        href="partners">{{ __('site.partenerii-nostri') }}</a></div>
                <div class="footer-element"><a class="footer-element-link" href="contact">Contact</a></div>
            </div>
            <div class="footer-element-container">
                <div class="footer-title">{{ __('site.resurse') }}</div>
                <div class="footer-element"><a class="footer-element-link" href="terms">{{ __('site.termeni') }}</a>
                </div>
                <div class="footer-element"><a class="footer-element-link" href="cookies">{{ __('site.cookie') }}</a>
                </div>
                <div class="footer-element"><a class="footer-element-link"
                        href="politica">{{ __('site.confidentialitate') }}</a></div>
            </div>

            <div class="footer-element-container">
                <div class="footer-title">{{ __('site.find') }}</div>
                <div class="footer-element">
                    <a class="footer-element-link-social" href="{{setting('site.facebook')}}">
                        <div class="footer-social"><img class="full-width" src="images/facebook.svg"></div>
                        <div class="footer-social-text">Facebook</div>
                    </a>
                </div>
                <div class="footer-element">
                    <a class="footer-element-link-social" href="{{setting('site.youtube')}}">
                        <div class="footer-social"><img class="full-width" src="images/youtube.svg"></div>
                        <div class="footer-social-text">Youtube</div>
                    </a>
                </div>
                <div class="footer-element">
                    <a class="footer-element-link-social" href="{{setting('site.linkedin')}}">
                        <div class="footer-social"><img class="full-width" src="images/linkedin.svg"></div>
                        <div class="footer-social-text">Linkedin</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-logo-container">
            <div class="footer-logo"> <a href style="display:block;"="/"><img class="full-width"
                        src="images/footer-logo.svg"></a></div>
        </div>
        <div class="footer-copy">{{ __('site.copy') }}</div>
    </div>
</footer>