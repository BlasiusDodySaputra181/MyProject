<?php

namespace App\Setup;

class Reset extends Load
{    
    // VARIABLE RESET EXPORT

    var $resetexport;                          //  variable resetexport
    var $resetexportbywebsiteid;               //  variable resetexportbywebsiteid

    // VARIABLE RESET IMPORT
    
    var $resetscannermonitoring;               //  variable resetscannermonitoring
    var $resetscannermonitoringreserve;        //  variable resetscannermonitoringreserve
    var $resetfilesscannermonitoringreserve;   //  variable resetfilesscannermonitoringreserve

    // VARIABLE RESET INDEX

    var $resetreportindex;                     //  variable resetreportindex
    var $resetreportindexopen;                 //  variable resetreportindexopen
    var $resetmonitoringindex;                 //  variable resetmonitoringindex
    var $resetreportindexdetailopen;           //  variable resetreportindexdetailopen
    
    public function __construct()
    {
        // GET CONSTRUCT PARENT

        parent::__construct();
    }

    // GETTER RESET EXPORT

    public function GetResetExport()
    {
        return $this->resetexport;
    }

    public function GetResetExportByWebsiteId()
    {
        return $this->resetexportbywebsiteid;
    }

    // GETTER RESET IMPORT

    public function GetResetScannerMonitoring()
    {
        return $this->resetscannermonitoring;
    }

    public function GetResetScannerMonitoringReserve()
    {
        return $this->resetscannermonitoringreserve;
    }

    public function GetResetFilesScannerMonitoringReserve()
    {
        return $this->resetfilesscannermonitoringreserve;
    }

    // GETTER RESET INDEX

    public function GetResetReportIndex()
    {
        return $this->resetreportindex;
    }

    public function GetResetReportIndexOpen()
    {
        return $this->resetreportindexopen;
    }

    public function GetResetReportIndexDetailOpen()
    {
        return $this->resetreportindexdetailopen;
    }

    public function GetResetMonitoringIndex()
    {
        return $this->resetmonitoringindex;
    }

    // FUNCTION RESET IMPORT

    public function ResetFilesScannerMonitoringReserve(int $sheets, string $date, array $items)
    {
        $data = array();
        if (!empty($sheets) && !empty($date) && count($items) > 0) 
        {
            for ($sheet=0; $sheet < count($items[$sheets]); $sheet++) 
            { 
                if (is_array($items[$sheets][$sheet])) 
                {
                    $data[] = array_merge($items[$sheets][$sheet], [$date]);
                } 
                else 
                {
                    $data[] = $items[$sheets][$sheet];
                }
            }
            $this->resetfilesscannermonitoringreserve[] = $data;
        }
        return (count($data) > 0) ? $this->resetfilesscannermonitoringreserve : $this->resetfilesscannermonitoringreserve = null;
    }

    public function ResetScannerMonitoring(array $items)
    {
        $key = null;
        $monitoring = $data = array();
        if (count($items) > 0) 
        {
            for ($row=0; $row < count($items); $row++) 
            { 
                if (!is_array($items[$row])) 
                {
                    $key = $items[$row];
                } 
                else 
                {
                    $monitoring[$key][] = $items[$row];
                }
            }
        }
        $data[] = $monitoring;
        return $this->resetscannermonitoring = (count($monitoring) > 0) ? $data : null;
    }

    public function ResetScannerMonitoringReserve(array $items)
    {
        $key = null;
        $data = array();
        if (count($items) > 0) 
        {
            for ($sheet=0; $sheet < count($items); $sheet++) 
            { 
                for ($row=0; $row < count($items[$sheet]); $row++) 
                { 
                    if (!is_array($items[$sheet][$row])) 
                    {
                        $key = $items[$sheet][$row];
                    } 
                    else 
                    {
                        $data[$sheet][$key][] = $items[$sheet][$row];
                    }
                }
            }
        }
        return $this->resetscannermonitoringreserve = $data;
    }

    // FUNCTION RESET EXPORT

    public function ResetExport(array $items)
    {
        $data = array();
        if (count($items) > 0) 
        {
            foreach ($items as $keys => $item) 
            {
                if (count($items[$keys]) > 0) 
                {
                    $rows = array();
                        for ($row=0; $row < count($item); $row++) 
                        { 
                            if (count($item[$row]) > 15) 
                            {
                                $this->Rows([$item[$row][3], ($item[$row][3] === null) ? $item[$row][8] : $item[$row][18], $item[$row][1], 
                                    (count($item[$row]) > 22) ? (($item[$row][3] === null) ? $item[$row][17] : $item[$row][22]) : 'Tidak Update', 
                                    (count($item[$row]) > 22) ? (($item[$row][3] === null) ? $item[$row][18] : $item[$row][23]) : 'Belum Cek Update'
                                ]);
                                $rows[] = $this->GetRows();
                            }
                        }
                    $data[$keys] = $rows;
                }
            }    
        }
        return $this->resetexport = $data;
    }

    public function ResetExportByWebsiteId(array $items)
    {
        $data = array();
        if (count($items) > 0) 
        {
            foreach ($items as $keys => $item) 
            {
                if (count($items[$keys]) > 0) 
                {
                    $rows = array();
                        for ($row=0; $row < count($item); $row++) 
                        { 
                            if (count($item[$row]) > 22) 
                            {
                                $this->Rows([$item[$row][10], ($item[$row][10] === null) ? $item[$row][15] : $item[$row][25], $item[$row][8], $item[$row][1], $item[$row][2]]);
                                $this->SetValuesExportNameOfFiles(($item[$row][10] === null) ? $item[$row][15] : $item[$row][25]);
                                $rows[] = $this->GetRows();
                            }
                        }
                    $data[$keys] = $rows;
                }
            }    
        }
        return $this->resetexportbywebsiteid = $data;
    }

    // FUNCTION RESET INDEX

    public function ResetReportIndex(array $items)
    {
        $rows = array();
        if (count($items) > 0) 
        {
            for ($row=0; $row < count($items); $row++) 
            {
                if (count($items[$row]) > 6) 
                {
                    $this->DateLanguage();
                    $date = $this->DateParse($items[$row][3]);
                    $dateformat = $this->DateFromFormat('!m', $date->month)->format('m');
                    $datelocalized = $this->DateFromTimeStamp(strtotime($date->toDateString()))->formatLocalized('%B');
                    $datedifferentforhumans = 'Terakhir update '.$this->DateParse($date->year.'-'.$date->month)->diffForHumans($this->DateNow()).'nya';
                    $this->Rows([$date->year, $date->month, $dateformat, $datelocalized.' '.$date->year, $datedifferentforhumans]);
                }
                $rows[] = $this->GetRows();
            }
        }
        return $this->resetreportindex = $rows;
    }

    public function ResetReportIndexOpen(array $items)
    {
        $rows = array();
        if (count($items) > 0) 
        {
            for ($row=0; $row < count($items); $row++) 
            {
                if (count($items[$row]) > 6) 
                {
                    $this->DateLanguage();
                    $date = $items[$row][3];
                    $dateformat = $this->DateParse($items[$row][3])->format('Y-m');
                    $dateformatlocalized = $this->DateFromTimeStamp(strtotime($this->DateParse($items[$row][3])->toDateString()))->formatLocalized('%d %B %Y');
                    $datetimestampdifferentforhumans = 'Terakhir update '.$this->DateFromTimeStamp(strtotime($this->DateParse($items[$row][3])->toDateString()))->diffForHumans();
                    $this->Rows([$date, $dateformat, $dateformatlocalized, $datetimestampdifferentforhumans]);
                }
                $rows[] = $this->GetRows();
            }
        }
        return $this->resetreportindexopen = $rows;
    }

    public function ResetReportIndexDetailOpen(array $items)
    {
        $rows = array();
        if (count($items) > 0) 
        {
            for ($row=0; $row < count($items); $row++) 
            { 
                if (count($items[$row]) > 21) 
                {
                    $this->DateLanguage();
                    $this->Rows([$items[$row][0], $items[$row][1], $items[$row][2], $items[$row][3], $items[$row][7], $items[$row][8], 
                        ($items[$row][10] === null) ? $items[$row][15] : $items[$row][21], ($items[$row][10] === null) ? $items[$row][20] : $items[$row][25], 
                        $this->DateFromTimeStamp(strtotime($this->DateParse($items[$row][3])->toDateString()))->formatLocalized('%d %B %Y')
                    ]);
                    $rows[] = $this->GetRows();
                }
            }
        }
        return $this->resetreportindexdetailopen = $rows;
    }

    public function ResetMonitoringIndex(array $items)
    {
        $rows = array();
        if (count($items) > 0) 
        {
            for ($row=0; $row < count($items); $row++) 
            { 
                if (count($items[$row]) > 15) 
                {
                    $this->DateLanguage();
                    $this->Rows([$items[$row][0], $items[$row][1], $items[$row][3], $items[$row][6], ($items[$row][3] === null) ? $items[$row][6] : $items[$row][12], 
                        ($items[$row][3] === null) ? $items[$row][7] : $items[$row][7].'.'.$items[$row][13], ($items[$row][3] === null) ? $items[$row][8] : $items[$row][14], 
                        (count($items[$row]) > 22) ? (($items[$row][3] === null) ? $items[$row][17] : $items[$row][22]) : 'Tidak Update', 
                        (count($items[$row]) > 22) ? (($items[$row][3] === null) ? $items[$row][18] : $items[$row][23]) : 'Belum Cek Update', 
                        ($items[$row][3] === null) ? $items[$row][12] : $items[$row][17], ($items[$row][3] === null) ? $items[$row][13] : $items[$row][18], 
                        (count($items[$row]) > 22) ? $this->DateFromTimeStamp(strtotime($this->DateParse(($items[$row][3] === null) ? $items[$row][19]: 
                        $items[$row][24])->toDateString()))->formatLocalized('%d %B %Y') : 'Belum Cek Update'
                    ]);
                    $rows[] = $this->GetRows();
                }
            }
        }
        return $this->resetmonitoringindex = $rows;
    }
}
?>