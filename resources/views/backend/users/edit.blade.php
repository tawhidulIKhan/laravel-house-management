@extends('backend.layouts.master')

@section('content')

    @include('backend.partials.page-title',[
    'title' => 'Edit user'
    ])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('Users'),'route' => route('user.index')],
            ['label' => $user->first_name,'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">

        <form method="post" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="first_name">{{ __('First Name') }}</label>

                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" required autocomplete="first_name" autofocus>

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Role</label>

                <select name="role" id="role" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{$role->name}}" {{in_array($role->name, $user->getRoleNames()->toArray()) ? 'selected' : ''}}>{{ ucfirst($role->name)}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                Update
            </button>

        </form>

    </div>
@endsection
