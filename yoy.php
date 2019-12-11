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
                    <div class="card-header">Pertumbuhan Harga Tahunan</div>
                    <div class="card-body">
                        <div class="form-group">
                            <form id='form_yoy'>
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
                                    <input class='btn btn-primary' type="button" id="proses_yoy" value="Proses"> 
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
        
        $("#proses_yoy").on('click', function() {
            clearResponse();
            
            var tahun=$( "#tahun" ).val();
            
            var bulan=$( "#bulan" ).val();
            var kota=$( "#kota" ).val();
            var komoditas=$("#komoditas" ).val();
            
               
            
            if(tahun.length!==0 && komoditas.length!==0 && bulan.length!==0 && kota.length!==0){
                $.ajax({
                    url: "objects/yoy.php",
                    type: 'POST',
                    dataType:"json",
                    data:{
                            "kota":kota,
                            "komoditas":komoditas,
                            "bulan":bulan,
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
                                $('#response').html(grafik);
                        }else{
                            var respon=response.data
                            var a=respon.length;
                            
                            var rincian=""
                            for (i = 0; i < respon.length; i++) {
                                if(respon[i]['growth_yOy']==null)
                                    respon[i]['growth_yOy']="<font color='red'><i>data tdk dapat dihitung krn data tahun sebelumnya tdk tersedia</i></font>";
                                rincian=rincian+"<table><tr> <td>Kualitas/merk</td><td> :</td><td>"+respon[i]['kualitas_merk']+"</td></tr><tr> <td>Growth year on year</td><td> :</td><td>"+respon[i]['growth_yOy']+"</td></tr></table><hr\>";
                              } 
                            
                            var grafik=`
                                <br/>
                                <div class="card">
                                    <div class="card-header">Hasil</div>
                                    <div class="card-body"><h5>Perkembangan harga year on year `+ respon[0]['komoditas'] +` di `+respon[0]['kota']+`</h5>
                                        `+ rincian +`
                                    </div>
                                </div>

                            `;
                            $('#response').html(grafik);
                        }  
                        
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