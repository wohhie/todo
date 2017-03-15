<?php

namespace App\Http\Controllers;
use Auth;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $todoList = Todo::where('user_id', Auth::id())->paginate(10);;
        return view('todo.list', compact('todoList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, $rules = array(
            'name' => 'required',
        ));

        Todo::create($attr = array(
            'name' => $request->get('name'),
            'user_id' => Auth::user()->id
        ));

        return redirect('/todo')
            ->with('flash_notification.message', 'Successfully created!')
            ->with('flash_notification.level', 'success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
        $todo = Todo::findOrFail($id);
        $todo->complete = !$todo->complete;
        $todo->save();

        return redirect()
            ->route('todo.index')
            ->with('flash_notification.message', 'Task Complete!')
            ->with('flash_notification.level', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()
            ->route('todo.index')
            ->with('flash_notification.message', 'Successfully Deleted.')
            ->with('flash_notification.level', 'success');

    }
}
