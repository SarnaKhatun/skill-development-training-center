@extends('frontend.layouts.index')
@section('frontend')
    <!-- course banner part start  -->
    <section class="course-bg lg:h-[325px] md:h-[250px] h-[200px] flex items-center justify-center">
        <div class="flex flex-col gap-10 items-center justify-center w-full h-full z-50 relative">
            <h2 class="text-white text-center text-3xl lg:text-5xl font-semibold uppercase">আমাদের কোর্সসমূহ</h2>
            <!-- breadcrumbs -->
            <ul class="flex text-white">
                <li><a href="#" class="text-white text-[20px] font-normal pl-6 pr-6 ">Home</a></li>
                <li class="text-white text-[20px] font-normal pl-6 pr-6 relative breadcrumb-list active">Course</li>
            </ul>
        </div>
    </section>
    <!-- course banner part end -->

    <!-- news card section start here  -->
    <div class="container">
        <div class="grid lg:grid-cols-9 py-5 gap-8">
            <div class="lg:col-span-7">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($courses as $course)
                            <div class="w-full max-w-sm overflow-hidden bg-white rounded-lg border border-border group">
                                <div class="relative overflow-hidden">
                                    <a href="{{ route('course.Details',$course->slug) }}">
                                    <img class="object-cover object-center w-full h-56 group-hover:scale-125 transition-transform duration-1000"
                                        src="{{ asset($course->image) }}" alt="avatar" />
                                    </a>
                                </div>

                                <div class="xl:px-6 lg:px-2 px-3 md:px-4 py-4">
                                    <a href="{{ route('course.Details',$course->slug) }}">
                                        <h1 class="text-lg font-medium text-gray-800 group-hover:text-main">
                                            {{ $course->name }}
                                        </h1>
                                    </a>
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
                                        <button   data-course_id="{{ $course->id }}"
                                            class="addToCart flex items-center gap-3 px-3 py-2 hover:bg-[#79b530] hover:text-white border border-border rounded-md text-gray-700 text-sm duration-300 hover:border-[#79b530]">
                                            <i class="fa-solid fa-cart-shopping"></i> Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>

                    @endforeach
                </div>
            </div>
            <div class="lg:col-span-2">
                <div class="sticky top-[120px]">
                    <div class="bg-white px-4 pt-3 pb-4">
                        <div class="py-2 border-b border-border">
                            <h2 class="text-lg font-normal text-black">Category</h2>
                        </div>

                        <div class="pb-4">
                            <div class="flex items-center justify-between pt-3">
                                <p class="flex items-center gap-3">
                                    <input type="radio" id="personal" name="courseType"
                                        class="accent-main outline-none hover:text-main" />
                                    <label for="personal" class="capitalize text-base">Personal Development</label>
                                </p>
                                <span>16</span>
                            </div>

                            <div class="flex items-center justify-between pt-3">
                                <p class="flex items-center gap-3">
                                    <input type="radio" id="lifestyle" name="courseType"
                                        class="accent-main outline-none hover:text-main" />
                                    <label for="lifestyle" class="capitalize text-base">Lifestyle Course</label>
                                </p>
                                <span>9</span>
                            </div>

                            <div class="flex items-center justify-between pt-3">
                                <p class="flex items-center gap-3">
                                    <input type="radio" id="upgrade" name="courseType"
                                        class="accent-main outline-none hover:text-main" />
                                    <label for="upgrade" class="capitalize text-base">Upgrade Course</label>
                                </p>
                                <span>12</span>
                            </div>
                            <div class="flex items-center justify-between pt-3">
                                <p class="flex items-center gap-3">
                                    <input type="radio" id="network" name="courseType"
                                        class="accent-main outline-none hover:text-main" />
                                    <label for="network" class="capitalize text-base">
                                        Network & Security Course</label>
                                </p>
                                <span>7</span>
                            </div>
                            <div class="flex items-center justify-between pt-3">
                                <p class="flex items-center gap-3">
                                    <input type="radio" id="health" name="courseType"
                                        class="accent-main outline-none hover:text-main" />
                                    <label for="health" class="capitalize text-base">healh & fitness courses</label>
                                </p>
                                <span>21</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white mt-5 px-4 pt-3 pb-4">
                        <div class="py-2 border-b border-border">
                            <h2 class="text-lg font-normal text-black">
                                Search By Courses
                            </h2>
                        </div>

                        <div class="">
                            <div class="pt-3 flex">
                                <input type="text" name="" id=""
                                    class="outline-none border-border border px-3 py-1 w-full" />
                                <button class="py-1 px-3 bg-main text-white hover:bg-green-700 duration-500">
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white mt-5 px-4 pt-3 pb-4">
                        <div class="py-2 border-b border-border">
                            <h2 class="text-lg font-normal text-black">Rating</h2>
                        </div>

                        <div class="">
                            <div class="flex items-center justify-between pt-3">
                                <div class="flex items-center gap-3">
                                    <input type="radio" id="one" name="rating"
                                        class="accent-main outline-none hover:text-main block mt-2" />
                                    <label for="one" class="capitalize text-base text-[#ffa500]">
                                        <i class="fa-solid fa-star text-sm"></i>
                                        <i class="fa-solid fa-star text-sm text-[#ccc]"></i>
                                        <i class="fa-solid fa-star text-sm text-[#ccc]"></i>
                                        <i class="fa-solid fa-star text-sm text-[#ccc]"></i>
                                        <i class="fa-solid fa-star text-[#ccc]"></i>
                                    </label>
                                </div>
                                <span>2</span>
                            </div>

                            <div class="flex items-center justify-between pt-3">
                                <div class="flex items-center gap-3">
                                    <input type="radio" id="two" name="rating"
                                        class="accent-main outline-none hover:text-main block mt-2" />
                                    <label for="two" class="capitalize text-base text-[#ffa500]">
                                        <i class="fa-solid fa-star text-sm"></i>
                                        <i class="fa-solid fa-star text-sm"></i>
                                        <i class="fa-solid fa-star text-sm text-[#ccc]"></i>
                                        <i class="fa-solid fa-star text-sm text-[#ccc]"></i>
                                        <i class="fa-solid fa-star text-[#ccc]"></i>
                                    </label>
                                </div>
                                <span>7</span>
                            </div>

                            <div class="flex items-center justify-between pt-3">
                                <div class="flex items-center gap-3">
                                    <input type="radio" id="three" name="rating"
                                        class="accent-main outline-none hover:text-main block mt-2" />
                                    <label for="three" class="capitalize text-base text-[#ffa500]">
                                        <i class="fa-solid fa-star text-sm"></i>
                                        <i class="fa-solid fa-star text-sm"></i>
                                        <i class="fa-solid fa-star text-sm"></i>
                                        <i class="fa-solid fa-star text-sm text-[#ccc]"></i>
                                        <i class="fa-solid fa-star text-[#ccc]"></i>
                                    </label>
                                </div>
                                <span>15</span>
                            </div>

                            <div class="flex items-center justify-between pt-3">
                                <div class="flex items-center gap-3">
                                    <input type="radio" id="four" name="rating"
                                        class="accent-main outline-none hover:text-main block mt-2" />
                                    <label for="four" class="capitalize text-base text-[#ffa500]">
                                        <i class="fa-solid fa-star text-sm"></i>
                                        <i class="fa-solid fa-star text-sm"></i>
                                        <i class="fa-solid fa-star text-sm"></i>
                                        <i class="fa-solid fa-star text-sm"></i>
                                        <i class="fa-solid fa-star text-[#ccc]"></i>
                                    </label>
                                </div>
                                <span>8</span>
                            </div>

                            <div class="flex items-center justify-between pt-3">
                                <div class="flex items-center gap-3">
                                    <input type="radio" id="five" name="rating"
                                        class="accent-main outline-none hover:text-main block mt-2" />
                                    <label for="five" class="capitalize text-base text-[#ffa500]">
                                        <i class="fa-solid fa-star text-sm"></i>
                                        <i class="fa-solid fa-star text-sm"></i>
                                        <i class="fa-solid fa-star text-sm"></i>
                                        <i class="fa-solid fa-star text-sm"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </label>
                                </div>
                                <span>16</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news card section end here  -->
@endsection