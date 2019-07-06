@php
    $title = isset($title) ? $title : '';
    $label = isset($label) ? $label : 'Create';
    $create_link = isset($create_link) ? $create_link : false;
@endphp

@include('backend.partials.notification')

<div class="d-flex mb-3 justify-content-between">
    <h4>{{$title}}</h4>
     @if($create_link)
    <div class="ml-3"><a class="btn btn-primary" href="{{ $create_link }}">{{$label}}</a></div>
    @endif
</div>
@php
    $link = isset($link) ? $link : false;
@endphp

