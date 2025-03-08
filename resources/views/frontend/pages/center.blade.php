@extends('frontend.layouts.index')
@section('frontend')
    <style>
        .text-danger {
            color: red;
            font-size: 12px;
        }
    </style>
    <section>
        <!-- event banner part start  -->
        <section
            class="bg-[url('frontend/img/about/breadcrumb_bg02.jpg')] bg-cover md:h-[250px] h-[200px] bg-center bg-no-repeat relative">
            <!-- Black overlay -->
            <div class="absolute inset-0 bg-[#000] opacity-50 z-10"></div>
            <div class="flex flex-col gap-10 items-center justify-center w-full h-full z-50 relative">
                <h2 class="text-white uppercase text-3xl lg:text-5xl font-semibold">
                   সেন্টার ফর্ম
                </h2>
                <!-- breadcrumbs -->
                <ul class="flex text-white">
                    <li>
                        <a href="#" class="text-white text-[20px] font-normal pl-6 pr-6">Home</a>
                    </li>
                    <li class="text-white text-[20px] font-normal pl-6 pr-6 relative breadcrumb-list active">
                        Form
                    </li>
                </ul>
            </div>
        </section>
        <!-- event banner part end  -->

        <!-- form section start-->
        {{--  <div class="container">
            <div class="my-10 flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg lg:max-w-7xl">
                <div class="w-full px-6 py-8 md:px-8">
                    <h2 class="text-2xl font-semibold font-trio-bangla text-main">
                        আপনার প্রোফাইল তৈরি করুন
                    </h2>

                    <div class="mt-4">
                        <label class="block mb-2 text-base font-semibold text-black" for="LoggingEmailAddress">নাম</label>
                        <input placeholder="Name" id="LoggingEmailAddress"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:outline-main"
                            type="email" />
                    </div>

                    <div class="mt-4">
                        <label class="block mb-2 text-base font-semibold text-black" for="email">ইমেইল</label>

                        <input id="email" placeholder="Email"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:outline-main"
                            type="email" />
                    </div>
                    <div class="mt-4">
                        <label class="block mb-2 text-base font-semibold text-black" for="phone">ফোন নাম্বার</label>

                        <input id="phone" placeholder="Phone Number"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:outline-main"
                            type="number" />
                    </div>
                    <div class="mt-4">
                        <label class="block mb-2 text-base font-semibold text-black" for="loggingPassword">পাসওয়ার্ড</label>

                        <input id="loggingPassword" placeholder="password"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:outline-main"
                            type="password" />
                    </div>

                    <div class="mt-6">
                        <button
                            class="w-full md:w-fit inline-block px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-main rounded-lg hover:bg-primary hover:text-white focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                            সাবমিট করুন
                        </button>
                    </div>
                </div>
                <div class="w-full px-6 py-8 md:px-8">
                    <h2 class="text-2xl font-semibold font-trio-bangla text-main">
                        আপনার প্রোফাইল তৈরি করুন
                    </h2>

                    <div class="mt-4">
                        <label class="block mb-2 text-base font-semibold text-black" for="LoggingEmailAddress">নাম</label>
                        <input placeholder="Name" id="LoggingEmailAddress"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:outline-main"
                            type="email" />
                    </div>

                    <div class="mt-4">
                        <label class="block mb-2 text-base font-semibold text-black" for="email">ইমেইল</label>

                        <input id="email" placeholder="Email"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:outline-main"
                            type="email" />
                    </div>
                    <div class="mt-4">
                        <label class="block mb-2 text-base font-semibold text-black" for="phone">ফোন নাম্বার</label>

                        <input id="phone" placeholder="Phone Number"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:outline-main"
                            type="number" />
                    </div>
                    <div class="mt-4">
                        <label class="block mb-2 text-base font-semibold text-black" for="loggingPassword">পাসওয়ার্ড</label>

                        <input id="loggingPassword" placeholder="password"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:outline-main"
                            type="password" />
                    </div>

                    <div class="mt-6">
                        <button
                            class="w-full md:w-fit inline-block px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-main rounded-lg hover:bg-primary hover:text-white focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                            সাবমিট করুন
                        </button>
                    </div>
                </div>
            </div>
        </div>  --}}

        <section class="my-8">
            <form action="{{ route('center.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container p-8 md:flex sm:space-y-5 md:space-x-5">
                    <div class="w-full md:w-1/2  p-0 shadow-none sm:shadow p-3 shadow-blue-300 rounded-md">
                        <h2 class="text-2xl font-semibold font-trio-bangla text-main">
                            Personal Information
                        </h2>

                        <div class="block sm:flex md:block lg:flex">
                            <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                <input placeholder="Name *" id="name" required name="name"
                                    value="{{ old('name') }}"
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                    type="text" />
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                <input placeholder="Father Name *" id="f_name" required name="fathers_name"
                                    value="{{ old('fathers_name') }}"
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                    type="text" />
                                <span class="text-danger">
                                    @error('fathers_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="block sm:flex md:block lg:flex">
                            <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                <input placeholder="Email *" id="email" required name="email"
                                    value="{{ old('email') }}"
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                    type="email" />
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                <input placeholder="Mother Name *" id="m_name" required name="mothers_name"
                                    value="{{ old('mothers_name') }}"
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                    type="text" />
                                <span class="text-danger">
                                    @error('mothers_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="block sm:flex md:block lg:flex">
                            <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                <input placeholder="Phone *" id="phone" required name="phone"
                                    value="{{ old('phone') }}"
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                    type="text" />
                                <span class="text-danger">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                <input placeholder="Nationality" id="nationality" required name="nationality"
                                    value="{{ old('nationality') }}"
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                    type="text" />
                                <span class="text-danger">
                                    @error('nationality')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="block sm:flex md:block lg:flex">
                            <div class="w-full p-2 flex items-center gap-4">
                                <div class="flex items-center space-x-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="gender" value="male"
                                            class="form-radio h-5 w-5 text-blue-600 checked:bg-blue-500" />
                                        <span class="ml-2 text-gray-700">Male</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="gender" value="female"
                                            class="form-radio h-5 w-5 text-blue-600 checked:bg-blue-500" />
                                        <span class="ml-2 text-gray-700">Female</span>
                                    </label>
                                </div>
                                <span class="text-danger">
                                    @error('gender')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                <input placeholder="Religion" id="religion" required name="religion"
                                    value="{{ old('religion') }}"
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                    type="text" />
                                <span class="text-danger">
                                    @error('religion')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="block sm:flex md:block lg:flex">
                            <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                <select name="division_id" id="division_id" required
                                    class="form-control w-full block border rounded-md p-1 py-1.5 focus:outline-main">
                                    <option value="">Select Division</option>
                                    @foreach (get_divisions() as $division)
                                        <option value="{{ $division->id }}">
                                            {{ $division->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('division_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                <select name="district_id" id="district_id" required
                                    class="form-control w-full block border rounded-md p-1 py-1.5 focus:outline-main">
                                    <option value="">Select District</option>
                                </select>
                                <span class="text-danger">
                                    @error('district_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="block sm:flex md:block lg:flex">
                            <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                <select name="upazilla_id" id="upazilla_id" required
                                    class="form-control w-full block border rounded-md p-1 py-1.5 focus:outline-main">
                                    <option value="">Select Upazilla</option>
                                </select>
                                <span class="text-danger">
                                    @error('upazilla_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                <input placeholder="Post Office" id="post_office" required name="post_office"
                                    value="{{ old('post_office') }}"
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                    type="text" />
                                <span class="text-danger">
                                    @error('post_office')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="block sm:flex md:block lg:flex">
                            <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                <textarea id="address" placeholder="address" required name="address" value="{{ old('address') }}"
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main" rows="2"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2">
                        <div class="p-0 shadow-none sm:shadow p-3 shadow-blue-300 rounded-md">
                            <h2 class="text-2xl font-semibold font-trio-bangla text-main">
                                Institute Information
                            </h2>
                            <div class="block sm:flex md:block lg:flex">
                                <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                    <input placeholder="Institute Name (En)*" id="ins_name" required
                                        name="institute_name_en" value="{{ old('institute_name_en') }}"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                        type="text" />
                                    <span class="text-danger">
                                        @error('institute_name_en')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                    <input placeholder="Institute Name (Bn)*" id="ins_name_bn" required
                                        name="institute_name_bn" value="{{ old('institute_name_bn') }}"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                        type="text" />
                                    <span class="text-danger">
                                        @error('institute_name_bn')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="block sm:flex md:block lg:flex">
                                <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                    <input placeholder="Institute Age*" id="ins_name_age" required name="institute_age"
                                        value="{{ old('institute_age') }}"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                        type="number" />
                                </div>
                                <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                    <select name="institute_division" id="institute_division" required
                                        class="form-control w-full block border rounded-md p-1 py-1.5 focus:outline-main">
                                        <option value="">Institute Division</option>
                                        @foreach (get_divisions() as $division)
                                            <option value="{{ $division->id }}">
                                                {{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('institute_division')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="block sm:flex md:block lg:flex">
                                <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                    <select name="institute_district" id="institute_district" required
                                        class="form-control w-full block border rounded-md p-1 py-1.5 focus:outline-main">
                                        <option value="">Institute District</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('institute_district')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                    <select name="institute_upazilla" id="institute_upazilla" required
                                        class="form-control w-full block border rounded-md p-1 py-1.5 focus:outline-main">
                                        <option value="">Institute Upazilla</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('institute_upazilla')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="block sm:flex md:block lg:flex">
                                <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                    <input placeholder="Institute Post Code" id="post_code" required
                                        name="institute_post_code" value="{{ old('institute_post_code') }}"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                        type="text" />
                                    <span class="text-danger">
                                        @error('institute_post_code')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                    <input placeholder="Institute Address" id="ins_address" required
                                        name="institute_address" value="{{ old('institute_address') }}"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                        type="text" />
                                    <span class="text-danger">
                                        @error('institute_address')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="block sm:flex md:block lg:flex">
                                <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                    <input placeholder="Facebook Link" id="facebook_link" name="facebook_link"
                                        value="{{ old('facebook_link') }}"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                        type="text" />
                                    <span class="text-danger">
                                        @error('facebook_link')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                                    <input placeholder="Youtube Link" id="youtube_list" name="youtube_link"
                                        value="{{ old('youtube_link') }}"
                                        class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                        type="text" />
                                    <span class="text-danger">
                                        @error('youtube_link')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="p-0 shadow-none sm:shadow p-3 shadow-blue-300 rounded-md mt-4">
                            <div class="w-full">
                                <input placeholder="Registration Code" required id="registration_code" name="registration_code"
                                    value="{{ old('registration_code') }}"
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:outline-main"
                                    type="text" />
                                <span class="text-danger">
                                    @error('registration_code')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                    <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                        <img id="showprofile" class="w-full" src="{{ asset('backend/images/no-image.png') }}"
                            alt="profile" class="bg-primary" width="100">
                        <label for="profile"
                            class="p-2 bg-gray-500 leading-none text-center text-white block">Profile</label>
                        <input id="profile" name="image" required
                            class="block w-full p-1 text-gray-700 bg-white border rounded-md focus:outline-main"
                            type="file" />
                        <span class="text-danger">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                        <img id="shownid" class="w-full" src="{{ asset('backend/images/no-image.png') }}"
                            alt="nid" class="bg-primary" width="100">
                        <label for="nid"
                            class="p-2 bg-gray-500 leading-none text-center text-white block">NID</label>
                        <input id="nid" name="nid_card_img" required
                            class="block w-full p-1 text-gray-700 bg-white border rounded-md focus:outline-main"
                            type="file" />
                        <span class="text-danger">
                            @error('nid_card_img')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                        <img id="showtrade" class="w-full" src="{{ asset('backend/images/no-image.png') }}"
                            alt="trade" class="bg-primary" width="100">
                        <label for="trade" class="p-2 bg-gray-500 leading-none text-center text-white block">Trade
                            License</label>
                        <input id="trade" name="trade_licence_img" required
                            class="block w-full p-1 text-gray-700 bg-white border rounded-md focus:outline-main"
                            type="file" />
                        <span class="text-danger">
                            @error('trade_licence_img')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="w-full p-0 mb-2 sm:p-2 md:mb-0">
                        <img id="showsignature" class="w-full" src="{{ asset('backend/images/no-image.png') }}"
                            alt="signature" class="bg-primary" width="100">
                        <label for="signature"
                            class="p-2 bg-gray-500 leading-none text-center text-white block">Signature</label>
                        <input id="signature" name="signature_img" required
                            class="block w-full p-1 text-gray-700 bg-white border rounded-md focus:outline-main"
                            type="file" />
                        <span class="text-danger">
                            @error('signature_img')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="container">
                    <div class="mt-4 text-center">
                        <button type="submit"
                            class="w-full md:w-fit inline-block px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-main rounded-lg hover:bg-primary hover:text-white focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                            সাবমিট করুন
                        </button>
                    </div>
                </div>
            </form>
        </section>

        <!-- form section end-->
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //profile
            $('#profile').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showprofile').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]); // Change ['0'] to [0]
            });
            //nid
            $('#nid').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#shownid').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]); // Change ['0'] to [0]
            });
            //trade
            $('#trade').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showtrade').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]); // Change ['0'] to [0]
            });
            //signature
            $('#signature').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showsignature').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]); // Change ['0'] to [0]
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#division_id').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('get-district/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="district_id"]').html(
                                '<option value="" >Select District</option>'
                            );
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' +
                                    value.name +
                                    '</option>');
                            });
                            $('select[name="upazilla_id"]').html(
                                '<option value=""  disabled>Select Upazilla</option>'
                            );
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $('#district_id').on('change', function() {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: "{{ url('get-upazilla/ajax') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="upazilla_id"]').html(
                                '<option value="" >Select upazilla</option>'
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
                    alert('danger');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#institute_division').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('get-district/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="institute_district"]').html(
                                '<option value="" >Select Institute District</option>'
                            );
                            $.each(data, function(key, value) {
                                $('select[name="institute_district"]').append(
                                    '<option value="' + value.id + '">' +
                                    value.name +
                                    '</option>');
                            });
                            $('select[name="institute_upazilla"]').html(
                                '<option value=""  disabled>Select Institute Upazilla</option>'
                            );
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $('#institute_district').on('change', function() {
                var district_id = $(this).val();
               // console.log(district_id);
                if (district_id) {
                    $.ajax({
                        url: "{{ url('get-upazilla/ajax') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="institute_upazilla"]').html(
                                '<option value="" >Select Institute upazilla</option>'
                            );
                            $.each(data, function(key, value) {
                                $('select[name="institute_upazilla"]').append(
                                    '<option value="' + value.id + '">' +
                                    value.name +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection