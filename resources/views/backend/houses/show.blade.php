@extends('backend.layouts.master')

@section('title',"Settings | Create")

@section('content')
    @include('backend.partials.page-title',[
'title' => 'House details'
])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('House'),'route' => route('house.index')],
            ['label' => $house->name,'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
            <div>
                <div class="row">
                    <div class="col-4">
                        <img src="{{asset($house->photo)}}" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{$house->name}}</td>
                            </tr>
                            <tr>
                                <th>Total Rooms</th>
                                <td>{{$house->total_room}}</td>
                            </tr>
                            <tr>
                                <th>Rooms</th>
                                <td>
                                    @forelse($house->rooms as $key => $room)
                                    {{$room}} {{$key > 0 ? ' , ' :''}}
                                    @empty
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th>Renters</th>
                                <td>
                                    @forelse($house->rooms as $key => $room)
                                        {{$room->renter}}
                                    @empty
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$house->address}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
