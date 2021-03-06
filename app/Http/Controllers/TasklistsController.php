<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tasklist;

class TasklistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasklists = $user->tasklists()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasklists' => $tasklists,
            ];
            $data += $this->counts($user);
            return view('users.show', $data);
        }else {
            return view('welcome');
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasklist = new Tasklist;
        
        return view('tasklists.create',[
            'tasklist' => $tasklist,
            ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->tasklists()->create([
            'content' => $request->content,
            'status' => $request->status,
        ]);
        return redirect()->back();
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasklist = Tasklist::find($id);
        if (\Auth::id() == $tasklist->user_id) {
        
        return view('tasklists.show',[
            'tasklist' => $tasklist,
            ]);
        } else {
            return redirectly('/');
        //
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasklist = Tasklist::find($id);
        if (\Auth::id() == $tasklist->user_id) {

        return view('tasklists.edit',[
            'tasklist' => $tasklist,
            ]);
        }else{
            return redirect('/');
        }
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
        $this->validate($request, [
            'status' => 'required|max:30',
            'content'=> 'required|max:20',
        ]);    
        
        $tasklist = Tasklist::find($id);
         if(\Auth::id() == $task->user_id){
        $tasklist->status = $request->status;
        $tasklist->content = $request->content;
        $tasklist->save();
         } else {
        return redirect('/');
    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     
     
     
     
        {
        $tasklist = \App\Tasklist::find($id);

        if (\Auth::id() == $tasklist->user_id) {
            $tasklist->delete();
        }else{

        return redirect()->back();
        }
    }
}

