@extends('backend.layouts.master')

@section('content')

    @include('backend.partials.page-title',[
    'title' => 'All transactions',
    'create_link' => route('transaction.create')
    ])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('transactions'),'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
        <table class="table">
            <thead>
            <tr>
                <th>Type</th>
                <th>Amount</th>
                <th>Room</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($transactions as $transaction)
                <tr>
                    <td>{{$transaction->type}}</td>
                    <td>{{$transaction->amount}}</td>
                    <td>{{$transaction->room}}</td>
                    <td>
                        <a href="{{route('transaction.edit', $transaction->id)}}" class="text-success mx-1"><i class="fas fa-edit"></i></a>
                        <a href="{{route('transaction.show', $transaction->id)}}" class="text-info mx-1"><i class="fas fa-eye"></i></a>
                        <a href="{{route('transaction.delete', $transaction->id)}}" class="text-danger mx-1"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <p>No transaction found</p>
            @endforelse
            </tbody>
        </table>

        {{$transactions->links()}}
    </div>
@endsection
