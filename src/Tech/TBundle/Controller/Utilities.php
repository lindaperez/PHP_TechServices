<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




class Utilities {

    
    public function setParameter($key, $value, $parameter) {
        if ($parameter === "" || strlen($parameter) == 0) {
            $parameter = $key . '=' . $value;
        } else {
            $parameter .= '&' . $key . '=' . $value;
        }
        return $parameter;
    }

    public function parseXMLandInsertInDB($xmldata) {
        $xmlString = <<<XML
$xmldata 
XML;
        $xml = simplexml_load_string($xmlString);
        if (isset($xml->result)) {
            $modeuleDependantObj = new moduleDependant();
          //  $output = $modeuleDependantObj->insertInDB($xml);
            $output = $modeuleDependantObj->printObj($xml);
        } else if (isset($xml->error)) {
            echo "Error code: " . $xml->error->code . "<br/>";
            echo "Error message: " . $xml->error->message;
        }
    }

    public function sendCurlRequest($url, $parameter) {
        try {
            /* initialize curl handle */
            $ch = curl_init();
            /* set url to send post request */
            curl_setopt($ch, CURLOPT_URL, $url);
            /* allow redirects */
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            /* return a response into a variable */
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            /* times out after 30s */
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            /* set POST method */
            curl_setopt($ch, CURLOPT_POST, 1);
            /* add POST fields parameters */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parameter);
            /* execute the cURL */
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        } catch (Exception $exception) {
            echo 'Exception Message: ' . $exception->getMessage() . '<br/>';
            echo 'Exception Trace: ' . $exception->getTraceAsString();
        }
    }

  
}

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
  public function printObj($xml) {
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
        print_r($records);
        /* Inserting in database */
        /*
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
        /*
        } else {
            echo 'Some error while inserting in database';
        }
        */
    }

}
