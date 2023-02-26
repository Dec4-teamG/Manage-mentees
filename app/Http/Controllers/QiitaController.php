<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
        $result = $client->request('GET', 'https://qiita.com/api/v2/items?page=1&per_page=100', [
            'headers' => [
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
            ],
        ]);
        $response_body =  $result->getBody();
        $arr = json_decode($response_body); //JSONから配列にする
        $coll = collect($arr);
        $qiita = $this->paginate($coll, 10, null, ['path'=>'/article']);    
        // $list=[];
        // for ($i = 0, $size = count($qiita); $i < $size; ++$i) {
            
        //     $list = array_merge($list, array($qiita[$i]->title => $qiita[$i]->url));
        // }
 
        return view('manage.article',compact('qiita'));

    }

    private function paginate($items, $perPage, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
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

