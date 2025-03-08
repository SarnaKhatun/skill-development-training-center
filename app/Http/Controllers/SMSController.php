<?php

namespace App\Http\Controllers;



class SMSController extends Controller
{

   public static function sendSMS($to, $body)
    {
        $user_id = "108408";
        $password = "ramjanali180636";
        $message_url="https://sms.rapidsms.xyz/request.php?user_id=".$user_id."&password=".$password."&number=".$to."&message=".urlencode($body);
        $curl = curl_init();
        curl_setopt ($curl, CURLOPT_URL, $message_url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT_MS, 3600);
        $resultdata = curl_exec ($curl);
        curl_close ($curl);
        $resultArray=json_decode($resultdata, true);
        return $resultArray;
    }


}
