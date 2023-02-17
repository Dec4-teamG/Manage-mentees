<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vedmant\FeedReader\Facades\FeedReader;

class FeedController extends Controller
{
    public function feed()
    {
        $feed = FeedReader::read('https://tech.fusic.co.jp/rss.xml');

        if ( $feed->error() ) {
            echo $feed->error();
        }

        // $i = 0;
        // foreach ($feed->get_items() as $item) {
        //     $techblog[$i]['title'] = mb_strimwidth(trim($item->get_title()));
        //     $techblog[$i]['permalink'] = trim($item->get_permalink());
        //     $techblog[$i]['link'] = trim($item->get_link());
        //     $techblog[$i]['date'] = $item->get_date('Y-m-d H:i:s');
        //     $techblog[$i]['content'] = mb_strimwidth(strip_tags(trim($item->get_content())));
        //     $i++;
        // }

        // return view('manage.techblog',compact('techblog'));
    }
    
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
}
