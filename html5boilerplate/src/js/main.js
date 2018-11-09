/* eslint no-undef: "off" */

// Function sets panorama from url into the div with div_id. 
// locationName will be displayed in the center of the bottom navigation bar.
function setPanorama(div_id, url, locationName){
    let div = document.getElementById(div_id);
    let params = {
        container: div,
        panorama: url,
        caption: locationName,
        navbar: [
        'autorotate',
        'zoom',
        'markers',
        'caption',
        'fullscreen'
        ]
    };
    return new PhotoSphereViewer(params);
}

// Function adds a marker to a panorama object.
function addMarkerToPan(pan, id, long, lat, tooltipStr, info)
{
    pan.addMarker({
        id: id, // increment for each marker created
        image: "img/tooltip_icon.png", 
        longitude: long, //position of the marker in spherical coordinates (radians)
        latitude: lat,
        width: 30,
        height: 30,
        tooltip: tooltipStr,

        style: {
        color: 'maroon',
        fontWeight: 'bold',
        fontSize: '50px',
        textDecoration: 'underline',
        cursor: 'zoom-in'
        },

        content: info
    });
}


// Function adds a marker to a panorama object.
function addMarkerToPan2(pan, id, info)
{
    pan.addMarker({
        id: id, // increment for each marker created
        html: info,
        longitude: 0, //position of the marker in spherical coordinates (radians)
        latitude: 0,
        width: 800,
        height: 150,

        style: {
        color: 'maroon',
        backgroundColor: 'rgba(0, 0, 0, 0.3)',
        fontSize: '25px',
        cursor: 'zoom-in'
        },
    });
}