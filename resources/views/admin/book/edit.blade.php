@extends('admin.master')
@section('title')
Dashboard
@endsection
@section('content') 
 <!-- Create Post -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <div class="flex flex-row">
        <div class="bg-no-repeat bg-red-200 border border-red-300 rounded-xl w-full mr-2 p-6" style="background-image: url(https://previews.dropbox.com/p/thumb/AAvyFru8elv-S19NMGkQcztLLpDd6Y6VVVMqKhwISfNEpqV59iR5sJaPD4VTrz8ExV7WU9ryYPIUW8Gk2JmEm03OLBE2zAeQ3i7sjFx80O-7skVlsmlm0qRT0n7z9t07jU_E9KafA9l4rz68MsaZPazbDKBdcvEEEQPPc3TmZDsIhes1U-Z0YsH0uc2RSqEb0b83A1GNRo86e-8TbEoNqyX0gxBG-14Tawn0sZWLo5Iv96X-x10kVauME-Mc9HGS5G4h_26P2oHhiZ3SEgj6jW0KlEnsh2H_yTego0grbhdcN1Yjd_rLpyHUt5XhXHJwoqyJ_ylwvZD9-dRLgi_fM_7j/p.png?fv_content=true&size_mode=5); background-position: 90% center;">
          <!-- <p class="text-5xl text-indigo-900">Welcome <br><strong>Lorem Ipsum</strong></p> -->
          <span class="bg-red-300 text-xl text-white inline-block rounded-full px-8 py-2"><strong>01:51</strong></span>
    <!-- <div> -->
      <!-- <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0"> -->
        <!-- <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl"> -->
          <div class="mb-4">
            <h1 class="font-serif text-3xl font-bold underline decoration-gray-400">
              Create Post
            </h1>
          </div>

          @if (\Session::has('error'))
              <div class="alert alert-error">
                  <ul>
                      <li>{!! \Session::get('error') !!}</li>
                  </ul>
              </div>
          @endif
          <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
            <form method="POST" action="{{ route('admin.book.update', $book->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              
              <!-- Header -->
              <div>
                <label class="block text-sm font-bold text-gray-700" for="title">
                  name
                </label>

                <input
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="name" placeholder="180" value="{{$book->name}}" />
              </div>

              <!-- Body -->
              <div class="mt-4">
                <label class="block text-sm font-bold text-gray-700" for="password">
                  detail
                </label>
                <input name="detail"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  rows="4" placeholder="400" value="{{$book->detail}}" ></input>
              </div>

              <!-- Footer -->
              <div>
                <label class="block text-sm font-bold text-gray-700" for="title">
                  price
                </label>

                <input
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="price" placeholder="180" value="{{$book->price}}" />
              </div>

              <!-- stock -->
              <div>
                <label class="block text-sm font-bold text-gray-700" for="title">
                  stock
                </label>

                <input
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="stock" placeholder="180" value="{{$book->stock}}" />
              </div>
              <!-- Footer -->
              <div>
                <label class="block text-sm font-bold text-gray-700" for="title">
                  discount
                </label>

                <input
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="discount" placeholder="180" value="{{$book->discount}}" />
              </div>
              
              <div class="flex items-center justify-start mt-4 gap-x-2">
                <button type="submit"
                  class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                  Save
                </button>
                <button type="submit"
                  class="px-6 py-2 text-sm font-semibold text-gray-100 bg-gray-400 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                  Cancel
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
    <!-- </div>
      </div> -->
    <!-- </div> -->
    @endsection