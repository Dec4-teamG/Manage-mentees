<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Vedmant\FeedReader\Facades\FeedReader;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleController extends Controller
{
    public function qiita(Request $request)
    {
        $client = new Client;
        $result = $client->request('GET', 'https://qiita.com/api/v2/items?page=1&per_page=100&query=fusic+user>%3D%3Afusic',);
        $response_body =  $result->getBody();
        $arr = json_decode($response_body); //JSONから配列にする
        $coll = collect($arr);
        $qiita = $this->paginate($coll, 10, null, ['path'=>'/article']);    
        return view('manage.article',compact('qiita'));
    }
    
    public function techblog(Request $request)
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
            $coll = collect($result['items']);
            $techblog = $this->paginate($coll, 10, null, ['path'=>'/techblog']); 
            // techblog['title']
            // for ($i = 0, $size = count($techblog); $i < $size; ++$i) {
            //  $list = array_merge($list, array($techblog[$i]->title => $techblog[$i]->url));
            // }  
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
            $coll = collect($result['items']);
            $awsblog = $this->paginate($coll, 10, null, ['path'=>'/awsblog']);    
            return view('manage.awsblog',compact('awsblog'));
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
