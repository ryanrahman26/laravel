@extends('layouts.app')

@section('content')

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Web Service</h3>
        
        <a class="btn btn-danger pull-right" href="{{ route('webservices.delete') }}">Delete User</a>
        <p>Get data from: <a href="http://ws2.globalvillage.co.id/user" target="_blank">http://ws2.globalvillage.co.id/user</a></p>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <table class="table table-bordered table-responsive">   
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
                    Adress
                </th>
                <th>
                    Village
                </th>
                <th>
                    Photo
                </th>
            </tr>
            @foreach($data['data'] as $json_d)
                <tr>
                    <td>{{ $json_d['name'] }}</td>
                    <td>{{ $json_d['email'] }}</td>
                    <td>{{ $json_d['phone'] }}</td>
                    <td>{{ $json_d['address'] }}</td>
                    <td>{{ $json_d['village']['name'] }}</td>
                    <td><img src="{{ $json_d['photo'] }}" width="128"/></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
