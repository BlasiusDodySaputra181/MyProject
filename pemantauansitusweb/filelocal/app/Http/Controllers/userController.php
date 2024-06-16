<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setup\Process;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function checkname(Request $request)
    {
        $process = new Process();
        return $process->ProcessCheckName($request);
    }
    
    public function index()
    {
        $process = new Process();
        return $process->ProcessUserIndex();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $process = new Process();
        return $process->ProcessUserStore($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setusername()
    {
        $process = new Process();
        return $process->ProcessUsername();
    }

    public function setuser()
    {
        $process = new Process();
        return $process->ProcessUserSetting();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $process = new Process();
        return $process->ProcessUserDelete($id);
    }
}