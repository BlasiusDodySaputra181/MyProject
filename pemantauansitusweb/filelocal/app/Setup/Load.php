<?php 

namespace App\Setup;

use File;
use App\User;
use App\Agency;
use App\Report;
use App\Website;
use App\Division;
use App\Signature;
use Carbon\Carbon;
use App\Subdivision;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style\Tab;
use PhpOffice\PhpWord\Style\Image;
use PhpOffice\PhpWord\Style\Table;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpWord\SimpleType\JcTable;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;
use PhpOffice\PhpSpreadsheet\IOFactory as ExcelIOFactory;

class Load extends Manage
{
    // VARIABLE KEY QUERY

    var $keyuser;                       //  data value keyuser
    var $keyagency;                     //  data value keyagency
    var $keyreport;                     //  data value keyreport
    var $keywebsite;                    //  data value keywebsite
    var $keydivision;                   //  data value keydivision
    var $keysignature;                  //  data value keysignature
    var $keysubdivision;                //  data value keysubdivision

    // VARIABLE VALUE QUERY

    var $user;                          //  data value user
    var $agency;                        //  data value agency
    var $report;                        //  data value report
    var $website;                       //  data value website
    var $division;                      //  data value division
    var $signature;                     //  data value signature
    var $subdivision;                   //  data value subdivision
    var $authenticate;                  //  data value authenticate

    // VARIABLE PROGRESS LOAD

    var $progressload;                  //  data value progressload
    
    // VARIABLE IMPORT
    
    var $filesscanner;                  //  data value filesscanner
    var $filesspreadsheet;              //  data value filesspreadsheet
    var $filesscannerreserve;           //  data value filesscannerreserve
    
    // VARIABLE EXPORT

    // VARIABLE EXPORT PDF

    var $fpdf;                          //  data value fpdf

    // VARIABLE EXPORT WORD

    var $exportword;                    //  data value exportword
    var $customoutputword;              //  data value customoutputword

    // VARIABLE EXPORT EXCEL

    var $filesexcel;                    //  data value filesexcel
    var $drawingtoexcel;                //  data value drawingtoexcel
    var $spreadsheettoexcel;            //  data value spreadsheettoexcel

    public function __construct()
    {
        // QUERY MODEL

        $queryauthenticate = auth();
        $queryuser = User::get()->toArray();
        $queryagency = Agency::get()->toArray();
        $queryreport = Report::get()->toArray();
        $querywebsite = Website::get()->toArray();
        $querydivision = Division::get()->toArray();
        $querysignature = Signature::get()->toArray();
        $querysubdivision = Subdivision::get()->toArray();

        // SETTER AND GETTER AUTHENTICATE

        $this->Authenticate($queryauthenticate);
        $valuesauthenticate = $this->GetAuthenticate();

        // SETTER AND GETTER KEY

        $this->Key($queryuser);
        $valueskeyuser = $this->GetKey();
        $this->Key($queryagency);
        $valueskeyagency = $this->GetKey();
        $this->Key($queryreport);
        $valueskeyreport = $this->GetKey();
        $this->Key($querywebsite);
        $valueskeywebsite = $this->GetKey();
        $this->Key($querydivision);
        $valueskeydivision = $this->GetKey();
        $this->Key($querysignature);
        $valueskeysignature = $this->GetKey();
        $this->Key($querysubdivision);
        $valueskeysubdivision = $this->GetKey();

        // FUNCTION QUERY

        $this->Query($valueskeyuser, $queryuser);
        $valuesuser = $this->GetQuery();
        $this->Query($valueskeyagency, $queryagency);
        $valuesagency = $this->GetQuery();
        $this->Query($valueskeyreport, $queryreport);
        $valuesreport = $this->GetQuery();
        $this->Query($valueskeywebsite, $querywebsite);
        $valueswebsite = $this->GetQuery();
        $this->Query($valueskeydivision, $querydivision);
        $valuesdivision = $this->GetQuery();
        $this->Query($valueskeysignature, $querysignature);
        $valuessignature = $this->GetQuery();
        $this->Query($valueskeysubdivision, $querysubdivision);
        $valuessubdivision = $this->GetQuery();

        // SETTER QUERY KEY

        $this->SetKeyUser($valueskeyuser);
        $this->SetKeyAgency($valueskeyagency);
        $this->SetKeyReport($valueskeyreport);
        $this->SetKeyWebsite($valueskeywebsite);
        $this->SetKeyDivision($valueskeydivision);
        $this->SetKeySignature($valueskeysignature);
        $this->SetKeySubdivision($valueskeysubdivision);

        // SETTER QUERY VALUES

        $this->SetValuesUser($valuesuser);
        $this->SetValuesAgency($valuesagency);
        $this->SetValuesReport($valuesreport);
        $this->SetValuesWebsite($valueswebsite);
        $this->SetValuesDivision($valuesdivision);
        $this->SetValuesSignature($valuessignature);
        $this->SetValuesSubdivision($valuessubdivision);
        $this->SetValuesAuthenticate($valuesauthenticate);
    }

    // SETTER AND GETTER KEY QUERY

    public function SetKeyUser(array $values)
    {
        return $this->keyuser = $values;
    }

    public function GetKeyUser()
    {
        return $this->keyuser;
    }

    public function SetKeyAgency(array $values)
    {
        return $this->keyagency = $values;
    }

    public function GetKeyAgency()
    {
        return $this->keyagency;
    }

    public function SetKeyReport(array $values)
    {
        return $this->keyreport = $values;
    }

    public function GetKeyReport()
    {
        return $this->keyreport;
    }

    public function SetKeyWebsite(array $values)
    {
        return $this->keywebsite = $values;
    }

    public function GetKeyWebsite()
    {
        return $this->keywebsite;
    }

    public function SetKeyDivision(array $values)
    {
        return $this->keydivision = $values;
    }

    public function GetKeyDivision()
    {
        return $this->keydivision;
    }

    public function SetKeySignature(array $values)
    {
        return $this->keysignature = $values;
    }

    public function GetKeySignature()
    {
        return $this->keysignature;
    }

    public function SetKeySubdivision(array $values)
    {
        return $this->keysubdivision = $values;
    }

    public function GetKeySubdivision()
    {
        return $this->keysubdivision;
    }

    // SETTER AND GETTER VALUE QUERY

    public function SetValuesAuthenticate($values)
    {
        return $this->authenticate = $values;
    }

    public function GetValuesAuthenticate()
    {
        return $this->authenticate;
    }

    public function SetValuesUser(array $values)
    {
        return $this->user = $values;
    }

    public function GetValuesUser()
    {
        return $this->user;
    }

    public function SetValuesAgency(array $values)
    {
        return $this->agency = $values;
    }

    public function GetValuesAgency()
    {
        return $this->agency;
    }

    public function SetValuesReport(array $values)
    {
        return $this->report = $values;
    }

    public function GetValuesReport()
    {
        return $this->report;
    }

    public function SetValuesWebsite(array $values)
    {
        return $this->website = $values;
    }

    public function GetValuesWebsite()
    {
        return $this->website;
    }

    public function SetValuesDivision(array $values)
    {
        return $this->division = $values;
    }

    public function GetValuesDivision()
    {
        return $this->division;
    }

    public function SetValuesSignature(array $values)
    {
        return $this->signature = $values;
    }

    public function GetValuesSignature()
    {
        return $this->signature;
    }

    public function SetValuesSubdivision(array $values)
    {
        return $this->subdivision = $values;
    }

    public function GetValuesSubdivision()
    {
        return $this->subdivision;
    }

    // FUNCTION VALIDATOR

    public function ValidatorForm(array $data, array $form)
    {
        return Validator::make($data, $form);
    }

    // FUNCTION PROGRESS LOAD

    public function ProgressLoad(int $data)
    {
        print_r(json_encode([$data]));
        ob_flush();
        ob_clean();
        flush();
        sleep(1);
        return $this->progressload = $data;
    }

    public function GetProgressLoad()
    {
        return $this->progressload;
    }

    // FUNCTION DATE

    public function DateLanguage()
    {
        Carbon::setLocale('id');
        setlocale(LC_TIME, 'id');
    }

    public function DateNow()
    {
        return Carbon::now();
    }

    public function DateParse($values)
    {
        return Carbon::parse($values);
    }

    public function DateFromFormat(string $format, $values)
    {
        return Carbon::createFromFormat($format, $values);
    }

    public function DateFromTimeStamp($values)
    {
        return Carbon::createFromTimeStamp($values);
    }

    // FUNCTION UPDATE OR CREATE

    public function UpdateOrCreateUser($id, $name, $email, $password)
    {
        return User::updateOrCreate(
            ['id' => $id], 
            ['name' => $name, 'email' => $email, 'password' => bcrypt($password)]
        );
    }

    public function UpdateOrCreateAgency($id, $description)
    {
        return Agency::updateOrCreate(
            ['id' => $id], 
            ['description' => $description]
        );
    }

    public function UpdateOrCreateReport($id, $status, $information, $dateupdate, $websites_id)
    {
        return Report::updateOrCreate(
            ['id' => $id], 
            ['status' => $status, 'information' => $information, 'dateupdate' => $dateupdate, 'websites_id' => $websites_id]
        );
    }

    public function UpdateOrCreateWebsite($id, $linkwebsite, $divisions_id, $subdivisions_id)
    {
        return Website::updateOrCreate(
            ['id' => $id], 
            ['linkwebsite' => $linkwebsite, 'divisions_id' => $divisions_id, 'subdivisions_id' => $subdivisions_id]
        );
    }

    public function UpdateOrCreateDivision($id, $number, $description, $agencies_id)
    {
        return Division::updateOrCreate(
            ['id' => $id], 
            ['number' => $number, 'description' => $description, 'agencies_id' => $agencies_id]
        );
    }

    public function UpdateOrCreateSignature($id, $number, $employeeidnumber, $name, $position)
    {
        return Signature::updateOrCreate(
            ['id' => $id], 
            ['number' => $number, 'employeeidnumber' => $employeeidnumber, 'name' => $name, 'position' => $position]
        );
    }

    public function UpdateOrCreateSubdivision($id, $number, $description)
    {
        return Subdivision::updateOrCreate(
            ['id' => $id], 
            ['number' => $number, 'description' => $description]
        );
    }

    // FUNCTION DELETE
    
    public function DeleteUser(int $id)
    {
        return User::destroy($id);
    }

    public function DeleteAgency(int $id)
    {
        return Agency::destroy($id);
    }

    public function DeleteReport(int $id)
    {
        return Report::destroy($id);
    }

    public function DeleteWebsite(int $id)
    {
        return Website::destroy($id);
    }

    public function DeleteDivision(int $id)
    {
        return Division::destroy($id);
    }

    public function DeleteSignature(int $id)
    {
        return Signature::destroy($id);
    }

    public function DeleteSubdivision(int $id)
    {
        return Subdivision::destroy($id);
    }

    // FUNCTION AND GETTER IMPORT

    public function FilesCheckExtension($files)
    {
        return File::extension($files);
    }

    public function FilesDelete($path)
    {
        return File::delete($path);
    }

    public function FilesReaderExtensionXls()
    {
        return ExcelIOFactory::createReader("Xls");
    }

    public function FilesReaderExtensionXlsx()
    {
        return ExcelIOFactory::createReader("Xlsx");
    }

    public function FilesSpreadsheet($spreadsheet)
    {
        return $this->filesspreadsheet = $spreadsheet;
    }

    public function GetFilesSpreadsheet()
    {
        return $this->filesspreadsheet;
    }

    public function FilesColumnStringToIndex(string $values)
    {
        return Coordinate::columnIndexFromString($values);
    }

    public function FilesScanner(int $option, $rowlower = null, $rows = null, $columns = null)
    {
        if (is_integer($option)) 
        {
            $data = null;
            $spreadsheet = $this->GetFilesSpreadsheet();
            $this->FilesReaderExcel($spreadsheet);
            $this->FilesSheetExcel(0);
            $highrow = $this->GetFilesHighestRow();
            $highcolumnstring = $this->GetFilesHighestColumn();
            $highcolumn = $this->FilesColumnStringToIndex($highcolumnstring);
                switch ($option) 
                {
                    case 0:
                        $this->FilesRowLowScanner($highcolumn, $highrow);
                        $data = $this->GetFilesRowLowScanner();
                    break;
                    case 1:
                        $this->FilesColumnScanner($highcolumn, $highrow);
                        $data = $this->GetFilesColumnScanner();
                    break;
                    case 2:
                        $this->FilesRowScanner($highrow, $rowlower);
                        $data = $this->GetFilesRowScanner();
                    break;
                    case 3:
                        $this->FilesScannerSignature($rows, $columns);
                        $data = $this->GetFilesScannerSignature();
                    break;
                    case 4:
                        $this->FilesScannerMonitoring($rows, $columns);
                        $data = $this->GetFilesScannerMonitoring();
                    break;
                    default:
                    break;
                }
            $this->filesscanner = $data;
        }
        return $this->filesscanner;
    }

    public function FilesScannerReserve(int $option, $rowlower = null, $rows = null, $columns = null)
    {
        $data = null;
        if (is_integer($option)) 
        {
            $this->DateLanguage();
            $spreadsheet = $this->GetFilesSpreadsheet();
            $this->FilesReaderExcel($spreadsheet);
            $highsheet = $this->GetFilesReaderSheetCount();
            if ($highsheet > 0) 
            {
                for ($sheet=0; $sheet < $highsheet; $sheet++) 
                { 
                    $this->FilesSheetExcel($sheet);
                    $getnameofsheet = $this->GetFilesSheetTitle();
                    if (strstr($getnameofsheet, 'Laporan ') && strstr($getnameofsheet, '-')) 
                    {
                        $highrow = $this->GetFilesHighestRow();
                        $highcolumnstring = $this->GetFilesHighestColumn();
                        $highcolumn = $this->FilesColumnStringToIndex($highcolumnstring);
                        $getstringcount = strlen($getnameofsheet);
                        $getfindindex = strpos($getnameofsheet, '-');
                        $findstring = substr($getnameofsheet, ($getfindindex + 1), $getstringcount);
                        $getdate = $this->DateFromTimeStamp(strtotime($findstring))->format('Y-m-d');
                        $date = $this->DateParse($getdate)->addDays(1)->toDateString();
                            switch ($option) 
                            {
                                case 0:
                                    $this->FilesRowLowScannerReserve($highcolumn, $highrow);
                                    $data = $this->GetFilesRowLowScannerReserve();
                                break;
                                case 1:
                                    $this->FilesColumnScannerReserve($highcolumn, $highrow);
                                    $data = $this->GetFilesColumnScannerReserve();
                                break;
                                case 2:
                                    $this->FilesRowScannerReserve($sheet, $highrow, $rowlower);
                                    $data = $this->GetFilesRowScannerReserve();
                                break;
                                case 3:
                                    $this->FilesScannerSignatureReserve($sheet, $rows, $columns);
                                    $data = $this->GetFilesScannerSignatureReserve();
                                break;
                                case 4:
                                    $this->FilesScannerMonitoringReserve($sheet, $rows, $columns);
                                    $scanner = $this->GetFilesScannerMonitoringReserve();
                                    $this->ResetFilesScannerMonitoringReserve($sheet, $date, $scanner);
                                    $data = $this->GetResetFilesScannerMonitoringReserve();
                                break;
                                default:
                                break;
                            }    
                    }
                }
            }
            $this->filesscannerreserve = $data;   
        }
        return $this->filesscannerreserve;
    }

    // FUNCTION AND GETTER EXPORT

    // EXPORT TO PDF

    public function Fpdf()
    {
        return $this->fpdf = app('Fpdf');
    }

    public function GetFpdf()
    {
        return $this->fpdf;
    }

    public function TitleToPDF(string $title)
    {
        return $this->GetFpdf()->SetTitle($title);
    }

    public function PageToPDF(string $orientation, array $margins)
    {
        return $this->GetFpdf()->AddPage($orientation, $margins);
    }

    public function FontToPDF(string $font, string $style, int $number)
    {
        return $this->GetFpdf()->SetFont($font, $style, $number);
    }

    public function NewLineToPDF(int $newline)
    {
        return $this->GetFpdf()->Ln($newline);
    }

    public function GetYToPDF()
    {
        return $this->GetFpdf()->GetY();
    }

    public function FillColorToPDF(int $red, int $green, int $blue)
    {
        return $this->GetFpdf()->setFillColor($red, $green, $blue);
    }

    public function TextColorToPDF(int $red, int $green, int $blue)
    {
        return $this->GetFpdf()->SetTextColor($red, $green, $blue);
    }

    public function WidthsToPDF(array $widths)
    {
        return $this->GetFpdf()->SetWidths($widths);
    }

    public function AlignsToPDF(array $aligns)
    {
        return $this->GetFpdf()->SetAligns($aligns);
    }

    public function ImageToPDF(string $file, int $x, int $y, int $width, int $height, string $type, string $link)
    {
        return $this->GetFpdf()->Image($file, $x, $y, $width, $height, $type, $link);
    }

    public function RowToPDF(array $data, int $height, int $line, bool $fill, bool $content = false)
    {
        return $this->GetFpdf()->Row($data, $height, $line, $fill, $content);
    }

    public function CellToPDF(int $width, int $height, string $text, int $border, int $nextline, string $align, bool $fill, string $link)
    {
        return $this->GetFpdf()->Cell($width, $height, $text, $border, $nextline, $align, $fill, $link);
    }

    public function OutputToPDF(string $destination, string $filesname, bool $utf8)
    {
        return $this->GetFpdf()->Output($destination, $filesname, $utf8);
    }

    // EXPORT TO WORD

    public function ExportWord()
    {
        return $this->exportword = new PhpWord();
    }

    public function TabWord(string $align, int $length)
    {
        return new Tab($align, $length);
    }

    public function ConverterSpaceWord(int $space)
    {
        return Converter::pointToTwip($space);
    }

    public function ConverterImageCentimetersToPixelWord(int $centimeter)
    {
        return Converter::cmToPixel($centimeter);
    }

    public function ImageAlignWord()
    {
        return Image::POSITION_ABSOLUTE;
    }

    public function TableAlignWord()
    {
        return JcTable::CENTER;
    }

    public function TableLayoutWord()
    {
        return Table::LAYOUT_FIXED;
    }

    public function CustomOutputWord(string $version)
    {
        return $this->customoutputword = WordIOFactory::createWriter($this->GetExportWord(), $version);
    }

    // EXPORT TO EXCEL

    public function SpreadsheetToExcel()
    {
        return $this->spreadsheettoexcel = new Spreadsheet(); 
    }

    public function GetSpreadsheetToExcel()
    {
        return $this->spreadsheettoexcel;
    }

    public function DrawingToExcel()
    {
        return $this->drawingtoexcel = new Drawing;
    }

    public function FilesWriterExtensionXlsx($spreadsheet, string $extension)
    {
        return ExcelIOFactory::createWriter($spreadsheet, $extension);
    }
    
    public function PageSetupOrientationToExcel()
    {
        return PageSetup::ORIENTATION_LANDSCAPE;
    }

    public function PageSetupPaperSizeToExcel()
    {
        return PageSetup::PAPERSIZE_FOLIO;
    }

    public function StyleAlignmentHorizontalCenterToExcel()
    {
        return Alignment::HORIZONTAL_CENTER;
    }

    public function StyleAlignmentHorizontalLeftToExcel()
    {
        return Alignment::HORIZONTAL_LEFT;
    }

    public function StyleAlignmentVerticalToExcel()
    {
        return Alignment::VERTICAL_CENTER;
    }

    public function StyleBorderToExcel()
    {
        return Border::BORDER_THIN;
    }

    public function StyleFillToExcel()
    {
        return Fill::FILL_SOLID;
    }

    public function ExportToExcel(int $page, string $filesname, array $itemsignature, array $itemexport, $first = null, $last = null)
    {
        $this->filesexcel = null;
        if (is_integer($page) && !empty($filesname)) 
        {
            $this->SpreadsheetToExcel();
            $spreadsheet = $this->GetSpreadsheetToExcel();
            $sheet = $spreadsheet->getActiveSheet();
            switch ($page) 
            {
                case 0:
                    $this->ExportByMonthToExcel($page, $sheet, $itemsignature, $itemexport);
                break;
                case 1:
                    $this->ExportByDateToExcel($page, $sheet, $itemsignature, $itemexport, $first, $last);
                break;
                case 2:
                    $this->ExportByWebsiteIdToExcel($page, $sheet, $itemsignature, $itemexport);
                break;
                default:
                break;
            }

            $writer = $this->FilesWriterExtensionXlsx($spreadsheet, "Xlsx");
            $writer->save(base_path('resources\assets\files'.$filesname));
            $this->filesexcel = response()->download(base_path('resources\assets\files'.$filesname))->deleteFileAfterSend(true);
        }

        return $this->filesexcel;
    }
}
?>