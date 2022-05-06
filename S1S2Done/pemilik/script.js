var sort = document.getElementById("sort");
var data = document.getElementById("content");

sort.addEventListener("change", function () {
  console.log(sort.value);
  // inisiasi objek ajax
  var objAjax = new XMLHttpRequest();

  // cek kesiapan ajax
  objAjax.onreadystatechange = function () {
    if ((objAjax.readyState = 4 && objAjax.status == 200)) {
      data.innerHTML = objAjax.responseText;
    }
  };

  objAjax.open("GET", "./data.php?sort=" + sort.value, "true");
  objAjax.send();
});
