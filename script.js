$( document ).ready(function() {
    let latitude;
    let longitude;
    getWeather(latitude,longitude);


});

const getWeather = async (latitude,longitude) => {
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

        // let hr = document.createElement("hr");
        // hr.classList.add("borderBottom");
        // document.getElementsByClassName("weather_info")[0].appendChild(hr);

        // dayTitle span
        let dt = day.dt;
        dt = dt * 1000;
        const dateObject = new Date(dt);
        const day_name = dateObject.toDateString().split(" ")[0];
        let dayTitle = document.createElement("span");
        dayTitle.classList.add("dayTitle");
        dayTitle.innerText = day_name;

        // dayInfo div
        let dayInfo = document.createElement("div");
        dayInfo.classList.add("dayInfo");

        dayForecast.appendChild(dayTitle);
        dayForecast.appendChild(dayInfo);

        // span temps
        let max_temp = document.createElement("span");
        let min_temp = document.createElement("span");
        max_temp.classList.add("temp");
        min_temp.classList.add("temp");
        // max_temp.append()
        // min_temp.append("<i class=\"fas fa-long-arrow-alt-down\"></i>");
        max_temp.innerText = "Max " + Math.round(parseFloat(day.temp.max)) + " °C";
        min_temp.innerText = "Min " + Math.round(parseFloat(day.temp.min)) + " °C";
        dayInfo.appendChild(max_temp);
        dayInfo.appendChild(min_temp);
        console.log(day);
    })
}