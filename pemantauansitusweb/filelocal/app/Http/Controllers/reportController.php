<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setup\Process;

class reportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdetailopen($getreportdate)
    {
        $process = new Process();
        return $process->ProcessReportIndexDetailOpen($getreportdate);
    }

    public function getoption()
    {
        $process = new Process();
        return $process->ProcessReportGetOption();
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
        return $process->ProcessReportStore($request);
    }

    public function storedateupdate(Request $request)
    {
        $process = new Process();
        return $process->ProcessReportStoreDateUpdate($request);
    }

    public function storebymonthandyear(Request $request)
    {
        $process = new Process();
        return $process->ProcessReportStoreByMonthAndYear($request);
    }

    public function storebydate(Request $request)
    {
        $process = new Process();
        return $process->ProcessReportStoreByDate($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $process = new Process();
        return $process->ProcessReportDelete($id);
    }

    public function destroybymonthandyear($monthandyear)
    {
        $process = new Process();
        return $process->ProcessReportDeleteByMonthAndYear($monthandyear);
    }

    public function destroybydate($date)
    {
        $process = new Process();
        return $process->ProcessReportDeleteByDate($date);
    }
}