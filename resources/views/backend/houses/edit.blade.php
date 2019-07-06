@extends('backend.layouts.master')

@section('content')
    @include('backend.partials.page-title',[
'title' => 'Edit house'
])


    @include('backend.partials.breadcrumb', [
        'links' => [
            ['label' => __('Houses'),'route' => route('house.index')],
            ['label' => $house->no,'route' => null]
        ]
    ])

    <div class="data-section-wrapper bg-white">
        <form method="POST" action="{{ route('house.update', $house->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                       value="{{ $house->name  }}">

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Address</label>

                <textarea name="address" id="address" cols="30" rows="10" class="form-control @error('name') is-invalid @enderror">{{ $house->address  }}
                </textarea>

                @error('address')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Update
            </button>

        </form>

    </div>
@endsection
