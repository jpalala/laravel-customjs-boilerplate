<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallbackProvider extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
	    $data = [
            'code' => $_REQUEST['code']
        ];

        session(['data' => $data]);

	    return view('callback', ['data' => $data]);

	    //dd($get_access);
	    //exit();
    }
}
