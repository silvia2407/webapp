<?php
    include_once '../config/callAPI_ext.php';

    if(isset($_POST['provinsi'])){
        $data_array =  array(
            "kodeprop"=> $_POST['provinsi'],
            "token"=>"f9428072fde3f9f5ef5941fa1f087fcf"
        );

        $get_data = callAPI('GET', 'http://andalancahayasejahtera.com/hotel/api/hotel/read_prop.php', $data_array);
        
        $response = json_decode($get_data, true);
        
        if(isset($response['message'])){
            $return['message']=0;
        }else{
            $return['message']=1;
            $return['data']=$response;
        }
        echo json_encode($return);
        
    }
    
?>
