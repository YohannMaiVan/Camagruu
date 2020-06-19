let filtre1 = document.getElementById("filter1");
let filtre2 = document.getElementById("filter2");
let filtre3 = document.getElementById("filter3");

filtre1.addEventListener("click", clickFilter);
filtre2.addEventListener("click", clickFilter);
filtre3.addEventListener("click", clickFilter);


function clickFilter () {
    document.getElementById("snap").disabled = false;
}