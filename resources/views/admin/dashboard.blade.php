@extends('admin.master')
@section('title')
Dashboard
@endsection
@section('content') 
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
      <h2>Articles</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Title</th>
              <th scope="col">Header</th>
              <th scope="col">Created At</th>
              
            </tr>
          </thead>
          @php
              $count = 1
            @endphp
          @foreach ($articles as $article)
          <tbody>
            <tr>
              <td>{{$count++}}</td>
              <td>{{ $article->title }}</td>
              <td>{{ $article->header }}</td>
              <td>{{ $article->created_at }}</td>
              
            </tr>
          </tbody>
          @endforeach
        </table>
        <h2>Books</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">name</th>
              <th scope="col">detail</th>
              <th scope="col">price</th>
              
            </tr>
          </thead>
          @php
              $count = 1
            @endphp
          @foreach ($books as $book)
          <tbody>
            <tr>
              <td>{{$count++}}</td>
              <td>{{ $book->name }}</td>
              <td>{{ $book->detail }}</td>
              <td>{{ $book->price }}</td>
              
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
      </div>
    </main>
@endsection