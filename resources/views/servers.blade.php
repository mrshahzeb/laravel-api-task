@extends('layouts.app')

@section('content')
<div class="container">
    <div class="" >
        <h4>{{ __('Servers') }}</h4>
    </div>
    <table class="table">
        <thead>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Name') }}</th>
        </thead>
        <tbody>
            @if( isset( $services ) )
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->name }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>No Data Found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection