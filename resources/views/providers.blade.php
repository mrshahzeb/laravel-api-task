@extends('layouts.app')

@section('content')
<div class="container">
    <div class="" >
        <h4>{{ __('Providers') }}</h4>
    </div>
    <table class="table">
        <thead>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Name') }}</th>
        </thead>
        <tbody>
            @if( isset( $providers ) )
                @foreach ($providers as $provider)
                    <tr>
                        <td>{{ $provider->id }}</td>
                        <td>{{ $provider->name }}</td>
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