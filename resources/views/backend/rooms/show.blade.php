@extends('backend.layouts.master')

@section('title',"Settings | Create")

@section('content')
    @include('backend.partials.page-title',[
'title' => 'Room details'
])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('Rooms'),'route' => route('room.index')],
            ['label' => $room->no,'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
            <div>
                <div class="row">
                    <div class="col-4">
                        <img src="{{asset($room->photo)}}" alt="{{$room->no}}">
                    </div>
                    <div class="col-8">
                        <table class="table">
                            <tr>
                                <th>Room no</th>
                                <td>{{$room->no}}</td>
                            </tr>
                            <tr>
                                <th>Room rent</th>
                                <td>{{$room->rent}}</td>
                            </tr>
                            <tr>
                                <th>House</th>
                                <td>{{$room->house}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
