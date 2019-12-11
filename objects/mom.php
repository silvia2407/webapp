<?php
    include_once '../config/auth.php';
    include_once '../config/callAPI.php';

    if(isset($_POST['kota']) && isset($_POST['komoditas']) && isset($_POST['bulan']) && isset($_POST['tahun'])){
        $data_array =  array(
            "komoditas"=> "'".$_POST['komoditas']."'",
            "kota"=>"'".$_POST['kota']."'",
            "bulan"=>$_POST['bulan'],
            "tahun"=>$_POST['tahun']
        );

        $get_data = callAPI('GET', 'pertumbuhan/monthOnmonth.php', $key, $data_array);
        
        $response = json_decode($get_data, true);
        
        if(isset($response['message'])){
            $return['message']=0;
        }else{
            $return['message']=1;
            $return['data']=$response['monthOnmonth'];
        }
        echo json_encode($return);
    }
    
?>
