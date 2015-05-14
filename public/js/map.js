Date.daysBetween = function (date1, date2) {
    //Get 1 day in milliseconds
    var one_day = 1000 * 60 * 60 * 24;

    // Convert both dates to milliseconds
    var date1_ms = date1.getTime();
    var date2_ms = date2.getTime();

    // Calculate the difference in milliseconds
    var difference_ms = date2_ms - date1_ms;

    // Convert back to days and return
    return Math.round(difference_ms / one_day);
}

function getColor(creationDate, status)
{
    var color = '';
    var date = new Date(creationDate.date);
    var days = Date.daysBetween(date, new Date());

    switch (status) {
        case 'closed':
            if (days >= 150) {
                color = 'darkgreen';
            } else {
                color = 'green'
            }
            break;
        default:
            if (days >= 150) {
                color = 'darkpurple';
            }
            if (days < 150) {
                color = 'darkred';
            }
            if (days <= 90) {
                color = 'red';
            }
            if (days <= 60) {
                color = 'orange';
            }
            if (days <= 30) {
                color = 'blue';
            }
            break;
    }
    
    return color;
}

function getIcon(properties)
{
    var icons = [
        'road',
        'bolt',
        'fire',
        'lightbulb-o',
        'bullhorn',
        'ambulance',
        'wheelchair',
        'trash',
        'tachometer',
        'video-camera',
        'graduation-cap',
        'university',
        'hospital-o'
    ];
    var icon = 'square';

    if (icons.indexOf(properties.issueCategory) >= 0) {
        icon = properties.issueCategory;
    }

    var markerColor = getColor(properties.creationDate, properties.status);

    var awesomeIcon = L.AwesomeMarkers.icon({
        icon: '' + icon,
        prefix: 'fa',
        markerColor: markerColor
    });

    return awesomeIcon;
}


var road_layer = new L.TileLayer('http://otile{s}.mqcdn.com/tiles/1.0.0/map/{z}/{x}/{y}.png', {
    maxZoom: 18,
    subdomains: ['1', '2', '3', '4'],
    attribution: 'Tiles Courtesy of <a href="http://www.mapquest.com/" target="_blank">MapQuest</a>. Map data (c) <a href="http://www.openstreetmap.org/" target="_blank">OpenStreetMap</a> contributors, CC-BY-SA.'
});

var satellite_layer = new L.TileLayer('http://otile{s}.mqcdn.com/tiles/1.0.0/sat/{z}/{x}/{y}.png', {
    maxZoom: 18,
    subdomains: ['1', '2', '3', '4'],
    attribution: 'Tiles Courtesy of <a href="http://www.mapquest.com/" target="_blank">MapQuest</a>.'
});

var geojsonLayer = new L.GeoJSON(
    null,
    {
        onEachFeature: function (feature, layer) {
            if (feature.properties) {
                $.get('/js/template/view.html', function (template) {
                    
                    var popupString = Mustache.render(template, feature.properties);
                    
                    layer.bindPopup(popupString, {
                        maxHeight: 200
                    });
                });

                layer.options.icon = getIcon(feature.properties);
            }
        }
    }
);

var map = new L.Map('map', {
    layers: [
        road_layer,
        geojsonLayer
    ]
});

L.control.layers({'Road': road_layer}, {'Tickets': geojsonLayer}).addTo(map);

function onLocationFound(e)
{
    var radius = e.accuracy / 2;

    L.circle(e.latlng, radius)
            .addTo(map)
            .bindPopup("You are within " + radius + " meters from this point").openPopup();
}

function onLocationError(e)
{
    alert(e.message);
}

map.on('locationfound', onLocationFound);
map.on('locationerror', onLocationError);
map.on('popupopen', function (centerMarker) {
    var cM = map.project(centerMarker.popup._latlng);
    map.setView(map.unproject(cM), map._zoom, {animate: true});
});

var popup = L.popup();

function onMapClick(e)
{
    var data = {
        ajax: 1
    };
    
    $.get('/ticket/add', data, function (template) {
        popup.setLatLng(e.latlng).setContent(template).openOn(map);
        
        $('input[name="Ticket[location][latitude]"]').val(e.latlng.lat);
        $('input[name="Ticket[location][longitude]"]').val(e.latlng.lng);
    });
}

map.on('click', onMapClick);