@extends('layouts.app')

@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Edit User</h3>
        <a class="btn btn-link pull-right" href="{{ route('users.index') }}">Back</a>
    </div>
    <!-- /.box-header -->
    <form class="form-horizontal" method="post" action="{{ route('users.update', $user->id) }}">
        {{ method_field('PATCH') }}
        @csrf
        @include('users._form')
    </form>
</div>
@endsection
