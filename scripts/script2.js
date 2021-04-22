document.getElementsByClassName("linkWrapper")[1].classList.add("selected");
document.getElementById("menu2").classList.add("selected_a");
$( document ).ready(() => {
    axios.get("https://ipapi.co/json").then(response => {
        generateContentFromData(response.data);
        response.data["page"] = "info";
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

const generateContentFromData = (data) => {
    document.getElementById("ipaddr").innerText += " " + data.ip;
    document.getElementById("coords").innerText += " Latitude: " + data.latitude + " | " + "Longitude: " + data.longitude;
    document.getElementById("city").innerText += " " +  data.city;
    document.getElementById("country").innerText +=  " " + data.country_name;
    document.getElementById("capital").innerText +=  " " + data.country_capital;
}