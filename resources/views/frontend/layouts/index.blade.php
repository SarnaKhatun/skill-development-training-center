<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @php
        $fav_icon = get_setting('fav_icon')->value;
    @endphp
    <link rel="icon" type="image/x-icon" href="{{ asset($fav_icon) }}">

    @include('frontend.layouts.partial.style')


    <title>Educational Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('css')

</head>

<body>
    <!-- top header part start -->
    @include('frontend.layouts.partial.header')

    <!-- hero section start  -->
    @yield('frontend')

    <!-- footer section start  -->
    @include('frontend.layouts.partial.footer')
    <!-- footer section end -->

    <!-- login modal open and close start -->


    <!-- Button trigger modal -->

    <!-- Overlay -->
    <div id="login-overlay" class="login-overlay">
        <div class="overlay-content lg:w-2/4 xl:w-1/4 md:w-3/4 w-[90%]">
            <div class="flex items-center justify-between pt-2 pb-3 border-b border-border">
                <h2 class="text-xl text-black font-medium">Login</h2>
                <button id="closeOverlayBtn">
                    <i class="fa-solid fa-xmark text-xl text-black hover:text-gray-500"></i>
                </button>
            </div>
            <form action="{{ route('login.store') }}" method="post">
                @csrf
                <div class="pt-4">
                    <label for="email" class="block mb-2">Phone</label>
                    <input type="text" name="phone" id="phone" placeholder="phone number..."
                        class="w-full px-4 py-2 outline-none border font-open-sans font-normal border-border rounded-md  focus:border-main" />
                </div>
                <div class="pt-4">
                    <label for="password" class="block mb-2">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="w-full px-4 py-2 outline-none border border-border rounded-md font-normal font-open-sans focus:border-main" />
                </div>
                <div class="mt-4 pb-4 flex items-center justify-between">
                    <div>
                        <!--<a href="#" class="hover:underline hover:text-blue-700"><i class="fas fa-key"></i>-->
                        <!--    Forgot Password-->
                        <!--</a>-->
                    </div>
                    <button type="submit" class="px-7 py-2 bg-main text-white text-lg capitalize rounded-md font-medium">
                        submit
                    </button>
                </div>
            </form>
            <div class="pt-4 border-t border-border flex items-center gap-7 justify-end">
                <a href="{{ route('admin.login') }}"
                    class="text-sm font-open-sans font-semibold hover:text-blue-700 hover:underline"><i
                        class="fas fa-user mr-2"></i>Admin Login</a>
                <a href="{{ route('admin.login') }}"
                    class="text-sm font-open-sans font-semibold hover:text-blue-700 hover:underline"><i
                        class="fas fa-users mr-1"></i>Teacher Login</a>
            </div>
        </div>
    </div>
    <!-- login modal open and close end -->
    
     <div id="admission-overlay" class="admission-overlay fixed inset-0 bg-black bg-opacity-50 hidden transition-opacity duration-300 flex justify-center items-center z-50">
        <div class="overlay-content bg-white lg:w-2/4 xl:w-1/4 md:w-3/4 w-[90%] rounded-md p-4 transform scale-95 transition-transform duration-300">
            <div class="flex items-center justify-between pt-2 pb-3 border-b border-gray-300">
                <h2 class="text-xl text-black font-medium">Admission Request Form</h2>
                <button id="admissionCloseOverlayBtn">
                    <i class="fa-solid fa-xmark text-xl text-black hover:text-gray-500"></i>
                </button>
            </div>
            <p class="text-center pt-3">আমাদের কম্পিউটার প্রশিক্ষণ কেন্দ্রে আপনাকে স্বাগতম। এ ফরমটি পূরণের মাধ্যমে আপনার নিকস্থ শাখায় ভর্তি হয়ে প্রশিক্ষণ গ্রহণ করতে পারবেন। </p>
            <form action="{{ route('nearby.store') }}" method="post">
                @csrf
                <div class="pt-4">
                    <label for="name" class="block mb-2">Name</label>
                    <input type="text" name="name" required id="name" placeholder="enter name"
                           class="w-full px-4 py-2 outline-none border font-open-sans font-normal border-gray-300 rounded-md focus:border-main"/>
                </div>
                <div class="pt-4">
                    <input type="text"  name="phone" required oninput="this.value=this.value.replace(/[^0-9]/g,'')" placeholder="enter mobile number"
                           class="w-full px-4 py-2 outline-none border font-open-sans font-normal border-gray-300 rounded-md focus:border-main"/>
                </div>
                @php
                    $branches=[];
                    $districts=[];
                    $branches=App\Models\Branch::where('status',1)->latest()->get();
                    $districts=App\Models\District::where('status',1)->orderBy('name', 'asc')->latest()->get();
                @endphp
                <div class="pt-4">
                    <select name="branch_id" required id="" class="w-full px-4 py-2 outline-none border font-open-sans font-normal border-gray-300 rounded-md focus:border-main">
                        <option value="">Select Branch</option>
                        @foreach ($branches as $item)
                          <option value="{{ $item->id }}">{{ $item->institute_name_en }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="pt-4">
                    <select name="district_id" required id="district_request" class="w-full px-4 py-2 outline-none border font-open-sans font-normal border-gray-300 rounded-md focus:border-main">
                        <option value="">Select District</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="pt-4">
                    <select name="upazilla_id" required id="" class="w-full px-4 py-2 outline-none border font-open-sans font-normal border-gray-300 rounded-md focus:border-main">
                        <option value="">Select Upazila</option>
                    </select>
                </div>
                <div class="pt-4">
                    <input type="text" name="address" required placeholder="Address(street/village)"
                           class="w-full px-4 py-2 outline-none border font-open-sans font-normal border-gray-300 rounded-md focus:border-main"/>
                </div>
                <div class="pt-4">
                    <textarea name="message" required id="" cols="30" rows="3" class="w-full px-4 py-2 outline-none border font-open-sans font-normal border-gray-300 rounded-md focus:border-main"></textarea>
                </div>
                <div class="mt-4 pb-4 flex items-center justify-between">
                    <button type="submit" class="px-7 py-2 bg-main text-white text-lg capitalize rounded-md font-medium">Submit</button>
                </div>
            </form>
        </div>
    </div>

  <!--result overlay -->
    <div id="result-overlay"
        class="result-overlay fixed inset-0 bg-black bg-opacity-50 hidden transition-opacity duration-300 flex justify-center items-center z-50">
        <div
            class="result-content bg-white lg:w-2/4 xl:w-1/4 md:w-3/4 w-[90%] rounded-md p-4 transform scale-95 transition-transform duration-300">
            <div class="flex items-center justify-between pt-2 pb-3 border-b border-border">
                <h2 class="text-xl text-black font-medium">Result Download</h2>
                <button id="resultOverlayBtn">
                    <i class="fa-solid fa-xmark text-xl text-black hover:text-gray-500"></i>
                </button>
            </div>
            <form action="{{ route('result.download') }}" method="get">
                @csrf
                <div class="pt-4">
                    <label for="email" class="block mb-2">Roll</label>
                    <input type="text" name="student_roll" id="phone" placeholder="Email Address..."
                        class="w-full px-4 py-2 outline-none border font-open-sans font-normal border-border rounded-md focus:border-main" />
                </div>
                <div class="mt-4 pb-4 flex items-center justify-between">
                    <button type="submit"
                        class="px-7 py-2 bg-main text-white text-lg capitalize rounded-md font-medium">Download</button>
                </div>
            </form>
        </div>
    </div>
     <!--result overlay end -->
    
    <!-- scroll up button start  -->
    <button id="scrollToTopBtn" class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- scroll up button end -->


    <!-- arrow button class  -->
    <!-- <div class="container">
      <a href="" class="arrow-btn"
        >read more
        <span></span>
      </a>
    </div> -->

    <!-- slick slider js link  -->
    @include('frontend.layouts.partial.script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}", 'Success!', {
                timeout: 120000
            });
        </script>
    @elseif(Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                @foreach ($errors->all() as $error)
                    toastr.options = {
                        'progressBar': true,
                        'closeButton': true,
                        'positionClass': 'toast-bottom-right',
                    }
                    toastr.error('{{ $error }}');
                @endforeach
            });
        </script>
    @endif
    @stack('js')
    <script>
        $(document).ready(function() {
            cartCount();
        });

        function cartCount() {
            $.ajax({
                url: "{{ route('cartCount') }}",
                method: "get",
                success: function(response) {
                    console.log(response.cartCount);
                    $('.cartCount').text(response.cartCount);
                }
            })
        }
        cartCount();
    </script>
    <script>
        $(document).on('click', '.addToCart', function() {
            //alert('liza');
            var course_id = $(this).attr('data-course_id');
            var data = {
                course_id: course_id
            }
            $.ajax({
                url: "{{ route('addToCart') }}",
                method: "get",
                data: data,
                success: function(response) {
                    if (response.success) {
                        cartCount();
                        toastr.success(response.success);
                    } else if (response.error) {
                        toastr.error(response.error);
                    } else {

                    }
                }
            })
        });
    </script>
    
    
    <script>
         $('#district_request').on('change', function() {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: "{{ url('get-upazilla/ajax') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="upazilla_id"]').html(
                                '<option value="" >Select  Upazilla</option>'
                            );
                            $.each(data, function(key, value) {
                                $('select[name="upazilla_id"]').append(
                                    '<option value="' + value.id + '">' +
                                    value.name +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="upazilla_id"]').html(
                                '<option value="" >Select  Upazilla</option>'
                            );
                }
            });
    </script>
</body>

</html>