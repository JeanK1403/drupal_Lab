
var google_map_field_map;

(function ($, Drupal) {

  Drupal.behaviors.google_map_field_renderer = {
    attach: function (context) {

      $('.google-map-field .map-container').once('.google-map-field-processed').each(function(index, item) {

        // Get the settings for the map from the Drupal.settings object.
        var lat = $(this).attr('data-lat');
        var lon = $(this).attr('data-lon');
        var zoom = parseInt($(this).attr('data-zoom'));
        var type = $(this).attr('data-type');
        var show_marker = $(this).attr('data-marker-show') === "true";
        var show_controls = $(this).attr('data-controls-show') === "true";

        // Create the map coords and map options.
        var latlng = new google.maps.LatLng(lat, lon);
        var mapOptions = {
          zoom: zoom,
          center: latlng,
          streetViewControl: false,
          mapTypeId: type,
          disableDefaultUI: show_controls ? false : true,
        };
        google_map_field_map = new google.maps.Map(this, mapOptions);

        google.maps.event.trigger(google_map_field_map, 'resize')

        // Drop a marker at the specified position.
        marker = new google.maps.Marker({
          position: latlng,
          optimized: false,
          visible: show_marker,
          map: google_map_field_map
        });

      });

    }
  }

})(jQuery, Drupal);
