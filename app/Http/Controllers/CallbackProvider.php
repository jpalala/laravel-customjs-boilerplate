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
	    $get_access = github_exchange_tokens($_REQUEST['code']);
        dd($get_access);
        $request->session()->put('access_token', $get_access );
        sleep(10);

	    return view('callback', ['response' => $get_access]);

	    //dd($get_access);
	    //exit();
    }
}
