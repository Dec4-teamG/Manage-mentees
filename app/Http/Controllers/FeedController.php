<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vedmant\FeedReader\Facades\FeedReader;

class FeedController extends Controller
{
    public function feed()
    {
        /** @var \SimplePie $f */
        $f = FeedReader::read('https://tech.fusic.co.jp/rss.xml');
            $result = [
                'title' => $f->get_title(),
                'description' => $f->get_description(),
                'permalink' => $f->get_permalink(),
            ];
            foreach ($f->get_items(0, $f->get_item_quantity()) as $item) {
                $i['title'] = $item->get_title();
                $i['description'] = $item->get_description();
                $i['id'] = $item->get_id();
                $i['content'] = $item->get_content();
                $i['author'] = $item->get_author();
                $i['date'] = $item->get_date();
                $i['permalink'] = $item->get_permalink();
                $result['items'][] = $i;
            }
            $techblog = $result['items'];        
            return view('manage.techblog',compact('techblog'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var \SimplePie $f */
        $f = FeedReader::read('https://aws.amazon.com/jp/blogs/architecture/feed/');
            $result = [
                'title' => $f->get_title(),
                'description' => $f->get_description(),
                'permalink' => $f->get_permalink(),
            ];
            foreach ($f->get_items(0, $f->get_item_quantity()) as $item) {
                $i['title'] = $item->get_title();
                $i['description'] = $item->get_description();
                $i['id'] = $item->get_id();
                // $i['content'] = $item->get_content();
                // $i['author'] = $item->get_author();
                $i['date'] = $item->get_date();
                $i['permalink'] = $item->get_permalink();
                $result['items'][] = $i;
            }
            $awsblog = $result['items'];      
            return view('manage.awsblog',compact('awsblog'));
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
