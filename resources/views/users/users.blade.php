@extends('layouts.app')

@section('content')
<table class="table table-hover">

    <thead>

    <th>User Name</th>

    <th>Email Address</th>

    <th>Creation Date</th>

    <th>Action</th>
    </thead>

    <tbody>
    @foreach($users as $user)

        <tr>

            <td>{{$user->name}} </td>

            <td>{{$user->email}} </td>

            <td>{{date('d-m-Y', strtotime($user->created_at))}}</td>


        </tr>
    @endforeach

    </tbody>

</table>
@endsection
