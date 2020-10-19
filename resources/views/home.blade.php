@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          @include('includes.messages')
          {{-- {{ __('You are logged in!') }} --}}
          <button type="button" name="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">
            Add bookmark
          </button>
          <hr>
          <h3>My Bookmarks</h3>
          <ul class="list-group">
            @foreach($bookmarks as $bookmark)
                <li class="list-group-item clearfix d-flex justify-content-between align-items-center">
                    <span class="w-100">
                        <a href="{{ $bookmark->url }}" target="_blank">
                            {{ $bookmark->name }}
                        </a>
                        <span class="text-white bg-secondary">
                            {{ $bookmark->description }}
                        </span>
                    </span>
                    <button data-id="{{ $bookmark->id }}" type="button" class="delete-bookmark btn btn-danger d-flex justify-content-between align-items-center" name="button">
                        <span class="fas fa-times mr-1"></span>
                        Delete
                    </button>
                </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Bookmark</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('bookmarks.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Bookmark Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Bookmark URL</label>
                    <input type="text" name="url" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <input type="submit" name="submit" value="Add" class="btn btn-success btn-lg">
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
