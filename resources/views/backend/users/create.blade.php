@extends('backend.layouts.master')

@section('title',"Settings | Create")

@section('content')
    @include('backend.partials.page-title',['title' => 'Create new user'])

    @include('backend.partials.breadcrumb', [
    'links' => [
        ['label' => __('Users'),'route' => route('user.index')],
        ['label' => __('Create'),'route' => null]
        ]
    ])



    <div class="data-section-wrapper bg-white">
        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="first_name">{{ __('First Name') }}</label>

                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                       name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="custom-file">
                <input type="file" class="custom-file-input" name="photo" id="customFile">
                <label class="custom-file-label" for="customFile">Upload photo</label>
            </div>

            <div class="form-group">
                <label for="role">Role</label>

                <select name="role" id="role" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{$role->name}}">{{ ucfirst($role->name)}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                {{ __('Create') }}
            </button>

        </form>
    </div>
@endsection
