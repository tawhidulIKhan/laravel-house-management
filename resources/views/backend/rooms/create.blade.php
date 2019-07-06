@extends('backend.layouts.master')

@section('title',"Settings | Create")

@section('content')
    @include('backend.partials.page-title',['title' => 'Create new room'])

    @include('backend.partials.breadcrumb', [
    'links' => [
        ['label' => __('Rooms'),'route' => route('room.index')],
        ['label' => __('Add new room'),'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
        <form method="POST" action="{{ route('room.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="no">Room no</label>

                    <input id="no" type="text" class="form-control @error('no') is-invalid @enderror"
                           name="no"
                           value="{{ old('no') }}" required>

                    @error('no')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
            </div>

            <div class="form-group">
                <label for="rent">Room Rent</label>

                <input name="rent" id="rent"
                          class="form-control @error('rent') is-invalid @enderror">

                @error('rent')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Room photo</label>
                <div class="custom-file">
                    <input type="file" name="photo" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose photo</label>
                </div>
            </div>

            <div class="form-group">
                <label for="house">House</label>
                <select name="house_id" id="house_id" class="form-control">
                    @foreach($houses as $house)
                        <option value="{{$house->id}}">{{$house->name}}</option>
                        @endforeach
                </select>

            </div>
                <button type="submit" class="btn btn-primary">
              Add room
            </button>

        </form>
    </div>
@endsection
