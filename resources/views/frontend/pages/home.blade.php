@extends('frontend.layouts.index')
@section('frontend')
    <!-- hero section start  -->
    <section class="bg-[#f5f9f1] overflow-hidden">
        <div class="container lg:px-14 px-6 lg:py-16 pt-7 pb-9 mx-auto">
            <div class="items-center flex flex-col flex-col-reverse lg:flex-row">
                <div class="w-full lg:w-1/2 mt-10 lg:mt-0">
                    <div class="lg:max-w-lg">
                        <p class="text-black text-lg font-semibold font-trio-bangla">
                            গণপ্রজাতন্ত্রী বাংলাদেশ সরকার কর্তৃক অনুমোদিত
                        </p>
                        <h1 class="text-3xl font-semibold text-main lg:my-6 lg:text-7xl my-3 lg:my-0 font-trio-bangla">
                            {{ $bannerSection->title }}
                        </h1>
                        <h5 class="text-green-900 lg:text-4xl md:text-3xl text-2xl font-semibold font-trio-bangla">
                            {{ $bannerSection->sub_title }}
                        </h5>
                        <p class="mt-3 text-black lg:text-lg text-base font-trio-bangla">
                            {{ $bannerSection->description }}
                        </p>

                        <button
                            class="font-trio-bangla w-full px-5 py-3 mt-6 text-sm tracking-wider text-white uppercase transition-colors duration-300 transform bg-main rounded-lg lg:w-auto hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            ছাত্র/ছাত্রীর ভর্তির আবেদন
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-center w-full lg:mt-0 lg:w-1/2 z-0">
                    <div class="relative group">
                        <img class="w-full h-full lg:max-w-3xl rounded-xl opacity-80 transition-opacity"
                            src="{{ asset($bannerSection->image) }}" alt="Catalogue-pana.svg" />
                        <div class="absolute inset-0 bg-[#000] opacity-50 transition-opacity rounded-xl"></div>
                           @php
                               $url=$bannerSection->youtube_link
                           @endphp
                        <a @if($url) href="{{ url($url) }}" @endif target="blank">
                            <div
                                class="absolute inset-0 flex items-center justify-center text-white opacity-100 transition-opacity">
                                <div
                                    class="relative lg:w-[80px] w-[60px] lg:h-[80px] h-[60px] rounded-full cursor-pointer flex justify-center items-center">
                                    <span
                                        class="absolute top-0 right-0 left-0 bottom-0 lg:w-[80px] w-[60px] lg:h-[80px] h-[60px] mt-1 mr-2 bg-[#1b1b1b] custom-ping rounded-full"></span>
                                    <div
                                        class="absolute lg:w-[80px] w-[60px] lg:h-[80px] h-[60px] rounded-full bg-[#1b1b1b] opacity-90 cursor-pointer flex justify-center items-center">
                                    </div>
                                    <i class="fa-solid fa-play text-white lg:text-3xl text-2xl z-10"></i>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero section end -->

    <!-- service section start  -->
    <section class="md:py-20 py-10 font-trio-bangla">
        <div class="container">
            <!-- section title -->
            <div class="text-center lg:mb-10 mb-5">
                <h2 class="text-main lg:text-5xl md:text-3xl text-3xl font-bold">
                    আমাদের সেবাসমুহ
                </h2>
                <p class="text-lg text-black font-medium md:w-3/4 mx-auto mt-4">
                    সময়োপযোগী কোর্সসমূহ দিয়ে সাজানো হয়েছে আমাদের পাঠ্যসূচি, যা আপনাকে
                    বিশ্বজুড়ে কর্মক্ষম করে গড়ে তুলবে।
                </p>
            </div>
            <!-- section title end  -->
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
                <!-- 1st service card -->
                @foreach ($services as $service)
                    <div
                        class="src-card px-8 py-10 rounded-md bg-white text-black hover:bg-main hover:text-white duration-300 ease-in border border-neutral-100">
                        <h6 class="text-base font-semibold">জনপ্রিয় কোর্স</h6>
                        <h1 class="text-xl font-semibold my-3">{{ $service->title }}</h1>
                        <p class="text-base font-normal mb-3">
                            {{ $service->description }}
                        </p>
                        <a href="" class="arrow-btn text-lg font-medium ">কারিকুলাম
                            <span></span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- service section end -->

    <!-- favourite section start  -->
    <section class="md:pb-20 py-10 relative">
        <h2 class="hidden xl:block courses-overlay-text">TOP COURSES</h2>
        <div class="container">
            <!-- section title -->
            <div class="text-center lg:mb-10 mb-5">
                <h2 class="text-main lg:text-5xl md:text-3xl text-3xl font-bold font-trio-bangla">
                    আমাদের জনপ্রিয় কোর্সসমুহ
                </h2>
                <p class="text-lg text-black font-medium px-4 md:w-3/4 mx-auto mt-4 font-trio-bangla">
                    সময়োপযোগী কোর্সসমূহ দিয়ে সাজানো হয়েছে আমাদের পাঠ্যসূচি, যা আপনাকে
                    বিশ্বজুড়ে কর্মক্ষম করে গড়ে তুলবে।
                </p>
            </div>
            <!-- section title end  -->

            <!-- favourite section card start  -->
            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-6 mt-10">
                @foreach ($courses as $course)
                <a href="{{ route('course.Details',$course->slug) }}">
                    <div class="w-full lg:lg:max-w-[300px] overflow-hidden bg-white rounded-lg shadow-lg relative">
                        @if ($course->image)
                            <img class="object-cover object-center w-full h-56" src="{{ asset($course->image) }}"
                                alt="avatar" />
                        @else
                            <img class="object-cover object-center w-full h-56"
                                src="{{ asset('backend/images/no-image.png') }}" alt="avatar" />
                        @endif
                        <div class="absolute top-[20px] left-0">
                            <div
                                class="w-[100px] h-8 flex items-center px-4 bg-primary text-base font-semibold uppercase relative popular text-white">
                                Popular
                            </div>
                        </div>

                        <div class="px-6 pt-8 pb-5">
                            <h1 class="text-sm font-medium text-black">
                                In
                                <span class="text-main italic font-medium">Beginner Course</span>
                            </h1>

                            <p class="py-2 text-black font-medium text-lg text-capitalize">
                                {{ $course->name }}
                            </p>

                            <div class="flex items-center mt-3 gap-3 text-gray-700 border-b border-border pb-4">
                                <div class="flex items-center text-sm gap-1 text-[#e4cf11]">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <p class="font-semibold">
                                    3.4 <span class="font-normal text-gray-500">(4,151)</span>
                                </p>
                            </div>

                            <div class="flex items-center justify-between pt-2">
                                <p class="text-black font-semibold text-sm">
                                    {{-- By <a href="#" class="text-gray-500 hover:text-main">Jose Portilla</a> --}}
                                </p>
                                <h6 class="text-base font-medium text-black">{{$course->discount_fee ??  $course->course_fee}} ৳</h6>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <!-- favourite section card  end  -->
        </div>
    </section>
    <!-- favourite section end -->

    <!-- our achievement part start  -->
    <section class="achievement text-center lg:pt-[100px] lg:pb-[110px] py-10">
        <div class="container">
            <h2 class="text-[26px] md:text-[36px] text-white uppercase font-bold">
                Our <span class="text-main">Achievement</span>
            </h2>

            <!-- achievement box start here  -->
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:mt-[70px] mt-[50px]">
                <!-- 1st box -->
                <div class="box text-center">
                    <i class="fa-solid fa-graduation-cap text-5xl text-main"></i>
                    <h3 class="text-3xl md:text-4xl text-white my-4">
                        <span class="count-num">{{ $counter->count_o1 }}</span>K
                    </h3>
                    <p class="text-lg text-white font-medium">Completed Students</p>
                </div>

                <!-- 2nd box -->
                <div class="box text-center">
                    <i class="fa-solid fa-chalkboard-user text-5xl text-main"></i>
                    <h3 class="text-3xl md:text-4xl text-white my-4">
                        <span class="count-num">{{ $counter->count_o2 }}</span>+
                    </h3>
                    <p class="text-lg text-white font-medium">Expert Instructor</p>
                </div>

                <!-- 3rd box -->
                <div class="box text-center">
                    <i class="fa-solid fa-photo-film text-5xl text-main"></i>
                    <h3 class="text-3xl md:text-4xl text-white my-4">
                        <span class="count-num">{{ $counter->count_o3 }}</span>+
                    </h3>
                    <p class="text-lg text-white font-medium">Tutorials in our store</p>
                </div>

                <!-- 4th box -->
                <div class="box text-center">
                    <i class="fa-solid fa-bag-shopping text-5xl text-main"></i>
                    <h3 class="text-3xl md:text-4xl text-white my-4">
                        <span class="count-num">{{ $counter->count_o4 }}</span>+
                    </h3>
                    <p class="text-lg text-white font-medium">Students get employed</p>
                </div>
            </div>
            <!-- achievement box end here  -->
        </div>
    </section>
    <!-- our achievement part end  -->

    <!-- testimonial part start  -->
    <section class="testimonial-bg lg:py-[100px] md:lg:py-[80px] py-[50px]">
        <div class="container">
            <!-- section title -->
            <div class="text-center lg:mb-10 mb-5">
                <h2 class="text-main lg:text-5xl md:text-3xl text-2xl font-bold font-trio-bangla">
                    সফল ছাত্র/ছাত্রী
                </h2>
                <p class="text-lg text-black font-medium w-3/4 mx-auto mt-4 font-trio-bangla">
                    সময়োপযোগী কোর্সসমূহ দিয়ে সাজানো হয়েছে আমাদের পাঠ্যসূচি, যা আপনাকে
                    বিশ্বজুড়ে কর্মক্ষম করে গড়ে তুলবে।
                </p>
            </div>
            <!-- section title end  -->

            <!-- testimonial slider part start here  -->
            <div class="">
                <!-- testimonial card start  -->

                <div class="testimonial-active slick-slider overflow-x-hidden">
                    @foreach ($achive_student as $key => $item)
                        <div class="testimonial-item">
                            <div class="testimonial-quote">
                                <svg version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve">
                                    <g>
                                        <polygon points="0,4 0,28 12,16 12,4"></polygon>
                                        <polygon points="20,4 20,28 32,16 32,4"></polygon>
                                    </g>
                                </svg>
                            </div>
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="testi-content">
                                <p>
                                    {{ $item->description ?? ''}}
                                </p>
                                <div class="testi-avatar-wrap">
                                    <div class="testi-avatar-img">
                                        @if ($item && $item->student && $item->student->image)
                                        <img src="{{ asset($item->student->image) }}" width="70" height="75"
                                                alt="" />
                                        @else
                                            <img src="{{ asset('backend/images/no-image.png') }}" alt="" />
                                        @endif
                                    </div>
                                    <div class="testi-avatar-info">
                                        <h6>{{ $item->student->name_en ?? ''}}</h6>
                                        <span>{{ $item->student->course->name ?? ''}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach ()
                </div>
                <!-- testimonial card end -->
            </div>
            <!-- testimonial slider part end here  -->
        </div>
    </section>

    <!-- testimonial part end -->

    <!-- user regestration part start  -->
    <!--<div class="my-10 flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg lg:max-w-7xl">-->
    <!--    <div class="hidden bg-cover lg:block lg:w-1/2"-->
    <!--        style="-->
    <!--      background-image: url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80');-->
    <!--    ">-->
    <!--    </div>-->

    <!--    <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">-->
    <!--        <h2 class="text-2xl font-semibold font-trio-bangla text-main">-->
    <!--            আপনার প্রোফাইল তৈরি করুন-->
    <!--        </h2>-->

    <!--        <div class="mt-4">-->
    <!--            <label class="block mb-2 text-base font-semibold text-black" for="LoggingEmailAddress">নাম</label>-->
    <!--            <input placeholder="Name" id="LoggingEmailAddress"-->
    <!--                class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:outline-main"-->
    <!--                type="email" />-->
    <!--        </div>-->

    <!--        <div class="mt-4">-->
    <!--            <label class="block mb-2 text-base font-semibold text-black" for="email">ইমেইল</label>-->

    <!--            <input id="email" placeholder="Email"-->
    <!--                class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:outline-main"-->
    <!--                type="email" />-->
    <!--        </div>-->
    <!--        <div class="mt-4">-->
    <!--            <label class="block mb-2 text-base font-semibold text-black" for="phone">ফোন নাম্বার</label>-->

    <!--            <input id="phone" placeholder="Phone Number"-->
    <!--                class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:outline-main"-->
    <!--                type="number" />-->
    <!--        </div>-->
    <!--        <div class="mt-4">-->
    <!--            <label class="block mb-2 text-base font-semibold text-black" for="loggingPassword">পাসওয়ার্ড</label>-->

    <!--            <input id="loggingPassword" placeholder="password"-->
    <!--                class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:outline-main"-->
    <!--                type="password" />-->
    <!--        </div>-->

    <!--        <div class="mt-6">-->
    <!--            <button-->
    <!--                class="w-full md:w-fit inline-block px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-main rounded-lg hover:bg-primary hover:text-white focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">-->
    <!--                সাবমিট করুন-->
    <!--            </button>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- user regestration part end -->
@endsection