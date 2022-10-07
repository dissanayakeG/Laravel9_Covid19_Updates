<?php

namespace App\Http\Controllers;

use App\Models\CovidDetail as ModelsCovidDetail;
use Illuminate\Http\Request;

class CovidDetailController extends Controller
{
    public function index()
    {
       $posts = ModelsCovidDetail::latest('created_at')->first();
       return response()->json($posts);
    }
}
