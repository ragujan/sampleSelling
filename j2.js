var url = "db2.php";
var formData = new FormData();
var s = document.getElementById('show');
formData.append("A", 100);

fetch(url)
    .then(response => response.text())
    .then((text) => {
        alert(text);
        s.innerHTML = text;
    })