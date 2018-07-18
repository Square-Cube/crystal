@extends('admin.layouts.master')
@section('content')
    <div class="page-content">
        <div id="welcome-home">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12 map-check">
                        <div class="logo">
                            <img src="{{asset('assets/admin/images/logo-icon.png')}}">
                        </div>
                    </div>
                    <div class="map" id="mapholder"></div>
                    <span class="location"></span>
                    <form action="{{route('admin.location')}}" method="post">
                        {!! csrf_field() !!}

                        <input type="hidden" name="location" id="location">
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="long" id="long">
                        <input type="hidden" name="time" value="{{\Carbon\Carbon::now()}}">

                        <button class="custom-btn submitBTN">
                            submit your location <i class="fa fa-angle-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCHtIuAaCTFFFyJjCq384wQi66e7Kthu-w"></script>
    <script>

        $(document).ready(function() {
            // executes when HTML-Document is loaded and DOM is ready
            getLocation();
        });

        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            var lat = position.coords.latitude;
            var lon = position.coords.longitude;

            $('#lat').val(lat);
            $('#long').val(lon);

            var latlon = new google.maps.LatLng(lat, lon)
            var mapholder = document.getElementById('mapholder')
            mapholder.style.height = '450px';
            mapholder.style.width = '100%';
            var myOptions = {
                center: latlon, zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: false,
                navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL}
            }
            var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);


            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlon }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        // alert("Location: " + results[1].formatted_address);
                        $('#location').val(results[1].formatted_address);
                        $('.location').text(results[1].formatted_address);
                        var marker = new google.maps.Marker({
                            position: latlon,
                            map: map,
                            title: results[1].formatted_address
                        });
                    }
                }
            });
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
            }
        }
    </script>
@endsection