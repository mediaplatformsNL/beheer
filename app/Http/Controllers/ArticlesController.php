<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use OpenAI\Laravel\Facades\OpenAI;
use Response;

class ArticlesController extends Controller
{

    public function articles() {
        $articles = Article::orderBy('created_at', 'DESC')->get();

        return view('pages.blog', compact('articles'));
    }

    public function article($slug) {
        $articles = Article::where('slug', '!=', $slug)->latest()->take(3)->get();
        $article = Article::where('slug', $slug)->first();

        return view('pages.article', compact('article', 'articles'));
    }

}