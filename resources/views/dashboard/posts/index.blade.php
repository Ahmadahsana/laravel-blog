@extends('dashboard.layout.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>My Post</h2>
  </div>

  @if (session()->has('success'))
  <div class="alert alert-primary" role="alert">
    {{ session('success') }}
  </div> 
  @endif
  
  <a href="/dashboard/posts/create" class="btn btn-primary my-3">Create new Post</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">Judul</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
              <td>
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/dashboard/posts/{{ $post->slug }}">View</a></li>
                    <li><a class="dropdown-item" href="/dashboard/posts/{{ $post->slug }}/edit">Edit</a></li>
                    <li>
                      <form action="/dashboard/posts/{{ $post->slug }}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="dropdown-item" onclick="return confirm('yakin hapus?')">delete</button>
                      </form>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection

