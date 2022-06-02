<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/style.css">
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>7map</title>
</head>
<body>
<div class="main">
    <div class="head">
        <div class="search-box">
        <input type="text" id="search" placeholder="دنبال کجا می گردی؟" autocomplete="off">
        <div class="clear"></div>
        <div class="search-results" style="display:none"></div>
        </div>
        </div>
        <div class="mapContainer">
            <div id="map"></div>
        </div>
        <img src="assets/img/current.png" class="currentLoc">
    </div>

    <div class="modal-overlay" style="display: none;">
        <div class="modal">
            <span class="close">x</span>
            <h3 class="modal-title">ثبت لوکیشن</h3>
            <div class="modal-content">
                <form id='addlocationform' action="process/addLocation.php" method="post">
                <div class="field-row">
                    <div class="field-title">مختصات</div>
                    <div class="field-content">
                        <input type="text" name='lat' id="lat-display" readonly style="width: 160px;text-align: center;">
                         <input type="text" name='lng' id="lng-display" readonly style="width: 160px;text-align: center;">
                     </div>
                    </div>
                    <div class="field-row">
                            <div class="field-title">نام مکان</div>
                            <div class="field-content">
                                <input type="text" name="title" id='l-title' placeholder="مثلا: دفتر مرکزی سون لرن">
                            </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">نوع</div>
                        <div class="field-content">
                            <select name="type" id='l-type'>
                            <?php foreach(locationtypes as $key=>$value): ?>
                            <option value="<?=$key?>"><?=$value?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">ذخیره نهایی</div>
                        <div class="field-content">
                            <input type="submit" value=" ثبت ">
                        </div>
                    </div>
                    <div class="resultajax"></div>
                </form>
            </div>
        </div>
    </div>
    


    
    <div class="main">
        <div class="head">
            <input type="text" id="search" placeholder="دنبال کجا میگردی؟">
        </div>
        <div class="mapcontainer" >
            <div id="map" style="width: 900px; height:400px " ></div>
        </div>

    </div>

    <script>
        const defaultloc=[30.2855061,57.0264967,17.25];

	var map = L.map('map').setView(defaultloc,15);

	var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: '7map project; <a href="https://www.openstreetmap.org/copyright">Open7Map</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(map);

     document.getElementById('map').style.setProperty('height',window.innerHeight+'px');
    // var marker=L.marker([30.2855061,57.0264967,17.25]).addTo(map);
    // marker.bindPopup("hello world").openPopup();




    map.on('dblclick',function(event){
    
//    alert(event.latlng.lat +","+ event.latlng.lng);


 L.marker([event.latlng.lat,event.latlng.lng]).addTo(map);
 $('.modal-overlay').fadeIn(500);
 $('#lat-display').val(event.latlng.lat);
 $('#lng-display').val(event.latlng.lng);
 $('#l-title').val('');
 $('#l-type').val(0);


});	



$(document).ready(function () {
$('.modal-overlay .close').click(function(event){ 
    $('.modal-overlay').fadeOut(event);
    
});
});





    $('#addlocationform').submit(function (e) { 
        e.preventDefault();

    var form=$(this);
    var result=form.find('.resultajax');
    $.ajax({
        url: "process/addlocation.php",
        method:"post",
        data: form.serialize(),
        success: function (response) {
            result.html(response);
            
        }
    });
        
    });





   



</script>
    
</body>
</html>