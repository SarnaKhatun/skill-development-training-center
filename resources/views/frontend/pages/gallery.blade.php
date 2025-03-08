
@extends('frontend.layouts.index')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"  />

@endpush
@section('frontend')

    <!-- gallery banner part start  -->
    <section
        class="bg-[url('frontend/img/about/breadcrumb_bg02.jpg')] bg-cover  md:h-[250px] h-[200px] bg-top-center bg-no-repeat relative">
        <!-- Black overlay -->
        <div class="absolute inset-0 bg-[#000] opacity-50 z-10"></div>
        <div class="flex flex-col gap-10 items-center justify-center w-full h-full z-50 relative">
            <h2 class="text-white text-3xl lg:text-5xl font-semibold uppercase">
                আমাদের গ্যালারি
            </h2>
            <!-- breadcrumbs -->
            <ul class="flex text-white">
                <li>
                    <a href="#" class="capitalize text-white text-[20px] font-normal pl-6 pr-6">Home</a>
                </li>
                <li class="capitalize text-[20px] font-normal pl-6 pr-6 relative breadcrumb-list active">
                    gallery
                </li>
            </ul>
        </div>
    </section>
    <!-- gallery banner part end  -->

    <!-- gallery section start -->
    <section class="md:py-20 py-10 bg-[#eaeaea]">
        <div class="container">
            <!-- section title -->
            <div class="text-center lg:mb-10 mb-5">
                <h2 class="text-main lg:text-5xl md:text-3xl text-3xl font-bold">
                    আমাদের গ্যালারী
                </h2>
                <p class="text-lg text-black font-medium md:w-3/4 mx-auto mt-4">
                    সময়োপযোগী কোর্সসমূহ দিয়ে সাজানো হয়েছে আমাদের পাঠ্যসূচি, যা আপনাকে
                    বিশ্বজুড়ে কর্মক্ষম করে গড়ে তুলবে।
                </p>
            </div>
            <!-- section title end  -->


            <!-- gallery image container section start  -->
            <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10"> -->
            <div class="gallery-slider">
                <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-y-6">
                @foreach ($galleries as $gallery)
                    <div class="team-box  overflow-hidden text-center group">
                        <div class="team-thumb relative">
                                <img src="{{ asset($gallery->path_name) }}" alt="">
                            <div class="absolute inset-0 bg-[#000] opacity-30 z-10"></div>
                            <a href="{{ asset($gallery->path_name) }}" class="test-popup-link ">
                          <span class="absolute top-[50%]  left-[50%] -translate-x-[50%] duration-500 -translate-y-[50%] opacity-0 group-hover:opacity-100 transition-opacity z-50 text-2xl text-white ">
                              <i class="fas fa-eye"></i>
                          </span>

                            </a>

                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <!-- gallery image container section end -->
        </div>
    </section>
    <!-- gallery section end -->


    <!-- video section start  -->
    {{-- <section class="md:py-20 py-10">

        <!-- section title -->
        <div class="text-center lg:mb-10 mb-5">
            <h2 class="text-main lg:text-5xl md:text-3xl text-3xl font-bold">
                আমাদের ভিডিও
            </h2>
            <p class="text-lg text-black font-medium md:w-3/4 mx-auto mt-4">
                সময়োপযোগী কোর্সসমূহ দিয়ে সাজানো হয়েছে আমাদের পাঠ্যসূচি, যা আপনাকে
                বিশ্বজুড়ে কর্মক্ষম করে গড়ে তুলবে।
            </p>
        </div>
        <!-- section title end  -->
        </div>

        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                <div class="relative  max-h-[300px]  video-wrapper">
                    <img src="./img/gallery/5.jpg" class="rounded-[12px]" alt="">
                    <div class="bg-[#000] absolute inset-0 rounded-[12px] opacity-50"></div>
                    <span id="openVideoBtn"
                        class="w-[50px] h-[50px] bg-main rounded-full text-white inline-block flex items-center justify-center  cursor-pointer vid-play-icon hover:bg-primary hover:text-white duration-300">
                        <i class="fas fa-play text-[24px]"></i>
                    </span>
                </div>

                <div class="relative  max-h-[300px]  video-wrapper">
                    <img src="./img/gallery/6.jpg" class="rounded-[12px]" alt="">
                    <div class="bg-[#000] absolute inset-0 rounded-[12px] opacity-50"></div>
                    <span
                        class="w-[50px] h-[50px] bg-main rounded-full text-white inline-block flex items-center justify-center  cursor-pointer vid-play-icon hover:bg-primary hover:text-white duration-300">
                        <i class="fas fa-play text-[24px]"></i>
                    </span>
                </div>

                <div class="relative  max-h-[300px]  video-wrapper">
                    <img src="./img/gallery/4.jpg" class="rounded-[12px]" alt="">
                    <div class="bg-[#000] absolute inset-0 rounded-[12px] opacity-50"></div>
                    <span
                        class="w-[50px] h-[50px] bg-main rounded-full text-white inline-block flex items-center justify-center  cursor-pointer vid-play-icon hover:bg-primary hover:text-white duration-300">
                        <i class="fas fa-play text-[24px]"></i>
                    </span>
                </div>



            </div>
    </section> --}}
    <!-- video section end -->


@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script>

        $(document).ready(function() {
            $('.test-popup-link').magnificPopup({
                type: 'image',
                gallery:{
                    enabled:true
                }
            });
        });
    </script>
@endpush