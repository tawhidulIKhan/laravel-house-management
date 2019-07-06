@extends('backend.layouts.master')

@section('content')
    @include('backend.partials.page-title',[
'title' => 'Edit room'
])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('Rooms'),'route' => route('room.index')],
            ['label' => $room->no,'route' => null]
        ]
    ])
    <div class="data-section-wrapper bg-white">
        <form method="POST" action="{{ route('room.update', $room->id) }}">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="no">Room no</label>

                <input id="no" type="text" class="form-control @error('no') is-invalid @enderror"
                       name="no"
                       value="{{ $room->no }}" required>

                @error('no')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="rent">Room Rent</label>

                <input name="rent" id="rent"
                       class="form-control @error('rent') is-invalid @enderror"
                value="{{$room->rent}}">

                @error('rent')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="house">House</label>
                <select name="house_id" id="house_id" class="form-control">
                    @foreach($houses as $house)
                        <option value="{{$house->id}}" {{($house === $room->house) ? 'selected' : ''}}>{{$house->name}}</option>
                    @endforeach
                </select>

            </div>
            <button type="submit" class="btn btn-primary">
                Update
            </button>

        </form>

    </div>
@endsection
