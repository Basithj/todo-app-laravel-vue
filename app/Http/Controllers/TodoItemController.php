<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoItems;
use Illuminate\Support\Carbon;

class TodoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TodoItems::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
        $todoItem = new TodoItems;
        $todoItem->title = $request->items["title"];
        $todoItem->description = $request->items["description"];
        $todoItem->due_date = $request->items["due_date"];
        $todoItem->save();

        return $todoItem;
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
        $todoitem = TodoItems::find( $id );

        if( $todoitem ){
            $todoitem->done = $request->items["done"] ? true : false;
            $todoitem->done_at = $request->items["done"] ? Carbon::now() : null;
            $todoitem->save();
            return $todoitem;
        }

        return 'Not found';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todoitem = TodoItems::find( $id );

        if( $todoitem ){
            $todoitem->delete();
            return 'deleted';
        }

        return 'Not found';
    }
}
