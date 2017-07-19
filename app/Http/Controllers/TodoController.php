<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use DB;
use Validator;

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
            $row = $todo->count();
            return view('home', compact('todo','row'));
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
           $validator = Validator::make($request->all(), [
            'todo' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            \Session::flash('notadd','Data has not successfully added.');
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
           Todo::create($request->all());
            \Session::flash('add','Data has successfully added.');
            return redirect('/');
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

       $validator = Validator::make($request->all(), [
            'todo' => 'required|string|min:3|max:10',
        ]);

        if ($validator->fails()) {
            \Session::flash('notupdate','Data has not successfully added.');
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }

        Todo::find($id)->update($request->all());
        // DB::update("UPDATE todo set todo='$todo',created_at='$created',updated_at=date('yyyy-mm') where id = $id");
        \Session::flash('update','Data successfully updated.');
         return redirect('/');
       
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
