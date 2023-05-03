@extends('admin.master')
@section('title')
Dashboard
@endsection
@section('content')   
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
      <h2>Section title</h2>
      <a class="btn btn-success" href="{{ route('admin.book.create') }}">add new book</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">name</th>
              <th scope="col">detail</th>
              <th scope="col">price</th>
              <th scope="col">review</th>
              <th scope="col">Action</th>
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
              @foreach ($reviews as $review)
              <td>{{ $review->review }}</td>
              @endforeach
              <td>
                <a href="book/edit/{{$book->id}}" class="text-indigo-600 hover:text-indigo-900">edit</a>
                <a href="book/show/{{$book->id}}" class="text-gray-600 hover:text-gray-900">show</a>
                <a href="book/review/{{$book->id}}" class="text-gray-600 hover:text-gray-900">create review</a>
                <form method="POST" action="{{ URL::to('book/delete/'.$book->id) }}">
                  @csrf
                  @method('DELETE')
                <input type="hidden" name="_method" value="delete" />
                <button type="submit">delete</button>
              </form>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    </main>
@endsection