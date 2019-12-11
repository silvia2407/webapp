<?php
    include_once 'header.php';
?>
<script>
$(document).ready(function(){
        var html = `
            <div class="card">
                <div class="card-header">Selamat di Website Informasi Harga Eceran </div>
                <div class="card-body">
                    Data pada website didapat dari API harga eceran https://hargaeceran.000webhostapp.com/ <br/>
                    Data yang saat ini tersedia hanya data tahun 2017 dan 2018
                </div>
            </div>
            `;

        $('#content').html(html);
});
</script>
