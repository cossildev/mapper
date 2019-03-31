<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeassageBoard;
use App\Models\{Department,People};
use App\Models\MessageBoard\{Category,Type, User};
use App\Models\Category as MessageBoardCategory;

class MessageBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = MeassageBoard::all();
        return view('admin.message.board.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $categories = MessageBoardCategory::all();
        $types = Type::all();
        return view('admin.message.board.create', compact('departments', 'categories','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->request->all();
        //dd($data);

        $user = $request->user();

        $messageBoard = MeassageBoard::create([
            'type_id' => $data['type_id'],
            'subject' => $data['subject'],
            'created_by' => $user->id,
            'content' => $data['content'],
        ]);

        foreach ($data['categories'] as $key => $item) {
            Category::create([
              'category_id' => $item,
              'board_id' => $messageBoard->id
            ]);
        }

        if(in_array(0, $data['departments']) && in_array(0, $data['to'])) {
            $users = \App\User::all();
        } elseif (in_array(0, $data['departments'])) {
            $users = \App\User::whereHas('person', function($query) use ($data) {
                $query->whereIn('department_id', $data['departments']);
            })->get();
        } elseif (in_array(0, $data['to'])) {
            $users = \App\User::whereHas('person', function($query) use ($data) {
                $query->whereIn('department_id', $data['departments']);
            })->get();
        } else {
            $users = \App\User::whereIn('id', $data['to'])->get();
        }

        foreach ($users as $key => $user) {
            User::create([
              'user_id' => $user->id,
              'board_id' => $messageBoard->id
            ]);
        }

        notify()->flash('Novo Recado Adicionado!', 'success', [
          'text' => 'Novo Recado adicionado com sucesso.'
        ]);

        return redirect()->route('message-board.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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