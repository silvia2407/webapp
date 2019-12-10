<?php

function callAPI($method, $url, $token, $data)
{
    $url="https://hargaeceran.000webhostapp.com/".$url;
    $curl = curl_init();
    
    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
            {
                $url = sprintf("%s?%s", $url, http_build_query($data));
            }
                
    }

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Authorization: Bearer '.$token,
       'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

   
    $result = curl_exec($curl);
    $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);
    
    return $result;
}
?>

