
document.getElementsByClassName("linkWrapper")[2].classList.add("selected");
document.getElementById("menu3").classList.add("selected_a");
// getting data from ip address
axios.get("https://ipapi.co/json").then(response => {
    response.data["page"] = "stats";
    try {
        // handling visit
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
// getting stats data from DB
try {
    $.ajax({
        type: "GET",
        url: "https://wt156.fei.stuba.sk/mashup/statsHandler.php",
        success: function(msg)
        {

            let data = JSON.parse(msg);
            fillTable1(data.tableData);
            fillTable3(data.intervalsOfVisits);
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
    let tbody = document.getElementById("tbody1");
    data.forEach((visit) => {
        let tr = document.createElement("tr");
        let th = document.createElement("th");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let flag = document.createElement("img");
        let a = document.createElement("a");
        a.style = "cursor: pointer";

        tbody.appendChild(tr);
        tr.appendChild(th);
        th.appendChild(a);
        a.classList.add("countryTitle");
        a.innerText = visit.country_name;
        a.id = visit.country_id;
        td1.classList.add("center");
        td2.classList.add("center");
        flag.src = "https://purecatamphetamine.github.io/country-flag-icons/3x2/" +  visit.country_code + ".svg";
        flag.style = "width: 40px";
        td1.appendChild(flag);
        td2.innerText = visit.visits_count;
        tr.appendChild(td1);
        tr.appendChild(td2);
    });

    const divs = document.querySelectorAll('.countryTitle');

    divs.forEach(el => el.addEventListener('click', event => {
        try {
            $.ajax({
                type: "GET",
                url: "https://wt156.fei.stuba.sk/mashup/statsHandler.php",
                data: {
                    "country_id": el.id,
                },
                success: function(msg)
                {
                    fillTable2(JSON.parse(msg),el.innerHTML);
                    document.getElementById("tb1").style.display = "none";
                    document.getElementById("tb2").style.display = "table";
                }
            });
        } catch (e) {
            console.log(e);
        }
    }));
}

const fillTable2 = (cities,country_name) => {
    // sets new title and clear tbody
    let title = document.getElementById("country_name_title")
    title.innerHTML = country_name;
    let icon = document.createElement("i");
    icon.classList.add("fa-undo-alt","fas","returnIcon");
    icon.style.color = "white";
    title.appendChild(icon);
    $("#tb2 tbody tr").remove();

    // insert data into tbody
    let tbody = document.getElementById("tbody2");
    cities.forEach(city => {
        let tr = document.createElement("tr");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");

        tbody.appendChild(tr);
        tr.appendChild(td1);
        tr.appendChild(td2);

        td1.innerText = city.city_name;
        td2.innerText = city.count;
        td1.classList.add("center");
        td2.classList.add("center");
    })

    icon.addEventListener('click',ev => {
        document.getElementById("tb2").style.display = "none";
        document.getElementById("tb1").style.display = "table";
    })
}

const fillTable3 = (intervalsOfVisits) => {
    let index = 0;
    document.querySelectorAll(".interval").forEach(td => {
        td.innerHTML = intervalsOfVisits[index++];
    })
}


