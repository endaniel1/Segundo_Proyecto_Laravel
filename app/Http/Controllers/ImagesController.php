<?php

namespace App\Http\Controllers;
use App\Image;

class ImagesController extends Controller {

    public function index() {

        $images = Image::orderBy("id", "ASC")->paginate(2);
        $images->each(function ($images) {
            $images->article;
        });

        //dd($images);
        return view("admin.images.index")->with("images", $images);
    }
}
