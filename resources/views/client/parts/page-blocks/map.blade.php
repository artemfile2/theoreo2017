@if(count($addresses) > 0)
    <section class="map_section">
        <div id="map_canvas"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPgmMLBACTk_WopgpjDo8SOTQticCdprw"></script>
        <script>
            $(function () {
                var map;
                var elevator;
                var myOptions = {
                    zoom: 10,
                    center: new google.maps.LatLng(51.55, 46.00),
                    mapTypeId: 'terrain'
                };
                map = new google.maps.Map($('#map_canvas')[0], myOptions);

                @foreach($addresses as $address)

                    $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address={{ $address }}&sensor=false', null, function (data) {
                        var p = data.results[0].geometry.location,
                            latlng = new google.maps.LatLng(p.lat, p.lng),
                            marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                    });
                @endforeach

            });
        </script>
    </section>
@endif