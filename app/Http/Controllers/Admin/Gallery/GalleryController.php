<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\services\ImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * @var ImageService
     */
    public $imageService;

    /**
     * @param ImageService $imageService
     */
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the galleries.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $galleries = Gallery::Latestpaginate(20);
        return view("admin.galleries.index", compact("galleries"));
    }

    /**
     * Show the form for creating a new gallery.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return \view("admin.galleries.create");
    }

    /**
     * Store a newly created gallery in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validData = $request->validate([
            "image" => ["required", "image"],
            "title" => ["required"],
            "category_id" => ["required"]
        ]);

        if ($request->hasFile("image")) {
            $imageFile = $request->file("image");

            $safeRandomImageName = $this->imageService->make($imageFile,"galleries","image");

            $validData["image"] = $safeRandomImageName;
        }

        $gallery = Gallery::create($validData);

        return redirect()->route("admin.galleries.index");

    }

    /**
     * Display the specified gallery.
     *
     * @param Gallery $gallery
     * @return Response
     */
    public function show(Gallery $gallery): Response
    {
        //
    }

    /**
     * Show the form for editing the specified gallery.
     *
     * @param Gallery $gallery
     * @return Application|Factory|View|Response
     */
    public function edit(Gallery $gallery)
    {
        return \view("admin.galleries.edit", compact("gallery"));
    }

    /**
     * Update the specified gallery in storage.
     *
     * @param Request $request
     * @param Gallery $gallery
     * @return RedirectResponse
     */
    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $validData = $request->validate([
            "title" => ["required"],
            "category_id" => ["required"]
        ]);

        if ($request->hasFile("image")) {

          $this->imageService->isFileExists("galleries",$gallery->image);

           $imageFile = $request->file("image");

           $safeRandomImageName =  $this->imageService->make($imageFile,"galleries","image");

            $validData["image"] = $safeRandomImageName;
        } else {
            $validData["image"] = $gallery->image;
        }

        $gallery->update($validData);

        return redirect()->route("admin.galleries.index");
    }

    /**
     * Remove the specified gallery from storage.
     *
     * @param Gallery $gallery
     * @return RedirectResponse
     */
    public function destroy(Gallery $gallery): RedirectResponse
    {
        $gallery->delete();
        return back();
    }
}
