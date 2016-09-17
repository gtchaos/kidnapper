<?php

namespace App\Http\Controllers;

use App\Group;
use Cache;
use Cookie;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Mockery\CountValidator\Exception;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teamName = trim($request->get("name"));
        try {
            $ret = DB::table("groups")->where('name', $teamName)->get();
            if(!empty($ret)) {
                return \Response::json([
                    'ret' => 500,
                    'retMsg' => 'name exists'
                ]);
            }
            Group::create($request->all());
            $cookie = Cookie::make('name', $teamName, 60);
            return \Response::json([
                'ret' => 200,
                'retMsg' => 'save success'
            ])->withCookie($cookie);
        } catch (\PDOException $e) {
            \Log::error("save team name failed" . $e);
            return \Response::json([
                'ret' => 500,
                'retMsg' => 'save failed'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
