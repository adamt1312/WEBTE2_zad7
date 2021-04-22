document.getElementsByClassName("linkWrapper")[0].classList.add("selected");
document.getElementById("menu1").classList.add("selected_a");
$( document ).ready(function() {
    let latitude;
    let longitude;
    getWeather(latitude,longitude);
    sentDataFromIpToDB();
});

const getWeather = (latitude,longitude) => {
    navigator.geolocation.getCurrentPosition((msg) => {
        latitude = msg.coords.latitude;
        longitude = msg.coords.longitude;
        axios.get("https://maps.googleapis.com/maps/api/geocode/json?latlng="+latitude+","+longitude+"&location_type=APPROXIMATE&result_type=locality&key=AIzaSyA7CZAaPUUEy3mdGFUj9ypxx1pyZMLpAxE")
            .then((response => document.getElementById("city_par").innerText += " " + response.data.results[0].formatted_address));
        axios.get("https://api.openweathermap.org/data/2.5/onecall?lat="+ latitude + "&lon=" + longitude + "&exclude=minutely,hourly&units=metric&appid=f235b041cdc100ab2a0414039a79f3b6")
            .then((response) => {
                dataIntoDivs(response.data.daily);
            })
    });
}

const dataIntoDivs = (days) => {
    let forecastWrapper = document.getElementById("daysWrapper");
    days.forEach((day) => {
        // dayForecast div
        let dayForecast = document.createElement("div");
        dayForecast.classList.add("dayForecast");
        dayForecast.classList.add("grow");
        document.getElementsByClassName("weather_info")[0].appendChild(dayForecast);

        // dayTitle span
        let dt = day.dt;
        dt = dt * 1000;
        const dateObject = new Date(dt);
        const day_name = dateObject.toDateString().split(" ")[0];
        let dayTitle = document.createElement("span");
        dayTitle.classList.add("dayTitle");
        dayTitle.innerText = day_name;

        // day description div
        let description = document.createElement("div");
        description.classList.add("description");

        let desc1 = document.createElement("div");
        let desc2 = document.createElement("div");
        desc1.classList.add("desc1");
        desc2.classList.add("desc2");
        let icon = document.createElement("i");
        icon.classList.add("fas");
        icon.classList.add("fa-2x");
        if (day.weather[0].main.toLowerCase() == "rain") {
            icon.classList.add("fa-cloud-rain");
            desc1.appendChild(icon);
        }
        else if (day.weather[0].main.toLowerCase() == "clouds") {
                icon.classList.add("fa-cloud-sun");
                desc1.appendChild(icon);
        }
        else if (day.weather[0].main.toLowerCase() == "clear") {
            icon.classList.add("fa-sun");
            desc1.appendChild(icon);
        }
        else if (day.weather[0].main.toLowerCase() == "snow") {
            icon.classList.add("fa-snowflake");
            desc1.appendChild(icon);
        }

        description.appendChild(desc1);
        description.appendChild(desc2);

        let descriptionDetail1 = document.createElement("span");
        descriptionDetail1.innerText = day.weather[0].main;
        let descriptionDetail2 = document.createElement("span");
        descriptionDetail2.innerText = day.weather[0].description;

        desc2.appendChild(descriptionDetail1);
        desc2.appendChild(descriptionDetail2);

        // dayInfo div
        let dayInfo = document.createElement("div");
        dayInfo.classList.add("dayInfo");

        dayForecast.appendChild(dayTitle);
        dayForecast.appendChild(description);
        dayForecast.appendChild(dayInfo);

        // span temps
        let max_temp = document.createElement("span");
        let min_temp = document.createElement("span");
        max_temp.classList.add("temp");
        min_temp.classList.add("temp");
        max_temp.innerText = "Max " + Math.round(parseFloat(day.temp.max)) + " °C";
        min_temp.innerText = "Min " + Math.round(parseFloat(day.temp.min)) + " °C";
        dayInfo.appendChild(max_temp);
        dayInfo.appendChild(min_temp);

        let arrowUp = document.createElement("i");
        arrowUp.classList.add("fas");
        arrowUp.classList.add("fa-long-arrow-alt-up");
        let arrowDown = document.createElement("i");
        arrowDown.classList.add("fas");
        arrowDown.classList.add("fa-long-arrow-alt-down");
        max_temp.appendChild(arrowUp);
        min_temp.appendChild(arrowDown);
    })
}

const sentDataFromIpToDB = () => {
    try {
        axios.get("https://ipapi.co/json").then((response) => {
            response.data["page"] = "home";
            $.ajax({
                type: "POST",
                url: "https://wt156.fei.stuba.sk/mashup/visitHandler.php",
                data: response.data,
                success: function(msg)
                {
                    console.log(msg);
                }
            });
        })
    }
    catch (e) {
        console.log(e);
    }

}