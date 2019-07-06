@extends('backend.layouts.master')

@section('content')

    @include('backend.partials.page-title',[
    'title' => 'Edit transaction'
    ])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('transactions'),'route' => route('transaction.index')],
            ['label' => $transaction->first_name,'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
        <form method="POST" action="{{ route('transaction.update', $transaction->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="type">{{ __('Type') }}</label>

                <select name="type" id="type" class="form-control">
                    <option value="gas_bill">Gas bill</option>
                    <option value="electricity_bill">Electricity bill</option>
                </select>
            </div>

            <div class="form-group">
                <label for="room">{{ __('Room') }}</label>

                <select name="room" id="room" class="form-control">
                    @foreach($rooms as $room)
                        <option value="{{$room->id}}">{{$room->no}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="amount">{{ __('Amount') }}</label>
                <input type="number" class="form-control" name="amount" value="{{$transaction->amount}}">
            </div>


            <div class="form-group">
                <label for="description">{{ __('Description') }}</label>
                <textarea name="description" id="description" cols="30" class="form-control" rows="10">{{$transaction->description}}
                </textarea>
            </div>


            <button type="submit" class="btn btn-primary">
                Update
            </button>

        </form>

    </div>
@endsection
