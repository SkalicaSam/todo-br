<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','homes']]);
        // method that user can access withou login.
    }

    public function index()
    {
        if(Auth::check()){  
            return view('todo')
                ->with('tasks', Task::orderBy('updated_at', 'DESC')
                    ->where('user_id', '=', [Auth::user()->id])
                    ->get());
        }
        else
        {
        return view('todo');
           //->with('tasks', Task::orderBy('updated_at', 'DESC')
           //     ->get());
        }
    }

     public function homes()
    {
        return view('homes');
    }


    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {

        $task = Task::find($id);
        return view('edit')
            ->with('task', $task);
    }

    public function update($id)
    //update($id, Request $request)?? 
    {
        // find by $id
        $task = Task::find($id);

        // set data
        $task->taskText = request()->taskText;
                //dd( $task->taskText);
                    //other data
                            //$user_id = auth()->user()->id;
                            //dd($user_id);  //==1 
                            //dd($id); // task id

        // update
        $task->update();
        
        // redirect to todo/id page
        return redirect('/')
            ->with('message', 'Your task has been updated!');
    }

    public function dell($id)
    {
        
        $task = Task::find($id);
        $task->delete();
        return redirect('/')
            ->with('message', 'Your task has been deleted !!!');
    }

    public function store(Request $request){

        $request->validate([
            'taskText' => 'required'
        ]);

        $task = $request->taskText;
        Task::create([
            'taskText'=>$request->input('taskText'),
            'user_id'=> auth()->user()->id
        ]);

        return redirect('/')
            ->with('message', 'Your task has been added!');
    }


}
