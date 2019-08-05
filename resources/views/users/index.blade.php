@extends('layouts.app')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">User</h3>
        <a class="btn btn-primary pull-right" href="{{ route('users.create') }}">Add User</a>
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
                Nama
            </th>
            <th>
                Email
            </th>
            <th>
                Action
            </th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                    <form class="inline" action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Apakah yakin menghapus?')"class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach 
        </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <div class="pull-right">
            {{ $users->links() }}
        </div>
    </div>
</div>
<!-- /.box -->
@endsection
