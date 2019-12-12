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
            url: "objects/prop_hotel.php",
            success: function(response)
            {
                $('#provinsi').jqxDropDownList({
                    source: JSON.parse(response),
                    placeHolder: "Pilih provinsi . .",
                    width: '270'
                });
            }
        });
    
        var html = `
                <div class="card">
                    <div class="card-header">Harga Hotel</div>
                    <div class="card-body">
                        <div class="form-group">
                            <form id='form_hotel'>
                                <div>
                                    <div>Provinsi</div>
                                    <div id="provinsi"></div>
                                </div>
                                <br/>            
                                <div> 
                                    <input class='btn btn-primary' type="button" id="proses_hotel" value="Proses"> 
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
        //loading
        $("#proses_hotel").on('click', function() {
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
            
            var provinsi=$( "#provinsi" ).val();
            
            if(provinsi.length!==0 ){
                $.ajax({
                    url: "objects/hotel.php",
                    type: 'POST',
                    dataType:"json",
                    data:{
                            "provinsi":provinsi,
                    },
                    success: function(response){
                        console.log(response)
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

                            var rincian=""
                            for (i = 0; i < respon.length; i++) {
                                rincian=rincian+"<table><tr> <td>Nama</td><td> :</td><td>"+respon[i]['nama']+"</td></tr><tr> <td>Alamat</td><td> :</td><td>"+respon[i]['alamat']+"</td></tr><tr> <td>Harga</td><td> :</td><td>"+respon[i]['harga']+"</td></tr><tr> <td>Bintang</td><td> :</td><td>"+respon[i]['bintang']+"</td></tr><tr> <td>Harga di tanggal</td><td> :</td><td>"+respon[i]['lastupdate']+"</td></tr></table><hr\>";
                              } 

                            var grafik=`
                                <br/>
                                <div class="card">
                                    <div class="card-header">Hasil</div>
                                    <div class="card-body"><h5>Daftar harga</h5>
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