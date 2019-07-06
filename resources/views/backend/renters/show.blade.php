@extends('backend.layouts.master')

@section('title',"Settings | Create")

@section('content')
    @include('backend.partials.page-title',[
'title' => 'Room details'
])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('Renters'),'route' => route('renter.index')],
            ['label' => $renter->no,'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
            <div>
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset($renter->user->photo) }}" alt="{{$renter->no}}" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <table class="table">
                            <tr>
                                <th>First name</th>
                                <td>{{$renter->user->first_name}}</td>
                            </tr>
                            <tr>
                                <th>Last name</th>
                                <td>{{$renter->user->last_name}}</td>
                            </tr>
                            <tr>
                                <th>Total family members</th>
                                <td>{{$renter->total_family_members}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$renter->address}}</td>
                            </tr>
                            <tr>
                                <th>Room</th>
                                <td>{{$renter->room}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
