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
/*
    public function insertInDB($xml) {
        $numberOfRecords = count($xml->result->Leads->row);
        /* $records[row value][field value] 
        $records[][] = array();
        for ($i = 0; $i < $numberOfRecords; $i++) {
            $numberOfValues = count($xml->result->Leads->row[$i]->FL);
            for ($j = 0; $j < $numberOfValues; $j++) {
                switch ((string) $xml->result->Leads->row[$i]->FL[$j]['val']) {
                    /* Get attributes as element indices 
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
        /* Inserting in database 
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
             
        } else {
            echo 'Some error while inserting in database';
        }
    }
  */
    
    
     public function loadLeadsXml($records) {

        $xmls = '<Leads> <row no="1">';
        //$numberOfRecords = count($xml->result->Cases->row);        
        $keys=array_keys($records);
        //for ($i = 0; $i < $numberOfRecords; $i++) {
            $numberOfValues = count($records);
            for ($j = 0; $j < $numberOfValues; $j++) {
                switch ((string)$keys[$j]) {
                    case 'Last Name':
                        $xmls .='<FL val="Last Name">'.$records['Last Name'].'</FL>';
                        break;
                    case 'Phone':
                        $xmls .='<FL val="Phone">'.$records['Phone'].'</FL>';
                        break;
                    case 'Email':
                        $xmls .='<FL val="Email">'.$records['Email'].'</FL>';                        
                        break;
                    case 'Estatus':
                        $xmls .='<FL val="Estatus">'.$records['Estatus'].'</FL>';
                        break;
                    case 'Lead Source':
                        $xmls .='<FL val="Lead Source">'.$records['Lead Source'].'</FL>';
                        break;
                    case 'Referido por':
                        $xmls .='<FL val="Referido por">'.$records['Referido por'].'</FL>';
                        break;
                    case 'Fecha de Creación':
                        $xmls .='<FL val="Fecha de Creación">'.$records['Fecha de Creación'].'</FL>';
                        break;
                    
                    default :
                        break;
                }
        }
        
        $xmls .= '</row> </Leads>';
      return $xmls;
     }

    ///fin leads
     public function loadXml($records) {

        $xmls = '<Cases> <row no="1">';
        //$numberOfRecords = count($xml->result->Cases->row);        
        $keys=array_keys($records);
        //for ($i = 0; $i < $numberOfRecords; $i++) {
            $numberOfValues = count($records);
            for ($j = 0; $j < $numberOfValues; $j++) {
                switch ((string)$keys[$j]) {
                    case 'Case Number':
                        $xmls .='<FL val="Case Number">'.$records['Case Number'].'</FL>';
                        break;
                    case 'Case Owner':
                        $xmls .='<FL val="Case Owner">'.$records['Case Owner'].'</FL>';
                        break;
                    case 'Case Origin':
                        $xmls .='<FL val="Case Origin">'.$records['Case Origin'].'</FL>';
                        break;
                    case 'Subject':
                        $xmls .='<FL val="Subject">'.$records['Subject'].'</FL>';
                        break;
                    case 'Account Name':
                        $xmls .='<FL val="Account Name">'.$records['Account Name'].'</FL>';
                        break;
                    case 'Phone':
                        $xmls .='<FL val="Phone">'.$records['Phone'].'</FL>';
                        break;
                    case 'Email':
                        $xmls .='<FL val="Email">'.$records['Email'].'</FL>';                        
                        break;
                    case 'Status':
                        $xmls .='<FL val="Status">'.$records['Status'].'</FL>';
                        break;
                    case 'Case Reason':
                        $xmls .='<FL val="Case Reason">'.$records['Case Reason'].'</FL>';
                        break;
                     case 'Priority':
                        $xmls .='<FL val="Priority">'.$records['Priority'].'</FL>';
                        break;
                    case 'Reported By':
                        $xmls .='<FL val="Reported By">'.$records['Reported By'].'</FL>';
                        break;
                    default :
                        break;
                }
        }
        
        $xmls .= '</row> </Cases>';
      return $xmls;
     }

    
     public function printObj($xml) {
         
        $numberOfRecords = count($xml->result->Cases->row);
        //print_r($numberOfRecords);
        //$records[row value][field value] 
        $records[][] = array();
        for ($i = 0; $i < $numberOfRecords; $i++) {
            $numberOfValues = count($xml->result->Cases->row[$i]->FL);
            //print_r($xml->result->Cases->row[$i]);
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
                    case 'Priority':
                        $records[$i]['Priority'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    case 'Case Reason':
                        $records[$i]['Case Reason'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                     
                    case 'Case Origin':
                        $records[$i]['Case Origin'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;       
                    case 'Subject':
                        $records[$i]['Subject'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    case 'Reported By':
                        $records[$i]['Reported By'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    case 'Email':
                        $records[$i]['Email'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    
                    case 'Phone':
                        $records[$i]['Phone'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    
                    case 'Account Name':
                        $records[$i]['Account Name'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    case 'Status':
                        $records[$i]['Status'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        //print_r($records[$i]['Status']);
                        break;
                    case 'Número de Contrato':
                        $records[$i]['Número de Contrato'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        break;
                    //print_r($records[$i]['Número de Contrato']);
                    case 'Tipo de Contrato':
                        $records[$i]['Tipo de Contrato'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        //print_r($records[$i]['Tipo de Contrato']);
                        break;
                    case 'Dpto. Encargado':
                        $records[$i]['Dpto. Encargado'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        //print_r($records[$i]['Dpto. Encargado']);
                        break;
                    case 'Nombre de contacto':
                        $records[$i]['Nombre de contacto'] = (string) $xml->result->Cases->row[$i]->FL[$j];
                        //print_r($records[$i]['Nombre de contacto']);
                        break;
                    
                    
                    
                }
            }
        }
        
        
       //Descomentar esto 
       //print_r($records);
       return $records;
     }
/*
  public function printCObj($xml) {
        $numberOfRecords = count($xml->result->Leads->row);
        /* $records[row value][field value] 
        $records[][] = array();
        for ($i = 0; $i < $numberOfRecords; $i++) {
            $numberOfValues = count($xml->result->Leads->row[$i]->FL);
            for ($j = 0; $j < $numberOfValues; $j++) {
                switch ((string) $xml->result->Leads->row[$i]->FL[$j]['val']) {
                    /* Get attributes as element indices 
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
*/
}
