<style>
    #map {
        height: calc(100vh - 170px) !important ;
/*        border: 1px solid red;*/
    }
</style>
    
<div class="row">
    <div class="col-md-2">
        <div class="area-menu-kiri">
            <ul>
                <li class="active">
                    <a>Absensi Hari Ini<br>
                    5 Juni 2021<br>
                    
                    </a>
                    <table>
                        <tr>
                            <td>IN</td>
                            <td>00:00</td>
                        </tr>
                        <tr>
                            <td>OUT</td>
                            <td>00:00</td>
                        </tr>
                    </table>
                </li>
            </ul>
            
            <table>
                <tr>
                    <td><strong>Rekapitulasi
                Presensi Per Bulan</strong></td>
                </tr>
                
                <tr>
                    <td>Jumlah Cuti
                <span class="text-brown">0 hari</span></td>
                </tr>
                
                <tr>
                    <td>Jumlah Ijin
                <span class="text-brown">0 hari</span></td>
                </tr>
                
                <tr>
                    <td>Jumlah Hadir
                <span class="text-brown">3 hari</span></td>
                </tr>
                
                <tr>
                    <td>Jumlah Dinas Luar
                <span class="text-brown">0 hari</span></td>
                </tr>
                
                <tr>
                    <td>Jumlah 
                Keterlambatan
                <span class="text-brown">0 hari</span></td>
                </tr>
                
                <tr>
                    <td>Jumlah Tidak Absen
                <span class="text-brown">0 hari</span></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row area-konten">
            <div class="col-md-12">
                <div class="judul-halaman">Lokasi Presensi</div>
            </div>
            
            <div class="col-md-12">
                <div class="area-map">
                    <div id="map"></div>
                  <div class="area-checkin">
                        <div class="inner">
                          <i class="fa fa-map-marker" aria-hidden="true"></i>
                          <span class="waktu">Sabtu 5 Juni 2021, 15:44:10</span>
                          <button type="submit" class="btn btn-warning">Check In</button>
                          <button type="submit" class="btn btn-danger">Check Out</button>
                        </div>
                        <div class="histori">
                            Histori absensi hari ini
                            <table>
                                <thead>
                                    <tr>
                                        <td><strong>No</strong></td>
                                        <td><strong>Jam</strong></td>
                                        <td><strong>Longitude</strong></td>
                                        <td><strong>Latitude</strong></td>
                                        <td><strong>Status</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        
                      </div>
                  </div>
                </div>
<!--                <div id="map_canvas"></div>-->
                

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->

    <script
      src="https://maps.googleapis.com/maps/api/js?callback=initMap&libraries=&v=weekly&sensor=false"
      async
    ></script>

<!--                <script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=myMap"></script>-->
                <script>
                let map;

                function initMap() {
                  map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: -34.397, lng: 150.644 },
                    zoom: 8,
                  });
                }

                </script>

            </div>
        </div>
    </div>
    
</div>

<script>
    // Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: -25.344, lng: 131.036 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}

    
//
//var myCenter=new google.maps.LatLng(53, -1.33);
//
//var marker=new google.maps.Marker({
//    position:myCenter,
//    url: '/',
//    animation:google.maps.Animation.DROP
//});
//
//function initialize()
//{
//var mapProp = {
//    center:myCenter,
//    zoom: 14,
//    draggable: false,
//    scrollwheel: false,
//    mapTypeId:google.maps.MapTypeId.ROADMAP
//};
//
//var map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);
//
//marker.setMap(map);
//}
//
//google.maps.event.addDomListener(window, 'load', initialize);
//google.maps.event.addListener(marker, 'click', function() {window.location.href = marker.url;});
    
    
    /*******************/
    
//    var latLng = new google.maps.LatLng(53, -1.33);
//
//var map = new google.maps.Map(document.getElementById('map_canvas'), {
//    center: latLng,
//    draggable: false,
//    mapTypeId: google.maps.MapTypeId.ROADMAP
//    scrollwheel: false,
//    zoom: 14
//});
//
//var marker = new google.maps.Marker({
//    animation: google.maps.Animation.DROP,
//    icon: 'images/pin.png',
//    map: map,
//    position: latLng
//});
//
//google.maps.event.addDomListener(marker, 'click', function() {
//    window.location.href = 'http://www.google.co.uk/';
//});
//
//    for (var i = 0; i < markers.length; i++) {
//    (function(marker) {
//        var marker = new google.maps.Marker({
//            animation: google.maps.Animation.DROP,
//            icon: 'images/pin.png',
//            map: map,
//            position: market.latLng
//        });
//
//        google.maps.event.addDomListener(marker, 'click', function() {
//            window.location.href = marker.url;
//        });
//    })(markers[i]);
//}

    
</script>
<style>
    /* Set the size of the div element that contains the map */
#map {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}

/*
#map-canvas {
  margin: 0;
  padding: 0;
  height: 100%;
}

#map-canvas {
  width:600px
}
*/
</style>





