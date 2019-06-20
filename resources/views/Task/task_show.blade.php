@extends('layouts.app')
@section('content')
    <style>
        .col-sm-6 {
            background: #ccc;
        }

        .other {
            background: #a4a4a4;
        }


    </style>
    <div class="row">
        <div class="col-sm-6">
            <h3>Task Name: </h3>
            <h3>Detail: </h3>
            <h3>Assign To: </h3>
            <h3>Creation Date:</h3>
        </div>
        <div class="col-sm-6 other">
            <h4>{{$task->name}}</h4>
            <h4>{{$task->description}}</h4>
            <h4>{{$task->user->name}}</h4>
            <h4>{{date('d-m-Y', strtotime($task->created_at))}}</h4>
        </div>
    </div>
    <hr>

    <div class="row bootstrap snippets">
        <div class="col-md-6 col-md-offset-2 col-sm-12">
            <div class="comment-wrapper">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Comment panel
                    </div>
                    <div class="panel-body">
                        <form id="form">
                            @csrf
                        <textarea class="form-control" id="comment" name="comment" placeholder="write a comment..." rows="3"></textarea>
                            <input id="taskid" name="taskid" type="hidden" value="{{$task->id}}">
                        <br>
                        <button type="button" id="postcomment" class="btn btn-info pull-right">Post</button>
                        </form>
                        <div class="clearfix"></div>
                        <hr>
                        <h5>Comments</h5>
                        <ul class="media-list">
                            @foreach($task->comments as $comment)
                                <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="{{$comment->user->image_path}}" alt="" class="img-circle">
                                </a>
                                <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted">{{date('d-m-Y', strtotime($comment->created_at))}}</small>
                                </span>
                                    <strong class="text-success">{{$comment->user->name}}-<small>({{$comment->user->role->name}})</small></strong>
                                    <p>
                                        {{$comment->comment}} </a>.
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
<script>
    jQuery(document).ready(function(){
        jQuery('#postcomment').click(function(e){
            alert('click');
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ route('addcomments') }}",
                method: 'post',
                data : $('#form').serialize(),
                success: function(result){
                    $('#comment').val('');
                }});
        });
    });
</script>
@endsection
