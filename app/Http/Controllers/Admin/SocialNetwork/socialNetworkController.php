<?php

namespace App\Http\Controllers\Admin\SocialNetwork;

use App\Http\Controllers\Controller;
use App\Models\socialNetwork;
use App\services\ImageService;
use Faker\Core\File;
use Faker\Provider\Image;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class socialNetworkController extends Controller
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
     * Display a listing of the social_networks.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $social_networks = DB::table("social_networks")->latest()->paginate(10);
        return view("admin.social_networks.index", compact("social_networks"));
    }

    /**
     * Show the form for creating a new social_network.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return \view("admin.social_networks.create");
    }

    /**
     * Store a newly created social_network in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            "name" => "required",
            "link" => "required",
            "logo" => "sometimes",
            "classIcon" => "sometimes"
        ]);

        if ($request->hasFile("logo")) {
            $imageFile = $request->file("logo");
            $ImageRandomName = $this->imageService->make($imageFile,"social_networks","logo");
            $validData["logo"] = $ImageRandomName;
        }

        DB::table("social_networks")->insert($validData);

        return redirect()->route("admin.social_networks.index");

    }

    /**
     * Display the specified social_network.
     *
     * @param socialNetwork $socialNetwork
     * @return Response
     */
    public function show(socialNetwork $socialNetwork)
    {
        //
    }

    /**
     * Show the form for editing the specified social_network.
     *
     * @param $social_network
     * @return Application|Factory|View
     */
    public function edit($social_network)
    {
        $socialNetwork = DB::table("social_networks")->where("id", $social_network)->first();
        return \view("admin.social_networks.edit", compact("socialNetwork"));
    }

    /**
     * Update the specified social_network in storage.
     *
     * @param Request $request
     * @param $social_network
     * @return RedirectResponse
     */
    public function update(Request $request, $social_network): RedirectResponse
    {
        $socialNetwork = DB::table("social_networks")->where("id", $social_network)->first();
        $validData = $request->validate([
            "name" => "required",
            "link" => "required",
            "logo" => "sometimes",
            "classIcon" => "sometimes"
        ]);

        if ($request->hasFile("logo")) {

            $this->imageService->isFileExists("social_networks",$social_network->logo);

            $imageFile = $request->file("logo");

            $ImageRandomName = $this->imageService->make($imageFile,"social_networks","logo");

            $validData["logo"] = $ImageRandomName;
        }

        DB::table("social_networks")->where("id", $social_network)->update($validData);

        return redirect()->route("admin.social_networks.index");
    }

    /**
     * Remove the specified social_network from storage.
     *
     * @param $social_network
     * @return RedirectResponse
     */
    public function destroy($social_network): RedirectResponse
    {
        DB::table("social_networks")->where("id", $social_network)->delete();
        return back();
    }
}
