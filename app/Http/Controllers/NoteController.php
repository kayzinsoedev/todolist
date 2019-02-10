<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Auth;
use Session;

class NoteController extends Controller
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
        $notes  =Note::where("user_id",$user_id)->get();
        return view('note', compact('user_id', 'notes'));
    }

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addNote(Request $request) {
    	
        $note = new Note;
        $note->user_id = $request->user_id;
        $note->title = $request->title ;
        $note->description = $request->description ;
        $note->save();  
        Session::flash('message', 'Note Created Successfully!'); 
        Session::flash('alert-class', 'alert-success');   
        return response()->json($note);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateNote(Request $request) {
    	$note = Note::findorFail($request->edit_note_id); 
    	$note->title = $request->edit_note_title ;
        $note->description = $request->edit_note_description ;
        $note->save();    		
        Session::flash('message', 'Note Updated Successfully!'); 
        Session::flash('alert-class', 'alert-success');
        return redirect('/');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteNote(Request $request){
        Note::find($request->id)->delete();
        Session::flash('message', 'Note Deleted Successfully!'); 
        Session::flash('alert-class', 'alert-danger');
        return response()->json();
    }
}
