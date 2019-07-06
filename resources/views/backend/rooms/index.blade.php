@extends('backend.layouts.master')

@section('content')


    @include('backend.partials.page-title',[
    'title' => 'All Rooms',
    'label' => 'Add new room',
    'create_link' => route('room.create')
    ])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('Rooms'),'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
        <table class="table w-100">
            <thead>
            <tr>
                <th>Photo</th>
                <th>room No</th>
                <th>Rent</th>
                <th>room</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($rooms as $room)
                <tr>
                    <td>
                        <img width="50" class="img-fluid" src="{{asset($room->photo)}}" alt="{{$room->no}}">
                    </td>
                    <td>{{$room->no}}</td>
                    <td>{{$room->rent}}</td>
                    <td>{{$room->rent}}</td>
                    <td class="d-flex">
                        <a href="{{route('room.edit', $room->id)}}" class="text-success mx-1"><i class="fas fa-edit"></i></a>
                        <a href="{{route('room.show', $room->id)}}" class="text-info mx-1"><i class="fas fa-eye"></i></a>
                        <a href="#" onclick="$('#delete_{{$room->id}}').submit()" class="text-danger mx-1 btn-link">
                            <i class="fas fa-trash"></i></a>
                        <form id="delete_{{$room->id}}" action="{{ route('room.delete', $room->id) }}" method="post">
                            @csrf
                        </form>
                    </td>
                </tr>
                @empty
            @endforelse
            </tbody>
        </table>
        {{$rooms->links()}}
    </div>
@endsection
