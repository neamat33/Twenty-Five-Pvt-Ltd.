@extends('web.layout.default')
@section('title_area', 'Question Answering, Mufti Osman Goni Salehi')
@section('main_section')

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>মাস'আলা সমূহ</h2>
                        <p>মুফতি (আরবি: مفتي) হলেন একজন ইসলামি পণ্ডিত যিনি ইসলামি </p>
                    </div>
                    <div class="page_link">
                        <a href="index.html">হোম</a>
                        <a href="far.html">মাস'আলা</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Faq Area =================-->
    <section class="faq section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <div class="accordion-wrap">

                        @foreach ($masalahs as $key => $masalah)
                            <a class="accordion" data-toggle="collapse" href="#collapse-{{$key}}" role="button"
                                aria-expanded="false">
                                <div class="teaser">
                                    <div class="time">
                                        <h5>{{ \Carbon\Carbon::parse($masalah->created_at)->format('d/m/Y') }}</h5>
                                        <h5>{{ $masalah->name }}</h5>
                                    </div>
                                    @php
                                    $cleanedAnswer = strip_tags($masalah->answer); // Remove HTML tags
                                    $limitedAnswer = Str::limit($cleanedAnswer, 180, '...'); // Limit to 180 characters
                                     @endphp
                                    <div class="title">
                                        <h3>{{ $masalah->question}}</h3>
                                        <span style="color: black">{{ $limitedAnswer }}</span>
                                    </div>
                                </div>

                                <div class="collapse" id="collapse-{{$key}}">
                                    <div class="content">
                                        <div class="card">
                                            <div class="card-body">
                                                {!! $masalah->answer !!}
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>

                                <div class="accordion-toggle">
                                    <span class="one"></span>
                                    <span class="two"></span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--================ End Faq Area =================-->

@endsection
