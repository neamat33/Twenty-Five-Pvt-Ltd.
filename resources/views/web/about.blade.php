@extends('web.layout.default')
@section('title_area','Contact Us')
@section('main_section')
<div class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
     @include('web.layout.header')
    <!-- end header section -->
  </div>
  <!-- who section -->
  <section class="who_section layout_padding">
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
                As the creators of InstaJob, a groundbreaking startup brand revolutionizing the on-demand workforce industry, we are committed to making a significant impact in this space. Our belief in the power of technology and our dedication to excellence drive us to develop innovative solutions that shape the future.
                At our core, we value teamwork, creativity, and a relentless pursuit of progress. Join us on this exciting journey as we continue to break boundaries and redefine possibilities.
                
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
@endsection
