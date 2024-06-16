<?php 

namespace App\Setup;

class Manage
{
    // VARIABLE ROWS

    var $rows;                  //  variable rows

    // VARIABLE QUERY

    var $keys;                  //  variable keys
    var $query;                 //  variable query
    var $authenticate;          //  variable authenticate

    // VARIABLE FIND

    var $finds;                 //  variable finds
    var $multifinds;            //  variable multifinds

    // VARIABLE WHERE

    var $where;                 //  variable where

    // VARIABLE STACKS

    var $stacks;                 //  variable stacks

    // VARIABLE ORDERBY

    var $orderby;               //  variable orderby

    // VARIABLE GROUPBY

    var $groupby;               //  variable groupby

    // VARIABLE DISTINCT

    var $distinct;              //  variable distinct

    // VARIABLE INDEX

    var $userindex;             //  variable userindex
    var $agencyindex;           //  variable agencyindex
    var $reportindex;           //  variable reportindex
    var $signatureindex;        //  variable signatureindex
    var $reportindexopen;       //  variable reportindexopen
    var $monitoringindex;       //  variable monitoringindex
    var $reportindexdetailopen; //  variable reportindexdetailopen

    // GETTER ROWS 

    public function GetRows()
    {
        return $this->rows;
    }

    // GETTER QUERY 

    public function GetKey()
    {
        return $this->keys;
    }

    public function GetAuthenticate()
    {
        return $this->authenticate;
    }

    public function GetQuery()
    {
        return $this->query;
    }

    // GETTER FIND

    public function GetFind()
    {
        return $this->finds;
    }

    public function GetMultiFind()
    {
        return $this->multifinds;
    }

    // GETTER WHERE

    public function GetWhere()
    {
        return $this->where;
    }

    // GETTER STACK

    public function GetStack()
    {
        return $this->stacks;
    }

    // GETTER ORDERBY

    public function GetOrderBy()
    {
        return $this->orderby;
    }

    // GETTER GROUPBY

    public function GetGroupBy()
    {
        return $this->groupby;
    }

    // GETTER DISTINCT

    public function GetDistinct()
    {
        return $this->distinct;
    }

    // GETTER INDEX 

    public function GetUserIndex()
    {
        return $this->userindex;
    }

    public function GetAgencyIndex()
    {
        return $this->agencyindex;
    }

    public function GetSignatureIndex()
    {
        return $this->signatureindex;
    }

    public function GetReportIndex()
    {
        return $this->reportindex;
    }

    public function GetReportIndexOpen()
    {
        return $this->reportindexopen;
    }

    public function GetReportIndexDetailOpen()
    {
        return $this->reportindexdetailopen;
    }

    public function GetMonitoringIndex()
    {
        return $this->monitoringindex;
    }

    // SETTER QUERY

    public function Authenticate($values)
    {
        return $this->authenticate = $values;
    }

    // FUNCTION ROWS

    public function Rows(array $values)
    {
        return $this->rows = $values;
    }

    // FUNCTION KEY 

    public function Key(array $items)
    {
        $data = array();
        if (count($items) > 0) 
        {
            for ($item=0; $item < count($items); $item++) 
            { 
                $data[] = array_keys($items[$item]);
            }
        }
        return $this->keys = $data;
    }

    // FUNCTION QUERY

    public function Query(array $key, array $items)
    {
        $data = array();
        if (count($key) > 0 && count($items) > 0) 
        {
            for ($row=0; $row < count($items); $row++) 
            {
                $rows = array();
                if (count($key[$row]) > 0) 
                {
                    for ($column=0; $column < count($key[$row]); $column++) 
                    { 
                        $rows[] = $items[$row][$key[$row][$column]];
                    }
                }
                $data[] = $rows; 
            }
        }
        return $this->query = $data;
    }
    
    // FUNCTION FIND 

    public function Find(int $columns, $find, array $items, string $operator)
    {
        $data = array();
        if (is_integer($columns) && !empty($find) && count($items) > 0 && !empty($operator)) 
        {
            for ($row=0; $row < count($items); $row++) 
            { 
                $rows = array();
                    if (count($items[$row]) > 0) 
                    {
                        for ($column=0; $column < count($items[$row]); $column++) 
                        { 
                            if (strtolower($operator) == 'true') 
                            {
                                if (in_array($find, [$items[$row][$columns]])) 
                                {
                                    $rows[] = $items[$row][$column];
                                } 
                            } 
                            elseif (strtolower($operator) == 'false') 
                            {
                                if (!in_array($find, [$items[$row][$columns]])) 
                                {
                                    $rows[] = $items[$row][$column];
                                } 
                            } 
                            elseif (strtolower($operator) == 'like') 
                            {
                                if (strpos(strtolower($items[$row][$columns]), strtolower($find)) !== false) 
                                {
                                    $rows[] = $items[$row][$column];
                                }
                            }
                        }
                    }
                if (count($rows) > 0) 
                {
                    $data[] = $rows;
                }
            }
        } 
        return $this->finds = $data;
    }

    public function MultiFind(array $columns, array $operator, array $find, array $items)
    {
        $data = array();
        $countfind = count($find);
        $countcolumns = count($columns);
        $countoperator = count($operator);
        $countmultifind = $countcolumns = $countfind = $countoperator;
        if (count($columns) > 0 && count($operator) > 0 && count($find) > 0 && count($items) > 0) 
        {
            if ((count($columns) == count($find)) && (count($find) == count($operator))) 
            {
                if ($countmultifind > 0) 
                {
                    for ($multifind = 0; $multifind < $countmultifind; $multifind++) 
                    { 
                        $rows = array();
                            if ($operator[$multifind] == '==')
                            {
                                for ($row = 0; $row < count($items); $row++) 
                                { 
                                    $datarows = array();
                                        if (count($items[$row]) > 0) 
                                        {
                                            for ($column = 0; $column < count($items[$row]); $column++) 
                                            { 
                                                if (in_array($find[$multifind], [$items[$row][$columns[$multifind]]])) 
                                                {
                                                    $datarows[] = $items[$row][$column];
                                                }
                                            }
                                        }
                                    if (count($datarows) > 0) 
                                    {
                                        $rows[] = $datarows;
                                    }
                                }
                            } 
                            elseif ($operator[$multifind] == '<>') 
                            {
                                for ($row = 0; $row < count($items); $row++) 
                                { 
                                    $datarows = array();
                                        if (count($items[$row]) > 0) 
                                        {
                                            for ($column = 0; $column < count($items[$row]); $column++) 
                                            { 
                                                if (!in_array($find[$multifind], [$items[$row][$columns[$multifind]]])) 
                                                {
                                                    $datarows[] = $items[$row][$column];
                                                }
                                            }
                                        }
                                    if (count($datarows) > 0) 
                                    {
                                        $rows[] = $datarows;
                                    }
                                }
                            } 
                            elseif (strtolower($operator[$multifind]) == 'like') 
                            {
                                for ($row = 0; $row < count($items); $row++) 
                                { 
                                    $datarows = array();
                                        if (count($items[$row]) > 0) 
                                        {
                                            for ($column = 0; $column < count($items[$row]); $column++) 
                                            { 
                                                if (strpos(strtolower($items[$row][$columns[$multifind]]), strtolower($find[$multifind])) !== false) 
                                                {
                                                    $datarows[] = $items[$row][$column];
                                                }
                                            }
                                        }
                                    if (count($datarows) > 0) 
                                    {
                                        $rows[] = $datarows;
                                    }
                                }
                            }
                        $data[] = $rows;
                    }
                }
            }
        }
        return $this->multifinds = $data;
    }

    // FUNCTION WHERE

    public function Where(array $operator, array $items)
    {
        $data = array();
        if (count($operator) > 0 && count($items) > 0) 
        {
            if ((count($items) === (count($operator) + 1)) && (count($operator) === (count($items) - 1))) 
            {
                if (count($items) > count($operator)) 
                {
                    for($row = 0; $row < count($operator); $row++)
                    {  
                        $rows = ($row > 0) ? array_merge($items[$row + 1],$data[$row - 1]) : array_merge($items[$row],$items[$row + 1]);
                        $data[] = (strtolower($operator[$row]) === 'and') ? array_values(array_diff_key($rows, array_unique($rows, SORT_REGULAR))) : array_values(array_unique($rows, SORT_REGULAR));
                    }
                }
            }
        }  
        return $this->where = end($data) == false ? [] : end($data);
    }

    // FUNCTION STACK

    public function Stack(array $items, array $columns, array $rowstack, array $columnstack)
    {
        $data = array();
        $countcolumns = count($columns);
        $countrowstack = count($rowstack);
        $countcolumnstack = count($columnstack);
        $countstack = $countrowstack = $countcolumns = $countcolumnstack;
        if (count($items) > 0 && count($columns) > 0 && count($rowstack) > 0 && count($columnstack) > 0) 
        {
            if ($countstack > 0)
            {
                if ((count($columns) == count($rowstack)) && (count($columns) == count($columnstack)))
                {
                    for ($item=0; $item < count($items); $item++) 
                    { 
                        for ($stack=0; $stack < $countstack; $stack++) 
                        { 
                            for ($row=0; $row < count($rowstack[$stack]); $row++) 
                            { 
                                for ($column=0; $column < count($rowstack[$stack][$row]); $column++) 
                                { 
                                    if (in_array($items[$item][$columns[$stack]], [$rowstack[$stack][$row][$columnstack[$stack]]])) 
                                    {
                                        array_push($items[$item], $rowstack[$stack][$row][$column]);  
                                    }  
                                }
                            }
                        } 
                    }
                }
            }
        }
        return $this->stacks = (count($items) > 0) ? $items : [];
    }

    // FUNCTION ORDERBY

    public function OrderBy(array $items, int $columns, string $operator)
    {
        $data = array();
        if (count($items) > 0 && !empty($columns) && !empty($operator)) 
        {
            for ($row=0; $row < count($items); $row++) 
            { 
                $data[$row] = $items[$row][$columns];
            }
            array_multisort($data, (strtolower($operator) === 'asc') ? SORT_ASC : SORT_DESC, $items);
        }
        return $this->orderby = (count($items) > 0) ? $items : [];
    }

    // FUNCTION GROUPBY

    public function GroupBy(array $items, int $columns)
    {
        $data = null;
        if (count($items) > 0 && !empty($columns)) 
        {
            $data = array_values(array_intersect_key($items, array_unique(array_column($items, $columns), SORT_REGULAR)));
        }
        return $this->groupby = ($data == null) ? [] : $data;
    }

    // FUNCTION DISTINCT

    public function Distinct(array $items)
    {
        $data = null;
        if (count($items) > 0) 
        {
            $data = array_values(array_unique($items, SORT_REGULAR));
        }
        return $this->distinct = ($data == null) ? [] : $data;   
    }

    // FUNCTION INDEX 

    public function UserIndex(array $items)
    {
        $number = 0;
        $rows = array();
        if (count($items) > 0) 
        {
            for ($row=0; $row < count($items); $row++) 
            {
                $number++;
                $this->Rows([$number, $items[$row][0], $items[$row][1], $items[$row][2], $items[$row][4]]);
                $rows[] = $this->GetRows();
            }
        }
        return $this->userindex = array("data" => $rows);
    }

    public function AgencyIndex(array $items)
    {
        $number = 0;
        $rows = array();
        if (count($items) > 0) 
        {
            for ($row=0; $row < count($items); $row++) 
            {
                $number++;
                $this->Rows([$number, $items[$row][0], $items[$row][1]]);
                $rows[] = $this->GetRows();
            }
        }
        return $this->agencyindex = array("data" => $rows);
    }

    public function SignatureIndex(array $items)
    {
        $rows = array();
        if (count($items) > 0) 
        {
            for ($row=0; $row < count($items); $row++) 
            {
                $this->Rows([$items[$row][0], $items[$row][1], $items[$row][2], $items[$row][3], $items[$row][4]]);
                $rows[] = $this->GetRows();
            }
        }
        return $this->signatureindex = array("data" => $rows);
    }

    public function ReportIndex(int $option, array $items)
    {
        $number = 0;
        $rows = array();
        if (!empty($option) && count($items) > 0) 
        {
            for ($row=0; $row < count($items); $row++) 
            {
                $number++;
                $this->Rows([$option, $number, $items[$row][0], $items[$row][1], $items[$row][2], $items[$row][3], $items[$row][4]]);
                $rows[] = $this->GetRows();
            }
        }
        return $this->reportindex = array("data" => $rows);
    }

    public function ReportIndexOpen(int $option, array $items)
    {
        $number = 0;
        $rows = array();
        if (!empty($option) && count($items) > 0) 
        {
            for ($row=0; $row < count($items); $row++) 
            {
                $number++;
                $this->Rows([$option, $number, $items[$row][0], $items[$row][2], $items[$row][3]]);
                $rows[] = $this->GetRows();
            }
        }
        return $this->reportindexopen = array("data" => $rows);
    }

    public function ReportIndexDetailOpen(array $items)
    {
        $number = 0;
        $rows = array();
        if (count($items) > 0) 
        {
            for ($row=0; $row < count($items); $row++) 
            { 
                $number++;
                $this->Rows([$number, $items[$row][0], $items[$row][1], $items[$row][2], $items[$row][3], $items[$row][4], $items[$row][5], $items[$row][6], $items[$row][7], $items[$row][8]]);
                $rows[] = $this->GetRows();
            }
        }
        return $this->reportindexdetailopen = array("data" => $rows);
    }

    public function MonitoringIndex(array $items)
    {
        $rows = array();
        if (count($items) > 0) 
        {
            for ($row=0; $row < count($items); $row++) 
            { 
                $this->Rows([$items[$row][0], $items[$row][1], $items[$row][2], $items[$row][3], $items[$row][4], $items[$row][5], $items[$row][6], $items[$row][7], $items[$row][8], $items[$row][9], $items[$row][10], $items[$row][11]]);
                $rows[] = $this->GetRows();
            }
        }
        return $this->monitoringindex = array("data" => $rows);
    }
}
?>