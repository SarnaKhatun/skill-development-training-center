@extends('frontend.layouts.index')
@section('frontend')
 <!-- event details part start here  -->
 <section class="container pt-5 lg:pt-10 lg:pb-20 pb-10">
    <div class="grid lg:grid-cols-10 gap-8">
      <div class="lg:col-span-6 ">
        <div class="event-wrapper">
          <div class="lg:h-[500px] md:h-[400px] h-[300px]">
            <img src="{{ asset($event->image) }}" alt=""
              class="w-full h-full object-cover rounded-md">
          </div>

          <div class="event-content mt-7">
            <h2 class="text-3xl  font-medium text-main">{{ $event->title }}</h2>
            <div
              class="flex items-center gap-5 pt-4 pb-5 border-b border-border">
              <div class="flex items-center gap-2 text-gray-500">
                <i class="fa-solid fa-calendar-days"></i>
                <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d',  $event->date)->format('d F, Y') }}
                </span>
              </div>
              <div class="flex items-center gap-2 text-gray-500">
                <i class="fa-regular fa-clock"></i>
                <span>{{ \Carbon\Carbon::parse($event->date)->format('h:i: A')}}</span>
              </div>
            </div>

            <p class="font-open-sans py-4">{!! $event->description !!}</p>
          </div>
        </div>
      </div>
      <div class="lg:col-span-4 px-5 py-8 bg-neutral-100">
        <h2 class="text-2xl font-medium text-gray-900">Recent Posts</h2>

        <div class="mt-7">
            @foreach ($events as $event)
            <div class="flex  gap-4 mt-6">
                <div class="min-w-[130px] w-1/3 ">
                  <img src="{{ asset($event->image) }}" alt
                    class="w-full h-full object-cover rounded-md">
                </div>
                <div class=" ">
                  <p class="font-open-sans font-semibold">{{ $event->title }}</p>
                  <div class="flex items-center gap-2 text-gray-500 mt-4">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d',  $event->date)->format('d F, Y') }}</span>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </div>
  </section>
  <!-- event details part end here  -->
@endsection
