@extends('backend.layouts.master')

@section('title',"Settings | Create")

@section('content')
    <div class="data-section-wrapper bg-white">
        <setting-form
            :url="'{{ route('settings.update',[$settings->id]) }}'"
            :settings="{{ @json_encode($settings) }}"
            :method="'post'">
        </setting-form>
    </div>
@endsection
