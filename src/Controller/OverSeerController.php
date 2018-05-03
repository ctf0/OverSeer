<?php

namespace ctf0\OverSeer\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OverSeerController extends Controller
{
    public function show(Request $request)
    {
        return view($request->template)->withData(json_decode($request->data));
    }
}
