function Geo(position)
{
    var lat=position.coords.latitude;
    var long=position.coords.longitude;

    document.getElementById('lat').innerHTML = lat;
    document.getElementById('long').innerHTML = long;

    google.maps.event.addDomListener('window','load',loadMap(lat,long));
}

function loadMap(lat,long){
    var options = {
        zoom: 8,
        center: new google.maps.LatLng(lat, long),
        mapTypeId: google.maps.MapTypeId.ROADMAP

        };

    map = new google.maps.Map(document.getElementById('map'),options);

}

function erreurGeo(erreur)
{
    var msg;
    switch(erreur.code){
        case erreur.TIMEOUT:
            msg='Le temps de la requete à expiré';
        break;
        case erreur.UNKNOW_ERROR:
            msg='Une erreur inconnue à été détectée';
        break;
        case erreur.POSITION_UNAVAILABLE:
            msg='Une erreur technique à été détectée';
        break;
        case erreur.PERMISSION_DENIED:
            msg='Vous avez refuser la geolocalisation';
        break;
    }
}
if(navigator.geolocation)
{
    navigator.geolocation.getCurrentPosition(Geo,erreurGeo,{maximumAge:12000});
}
