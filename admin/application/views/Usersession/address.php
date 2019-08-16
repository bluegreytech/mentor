<body>
  <input id="searchTextField" />
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
  <script>
    function initialize() {
      var options = {
        types: ['(cities)'],
        componentRestrictions: {
          country: "us"
        }
      };

      var input = document.getElementById('searchTextField');
      var autocomplete = new google.maps.places.Autocomplete(input, options);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
</body>