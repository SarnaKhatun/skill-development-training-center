 <!-- footer section start  -->
 <footer class="bg-[#242424] lg:py-[70px] md:py-10 py-8">
    <div class="container">
        <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-1 gap-6">
            <!-- 1st column -->
            <div>
                <div class="mb-6">
                    <h2 class="text-white text-xl font-medium">About Us</h2>
                </div>
                <div class="font-trio-bangla text-white">
                    <p class="text-sm">
                        গণপ্রজাতন্ত্রী বাংলাদেশ সরকার কর্তৃক অনুমোদিত
                    </p>
                    <h5 class="text-lg mt-3">যুব উন্নয়ন</h5>
                    <h3 class="text-lg">কম্পিউটার ও শর্টহ্যান্ড প্রশিক্ষণ কেন্দ্র</h3>

                    <!-- social icons -->
                    <ul class="flex items-center social-icons gap-3 justify-start mt-4">
                        @php
                            $fb_url=get_setting('facebook_link')->value ?? 'Null';
                            $tube_url=get_setting('youtube_link')->value ?? 'Null';
                            $insta_url=get_setting('instagram')->value ?? 'Null';
                        @endphp
                        <li>
                            <a href="{{ url($fb_url) }}"><i class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        {{-- <li>
                            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                        </li> --}}
                        <li>
                            <a href="{{ url($tube_url) }}"><i class="fa-brands fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="{{ url($insta_url) }}"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 2nd column  -->
            <div>
                <div class="mb-6">
                    <h2 class="text-white text-xl font-medium">Quick Links</h2>
                </div>
                <div>
                    <ul class="quick-links">
                        <li>
                            <a href="{{ url('/') }}"> home </a>
                        </li>
                        <li>
                            <a href="{{ route('aboutPage') }}"> About Us </a>
                        </li>
                        <li>
                            <a href="{{ route('gallaryPage') }}"> Gallery </a>
                        </li>
                        <li>
                            <a href="#"> Portfoilo </a>
                        </li>
                        <li>
                            <a href="{{ route('eventPage') }}"> Event </a>
                        </li>
                        <li>
                            <a href="{{ route('contactPage') }}"> Contact Us </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 3rd column  -->
            <div>
                <div class="mb-6">
                    <h2 class="text-white text-xl font-medium">Popular Courses</h2>
                </div>

                <div class="footer-courses">
                    <ul>
                        @php
                            $courses=App\Models\Course::OrderBy('priority','asc')->take(3)->get();
                        @endphp
                        @foreach ($courses as $course)
                            <li>
                                <div class="f-courses-thumb">
                                    <a href="{{ route('course.Details',$course->slug) }}"><img src="{{ asset($course->image) }}" width="60" alt="" /></a>
                                </div>
                                <div class="f-courses-content">
                                    <h5>
                                        <a href="{{ route('course.Details',$course->slug) }}">{{ $course->name }}</a>
                                    </h5>
                                    {{-- <span>Tonoy Pueyo</span> --}}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- 4th column  -->
            <div>
                <div class="mb-6">
                    <h2 class="text-white text-xl font-medium">Latest Event</h2>
                </div>
                <div class="fw-tweet-post">
                    <ul>
                        @php
                            $events=App\Models\Event::OrderBy('id','asc')->take(3)->get();
                        @endphp
                        @foreach ($events as $event)
                            <li>
                                <i class="fa-solid fa-calendar-days"></i>
                                <div class="fw-tweet-post-content">
                                    <a href="{{ route('event.Details',$event->slug) }}"><p>{{ $event->title }}</p></a>
                                    <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d',  $event->date)->format('d F, Y') }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyright-area bg-[#1b1b1b] py-7 text-white">
    <div class="flex justify-center">
        <div class="copyright-text">
            <p>Developed By <a href="https://classicit.com.bd/" style="text-decoration: underline">CLASIC IT</a>.</p>
        </div>
    </div>
</div>
<!-- footer section end -->