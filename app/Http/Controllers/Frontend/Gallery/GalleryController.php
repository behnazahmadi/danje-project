<?php

namespace App\Http\Controllers\Frontend\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index(Request $request)
    {
        $galleries = Gallery::with("category")->Latestpaginate(12);


        if ($request->has("category") && !empty($request->get("category"))){
            $galleries = $this->getGalleriesByCategory();
        }

        return view("frontend.galleries.gallery",compact("galleries"));
    }

    public function getGalleriesByCategory()
    {
       return  Gallery::GalleriesCategoryThatUserSearchFor()
          ->Latestpaginate(12);
    }
}
