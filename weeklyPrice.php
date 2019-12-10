<?php
    include_once 'header.php';
    include_once 'config/auth.php';
    include_once 'config/callAPI.php';

//    $data_array =  array(
//        "komoditas"=> "all",
//        "kota"=>"all",
//        "bulan"=>1,
//        "tahun"=>2018
//    );
//
//    $get_data = callAPI('GET', 'pertumbuhan/yearOnyear.php', $key, $data_array);
//    
//    $response = json_decode($get_data, true);
//
//    print_r($response);
    
    
?>

<script>
    $(document).ready(function(){
        var html = `
            <h2>Harga Mingguan</h2>
            <form id='sign_up_form'>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required />
                </div>
 
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required />
                </div>
 
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required />
                </div>
 
                <button type='submit' class='btn btn-primary'>Sign Up</button>
            </form>
            `;
 
        clearResponse();
        $('#content').html(html);
        
        // remove any prompt messages
        function clearResponse(){
            $('#response').html('');
        }
    });
</script>