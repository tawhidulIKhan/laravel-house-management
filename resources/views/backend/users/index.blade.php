@extends('backend.layouts.master')

@section('content')
    @include('backend.partials.page-title',[
   'title' => 'All Users',
   'label' => 'Add new user',
   'create_link' => route('user.create')
   ])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('Users'),'route' => null]
        ]
    ])
    <div class="data-section-wrapper bg-white">
        <table class="table">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>
                        <img src="{{$user->photo}}" alt="{{$user->name}}" class="img-fluid"
                        width="50">
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role_names}}</td>
                    <td class="d-flex">
                        <a href="{{route('user.edit', $user->id)}}" class="text-success mx-1"><i class="fas fa-edit"></i></a>
                        <a href="{{route('user.show', $user->id)}}" class="text-info mx-1"><i class="fas fa-eye"></i></a>
                        <a href="#" onclick="$('#delete_{{$user->id}}').submit()" class="text-danger mx-1 btn-link">
                            <i class="fas fa-trash"></i></a>
                        <form id="delete_{{$user->id}}" action="{{ route('user.delete', $user->id) }}" method="post">
                          @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </form>
                    </td>
                </tr>
                @empty
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
