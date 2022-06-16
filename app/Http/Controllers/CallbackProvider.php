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
        session(['code' => $request->input('code')]);
        redirect('/authenticate/'.$code);
        //return view('callback', ['github_code' => $data]);

    }
}
