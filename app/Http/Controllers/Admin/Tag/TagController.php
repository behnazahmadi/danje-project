<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the tags
     * @return Application|Factory|View
     */
    public function index()
    {
        $tags = Tag::Latestpaginate(20);
        return view("admin.tags.index",compact("tags"));
    }

    /**
     * Show the form for creating a new tag.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("admin.tags.create");
    }

    /**
     *  Store a newly created tag in storage
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validData = $request->validate([
           "name" => "required"
        ]);

        Tag::create($validData);

        return redirect()->route("admin.tags.index");
    }

    /**
     * Show the form for editing the specified tag.
     * @param Tag $tag
     * @return Application|Factory|View
     */
    public function edit(Tag $tag)
    {
        return view("admin.tags.edit",compact("tag"));
    }

    /**
     * Update the specified tag in storage.
     * @param Request $request
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function update(Request $request,Tag $tag): RedirectResponse
    {
        $validData = $request->validate([
            "name" => "required"
        ]);

        $tag->update($validData);

        return redirect()->route("admin.tags.index");
    }

    /**
     * Remove the specified tag from storage.
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back();
    }
}
