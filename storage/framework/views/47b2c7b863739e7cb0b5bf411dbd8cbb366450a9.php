<?php $__env->startSection('title_area','Contact Us'); ?>
<?php $__env->startSection('main_section'); ?>
<div class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
     <?php echo $__env->make('web.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end header section -->
  </div>
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
                <form action="<?php echo e(route('contacts.save')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
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
        <img src="<?php echo e(asset('web')); ?>/assets/images/map-img.png" alt="">
      </div>
    </div>
  </section>     
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\putul\p_web\resources\views/web/contact.blade.php ENDPATH**/ ?>