var LocationsForMap = [
    ['Delhi',28.704060, 77.102493],
    ['Jaipur',26.9124, 75.7873],
    ['London', 51.507351, -0.127758],
    ['Washington', 47.751076,-120.740135]
];

var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 2,
    center: new google.maps.LatLng(28.704, 77.25)
});
var marker, i;

for (i = 0; i < LocationsForMap.length; i++) {
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(LocationsForMap[i][1], LocationsForMap[i][2]),
        map: map
    });
}

$( document ).ready(() => {
    document.getElementsByClassName("linkWrapper")[2].classList.add("selected");
    document.getElementById("menu3").classList.add("selected_a");
    axios.get("https://ipapi.co/json").then(response => {
        response.data["page"] = "stats";
        try {
            $.ajax({
                type: "POST",
                url: "https://wt156.fei.stuba.sk/mashup/visitHandler.php",
                data: response.data,
                success: function(msg)
                {
                    console.log(msg);
                }
            });
        } catch (e) {
            console.log(e);
        }
    });
});

