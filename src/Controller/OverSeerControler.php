<?php

namespace ctf0\OverSeer\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OverSeerControler extends Controller
{
    public function show(Request $request)
    {
        $data = json_decode($request->data);

        return view($request->template, compact('data'));
    }
}
