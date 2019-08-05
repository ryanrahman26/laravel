@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="callout callout-info">
        <h4>Hello!</h4>

        <p>You are logged in!</p>
    </div>
@endsection
