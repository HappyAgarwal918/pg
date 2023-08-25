@extends('admin.layouts.master')

@section('content')
<div class="container">    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Method</th>
                <th>URI</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($routes as $route)
                <tr>
                    <td>{{ $route->methods()[0] }}</td>
                    <td>{{ $route->uri() }}</td>
                    <td>{{ $route->getName() }}</td>
                    <td>{{ $route->getActionName() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection