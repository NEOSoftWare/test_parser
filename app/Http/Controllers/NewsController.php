<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::with(['category', 'file'])
            ->orderBy('date', 'desc')
            ->get()
        ;

        return view('index', [
            'news' => $news
        ]);
    }

    public function show(int $id, Request $request)
    {
        $news = News::whereId($id)->firstOrFail();

        return view('show', [
            'news' => $news
        ]);
    }
}
