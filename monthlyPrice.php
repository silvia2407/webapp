<?php
    include_once 'header.php';
    include_once 'config/auth.php';
    include_once 'config/callAPI.php';
?>

<script>
    $(document).ready(function(){
        var html = `
            <h2>Harga Bulanan</h2>
            `;
 
        clearResponse();
        $('#content').html(html);
        
        // remove any prompt messages
        function clearResponse(){
            $('#response').html('');
        }
    });
</script>