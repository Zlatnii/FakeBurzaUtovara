<x-app-layout>
<!DOCTYPE html>
<html>
<head>
    <title>Dobrodošli u Našu Firmu - Lokacija</title>
    <!-- Uključivanje Bootstrap CSS-a -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Stil za prikaz Google Mape */
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body >
    <div class="container text-center mt-5">
        <h1>Dobrodošli u Našu Firmu!</h1>
        
        <p>Naša firma, "Firma d.o.o.", s ponosom posluje u prekrasnom gradu Zagrebu, Hrvatska. Sve svoje aktivnosti usmjeravamo prema pružanju kvalitetnih usluga našim klijentima.</p>

        <h2>Lokacija: Slatina</h2>
        <p>Adresa: Marka Marulića BB, 33520 Slatina</p>
        <p>Kontakt: +385 91 234 5678</p>
        <p>Godina osnivanja: 2017</p>

        <h2>Google Lokacija:</h2>
        <div id="map"></div>
    </div>

    <!-- Uključivanje Bootstrap JS-a (opciono) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="mb-2 h-5 w-5">
    <script>
        function initMap() {
            var uluru = {lat: 45.814440, lng: 15.977980};
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 15, center: uluru}
            );
            var marker = new google.maps.Marker({position: uluru, map: map});
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap"></script>
</div>
</body>
</html>
</x-app-layout>

