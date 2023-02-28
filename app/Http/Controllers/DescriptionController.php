<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Description;
use Validator;

class DescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('description.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function newcreate($id)
    {   
        //dd($id);

        return view('description.create',compact('id'));
    }

    public function store(Request $request)
    {
        //$result = Description::create($request->all());
        //dd($request->description);
         $validator = Validator::make($request->all(), [
            // descriptionsテーブルのdescriptionカラムで一意チェック
            'description' => 'unique:descriptions'
        ]);

        $id = $request->id;
       // dd($id);

        if ($validator->fails()) {
        return redirect()
        ->route('description.newcreate',['description'=>$id])
        ->withInput()
        ->withErrors($validator);
        }



        $description = Description::create([
          'description'=>$request->description,
        ]);

        $description2 = [
            'created_at'=>$description->created_at,
            'updated_at'=>$description->updated_at,
            'description'=>$request->description,
        ];

        DB::table('descriptions')
            ->where('id', $description->id)
            ->update($description2);
        
        //dd($id);
        return redirect()->route('evaluation.newcreate',['mentees'=>$id]);

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
