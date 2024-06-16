<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setup\Process;

class monitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check($date)
    {
        $process = new Process();
        return $process->ProcessMonitoringCheck($date);
    }
    
    public function index()
    {
        $process = new Process();
        return $process->ProcessMonitoringIndex();
    }

    public function getoption()
    {
        $process = new Process();
        return $process->ProcessMonitoringGetOption();
    }

    public function buttoncheckdisabled()
    {
        $process = new Process();
        return $process->ProcessMonitoringButtonCheckDisabled();
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
        return $process->ProcessMonitoringStore($request);
    }

    public function storesub(Request $request)
    {
        $process = new Process();
        return $process->ProcessMonitoringStoreSub($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */

    public function destroydivision($id)
    {
        $process = new Process();
        return $process->ProcessMonitoringDeleteDivision($id);
    }

    public function destroysubdivision($id)
    {
        $process = new Process();
        return $process->ProcessMonitoringDeleteSubdivision($id);
    }
}