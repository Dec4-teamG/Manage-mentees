<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Department;

class MenteesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::where('status','mentee')
        ->pluck('user_id')
        ->all();   //statusがmenteeになっている人のidリストを作成
        // $employees = Employee::find(1);
        //ddd($employees->user());

        $mentees = User::query()
        ->WhereIn('id', $employees)
        ->get();
        //ddd($mentees);

        $departments = Department::pluck('department')->all();


        return view('manage.mentees', compact('mentees','departments'));

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


    public function menteemypage($id)
    {
        $employee = User::find($id);
        // ddd($employee);
        return view('mypage.index', compact('employee'));
    }

    public function search(Request $request)
    {
        //空白削除
        $keyword = trim($request->keyword);
        $department = $request->department;
        // ヒットしたユーザの id を配列で取得
        if ($department == 'null'){
            $users  = Employee::where('status', 'mentee')
            ->pluck('user_id')
            ->all();
        }else{
            $users  = Employee::where('status', 'mentee')
            ->where('department', $department)
            ->pluck('user_id')
            ->all();
        };
        // Employee テーブルの user_id カラムで上記配列に含まれているものを抽出
        $mentees = User::query()
        ->where('name', 'like', "%{$keyword}%")
            ->whereIn('id', $users)
            ->get();
        //ddd($employees);
        // ddd($mentees);
        // ddd($request->department);

         $departments = Department::pluck('department')->all();

        return view('manage.mentees', compact('mentees','departments'));
    }
}
