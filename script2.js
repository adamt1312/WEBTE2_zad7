document.getElementsByClassName("linkWrapper")[1].classList.add("selected");
document.getElementById("menu2").classList.add("selected_a");
$( document ).ready(function() {

    getInfoAboutUser();

});


const getInfoAboutUser = async () => {
    try {
        axios.get("https://ipapi.co/json").then((response) => {
            document.getElementById("ipaddr").innerText += " " + response.data.ip;
            document.getElementById("coords").innerText += " Latitude: " + response.data.latitude + " | " + "Longitude: " + response.data.longitude;
            document.getElementById("city").innerText += " " +  response.data.city;
            document.getElementById("country").innerText +=  " " + response.data.country_name;
            document.getElementById("capital").innerText +=  " " + response.data.country_capital;
        })
    }
    catch (e) {
        console.log(e);
    }

}