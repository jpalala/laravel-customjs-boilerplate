Route::get('callback', CallbackProvider::class); //will redirect to authenticate/{code}
//save whatever deetails we get to the database here and start a permanent
Route::get('authenticate/{code}', function ($code) {
    //dd(session('code'));
    //dd($code);
    $user = github_request_access_token($code);
    if($user !== null) {
        dd($user);
    }  else {
        return view('welcome_session', [
            'sessions' => 'whatever'
        ]);
    }

});


