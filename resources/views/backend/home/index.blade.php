<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    @if($aplikasi->file_favicon)
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($aplikasi->file_favicon->url_stream) }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset($aplikasi->file_favicon->url_stream) }}">
    @endif
    <meta name="description" content="{!! ucwords(strtolower(($aplikasi->nama??'').' '.($aplikasi->daerah??''))) !!}">
    <title>@stack('title','Home') | {{$aplikasi->singkatan??''}}</title>
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <meta name="author" content="{!! config('master.aplikasi.author') !!}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/css/vendors.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/css/app.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/css/miscellaneous/reactions/reactions.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/css/miscellaneous/fullcalendar/fullcalendar.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/css/miscellaneous/jqvmap/jqvmap.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/css/statistics/c3/c3.css') }}">
    <link rel="mask-icon" href="{{ asset('backend/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href="{{ asset('resources/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{asset('backend/css/all.css')}}"/>
    <link rel="stylesheet" media="screen, print" href="{{ asset('resources/css/sweetalert2/sweetalert2.bundle.css') }}">
    @if (config('master.aplikasi.tema') != NULL)
        <link id="mytheme" rel="stylesheet" media="screen, print" href="{{asset('backend/css/themes/cust-theme-'.config('master.aplikasi.tema').'.css')}}">
    @endif
    <link id="myskin" rel="stylesheet" media="screen, print" href="{{asset('backend/css/skin/skin-master.css')}}">
    @stack('css')
{{--    <script>--}}
{{--        window.OneSignal = window.OneSignal || [];--}}
{{--        OneSignal.push(function () {--}}
{{--            OneSignal.init({--}}
{{--                autoResubscribe: true,--}}
{{--                allowLocalhostAsSecureOrigin: true,--}}
{{--                appId: "{!! env('ONESIGNAL_APP_ID') !!}",--}}
{{--                notifyButton: {--}}
{{--                    enable: true,--}}
{{--                },--}}
{{--            });--}}
{{--            OneSignal.getUserId().then(function (userId) {--}}
{{--                if (userId != null) {--}}
{{--                    $.post('provider/onesignal', {--}}
{{--                        '_token': "{{csrf_token()}}",--}}
{{--                        'pegawai_id': "{{$user->pegawai_id}}",--}}
{{--                        'token': userId,--}}
{{--                    })--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
</head>
<body class="mod-bg-1 nav-function-fixed mod-nav-dark mod-nav-link">
<script>
    'use strict';
    let classHolder = document.getElementsByTagName("BODY")[0],
        themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) : {},
        themeURL = themeSettings.themeURL || '',
        themeOptions = themeSettings.themeOptions || '';

    if (themeSettings.themeOptions) {
        classHolder.className = themeSettings.themeOptions;
    }
    if (themeSettings.themeURL && !document.getElementById('mytheme')) {
        let cssfile = document.createElement('link');
        cssfile.id = 'mytheme';
        cssfile.rel = 'stylesheet';
        cssfile.href = themeURL;
        document.getElementsByTagName('head')[0].appendChild(cssfile);

    } else if (themeSettings.themeURL && document.getElementById('mytheme')) {
        document.getElementById('mytheme').href = themeSettings.themeURL;
    }

    let saveSettings = function () {
        themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function (item) {
            return /^(nav|header|footer|mod|display)-/i.test(item);
        }).join(' ');
        if (document.getElementById('mytheme')) {
            themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
        }
        localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
    };

    let resetSettings = function () {
        localStorage.setItem("themeSettings", "");
    };
</script>
<div class="page-wrapper">
    <div class="page-inner">
        @include('backend.home.sidebar')
        <div class="page-content-wrapper">
            @include('backend.home.header')
            <main id="js-page-content" role="main" class="page-content">
                <ol class="breadcrumb page-breadcrumb">
                    <li class="position-absolute pos-top pos-right d-none d-sm-block">
                        {{ $fungsi->getHari() }}, {{ $fungsi->tanggalIndonesia() }}
                    </li>
                </ol>
                @if(is_null($halaman))
                    @yield('content')
                @else
                    @if ($halaman->detail)
                        @include('backend.home.sidebar_item.informasi',['judul'=>($halaman->detail['title'] ?? ''),'keterangan'=>($halaman->detail['keterangan'] ?? ''),'status_pengumuman'=>($halaman->detail['status_pengumuman'] ?? '')])
                    @endif
                    <div class="row">
                        <div class="col-xl-12">
                            <div id="panel-1" class="panel">
                                <div class="panel-hdr">
                                    <h2>
                                        <span class="fa {!! $halaman->icon ?? 'fa-home' !!}"></span>
                                        &nbsp;@stack('header')
                                    </h2>
                                    @stack('panel')
                                    <div class="panel-toolbar">
                                        <div class="btn-group">
                                        <a href="{{ URL::previous() }}" class="btn btn-sm btn-dark kembali">
                                           <i class="fa fa-arrow-circle-left"></i> Kembali
                                        </a>
                                        </div>&nbsp;&nbsp;
                                        <div class="btn-group">
                                            @stack('tombol')
                                        </div>
                                    </div>
                                </div>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                @endif
            </main>
            <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
            @include('backend.home.footer')
        </div>
    </div>
    @include('backend.home.sidebar_item.setting')
</div>
<script src="{{ asset('backend/js/vendors.bundle.js') }}"></script>
<script src="{{ asset('backend/js/app.bundle.js') }}"></script>
<script src="{{ asset('backend/js/dependency/moment/moment.js') }}"></script>
<script src="{{ asset('backend/js/miscellaneous/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('backend/js/miscellaneous/jqvmap/jqvmap.bundle.js') }}"></script>
<script src="{{ asset('backend/js/statistics/sparkline/sparkline.bundle.js') }}"></script>
<script src="{{ asset('backend/js/statistics/c3/c3.js') }}"></script>
<script src="{{ asset('backend/js/statistics/demo-data/demo-c3.js') }}"></script>
<script src="{{ asset('backend/js/statistics/flot/flot.bundle.js') }}"></script>
<script src="{{ asset('resources/vendor/jquery/blockUI.js') }}"></script>
<script src="{{ asset('resources/vendor/jquery/jquery.loadmodal.js') }}"></script>
<script src="{{ asset(config('master.aplikasi.author').'/home/jquery.js') }}"></script>
<script src="{{ asset('resources/vendor/sweetalert2/sweetalert2.bundle.js') }}"></script>
{{--<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>--}}
<script>
    $(document).ready(function()
    {
                /*calendar */
                var todayDate = moment().startOf('day');
                var YM = todayDate.format('YYYY-MM');
                var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
                var TODAY = todayDate.format('YYYY-MM-DD');
                var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');


                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl,
                {
                    plugins: ['dayGrid', 'list', 'timeGrid', 'interaction', 'bootstrap'],
                    themeSystem: 'bootstrap',
                    timeZone: 'UTC',
                    //dateAlignment: "month", //week, month
                    buttonText:
                    {
                        today: 'today',
                        month: 'month',
                        week: 'week',
                        day: 'day',
                        list: 'list'
                    },
                    eventTimeFormat:
                    {
                        hour: 'numeric',
                        minute: '2-digit',
                        meridiem: 'short'
                    },
                    navLinks: true,
                    header:
                    {
                        left: 'title',
                        center: '',
                        right: 'today prev,next'
                    },
                    footer:
                    {
                        left: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
                        center: '',
                        right: ''
                    },
                    
                    /* Membuat Acara Di Kalender
                    editable: true,
                    eventLimit: true,
                    events: [
                    {
                        title: 'All Day Event',
                        start: YM + '-01',
                        description: 'This is a test description',
                        className: "border-warning bg-warning text-dark"
                    },
                    {
                        title: 'Reporting',
                        start: YM + '-14T13:30:00',
                        end: YM + '-14',
                        className: "bg-white border-primary text-primary"
                    },
                    {
                        title: 'Surgery oncall',
                        start: YM + '-02',
                        end: YM + '-03',
                        className: "bg-primary border-primary text-white"
                    },
                    {
                        title: 'NextGen Expo 2019 - Product Release',
                        start: YM + '-03',
                        end: YM + '-05',
                        className: "bg-info border-info text-white"
                    },
                    {
                        title: 'Dinner',
                        start: YM + '-12',
                        end: YM + '-10'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: YM + '-09T16:00:00',
                        className: "bg-danger border-danger text-white"
                    },
                    {
                        id: 1000,
                        title: 'Repeating Event',
                        start: YM + '-16T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: YESTERDAY,
                        end: TOMORROW,
                        className: "bg-success border-success text-white"
                    },
                    {
                        title: 'Meeting',
                        start: TODAY + 'T10:30:00',
                        end: TODAY + 'T12:30:00',
                        className: "bg-primary text-white border-primary"
                    },
                    {
                        title: 'Lunch',
                        start: TODAY + 'T12:00:00',
                        className: "bg-info border-info"
                    },
                    {
                        title: 'Meeting',
                        start: TODAY + 'T14:30:00',
                        className: "bg-warning text-dark border-warning"
                    },
                    {
                        title: 'Happy Hour',
                        start: TODAY + 'T17:30:00',
                        className: "bg-success border-success text-white"
                    },
                    {
                        title: 'Dinner',
                        start: TODAY + 'T20:00:00',
                        className: "bg-danger border-danger text-white"
                    },
                    {
                        title: 'Birthday Party',
                        start: TOMORROW + 'T07:00:00',
                        className: "bg-primary text-white border-primary text-white"
                    },
                    {
                        title: 'Gotbootstrap Meeting',
                        url: 'https://gotbootstrap.com/',
                        start: YM + '-28',
                        className: "bg-info border-info text-white"
                    }],*/

                    viewSkeletonRender: function()
                    {
                        $('.fc-toolbar .btn-default').addClass('btn-sm');
                        $('.fc-header-toolbar h2').addClass('fs-md');
                        $('#calendar').addClass('fc-reset-order')
                    },

                });

                calendar.render();
            });

            var pieChart = c3.generate(
            {
                bindto: "#pieChart",
                data:
                {
                    // iris data from R
                    columns: [
                        ['virtigo', 30],
                        ['clarfy', 120],
                        ["setosa", 0.2, 0.2, 0.2, 0.2, 0.2, 0.4, 0.3, 0.2, 0.2, 0.1, 0.2, 0.2, 0.1, 0.1, 0.2, 0.4, 0.4, 0.3, 0.3, 0.3, 0.2, 0.4, 0.2, 0.5, 0.2, 0.2, 0.4, 0.2, 0.2, 0.2, 0.2, 0.4, 0.1, 0.2, 0.2, 0.2, 0.2, 0.1, 0.2, 0.2, 0.3, 0.3, 0.2, 0.6, 0.4, 0.3, 0.2, 0.2, 0.2, 0.2],
                        ["versicolor", 1.4, 1.5, 1.5, 1.3, 1.5, 1.3, 1.6, 1.0, 1.3, 1.4, 1.0, 1.5, 1.0, 1.4, 1.3, 1.4, 1.5, 1.0, 1.5, 1.1, 1.8, 1.3, 1.5, 1.2, 1.3, 1.4, 1.4, 1.7, 1.5, 1.0, 1.1, 1.0, 1.2, 1.6, 1.5, 1.6, 1.5, 1.3, 1.3, 1.3, 1.2, 1.4, 1.2, 1.0, 1.3, 1.2, 1.3, 1.3, 1.1, 1.3],
                        ["virginica", 2.5, 1.9, 2.1, 1.8, 2.2, 2.1, 1.7, 1.8, 1.8, 2.5, 2.0, 1.9, 2.1, 2.0, 2.4, 2.3, 1.8, 2.2, 2.3, 1.5, 2.3, 2.0, 2.0, 1.8, 2.1, 1.8, 1.8, 1.8, 2.1, 1.6, 1.9, 2.0, 2.2, 1.5, 1.4, 2.3, 2.4, 1.8, 1.8, 2.1, 2.4, 2.3, 1.9, 2.3, 2.5, 2.3, 1.9, 2.0, 2.3, 1.8],
                    ],
                    type: 'pie' //,
                    /*onclick: function (d, i) { console.log("onclick", d, i); },
                    onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                    onmouseout: function (d, i) { console.log("onmouseout", d, i); }*/
                },
                color:
                {
                    pattern: colors
                }
            });

            var pieChartUnload = function()
            {
                $("#pieChartUnload").attr("disabled", true);
                $("#pieChartUnload").text("unloading datasets...")
                setTimeout(function()
                {
                    pieChart.unload(
                    {
                        ids: 'virtigo'
                    });
                    pieChart.unload(
                    {
                        ids: 'clarfy'
                    });
                }, 1000);
                setTimeout(function()
                {
                    $("#pieChartUnload").text("unload complete")
                }, 2000);
            };

        </script>
        @stack('js')
</body>
</html>
