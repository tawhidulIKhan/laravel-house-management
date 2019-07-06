@extends('backend.layouts.master')

@section('title',"Settings | Create")

@section('content')
    <div class="data-section-wrapper bg-white">
        <setting-form
            :url="'{{ route('settings.store') }}'"
            :method="'post'">
        </setting-form>
    </div>
@endsection
