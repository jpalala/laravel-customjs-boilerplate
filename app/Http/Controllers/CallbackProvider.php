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
        $code = $request->input('code');
        //session(['code' => $code]);
        $user = github_request_access_token($code);
        dd($user);
        //redirect('/authenticate/'.$code);
        //return view('callback', ['github_code' => $data]);

    }
}
