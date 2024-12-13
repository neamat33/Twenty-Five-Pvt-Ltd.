@extends('web.layout.default')
@section('title_area', 'Mufti Osman Goni Salehi')
@section('main_section')

<div class="hero_area">
    <!-- header section strats -->
    @include('web.layout.header')
    <!-- end header section -->
    <section class="slider_section position-relative">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <div class="row">
                    <div class="col">
                    <div class="detail-box">
                        <div>
                        <h2>
                            welcome to
    
                        </h2>
                        <h1>
                          Twenty Five Pvt Ltd.
                        </h1>
                        <p>
                          Let’s Be Productive
                        </p>
                        <div class="">
                            <a href="{{ route('contacts')}}">
                            Contact us
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="carousel-item">
                <div class="row">
                    <div class="col">
                    <div class="detail-box">
                        <div>
                        <h2>
                            welcome to
    
                        </h2>
                        <h1>
                            web agency
                        </h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore
                        </p>
                        <div class="">
                            <a href="">
                            Contact us
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="carousel-item">
                <div class="row">
                    <div class="col">
                    <div class="detail-box">
                        <div>
                        <h2>
                            welcome to
    
                        </h2>
                        <h1>
                            web agency
                        </h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore
                        </p>
                        <div class="">
                            <a href="">
                            Contact us
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
  </div>
 <!-- do section -->
 <section class="do_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          What we do
        </h2>
        <p>
          We specialize in creating innovative, scalable, and user-centric software solutions tailored to empower businesses and drive digital transformation.
        </p>
      </div>
      <div class="do_container">
        <div class="box arrow-start arrow_bg">
          <div class="img-box">
            <img src="{{ asset('web') }}/assets/images/d-5.png" alt="">
          </div>
          <div class="detail-box">
            <h6>
              Software Development
            </h6>
          </div>
        </div>
        <div class="box arrow-middle arrow_bg">
          <div class="img-box">
            <img src="{{ asset('web') }}/assets/images/d-2.png" alt="">
          </div>
          <div class="detail-box">
            <h6>
              Product Maintenance
            </h6>
          </div>
        </div>
        <div class="box arrow-middle arrow_bg">
          <div class="img-box">
            <img src="{{ asset('web') }}/assets/images/d-3.png" alt="">
          </div>
          <div class="detail-box">
            <h6>
              IT Consulting
            </h6>
          </div>
        </div>
        <div class="box arrow-end arrow_bg">
          <div class="img-box">
            <img src="{{ asset('web') }}/assets/images/d-4.png" alt="">
          </div>
          <div class="detail-box">
            <h6>
              DevOps
            </h6>
          </div>
        </div>
        <div class="box ">
          <div class="img-box">
            
            <img src="{{ asset('web') }}/assets/images/d-1.png" alt="">
          </div>
          <div class="detail-box">
            <h6>
              Marketing
            </h6>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end do section -->

  <!-- who section -->

  <section class="who_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="img-box">
            <img src="{{ asset('web') }}/assets/images/who-img.jpg" alt="">
          </div>
        </div>
        <div class="col-md-7">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                WHO WE ARE?
              </h2>
            </div>
            <p>
              We are a dynamic team of 10 passionate professionals who thrive on collaboration and innovation. Though small in size, our collective efforts make us a powerhouse of productivity—delivering results three times faster and better when we work together.
            </p>
            <div>
              <a href="{{ route('about') }}">
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end who section -->


  <!-- work section -->
  <section class="work_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          CREATIVE WORKS
        </h2>
        <p>
          consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
          minim veniam, quis nostrud exercitation
        </p>
      </div>
      <div class="work_container layout_padding2">
        <div class="box b-1">
          <img src="{{ asset('web') }}/assets/images/w-1.png" alt="">
        </div>
        <div class="box b-2">
          <img src="{{ asset('web') }}/assets/images/w-2.png" alt="">

        </div>
        <div class="box b-3">
          <img src="{{ asset('web') }}/assets/images/w-3.png" alt="">

        </div>
        <div class="box b-4">
          <img src="{{ asset('web') }}/assets/images/w-4.png" alt="">

        </div>
      </div>
    </div>
  </section>

  <!-- end work section -->

  <!-- client section -->
  <section class="client_section">
    <div class="container">
      <div class="heading_container">
        <h2>
          WHAT CUSTOMERS SAY
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('web') }}/assets/images/c-1.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Sajib Biswas <br>
                  <span>
                    Dipiscing elit
                  </span>
                </h5>
                <img src="{{ asset('web') }}/assets/images/quote.png" alt="">
                <p>
                  Sajib is highly skilled and reliable, delivering innovative solutions with exceptional quality. A true professional!
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('web') }}/assets/images/c-2.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Bapon Sheikh <br>
                  <span>
                    Dipiscing elit
                  </span>
                </h5>
                <img src="{{ asset('web') }}/assets/images/quote.png" alt="">
                <p>
                  Bapon’s attention to detail and proactive approach make him an excellent problem-solver and a valuable team member.
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('web') }}/assets/images/c-3.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Al Jubaiar<br>
                  <span>
                    Dipiscing elit
                  </span>
                </h5>
                <img src="{{ asset('web') }}/assets/images/quote.png" alt="">
                <p>
                  Al is creative, adaptable, and a fantastic team player who consistently delivers great results
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- target section -->
  <section class="target_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              100+
            </h2>
            <h5>
              Years of Business
            </h5>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              20+
            </h2>
            <h5>
              Projects Delivered
            </h5>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              100+
            </h2>
            <h5>
              Satisfied Customers
            </h5>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              150+
            </h2>
            <h5>
              Cups of Coffee
            </h5>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end target section -->


  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container">

      <div class="heading_container">
        <h2>
          Request A Call Back
        </h2>
      </div>
      <div class="">
        <div class="">
          <div class="row">
            <div class="col-md-9 mx-auto">
              <div class="contact-form">
                <form action="{{ route('contacts.save') }}" method="POST">
                  @csrf
                  <div>
                    <input type="text" name="name" placeholder="Full Name" required>
                  </div>
                  <div>
                    <input type="text" name="mobile" placeholder="Phone Number" required>
                  </div>
                  <div>
                    <input type="email" name="email" placeholder="Email Address">
                  </div>
                  <div>
                    <input type="text" name="message" placeholder="Message" class="input_message" required>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn_on-hover">
                      Send
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="map_img-box">
        <img src="{{ asset('web') }}/assets/images/map-img.png" alt="">
      </div>
    </div>
  </section>


  <!-- end contact section -->


@endsection