
document.getElementsByClassName("linkWrapper")[2].classList.add("selected");
document.getElementById("menu3").classList.add("selected_a");
// getting data from ip address
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
// getting data from DB
try {
    $.ajax({
        type: "GET",
        url: "https://wt156.fei.stuba.sk/mashup/statsHandler.php",
        success: function(msg)
        {
            let data = JSON.parse(msg);
            fillTable1 (data.tableData);
            initMap(data.markers);
            document.getElementById("stats").innerText = "Our most visited page: " + data.mostVisited;

        }
    });
} catch (e) {
    console.log(e);
}

const initMap = (markersCoords) => {

    let map = new google.maps.Map(document.getElementById('map'), {
        zoom: 5,
        center: new google.maps.LatLng(48.6737532 , 19.696058)
    });
    let marker, i;

    for (i = 0; i < markersCoords.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(markersCoords[i][0], markersCoords[i][1]),
            map: map
        });
    }
}

const fillTable1 = (data) => {
    data.forEach((visit) => {
        let tbody = document.getElementById("tbody");

        let tr = document.createElement("tr");
        let th = document.createElement("th");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let flag = document.createElement("img");
        let a = document.createElement("a");
        // a.href = "https://wt156.fei.stuba.sk/mashup/statsHandler.php/?country_id=" + visit[3];
        a.style = "cursor: pointer";

        tbody.appendChild(tr);
        tr.appendChild(th);
        th.appendChild(a);
        // th.scope = "row";
        a.classList.add("countryTitle");
        a.innerText += visit[0];
        a.id = visit[3];
        // tr.appendChild(th);
        td1.classList.add("center");
        td2.classList.add("center");
        flag.src = "http://purecatamphetamine.github.io/country-flag-icons/3x2/" +  visit[1] + ".svg";
        flag.style = "width: 40px";
        td1.appendChild(flag);
        td2.innerText += visit[2];
        tr.appendChild(td1);
        tr.appendChild(td2);
    });
    document.getElementsByClassName('countryTitle').addEventListener('click',ev => {
        console.log('clicked');
    });
}



