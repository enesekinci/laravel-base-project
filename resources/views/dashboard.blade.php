@extends('admin.layouts.app')

@section('title', 'Dashboard')

@push('styles')
    <link href="{{ asset('cork/src/plugins/src/apex/apexcharts.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('cork/src/assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('cork/src/assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ana Sayfa</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <!-- CONTENT AREA -->
    <div class="row layout-top-spacing">
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-six">
                <div class="widget-heading">
                    <h6 class="">İstatistikler</h6>
                    <div class="task-action">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="statistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-more-horizontal"
                                >
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </a>

                            <div class="dropdown-menu left" aria-labelledby="statistics" style="will-change: transform">
                                <a class="dropdown-item" href="javascript:void(0);">Görüntüle</a>
                                <a class="dropdown-item" href="javascript:void(0);">İndir</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-chart">
                    <div class="w-chart-section">
                        <div class="w-detail">
                            <p class="w-title">Toplam Ziyaret</p>
                            <p class="w-stats">423,964</p>
                        </div>
                        <div class="w-chart-render-one">
                            <div id="total-users"></div>
                        </div>
                    </div>

                    <div class="w-chart-section">
                        <div class="w-detail">
                            <p class="w-title">Ödemeli Ziyaret</p>
                            <p class="w-stats">7,929</p>
                        </div>
                        <div class="w-chart-render-one">
                            <div id="paid-visits"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Giderler</h6>
                        </div>
                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-more-horizontal"
                                    >
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform">
                                    <a class="dropdown-item" href="javascript:void(0);">Bu Hafta</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Geçen Hafta</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Geçen Ay</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-content">
                        <div class="w-info">
                            <p class="value">
                                ₺ 45,141
                                <span>bu hafta</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-trending-up"
                                >
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg>
                            </p>
                        </div>
                    </div>

                    <div class="w-progress-stats">
                        <div class="progress">
                            <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="">
                            <div class="w-icon">
                                <p>57%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info-box">
                            <div class="icon">
                                <span>
                                    <img src="{{ asset('cork/src/assets/img/money-bag.png') }}" alt="money-bag" />
                                </span>
                            </div>

                            <div class="balance-info">
                                <h6>Toplam Bakiye</h6>
                                <p>₺41,741.42</p>
                            </div>
                        </div>

                        <div class="card-bottom-section">
                            <div>
                                <span class="badge badge-light-success">
                                    + 13.6%
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-trending-up"
                                    >
                                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                        <polyline points="17 6 23 6 23 12"></polyline>
                                    </svg>
                                </span>
                            </div>
                            <a href="javascript:void(0);" class="">Raporu Görüntüle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-three">
                <div class="widget-heading">
                    <div class="">
                        <h5 class="">Benzersiz Ziyaretçiler</h5>
                    </div>

                    <div class="task-action">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-more-horizontal"
                                >
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </a>

                            <div class="dropdown-menu left" aria-labelledby="uniqueVisitors">
                                <a class="dropdown-item" href="javascript:void(0);">Görüntüle</a>
                                <a class="dropdown-item" href="javascript:void(0);">Güncelle</a>
                                <a class="dropdown-item" href="javascript:void(0);">İndir</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="widget-content">
                    <div id="uniqueVisits"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-activity-five">
                <div class="widget-heading">
                    <h5 class="">Aktivite Logu</h5>

                    <div class="task-action">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="activitylog" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-more-horizontal"
                                >
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </a>

                            <div class="dropdown-menu left" aria-labelledby="activitylog" style="will-change: transform">
                                <a class="dropdown-item" href="javascript:void(0);">Tümünü Görüntüle</a>
                                <a class="dropdown-item" href="javascript:void(0);">Okundu İşaretle</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="widget-content">
                    <div class="w-shadow-top"></div>

                    <div class="mt-container mx-auto">
                        <div class="timeline-line">
                            <div class="item-timeline timeline-new">
                                <div class="t-dot">
                                    <div class="t-secondary">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-plus"
                                        >
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </div>
                                </div>
                                <div class="t-content">
                                    <div class="t-uppercontent">
                                        <h5>
                                            Yeni proje oluşturuldu :
                                            <a href="javscript:void(0);"><span>[Laravel Base Project]</span></a>
                                        </h5>
                                    </div>
                                    <p>{{ date('d M, Y') }}</p>
                                </div>
                            </div>

                            <div class="item-timeline timeline-new">
                                <div class="t-dot">
                                    <div class="t-success">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-check"
                                        >
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                </div>
                                <div class="t-content">
                                    <div class="t-uppercontent">
                                        <h5>Sunucu logları güncellendi</h5>
                                    </div>
                                    <p>{{ date('d M, Y', strtotime('-1 day')) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-shadow-bottom"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT AREA -->
@endsection

@push('scripts')
    <script src="{{ asset('cork/src/plugins/src/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('cork/src/assets/js/dashboard/dash_1.js') }}"></script>
@endpush
