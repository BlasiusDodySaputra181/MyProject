<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setup\Process;

class importreserveController extends Controller
{
    public function importexcel(Request $request)
    {
        $process = new Process();
        return $process->ProcessImportReserve($request);
    }
}