document.addEventListener('DOMContentLoaded', function () {
    var map = L.map('map').setView([40, -3], 5);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var points = window.mapPoints || [];

    points.forEach(function(point) {
        L.marker([point.latitude, point.longitude]).addTo(map)
            .bindPopup(`<strong>${point.name}</strong><br>${point.description}`);
    });

    map.on('click', function(e) {
        if (document.getElementById('latitude') && document.getElementById('longitude')) {
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
        }
    });
});
