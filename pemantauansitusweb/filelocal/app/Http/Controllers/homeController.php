<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setup\Process;

class homeController extends Controller
{
    public function loggedcheck()
    {
        $process = new Process();
        return $process->LoggedStatus();
    }

    public function pagefooter()
    {
        $process = new Process();
        return $process->LabelFooter();
    }
}
