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
      <a class="btn btn-success" href="{{ route('admin.article.create') }}">add new article</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Title</th>
              <th scope="col">Header</th>
              <th scope="col">Created At</th>
              <th scope="col">Action</th>
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
              <td>
                <a href="article/edit/{{$article->id}}" class="text-indigo-600 hover:text-indigo-900">edit</a>
                <a href="article/show/{{$article->id}}" class="text-gray-600 hover:text-gray-900">show</a>
                <form method="POST" action="{{ URL::to('article/delete/'.$article->id) }}">
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