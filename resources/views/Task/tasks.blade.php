@extends('layouts.app')

@section('content')
    <table class="table table-hover">

        <thead>

        <th>Task Title</th>

        <th>Task Description</th>

        <th>Creation Date</th>

        @if($Assignee)
        <th>AssignTo</th>
        @endif
        </thead>

        <tbody>
        @foreach($tasks as $task)

            <tr>

                <td>{{$task->name}} </td>

                <td>{{$task->description}} </td>

                <td>{{date('d-m-Y', strtotime($task->created_at))}}</td>

                @if($Assignee)
                    <td>{{$task->user->name}} </td>
                @endif
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection
