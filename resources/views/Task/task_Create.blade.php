@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6  column col-sm-offset-0 col-md-offset-2 col-lg-offset-3">
            <form class="form-horizontal" method="post" action="{{route('taskstore')}}">
                @csrf
                <fieldset>

                    <!-- Form Name -->
                    <legend>{{$data['FormName']}}</legend>
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="selectUser">Assign To: </label>
                        <div class="col-md-9">
                            <select id="selectUser" name="selectUser" class="form-control">
                                @foreach($data['UsersList'] as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textinput">Text Input</label>
                        <div class="col-md-9">
                            <input id="textinput" name="task_title" type="text" placeholder="placeholder" class="form-control input-md">
                        </div>


                    </div>


                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textarea">Text Area</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="textarea" name="task_description">default text</textarea>
                        </div>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="button1id"></label>
                        <div class="col-md-8">
                            <button id="button1id" type="submit" name="button1id" class="btn btn-success">Assign Task</button>
                            <a href="/dashboard" id="button2id" name="button2id" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>

    </div>

@endsection
