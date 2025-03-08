@extends('frontend.layouts.index')
@section('frontend')
     <!-- about banner part start  -->
     <section
     class="bg-[url('frontend/img/about/breadcrumb_bg02.jpg')] bg-cover  md:h-[250px] h-[200px] bg-top-center bg-no-repeat relative">
     <!-- Black overlay -->
     <div class="absolute inset-0 bg-[#000] opacity-50 z-10"></div>
     <div
       class="flex flex-col gap-10 items-center justify-center w-full h-full z-50 relative">
       <h2 class="text-white text-3xl lg:text-4xl font-semibold uppercase">
         আমাদের সম্পর্কে
       </h2>
       <!-- breadcrumbs -->
       <ul class="flex text-white">
         <li>
           <a href="#"
             class="text-white text-[20px] font-normal pl-6 pr-6">Home</a>
         </li>
         <li
           class="text-white text-[20px] font-normal pl-6 pr-6 relative breadcrumb-list active">
           About
         </li>
       </ul>
     </div>
   </section>
   <!-- about banner part end  -->

   <!-- about us section start  -->
   <section class="about-container relative lg:py-[80px] md:py-[60px] py-10">
     <img
       src="./img/about/courses_shape01.png"
       alt
       class="absolute top-0 left-0 -z-10" />
     <!-- about heading -->
     <div class="text-center container">
       <h2 class="lg:text-4xl md:text-3xl text-2xl font-semibold text-black">
         কারিগরি শিক্ষার জন্য আমাদের শীর্ষ  কোর্স
         <span class="text-main">ব্রাউজ</span>  করুন.
       </h2>
     </div>

     <!-- about content -->
     <div class="container">
       <!-- <div class="bg-[url('./img/about/featured_courses_shape.png')] bg-left-bottom bg-cover py-20 bg-no-repeat mt-10"> -->
       <div class="lg:mt-[100px] md:mt-[80px] mt-10">
         <div class="featured-courses-shape"></div>
         <div
           class="flex items-center justify-center gap-[50px] lg:flex-row flex-col">
           <div class="lg:w-1/2 lg:text-right">
             <!--<span class="text-base text-gray-400 mb-4">INGREDIENTS</span>-->
             <h2 class="text-[26px] mb-[25px] font-medium">
               জ্ঞান অর্জনের জন্য <span class="text-main">শিক্ষাগত পথ</span>
             </h2>
             <p
               class="text-sm font-medium text-[#7d7d7d] w-[96%] lg:w-2/3 lg:ml-auto font-open-sans mb-[35px]">
              একটি মানসম্পন্ন শিক্ষা একজন ব্যক্তির ব্যক্তিগত, সামাজিক এবং অর্থনৈতিক উন্নয়নকে উৎসাহিত করে। এটি আমাদের দৈনন্দিন জীবনের ক্রিয়াকলাপগুলি দক্ষতার সাথে এবং কার্যকরভাবে সম্পাদন করতে সজ্জিত করে। শিক্ষা কর্তব্য ও দায়িত্ববোধ জাগ্রত করে। উপরন্তু, এটি আমাদের নতুন দক্ষতা এবং জ্ঞান অর্জন করতে সক্ষম করে যা আমাদের জীবনে দীর্ঘস্থায়ী প্রভাব ফেলে।
             </p>
             <button
               class="px-10 py-4 bg-primary text-white border border-primary font-semibold hover:bg-main hover:text-white duration-300 hover:border-main">
               শুরু করুন
             </button>
           </div>
           <div class="lg:w-1/2">
             <img src="{{ asset('frontend/img/about/about.jpg') }}" alt />
           </div>
         </div>
       </div>
     </div>
   </section>
   <!-- about us section end -->

   <!-- category bg start  -->
   <!--<section-->
   <!--  class="bg-[url('frontend/img/about/cta_bg.jpg')] bg-fixed bg-cover lg:py-[150px] py-[100px] relative">-->
   <!--  <div-->
   <!--    class="bg-[#000] inset-0 opacity-50 absolute top-0 left-0 bg-fixed"></div>-->

   <!--  <div class="flex items-center justify-center w-full h-full">-->
   <!--    <div class="relative">-->
   <!--      <h2-->
   <!--        class="relative lg:text-5xl md:text-4xl text-3xl font-medium text-white capitalize text-center">-->
   <!--        Get <span class="text-primary">Personalized</span> All Categories-->
   <!--        Recommendations-->
   <!--        <span-->
   <!--          class="absolute w-[5px] h-[5px] bg-primary -right-[12px] bottom-0 hidden lg:block"></span>-->
   <!--      </h2>-->
   <!--      <p-->
   <!--        class="text-lg font-normal text-white text-center mt-7 font-open-sans">-->
   <!--        Answer a few questions for your top picks of the printing-->
   <!--      </p>-->

   <!--      <div class="flex items-center justify-center md:gap-8 gap-5 mt-10">-->
   <!--        <button-->
   <!--          class="md:px-8 px-5 md:py-4 py-3 bg-primary text-white font-medium text-lg duration-300 ease hover:bg-main hover:text-white">-->
   <!--          + Start Teaching Today-->
   <!--        </button>-->
   <!--        <button-->
   <!--          class="md:px-8 px-5 md:py-4 py-3 border border-white border-[2px] font-medium text-white duration-300 ease bg-transparent hover:bg-primary hover:text-white hover:border-primary">-->
   <!--          Get Started-->
   <!--        </button>-->
   <!--      </div>-->
   <!--    </div>-->
   <!--  </div>-->
   <!--</section>-->
   <!-- category bg end -->

   <!-- team member start -->
   <section class="md:py-20 py-10">
     <!-- section title -->
     <div class="text-center lg:mb-10 mb-5">
       <h2 class="text-main lg:text-4xl md:text-2xl text-2xl font-bold">
         আমাদের সকল ব্রাঞ্চসমূহ </h2>
       <!--<p class="text-lg text-black font-medium md:w-3/4 mx-auto mt-4">-->
       <!--  দক্ষ শিক্ষকরাই আমাদের প্রতিষ্ঠানের মেরুদন্ড-->
       <!--</p>-->
     </div>
     <!-- section title end  -->

     <!-- team member start  -->
     <div class="container">
       <div
         class="grid grid-cols-1 md:gridc-cols-2 lg:grid-cols-4 gap-10 lg:mt-[60px] md:mt-[50px] mt-10">
         <!-- 1st card -->
         @foreach ($branches as $item)
            <div class="team-box overflow-hidden text-center shadow-2xl pb-5">
                <div class="team-thumb relative">
                    {{-- <img src="{{ asset('frontend/img/about/team_img01.jpg') }}" alt /> --}}
                    @if($item->image)
                        <img  src="{{ asset($item->image) }}" class="custom-img-style" alt="No Image">
                    @else
                        <img  src="{{ asset('backend/images/no-image.png') }}" class="custom-img-style" alt="No Image">
                    @endif
                </div>
                <div class="team-content pt-4">
                    <h4 class="text-[20px] mb-[7px]">
                        <a href="#" class="text-black hover:text-main">{{ $item->name ?? "" }}<span class="text-3xl text-main">.</span></a>
                    </h4>
                    <span class="text-[#7d7d7d] font-medium">{{ $item->institute_name_en }} ({{ $item->center_code }})</span> <br>
                     <span class="text-[#7d7d7d] font-medium">{{ $item->district->name ?? '' }} , {{ $item->upazilla->name ?? ''}}</span>
                </div>
            </div>
        @endforeach
       </div>
     </div>
   </section>
   <!-- team member end -->
@endsection