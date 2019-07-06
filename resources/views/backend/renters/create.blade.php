@extends('backend.layouts.master')

@section('title',"Settings | Create")

@section('content')
    @include('backend.partials.page-title',['title' => 'Create new renter'])

    @include('backend.partials.breadcrumb', [
    'links' => [
        ['label' => __('Renters'),'route' => route('renter.index')],
        ['label' => __('Create'),'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
        <form method="POST" action="{{ route('renter.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="total_members">Total Family Members</label>

                <input id="total_members" type="text"
                       class="form-control @error('total_family_members') is-invalid @enderror"
                       name="total_family_members"
                       value="{{ old('total_family_members') }}" required>

                @error('total_family_members')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="first_name">first name</label>

                <input id="first_name" type="text"
                       class="form-control @error('first_name') is-invalid @enderror"
                       name="first_name"
                       value="{{ old('first_name') }}" required>

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="last_name">last name</label>

                <input id="last_name" type="text"
                       class="form-control @error('last_name') is-invalid @enderror"
                       name="last_name"
                       value="{{ old('last_name') }}" required>

                @error('last_name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="email">Email</label>

                <input id="email" type="text"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email"
                       value="{{ old('email') }}" required>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Renter photo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="photo" id="customFile">
                    <label class="custom-file-label" for="customFile">Upload photo</label>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>

                <textarea name="address" id="address" cols="30" rows="10"
                          class="form-control @error('address') is-invalid @enderror"></textarea>

                @error('address')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                {{ __('Create') }}
            </button>

        </form>
    </div>
@endsection
