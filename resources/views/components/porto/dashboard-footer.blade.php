@php
    $footer = $footerSettings ?? [];
    $paymentIconMap = [
        'visa' => '/porto/assets/images/payments/payment-visa.svg',
        'paypal' => '/porto/assets/images/payments/payment-paypal.svg',
        'stripe' => '/porto/assets/images/payments/payment-stripe.png',
        'verisign' => '/porto/assets/images/payments/payment-verisign.svg',
    ];
@endphp

<footer class="footer bg-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Contact Info</h4>
                        <ul class="contact-info">
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
                            @if(!empty($footer['social_instagram']) && $footer['social_instagram'] !== '#')
                                <a href="{{ $footer['social_instagram'] }}" class="social-icon social-instagram icon-instagram" target="_blank" title="Instagram"></a>
                            @endif
                        </div><!-- End .social-icons -->
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4>

                        <ul class="links">
                            @foreach($footerMenu ?? [] as $item)
                                @if($item['is_active'] ?? true)
                                    <li>
                                        <a href="{{ $item['url'] ?? '#' }}" 
                                           @if(($item['target'] ?? '_self') === '_blank') target="_blank" @endif>
                                            {{ $item['name'] ?? '' }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Popular Tags</h4>

                        <div class="tagcloud">
                            @foreach($footer['popular_tags'] ?? [] as $tag)
                                <a href="#">{{ $tag }}</a>
                            @endforeach
                        </div>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget-newsletter">
                        <h4 class="widget-title">Subscribe newsletter</h4>
                        <p>Get all the latest information on events, sales and offers. Sign up for newsletter:</p>
                        <form action="#" class="mb-0">
                            <input type="email" class="form-control m-b-3" placeholder="Email address" required>

                            <input type="submit" class="btn btn-primary shadow-none" value="Subscribe">
                        </form>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="container">
        <div class="footer-bottom">
            <div class="container d-sm-flex align-items-center">
                <div class="footer-left">
                    <span class="footer-copyright">{{ $footer['copyright'] ?? '© Porto eCommerce. 2021. All Rights Reserved' }}</span>
                </div>

                <div class="footer-right ml-auto mt-1 mt-sm-0">
                    <div class="payment-icons">
                        @foreach($footer['payment_icons'] ?? [] as $icon)
                            @if(($icon['enabled'] ?? false) && isset($paymentIconMap[$icon['name'] ?? '']))
                                <span class="payment-icon {{ $icon['name'] }}" style="background-image: url({{ $paymentIconMap[$icon['name']] }})"></span>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!-- End .footer-bottom -->
    </div><!-- End .container -->
</footer><!-- End .footer -->

