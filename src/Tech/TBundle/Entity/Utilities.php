<?php
namespace Tech\TBundle\Entity;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Tech\TBundle\Entity\moduleDependant;


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

