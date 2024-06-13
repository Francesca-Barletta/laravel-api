<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class Projectcontroller extends Controller
{
    public function index(){
        $results = Project::with('type','technologies')->paginate(6);
        return response()->json([
            'results'=>$results
        ]);
    }
}
