<?php

namespace App\Http\Controllers;

use App\Group;
use Cache;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = Cookie::get('name');
        $ret = [];
        $ret['status'] = "success";
        $score = \App\Group::where('name', $name)->first();
        if(isset($score)) {
            $ret['score'] = $score->score;
            $ret['uid'] = $score->id;
        } else {
            $ret['score'] = 0;
            $ret['uid'] = 0;
        }
        return $ret;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $score = $request->get("score");
        $name = Cookie::get('name');
        try {
            if ($name && $score) {
                \App\Group::where('name', $name)->update(['score' => $score]);
            }
            return \Response::json([
                'ret' => 200,
                'retMsg' => 'update success'
            ]);
        } catch (\PDOException $e) {
            \Log::error("update team score failed" . $e);
            return \Response::json([
                'ret' => 500,
                'retMsg' => 'update failed'
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
