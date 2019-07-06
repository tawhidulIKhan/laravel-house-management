@extends('backend.layouts.master')


@section('content')

    @include('backend.partials.page-title',[
    'title' => 'transaction details'
    ])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('transactions'),'route' => route('transaction.index')],
            ['label' => $transaction->id,'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
                <div class="row">
                    <div class="col-4">
                        <img src="{{asset($transaction->photo)}}" alt="{{$transaction->name}}" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <table class="table">
                            <tr>
                                <th>Type</th>
                                <td>{{$transaction->type}}</td>
                            </tr>
                            <tr>
                                <th>Amount</th>
                                <td>{{$transaction->amount}}</td>
                            </tr>
                            <tr>
                                <th>Room</th>
                                <td>{{$transaction->room}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$transaction->description}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
