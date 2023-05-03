@extends('admin.master')
@section('title')
Dashboard
@endsection
@section('content') 
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
            <form method="POST" action="{{ route('admin.book.store') }}" enctype="multipart/form-data">
              @csrf
              <!-- Title -->
              <div>
                <label class="block text-sm font-bold text-gray-700" for="title">
                  name
                </label>

                <input
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="name" placeholder="180" />
              </div>

              <!-- Header -->
              <div>
                <label class="block text-sm font-bold text-gray-700" for="title">
                  detail
                </label>

                <input
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="detail" placeholder="180" />
              </div>

              <!-- Body -->
              <div class="mt-4">
                <label class="block text-sm font-bold text-gray-700" for="password">
                  price
                </label>
                <input name="price"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  rows="4" placeholder="400"></input>
              </div>
              <!-- stock -->
              <div class="mt-4">
                <label class="block text-sm font-bold text-gray-700" for="password">
                  stock
                </label>
                <input name="stock"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  rows="4" placeholder="400"></input>
              </div>
              <!-- discount -->
              <div class="mt-4">
                <label class="block text-sm font-bold text-gray-700" for="password">
                  discount
                </label>
                <input name="discount"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  rows="4" placeholder="400"></input>
              </div>

              

              
              <div class="flex items-center justify-start mt-4 gap-x-2">
                <a href="{{ route('admin.book.store') }}">
                <button type="submit"
                  class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                  Save
                </button>
                </a>
                <button type="submit"
                  class="px-6 py-2 text-sm font-semibold text-gray-100 bg-gray-400 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                  Cancel
                </button>
              </div>
            </form>
          </div>
          </main>
          @endsection