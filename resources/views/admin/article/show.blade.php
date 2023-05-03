@extends('admin.master')
@section('title')
Dashboard
@endsection
@section('content') 

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <div class="flex flex-row">
        <div class="bg-no-repeat bg-red-200 border border-red-300 rounded-xl w-full mr-2 p-6" style="background-image: url(https://previews.dropbox.com/p/thumb/AAvyFru8elv-S19NMGkQcztLLpDd6Y6VVVMqKhwISfNEpqV59iR5sJaPD4VTrz8ExV7WU9ryYPIUW8Gk2JmEm03OLBE2zAeQ3i7sjFx80O-7skVlsmlm0qRT0n7z9t07jU_E9KafA9l4rz68MsaZPazbDKBdcvEEEQPPc3TmZDsIhes1U-Z0YsH0uc2RSqEb0b83A1GNRo86e-8TbEoNqyX0gxBG-14Tawn0sZWLo5Iv96X-x10kVauME-Mc9HGS5G4h_26P2oHhiZ3SEgj6jW0KlEnsh2H_yTego0grbhdcN1Yjd_rLpyHUt5XhXHJwoqyJ_ylwvZD9-dRLgi_fM_7j/p.png?fv_content=true&size_mode=5); background-position: 90% center;">
          <!-- <p class="text-5xl text-indigo-900">Welcome <br><strong>Lorem Ipsum</strong></p> -->
          <span class="bg-red-300 text-xl text-white inline-block rounded-full px-8 py-2"><strong>01:51</strong></span>
<!-- <div>
  <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">

    <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl"> -->

      <div class="mb-4">
        <h1 class="font-serif text-3xl font-bold underline decoration-gray-400"> Post Show</h1>
      </div>

      <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
        <form method="POST" action="#">
          <!-- Title -->
          <div>
            <div class="">
              <img class="object-cover md:object-scale-down w-5/12 object-center" src="{{ asset('img/article/'.$articles->image_url) }}">
            </div>
            <h3 class="text-2xl font-semibold">{{ $articles->title }}</h3>
            <div class="flex items-center mb-4 space-x-2">
              <span class="text-xs text-gray-500"> {{ $articles->created_at }}</span><span class="text-xs text-gray-500">Created by
                {{ $articles->writer }}</span>
            </div>
            <p class="text-base text-gray-700">{{$articles->body}}</p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</main>
@endsection