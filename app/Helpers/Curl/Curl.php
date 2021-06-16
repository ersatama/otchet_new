<?php


namespace App\Helpers\Curl;


class Curl
{
    public function post(string $url, string $token, array $data)
    {

        $curl   =   curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL             =>  $url,
            CURLOPT_RETURNTRANSFER  =>  true,
            CURLOPT_ENCODING        =>  '',
            CURLOPT_MAXREDIRS       =>  10,
            CURLOPT_TIMEOUT         =>  0,
            CURLOPT_FOLLOWLOCATION  =>  true,
            CURLOPT_HTTP_VERSION    =>  CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   =>  'POST',
            CURLOPT_POSTFIELDS      =>  json_encode($data),
            CURLOPT_HTTPHEADER      =>  [
                'Content-Type: application/json',
                'Authorization: key='.$token,
            ],
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
