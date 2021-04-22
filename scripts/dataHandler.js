$.ajax({
    type: "GET",
    url: url,
    data: form.serialize(),
    success: function(data)
    {
        let output = data;
        let size = Object.keys(output).length;
        console.log(output);

        if(output.msg) {
            document.getElementById("title1").innerText = output.msg;
        }
        else {
            document.getElementById("title1").innerText = "";
            for(let i=0;i<size;i++) {
                document.getElementById("title1").innerText += output[i].value + "\n";
            }
        }
    }
});