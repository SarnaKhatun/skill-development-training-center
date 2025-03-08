@extends('frontend.layouts.index')
@section('frontend')
    <div class="bg-white">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3"
                style="
            background-image:url('/frontend/img/loginpage.jpg');
          ">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div>
                        <h2 class="text-2xl font-bold text-white sm:text-3xl">
                            What's the new SDTL
                        </h2>

                        <p class="max-w-xl mt-3 text-gray-300">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. In
                            autem ipsa, nulla laboriosam dolores, repellendus perferendis
                            libero suscipit nam temporibus molestiae
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <div class="flex justify-center mx-auto">
                            <a href="index.html">
                                <img class="lg:w-[250px] w-[180px]" src="{{ asset(get_setting('footer_logo')->value) }}"
                                    alt="" /></a>
                        </div>

                        <p class="mt-8 font-semibold text-xl text-black">Admin/Teacher Login</p>
                    </div>

                    <div class="mt-3">
                        <form action="{{ route('admin.check.login') }}" method="post">
                            @csrf
                            <div>
                                <label for="email" class="block mb-2 text-sm text-gray-600">Email Address</label>
                                <input type="email" name="email" required id="email"
                                    placeholder="example@example.com"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:outline-main" />
                            </div>

                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600">Password</label>
                                    {{-- <a href="#"
                                        class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline">Forgot
                                        password?</a> --}}
                                </div>

                                <input type="password" name="password" required id="password" placeholder="Your Password"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:outline-main" />
                            </div>

                            <div class="mt-6">
                                <button type="submit"
                                    class="w-full px-4 py-2 tracking-wide bg-[#0084b4] text-white transition-colors duration-300  rounded-lg hover:bg-[#0084b4] focus:outline-none focus:bg-green-600">
                                    Log In
                                </button>
                            </div>
                        </form>

                        <!-- role select tab  -->
                        {{-- <div
                            class="w-full capitalize cursor-pointer text-white grid grid-cols-1 mt-4 text-center rounded-md admin-login">
                            <div class="py-[10px] text-sm bg-[#0084b4] rounded-s-md tab-button"
                                onclick="openTab('admin')" id="admin">
                                <p class="flex items-center xl:gap-3 lg:gap-2 gap-3 justify-center">
                                    <i class="fa-solid fa-user"></i> Admin
                                </p>
                            </div>
                            <div class="py-[10px] text-sm bg-pink-600 tab-button" onclick="openTab('superAdmin')"
                                id="superAdmin">
                                <p class="flex items-center xl:gap-3 lg:gap-2 gap-3 justify-center">
                                    <i class="fa-solid fa-user"></i> Super Admin
                                </p>
                            </div>
                            <div class="py-[10px] text-sm bg-[#1bbed3] rounded-e-md tab-button"
                                onclick="openTab('teacher')" id="teacher">
                                <p class="flex items-center xl:gap-3 lg:gap-2 gap-3 justify-center">
                                    <i class="fa-solid fa-user"></i> Teacher
                                </p>
                            </div>
                        </div> --}}

                        <p class="mt-6 text-sm flex items-center gap-6 justify-end text-gray-400">
                            <a href="{{ route('home') }}"
                                class="flex items-center gap-2 hover:underline text-black text-[14px]">
                                <i class="fa-brands fa-empire"></i>
                                Web Site
                            </a>

                            {{-- <a href="user-login.html"
                                class="flex items-center gap-2 hover:underline text-black text-[14px]">
                                <i class="fas fa-user"></i>
                                User Login
                            </a> --}}

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection