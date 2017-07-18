<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use DB;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $todo = Todo::orderBy('id','desc')->get();
            return view('home', compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = $request->todo;
        if ($todo == "") {
            \Session::flash('notadd','Data has not successfully added.');
            return redirect('/');
        }else{
            DB::table('todo')->insert(['todo'=>$todo]);
            \Session::flash('add','Data has successfully added.');
            return redirect('/');
        }
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
    public function edit()
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
        $id = $request->id;
       $created = $request->created_at;
       $todo = $request->todo;
       if ($todo == "") {
           \Session::flash('notupdate','Data has not successfully updated.');
         return redirect('/');
       }else{
        DB::table('todo')->where('id',$id)->update([
            'todo' => $todo,
            'created_at' => $created,
            'updated_at' => date('Y-m-d H:i:s')
       ]);
        // DB::update("UPDATE todo set todo='$todo',created_at='$created',updated_at=date('yyyy-mm') where id = $id");
        \Session::flash('update','Data successfully updated.');
         return redirect('/');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $nomor = $request->id;
        Todo::destroy($nomor);
        \Session::flash('destroy','Data successfully deleted.');
        return redirect('/');
    }

    public function test(Request $request)
   {
        dd($request->nama);
    }

}
