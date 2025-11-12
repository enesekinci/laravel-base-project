@php
    $footer = $footerSettings ?? [];
    $paymentIconMap = [
        'visa' => '/porto/assets/images/payments/payment-visa.svg',
        'paypal' => '/porto/assets/images/payments/payment-paypal.svg',
        'stripe' => '/porto/assets/images/payments/payment-stripe.png',
        'verisign' => '/porto/assets/images/payments/payment-verisign.svg',
    ];
@endphp

<footer class="footer bg-dark position-relative">
    <div class="footer-middle">
        <div class="container position-static">
            <div class="footer-ribbon">Get in touch</div>

            <div class="row">
                <div class="col-lg-3 col-sm-6 pb-2 pb-sm-0">
                    <div class="widget">
                        <h4 class="widget-title">About Us</h4>
                        <a href="/porto/demo1.html">
                            <img src="{{ $footer['about_logo'] ?? '/porto/assets/images/logo-footer.png' }}" alt="Logo" class="logo-footer">
                        </a>
                        <p class="m-b-4">{{ $footer['about_description'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Duis nec vestibulum magna, et dapibus lacus.' }}</p>
                        <a href="{{ $footer['about_read_more_url'] ?? '#' }}" class="read-more text-white">read more...</a>
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6 pb-4 pb-sm-0">
                    <div class="widget mb-2">
                        <h4 class="widget-title mb-1 pb-1">Contact Info</h4>
                        <ul class="contact-info m-b-4">
                            <li>
                                <span class="contact-info-label">Address:</span>{{ $footer['contact_address'] ?? '123 Street Name, City, England' }}
                            </li>
                            <li>
                                <span class="contact-info-label">Phone:</span><a href="tel:{{ $footer['contact_phone'] ?? '' }}">{{ $footer['contact_phone'] ?? '(123) 456-7890' }}</a>
                            </li>
                            <li>
                                <span class="contact-info-label">Email:</span> <a href="mailto:{{ $footer['contact_email'] ?? '' }}">{{ $footer['contact_email'] ?? 'mail@example.com' }}</a>
                            </li>
                            <li>
                                <span class="contact-info-label">Working Days/Hours:</span> {{ $footer['contact_working_hours'] ?? 'Mon - Sun / 9:00 AM - 8:00 PM' }}
                            </li>
                        </ul>
                        <div class="social-icons">
                            @if(!empty($footer['social_facebook']) && $footer['social_facebook'] !== '#')
                                <a href="{{ $footer['social_facebook'] }}" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                            @endif
                            @if(!empty($footer['social_twitter']) && $footer['social_twitter'] !== '#')
                                <a href="{{ $footer['social_twitter'] }}" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                            @endif
                            @if(!empty($footer['social_linkedin']) && $footer['social_linkedin'] !== '#')
                                <a href="{{ $footer['social_linkedin'] }}" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                            @endif
                        </div>
                        <!-- End .social-icons -->
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6 pb-2 pb-sm-0">
                    <div class="widget">
                        <h4 class="widget-title pb-1">Customer Service</h4>

                        <ul class="links">
                            @if(!empty($footerMenu) && is_array($footerMenu) && count($footerMenu) > 0)
                                {{-- Footer menüsünden göster --}}
                                @foreach($footerMenu as $item)
                                    @if($item['is_active'] ?? true)
                                        <li>
                                            <a href="{{ $item['url'] ?? '#' }}" 
                                               @if(($item['target'] ?? '_self') === '_blank') target="_blank" @endif>
                                                {{ $item['name'] ?? '' }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            @elseif(!empty($footer['customer_service_links']) && is_array($footer['customer_service_links']))
                                {{-- Fallback: Footer settings'ten göster --}}
                                @foreach($footer['customer_service_links'] as $link)
                                    <li><a href="{{ $link['url'] ?? '#' }}">{{ $link['label'] ?? '' }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6 pb-0">
                    <div class="widget mb-1 mb-sm-3">
                        <h4 class="widget-title">Popular Tags</h4>

                        <div class="tagcloud">
                            @foreach($footer['popular_tags'] ?? [] as $tag)
                                <a href="#">{{ $tag }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .col-lg-3 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .footer-middle -->

    <div class="container">
        <div class="footer-bottom d-sm-flex align-items-center">
            <div class="footer-left">
                <span class="footer-copyright">{{ $footer['copyright'] ?? '© Porto eCommerce. 2021. All Rights Reserved' }}</span>
            </div>
            <!-- End .footer-left -->

            <div class="footer-right ml-auto mt-1 mt-sm-0">
                <div class="payment-icons">
                    @foreach($footer['payment_icons'] ?? [] as $icon)
                        @if(($icon['enabled'] ?? false) && isset($paymentIconMap[$icon['name'] ?? '']))
                            <span class="payment-icon {{ $icon['name'] }}" style="background-image: url({{ $paymentIconMap[$icon['name']] }})"></span>
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- End .footer-right -->
        </div>
        <!-- End .footer-bottom -->
    </div>
    <!-- End .container -->
</footer>
<!-- End .footer -->
