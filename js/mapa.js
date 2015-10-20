function initMap() {
    var pos = { lat: 10.491560, lng: -66.861905 };

    var map = new google.maps.Map(document.getElementById('mapa'), {
          center: pos,
          zoom: 17,
          scrollwheel: false,
    });

    var marker_labeled = new MarkerWithLabel({
       position: pos,
       draggable: false,
       raiseOnDrag: false,
       map: map,
     });
}
