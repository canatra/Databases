function searchForm(){
	var selopt = document.getElementById("tablemenu").value;

if(selopt=="product"){
	document.getElementById("productlist").style.display="inline-block";
	document.getElementById("categorylist").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("makerlist").style.display="none";
	document.getElementById("customerlist").style.display="none";
	document.getElementById("buylist").style.display="none";
	document.getElementById("storelist").style.display="none";
	document.getElementById("employeelist").style.display="none";
	document.getElementById("carrieslist").style.display="none";e3e
	
}

if(selopt=="Category"){
	document.getElementById("categorylist").style.display="inline-block";
	document.getElementById("productlist").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("makerlist").style.display="none";
	document.getElementById("customerlist").style.display="none";
	document.getElementById("buylist").style.display="none";
	document.getElementById("storelist").style.display="none";
	document.getElementById("carrieslist").style.display="none";
	document.getElementById("employeelist").style.display="none";
}


if(selopt=="makers"){
	document.getElementById("makerlist").style.display="inline-block";
	document.getElementById("productlist").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("categorylist").style.display="none";
	document.getElementById("customerlist").style.display="none";
	document.getElementById("buylist").style.display="none";
	document.getElementById("storelist").style.display="none";
	document.getElementById("employeelist").style.display="none";
	document.getElementById("carrieslist").style.display="none";
	
}

if(selopt=="Customer"){
	document.getElementById("customerlist").style.display="inline-block";
	document.getElementById("productlist").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("categorylist").style.display="none";
    document.getElementById("makerlist").style.display="none";
	document.getElementById("buylist").style.display="none";
	document.getElementById("storelist").style.display="none";
	document.getElementById("employeelist").style.display="none";
	document.getElementById("carrieslist").style.display="none";
}

if(selopt=="buy"){
	document.getElementById("buylist").style.display="inline-block";
	document.getElementById("productlist").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("categorylist").style.display="none";
    document.getElementById("makerlist").style.display="none";
	document.getElementById("customerlist").style.display="none";
	document.getElementById("storelist").style.display="none";
	document.getElementById("employeelist").style.display="none";
	document.getElementById("carrieslist").style.display="none";
}

if(selopt=="Store"){
	document.getElementById("storelist").style.display="inline-block";
	document.getElementById("productlist").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("categorylist").style.display="none";
    document.getElementById("makerlist").style.display="none";
	document.getElementById("customerlist").style.display="none";
	document.getElementById("buylist").style.display="none";
	document.getElementById("employeelist").style.display="none";
	document.getElementById("carrieslist").style.display="none";
}

if(selopt=="Employee"){
	document.getElementById("employeelist").style.display="inline-block";
	document.getElementById("storelist").style.display="none";
	document.getElementById("productlist").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("categorylist").style.display="none";
    document.getElementById("makerlist").style.display="none";
	document.getElementById("customerlist").style.display="none";
	document.getElementById("buylist").style.display="none";
	document.getElementById("carrieslist").style.display="none";
	
}

if(selopt=="carries"){
	document.getElementById("carrieslist").style.display="inline-block";
    document.getElementById("employeelist").style.display="none";
	document.getElementById("storelist").style.display="none";
	document.getElementById("productlist").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("categorylist").style.display="none";
    document.getElementById("makerlist").style.display="none";
	document.getElementById("customerlist").style.display="none";
	document.getElementById("buylist").style.display="none";
	
}
}
