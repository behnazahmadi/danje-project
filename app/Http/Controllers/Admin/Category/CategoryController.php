<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::with("childs")->ParentCategory()->Latestpaginate(20);

        return view("admin.categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return \view("admin.categories.create");
    }

    /**
     * Store a newly created category in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
           "name" => "required",
           "parent_id" => "required",
           "link" => "required",
            "type" => "required"
        ]);

        Category::create($validData);

        return redirect()->route("admin.categories.index");
    }

    /**
     * Display the specified category.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return \view("admin.categories.edit",compact("category"));
    }

    /**
     * Update the specified category in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $validData = $request->validate([
            "name" => "required",
            "parent_id" => "required",
            "link" => "required",
            "type" => "required"
        ]);

        $category->update($validData);

        return redirect()->route("admin.categories.index");
    }

    /**
     * Remove the specified category from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return back();
    }
}
