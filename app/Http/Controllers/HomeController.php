<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(Article::getMapping($ignoreConflicts = true));

        $data = Article::whereHas('category', function ($q){
            $q->where(['is_show' => 1]);
        })->limit(200)->get();
        $data->addToIndex();
        $search = Article::searchByQuery(['match' => [
            'title' => 'qui'
        ]], null, null, null, null, ['category_id' => 'desc']);
        dd($search->chunk(10));
        return view('home');
    }
}
