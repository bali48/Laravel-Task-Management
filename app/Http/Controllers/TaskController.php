<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * TaskController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            if(\auth()->user()->role_id == 1){
                $tasks = Task::with('User')->get();
                $AddAssigneeColumn = true;
            }else{
                $tasks = Task::with('User')->where('user_id', '=', \auth()->user()->id)->get();
                $AddAssigneeColumn = false;
            }
//            dd($tasks->dump());

            return view('Task.tasks',['tasks' => $tasks,'Assignee' => $AddAssigneeColumn]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usersList = User::where('role_id','!=', 1)->with('Role')->get();
        $extras = ['FormName' => 'Add New Task', 'UsersList' => $usersList];
        return view('Task.task_Create')->with(['data' => $extras]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        $task->save();
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $usersList = User::where('role_id','!=', 1)->with('Role')->get();
        $task = Task::find($id);
        return view('Task.task_show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
