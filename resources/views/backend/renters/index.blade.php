@extends('backend.layouts.master')

@section('content')


    @include('backend.partials.page-title',[
    'title' => 'All Renters',
    'create_link' => route('renter.create'),
    'label' => 'Add new renter'
    ])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('Renters'),'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
        <table class="table w-100">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Total member</th>
                <th>Name</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($renters as $renter)
                <tr>
                   <td>
                       <img src="{{$renter->user->photo}}" class="img-fluid" width="50">
                   </td>
                    <td>{{$renter->total_family_members}}</td>
                    <td>{{$renter->user->name}}</td>
                    <td>{{$renter->address}}</td>
                    <td class="d-flex">
                        <a href="{{route('renter.edit', $renter->id)}}" class="text-success mx-1"><i class="fas fa-edit"></i></a>
                        <a href="{{route('renter.show', $renter->id)}}" class="text-info mx-1"><i class="fas fa-eye"></i></a>
                        <a href="#" onclick="$('#delete_{{$renter->id}}').submit()" class="text-danger mx-1 btn-link">
                            <i class="fas fa-trash"></i></a>
                        <form id="delete_{{$renter->id}}" action="{{ route('renter.delete', $renter->id) }}" method="post">
                            @csrf
                        </form>
                    </td>
                </tr>
                @empty
            @endforelse
            </tbody>
        </table>
        {{$renters->links()}}
    </div>
@endsection
