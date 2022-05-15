<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use App\services\ImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use function Livewire\str;

class BlogController extends Controller
{

    const DIRECTORY = "blogs";
    const INPUT_NAME = "image";

    /**
     * @var ImageService
     */
    private $imageService;

    /**
     * @param ImageService $imageService
     */
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the blogs
     * @return Application|Factory|View
     */
    public function index()
    {
        $blogs = Blog::with("user","category")->Latestpaginate(20);
        return view("admin.blogs.index",compact("blogs"));
    }

    public function show(Blog $blog)
    {

    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("admin.blogs.create");
    }

    /**
     * Store a newly created blog in storage
     * @param BlogRequest $request
     * @return RedirectResponse
     */
    public function store(BlogRequest $request): RedirectResponse
    {
        $validData = $request->validated();

        if ($request->hasFile(self::INPUT_NAME)){
            $imageFile = $request->file(self::INPUT_NAME);

            $safeRandomImageName = $this->imageService->make($imageFile,self::DIRECTORY,self::INPUT_NAME);

            $validData[self::INPUT_NAME] = $safeRandomImageName;

        }

        $validData["slug"] = Str::slug($validData["slug"]);

        $blog = Blog::create($validData);

        if ($request->has("tags")){
           $blog->addTags($request->get("tags"));
        }

        return redirect()->route("admin.blogs.index");

    }


    /**
     * Show the form for editing the specified blog
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function edit(Blog $blog)
    {
        return view("admin.blogs.edit",compact("blog"));
    }

    /**
     * Update the specified blog in storage.
     * @param Request $request
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function update(Request $request,Blog $blog): RedirectResponse
    {
        $validData = $this->validatedData($request);

        if ($request->hasFile(self::INPUT_NAME)){

            if (File::exists(public_path("/assets/".self::DIRECTORY.'/'.$blog->image))){
                File::delete(public_path("/assets/".self::DIRECTORY.'/'.$blog->image));
            }

            $imageFile = $request->file(self::INPUT_NAME);

            $safeRandomImageName = $this->imageService->make($imageFile,self::DIRECTORY,self::INPUT_NAME);

            $validData[self::INPUT_NAME] = $safeRandomImageName;
        }

        $validData["slug"] = Str::slug($validData["slug"]);

        $blog->update($validData);

        if ($request->has("tags")){
            $blog->tags()->sync($request->get("tags"));
        }

        return redirect()->route("admin.blogs.index");

    }

    /**
     * Remove the specified blog from storage
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back();
    }

    /**
     * validation data of blog
     * @param Request $request
     * @return array
     */
    public function validatedData(Request $request): array
    {
        $validData = $request->validate([
            "title" => "required",
            "content" => "required",
            "category_id" => "required",
            "user_id" => "required",
            "study_time" => "required",
            "slug" => "required",
            "status" => "required"
        ]);

        return $validData;
    }
}
