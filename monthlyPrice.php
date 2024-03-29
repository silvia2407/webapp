<?php
    include_once 'header.php';
?>

<div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:50%;padding:2px;"><img src='images/reload.gif' width="64" height="64" /><br>Loading..</div>
<script>
    $(document).ready(function(){
        $(document).ajaxStart(function(){
            $("#wait").css("display", "block");
            $("#content").css("display", "none");
          });
          $(document).ajaxComplete(function(){
            $("#wait").css("display", "none");
            $("#content").css("display", "block");
          });
        
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
                    <div class="card-header">Harga Rata-rata Bulanan</div>
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
                                        <option value="1,2,3,4,5,6,7,8,9,10,11,12">Semua</option>
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
            
            $(document).ajaxStart(function(){
                $("#wait").css("display", "block");
                $("#response").css("display", "none");
                $("#content").css("display", "block");
              });
              $(document).ajaxComplete(function(){
                $("#wait").css("display", "none");
                $("#response").css("display", "block");
                $("#content").css("display", "block");
            });
            
            var tahun=$( "#tahun" ).val();
            
            var bulan=$( "#bulan" ).val();
            var kota=$( "#kota" ).val();
            var komoditas=$( "#komoditas" ).val();
            
            if(tahun.length!==0 && bulan.length!==0 && kota.length!==0 && komoditas.length!==0){
                $.ajax({
                    url: "objects/monthly.php",
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
                                rincian=rincian+"<table><tr> <td>Bulan</td><td> :</td><td>"+respon[i]['bulan']+"</td></tr><tr> <td>Kualitas/merk</td><td> :</td><td>"+respon[i]['kualitas_merk']+"</td></tr><tr> <td>Monthly Price</td><td> :</td><td>"+respon[i]['monthlyPrice']+"</td></tr></table><hr\>";
                              } 
                            
                            var grafik=`
                                <br/>
                                <div class="card">
                                    <div class="card-header">Hasil</div>
                                    <div class="card-body"><h5>Harga `+ respon[0]['komoditas'] +` di `+respon[0]['kota']+` Tahun `+respon[0]['tahun']+`</h5>
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