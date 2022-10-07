<?php

namespace App\Http\Controllers;

use App\HelpAndGuide;
use App\Http\Requests\UpdateHelpAndGuidesRequest;
use App\Models\HelpAndGuide as ModelsHelpAndGuide;

class HelpAndGuideController extends Controller
{
    public function index()
    {
        $posts = ModelsHelpAndGuide::all();
        return response()->json($posts);
    }

    public function store(UpdateHelpAndGuidesRequest $request)
    {
        $post_data = [];
        $post_data['user_id'] = $request->get('user_id');
        $post_data['link'] = $request->get('link');
        $post_data['description'] = $request->get('description');
        $save = ModelsHelpAndGuide::create($post_data);
        return response()->json($save, 200);
    }
}
