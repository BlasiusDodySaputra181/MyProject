<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Setup\Process;

class sideController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createagency()
    {
        return view('agency.index.side.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createmonitoring()
    {
        return view('monitoring.index.side.index');
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createreportindex()
    {
        return view('report.index.side.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createreportindexopen($reportmonth)
    {
        setcookie("reportmonth", $reportmonth);
        return view('report.index.side.indexopen');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createreportdetailopen($reportdate)
    {
        setcookie("reportdate", $reportdate);
        return view('report.index.side.indexdetailopen');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createsignature()
    {
        return view('signature.index.side.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createuser()
    {
        return view('user.index.side.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $process = new Process();
        return $process->ProcessReportSideIndex();
    }

    public function indexopen($getreportmonth)
    {
        $process = new Process();
        return $process->ProcessReportSideIndexOpen($getreportmonth);
    }
}