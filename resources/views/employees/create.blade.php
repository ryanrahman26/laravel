@extends('layouts.app')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Add Employee</h3>
        <a class="btn btn-link pull-right" href="{{ route('employees.index') }}">Back</a>
    </div>
    <!-- /.box-header -->    
    <form class="form-horizontal" method="post" action=" {{ route('employees.store') }}">
        @csrf
        @include('employees._form')
    </form>
</div>
@endsection

