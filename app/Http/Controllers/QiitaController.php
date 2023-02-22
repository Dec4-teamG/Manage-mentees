<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class QiitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client;
        $token = '01be66738a3c21afff603341d054b91358e3b851';
        $result = $client->request('GET', 'https://qiita.com/api/v2/items?page=10&per_page=15', [
            'headers' => [
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
            ],
        ]);
        $response_body =  $result->getBody();
        $qiita = json_decode($response_body);
        $list=[];
        for ($i = 0, $size = count($qiita); $i < $size; ++$i) {
            
            $list = array_merge($list, array($qiita[$i]->title => $qiita[$i]->url));
        }
 
        return view('manage.article',compact('qiita'));

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

}

