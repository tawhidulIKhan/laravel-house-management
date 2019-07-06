@extends('backend.layouts.master')

@section('title',"Settings | Create")

@section('content')
    @include('backend.partials.page-title',['title' => 'Create new house'])

    @include('backend.partials.breadcrumb', [
    'links' => [
        ['label' => __('Houses'),'route' => route('house.index')],
        ['label' => __('Create'),'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
        <form method="POST" action="{{ route('house.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>House photo</label>
                <div class="custom-file">
                    <input type="file" name="photo" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose photo</label>
                </div>
            </div>

            <div class="form-group">
                <label for="address">Address</label>

                <textarea name="address" id="address" cols="30" rows="10"
                          class="form-control @error('name') is-invalid @enderror"></textarea>

                @error('address')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Add new house
            </button>

        </form>
    </div>
@endsection
