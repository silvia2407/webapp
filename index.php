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
                    Data yang saat ini tersedia hanya data tahun 2017 dan 2018<br/>
                    <br/>
                    <br/>
                    Istilah statistik:
                    <ul>
                        <li>Data harga mingguan adalah data rata-rata harga suatu komoditas dalam periode waktu 1 minggu tertentu pada bulan dan tahun terpilih</li>
                        <li>Data harga bulanan adalah data rata-rata harga suatu komoditas dalam periode waktu 1 bulan tertentu pada tahun terpilih</li>
                        <li>Data pertumbuhan harga bulanan adalah data pertumbuhan harga month on month (pertumbuhan harga dari bulan m dibanding bulan m-1 ditahun yang sama) suatu komoditas</li>
                        <li>Data pertumbuhan harga tahunan adalah data pertumbuhan harga year on year (pertumbuhan harga dari bulan m tahun ke-n dibanding bulan m tahun ke n-1) suatu komoditas</li>
                        
                    </ul>
                    
                </div>
            </div>
            `;

        $('#content').html(html);
});
</script>
