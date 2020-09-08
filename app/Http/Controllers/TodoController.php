<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Illuminate\Http\Response;

//use Response;

class TodoController extends Controller
{
    /**
     * Display a list of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $todo = Todo::all();
        return view('todoPage')->with(compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|max:150',
            'description' => 'required'
        ]);

         $todo = new Todo();
         $todo->title = $request->title;
         $todo->description = $request->description;
         $todo->save();


        /*$todo = Todo::updateOrCreate(['id' => $request->id], [
            'title' => $request->title,
            'description' => $request->description
        ]);*/
        return response()->json(['data' => $todo], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}


