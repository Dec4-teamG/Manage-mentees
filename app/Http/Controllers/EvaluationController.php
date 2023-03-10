<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Evaluation;
use App\Models\User;
use App\Models\Description;
use Auth;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mypage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function newcreate($id)
    {
        //dd($id);
        $user = User::find($id);
        $descriptions = Description::pluck('description')->all();
        // ddd($id);
        return view('evaluation.create',compact('user','descriptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = strval($request->user_id);
        $menteedes = $user_id .$request->description;
        //dd($menteedes);
        $request->merge(['menteedes' => $menteedes]);
        //dd($request->menteedes);
        $validator = Validator::make($request->all(), [
            'description' => 'required | max:15',
            'evaluation' => 'required',
            'menteedes' => 'required | unique:evaluations'
        ]);

        //ddd($request->user_id);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);
        }
        
        $result = Evaluation::create($request->all());
        return redirect()->route('mentees.menteemypage' , ['mentees'=>$request->user_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
         $result = Evaluation::find($id)->delete();
         return redirect()->route('mypage.index');
    }
}
