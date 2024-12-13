@extends('web.layout.default')
@section('title_area','Contact Us')
@section('main_section')
<div class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
     @include('web.layout.header')
    <!-- end header section -->
  </div>
  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      @if (isset($response['message']))
          <div class="alert alert-success">
              {{ $response['message'] }}
          </div>
      @endif
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
</div>
@endsection
