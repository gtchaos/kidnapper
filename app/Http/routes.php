<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    $dialogs = \App\Dialog::latest()->take(3)->get();
//    return view('welcome', compact('dialogs'));
//});

Route::resource('dialog','DialogController');

Route::get('/', function () {
    $teamName = Cookie::get("name");
    if (empty($teamName)) {
        return redirect('profile/create');
    }
    if(strlen($teamName) > 5) {
        $teamName = mb_substr($teamName, 0, 5, 'utf-8') . '...';
    }
    return view('welcome', ['teamName' => $teamName]);
});
Route::get('dashboard', function () {
    return redirect('home/dashboard');
});
Route::resource('profile','ProfileController');

Route::get('api/dialog/{id}', function($id) {
    $relation = \App\Relation::where('word_id', $id)->first();
    $ret = [];
    if(isset($relation)) {
        $reply_id =  $relation['reply_id'];
        $reply = \App\Kidnapper::where('id', $reply_id)->value('reply');
        $ret['reply'] = $reply;
        $ret['status'] = $relation['status'];

    }  else {
        $ret['reply'] = "";
        $ret['status'] = 404;
    }
    return $ret;
});

Route::resource('group/score','ScoreController');
