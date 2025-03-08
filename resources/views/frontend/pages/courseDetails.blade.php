@extends('frontend.layouts.index')
@section('frontend')
    <!-- course banner part start  -->
    <section class="course-bg lg:h-[325px] md:h-[250px] h-[200px] flex items-center justify-center">
        <div class="flex flex-col gap-10 items-center justify-center w-full h-full z-50 relative">
            <h2 class="text-white text-center text-3xl lg:text-6xl font-semibold uppercase">LEARN MORE course details</h2>
            <!-- breadcrumbs -->
            <ul class="flex text-white">
                <li><a href="#" class="text-white text-[20px] font-normal pl-6 pr-6 ">Home</a></li>
                <li class="text-white text-[20px] font-normal pl-6 pr-6 relative breadcrumb-list active">About</li>
            </ul>
        </div>
    </section>
    <!-- course banner part end -->

    <!-- course details layer start here  -->
    <section class="container">
        <div class="grid lg:grid-cols-11 gap-10 mt-10">
            <!-- course overview element -->
            <div class="lg:col-span-8">
                <div class="flex items-center gap-3">
                    @if ($course->teacher_id)
                    <img src="{{ asset('frontend/img/testi_avatar01.png') }}" alt="">
                        <p class="text-xl font-normal">By <span class="text-main"> Addie Walters</span>
                        </p>
                    @endif
                </div>

                <div class="my-4 flex items-center justify-between w-full">
                    <div>
                        <h2 class="md:text-3xl text-[20px] font-semibold text-[#121212]">{{ $course->name }}</h2>
                        <div class="flex items-center mt-3 gap-3 text-gray-700 pb-4">
                            <div class="flex items-center text-sm gap-1 text-[#e4cf11] ">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="font-semibold">
                                4.4 <span class="font-normal text-gray-500">(4,151)</span>
                            </p>
                        </div>
                    </div>

                    {{-- <div>
                        <button class="py-2 px-4 bg-main text-white text-base font-medium rounded-[8px] ">Marketing</button>
                    </div> --}}
                </div>

                <div class="course-img relative lg:h-[500px] md:h-[450px]">
                    <img src="{{ asset($course->image) }}" alt="" class="w-full h-full object-cover rounded-md">
                </div>

                <!-- tab section start -->
                <div class="border border-border my-10">
                    <!-- tab-heading -->
                    <div class="flex items-center  bg-[#f3f3f3] border-b border-border tab-container">
                        <div onclick="openTab('tab1')"
                            id="tab-1"class="tab relative active  md:px-[28px] px-[20px] md:py-[18px] py-[14px] w-full md:w-fit cursor-pointer hover:bg-main duration-300  bg-transparent text-[#242424] hover:text-white lg:text-[20px] md:text-[18px] text-base font-normal">
                            Overview</div>
                        {{-- <div onclick="openTab('tab2')" id="tab-2"class="tab relative   w-full md:w-fit cursor-pointer hover:bg-main duration-300 md:px-[28px] px-[20px] md:py-[18px] py-[14px] bg-transparent text-[#242424] hover:text-white lg:text-[20px] md:text-[18px] text-base font-normal"> Curriculum </div> --}}

                        <div onclick="openTab('tab3')"
                            id="tab-3"class="tab relative   w-full md:w-fit cursor-pointer hover:bg-main duration-300 md:px-[28px] px-[20px] md:py-[18px] py-[14px] bg-transparent text-[#242424] hover:text-white lg:text-[20px] md:text-[18px] text-base font-normal">
                            Review</div>
                    </div>

                    <!-- overview tab -->
                    <div id="tab1" class="tab-content hidden active">
                        <h2 class="lg:text-2xl md:text-xl text-lg font-medium text-black">Overview</h2>

                        <div class="mt-5">
                            <p class="font-open-sans text-gray-800 md:text-base text-sm">{!! $course->description !!} </p>

                        </div>
                    </div>

                    <!-- curriculum tab here -->

                    {{-- <div id="tab2" class="tab-content curriculumn">
              <h2 class="lg:text-2xl md:text-xl text-lg font-medium text-black">Starting beginners level course</h2>

              <div class="mt-5">
                <p class="font-open-sans text-gray-800">
                  our worldwide annual spend on digital advertising surpassing $325 billion, it’s no surprise that different apches to online marketing are becoming available. F approach to digitalmarketing or advertising where businesses only pay when a specific result occurs. This result could be a new. Performance marketing involves channels such as affiliate marketing, online advertising.
                </p>

                <div class="mt-10">
                  <div class="flex items-center justify-between pb-5 border-b border-border">
                    <div class="flex items-center">
                      <span class="w-[35px] h-[35px] leading-[35px] text-center rounded-full bg-indigo-700 inline-block"><i class="fa-solid fa-play text-white text-lg"></i></span>
                        <a href="#" class="ml-8 text-[20px]">Introduction to Editing</a>
                    </div>
                    <p class="text-gray-500">16 minutes</p>
                  </div>

                  <div class="flex items-center justify-between pb-5 border-b border-border my-4">
                    <div class="flex items-center">
                      <span class="w-[35px] h-[35px] leading-[35px] text-center rounded-full bg-[#f16101] inline-block"><i class="fa-solid fa-file text-white text-lg"></i></span>
                        <a href="#" class="ml-8 text-[20px]">Basic Editing Technology</a>
                    </div>
                    <p class="text-gray-500">16 minutes</p>
                  </div>

                  <div class="flex items-center justify-between pb-5 border-b border-border">
                    <div class="flex items-center">
                      <span class="w-[35px] h-[35px] leading-[35px] text-center rounded-full bg-[#d23f3f] inline-block"><i class="fa-solid fa-message text-white text-lg"></i></span>
                        <a href="#" class="ml-8 text-[20px]">Quiz</a>
                    </div>
                    <p class="text-gray-500">16 minutes</p>
                  </div>



                </div>
              </div>
            </div> --}}

                    <!-- review tab -->
                    <div id="tab3" class="tab-content">
                        <h2 class="lg:text-2xl md:text-xl text-lg font-medium text-black">Reviews</h2>

                        <div class="mt-8">
                            <div class="lg:flex lg:gap-20 gap-10 w-full flew-row items-center">
                                <div class="flex justify-center">
                                    <div
                                        class="w-[200px] h-[200px] rounded-full bg-gray-100 flex items-center justify-center flex-col ">
                                        <h2 class="text-3xl text-black">4.6</h2>
                                        <div class="flex items-center text-sm gap-1 text-[#e4cf11] my-3">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <h1 class="text-main text-xl">Top Rating</h1>
                                    </div>
                                </div>

                                <div class="w-full">
                                    <div class="mb-4">
                                        <p class="text-lg font-semibold text-neutral-500 mb-2">5 Stars</p>
                                        <div>
                                            <div class=" w-full h-[10px] bg-gray-200 ">
                                                <div class="w-[76%] h-full bg-main"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-lg font-semibold text-neutral-500 mb-2">4 Stars</p>
                                        <div>
                                            <div class=" w-full h-[10px] bg-gray-200 ">
                                                <div class="w-[76%] h-full bg-main"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-lg font-semibold text-neutral-500 mb-2">3 Stars</p>
                                        <div>
                                            <div class=" w-full h-[10px] bg-gray-200 ">
                                                <div class="w-[76%] h-full bg-main"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-lg font-semibold text-neutral-500 mb-2">2 Stars</p>
                                        <div>
                                            <div class=" w-full h-[10px] bg-gray-200 ">
                                                <div class="w-[76%] h-full bg-main"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-lg font-semibold text-neutral-500 mb-2">1 Stars</p>
                                        <div>
                                            <div class=" w-full h-[10px] bg-gray-200 ">
                                                <div class="w-[76%] h-full bg-main"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10">
                            <div>
                                <div class="flex items-center justify-between flex-wrap">
                                    <div class="flex items-center gap-3">
                                        <img src="./img/testi_avatar01.png" alt="">
                                        <div>
                                            <h2 class="text-xl text-black font-medium">Lina David</h2>
                                            <div class="flex items-center text-sm gap-1 text-[#e4cf11] mt-2">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2 text-gray-400">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>3 Month</span>
                                    </div>
                                </div>
                                <p class="mt-4 text-base font-medium font-open-sans">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Ab, voluptate? Ipsa explicabo totam iusto possimus, molestiae ratione
                                    atque ad consequatur odit dicta, magnam iste labore, quam ex voluptatum id rerum?</p>
                            </div>


                            <div class="mt-5">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <img src="./img/testi_avatar01.png" alt="">
                                        <div>
                                            <h2 class="text-xl text-black">Lina David</h2>
                                            <div class="flex items-center text-sm gap-1 text-[#e4cf11] mt-2">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2 text-gray-400">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>3 Month</span>
                                    </div>
                                </div>
                                <p class="mt-4 text-base font-medium font-open-sans">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Ab, voluptate? Ipsa explicabo totam iusto possimus, molestiae ratione
                                    atque ad consequatur odit dicta, magnam iste labore, quam ex voluptatum id rerum?</p>
                            </div>


                        </div>
                    </div>
                </div>


            </div>

            <!-- course price element -->
            <div class="lg:col-span-3 ">
                <div class="p-4 bg-[#fff] border border-border sticky top-[130px]">
                    <div class="w-full h-[250px] relative">
                        <img src="./img/course/course-bg.png" alt=""
                            class="w-full h-full object-cover rounded-[5px]">
                        <div class="overlay"></div>
                        <span
                            class="w-[50px] h-[50px] shadow-xl duration-300 hover:shadow-none bg-indigo-700 rounded-full flex items-center justify-center middle-icon">
                            <i class="fa-solid fa-play text-lg text-white"></i>
                        </span>
                    </div>
                    <div class="flex items-center justify-between py-3 mt-5">
                        <h2 class="text-xl text-black font-medium">{{ $course->discount_fee ??  $course->course_fee}} ৳</h2>
                        <p class="text-xl text-gray-600 font-normal">{{ $course->discount }} ৳ off</p>
                    </div>
                    <button
                        class="w-full bg-transparent text-main border-main  text-xl font-normal mt-5 rounded-[5px] py-2 hover:text-white hover:bg-main duration-300 border">Add
                        to cart</button>
                    <button
                        class="w-full bg-main text-white text-xl font-normal mt-5 rounded-[5px] py-2 hover:bg-[#25ded0]">Buy
                        Now</button>
                </div>
            </div>
        </div>
    </section>
    <!-- course details layer end here  -->

    <!-- recent courses  start -->
    <section class="container py-20">
        <!-- section title -->
        <div class="text-center lg:mb-14 mb-5">
            <h2 class="text-main lg:text-5xl md:text-3xl text-3xl font-bold font-trio-bangla">
                Recent Courses
            </h2>
        </div>
        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-6 mt-10">
            @foreach ($courses as $course)
                        <a href="{{ route('course.Details',$course->slug) }}">
                            <div class="w-full max-w-sm overflow-hidden bg-white rounded-lg border border-border group">
                                <div class="relative overflow-hidden">
                                    <img class="object-cover object-center w-full h-56 group-hover:scale-125 transition-transform duration-1000"
                                        src="{{ asset($course->image) }}" alt="avatar" />
                                </div>

                                <div class="xl:px-6 lg:px-2 px-3 md:px-4 py-4">
                                    <h1 class="text-lg font-medium text-gray-800 group-hover:text-main">
                                        {{ $course->name }}
                                    </h1>

                                    {{-- <p class="py-2 text-gray-500 font-open-sans text-sm font-semibold">
                                        Web design involves creating the visual elements and layout
                                        of a website, while
                                    </p> --}}
                                    <!-- category part -->
                                    <p class="text-[12px] font-open-sans text-gray-500 py-2">
                                        <b class="text-black">Category: </b> UPGRADE SKILL
                                    </p>
                                    <!-- last updated -->
                                    <p class="text-[12px] font-open-sans text-gray-500">
                                        <b class="text-black">Last Updated: </b> {{ $course->updated_at }}
                                    </p>

                                    <!-- total lesson & course time -->
                                    <div class="flex items-center xl:gap-6 lg:gap-3 gap-6 mt-2">
                                        <div class="font-open-sans flex items-center lg:gap-1 gap-2 xl:gap-2">
                                            <i class="fas fa-circle-play"></i>
                                            <span class="text-sm text-gray-500 font-medium">{{ $course->total_sheet }} Lesson</span>
                                        </div>
                                        <div class="font-open-sans flex items-center lg:gap-1 gap-2 xl:gap-2">
                                            <i class="fa-regular fa-clock"></i>
                                            <span class="text-sm text-gray-500 font-medium">{{ $course->total_hours}} Hrs</span>
                                        </div>
                                    </div>

                                    <!-- rating  -->
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-1 mt-2">
                                            <div class="flex items-center gap-[2px] text-[#ffa500]">
                                                <i class="fa-solid fa-star text-sm"></i>
                                                <i class="fa-solid fa-star text-sm"></i>
                                                <i class="fa-solid fa-star text-sm"></i>
                                                <i class="fa-solid fa-star text-sm"></i>
                                                <i class="fa-solid fa-star-half-alt text-sm"></i>
                                            </div>
                                            <span class="text-gray-600">(4.5 Rating)</span>
                                        </div>

                                        {{-- <p class="font-open-sans text-sm text-gray-500 font-semibold">
                                            6 sales
                                        </p> --}}
                                    </div>

                                    <div class="flex items-center justify-between mt-2">
                                        <div>
                                            <p class="font-semibold text-black text-lg group-hover:text-main">
                                                {{ $course->discount_fee ??  $course->course_fee}} ৳
                                            </p>
                                            @if($course->discount)
                                            <p class="text-gray-500 text-sm font-medium">
                                                <del>{{ $course->course_fee }} ৳</del>
                                            </p>
                                            @endif
                                        </div>
                                        <button
                                            class="flex items-center gap-3 px-3 py-2 hover:bg-[#79b530] hover:text-white border border-border rounded-md text-gray-700 text-sm duration-300 hover:border-[#79b530]">
                                            <i class="fa-solid fa-cart-shopping"></i> Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
        </div>
    </section>
    <!-- recent courses  end-->
@endsection
