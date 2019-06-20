<?php

namespace App\Http\Controllers\api;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    public function index()
    {
        $tasks = Task::with('User')->get();
        $AddAssigneeColumn = true;

        return ok(['tasks' => $tasks,'Assignee' => $AddAssigneeColumn]);
    }

    public function create()
    {
        $usersList = User::where('role_id','!=', 1)->with('Role')->get();
        $extras = ['FormName' => 'Add New Task', 'UsersList' => $usersList];
        return ok($extras);
    }

    public function store(Request $request)
    {
        $userid = $request->input('selectUser');
        $task_name = $request->input('task_title');
        $task_description = $request->input('task_description');
        $task = new Task([
            'name' => $task_name,
            'description' => $task_description,
            'user_id' => $userid
        ]);

        if($task->save()) {
            return ok();
        }else{
            return error("Something Went Wrong");
        }
    }

    public function show($id)
    {
        $task = Task::find($id);
        return ok(['task' => $task]);
    }
}
