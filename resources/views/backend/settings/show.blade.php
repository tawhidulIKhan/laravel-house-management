@extends('backend.layouts.master')

@section('title',"Settings | Create")

@section('content')
    <div class="data-section-wrapper bg-white">
            <div>
                <h3>{{ $settings->name}}
                    <a href="{{route('settings.edit', [$settings->id])}}" title="Edit  Settings">
                        <span class="text-primary"><i class="fas fa-edit"></i></span>
                    </a>
                </h3>
            </div>
            <div>
                <div class="row">
                    <div class="col">
                        <table class="table table-responsive">
                            <tr>
                                <th>Name</th>
                                <td>{{$settings->name}}</td>
                            </tr>
                            <tr>
                                <th>Label</th>
                                <td>{{$settings->label}}</td>
                            </tr>
                            <tr>
                                <th>Value</th>
                                <td>{{$settings->value}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$settings->description}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
