<?php

namespace App\Setup;

class Process extends Reset
{   
    // VARIABLE CHANGE DATE

    var $changedatenow;                 //  data value changedatenow

    // VARIABLE FIND

    var $authenticatefind;              //  data value authenticatefind

    // VARIABLE OPTION

    var $reportoption;                  //  data value reportoption
    var $valuesreportoption;            //  data value valuesreportoption

    // VARIABLE VALUE INDEX

    var $userindex;                     //  data value userindex
    var $agencyindex;                   //  data value agencyindex
    var $upreportindex;                 //  data value upreportindex
    var $signatureindex;                //  data value signatureindex
    var $sidereportindex;               //  data value sidereportindex
    var $monitoringindex;               //  data value monitoringindex
    var $upreportindexopen;             //  data value upreportindexopen
    var $sidereportindexopen;           //  data value sidereportindexopen
    var $reportindexdetailopen;         //  data value reportindexdetailopen

    // VARIABLE IMPORT

    var $filesrowimport;                //  data value filesrowimport
    var $filessheetexcel;               //  data value filessheetexcel
    var $filesreaderexcel;              //  data value filesreaderexcel
    var $filescolumnimport;             //  data value filescolumnimport
    var $filesrowlowimport;             //  data value filesrowlowimport
    var $filesscannersignature;         //  data value filesscannersignature
    var $filesrowimportreserve;         //  data value filesrowimportreserve
    var $filesscannermonitoring;        //  data value filesscannermonitoring
    var $filescellbycolumnandrow;       //  data value filescellbycolumnandrow
    var $filescolumnimportreserve;      //  data value filescolumnimportreserve
    var $filesrowlowimportreserve;      //  data value filesrowlowimportreserve
    var $filesscannersignaturereserve;  //  data value filesscannersignaturereserve
    var $filesscannermonitoringreserve; //  data value filesscannermonitoringreserve
    
    // VARIABLE EXPORT

    var $export;                        //  data value export
    var $valuesexport;                  //  data value valuesexport
    var $valuesexportbymonth;           //  data value valuesexportbymonth
    var $valuesnameoffileexport;        //  data value valuesnameoffileexport
    var $valuesexportbywebsiteid;       //  data value valuesexportbywebsiteid

    // VARIABLE EXPORT WORD

    var $tableword;                     //  data value tableword
    var $sectionword;                   //  data value sectionword
    var $celltableword;                 //  data value celltableword

    // VARIABLE EXPORT EXCEL

    var $sheettoexcel;                  //  data value sheettoexcel
    var $cellstyletoexcel;              //  data value cellstyletoexcel
    var $rowdimensiontoexcel;           //  data value rowdimensiontoexcel
    var $countbordertabletoexcel;       //  data value countbordertabletoexcel

    public function __construct()
    {
        // GET CONSTRUCT PARENT

        parent::__construct();

        // FUNCTION CHANGE DATE

        $this->DateLanguage();
        $datenow = $this->DateFromTimeStamp(strtotime($this->DateNow()))->formatLocalized('%d %B %Y');
        $this->SetChangeDateNow($datenow);

        // GET ACCESS QUERY

        $query = $this->QueryProcess();

        // FUNCTION AND GETTER FIND

        $this->Find(0, $this->GetValuesAuthenticate()->id(), $query[0], 'false');
        $userfindindex = $this->GetFind();
        $this->Find(0, $this->GetValuesAuthenticate()->id(), $query[0], 'true');
        $userfind = $this->GetFind();

        // FUNCTION AND GETTER ORDER

        $this->OrderBy($query[2], 3, 'desc');
        $reportssorting = $this->GetOrderBy();

        // FUNCTION AND GETTER ORDER

        $this->GroupBy($reportssorting, 4);
        $reportsgroupby = $this->GetGroupBy();

        // FUNCTION AND GETTER STACK

        $this->Stack($query[3], [2, 3], [$query[4], $query[6]], [0, 0]);
        $stackreportoption = $this->GetStack();
        $this->Stack($query[3], [2, 3, 9, 0], [$query[4], $query[6], $query[1], $reportsgroupby], [0, 0, 0, 4]);
        $stackmonitoring = $this->GetStack();
        
        // FUNCTION AND GETTER OPTION

        $this->ReportOption($stackreportoption);
        $reportoption = $this->GetReportOption();

        // FUNCTION AND GETTER RESET

        $this->ResetReportIndex($query[2]);
        $resetreportindex = $this->GetResetReportIndex();
        $this->ResetReportIndexOpen($query[2]);
        $resetreportindexopen = $this->GetResetReportIndexOpen();
        $this->ResetMonitoringIndex($stackmonitoring);
        $resetmonitoringindex = $this->GetResetMonitoringIndex();

        // FUNCTION AND GETTER DISTINCT

        $this->Distinct($resetreportindex);
        $distinctreport = $this->GetDistinct();
        $this->Distinct($resetreportindexopen);
        $distinctreportopen = $this->GetDistinct();

        // FUNCTION AND GETTER INDEX VALUES

        $this->AgencyIndex($query[1]);
        $processagencyindex = $this->GetAgencyIndex();
        $this->UserIndex($userfindindex);
        $processuserindex = $this->GetUserIndex();
        $this->SignatureIndex($query[5]);
        $processsignatureindex = $this->GetSignatureIndex();
        $this->ReportIndex(1, $distinctreport);
        $processsidereportindex = $this->GetReportIndex();
        $this->ReportIndex(2, $distinctreport);
        $processupreportindex = $this->GetReportIndex();
        $this->MonitoringIndex($resetmonitoringindex);
        $processmonitoringindex = $this->GetMonitoringIndex();

        // SETTER FIND VALUES

        $this->SetValuesAuthenticateFind($userfind);

        // SETTER VALUES OPTION

        $this->SetValuesReportOption($reportoption);

        // SETTER INDEX VALUES

        $this->SetValuesUserIndex($processuserindex);
        $this->SetValuesAgencyIndex($processagencyindex);
        $this->SetValuesUpReportIndex($processupreportindex);
        $this->SetValuesSignatureIndex($processsignatureindex);
        $this->SetValuesSideReportIndex($processsidereportindex);
        $this->SetValuesMonitoringIndex($processmonitoringindex);
    }

    // SETTER AND GETTER VALUE INDEX

    public function SetValuesUserIndex(array $values)
    {
        return $this->userindex = $values;
    }

    public function GetValuesUserIndex()
    {
        return $this->userindex;
    }

    public function SetValuesAgencyIndex(array $values)
    {
        return $this->agencyindex = $values;
    }

    public function GetValuesAgencyIndex()
    {
        return $this->agencyindex;
    }

    public function SetValuesSideReportIndex(array $values)
    {
        return $this->sidereportindex = $values;
    }

    public function GetValuesSideReportIndex()
    {
        return $this->sidereportindex;
    }

    public function SetValuesUpReportIndex(array $values)
    {
        return $this->upreportindex = $values;
    }

    public function GetValuesUpReportIndex()
    {
        return $this->upreportindex;
    }

    public function SetValuesSideReportIndexOpen(array $values)
    {
        return $this->sidereportindexopen = $values;
    }

    public function GetValuesSideReportIndexOpen()
    {
        return $this->sidereportindexopen;
    }

    public function SetValuesUpReportIndexOpen(array $values)
    {
        return $this->upreportindexopen = $values;
    }

    public function GetValuesUpReportIndexOpen()
    {
        return $this->upreportindexopen;
    }

    public function SetValuesReportIndexDetailOpen(array $values)
    {
        return $this->reportindexdetailopen = $values;
    }

    public function GetValuesReportIndexDetailOpen()
    {
        return $this->reportindexdetailopen;
    }

    public function SetValuesSignatureIndex(array $values)
    {
        return $this->signatureindex = $values;
    }

    public function GetValuesSignatureIndex()
    {
        return $this->signatureindex;
    }

    public function SetValuesMonitoringIndex(array $values)
    {
        return $this->monitoringindex = $values;
    }

    public function GetValuesMonitoringIndex()
    {
        return $this->monitoringindex;
    }

    // SETTER AND GETTER VALUE EXPORT

    public function SetValuesExport(array $values)
    {
        return $this->valuesexport = $values;
    }

    public function GetValuesExport()
    {
        return $this->valuesexport;
    }

    public function SetValuesExportByMonth(array $values)
    {
        return $this->valuesexportbymonth = $values;
    }

    public function GetValuesExportByMonth()
    {
        return $this->valuesexportbymonth;
    }

    public function SetValuesExportByWebsiteId(array $values)
    {
        return $this->valuesexportbywebsiteid = $values;
    }

    public function GetValuesExportByWebsiteId()
    {
        return $this->valuesexportbywebsiteid;
    }

    public function SetValuesExportNameOfFiles(string $name)
    {
        return $this->valuesnameoffileexport = $name;
    }

    public function GetValuesExportNameOfFiles()
    {
        return $this->valuesnameoffileexport;
    }

    // SETTER AND GETTER VALUE OPTION

    public function SetValuesReportOption(array $values)
    {
        return $this->valuesreportoption = $values;
    }

    public function GetValuesReportOption()
    {
        return $this->valuesreportoption;
    }

    // SETTER AND GETTER VALUE FIND

    public function SetValuesAuthenticateFind(array $values)
    {
        return $this->authenticatefind = $values;
    }

    public function GetValuesAuthenticateFind()
    {
        return $this->authenticatefind;
    }

    // FUNCTION AND GETTER CHANGE DATE

    public function SetChangeDateNow(string $date)
    {
        return $this->changedatenow = $date;
    }

    public function GetChangeDateNow()
    {
        return $this->changedatenow;
    }

    // FUNCTION PAGE FOOTER

    public function LoggedStatus()
    {
        return response()->json($this->GetValuesAuthenticate()->guest());
    }

    // FUNCTION PAGE FOOTER

    public function LabelFooter()
    {
        return response()->json($this->DateNow()->year);
    }

    // FUNCTION AND GETTER OPTION
    
    public function ReportOption(array $items)
    {
        $rows = array();
        if (count($items) > 0) 
        {
            for ($row=0; $row < count($items); $row++) 
            { 
                if (count($items[$row]) > 11) 
                {
                    if ($items[$row][3] === null) 
                    {
                        $this->Rows([$items[$row][0], $items[$row][8]]);
                    } 
                    else 
                    {
                        $this->Rows([$items[$row][0], $items[$row][14]]);
                    }
                }
                $rows[] = $this->GetRows();
            }
        }
        return $this->reportoption = $rows;
    } 

    public function GetReportOption()
    {
        return $this->reportoption;
    }

    // FUNCTION AND GETTER IMPORT

    public function FilesReaderExcel($spreadsheet)
    {
        return $this->filesreaderexcel = $spreadsheet;
    }

    public function GetFilesReaderExcel()
    {
        return $this->filesreaderexcel;
    }

    public function GetFilesReaderSheetCount()
    {
        return $this->GetFilesReaderExcel()->getSheetCount();
    }

    public function FilesSheetExcel(int $sheet)
    {
        return $this->filessheetexcel = $this->GetFilesReaderExcel()->getSheet($sheet);
    }

    public function GetFilesSheetExcel()
    {
        return $this->filessheetexcel;
    }

    public function GetFilesHighestRow()
    {
        return $this->GetFilesSheetExcel()->getHighestRow();
    }

    public function GetFilesHighestColumn()
    {
        return $this->GetFilesSheetExcel()->getHighestColumn();
    }

    public function GetFilesSheetTitle()
    {
        return $this->GetFilesSheetExcel()->getTitle();
    }

    public function FilesCellByColumnAndRow(int $column, int $row)
    {
        return $this->filescellbycolumnandrow = $this->GetFilesSheetExcel()->getCellByColumnAndRow($column, $row);
    }

    public function GetFilesCellByColumnAndRow()
    {
        return $this->filescellbycolumnandrow;
    }

    public function GetFilesValueCellByColumnAndRow()
    {
        return $this->GetFilesCellByColumnAndRow()->getValue();
    }

    public function GetFilesBordersStyle()
    {
        return $this->GetFilesCellByColumnAndRow()->getStyle()->getBorders()->getBottom()->getBorderStyle();
    }

    public function GetFilesIsMergeRange()
    {
        return $this->GetFilesCellByColumnAndRow()->isInMergeRange();
    }

    public function GetFilesIsMergeRangeValue()
    {
        return $this->GetFilesCellByColumnAndRow()->isMergeRangeValueCell();
    }

    public function FilesScannerSignature(array $rows, array $columns)
    {
        $signature = null;
        $signatures = $data = array();
        if (count($rows) > 0 && count($columns) > 0) 
        {
            for ($row = 0; $row < count($rows); $row++)
            {
                for ($column = 0; $column < count($columns); $column++) 
                { 
                    $this->FilesCellByColumnAndRow($columns[$column], $rows[$row]);
                    $checkborder = $this->GetFilesBordersStyle();
                    $cellvalue = $this->GetFilesValueCellByColumnAndRow();
                    if (!empty($checkborder)) 
                    {
                        if ($checkborder == 'none') 
                        {
                            if (!$cellvalue == null) 
                            {
                            $signature = (strpos(strtolower($cellvalue), 'samarinda') !== false) ? null : $cellvalue;
                                if ($signature != null) 
                                {
                                    $signatures[$columns[$column]][] = $signature;
                                }
                            }
                        }
                    }
                }
            }
        } 
        $data[] = array_values($signatures);
        return $this->filesscannersignature = (count($signatures) > 0) ? $data : null;
    }

    public function GetFilesScannerSignature()
    {
        return $this->filesscannersignature;
    }

    public function FilesScannerSignatureReserve(int $sheet, array $rows, array $columns)
    {
        $signature = null;
        $signatures = array();
        if (is_integer($sheet) && count($rows) > 0 && count($columns) > 0) 
        {
            for ($row = 0; $row < count($rows[$sheet]); $row++)
            {
                for ($column = 0; $column < count($columns[$sheet]); $column++) 
                { 
                    $this->FilesCellByColumnAndRow($columns[$sheet][$column], $rows[$sheet][$row]);
                    $checkborder = $this->GetFilesBordersStyle();
                    $cellvalue = $this->GetFilesValueCellByColumnAndRow();
                    if (!empty($checkborder)) 
                    {
                        if ($checkborder == 'none') 
                        {
                            if (!$cellvalue == null) 
                            {
                                $signature = (strpos(strtolower($cellvalue), 'samarinda') !== false) ? null : $cellvalue;
                                if ($signature != null) 
                                {
                                    $signatures[$columns[$sheet][$column]][] = $signature;
                                }
                            }
                        }
                    }
                }
            }
            $this->filesscannersignaturereserve[] = array_values($signatures);
        } 
        return (count($signatures) > 0) ? $this->filesscannersignaturereserve : $this->filesscannersignaturereserve = null;
    }

    public function GetFilesScannerSignatureReserve()
    {
        return $this->filesscannersignaturereserve;
    }

    public function FilesScannerMonitoring(array $rows, array $columns)
    {
        $data = array();
        if (count($rows) > 0 && count($columns) > 0) 
        {
            for ($row = 0; $row < count($rows); $row++)
            {
                for ($column = 0; $column < count($columns); $column++) 
                { 
                    $this->FilesCellByColumnAndRow($columns[$column], $rows[$row]);
                    $checkborder = $this->GetFilesBordersStyle();
                    $cellvalue = $this->GetFilesValueCellByColumnAndRow();
                    if (!empty($checkborder)) 
                    {
                        if ($checkborder == 'thin') 
                        {
                            if ($this->GetFilesIsMergeRange() || $this->GetFilesIsMergeRangeValue()) 
                            {
                                if (!$cellvalue == null) 
                                {
                                    $data[$row] = $cellvalue;
                                }
                            } 
                            else 
                            {
                                $data[$row][$column] = $cellvalue;
                            }
                        }
                    }
                }
            }
        } 
        return $this->filesscannermonitoring = (count($data) > 0) ? $data : null;
    }

    public function GetFilesScannerMonitoring()
    {
        return $this->filesscannermonitoring;
    }

    public function FilesScannerMonitoringReserve(int $sheet, array $rows, array $columns)
    {
        $data = array();
        if (is_integer($sheet) && count($rows) > 0 && count($columns) > 0) 
        {
            for ($row = 0; $row < count($rows[$sheet]); $row++)
            {
                for ($column = 0; $column < count($columns[$sheet]); $column++) 
                { 
                    $this->FilesCellByColumnAndRow($columns[$sheet][$column], $rows[$sheet][$row]);
                    $checkborder = $this->GetFilesBordersStyle();
                    $cellvalue = $this->GetFilesValueCellByColumnAndRow();
                    if (!empty($checkborder)) 
                    {
                        if ($checkborder == 'thin') 
                        {
                            if ($this->GetFilesIsMergeRange() || $this->GetFilesIsMergeRangeValue()) 
                            {
                                if (!$cellvalue == null) 
                                {
                                    $data[$row] = $cellvalue;
                                }
                            } 
                            else 
                            {
                                $data[$row][$column] = $cellvalue;
                            }
                        }
                    }
                }
            }
        } 
        return $this->filesscannermonitoringreserve[] = $data;
    }

    public function GetFilesScannerMonitoringReserve()
    {
        return $this->filesscannermonitoringreserve;
    }

    public function FilesColumnScanner(int $highcolumn, int $highrow)
    {
        if (is_integer($highcolumn) && is_integer($highrow)) 
        {
            for ($row = 1; $row <= $highrow; $row++)
            {
                for ($column = 0; $column < $highcolumn; $column++) 
                { 
                    $this->FilesCellByColumnAndRow($column, $row);
                    $cellvalue = $this->GetFilesValueCellByColumnAndRow();
                    if (is_string($cellvalue)) 
                    {
                        switch (strtoupper($cellvalue)) 
                        {
                            case 'NO':
                                $this->filescolumnimport[] = $column;
                            break;
                            case 'URAIAN':
                                $this->filescolumnimport[] = $column;
                            break;
                            case 'ALAMAT WEBSITE':
                                $this->filescolumnimport[] = $column;
                            break;
                            case 'UPDATE/TIDAK UPDATE':
                                $this->filescolumnimport[] = $column;
                            break;
                            case 'KETERANGAN':
                                $this->filescolumnimport[] = $column;
                            break;
                            default:
                            break;
                        }
                    }
                }
            }
        }
        return $this->filescolumnimport;
    }

    public function GetFilesColumnScanner()
    {
        return $this->filescolumnimport;
    }

    public function FilesColumnScannerReserve(int $highcolumn, int $highrow)
    {
        $data = array();
        if (is_integer($highcolumn) && is_integer($highrow)) 
        {
            for ($row = 1; $row <= $highrow; $row++)
            {
                for ($column = 0; $column < $highcolumn; $column++) 
                { 
                    $this->FilesCellByColumnAndRow($column, $row);
                    $cellvalue = $this->GetFilesValueCellByColumnAndRow();
                    if (is_string($cellvalue)) 
                    {
                        switch (strtoupper($cellvalue)) 
                        {
                            case 'NO':
                                $data[] = $column;
                            break;
                            case 'URAIAN':
                                $data[] = $column;
                            break;
                            case 'ALAMAT WEBSITE':
                                $data[] = $column;
                            break;
                            case 'UPDATE/TIDAK UPDATE':
                                $data[] = $column;
                            break;
                            case 'KETERANGAN':
                                $data[] = $column;
                            break;
                            default:
                            break;
                        }
                    }
                }
            }
        }
        return $this->filescolumnimportreserve[] = $data;
    }

    public function GetFilesColumnScannerReserve()
    {
        return $this->filescolumnimportreserve;
    }

    public function FilesRowScanner(int $highrow, int $lowrow)
    {
        $rows = array();
        if (is_integer($highrow) && is_integer($lowrow)) 
        {
            for ($row = 1; $row <= $highrow; $row++)
            {
                if ($row > $lowrow) 
                {
                    $rows[] = $row;
                }
            }
        }
        return $this->filesrowimport = (count($rows) > 0) ? $rows : null;
    }

    public function GetFilesRowScanner()
    {
        return $this->filesrowimport;
    }

    public function FilesRowScannerReserve(int $sheet, int $highrow, array $lowrow)
    {
        $rows = array();
        if (is_integer($sheet) && is_integer($highrow) && count($lowrow) > 0) 
        {
            for ($row = 1; $row <= $highrow; $row++)
            {
                if ($row > $lowrow[$sheet]) 
                {
                    $rows[] = $row;
                }
            }
        }
        return $this->filesrowimportreserve[] = $rows;
    }

    public function GetFilesRowScannerReserve()
    {
        return $this->filesrowimportreserve;
    }

    public function FilesRowLowScanner(int $highcolumn, int $highrow)
    {
        $data = 0;
        if (is_integer($highcolumn) && is_integer($highrow)) 
        {
            for ($row = 1; $row <= $highrow; $row++)
            {
                for ($column = 0; $column < $highcolumn; $column++) 
                { 
                    $this->FilesCellByColumnAndRow($column, $row);
                    $cellvalue = $this->GetFilesValueCellByColumnAndRow();
                    if (is_string($cellvalue))
                    {
                        if (strtoupper($cellvalue) === 'NO' || strtoupper($cellvalue) === 'URAIAN' || strtoupper($cellvalue) === 'ALAMAT WEBSITE' || strtoupper($cellvalue) === 'UPDATE/TIDAK UPDATE' || strtoupper($cellvalue) === 'KETERANGAN')
                        { 
                            $data = $row; 
                        }
                    }
                }
            }
        }
        return $this->filesrowlowimport = ($data > 0) ? $data : null;
    }

    public function GetFilesRowLowScanner()
    {
        return $this->filesrowlowimport;
    }

    public function FilesRowLowScannerReserve(int $highcolumn, int $highrow)
    {
        $data = 0;
        if (is_integer($highcolumn) && is_integer($highrow)) 
        {
            for ($row = 1; $row <= $highrow; $row++)
            {
                for ($column = 0; $column < $highcolumn; $column++) 
                { 
                    $this->FilesCellByColumnAndRow($column, $row);
                    $cellvalue = $this->GetFilesValueCellByColumnAndRow();
                    if (is_string($cellvalue))
                    {
                        if (strtoupper($cellvalue) === 'NO' || strtoupper($cellvalue) === 'URAIAN' || strtoupper($cellvalue) === 'ALAMAT WEBSITE' || strtoupper($cellvalue) === 'UPDATE/TIDAK UPDATE' || strtoupper($cellvalue) === 'KETERANGAN')
                        { 
                            $data = $row; 
                        }
                    }
                }
            }
            $this->filesrowlowimportreserve[] = $data;
        }
        return ($data > 0) ? $this->filesrowlowimportreserve : $this->filesrowlowimportreserve = null;
    }

    public function GetFilesRowLowScannerReserve()
    {
        return $this->filesrowlowimportreserve;
    }

    public function GetFilesScanner()
    {
        return $this->filesscanner;
    }

    public function GetFilesScannerReserve()
    {
        return $this->filesscannerreserve;
    }

    // FUNCTION AND GETTER PROCESS

    // FUNCTION PROCESS QUERY

    public function QueryProcess()
    {
        $this->Rows([
            $this->GetValuesUser(), 
            $this->GetValuesAgency(), 
            $this->GetValuesReport(), 
            $this->GetValuesWebsite(), 
            $this->GetValuesDivision(), 
            $this->GetValuesSignature(), 
            $this->GetValuesSubdivision()
        ]);
        return $this->GetRows();
    }

    // FUNCTION PROCESS AUTHENTICATES USERS

    public function ProcessGuard($guard = null)
    {
        return $this->GetValuesAuthenticate()->guard($guard);
    }

    // FUNCTION PROCESS REGISTER USER

    public function ProcessRegisterCheckName($request)
    {
        $validator = $this->ValidatorForm($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
        ]);

        return response()->json(($validator->fails()) ? false : true);
    }

    public function ProcessRegisterValidator(array $data)
    {
        $validator = $this->ValidatorForm($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        return $validator;
    }

    public function ProcessRegisterStore(array $data)
    {
        $users = $this->UpdateOrCreateUser(NULL, $data['name'], $data['email'], $data['password']);
        toastr()->success('Pengguna Berhasil Terdaftar', 'Success Message');
        return $users;
    }

    // FUNCTION PROCESS AGENCY

    public function ProcessAgencyIndex()
    {
        $agencies = $this->GetValuesAgencyIndex();
        return response()->json($agencies);
    }

    public function ProcessAgencyStore($request)
    {
        $agencies = $this->UpdateOrCreateAgency($request->agencyid, $request->agencydescription);
        $this->ProgressLoad(1);
        toastr()->success('Data Instansi Berhasil Disimpan', 'Success Message');
        return response()->json($agencies);
    }

    public function ProcessAgencyDelete($id)
    {
        $query = $this->QueryProcess();
        $this->Find(0, $id, $query[1], 'true');
        $agencies = $this->GetFind();
        $this->Find(3, $id, $query[4], 'true');
        $divisions = $this->GetFind();
        if (!empty($id)) 
        {
            $this->DeleteAgency($id);
        } 
        else 
        {
            toastr()->error('Hapus Gagal', 'Error Message');
        }
        if (count($agencies) > 0 || count($divisions) > 0) 
        {
            for ($divisionrows=0; $divisionrows < count($divisions); $divisionrows++) 
            { 
                $this->Find(2, $divisions[$divisionrows][0], $query[3], 'true');
                $websites = $this->GetFind();
                $this->MultiFind([2, 3], ['==', '<>'], [$divisions[$divisionrows][0], null], $query[3]);
                $this->Where(['and'], $this->GetMultiFind());
                $subdivisions = $this->GetWhere();
                if (count($subdivisions) > 0) 
                {
                    for ($subdivisionrows=0; $subdivisionrows < count($subdivisions); $subdivisionrows++) 
                    { 
                        $this->DeleteSubdivision($subdivisions[$subdivisionrows][3]);
                    }
                }
                if (count($websites) > 0) 
                {
                    for ($websiterows=0; $websiterows < count($websites); $websiterows++) 
                    { 
                        $this->Find(4, $websites[$websiterows][0], $query[2], 'true');
                        $reports = $this->GetFind();
                        if (count($reports) > 0) 
                        {
                            for ($reportrows=0; $reportrows < count($reports); $reportrows++) 
                            { 
                                $this->DeleteReport($reports[$reportrows][0]);
                            }
                        }
                    }
                }
                $this->DeleteDivision($divisions[$divisionrows][0]);
            }
        } 
        toastr()->success('Hapus Instansi Berhasil', 'Success Message');
        return redirect()->back();
    }

    // FUNCTION PROCESS USER

    public function ProcessCheckName($request)
    {
        $data = true;
        $query = $this->QueryProcess();
        $this->Find(1, $request->name, $query[0], 'true');
        $getusercheck = $this->GetFind();
        if (count($getusercheck) > 0) 
        {
            for ($row=0; $row < count($getusercheck); $row++) 
            { 
                if ($request->id === strval($getusercheck[$row][0]) && count($getusercheck) > 0) 
                {
                    $data = true;
                } 
                else 
                {
                    $data = false;
                }
            }
        }
        return response()->json($data);
    }

    public function ProcessUserIndex()
    {
        $users = $this->GetValuesUserIndex();
        return response()->json($users);
    }

    public function ProcessUserStore($request)
    {
        $users = $this->UpdateOrCreateUser($request->userid, $request->username, $request->useremail, $request->userpassword);
        $this->ProgressLoad(1);
        toastr()->success('Data Pengguna Berhasil Disimpan', 'Success Message');
        return response()->json($users);
    }

    public function ProcessUsername()
    {
        $username = null;
        $users = $this->GetValuesAuthenticateFind();
        if (count($users) > 0) 
        {
            for ($row=0; $row < count($users); $row++) 
            { 
                $username = $users[$row][1];
            }
        }
        return response()->json($username);
    }

    public function ProcessUserSetting()
    {
        $users = $this->GetValuesAuthenticateFind();
        return response()->json($users);
    }

    public function ProcessUserDelete($id)
    {
        $query = $this->QueryProcess();
        $this->Find(0, $id, $query[0], 'true');
        $checkusers = $this->GetFind();
        if (count($checkusers) > 0) 
        {
            $this->DeleteUser($id);
        } 
        else 
        {
            toastr()->error('Hapus Gagal', 'Error Message');
        }
        toastr()->success('Hapus Pengguna Berhasil', 'Success Message');
        return redirect()->back();
    }

    // FUNCTION PROCESS SIGNATURE

    public function ProcessSignatureCheckNumber($request)
    {
        $data = true;
        $query = $this->QueryProcess();
        $this->Find(1, $request->number, $query[5], 'true');
        $getsignaturecheck = $this->GetFind();
        if (count($getsignaturecheck) > 0) 
        {
            for ($row=0; $row < count($getsignaturecheck); $row++) 
            { 
                if ($request->id === strval($getsignaturecheck[$row][0]) && count($getsignaturecheck) > 0) 
                {
                    $data = true;
                } 
                else 
                {
                    $data = false;
                }
            }
        }
        return response()->json($data);
    }

    public function ProcessSignatureIndex()
    {
        $signatures = $this->GetValuesSignatureIndex();
        return response()->json($signatures);
    }

    public function ProcessSignatureStore($request)
    {
        $signatures = $this->UpdateOrCreateSignature($request->signatureid, $request->signaturenumber, $request->signatureemployeeidnumber, $request->signaturename, $request->signatureposition);
        $this->ProgressLoad(1);
        toastr()->success('Data Tanda Tangan Berhasil Disimpan', 'Success Message');
        return response()->json($signatures);
    }

    public function ProcessSignatureDelete($id)
    {
        if (!empty($id)) 
        {
            $this->DeleteSignature($id);
        } 
        else 
        {
            toastr()->error('Hapus Gagal', 'Error Message');
        }
        toastr()->success('Hapus Tanda Tangan Berhasil', 'Success Message');
        return redirect()->back();
    }

    // FUNCTION PROCESS REPORT

    public function ProcessReportIndexDetailOpen($getreportdate)
    {
        $query = $this->QueryProcess();
        $this->Find(3, $getreportdate, $query[2], 'true');
        $find = $this->GetFind();
        $this->Stack($find, [4, 9, 10, 16], [$query[3], $query[4], $query[6], $query[1]], [0, 0, 0, 0]);
        $stack = $this->GetStack();
        $this->ResetReportIndexDetailOpen($stack);
        $processindex = $this->GetResetReportIndexDetailOpen();
        $this->ReportIndexDetailOpen($processindex);
        $index = $this->GetReportIndexDetailOpen();
        $this->SetValuesReportIndexDetailOpen($index);
        $reports = $this->GetValuesReportIndexDetailOpen();
        return response()->json($reports);
    }

    public function ProcessReportGetOption()
    {
        $option = $this->GetValuesReportOption();
        return response()->json($option);
    }

    public function ProcessReportStore($request)
    {
        $reports = $this->UpdateOrCreateReport($request->reportid, $request->reportstatus, $request->reportinformation, $request->reportdateupdate, $request->reportwebsitesid);
        $this->ProgressLoad(1);
        toastr()->success('Data Laporan Berhasil Disimpan', 'Success Message');
        return response()->json($reports);
    }

    public function ProcessReportStoreDateUpdate($request)
    {
        $reports = null;
        $query = $this->QueryProcess();
        $this->Stack($query[3], [0], [$query[2]], [4]);
        $stack = $this->GetStack();
        if (count($query[2]) > 0 && count($query[3]) > 0) 
        {
            for ($row=0; $row < count($stack); $row++) 
            { 
                $rowstack = $stack[$row];
                if (count($rowstack) > 12) 
                {
                    $this->Rows([$rowstack]);
                    $this->Find(10, $rowstack[10], $this->GetRows(), 'true');
                    $findreport = $this->GetFind();
                    $this->MultiFind([9, 10], ['==', '=='], [$request->checkdateupdate, $rowstack[10]], $this->GetRows());
                    $this->Where(['and'], $this->GetMultiFind());
                    $wherereport = $this->GetWhere();
                    if (count($findreport) > 0 && empty($wherereport)) 
                    {
                        $reports = $this->UpdateOrCreateReport(NULL, $rowstack[7], $rowstack[8], $request->checkdateupdate, $rowstack[10]);
                    } 
                    else 
                    {
                        toastr()->error('Update Tanggal Gagal', 'Error Message');
                    }
                }
            }
        } 
        else 
        {
            toastr()->error('Update Tanggal Gagal', 'Error Message');
        }
        toastr()->success('Update Tanggal Berhasil', 'Success Message');
        return response()->json($reports);
    }

    public function ProcessReportStoreByMonthAndYear($request)
    {
        $index = 0;
        $reports = null;
        $query = $this->QueryProcess();
        $this->Find(3, $request->reportbymonthandyear, $query[2], 'like');
        $findreport = $this->GetFind();
        if (count($findreport) > 0) 
        {
            for ($row=0; $row < count($findreport); $row++) 
            { 
                $reports = $this->UpdateOrCreateReport($findreport[$row][0], $findreport[$row][1], $findreport[$row][2], $request->reportbyyear.'-'.$request->reportbymonth.'-'.$this->DateParse($findreport[$row][3])->format('d'), $findreport[$row][4]);
                // $reports = $this->UpdateOrCreateReport($findreport[$row][0], $findreport[$row][1], $findreport[$row][2], $request->monthandyear.'-'.$this->DateParse($findreport[$row][3])->format('d'), $findreport[$row][4]);
                $this->ProgressLoad($index++);
            }
        }
        toastr()->success('Data Laporan Berhasil Disimpan', 'Success Message');
        return response()->json($reports);
    }

    public function ProcessReportStoreByDate($request)
    {
        $index = 0;
        $reports = null;
        $query = $this->QueryProcess();
        $this->Find(3, $request->reportbydateupdate, $query[2], 'true');
        $findreport = $this->GetFind();
        if (count($findreport) > 0) 
        {
            for ($row=0; $row < count($findreport); $row++) 
            { 
                $reports = $this->UpdateOrCreateReport($findreport[$row][0], $findreport[$row][1], $findreport[$row][2], $request->reportbydatedateupdate, $findreport[$row][4]);
                $this->ProgressLoad($index++);
            }    
        }
        toastr()->success('Data Laporan Berhasil Disimpan', 'Success Message');
        return response()->json($reports);
    }

    public function ProcessReportDelete($id)
    {
        if (!empty($id)) 
        {
            $this->DeleteReport($id);
        } 
        else 
        {
            toastr()->error('Hapus Gagal', 'Error Message');
        }
        toastr()->success('Hapus Laporan Berhasil', 'Success Message');
        return redirect()->back();
    }

    public function ProcessReportDeleteByMonthAndYear($monthandyear)
    {
        $query = $this->QueryProcess();
        $this->Find(3, $monthandyear, $query[2], 'like');
        $reports = $this->GetFind();
        if (!empty($reports)) 
        {
            for ($row=0; $row < count($reports); $row++) 
            { 
                $this->DeleteReport($reports[$row][0]);
            }
        } 
        else 
        {
            toastr()->error('Hapus Gagal', 'Error Message');
        }
        toastr()->success('Hapus Laporan Berhasil', 'Success Message');
        return redirect()->back();
    }

    public function ProcessReportDeleteByDate($date)
    {
        $query = $this->QueryProcess();
        $this->Find(3, $date, $query[2], 'true');
        $reports = $this->GetFind();
        if (!empty($reports)) 
        {
            for ($row=0; $row < count($reports); $row++) 
            { 
                $this->DeleteReport($reports[$row][0]);
            }
        } 
        else 
        {
            toastr()->error('Hapus Gagal', 'Error Message');
        }
        toastr()->success('Hapus Laporan Berhasil', 'Success Message');
        return redirect()->back();
    }

    // FUNCTION PROCESS MONITORING

    public function ProcessMonitoringCheck($date)
    {
        $query = $this->QueryProcess();
        $this->Find(3, $date, $query[2], 'true');
        $reports = $this->GetFind();
        return response()->json((count($query[3]) === count($reports)) ? 'success' : 'failed');
    }

    public function ProcessMonitoringIndex()
    {
        $monitorings = $this->GetValuesMonitoringIndex();
        return response()->json($monitorings);
    }

    public function ProcessMonitoringGetOption()
    {
        $query = $this->QueryProcess();
        $this->Distinct($query[1]);
        $option = $this->GetDistinct();
        return response()->json($option);
    }

    public function ProcessMonitoringButtonCheckDisabled()
    {
        $query = $this->QueryProcess();
        return response()->json((count($query[1]) > 0) ? 'failed' : 'success');
    }

    public function ProcessMonitoringStore($request)
    {
        $divisions = $this->UpdateOrCreateDivision($request->divisionid, $request->divisionnumber, $request->divisiondescription, $request->divisionagenciesid);
        $websites = $this->UpdateOrCreateWebsite($request->websitesiddivision, $request->divisionlinkwebsite, $divisions->id, NULL);
        $this->ProgressLoad(1);
        toastr()->success('Data Monitoring Berhasil Disimpan', 'Success Message');
        return response()->json($divisions);
    }

    public function ProcessMonitoringStoreSub($request)
    {
        $subdivisions = $this->UpdateOrCreateSubdivision($request->subdivisionsubid, $request->subdivisionnumber, $request->subdivisiondescription);
        $websites = $this->UpdateOrCreateWebsite($request->websitesidsubdivision, $request->subdivisionlinkwebsite, $request->subdivisionid, $subdivisions->id);
        $this->ProgressLoad(1);
        toastr()->success('Data Sub Monitoring Berhasil Disimpan', 'Success Message');
        return response()->json($subdivisions);
    }

    public function ProcessMonitoringDeleteDivision($id)
    {
        $query = $this->QueryProcess();
        $this->Find(0, $id, $query[3], 'true');
        $websites = $this->GetFind();
        $this->Find(4, $id, $query[2], 'true');
        $reports = $this->GetFind();
        if (!empty($id)) 
        {
            $this->DeleteWebsite($id);
        } 
        else 
        {
            toastr()->error('Hapus Gagal', 'Error Message');
        }
        if (count($websites) > 0) 
        {
            for ($websiterows=0; $websiterows < count($websites); $websiterows++) 
            { 
                $this->Find(0, $websites[$websiterows][2], $query[4], 'true');
                $divisions = $this->GetFind();
                if (count($divisions) > 0) 
                {
                    for ($divisionrows=0; $divisionrows < count($divisions); $divisionrows++) 
                    { 
                        $this->DeleteDivision($divisions[$divisionrows][0]);
                    }
                }
            }
        } 
        if (count($reports) > 0) 
        {
            for ($reportrows=0; $reportrows < count($reports); $reportrows++) 
            { 
                $this->DeleteReport($reports[$reportrows][0]);
            }
        }
        toastr()->success('Hapus Monitoring Berhasil', 'Success Message');
        return redirect()->back();
    }

    public function ProcessMonitoringDeleteSubdivision($id)
    {
        $query = $this->QueryProcess();
        $this->Find(0, $id, $query[3], 'true');
        $websites = $this->GetFind();
        $this->Find(4, $id, $query[2], 'true');
        $reports = $this->GetFind();
        if (!empty($id)) 
        {
            $this->DeleteWebsite($id);
        } 
        else 
        {
            toastr()->error('Hapus Gagal', 'Error Message');
        }
        if (count($websites) > 0) 
        {
            for ($websiterows=0; $websiterows < count($websites); $websiterows++) 
            { 
                $this->Find(0, $websites[$websiterows][3], $query[6], 'true');
                $subdivisions = $this->GetFind();
                if (count($subdivisions) > 0) 
                {
                    for ($subdivisionrows=0; $subdivisionrows < count($subdivisions); $subdivisionrows++) 
                    { 
                        $this->DeleteSubdivision($subdivisions[$subdivisionrows][0]);
                    }
                }
            }
        }
        if (count($reports) > 0) 
        {
            for ($reportrows=0; $reportrows < count($reports); $reportrows++) 
            { 
                $this->DeleteReport($reports[$reportrows][0]);
            }
        }        
        toastr()->success('Hapus Monitoring Berhasil', 'Success Message');
        return redirect()->back();
    }

    // FUNCTION PROCESS SIDE

    public function ProcessReportSideIndex()
    {
        $reports = $this->GetValuesSideReportIndex();
        return response()->json($reports);
    }

    public function ProcessReportSideIndexOpen($getreportmonth)
    {
        $report = $this->GetResetReportIndexOpen();
        $this->Find(1, $getreportmonth, $report, 'like');
        $find = $this->GetFind();
        $this->OrderBy($find, 3, 'asc');
        $orderby = $this->GetOrderBy();
        $this->GroupBy($orderby, 3);
        $groupby = $this->GetGroupBy();
        $this->ReportIndexOpen(1, $groupby);
        $index = $this->GetReportIndexOpen();
        $this->SetValuesSideReportIndexOpen($index);
        $reports = $this->GetValuesSideReportIndexOpen();
        return response()->json($reports);
    }

    // FUNCTION PROCESS UP

    public function ProcessReportUpIndex()
    {
        $reports = $this->GetValuesUpReportIndex();
        return response()->json($reports);
    }

    public function ProcessReportUpIndexOpen($getreportmonth)
    {
        $report = $this->GetResetReportIndexOpen();
        $this->Find(1, $getreportmonth, $report, 'like');
        $find = $this->GetFind();
        $this->OrderBy($find, 3, 'asc');
        $orderby = $this->GetOrderBy();
        $this->GroupBy($orderby, 3);
        $groupby = $this->GetGroupBy();
        $this->ReportIndexOpen(2, $groupby);
        $index = $this->GetReportIndexOpen();
        $this->SetValuesUpReportIndexOpen($index);
        $reports = $this->GetValuesUpReportIndexOpen();
        return response()->json($reports);
    }

    // FUNCTION PROCESS IMPORT

    public function ProcessImportStoreSignature(array $items, int $index)
    {
        $temporarysignature = array();
        $query = $this->QueryProcess();
        if (count($items) > 0 && is_integer($index)) 
        {
            for ($sheet=0; $sheet < count($items); $sheet++) 
            { 
                for ($row=0; $row < count($items[$sheet]); $row++) 
                { 
                    $number = count($query[5]) + $row + 1;
                    $this->MultiFind([2, 3, 4], ['==', '==', '=='], [$items[$sheet][$row][2], $items[$sheet][$row][1], $items[$sheet][$row][0]], $temporarysignature);
                    $temporarymultifind = $this->GetMultiFind();
                    $this->Where(['and', 'and'], $temporarymultifind);
                    $temporarywhere = $this->GetWhere();
                    $this->MultiFind([2, 3, 4], ['==', '==', '=='], [$items[$sheet][$row][2], $items[$sheet][$row][1], $items[$sheet][$row][0]], $query[5]);
                    $multifind = $this->GetMultiFind();
                    $this->Where(['and', 'and'], $multifind);
                    $where = $this->GetWhere();
                    if (count($where) > 0) 
                    {
                        $signature = $this->UpdateOrCreateSignature($where[0][0], $where[0][1], $items[$sheet][$row][2], $items[$sheet][$row][1], $items[$sheet][$row][0]);
                    } 
                    else 
                    {
                        $signature = (count($temporarywhere) > 0) ? null : $this->UpdateOrCreateSignature(NULL, $number, $items[$sheet][$row][2], $items[$sheet][$row][1], $items[$sheet][$row][0]);
                    }
                    if ($signature != null) 
                    {
                        $this->Rows([$signature->id, $signature->number, $signature->employeeidnumber, $signature->name, $signature->position]);
                    }
                    $temporarysignature[] = $this->GetRows();
                    $this->ProgressLoad($index++);
                }
            }
        }
    }

    public function ProcessImportStoreMonitoring($request = null, array $items, int $index)
    {
        $number = 0;
        $query = $this->QueryProcess();
        $temporaryagency = $temporarydivision = $temporarywebsitesdivision = $temporaryreportdivision = $temporarysubdivision = $temporarywebsitessubdivision = $temporaryreportsubdivision = array();
        if (count($items) > 0 && is_integer($index)) 
        {
            for ($sheet=0; $sheet < count($items); $sheet++) 
            { 
                foreach ($items[$sheet] as $keys => $monitorings) 
                {
                    $this->Find(1, $keys, $temporaryagency, 'true');
                    $temporaryagencyfind = $this->GetFind();
                    $this->Find(1, $keys, $query[1], 'true');
                    $agencyfind = $this->GetFind();
                    if (count($agencyfind) > 0) 
                    {
                        $agency = $this->UpdateOrCreateAgency($agencyfind[0][0], $keys);
                    } 
                    else 
                    {
                        $agency = (count($temporaryagencyfind) > 0) ? null : $this->UpdateOrCreateAgency(NULL, $keys);
                    }
                    if ($agency != null) 
                    {
                        $this->Rows([$agency->id, $agency->description]);
                    }
                    $temporaryagency[] = $this->GetRows();
                        if (count($monitorings) > 0) 
                        {
                            for ($row=0; $row < count($monitorings); $row++) 
                            { 
                                if (!$monitorings[$row][0] == null) 
                                {
                                    $number = 0;
                                    $this->MultiFind([1, 2, 3], ['==', '==', '=='], [$monitorings[$row][0], $monitorings[$row][1], ($agency != null) ? $agency->id : $temporaryagencyfind[0][0]], $temporarydivision);
                                    $temporarydivisionmultifind = $this->GetMultiFind();
                                    $this->Where(['and', 'and'], $temporarydivisionmultifind);
                                    $temporarydivisionwhere = $this->GetWhere();
                                    $this->MultiFind([1, 2, 3], ['==', '==', '=='], [$monitorings[$row][0], $monitorings[$row][1], ($agency != null) ? $agency->id : $temporaryagencyfind[0][0]], $query[4]);
                                    $divisionmultifind = $this->GetMultiFind();
                                    $this->Where(['and', 'and'], $divisionmultifind);
                                    $divisionwhere = $this->GetWhere();
                                    if (count($divisionwhere) > 0) 
                                    {
                                        $division = $this->UpdateOrCreateDivision($divisionwhere[0][0], $monitorings[$row][0], $monitorings[$row][1], ($agency != null) ? $agency->id : $temporaryagencyfind[0][0]);
                                    } 
                                    else 
                                    {
                                        $division = (count($temporarydivisionwhere) > 0) ? null : $this->UpdateOrCreateDivision(NULL, $monitorings[$row][0], $monitorings[$row][1], ($agency != null) ? $agency->id : $temporaryagencyfind[0][0]);
                                    }
                                    if ($division != null) 
                                    {
                                        $this->Rows([$division->id, $division->number, $division->description, $division->agencies_id]);
                                    }
                                    $temporarydivision[] = $this->GetRows();
                                    $this->MultiFind([1, 2, 3], ['==', '==', '=='], [$monitorings[$row][2], ($division != null) ? $division->id : $temporarydivisionwhere[0][0], NULL], $temporarywebsitesdivision);
                                    $temporarywebsitesdivisionmultifind = $this->GetMultiFind();
                                    $this->Where(['and', 'and'], $temporarywebsitesdivisionmultifind);
                                    $temporarywebsitesdivisionwhere = $this->GetWhere();
                                    $this->MultiFind([1, 2, 3], ['==', '==', '=='], [$monitorings[$row][2], ($division != null) ? $division->id : $temporarydivisionwhere[0][0], NULL], $query[3]);
                                    $websitesdivisionmultifind = $this->GetMultiFind();
                                    $this->Where(['and', 'and'], $websitesdivisionmultifind);
                                    $websitesdivisionwhere = $this->GetWhere();
                                    if (count($websitesdivisionwhere) > 0) 
                                    {
                                        $websitesdivision = $this->UpdateOrCreateWebsite($websitesdivisionwhere[0][0], $monitorings[$row][2], ($division != null) ? $division->id : $temporarydivisionwhere[0][0], NULL);
                                    } 
                                    else 
                                    {
                                        $websitesdivision = (count($temporarywebsitesdivisionwhere) > 0) ? null : $this->UpdateOrCreateWebsite(NULL, $monitorings[$row][2], ($division != null) ? $division->id : $temporarydivisionwhere[0][0], NULL);
                                    }
                                    if ($websitesdivision != null) 
                                    {
                                        $this->Rows([$websitesdivision->id, $websitesdivision->linkwebsite, $websitesdivision->divisions_id, $websitesdivision->subdivisions_id]);
                                    }
                                    $temporarywebsitesdivision[] = $this->GetRows();
                                    $this->MultiFind([1, 2, 3, 4], ['==', '==', '==', '=='], [$monitorings[$row][3], $monitorings[$row][4], ($request != null) ? $request->date : $monitorings[$row][5], ($websitesdivision != null) ? $websitesdivision->id : $temporarywebsitesdivisionwhere[0][0]], $temporaryreportdivision);
                                    $temporaryreportdivisionmultifind = $this->GetMultiFind();
                                    $this->Where(['and', 'and', 'and'], $temporaryreportdivisionmultifind);
                                    $temporaryreportdivisionwhere = $this->GetWhere();
                                    $this->MultiFind([1, 2, 3, 4], ['==', '==', '==', '=='], [$monitorings[$row][3], $monitorings[$row][4], ($request != null) ? $request->date : $monitorings[$row][5], ($websitesdivision != null) ? $websitesdivision->id : $temporarywebsitesdivisionwhere[0][0]], $query[2]);
                                    $reportdivisionmultifind = $this->GetMultiFind();
                                    $this->Where(['and', 'and', 'and'], $reportdivisionmultifind);
                                    $reportdivisionwhere = $this->GetWhere();
                                    if (count($reportdivisionwhere) > 0) 
                                    {
                                        $reportdivision = $this->UpdateOrCreateReport($reportdivisionwhere[0][0], $monitorings[$row][3], $monitorings[$row][4], ($request != null) ? $request->date : $monitorings[$row][5], ($websitesdivision != null) ? $websitesdivision->id : $temporarywebsitesdivisionwhere[0][0]);
                                    } 
                                    else 
                                    {
                                        $reportdivision = (count($temporaryreportdivisionwhere) > 0) ? null : $this->UpdateOrCreateReport(NULL, $monitorings[$row][3], $monitorings[$row][4], ($request != null) ? $request->date : $monitorings[$row][5], ($websitesdivision != null) ? $websitesdivision->id : $temporarywebsitesdivisionwhere[0][0]);
                                    }
                                    if ($reportdivision != null) 
                                    {
                                        $this->Rows([$reportdivision->id, $reportdivision->status, $reportdivision->information, $reportdivision->dateupdate, $reportdivision->websites_id]);
                                    }
                                    $temporaryreportdivision[] = $this->GetRows();
                                } 
                                else 
                                {
                                    $number++;
                                    $this->MultiFind([1, 2], ['==', '=='], [$number, $monitorings[$row][1]], $temporarysubdivision);
                                    $temporarysubdivisionmultifind = $this->GetMultiFind();
                                    $this->Where(['and'], $temporarysubdivisionmultifind);
                                    $temporarysubdivisionwhere = $this->GetWhere();
                                    $this->MultiFind([1, 2], ['==', '=='], [$number, $monitorings[$row][1]], $query[6]);
                                    $subdivisionmultifind = $this->GetMultiFind();
                                    $this->Where(['and'], $subdivisionmultifind);
                                    $subdivisionwhere = $this->GetWhere();
                                    if (count($subdivisionwhere) > 0) 
                                    {
                                        $subdivision = $this->UpdateOrCreateSubdivision($subdivisionwhere[0][0], $number, $monitorings[$row][1]);
                                    } 
                                    else 
                                    {
                                        $subdivision = (count($temporarysubdivisionwhere) > 0) ? null : $this->UpdateOrCreateSubdivision(NULL, $number, $monitorings[$row][1]);
                                    }
                                    if ($subdivision != null) 
                                    {
                                        $this->Rows([$subdivision->id, $subdivision->number, $subdivision->description]);
                                    }
                                    $temporarysubdivision[] = $this->GetRows();
                                    $this->MultiFind([1, 2, 3], ['==', '==', '=='], [$monitorings[$row][2], ($division != null) ? $division->id : $temporarydivisionwhere[0][0], ($subdivision != null) ? $subdivision->id : $temporarysubdivisionwhere[0][0]], $temporarywebsitessubdivision);
                                    $temporarywebsitessubdivisionmultifind = $this->GetMultiFind();
                                    $this->Where(['and', 'and'], $temporarywebsitessubdivisionmultifind);
                                    $temporarywebsitessubdivisionwhere = $this->GetWhere();
                                    $this->MultiFind([1, 2, 3], ['==', '==', '=='], [$monitorings[$row][2], ($division != null) ? $division->id : $temporarydivisionwhere[0][0], ($subdivision != null) ? $subdivision->id : $temporarysubdivisionwhere[0][0]], $query[3]);
                                    $websitessubdivisionmultifind = $this->GetMultiFind();
                                    $this->Where(['and', 'and'], $websitessubdivisionmultifind);
                                    $websitessubdivisionwhere = $this->GetWhere();
                                    if (count($websitessubdivisionwhere) > 0) 
                                    {
                                        $websitessubdivision = $this->UpdateOrCreateWebsite($websitessubdivisionwhere[0][0], $monitorings[$row][2], ($division != null) ? $division->id : $temporarydivisionwhere[0][0], ($subdivision != null) ? $subdivision->id : $temporarysubdivisionwhere[0][0]);
                                    } 
                                    else 
                                    {
                                        $websitessubdivision = (count($temporarywebsitessubdivisionwhere) > 0) ? null : $this->UpdateOrCreateWebsite(NULL, $monitorings[$row][2], ($division != null) ? $division->id : $temporarydivisionwhere[0][0], ($subdivision != null) ? $subdivision->id : $temporarysubdivisionwhere[0][0]);
                                    }
                                    if ($websitessubdivision != null) 
                                    {
                                        $this->Rows([$websitessubdivision->id, $websitessubdivision->linkwebsite, $websitessubdivision->divisions_id, $websitessubdivision->subdivisions_id]);
                                    }
                                    $temporarywebsitessubdivision[] = $this->GetRows();
                                    $this->MultiFind([1, 2, 3, 4], ['==', '==', '==', '=='], [$monitorings[$row][3], $monitorings[$row][4], ($request != null) ? $request->dateimportupdate : $monitorings[$row][5], ($websitessubdivision != null) ? $websitessubdivision->id : $temporarywebsitessubdivisionwhere[0][0]], $temporaryreportsubdivision);
                                    $temporaryreportsubdivisionmultifind = $this->GetMultiFind();
                                    $this->Where(['and', 'and', 'and'], $temporaryreportsubdivisionmultifind);
                                    $temporaryreportsubdivisionwhere = $this->GetWhere();
                                    $this->MultiFind([1, 2, 3, 4], ['==', '==', '==', '=='], [$monitorings[$row][3], $monitorings[$row][4], ($request != null) ? $request->dateimportupdate : $monitorings[$row][5], ($websitessubdivision != null) ? $websitessubdivision->id : $temporarywebsitessubdivisionwhere[0][0]], $query[2]);
                                    $reportsubdivisionmultifind = $this->GetMultiFind();
                                    $this->Where(['and', 'and', 'and'], $reportsubdivisionmultifind);
                                    $reportsubdivisionwhere = $this->GetWhere();
                                    if (count($reportsubdivisionwhere) > 0) 
                                    {
                                        $reportsubdivision = $this->UpdateOrCreateReport($reportsubdivisionwhere[0][0], $monitorings[$row][3], $monitorings[$row][4], ($request != null) ? $request->dateimportupdate : $monitorings[$row][5], ($websitessubdivision != null) ? $websitessubdivision->id : $temporarywebsitessubdivisionwhere[0][0]);
                                    } 
                                    else 
                                    {
                                        $reportsubdivision = (count($temporaryreportsubdivisionwhere) > 0) ? null : $this->UpdateOrCreateReport(NULL, $monitorings[$row][3], $monitorings[$row][4], ($request != null) ? $request->dateimportupdate : $monitorings[$row][5], ($websitessubdivision != null) ? $websitessubdivision->id : $temporarywebsitessubdivisionwhere[0][0]);
                                    }
                                    if ($reportsubdivision != null) 
                                    {
                                        $this->Rows([$reportsubdivision->id, $reportsubdivision->status, $reportsubdivision->information, $reportsubdivision->dateupdate, $reportsubdivision->websites_id]);
                                    }
                                    $temporaryreportsubdivision[] = $this->GetRows();
                                }
                                $this->ProgressLoad($index++);
                            }
                        }
                }
            }
        }
    }

    public function ProcessImport($request)
    {
        $index = 0;
        if($request->hasFile('file'))
        {
            $extension = $this->FilesCheckExtension($request->file('file')->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls") 
            {
                $file = $request->file('file');
                $reader = ($extension == "xlsx") ? $this->FilesReaderExtensionXlsx() : $this->FilesReaderExtensionXls();
                $properties = $file->move(base_path('resources\assets\files'), $file->getClientOriginalName());
                $spreadsheet = $reader->load($properties->getPathName());
                $this->FilesSpreadsheet($spreadsheet);
                $this->FilesScanner(0);
                $rowlow = $this->GetFilesScanner();
                $this->FilesScanner(1);
                $columns = $this->GetFilesScanner();
                $this->FilesScanner(2, $rowlow);
                $rows = $this->GetFilesScanner();
                $this->FilesScanner(3, null, $rows, $columns);
                $signatures = $this->GetFilesScanner();
                $this->FilesScanner(4, null, $rows, $columns);
                $scannermonitorings = $this->GetFilesScanner();
                $this->ResetScannerMonitoring($scannermonitorings);
                $monitorings = $this->GetResetScannerMonitoring();
                $this->Distinct($signatures);
                $differentsignatures = $this->GetDistinct();
                $this->Distinct($monitorings);
                $differentmonitorings = $this->GetDistinct();
                if (count($differentsignatures) > 0 || count($differentmonitorings) > 0) 
                {
                    $this->ProcessImportStoreSignature($differentsignatures, $index);
                    $this->ProcessImportStoreMonitoring($request, $differentmonitorings, $this->GetProgressLoad() + 1);
                } 
                else 
                {
                    toastr()->warning('Import File Gagal!', 'Warning Message');
                }
                $this->FilesDelete($properties->getPathName());
                toastr()->success('Import File Berhasil', 'Success Message');
            }
        }
        return response()->json('success');
    }

    public function ProcessImportReserve($request)
    {
        $index = 0;
        if($request->hasFile('file'))
        {
            $extension = $this->FilesCheckExtension($request->file('file')->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls") 
            {
                $file = $request->file('file');
                $reader = ($extension == "xlsx") ? $this->FilesReaderExtensionXlsx() : $this->FilesReaderExtensionXls();
                $properties = $file->move(base_path('resources\assets\files'), $file->getClientOriginalName());
                $spreadsheet = $reader->load($properties->getPathName());
                $this->FilesSpreadsheet($spreadsheet);
                $this->FilesScannerReserve(0);
                $rowlow = $this->GetFilesScannerReserve();
                $this->FilesScannerReserve(1);
                $columns = $this->GetFilesScannerReserve();
                $this->FilesScannerReserve(2, $rowlow);
                $rows = $this->GetFilesScannerReserve();
                $this->FilesScannerReserve(3, null, $rows, $columns);
                $signatures = $this->GetFilesScannerReserve();
                $this->FilesScannerReserve(4, null, $rows, $columns);
                $scannermonitorings = $this->GetFilesScannerReserve();
                $this->ResetScannerMonitoringReserve($scannermonitorings);
                $monitorings = $this->GetResetScannerMonitoringReserve();
                $this->Distinct($signatures);
                $differentsignatures = $this->GetDistinct();
                $this->Distinct($monitorings);
                $differentmonitorings = $this->GetDistinct();
                if (count($differentsignatures) > 0 || count($differentmonitorings) > 0) 
                {
                    $this->ProcessImportStoreSignature($differentsignatures, $index);
                    $this->ProcessImportStoreMonitoring(null, $differentmonitorings, $this->GetProgressLoad() + 1);
                } 
                else 
                {
                    toastr()->warning('Import File Gagal!', 'Warning Message');
                }
                $this->FilesDelete($properties->getPathName());
                toastr()->success('Import File Berhasil', 'Success Message');
            }
        }
        return response()->json('success');
    }

    // FUNCTION PROCESS EXPORT BY DATE

    public function ProcessDataExportByDate($date)
    {
        $query = $this->QueryProcess();
        $this->Find(3, $date, $query[2], 'true');
        $findreport = $this->GetFind();
        $this->Stack($query[3], [2, 9, 3, 0], [$query[4], $query[1], $query[6], $findreport], [0, 0, 0, 4]);
        $stack = $this->GetStack();
        $this->Export(9, [1], $query[1], [0], $stack, 'true');
        $export = $this->GetExport();
        $this->ResetExport($export);
        $processexport = $this->GetResetExport();
        $this->SetValuesExport($processexport);
    }

    // FUNCTION PROCESS EXPORT BY MONTH

    public function ProcessDataExportByMonth($getreportmonth)
    {
        $processexport = array();
        $query = $this->QueryProcess();
        $this->Find(3, $getreportmonth, $query[2], 'like');
        $findreport = $this->GetFind();
        $this->GroupBy($findreport, 3);
        $groupby = $this->GetGroupBy();
        $this->OrderBy($groupby, 3, 'asc');
        $date = $this->GetOrderBy();
        if (count($date) > 0) 
        {
            for ($row=0; $row < count($date); $row++) 
            { 
                $this->Find(3, $date[$row][3], $query[2], 'true');
                $findreport = $this->GetFind();
                $this->Stack($query[3], [2, 9, 3, 0], [$query[4], $query[1], $query[6], $findreport], [0, 0, 0, 4]);
                $stack = $this->GetStack();
                $this->Export(9, [1], $query[1], [0], $stack, 'true');
                $export = $this->GetExport();
                $this->ResetExport($export);
                $resetexport = $this->GetResetExport();
                $processexport[$date[$row][3]] = $resetexport;
            }
        }
        $this->SetValuesExportByMonth($processexport);
    }

    // FUNCTION PROCESS EXPORT BY WEBSITE ID

    public function ProcessDataExportByWebsiteId($reportdescription)
    {
        $query = $this->QueryProcess();
        $this->Find(4, $reportdescription, $query[2], 'true');
        $findreport = $this->GetFind();
        $this->Stack($findreport, [4, 9, 16, 10], [$query[3], $query[4], $query[1], $query[6]], [0, 0, 0, 0]);
        $stack = $this->GetStack();
        $this->Export(16, [1], $query[1], [0], $stack, 'true');
        $export = $this->GetExport();
        $this->ResetExportByWebsiteId($export);
        $processexport = $this->GetResetExportByWebsiteId();
        $this->SetValuesExportByWebsiteId($processexport);
    }

    // FUNCTION PROCESS EXPORT PDF 01

    public function ExportPDF01($getreportdate)
    {
        $this->Fpdf();
        $this->DateLanguage();
        $query = $this->QueryProcess();
        $date = $this->DateParse($getreportdate)->toDateString();
        $firstdate = $this->DateParse($getreportdate)->subDays(8);
        $first = $this->DateFromTimeStamp(strtotime($firstdate))->formatLocalized('%d %B');
        $lastdate = $this->DateParse($getreportdate)->subDays(1);
        $last = $this->DateFromTimeStamp(strtotime($lastdate))->formatLocalized('%d %B %Y');
        $this->ProcessDataExportByDate($date);
        $reportexport = $this->GetValuesExport();
        $this->OrderBy($query[5], 1, 'asc');
        $reportsignature = $this->GetOrderBy();
        $this->TitleToPDF('Laporan Monitoring Periode '.$first.' - '.$last);
        $this->ExportToPDF(1, $reportsignature, $reportexport, $first, $last);
    }

    // FUNCTION PROCESS EXPORT PDF 02

    public function ExportPDF02($reportdescription)
    {
        $this->Fpdf();
        $query = $this->QueryProcess();
        $this->ProcessDataExportByWebsiteId($reportdescription);
        $reportexport = $this->GetValuesExportByWebsiteId();
        $descriptionnameoffile = $this->GetValuesExportNameOfFiles();
        $this->OrderBy($query[5], 1, 'asc');
        $reportsignature = $this->GetOrderBy();
        $this->TitleToPDF('Laporan Monitoring '.$descriptionnameoffile);        
        $this->ExportToPDF(2, $reportsignature, $reportexport);
    }

    // FUNCTION PROCESS EXPORT WORD 01

    public function ExportWord01($getreportdate)
    {
        $this->DateLanguage();
        $query = $this->QueryProcess();
        $date = $this->DateParse($getreportdate)->toDateString();
        $firstdate = $this->DateParse($getreportdate)->subDays(8);
        $first = $this->DateFromTimeStamp(strtotime($firstdate))->formatLocalized('%d %B');
        $lastdate = $this->DateParse($getreportdate)->subDays(1);
        $last = $this->DateFromTimeStamp(strtotime($lastdate))->formatLocalized('%d %B %Y');
        $this->ProcessDataExportByDate($date);
        $reportexport = $this->GetValuesExport();
        $this->OrderBy($query[5], 1, 'asc');
        $reportsignature = $this->GetOrderBy();
        $this->ExportToWord(1, $reportsignature, $reportexport, $first, $last);
        $this->SaveWord(base_path('resources\assets\files\Laporan Monitoring Periode '.$first.' - '.$last.'.docx'));
        return response()->download(base_path('resources\assets\files\Laporan Monitoring Periode '.$first.' - '.$last.'.docx'))->deleteFileAfterSend(true);
    }

    // FUNCTION PROCESS EXPORT WORD 02

    public function ExportWord02($reportdescription)
    {
        $query = $this->QueryProcess();
        $this->ProcessDataExportByWebsiteId($reportdescription);
        $reportexport = $this->GetValuesExportByWebsiteId();
        $descriptionnameoffile = $this->GetValuesExportNameOfFiles();
        $this->OrderBy($query[5], 1, 'asc');
        $reportsignature = $this->GetOrderBy();
        $this->ExportToWord(2, $reportsignature, $reportexport);
        $this->SaveWord(base_path('resources\assets\files\Laporan Monitoring '.$descriptionnameoffile.'.docx'));
        return response()->download(base_path('resources\assets\files\Laporan Monitoring '.$descriptionnameoffile.'.docx'))->deleteFileAfterSend(true);
    }

    // FUNCTION PROCESS EXPORT EXCEL 00

    public function ExportExcel00($getreportmonth)
    {
        $this->DateLanguage();
        $query = $this->QueryProcess();
        $month = explode('-', $getreportmonth);
        $namemonth = $this->DateFromFormat('!m', $month[1])->formatLocalized('%B');
        $descriptionmonth = $namemonth.' '.$month[0];
        $this->ProcessDataExportByMonth($getreportmonth);
        $reportexport = $this->GetValuesExportByMonth();
        $this->OrderBy($query[5], 1, 'asc');
        $reportsignature = $this->GetOrderBy();
        return $this->ExportToExcel(0, '\Laporan Monitoring Bulan '.$descriptionmonth.'.xlsx', $reportsignature, $reportexport);
    }

    // FUNCTION PROCESS EXPORT EXCEL 01

    public function ExportExcel01($getreportdate)
    {
        $this->DateLanguage();
        $query = $this->QueryProcess();
        $date = $this->DateParse($getreportdate)->toDateString();
        $firstdate = $this->DateParse($getreportdate)->subDays(8);
        $first = $this->DateFromTimeStamp(strtotime($firstdate))->formatLocalized('%d %B');
        $lastdate = $this->DateParse($getreportdate)->subDays(1);
        $last = $this->DateFromTimeStamp(strtotime($lastdate))->formatLocalized('%d %B %Y');
        $this->ProcessDataExportByDate($date);
        $reportexport = $this->GetValuesExport();
        $this->OrderBy($query[5], 1, 'asc');
        $reportsignature = $this->GetOrderBy();
        return $this->ExportToExcel(1, '\Laporan Monitoring Periode '.$first.' - '.$last.'.xlsx', $reportsignature, $reportexport, $first, $last);
    }

    // FUNCTION PROCESS EXPORT EXCEL 02

    public function ExportExcel02($reportdescription)
    {
        $query = $this->QueryProcess();
        $this->ProcessDataExportByWebsiteId($reportdescription);
        $reportexport = $this->GetValuesExportByWebsiteId();
        $descriptionnameoffile = $this->GetValuesExportNameOfFiles();
        $this->OrderBy($query[5], 1, 'asc');
        $reportsignature = $this->GetOrderBy();
        return $this->ExportToExcel(2, '\Laporan Monitoring '.$descriptionnameoffile.'.xlsx', $reportsignature, $reportexport);
    }

    // FUNCTION AND GETTER EXPORT

    public function Export(int $columns, array $keys, array $find, array $datafind, array $items, string $operator)
    {
        $rows = array();
        if (!empty($columns) && count($keys) > 0 && count($find) > 0 && count($datafind) > 0 && count($items) > 0 && !empty($operator)) 
        {
            for ($findrows=0; $findrows < count($find); $findrows++) 
            { 
                for ($findcolumns=0; $findcolumns < count($datafind); $findcolumns++) 
                { 
                    for ($keyrow=0; $keyrow < count($keys); $keyrow++) 
                    { 
                        $this->Find($columns, $find[$findrows][$datafind[$findcolumns]], $items, $operator);
                        $rows[$find[$findrows][$keys[$keyrow]]] = $this->GetFind();
                    }
                }
            }
        }
        return $this->export = $rows;
    }

    public function GetExport()
    {
        return $this->export;
    }

    // EXPORT TO PDF

    public function HeaderToPDF($first = null, $last = null)
    {
        $this->PageToPDF('L', [210, 330]);
        $this->FontToPDF('Arial', 'B', 14);
        $this->ImageToPDF('filelocal/resources/assets/images/icon/logoprovinsikalimantantimur.png', 25, $this->GetYToPDF(), 40, 45, 'PNG', '');
        $this->NewLineToPDF(8);
        $this->CellToPDF(0, 8, 'MONITORING WEBSITE OPD', 0, 1, 'C', false, '');
        $this->CellToPDF(0, 8, 'DI LINGKUNGAN PEMERINTAH PROVINSI KALIMANTAN TIMUR', 0, 1, 'C', false, '');
        $this->CellToPDF(0, 8, 'DINAS KOMUNIKASI DAN INFORMATIKA PROVINSI KALIMANTAN TIMUR', 0, 1, 'C', false, '');
        if ($first != null && $last != null) 
        {
            $this->CellToPDF(0, 8, 'PERIODE : '.$first.' - '.$last, 0, 1, 'C', false, '');
        }
        $this->NewLineToPDF(24);
    }

    public function ContentToPDF(int $page, array $items)
    {
        $this->FontToPDF('Arial', 'B', 12);
        $this->FillColorToPDF(240, 240, 240);
        $this->TextColorToPDF(48, 54, 56);
        $this->WidthsToPDF([10, 108, 72, 60, 60]);
        $this->AlignsToPDF(['C', 'C', 'C', 'C', 'C']);
        $this->RowToPDF(['NO', 'URAIAN', 'ALAMAT WEBSITE', 'UPDATE/TIDAK UPDATE', 'KETERANGAN'], 8, 1, true);
        if (!empty($page) && count($items) > 0) 
        {
            $this->ContentTableToPDF($page, $items);
        }
    }

    public function ContentTableToPDF(int $page, array $items)
    {
        $number = 1;
        if (is_integer($page) && count($items) > 0) 
        {
            foreach ($items as $keys => $item) 
            {
                $this->WidthsToPDF([310]);
                $this->AlignsToPDF(['C']);
                $this->RowToPDF([$keys], 8, 1, true);
                $this->FontToPDF('Arial', '', 10);
                $this->WidthsToPDF([10, 108, 72, 60, 60]);
                $this->AlignsToPDF(['C', 'L', 'C', 'C', 'C']);
                if (count($item) > 0) 
                {
                    for ($row=0; $row < count($item); $row++) 
                    { 
                        $this->RowToPDF([($page == 1) ? (($item[$row][0] == null) ? $number++ : null) : $number++, $item[$row][1], $item[$row][2], $item[$row][3], $item[$row][4]], 8, 1, false, true);
                    }
                }
            }
        }
    }
    
    public function FooterToPDF(array $items)
    {
        $datenow = $this->GetChangeDateNow();
        $this->TextColorToPDF(0, 0, 0);
        $this->FontToPDF('Arial', '', 12);
        $this->WidthsToPDF([225, 85]);
        $this->AlignsToPDF(['L', 'L']);
        $this->NewLineToPDF(16);
        if (count($items) > 0) 
        {
            $this->RowToPDF([null, (count($items) > 1) ? ('Samarinda, '.$datenow) : null], 8, 0, false);
            $this->RowToPDF([($items[0][4] != null) ? $items[0][4] : null, (count($items) > 1) ? (($items[1][4] != null) ? $items[1][4] : null) : null], 8, 0, false);
            $this->NewLineToPDF(24);
            $this->RowToPDF([($items[0][3] != null) ? $items[0][3] : null, (count($items) > 1) ? (($items[1][3] != null) ? $items[1][3] : null) : null], 8, 0, false);
            $this->RowToPDF([($items[0][2] != null) ? $items[0][2] : null, (count($items) > 1) ? (($items[1][2] != null) ? $items[1][2] : null) : null], 8, 0, false);
        }
    }

    public function ExportToPDF(int $page, array $itemsignature, array $itemexport, $first = null, $last = null)
    {
        $extendstitle = ($first != null && $last != null) ? ($first.' - '.$last) : null;
        $this->HeaderToPDF($first, $last);
        $this->ContentToPDF($page, $itemexport);
        $this->FooterToPDF($itemsignature);
        $this->OutputToPDF('D', 'Laporan Monitoring '.$extendstitle.'.pdf', true);
        exit;
    }

    // EXPORT TO WORD

    public function GetExportWord()
    {
        return $this->exportword;
    }

    public function SectionWord(array $items)
    {
        return $this->sectionword = $this->GetExportWord()->addSection($items);
    }

    public function GetSectionWord()
    {
        return $this->sectionword;
    }

    public function ParagraphStyleWord(string $name, array $style)
    {
        return $this->GetExportWord()->addParagraphStyle($name, $style);
    }

    public function ImageWord(string $file, array $style)
    {
        return $this->GetSectionWord()->addImage($file, $style);
    }

    public function TextBreakWord(int $break)
    {
        return $this->GetSectionWord()->addTextBreak($break);
    }

    public function TextWord(string $text, array $font, array $paragraf)
    {
        return $this->GetSectionWord()->addText(htmlspecialchars($text), $font, $paragraf);
    }

    public function TableWord($style = null)
    {
        return $this->tableword = $this->GetSectionWord()->addTable($style);
    }

    public function GetTableWord()
    {
        return $this->tableword;
    }

    public function RowTableWord()
    {
        return $this->GetTableWord()->addRow();
    }

    public function CellTableWord(int $widths, $style = null)
    {
        return $this->celltableword = $this->GetTableWord()->addCell($widths, $style);
    }

    public function GetCellTableWord()
    {
        return $this->celltableword;
    }

    public function TextCellTableWord($text, array $font, string $paragraf)
    {
        return $this->GetCellTableWord()->addText(htmlspecialchars($text), $font, $paragraf);
    }    

    public function GetCustomOutputWord()
    {
        return $this->customoutputword;
    }

    public function SaveWord(string $name)
    {
        return $this->GetCustomOutputWord()->save($name);
    }

    public function HeaderToWord($first = null, $last = null)
    {
        $this->SectionWord(['paperSize' => 'Folio', 'orientation' => 'landscape', 'marginLeft' => 600, 'marginRight' => 600, 'marginTop' => 600, 'marginBottom' => 600]);
        $this->ParagraphStyleWord('styleparagraf', ['alignment' => 'left', 'spaceBefore' => 1500, 'spaceAfter' => 0, 'spacing' => 0]);
        $headerfont = ['name' => 'Arial', 'size' => 14, 'bold' =>  true];
        $paragraf = ['alignment' => 'center', 'spaceBefore' => $this->ConverterSpaceWord(6)];
        $this->ImageWord('filelocal/resources/assets/images/icon/logoprovinsikalimantantimur.png', [
            'width' => 100,
            'height' => 100,
            'wrappingStyle' => 'behind',
            'positioning' => $this->ImageAlignWord(),
            'posVertical' => $this->ImageAlignWord(),
            'posHorizontal' => $this->ImageAlignWord(),
            'marginLeft' => round($this->ConverterImageCentimetersToPixelWord(1)),
            'marginTop' => round($this->ConverterImageCentimetersToPixelWord(0.25))
        ]);
        $this->TextWord('MONITORING WEBSITE OPD', $headerfont, $paragraf);
        $this->TextWord('DI LINGKUNGAN PEMERINTAH PROVINSI KALIMANTAN TIMUR', $headerfont, $paragraf);
        $this->TextWord('DINAS KOMUNIKASI DAN INFORMATIKA PROVINSI KALIMANTAN TIMUR', $headerfont, $paragraf);
        if ($first != null && $last != null) 
        {
            $this->TextWord('PERIODE : '.($first).' - '.($last), $headerfont, $paragraf);
        }
        $this->TextBreakWord(3);
    }

    public function ContentToWord(int $page, array $items)
    {
        $this->ParagraphStyleWord('cellparagraf', ['alignment' => 'center', 'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0]);
        $font = ['name' => 'Arial', 'size' => 12, 'bold' =>  true, 'color' => '303638'];
        $tabelstyle = ['borderColor' => '000000', 'borderSize' => 6, 'cellMargin' => 80, 'alignment' => $this->TableAlignWord(), 'layout' => $this->TableLayoutWord()];
        $firstrowstyle = ['valign' => 'center', 'bgColor' => 'F0F0F0'];
        $this->TableWord($tabelstyle);
        $this->RowTableWord();
        $this->CellTableWord(800, $firstrowstyle);
        $this->TextCellTableWord('NO', $font, 'cellparagraf');
        $this->CellTableWord(5200, $firstrowstyle);
        $this->TextCellTableWord('URAIAN', $font, 'cellparagraf');
        $this->CellTableWord(4500, $firstrowstyle);
        $this->TextCellTableWord('ALAMAT WEBSITE', $font, 'cellparagraf');
        $this->CellTableWord(3600, $firstrowstyle);
        $this->TextCellTableWord('UPDATE/TIDAK UPDATE', $font, 'cellparagraf');
        $this->CellTableWord(3500, $firstrowstyle);
        $this->TextCellTableWord('KETERANGAN', $font, 'cellparagraf');
        if (!empty($page) && count($items) > 0) 
        {
            $this->ContentTableToWord($page, $items);
        }
    }

    public function ContentTableToWord(int $page, array $items)
    {
        $number = 1;
        $this->ParagraphStyleWord('cellparagrafheader', ['alignment' => 'center', 'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0]);
        $this->ParagraphStyleWord('cellparagrafcontent', ['alignment' => 'left', 'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0]);
        $fontheader = ['name' => 'Arial', 'size' => 12, 'bold' =>  true, 'color' => '303638'];
        $cellcolspan = ['gridSpan' => 5, 'valign' => 'center', 'bgColor' => 'F0F0F0'];
        $fontcontent = ['name' => 'Arial', 'size' => 10, 'color' => '303638'];
        $stylecell = ['valign' => 'center'];
        if (is_integer($page) && count($items) > 0) 
        {
            foreach ($items as $keys => $item) 
            {
                $this->RowTableWord();
                $this->CellTableWord(17600, $cellcolspan);
                $this->TextCellTableWord($keys, $fontheader, 'cellparagrafheader');
                if (count($item) > 0) 
                {
                    for ($row=0; $row < count($item); $row++) 
                    { 
                        (strtolower($item[$row][3]) === 'tidak update')?
                          $fontforstatusandinformation = ['name' => 'Arial', 'size' => 10, 'color' => 'FF0000']:
                          $fontforstatusandinformation = ['name' => 'Arial', 'size' => 10, 'color' => '303638'];
                          $this->RowTableWord();
                          $this->CellTableWord(800, $stylecell);
                          $this->TextCellTableWord(($page == 1) ? (($item[$row][0] === null) ? $number++ : null) : $number++, $fontcontent, 'cellparagrafheader');
                          $this->CellTableWord(5200, $stylecell);
                          $this->TextCellTableWord($item[$row][1], $fontcontent, 'cellparagrafcontent');
                          $this->CellTableWord(4500, $stylecell);
                          $this->TextCellTableWord($item[$row][2], $fontcontent, 'cellparagrafheader');
                          $this->CellTableWord(3600, $stylecell);
                          $this->TextCellTableWord($item[$row][3], $fontforstatusandinformation, 'cellparagrafheader');
                          $this->CellTableWord(3500, $stylecell);
                          $this->TextCellTableWord($item[$row][4], $fontforstatusandinformation, 'cellparagrafheader');
                    }
                }
            }
        }
    }

    public function FooterToWord(array $items)
    {
        $datenow = $this->GetChangeDateNow();
        $stylecell = ['valign' => 'center'];
        $signaturefont = ['name' => 'Arial', 'size' => 12];
        $this->ParagraphStyleWord('cellparagraf02', ['alignment' => 'left', 'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0]);
        $this->ParagraphStyleWord('styleparagraf', ['alignment' => 'left', 'spaceBefore' => 1500, 'spaceAfter' => 0, 'spacing' => 0]);
        $this->ParagraphStyleWord('cellparagraftableft', ['alignment' => 'left', 'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0, 'tabs' => [$this->TabWord('left', 500)]]);
        $this->ParagraphStyleWord('cellstyleparagraftableft', ['alignment' => 'left', 'spaceBefore' => 1500, 'spaceAfter' => 0, 'spacing' => 0, 'tabs' => [$this->TabWord('left', 500)]]);
        $this->TextBreakWord(4);
        $this->TableWord();
        $this->RowTableWord();
        if (count($items) > 0) 
        {
            $this->RowTableWord();
            $this->CellTableWord(12000);
            $this->CellTableWord(5600, $stylecell);
            $this->TextCellTableWord((count($items) > 1) ? ('Samarinda, '.$datenow) : null, $signaturefont, 'cellparagraf02');
            $this->RowTableWord();
            $this->CellTableWord(12000, $stylecell);
            $this->TextCellTableWord("\t".($items[0][4] != null) ? $items[0][4] : null, $signaturefont, 'cellparagraftableft');
            $this->CellTableWord(5600, $stylecell);
            $this->TextCellTableWord((count($items) > 1) ? (($items[1][4] != null) ? $items[1][4] : null) : null, $signaturefont, 'cellparagraf02');
            $this->RowTableWord();
            $this->CellTableWord(12000, $stylecell);
            $this->TextCellTableWord("\t".($items[0][3] != null) ? $items[0][3] : null, $signaturefont, 'cellstyleparagraftableft');
            $this->CellTableWord(5600, $stylecell);
            $this->TextCellTableWord((count($items) > 1) ? (($items[1][3] != null) ? $items[1][3] : null) : null, $signaturefont, 'styleparagraf');
            $this->RowTableWord();
            $this->CellTableWord(12000, $stylecell);
            $this->TextCellTableWord("\t".($items[0][2] != null) ? $items[0][2] : null, $signaturefont, 'cellparagraftableft');
            $this->CellTableWord(5600, $stylecell); 
            $this->TextCellTableWord((count($items) > 1) ? (($items[1][2] != null) ? $items[1][2] : null) : null, $signaturefont, 'cellparagraf02');   
        }
    }

    public function ExportToWord(int $page, array $itemsignature, array $itemexport, $first = null, $last = null)
    {
        $this->ExportWord();
        $this->HeaderToWord($first, $last);
        $this->ContentToWord($page, $itemexport);
        $this->FooterToWord($itemsignature);
        $this->CustomOutputWord('Word2007');
    }

    // EXPORT TO EXCEL

    public function GetDrawingToExcel()
    {
        return $this->drawingtoexcel;
    }

    public function SheetToExcel($sheet)
    {
        return $this->sheettoexcel = $sheet;
    }

    public function GetSheetToExcel()
    {
        return $this->sheettoexcel;
    }

    public function CountBorderTableToExcel(int $count)
    {
        return $this->countbordertabletoexcel = $count;
    }

    public function GetCountBorderTableToExcel()
    {
        return $this->countbordertabletoexcel;
    }

    public function PathFilesToExcel(string $path)
    {
        return $this->GetDrawingToExcel()->setPath($path);
    }

    public function CoordinatesImageInCellToExcel(string $coordinate)
    {
        return $this->GetDrawingToExcel()->setCoordinates($coordinate);
    }

    public function WidthAndHeightImageToExcel(int $width, int $height)
    {
        return $this->GetDrawingToExcel()->setWidthAndHeight($width, $height);
    }

    public function ResizeImageProportionalToExcel(bool $change)
    {
        return $this->GetDrawingToExcel()->setResizeProportional($change);
    }

    public function OffsetXImageToExcel(int $x)
    {
        return $this->GetDrawingToExcel()->setOffsetX($x);
    }

    public function OffsetYImageToExcel(int $y)
    {
        return $this->GetDrawingToExcel()->setOffsetY($y);
    }

    public function WorksheetImageToExcel($sheet)
    {
        return $this->GetDrawingToExcel()->setWorksheet($sheet);
    }

    public function SheetTitle(string $title)
    {
        return $this->GetSheetToExcel()->setTitle($title);
    }

    public function MergeCellToExcel(string $coordinate)
    {
        return $this->GetSheetToExcel()->mergeCells($coordinate);
    }

    public function CellWidthToExcel(string $column, int $width)
    {
        return $this->GetSheetToExcel()->getColumnDimension($column)->setWidth($width);
    }

    public function PageMarginTopToExcel($margin)
    {
        return $this->GetSheetToExcel()->getPageMargins()->setTop($margin);
    }

    public function PageMarginRightToExcel($margin)
    {
        return $this->GetSheetToExcel()->getPageMargins()->setRight($margin);
    }

    public function PageMarginLeftToExcel($margin)
    {
        return $this->GetSheetToExcel()->getPageMargins()->setLeft($margin);
    }

    public function PageMarginBottomToExcel($margin)
    {
        return $this->GetSheetToExcel()->getPageMargins()->setBottom($margin);
    }

    public function OrientationPaperToExcel(string $orientation)
    {
        return $this->GetSheetToExcel()->getPageSetup()->setOrientation($orientation);
    }

    public function PaperTypeToExcel($type)
    {
        return $this->GetSheetToExcel()->getPageSetup()->setPaperSize($type);
    }

    public function CellStyleToExcel(string $coordinate)
    {
        return $this->cellstyletoexcel = $this->GetSheetToExcel()->getStyle($coordinate);
    }

    public function GetCellStyleToExcel()
    {
        return $this->cellstyletoexcel;
    }

    public function WrapTextToExcel(bool $wrap)
    {
        return $this->GetCellStyleToExcel()->getAlignment()->setWrapText($wrap);
    }

    public function CellStyleFromArrayToExcel(array $style)
    {
        return $this->GetCellStyleToExcel()->applyFromArray($style);
    }
    
    public function IndentInCellToExcel(int $indent)
    {
        return $this->GetCellStyleToExcel()->getAlignment()->setIndent($indent);
    }

    public function RowDimensionToExcel(string $row)
    {
        return $this->rowdimensiontoexcel = $this->GetSheetToExcel()->getRowDimension($row);
    }

    public function GetRowDimensionToExcel()
    {
        return $this->rowdimensiontoexcel;
    }

    public function RowHeightToExcel(int $height)
    {
        return $this->GetRowDimensionToExcel()->setRowHeight($height);
    }

    public function CellValueToExcel(string $coordinate, $value)
    {
        return $this->GetSheetToExcel()->setCellValue($coordinate, $value);
    }

    public function HeaderToExcel($sheet, $first = null, $last = null)
    {
        $extendssheet = ($first != null && $last != null) ? ($first.' - '.$last) : ('Bulanan');
        $this->PathFilesToExcel(base_path('resources\assets\images\icon\logoprovinsikalimantantimur.png'));
        $this->CoordinatesImageInCellToExcel('A1');
        $this->WidthAndHeightImageToExcel(120, 120);
        $this->ResizeImageProportionalToExcel(true);
        $this->OffsetXImageToExcel(25);
        $this->OffsetYImageToExcel(20);
        $this->WorksheetImageToExcel($sheet);
        $this->MergeCellToExcel('A1:E1');
        $this->SheetTitle('Laporan Monitoring '.$extendssheet);
        $this->CellWidthToExcel('A', 5);
        $this->CellWidthToExcel('B', 42);
        $this->CellWidthToExcel('C', 35);
        $this->CellWidthToExcel('D', 28);
        $this->CellWidthToExcel('E', 30);
        $this->PageMarginTopToExcel(0.25);
        $this->PageMarginLeftToExcel(0.40);
        $this->PageMarginRightToExcel(0.40);
        $this->PageMarginBottomToExcel(0.25);
        $this->OrientationPaperToExcel($this->PageSetupOrientationToExcel());
        $this->PaperTypeToExcel($this->PageSetupPaperSizeToExcel());
        $this->CellStyleToExcel('A1:E1');
        $this->WrapTextToExcel(true);
        $this->CellStyleFromArrayToExcel([
            'font' => [
                'size' => '14',
                'bold' => true,
                'name' => 'Arial, Helvetica, sans-serif',
            ],
            'alignment' => [
                'vertical' => $this->StyleAlignmentVerticalToExcel(),
                'horizontal' => $this->StyleAlignmentHorizontalCenterToExcel(),
            ],
        ]);
        $this->RowDimensionToExcel('1');
        $this->RowHeightToExcel(135);
        $extendstitle = ($first != null && $last != null) ? ($first.' - '.$last) : null;
        $this->CellValueToExcel('A1', "MONITORING WEBSITE OPD\nDI LINGKUNGAN PEMERINTAH PROVINSI KALIMANTAN TIMUR\nDINAS KOMUNIKASI DAN INFORMATIKA PROVINSI KALIMANTAN TIMUR\nPERIODE : ".$extendstitle);
    }

    public function ContentToExcel(int $page, array $items)
    {
        $this->CellStyleToExcel('A2:E2');
        $this->CellStyleFromArrayToExcel([
            'font' => [
                'size' => '12',
                'bold' => true,
                'color' => ['argb' => '303638'],
                'name' => 'Arial, Helvetica, sans-serif',
            ],
            'fill' => [
                'fillType' => $this->StyleFillToExcel(),
                'color' => ['argb' => 'F0F0F0'],
            ],
            'alignment' => [
                'vertical' => $this->StyleAlignmentVerticalToExcel(),
                'horizontal' => $this->StyleAlignmentHorizontalCenterToExcel(),
            ],
        ]);
        $this->CellValueToExcel('A2', 'NO');
        $this->CellValueToExcel('B2', 'URAIAN');
        $this->CellValueToExcel('C2', 'ALAMAT WEBSITE');
        $this->CellValueToExcel('D2', 'UPDATE/TIDAK UPDATE');
        $this->CellValueToExcel('E2', 'KETERANGAN');
        if (is_integer($page) && count($items) > 0) 
        {
            $this->ContentTableToExcel($page, $items);
        }
    }

    public function ContentTableToExcel(int $page, array $items)
    {
        $number = 1;
        $rowcount = 2;
        $contentleftstyle = [
            'alignment' => [
                'vertical' => $this->StyleAlignmentVerticalToExcel(),
                'horizontal' => $this->StyleAlignmentHorizontalLeftToExcel(),
            ],
        ];
        $contentcenterstyle = [
            'alignment' => [
                'vertical' => $this->StyleAlignmentVerticalToExcel(),
                'horizontal' => $this->StyleAlignmentHorizontalCenterToExcel(),
            ],
        ];
            if (is_integer($page) && count($items) > 0) 
            {
                foreach ($items as $keys => $item) 
                {
                    $rowcount += count([$keys]);
                    $rows = $rowcount;
                    $this->CellValueToExcel('A'.($rowcount), $keys);
                    $this->MergeCellToExcel('A'.($rowcount).':E'.($rowcount));
                    $this->CellStyleToExcel('A'.($rowcount).':E'.($rowcount));
                    $this->CellStyleFromArrayToExcel($contentcenterstyle);
                    $this->CellStyleToExcel('A'.($rowcount).':E'.($rowcount));
                    $this->CellStyleFromArrayToExcel([
                        'font' => [
                            'size' => '12',
                            'bold' => true,
                            'color' => ['argb' => '303638'],
                            'name' => 'Arial, Helvetica, sans-serif',
                        ],
                        'fill' => [
                            'fillType' => $this->StyleFillToExcel(),
                            'color' => ['argb' => 'F0F0F0'],
                        ],
                    ]);
                    if (count($item) > 0) 
                    {
                        for ($row=0; $row < count($item); $row++) 
                        { 
                            $rows++;
                            $this->RowDimensionToExcel($rows);
                            $this->RowHeightToExcel(-1);
                            $this->CellStyleToExcel('A'.($rows).':E'.($rows));
                            $this->CellStyleFromArrayToExcel([
                                'font' => [
                                    'size' => '10',
                                    'name' => 'Arial, Helvetica, sans-serif',
                                    'color' => ['argb' => '303638'],
                                ],
                            ]);
                            if (strtolower($item[$row][3]) === 'tidak update') 
                            {
                                $this->CellStyleToExcel('D'.($rows).':E'.($rows));
                                $this->CellStyleFromArrayToExcel([
                                    'font' => [
                                        'size' => '10',
                                        'name' => 'Arial, Helvetica, sans-serif',
                                        'color' => ['argb' => 'FF0000'],
                                    ],
                                ]);
                            } 
                            $this->CellStyleToExcel('A'.($rows));
                            $this->CellStyleFromArrayToExcel($contentcenterstyle);
                            $this->CellValueToExcel('A'.($rows), (($page == 0) || ($page == 1)) ? (($item[$row][0] === null) ? $number++ : null) : $number++);
                            $this->CellStyleToExcel('B'.($rows));
                            $this->CellStyleFromArrayToExcel($contentleftstyle);
                            $this->CellValueToExcel('B'.($rows), $item[$row][1]);
                            $this->CellStyleToExcel('C'.($rows));
                            $this->CellStyleFromArrayToExcel($contentcenterstyle);
                            $this->CellValueToExcel('C'.($rows), $item[$row][2]);
                            $this->CellStyleToExcel('D'.($rows));
                            $this->CellStyleFromArrayToExcel($contentcenterstyle);
                            $this->CellValueToExcel('D'.($rows), $item[$row][3]);
                            $this->CellStyleToExcel('E'.($rows));
                            $this->CellStyleFromArrayToExcel($contentcenterstyle);
                            $this->CellValueToExcel('E'.($rows), $item[$row][4]);
                        }
                    }
                    $rowcount += count($items[$keys]);
                    $this->CountBorderTableToExcel($rowcount);
                }
            }
        $rows = $this->GetCountBorderTableToExcel();
        $this->CellStyleToExcel('A2:E'.($rows));
        $this->CellStyleFromArrayToExcel([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => $this->StyleBorderToExcel(),
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
    }

    public function FooterToExcel(array $items)
    {
        $datenow = $this->GetChangeDateNow();
        $rows = $this->GetCountBorderTableToExcel();
        if (count($items) > 0) 
        {
            $footerstyle = [
                'font' => [
                    'size' => '12',
                    'name' => 'Arial, Helvetica, sans-serif',
                ],
                'alignment' => [
                    'vertical' => $this->StyleAlignmentVerticalToExcel(),
                    'horizontal' => $this->StyleAlignmentHorizontalLeftToExcel(),
                ],
            ];
            $this->CellStyleToExcel('B'.($rows + 4));
            $this->CellStyleFromArrayToExcel($footerstyle);
            $this->CellValueToExcel('B'.($rows + 4), ($items[0][4] != null) ? $items[0][4] : null);
            $this->CellStyleToExcel('B'.($rows + 10));
            $this->CellStyleFromArrayToExcel($footerstyle);
            $this->CellValueToExcel('B'.($rows + 10), ($items[0][3] != null) ? $items[0][3] : null);
            $this->CellStyleToExcel('B'.($rows + 11));
            $this->CellStyleFromArrayToExcel($footerstyle);
            $this->CellValueToExcel('B'.($rows + 11), ($items[0][2] != null) ? $items[0][2] : null);
            $this->CellStyleToExcel('D'.($rows + 3).':E'.($rows + 3));
            $this->CellStyleFromArrayToExcel($footerstyle);
            $this->MergeCellToExcel('D'.($rows + 3).':E'.($rows + 3));
            $this->CellValueToExcel('D'.($rows + 3), (count($items) > 1) ? ('Samarinda, '.$datenow) : null);
            $this->IndentInCellToExcel(8);
            $this->CellStyleToExcel('D'.($rows + 4).':E'.($rows + 4));
            $this->CellStyleFromArrayToExcel($footerstyle);
            $this->MergeCellToExcel('D'.($rows + 4).':E'.($rows + 4));
            $this->CellValueToExcel('D'.($rows + 4), (count($items) > 1) ? (($items[1][4] != null) ? $items[1][4] : null) : null);
            $this->IndentInCellToExcel(8);
            $this->CellStyleToExcel('D'.($rows + 10).':E'.($rows + 10));
            $this->CellStyleFromArrayToExcel($footerstyle);
            $this->MergeCellToExcel('D'.($rows + 10).':E'.($rows + 10));
            $this->CellValueToExcel('D'.($rows + 10), (count($items) > 1) ? (($items[1][3] != null) ? $items[1][3] : null) : null);
            $this->IndentInCellToExcel(8);
            $this->CellStyleToExcel('D'.($rows + 11).':E'.($rows + 11));
            $this->CellStyleFromArrayToExcel($footerstyle);
            $this->MergeCellToExcel('D'.($rows + 11).':E'.($rows + 11));
            $this->CellValueToExcel('D'.($rows + 11), (count($items) > 1) ? (($items[1][2] != null) ? $items[1][2] : null) : null);
            $this->IndentInCellToExcel(8);
        }
    }

    public function SheetExportToExcel(int $page, $sheet, array $itemsignature, array $itemexport, $first = null, $last = null)
    {
        $this->DrawingToExcel();
        $this->SheetToExcel($sheet);
        $this->HeaderToExcel($sheet, $first, $last);
        $this->ContentToExcel($page, $itemexport);
        $this->FooterToExcel($itemsignature);
    }

    public function ExportByMonthToExcel(int $page, $sheet, array $itemsignature, array $itemexport)
    {
        if (is_integer($page) && !empty($sheet) && count($itemexport) > 0) 
        {
            foreach ($itemexport as $key => $items) 
            {
                $this->DateLanguage();
                $first = $this->DateFromTimeStamp(strtotime($this->DateParse($key)->subDays(8)))->formatLocalized('%d %B');
                $last = $this->DateFromTimeStamp(strtotime($this->DateParse($key)->subDays(1)))->formatLocalized('%d %B %Y');
                $this->SheetExportToExcel($page, $sheet, $itemsignature, $items, $first, $last);
            }
        }
    }

    public function ExportByDateToExcel(int $page, $sheet, array $itemsignature, array $itemexport, $first = null, $last = null)
    {
        $this->SheetExportToExcel($page, $sheet, $itemsignature, $itemexport, $first, $last);
    }

    public function ExportByWebsiteIdToExcel(int $page, $sheet, array $itemsignature, array $itemexport)
    {
        $this->SheetExportToExcel($page, $sheet, $itemsignature, $itemexport);
    }
}
?>