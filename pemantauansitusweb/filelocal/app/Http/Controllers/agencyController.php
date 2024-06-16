<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setup\Process;

class agencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $process = new Process();
      return $process->ProcessAgencyIndex();
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
      return $process->ProcessAgencyStore($request);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agency  $Agency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $process = new Process();
      return $process->ProcessAgencyDelete($id);
    }
}