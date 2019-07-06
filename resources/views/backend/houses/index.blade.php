@extends('backend.layouts.master')

@section('content')

    @include('backend.partials.page-title',[
    'title' => 'All Houses',
    'label' => 'Add new house',
    'create_link' => route('house.create')
    ])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('Houses'),'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
        <table class="table w-100">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Address</th>
                <th>Total Rooms</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($houses as $house)
                <tr>
                    <td>
                        <img src="{{$house->photo}}" class="img-fluid" width="100">
                    </td>
                    <td>{{$house->name}}</td>
                    <td>{{$house->address}}</td>
                    <td>{{$house->total_room}}</td>
                    <td class="d-flex">
                        <a href="{{route('house.edit', $house->id)}}" class="text-success mx-1"><i class="fas fa-edit"></i></a>
                        <a href="{{route('house.show', $house->id)}}" class="text-info mx-1"><i class="fas fa-eye"></i></a>
                        <a href="#" onclick="$('#delete_{{$house->id}}').submit()" class="text-danger mx-1 btn-link">
                            <i class="fas fa-trash"></i></a>
                        <form id="delete_{{$house->id}}" action="{{ route('house.delete', $house->id) }}" method="post">
                            @csrf
                        </form>
                    </td>
                </tr>
                @empty
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
