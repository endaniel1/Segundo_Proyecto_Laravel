<?php

namespace App\Http\Controllers;
use App\Article;
use App\Image;

class FrontController extends Controller {
    public function index() {

        $articles = Article::orderBy("id", "DESC")->paginate(4);
        $articles->each(function ($articles) {
            $articles->category;
            $articles->images = Image::find($articles->id);

        });
        // dd($articles);
        return view("front.index")
            ->with("articles", $articles);

    }
}
