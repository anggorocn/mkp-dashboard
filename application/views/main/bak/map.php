<!-- Main component for a primary marketing message or call to action -->
<div class="col-md-12">
    <div class="judul-halaman wow fadeInUp" data-wow-delay="0.2s"><span>Jumlah Personel Tiap Lokasi</span></div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="konten" style="margin-left: 0px;">
                <link rel="stylesheet" type="text/css" href="lib/easyLocator/examples/easyLocator.css">  
                <!--<script src="../WEB-INF/lib/easyLocator/jquery.min.js"></script>-->
                <script src="lib/easyLocator/examples/easyLocator.js"></script>
                <script src="lib/easyLocator/examples/markerclusterer.min.js"></script>

                <script src="https://cdn.jsdelivr.net/npm/underscore@1.13.1/underscore-umd-min.js"></script>

                <div id="locatorList" style="height: 500px;"></div>
                <script>
                 
                  var data = [

                     {
                        title: 'Kantor Pusat Pelindo III',
                        description: '102 Personel',
                        iconMarker: "https://drive.google.com/uc?export=view&id=0B63IfOduqCJudlhuMlJmX2plcUk",
                        iconMarkerActive: "http://www.freeiconspng.com/uploads/pikachu-png-icon-25.png",
                        image: 'uploads/cabang/pusat.png', 
                        lat: -7.2097729,
                        lng: 112.6911446
                     },
                     {
                        title: 'Unit Tanjung Perak',
                        description: '74 Personel',
                        iconMarker: "https://drive.google.com/uc?export=view&id=0B63IfOduqCJudlhuMlJmX2plcUk",
                        iconMarkerActive: "http://www.freeiconspng.com/uploads/pikachu-png-icon-25.png",
                        image: 'uploads/cabang/perak.png',
                        lat: -7.20783,
                        lng: 112.7248764
                     },
                     {
                        title: 'Unit Benoa',
                        description: '34 Personel',
                        image: 'uploads/cabang/benoa.png',
                        lat: -8.738013,
                        lng: 115.2091498
                     },
                  ];

                  for (var i = 0; i < 100; i++) {
                    data.push(
                      {
                        title: 'Kantor Pusat Pelindo III',
                        description: '102 Personel',
                        iconMarker: "https://drive.google.com/uc?export=view&id=0B63IfOduqCJudlhuMlJmX2plcUk",
                        iconMarkerActive: "http://www.freeiconspng.com/uploads/pikachu-png-icon-25.png",
                        image: 'uploads/cabang/pusat.png', 
                        lat: -7.2097729,
                        lng: 112.6911446
                     }
                    )
                  }

                  $( document ).ready(function() {
                     var easyLocator = $('#locatorList').easyLocator({
                        // spreadsheetId: '1GsuoK3XyWJoiie1eq0qrd-2DxRVSQ0Ut7DkGI23Gq0s',
                        myLocations: data,
                        useMarkerCluster: true,          
                        markerClustererOptions: {
                           imagePath: 'images/maps/m'
                        }
                     });
                  
                     easyLocator.onEvents.progress(function(evt){
                        console.log(evt);
                     });
                  });
               </script>
            </div>
        </div>
    </div>
</div>

<!--<script src="http://code.jquery.com/jquery.min.js"></script>-->
<script src="js/jquery.storelocator.js"></script>
<script src="js/handlebars.min.js"></script>
<script src="http://<a href="https://www.jqueryscript.net/tags.php?/map/">map</a>s.google.com/maps/api/js?key=YOUR-API-KEY"></script>
<link rel="stylesheet" href="css/storelocator.css">

<div id="map-container">
	<div id="loc-list">
        <ul id="list">
        </ul>
	</div>
	<div id="map"></div>
</div>

<script>
$(function() {
  $('#map-container').storeLocator();
});
    
// Allows custom data to be sent with the AJAX request. 
// Set the setting to an object with your properties and values.
'ajaxData'                   : null,

// Display no results message vs. all locations when closest location is further than distanceAlert setting
'altDistanceNoResult'        : false,

// Set to true to enable Google Places autocomplete. 
// Note the slight markup differences in the example file.
'autoComplete'               : false,

// Disable the listener that immediately triggers a search when an auto complete location option is selected.
'autoCompleteDisableListener': false,

// Google Places autocomplete options object.
'autoCompleteOptions'        : {},

// Disable displaying markers and location list indicators with alpha characters.
'disableAlphaMarkers'        : false,

// Set to an array of taxonomies that should filter exclusively vs. inclusively.
'exclusiveTax'               : null,

// Set to true to highlight the nearest location automatically after searching.
'openNearest'                : false,

// Set to an object for custom sorting that accepts three properties: method ('alpha', '<a href="https://www.jqueryscript.net/time-clock/">date</a>', or 'numeric'), order ('asc', or 'desc'), and prop (property in your data to sort by such as name, city, distance, etc.).
'sortBy'                     : null,

// HTML elements
'addressID'                  : 'bh-sl-address',
'closeIcon'                  : 'bh-sl-close-icon',
'formContainer'              : 'bh-sl-form-container',
'formID'                     : 'bh-sl-user-location',
'geocodeID'                  : null,
'lengthSwapID'               : 'bh-sl-length-swap',
'loadingContainer'           : 'bh-sl-loading',
'locationList'               : 'bh-sl-loc-list',
'mapID'                      : 'bh-sl-map',
'maxDistanceID'              : 'bh-sl-maxdistance',
'modalContent'               : 'bh-sl-modal-content',
'modalWindow'                : 'bh-sl-modal-window',
'overlay'                    : 'bh-sl-overlay',
'regionID'                   : 'bh-sl-region',
'searchID'                   : 'bh-sl-search',
'sortID'                     : 'bh-sl-sort',
'taxonomyFiltersContainer'   : 'bh-sl-filters-container',

// Google maps settings object.
'mapSettings'              : {
  zoom     : 12,
  mapTypeId: google.maps.MapTypeId.ROADMAP
},

// Marker Clusterer settings object.
'markerCluster'              : null,

// Replacement marker image used for all locations
'markerImg'                : null,

// Replacement marker dimensions object
// ex value: { height: 20, width: 20 }
'markerDim'                : null,

// Multiple replacement marker images based on categories object. 
// Value should be array with image path followed by dimensions.
// ex value: catMarkers : {'Restaurant' : ['img/red-marker.svg', 32, 32]}
'catMarkers'               : null,

// Selected marker image.
'selectedMarkerImg'        : null,

// Selected marker image dimensions object - ex value: { height: 20, width: 20 }
'selectedMarkerImgDim'     : null,

// The unit of length. Default is m for miles.
// Change to km for kilometers.
'lengthUnit'               : 'm',

// The number of closest locations displayed at one time. 
// Set to -1 for unlimited.
'storeLimit'               : 26,

// Displays alert if there are no locations with 60 m/km of the user's location. 
// Set to -1 to disable.
'distanceAlert'            : 60,

// The format of the data source. 
// Accepted values include kml, xml, json, and jsonp.
'dataType'                 : 'xml',

// Accepts raw KML, XML, or JSON instead of using a remote file.
'dataRaw'                  : null,

// The path to the location data.
'dataLocation'             : 'data/locations.xml',

// XML element used for locations (tag).
'xmlElement'               : 'marker',

// Background color of the odd list elements.
'listColor1'               : '#ffffff',

// Background color of the even list elements.
'listColor2'               : '#eeeeee',

// Display a marker at the origin.
'originMarker'             : false,

// Replacement origin marker image.
'originMarkerImg'          : null,

// Replacement origin marker dimensions object
// ex value: { height: 20, width: 20 }
'originMarkerDim'          : null,

// Bounces the maker when a list element is clicked.
'bounceMarker'             : true,

// First hides the map container and then uses jQuery’s slideDown method to reveal the map.
'slideMap'                 : true,

// Shows the map container within a modal window. 
// Set slideMap to false and this option to true to use.
'modal'                    : false,

// <a href="https://www.jqueryscript.net/tags.php?/Modal/">Modal</a> selectors.
'overlay'                  : 'bh-sl-overlay',
'modalWindow'              : 'bh-sl-modal-window',
'modalContent'             : 'bh-sl-modal-content',
'closeIcon'                : 'bh-sl-close-icon',

// If true, the map will load with a default location immediately. 
// Set slideMap to false if you want to use this.
'defaultLoc'               : false,

// If using defaultLoc, set this to the default location latitude.
'defaultLat'               : null,

// If using defaultLoc, set this to the default location longitude.
'defaultLng'               : null,

// Set to true if you want to use the HTML5 geolocation API (good for mobile) to geocode the user's location.
'autoGeocode'              : false,

// Set to true if you want to give users an option to limit the distance from their location to the markers.
'maxDistance'              : false,

// ID of the select element for the maximum distance options.
'maxDistanceID'            : 'bh-sl-maxdistance',

// Set to true if you want to immediately show a map of all locations. 
// The map will center and zoom automatically.
'fullMapStart'             : false,

// Set to a zoom integer if you want to immediately show a blank map without any locations.
'fullMapStartBlank'        : false,

// Set to a number to limit the number of items displayed in the location list with full map start.
'fullMapStartListLimit'      : false,

// InfoBubble settings object. 
'infoBubble'                 : null,

// Set to true if you aren't able to use form tags (ASP.net WebForms).
'noForm'                   : false,

// Set to true to display a loading animated gif next to the submit button.
'loading'                  : false,

// Class of element container that displays the loading animated gif.
'loadingContainer'         : 'bh-sl-loading',

// restrict featured locations by a specified distance
'featuredDistance'           : null,

// Set to true to enable featuring locations at the top of the location list (no matter the distance).
// Add featured=”true” to featured locations in your XML or JSON locations data.
'featuredLocations'        : false,

// Set to true to enable displaying location results in multiple "pages."
'pagination'               : false,

// If using pagination, the number of locations to display per page.
'locationsPerPage'         : 10,

// Set to true to enable displaying directions within the app instead of an off-site link.
'inlineDirections'         : false,

// Set to true to allow searching for locations by name using separate searchID field.
'nameSearch'               : false,

// ID of the search input form field for location name searching.
'searchID'                 : 'bh-sl-search',

// If using nameSearch, the data attribute used for the location name in the data file.
'nameAttribute'            : 'name',

// Set to true to have the location list only show data from markers that are visible on the map.
'visibleMarkersList'       : false,

// Set to true to perform a new search after the map is dragged.
'dragSearch'               : false,

// Template paths
'infowindowTemplatePath'   : 'assets/js/plugins/storeLocator/templates/infowindow-description.html',
'listTemplatePath'         : 'assets/js/plugins/storeLocator/templates/location-list-description.html',
'KMLinfowindowTemplatePath': 'assets/js/plugins/storeLocator/templates/kml-infowindow-description.html',
'KMLlistTemplatePath'      : 'assets/js/plugins/storeLocator/templates/kml-location-list-description.html',

// ID of list template if using inline Handlebar templates instead of separate files.
'listTemplateID'           : null,

// ID of infowindow template if using inline Handlebar templates instead of separate files.
'infowindowTemplateID'     : null,

// Filtering object that can be used to set up live filtering
'taxonomyFilters'          : null,

// Class of the container around the filters.
'taxonomyFiltersContainer' : 'bh-sl-filters-container',

// Set to true to enable exclusive taxonomy filtering rather than the default inclusive.
'exclusiveFiltering'       : false,

// Set to true to enable query string support for passing input variables from page to page.
'querystringParams'        : false,

// Store user's location when autoGeocode in enabled to prevent multiple lookups per session.
'sessionStorage'           : false,

// Callbacks
'callbackAutoGeoSuccess'     : null,
'callbackBeforeSend'         : null,
'callbackCloseDirections'    : null,
'callbackCreateMarker'       : null,
'callbackDirectionsRequest'  : null,
'callbackFilters'            : null,
'callbackFormVals'           : null,
'callbackGeocodeRestrictions': null,
'callbackJsonp'              : null,
'callbackListClick'          : null,
'callbackMapSet'             : null,
'callbackMarkerClick'        : null,
'callbackModalClose'         : null,
'callbackModalOpen'          : null,
'callbackModalReady'         : null,
'callbackNearestLoc'         : null,
'callbackNoResults'          : null,
'callbackNotify'             : null,
'callbackPageChange'         : null,
'callbackRegion'             : null,
'callbackSorting'            : null,
'callbackSuccess'            : null,

// Language options
'addressErrorAlert'          : 'Unable to find address',
'autoGeocodeErrorAlert'      : 'Automatic location detection failed. Please fill in your address or zip code.',
'distanceErrorAlert'         : 'Unfortunately, our closest location is more than ',
'kilometerLang'              : 'kilometer',
'kilometersLang'             : 'kilometers',
'mileLang'                   : 'mile',
'milesLang'                  : 'miles',
'noResultsTitle'             : 'No results',
'noResultsDesc'              : 'No locations were found with the given criteria. Please modify your selections or input.',
'nextPage'                   : 'Next &raquo;',
'prevPage'                   : '&laquo; Prev'
</script>
