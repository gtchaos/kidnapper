<?php

namespace App\Http\Controllers;

use Cache;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class DialogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamName = Cookie::get("name");
        if (empty($teamName)) {
            return redirect('profile/create');
        }
        if(strlen($teamName) > 8) {
            $teamName = mb_substr($teamName, 0, 8, 'utf-8') . '...';
        }
        return view('welcome', ['teamName' => $teamName]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sourceId = $id;
        $res = DB::table('relations')->where('source_id', $sourceId)->get();
        foreach ($res as &$item) {
            if (!empty($item->word_id)) {
                $item->word = DB::table('negotiators')->where('id', $item->word_id)->value('word');
            }
        }
        return $res;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
