@extends('layouts.porto')

@section('header')
    @include('porto.demo11.header')
@endsection

@section('footer')
    @include('porto.demo11.footer')
@endsection

@section('content')
<div class="container">
                <nav aria-label="breadcrumb" class="breadcrumb-nav mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/porto/demo11.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                    </ol>
                </nav>

                <div class="intro-section">
                    <h4>The New Way to
                        <span class="wort-rotator" data-plugin-options='{ "delay": 3000 }'>
                            <span class="wort-rotator-items">
                                <span>success.</span>
                                <span>progress.</span>
                                <span>advance.</span>
                            </span>
                        </span>
                    </h4>

                    <div class="row">
                        <div class="col-md-12 col-lg-10 col-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque
                                imperdiet. Nulla lacinia iaculis nulla non <span class="alternative-font">metus</span>
                                pulvinar. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                                ridiculus
                                mus. Ut eu risus enim, ut pulvinar lectus. Sed hendrerit nibh.</p>
                        </div>
                        <div class="col-md-12 col-lg-2 col-12">
                            <a class="btn btn-md btn-primary" href="#">Join Our
                                Team!</a>
                        </div>
                    </div>
                </div>

                <hr class="mt-4 mb-4">

                <div class="section-2">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <h4 class="about-section-title">Who We Are</h4>

                            <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
                                pellentesque
                                neque eget
                                diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin
                                adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis
                                faucibus
                                ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo.
                                Nullam
                                convallis, arcu vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante
                                quis
                                sem. Proin ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>

                            <p>Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula
                                lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing <span
                                    class="alternative-font ls-10">metus</span> sit amet. In eu justo a felis faucibus
                                ornare
                                vel
                                id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                                cubilia
                                Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Vestibulum ante
                                ipsum
                                primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula.
                                Fusce
                                eget metus lorem, ac viverra leo. Vestibulum ante ipsum primis in faucibus orci luctus
                                et
                                ultrices posuere cubilia Curae; In eu libero ligula.</p>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="featured-box">
                                <div class="box-content">
                                    <h5 class="text-primary">Behind the scenes</h5>
                                    <p class="text-primary">View stream on flickr</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="mt-4 mb-4">

                <div class="history-section">
                    <h4 class="about-section-title">Our History</h4>

                    <div class="history">
                        <figure class="thumb d-none d-sm-block">
                            <img src="/porto/assets/images/demoes/demo11/about/office-1.jpg" width="145" height="145"
                                alt="Office Img" />
                        </figure>
                        <div class="featured-box">
                            <div class="box-content">
                                <h4 class="heading-primary"><strong>2021</strong></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque
                                    eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing
                                    porta tellus, Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla
                                    at nunc vehicula lacinia. Proin adipiscing porta tellus,</p>
                            </div>
                        </div>
                    </div>

                    <div class="history">
                        <figure class="thumb d-none d-sm-block">
                            <img src="/porto/assets/images/demoes/demo11/about/office-2.jpg" width="145" height="145"
                                alt="Office Img" />
                        </figure>
                        <div class="featured-box">
                            <div class="box-content">
                                <h4 class="heading-primary"><strong>2020</strong></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque
                                    eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing
                                    porta tellus, Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla
                                    at nunc vehicula lacinia.</p>
                            </div>
                        </div>
                    </div>

                    <div class="history">
                        <figure class="thumb d-none d-sm-block">
                            <img src="/porto/assets/images/demoes/demo11/about/office-3.jpg" width="145" height="145"
                                alt="Office Img" />
                        </figure>
                        <div class="featured-box">
                            <div class="box-content">
                                <h4 class="heading-primary"><strong>2019</strong></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque
                                    eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing
                                    porta tellus, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
                                    pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula
                                    lacinia. Proin adipiscing porta tellus, Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut
                                    nulla at nunc vehicula lacinia. Proin adipiscing porta tellus,</p>
                            </div>
                        </div>
                    </div>

                    <div class="history">
                        <figure class="thumb d-none d-sm-block">
                            <img src="/porto/assets/images/demoes/demo11/about/office-4.jpg" width="145" height="145"
                                alt="Office Img" />
                        </figure>
                        <div class="featured-box">
                            <div class="box-content">
                                <h4 class="heading-primary"><strong>2018</strong></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque
                                    eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing
                                    porta tellus, Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla
                                    at nunc vehicula lacinia. Proin adipiscing porta tellus, Curabitur pellentesque
                                    neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin
                                    adipiscing porta tellus,</p>
                            </div>
                        </div>
                    </div>
                </div><!-- End .container -->
            </div><!-- End .container -->
@section('footer')
    @include('porto.demo11.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
