<?php

namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
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
        $teamName = trim($request->get("oldName"));
        try {
            $ret = \App\Group::where('name', $teamName)->first();
            if(!empty($ret->id)) {
                $cookie = Cookie::make('name', $teamName, 60);
                return \Response::json([
                    'ret' => 200,
                    'retMsg' => 'login success'
                ])->withCookie($cookie);
            } else {
                return \Response::json([
                    'ret' => 500,
                    'retMsg' => 'name not exists'
                ]);
            }

        } catch (\PDOException $e) {
            \Log::error("login failed" . $e);
            return \Response::json([
                'ret' => 500,
                'retMsg' => 'login failed, perhaps the team name not exist.'
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
