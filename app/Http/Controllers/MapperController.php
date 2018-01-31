<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapper;
use App\User;
use App\Task;
use App\MapperTasks;
use Request as Req;
use Illuminate\Validation\Validator;

class MapperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.mappings.index')->with('mappings', Mapper::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mappings.create')
        ->with('users', User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Req::all();

        if(empty($data['name'])) {

          $user = User::find($data['user']);

          $data['name'] = "Mapeamento Semana " . date('W') . " para " . $user->name;
        }

        $validator = \Illuminate\Support\Facades\Validator::make($data, [
          'name' => 'required|max:255|unique:mappers',
          'user' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $mapper = new Mapper();

        $mapper->name = $data['name'];
        $mapper->user_id = $data['user'];
        $mapper->save();

        return redirect()->action('MapperController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('admin.mappings.details')
        ->with('mapper', Mapper::findOrFail($id));
    }

    public function addTask($id)
    {
        return view('admin.mappings.add-task')
        ->with('mapper', Mapper::findOrFail($id))
        ->with('tasks', Task::where('status_id', 1)->where('mapper_id', null)->get());
    }

    public function addTaskStore()
    {
        $data = Req::all();

        foreach($data['ids'] as $item) {
            $mTask = Task::findOrFail($item);
            $mTask->mapper_id = $data['mapper'];
            $mTask->user_id = $data['user'];
            $mTask->save();
        }

        return redirect()->route('mapping', ['id' => $data['mapper']]);
    }

    public function removeTaskStore($id, $task)
    {
        $mTask = Task::findOrFail($task);
        $mTask->mapper_id = null;
        $mTask->save();

        return redirect()->route('mapping', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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