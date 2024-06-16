<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setup\Process;

class signatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $process = new Process();
        return $process->ProcessSignatureIndex();
    }

    public function checksignaturenumber(Request $request)
    {
        $process = new Process();
        return $process->ProcessSignatureCheckNumber($request);
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
        return $process->ProcessSignatureStore($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Signature  $Signature
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $process = new Process();
        return $process->ProcessSignatureDelete($id);
    }
}