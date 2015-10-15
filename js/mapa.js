function initialize() {
      var map_canvas = document.getElementById('mapa');
      var map_options = {
          center: new google.maps.LatLng(10.491560, -66.861905),
          zoom: 15,
          //scrollwheel: false,,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      // var marker_labeled = new MarkerWithLabel({
      //   position: myLatlng,
      //   draggable: true,
      //   raiseOnDrag: true,
      //   map: map,
      //   labelContent: "Thomas More Consulting",
      //   labelAnchor: new google.maps.Point(-20, 10),
      //   labelClass: "markerLabel", // the CSS class for the label
      //   labelStyle: {
      //     opacity: 0.75
      //   }
      // });
      var map = new google.maps.Map(map_canvas, map_options)
}
google.maps.event.addDomListener(window, 'load', initialize);
