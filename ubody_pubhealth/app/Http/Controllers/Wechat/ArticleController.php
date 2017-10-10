<?php

namespace App\Http\Controllers\Wechat;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $list = Article::paginate(10);
        return view("wechat.article.index")->withList($list);
    }

    public function show($id)
    {
        $model = Article::findOrFail($id);
        return view('wechat.article.show')->withModel($model);
    }
}
