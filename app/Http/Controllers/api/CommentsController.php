<?php

namespace App\Http\Controllers\api;

use App\comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $comment = new comments([
            'comment' => $request->input('comment'),
            'user_id' => 1,
            'task_id' => $request->input('taskid')
        ]);

        if($comment->save()) {
            return ok();
        }else{
            return error("Something Went Wrong");
        }
    }
}
