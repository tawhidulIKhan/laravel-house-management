@extends('backend.layouts.master')


@section('content')

    @include('backend.partials.page-title',[
    'title' => 'User details'
    ])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('Users'),'route' => route('user.index')],
            ['label' => $user->name,'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
            <div>
                <div class="row">
                    <div class="col-4">
                        <img src="{{asset($user->photo)}}" alt="{{$user->name}}" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>{{$user->role_names}}</td>
                            </tr>
                            <tr>
                                <th>Date of birth</th>
                                <td>{{$user->dob}}</td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td>{{$user->age}}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{$user->gender}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
