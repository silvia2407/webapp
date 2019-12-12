<?php
    include_once '../config/callAPI_ext.php';
    
    $get_data = callAPI('GET', 'http://andalancahayasejahtera.com/hotel/api/wilayah/read.php', false);
    $response = json_decode($get_data, true);
    //print_r($response);
    
    for($i=0;$i<count($response);$i++){
            $return[$i]=array(
                'html'=>$response[$i]['nama_prop'],
                'value'=>$response[$i]['kode'],
                'label'=>$response[$i]['nama_prop']
            );
    }  
    echo json_encode($return);
    
?>

