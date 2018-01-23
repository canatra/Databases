function showForm(){
var selopt = document.getElementById("tablemenu").value;
if (selopt == "product") {
document.getElementById("product").style.display="block";
document.getElementById("maker").style.display="none";
document.getElementById("customer").style.display="none";
document.getElementById("employee").style.display="none";
document.getElementById("store").style.display="none";
document.getElementById("buy").style.display="none";
document.getElementById("category").style.display="none";
}
if (selopt == "category") {
document.getElementById("category").style.display="block";
document.getElementById("product").style.display="none";
document.getElementById("maker").style.display="none";
document.getElementById("customer").style.display="none";
document.getElementById("employee").style.display="none";
document.getElementById("store").style.display="none";
document.getElementById("buy").style.display="none";

}
if (selopt == "maker") {
document.getElementById("maker").style.display="block";
document.getElementById("customer").style.display="none";
document.getElementById("product").style.display="none";
document.getElementById("employee").style.display="none";
document.getElementById("store").style.display="none";
document.getElementById("buy").style.display="none";
document.getElementById("category").style.display="none";
}

if (selopt == "customer") {
document.getElementById("customer").style.display="block";	
document.getElementById("maker").style.display="none";
document.getElementById("product").style.display="none";
document.getElementById("employee").style.display="none";
document.getElementById("store").style.display="none";
document.getElementById("buy").style.display="none";
document.getElementById("category").style.display="none";
}

if (selopt == "buy") {
document.getElementById("buy").style.display="block";	
document.getElementById("maker").style.display="none";
document.getElementById("product").style.display="none";
document.getElementById("employee").style.display="none";
document.getElementById("store").style.display="none";
document.getElementById("customer").style.display="none";
document.getElementById("category").style.display="none";
}

if (selopt == "employee") {
document.getElementById("employee").style.display="block";	
document.getElementById("maker").style.display="none";
document.getElementById("product").style.display="none";
document.getElementById("buy").style.display="none";
document.getElementById("store").style.display="none";
document.getElementById("customer").style.display="none";
document.getElementById("category").style.display="none";
}

if (selopt == "store") {
document.getElementById("store").style.display="block";	
document.getElementById("maker").style.display="none";
document.getElementById("product").style.display="none";
document.getElementById("buy").style.display="none";
document.getElementById("employee").style.display="none";
document.getElementById("customer").style.display="none";
document.getElementById("category").style.display="none";
}


}
