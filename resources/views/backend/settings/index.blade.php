@extends('backend.layouts.master')

@section('content')
    @extends('backend.layouts.master')

@section('content')

    @include('backend.partials.page-title',[
    'title' => 'All Users',
    'create_link' => route('user.create')
    ])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('Users'),'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
        <form action="{{route('setting.roles')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="default_roles">Set Default Roles</label>
                <input type="checkbox" id="default_roles" name="default_roles">
                <button class="btn btn-primary">Click</button>
            </div>
        </form>

    </div>
@endsection
