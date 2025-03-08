@extends('frontend.layouts.index')
@section('frontend')
  <!-- contact banner part start -->
  <section
  class="bg-[url('./img/contact.jpg')] bg-cover md:h-[250px] h-[200px] bg-center bg-no-repeat relative">
  <!-- Black overlay -->
  <div class="absolute inset-0 bg-[#000] opacity-50 z-10"></div>
  <div
    class="flex flex-col gap-10 items-center justify-center w-full h-full z-50 relative">
    <h2 class="uppercase text-white text-3xl lg:text-4xl font-semibold">
      যোগাযোগ</h2>
    <!-- breadcrumbs -->
    <ul class="flex text-white">
      <li>
        <a href="#"
          class="text-white text-[20px] font-normal pl-6 pr-6">Home</a>
      </li>
      <li
        class="text-white text-[20px] font-normal pl-6 pr-6 relative breadcrumb-list active">
        Contact
      </li>
    </ul>
  </div>
</section>
<!-- contact banner part end -->

<!-- contact form box start -->
<section class="md:py-20 py-10">
  <div class="container">
    <!-- section title -->
    <div class="text-center lg:mb-10 mb-5">
      <h2 class="text-black lg:text-4xl md:text-3xl text-3xl font-semibold">
       আমাদের সাথে যোগাযোগ করুন
      </h2>
      {{-- <p class="text-lg text-[#7b7b7b] font-medium md:w-3/4 mx-auto mt-4">
        Ritamin Ipsum is simply dummy text of the printing and tysettin
      </p> --}}
    </div>
    <!-- section title end  -->

    <div class="flex lg:mt-20 mt-10">
      <div class="w-full lg:w-10/12 xl:w-10/12 mx-auto">
        <div
          class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 contact-info-wrap">
          <div class="contact-box">
            <div class="contact-box-icon">
              <img src="img/icon/contact_icon01.png" alt>
            </div>
            <div class="contact-box-content">
              <h5>Phone Number</h5>
              <span>+01769541121</span>
            </div>
          </div>
          <div class="contact-box">
            <div class="contact-box-icon">
              <img src="img/icon/contact_icon02.png" alt>
            </div>
            <div class="contact-box-content">
              <h5>Find Location</h5>
              <span>37, Shahid Rafiq Sarak, Manikganj Sadar, Manikganj</span>
            </div>
          </div>
          <div class="contact-box">
            <div class="contact-box-icon">
              <img src="img/icon/contact_icon03.png" alt>
            </div>
            <div class="contact-box-content">
              <h5>Our Mail</h5>
              <span>skillsdlt23@gmail.com</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="flex ">
      <!-- map wrapper start -->
      <div
        class="w-full lg:h-[435px] md:h-[380px] h-[250px] lg:w-10/12 xl:w-10/12 mx-auto bg-yellow-800">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116799.97829794523!2d89.95074840266118!3d23.818623156384202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755f5c790f668ef%3A0x833298a1c0c62ae6!2sManikganj%20Sadar%20Upazila!5e0!3m2!1sen!2sbd!4v1719311900085!5m2!1sen!2sbd"
          width="100%" height="100%" style="border:0;" allowfullscreen
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <!-- map wrapper end -->
    </div>

    <!-- input group form -->
    <!--<div class="flex mt-10">-->
    <!--  <div class="w-full lg:w-10/12 mx-auto">-->
    <!--    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">-->
    <!--      <div class="c-form-grp">-->
    <!--        <input type="text" placeholder="First Name *">-->
    <!--        <i class="far fa-user"></i>-->
    <!--      </div>-->
    <!--      <div class="c-form-grp">-->
    <!--        <input type="text" placeholder="First Name *">-->
    <!--        <i class="far fa-user"></i>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--    <div class="c-form-grp">-->
    <!--      <textarea name="message" id="message" placeholder="Your Massage"-->
    <!--        class="h-[97px]"></textarea>-->
    <!--      <i class="far fa-envelope"></i>-->
    <!--    </div>-->
    <!--    <div class="flex justify-center">-->
    <!--      <button-->
    <!--        class="px-[60px] py-3 bg-primary border-primary border text-black text-lg text-white font-medium hover:bg-main hover:text-white hover:border-main duration-300 ">Submit</button>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->

  </div>
</section>
<!-- contact form box end -->
@endsection