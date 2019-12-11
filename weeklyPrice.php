<?php
    include_once 'header.php';
?>

<script>
    $(document).ready(function(){
        
        
        $.ajax({
            type: "POST",
            url: "objects/kota.php",
            success: function(response)
            {
                $('#kota').jqxDropDownList({
                    source: JSON.parse(response),
                    placeHolder: "Pilih kota . .",
                    width: '270'
                });
            }
        });
        
        $.ajax({
            type: "POST",
            url: "objects/komoditas.php",
            success: function(response)
            {
                $('#komoditas').jqxDropDownList({
                    source: JSON.parse(response),
                    placeHolder: "Pilih komoditas . .",
                    width: '270'
                });
            }
        });
    
        var html = `
                <div class="card">
                    <div class="card-header">Harga Rata-rata Mingguan</div>
                    <div class="card-body">
                        <div class="form-group">
                            <form id='form_mom'>
                                <div>
                                    <div>Kota</div>
                                    <div id="kota"></div>
                                </div>
                                <br/> 
                                <div>
                                    <div>Komoditas</div>
                                    <div id="komoditas"></div>
                                </div>
                                <br/> 
                                <div>
                                    <div>Tahun</div>
                                    <input type="number" id="tahun" name="tahun" size="4" required/>
                                </div>
                                <br/>           
                                <div>
                                    <div>Bulan</div>
                                    <select name="bulan" id="bulan">
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">Nevomber</option>
                                        <option value="12">Desember</option>
                                      </select>
                                </div>
                                <br/>           
                                <div>
                                    <div>Minggu ke-</div>
                                    <select name="minggu" id="minggu">
                                        <option value="1">I</option>
                                        <option value="2">II</option>
                                        <option value="3">III</option>
                                        <option value="4">IV</option>
                                        <option value="5">V</option>
                                      </select>
                                </div>
                                <br/>             
                                <div> 
                                    <input class='btn btn-primary' type="button" id="proses_mom" value="Proses"> 
                                </div>
                            </form>   
                        </div>
                    </div>
                </div>
                
            `;
 
        $('#content').html(html);
        
        //untuk menghapus respon sebelumnya
        function clearResponse(){
            $('#response').html('');
        }
        
        $("#proses_mom").on('click', function() {
            clearResponse();
            
            var tahun=$( "#tahun" ).val();
            
            var bulan=$( "#bulan" ).val();
            var minggu=$( "#minggu" ).val();
            var kota=$( "#kota" ).val();
            var komoditas=$( "#komoditas" ).val();
            
            if(tahun.length!==0 && bulan.length!==0 && kota.length!==0 && komoditas.length!==0 && minggu.length!==0){
                $.ajax({
                    url: "objects/weekly.php",
                    type: 'POST',
                    dataType:"json",
                    data:{
                            "kota":kota,
                            "komoditas":komoditas,
                            "bulan":bulan,
                            "minggu":minggu,
                            "tahun":tahun
                    },
                    success: function(response){
                        if(response['message']==0){
                                var grafik=`
                                        <br/>
                                        <div class="card">
                                            <div class="card-header">Hasil</div>
                                            <div class="card-body">
                                                Data tidak tersedia
                                            </div>
                                        </div>

                                    `;  
                        }else{
                            var grafik=`
                                <br/>
                                <div class="card">
                                    <div class="card-header">Hasil</div>
                                    <div class="card-body">
                                        `+response+`
                                    </div>
                                </div>

                            `;
                        }  
                        $('#response').html(grafik);
                    },
                })
                
            }else{
                var grafik=`
                    <br/>
                    <div class="card">
                        <div class="card-header">Hasil</div>
                        <div class="card-body">
                            Semua parameter harus dipilih sebelum melakukan proses
                        </div>
                    </div>

                `;
            }    
            
            
            $('#response').html(grafik);
        }); 
        
    });
</script>