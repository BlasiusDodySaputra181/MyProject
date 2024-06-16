<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Setup\Process;
use App\Setup\Export;

class exportController extends Controller
{
    public function getpdf01($getreportdate){
        $process = new Process();
        $process->ExportPDF01($getreportdate);
    }

    public function getpdf02($reportdescription){
        $process = new Process();
        $process->ExportPDF02($reportdescription);
    }

    public function getword01($getreportdate){
        $process = new Process();
        return $process->ExportWord01($getreportdate);
    }

    public function getword02($reportdescription){
        $process = new Process();
        return $process->ExportWord02($reportdescription);
    }

    public function getexcel00($getreportmonth){
        $process = new Process();
        return $process->ExportExcel00($getreportmonth);
    }

    public function getexcel01($getreportdate){
        $process = new Process();
        return $process->ExportExcel01($getreportdate);
    }

    public function getexcel02($reportdescription){
        $process = new Process();
        return $process->ExportExcel02($reportdescription);
    }
}