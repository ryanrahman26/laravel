@extends('layouts.app')

@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Employee</h3>
        <a class="btn btn-link pull-right" href="{{ route('employees.index') }}">Back</a>
    </div>
    <!-- /.box-header -->
    <form class="form-horizontal" method="post" action="{{ route('employees.update', $employee->id) }}">
        {{ method_field('PATCH') }}
        @csrf
        @include('employees._form')
    </form>
</div>
@endsection
