<?php
    include_once '../config/auth.php';
    include_once '../config/callAPI.php';
    
    $get_data = callAPI('POST', 'kota/all', $key, false);
    $response = json_decode($get_data, true);
    //print_r($response);
    
    for($i=0;$i<count($response['list_kota']);$i++){
            $return[$i]=array(
                'html'=>$response['list_kota'][$i]['kota'],
                'value'=>$response['list_kota'][$i]['idkota'],
                'label'=>$response['list_kota'][$i]['kota'],
            );
    }  
    echo json_encode($return);
    
?>

