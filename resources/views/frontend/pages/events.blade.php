@extends('frontend.layouts.index')
@section('frontend')
  <!-- event banner part start  -->
  <section
  class="bg-[url('frontend/img/about/breadcrumb_bg02.jpg')] bg-cover md:h-[250px] h-[200px] bg-center bg-no-repeat relative">
  <!-- Black overlay -->
  <div class="absolute inset-0 bg-[#000] opacity-50 z-10"></div>
  <div
      class="flex flex-col gap-10 items-center justify-center w-full h-full z-50 relative">
      <h2
          class="text-white uppercase text-3xl lg:text-5xl font-semibold">
         আমাদের আসন্ন ইভেন্ট
      </h2>
      <!-- breadcrumbs -->
      <ul class="flex text-white">
          <li>
              <a href="#"
                  class="text-white text-[20px] font-normal pl-6 pr-6">Home</a>
          </li>
          <li
              class="text-white text-[20px] font-normal pl-6 pr-6 relative breadcrumb-list active">
              Event
          </li>
      </ul>
  </div>
</section>
<!-- event banner part end  -->

<!-- event card section start here  -->

<div class="container">

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 py-10">

     @foreach($events as $key => $event)
        <a href="{{ route('event.Details',$event->slug) }}">
            <div
                class="md:flex max-w-full overflow-hidden bg-white rounded ">
                <!-- <div class="w-2/3 bg-cover" style="background-image: url('./img/about/about.jpg')"></div> -->
                <div class="md:w-2/3 w-full h-[200px] md:h-auto">
                    <img src="{{ $event->image }}" alt
                        class="w-full h-full object-cover">
                </div>

                <div class="md:w-2/3 w-full  mt-5 md:mt-0 px-4 md:p-4">
                    <h1
                        class="text-xl font-medium text-gray-800 hover:text-main">{{ $event->title }}</h1>
                    <p
                        class="mt-2 text-sm text-gray-600 font-open-sans text-ellipsis overflow-hidden">{{ $event->short_description }}</p>

                    <div class="mt-5">
                        <p
                            class="flex items-center gap-x-3 mb-3 text-gray-800"><span><i
                                    class="fa-solid fa-calendar-days text-main text-xl"></i></span>
                                    {{ $event->date }}</p>
                        <p
                            class="flex items-center gap-x-3 text-gray-800"><span><i
                                    class="fa-solid fa-location-dot text-main text-xl"></i></span>
                                    {{ $event->location }}</p>
                    </div>

                </div>
            </div>
        </a>
     @endforeach

  </div>
</div>
<!-- event card section end here  -->
@endsection