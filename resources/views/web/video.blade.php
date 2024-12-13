@extends('web.layout.default')
@section('title_area','Videos Of Mufti Osman Goni Salehi')
@section('main_section')

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>ভিডিও সমূহ</h2>
                        <p>মুফতি (আরবি: مفتي) হলেন একজন ইসলামি পণ্ডিত যিনি ইসলামি </p>
                    </div>
                    <div class="page_link">
                        <a href="index.html">হোম</a>
                        <a href="blog-list.html">ভিডিও</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Videos Product Area =================-->
    <section class="videos_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>ভিডিও সমূহ</span></h2>
                        <img src="img/title-bg.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>

            <div class="row">

                
                @foreach($videos as $video)
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" src="{{ $video->link}}"></iframe>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->title}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach

                
                <div class="col-12 text-center mt-40">
                    <a href="#" class="main_btn main_btn-white">আরো দেখুন </a>
                </div>
            </div>
        </div>

    </section>
    <!--================ End Videos Product Area =================-->

@endsection
