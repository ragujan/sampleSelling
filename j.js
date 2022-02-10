var url = "db.php";
var formData = new FormData();
var s = document.getElementById('show');
formData.append("A", 100);

fetch(url, { body: formData, method: "POST" })
    .then(response => response.json()) // read the response stream as JSON
    .then((data) => {
        // Work with JSON data here
        console.log(data)
        alert(data.name);
        s.innerHTML = data.name;
    })