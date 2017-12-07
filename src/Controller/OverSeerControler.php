<?php

namespace ctf0\OverSeer\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OverSeerControler extends Controller
{
    public function show(Request $request)
    {
        // turn data into array
        $data = json_decode($request->data, true);

        if (array_key_exists('_token', $data)) {
            unset($data['_token']);
        }

        // turn array into fluent object
        // $obj->some->nested
        $obj = json_decode(json_encode($data));

        return view($request->template)->withData($obj);
    }
}
