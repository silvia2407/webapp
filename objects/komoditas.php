<?php
    include_once '../config/auth.php';
    include_once '../config/callAPI.php';
    
    $get_data = callAPI('POST', 'komoditas/all', $key, false);
    $response = json_decode($get_data, true);
    
    for($i=0;$i<count($response['list_komoditas']);$i++){
            $return[$i]=array(
                'html'=>$response['list_komoditas'][$i]['komoditas'],
                'value'=>$response['list_komoditas'][$i]['idkomoditas'],
                'label'=>$response['list_komoditas'][$i]['komoditas'],
            );
    }  
    echo json_encode($return);
    
?>

