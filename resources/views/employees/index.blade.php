@extends('layouts.app')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Employee</h3>
        <a class="btn btn-primary pull-right" href="{{ route('employees.create') }}">Add Employee</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
        <tr>
            <th>
                Name
            </th>
            <th>
                Email
            </th>
            <th>
                Phone
            </th>
            <th>
                Company
            </th>
            <th>
                Action
            </th>
        </tr>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->company->name }}</td>
                <td>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                    <form class="inline" action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Apakah yakin menghapus?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <div class="pull-right">
            {{ $employees->links() }}
        </div>
    </div>
</div>
<!-- /.box -->
@endsection
