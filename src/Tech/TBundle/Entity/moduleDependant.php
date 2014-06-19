<?php
namespace Tech\TBundle\Entity;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class moduleDependant {
    /* Define your mysql database parameters */

    private $host = "hostname";
    private $username = "mysql_username";
    private $password = "mysql_password";

    public function insertInDB($xml) {
        $numberOfRecords = count($xml->result->Leads->row);
        /* $records[row value][field value] */
        $records[][] = array();
        for ($i = 0; $i < $numberOfRecords; $i++) {
            $numberOfValues = count($xml->result->Leads->row[$i]->FL);
            for ($j = 0; $j < $numberOfValues; $j++) {
                switch ((string) $xml->result->Leads->row[$i]->FL[$j]['val']) {
                    /* Get attributes as element indices */
                    case 'LEADID':
                        $records[$i]['LEADID'] = (string) $xml->result->Leads->row[$i]->FL[$j];
                        break;
                    case 'First Name':
                        $records[$i]['First Name'] = (string) $xml->result->Leads->row[$i]->FL[$j];
                        break;
                    case 'Last Name':
                        $records[$i]['Last Name'] = (string) $xml->result->Leads->row[$i]->FL[$j];
                        break;
                    case 'Company':
                        $records[$i]['Company'] = (string) $xml->result->Leads->row[$i]->FL[$j];
                        break;
                }
            }
        }
        /* Inserting in database */
        $connection = mysql_connect($this->host, $this->username, $this->password) or die(mysql_error());
        $query = "Insert into crm.leads (id, firstname, lastname, company) value ";
        for ($k = 0; $k < count($records); $k++) {
            if ($k == 0) {
                $query .= "('" . $records[$k]['LEADID'] . "','" . $records[$k]['First Name'] . "','" . $records[$k]['Last Name'] . "','" . $records[$k]['Company'] . "')";
            }
            if ($k > 0) {
                $query .= ", ('" . $records[$k]['LEADID'] . "','" . $records[$k]['First Name'] . "','" . $records[$k]['Last Name'] . "','" . $records[$k]['Company'] . "')";
            }
        }
        $result = mysql_query($query, $connection) or die(mysql_error());
        if (isset($result) && mysql_affected_rows($connection) == count($records)) {
            echo "Data's are inserted in database successfully.<br/><br/> ";

            /* Table structure of inserted data, you can check inserted data by uncommenting a below section */
            /*
              $insertedTable = "<table cellspacing=0 cellpadding='4px' border=1>";
              $insertedTable .= "<tr><td>Lead ID</td><td>First Name</td><td>Last Name</td><td>Company</td></tr>";
              for ($k = 0; $k < count($records); $k++) {
              $insertedTable .= "<tr><td>" . $records[$k]['LEADID'] . "</td><td>" . $records[$k]['First Name'] . "</td><td>" . $records[$k]['Last Name'] . "</td><td>" . $records[$k]['Company'] . "</td></tr>";
              }
              $insertedTable .= "</table>";
              echo $insertedTable;
             */
        } else {
            echo 'Some error while inserting in database';
        }
    }
    
    public function insertCasesInDB($xml) {
    /* Inserting in database */
        $connection = mysql_connect($this->host, $this->username, $this->password) or die(mysql_error());
        $query = "Insert into crm.leads (id, firstname, lastname, company) value ";
        for ($k = 0; $k < count($records); $k++) {
            if ($k == 0) {
                $query .= "('" . $records[$k]['LEADID'] . "','" . $records[$k]['First Name'] . "','" . $records[$k]['Last Name'] . "','" . $records[$k]['Company'] . "')";
            }
            if ($k > 0) {
                $query .= ", ('" . $records[$k]['LEADID'] . "','" . $records[$k]['First Name'] . "','" . $records[$k]['Last Name'] . "','" . $records[$k]['Company'] . "')";
            }
        }
        $result = mysql_query($query, $connection) or die(mysql_error());
        if (isset($result) && mysql_affected_rows($connection) == count($records)) {
            echo "Data's are inserted in database successfully.<br/><br/> ";

            /* Table structure of inserted data, you can check inserted data by uncommenting a below section */
            /*
              $insertedTable = "<table cellspacing=0 cellpadding='4px' border=1>";
              $insertedTable .= "<tr><td>Lead ID</td><td>First Name</td><td>Last Name</td><td>Company</td></tr>";
              for ($k = 0; $k < count($records); $k++) {
              $insertedTable .= "<tr><td>" . $records[$k]['LEADID'] . "</td><td>" . $records[$k]['First Name'] . "</td><td>" . $records[$k]['Last Name'] . "</td><td>" . $records[$k]['Company'] . "</td></tr>";
              }
              $insertedTable .= "</table>";
              echo $insertedTable;
             */
        } else {
            echo 'Some error while inserting in database';
        }
        
    }
    
    
     public function printObj($xml) {
         
        $numberOfRecords = count($xml->result->Cases->row);
        //print_r($numberOfRecords);
        // $records[row value][field value] 
        $records[][] = array();
        for ($i = 0; $i < $numberOfRecords; $i++) {
            $numberOfValues = count($xml->result->Cases->row[$i]->FL);
            for ($j = 0; $j < $numberOfValues; $j++) {
                switch ((string) $xml->result->Cases->row[$i]->FL[$j]['val']) {
                    case 'CASEID':
                        $records[$i]['CASEID'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    case 'Case Number':
                        $records[$i]['Case Number'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    case 'Case Owner':
                        $records[$i]['Case Owner'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    case 'Case Origin':
                        $records[$i]['Case Origin'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    case 'Subject':
                        $records[$i]['Subject'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    case 'Account Name':
                        $records[$i]['Account Name'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    case 'Phone':
                        $records[$i]['Phone'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    case 'Email':
                        $records[$i]['Email'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    case 'Status':
                        $records[$i]['Status'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    case 'Case Reason':
                        $records[$i]['Case Reason'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                     case 'Priority':
                        $records[$i]['Priority'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    case 'Reported By':
                        $records[$i]['Reported By'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    
                }
            }
        }
        
        
       //Descomentar esto 
       print_r($records);
       
     }

  public function printCObj($xml) {
        $numberOfRecords = count($xml->result->Leads->row);
        /* $records[row value][field value] */
        $records[][] = array();
        for ($i = 0; $i < $numberOfRecords; $i++) {
            $numberOfValues = count($xml->result->Leads->row[$i]->FL);
            for ($j = 0; $j < $numberOfValues; $j++) {
                switch ((string) $xml->result->Leads->row[$i]->FL[$j]['val']) {
                    /* Get attributes as element indices */
                    case 'LEADID':
                        $records[$i]['LEADID'] = (string) $xml->result->Leads->row[$i]->FL[$j];
                        break;
                    case 'First Name':
                        $records[$i]['First Name'] = (string) $xml->result->Leads->row[$i]->FL[$j];
                        break;
                    case 'Last Name':
                        $records[$i]['Last Name'] = (string) $xml->result->Leads->row[$i]->FL[$j];
                        break;
                    case 'Company':
                        $records[$i]['Company'] = (string) $xml->result->Leads->row[$i]->FL[$j];
                        break;
                }
            }
        }
       //Descomentar esto 
       print_r($records);

    }

}
