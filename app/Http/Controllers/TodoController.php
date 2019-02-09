<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Note;
use Auth;
use Session;

class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $user_id = Auth::user()->id;
        $todos = Todo::where("user_id",$user_id)->get();
        $notes  =Note::where("user_id",$user_id)->get();
        return view('todo', compact('user_id', 'todos', 'notes'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addItem(Request $request) {
        $todo = new Todo;
        $todo->user_id = $request->user_id;
        $todo->title = $request->title ;
        $todo->save();    
        Session::flash('alert-message', 'Todo List Created Successfully!'); 
        Session::flash('alert-class', 'alert-success');  
        return response()->json($todo); 
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editItem(Request $request){
        $todo = Todo::find($request->id);
        $todo->status = $request->status;  
        if($request->status == 1){
            Session::flash('alert-message', 'Todo List Completed!'); 
            Session::flash('alert-class', 'alert-success');
        }elseif($request->status == 0){
            Session::flash('alert-message', 'Undo Todo List'); 
            Session::flash('alert-class', 'alert-success');
        }
        $todo->save();
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteItem(Request $request){
        Todo::find($request->id)->delete();
        Session::flash('alert-message', 'Todo List Deleted Successfully!'); 
        Session::flash('alert-class', 'alert-danger');
        return response()->json();
    }

}
