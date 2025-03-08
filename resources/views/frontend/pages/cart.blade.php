@extends('frontend.layouts.index')
@section('frontend')
    <!-- cart banner part start  -->
    <section
      class="course-bg lg:h-[325px] md:h-[250px] h-[200px] flex items-center justify-center">
      <div
        class="flex flex-col gap-10 items-center justify-center w-full h-full z-50 relative">
        <h2
          class="text-white text-center text-3xl lg:text-6xl font-semibold uppercase">LEARN
          MORE course details</h2>
        <!-- breadcrumbs -->
        <ul class="flex text-white">
          <li><a href="#"
              class="text-white text-[20px] font-normal pl-6 pr-6 ">Home</a></li>
          <li
            class="text-white text-[20px] font-normal pl-6 pr-6 relative breadcrumb-list active">Cart</li>
        </ul>
      </div>
    </section>
    <!-- cart banner part end -->

    <!-- cart section start  -->
    <section class="py-10 container">
      <div class="grid lg:grid-cols-8 gap-8">
        <div class="lg:col-span-6 overflow-hidden">
          <!-- cart table part start  -->
          <div class="flex flex-col">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div
                class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div
                  class="overflow-hidden border border-gray-200 md:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th
                          scope="col"
                          class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500">
                          Image
                        </th>

                        <th
                          scope="col"
                          class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                          Product
                        </th>

                        <th
                          scope="col"
                          class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                          Price
                        </th>

                        <!-- <th
                          scope="col"
                          class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500"
                        >
                          Quantity
                        </th> -->

                        {{-- <th
                          scope="col"
                          class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                          Total
                        </th> --}}

                        <th
                          scope="col"
                          class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                          Remove
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if($carts->count() >0 )
                            @foreach ($carts as $cart)
                            <tr>
                                <td
                                class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                <div class="w-[100px]">
                                    <img
                                    src="{{ asset($cart->course->image) }}"
                                    alt
                                    class="w-full h-full object-cover" />
                                </div>
                                </td>

                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <div>
                                    <h4
                                    class="text-black duration-300 hover:text-main cursor-pointer">
                                    {{ $cart->course->name }}
                                    </h4>
                                </div>
                                </td>

                                <td
                                class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                <h2>{{  $cart->course->discount_fee ??  $cart->course->course_fee }} tk</h2>
                                </td>
                                <!-- Quantity part here  -->
                                <!-- <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <div
                                    class="flex items-center gap-3 border border-border py-4 justify-center rounded-md px-2"
                                >
                                    <button class="hover:text-main font-semibold">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                    <div class="w-[40px] h-[20px] text-center">4</div>
                                    <button class="hover:text-main font-semibold">
                                    <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                </td> -->
                                {{-- <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <h2 class="text-lg text-main">$1200.00</h2>
                                </td> --}}

                                <td
                                class="px-4 py-4 text-sm whitespace-nowrap text-center cursor-pointer">
                                <a href="{{ route('cart.item.remove',$cart->course->slug) }}"><h2><i class="fas fa-xmark text-xl"></i></h2></a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center p-2" style="font-size: 20px;color:red">empty</td>
                            </tr>
                        @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- cart table part end -->
        </div>
        <div class="lg:col-span-2">
          <div class="py-3 bg-white border border-[#f9f9f9] shadow-md">

            <div class="py-2 border-b border-border">
              <div class="flex items-center justify-between py-2 px-4">
                <p><b>{{ $carts->count() ?? 0 }}</b> Items</p>
                <p>{{ $totalAmount }}</p>
              </div>
              {{-- <div class="flex items-center justify-between pt-2 pb-4 px-4">
                <p>Shipping</p>
                <p>$7.00</p>
              </div> --}}
            </div>

            <div class="py-2 border-b border-border">
              <div class="flex items-center justify-between py-2 px-4">
                <p>Total</p>
                <p>{{ $totalAmount }}</p>
              </div>
              {{-- <div class="flex items-center justify-between pt-2 pb-4 px-4">
                <p>Taxes</p>
                <p>$0.00</p>
              </div> --}}
            </div>

            <div class="py-3 flex justify-center">
              <button
                class="px-8 rounded-sm hover:bg-primary duration-300 ease-in py-2 bg-main text-white text-base font-medium ">Checkout</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- cart section end -->
@endsection
