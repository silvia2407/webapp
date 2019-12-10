
        <?php
            include_once 'header.php';
            include_once 'config/auth.php';
            include_once 'config/callAPI.php';
            
            $data_array =  array(
                "komoditas"=> "all",
                "kota"=>"all",
                "bulan"=>1,
                "tahun"=>2018
            );

            $get_data = callAPI('GET', 'pertumbuhan/yearOnyear.php', $key, $data_array);
            //$get_data = callAPI('POST', 'komoditas/all', $key, false);
            $response = json_decode($get_data, true);

            print_r($response);
        ?>
