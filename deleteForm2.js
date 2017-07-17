function deleteForm(){
	var selopt = document.getElementById("deletelist").value;

if(selopt=="product"){
	document.getElementById("productlist2").style.display="inline-block";
	document.getElementById("categorylist2").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("makerlist").style.display="none";
	document.getElementById("customerlist").style.display="none";
	document.getElementById("buylist").style.display="none";
	document.getElementById("storelist").style.display="none";
	document.getElementById("employeelist").style.display="none";
	document.getElementById("carrieslist").style.display="none";e3e
	
}

if(selopt=="category"){
	document.getElementById("categorylist2").style.display="inline-block";
	document.getElementById("productlist2").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("makerlist").style.display="none";
	document.getElementById("customerlist").style.display="none";
	document.getElementById("buylist").style.display="none";
	document.getElementById("storelist").style.display="none";
	document.getElementById("carrieslist").style.display="none";
	document.getElementById("employeelist").style.display="none";
}


if(selopt=="maker"){
	document.getElementById("makerlist").style.display="inline-block";
	document.getElementById("productlist2").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("categorylist2").style.display="none";
	document.getElementById("customerlist").style.display="none";
	document.getElementById("buylist").style.display="none";
	document.getElementById("storelist").style.display="none";
	document.getElementById("employeelist").style.display="none";
	document.getElementById("carrieslist").style.display="none";
	
}

if(selopt=="customer"){
	document.getElementById("customerlist").style.display="inline-block";
	document.getElementById("productlist2").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("categorylist2").style.display="none";
    document.getElementById("makerlist").style.display="none";
	document.getElementById("buylist").style.display="none";
	document.getElementById("storelist").style.display="none";
	document.getElementById("employeelist").style.display="none";
	document.getElementById("carrieslist").style.display="none";
}

if(selopt=="buy"){
	document.getElementById("buylist").style.display="inline-block";
	document.getElementById("productlist2").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("categorylist2").style.display="none";
    document.getElementById("makerlist").style.display="none";
	document.getElementById("customerlist").style.display="none";
	document.getElementById("storelist").style.display="none";
	document.getElementById("employeelist").style.display="none";
	document.getElementById("carrieslist").style.display="none";
}

if(selopt=="store"){
	document.getElementById("storelist").style.display="inline-block";
	document.getElementById("productlist2").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("categorylist2").style.display="none";
    document.getElementById("makerlist").style.display="none";
	document.getElementById("customerlist").style.display="none";
	document.getElementById("buylist").style.display="none";
	document.getElementById("employeelist").style.display="none";
	document.getElementById("carrieslist").style.display="none";
}

if(selopt=="employee"){
	document.getElementById("employeelist").style.display="inline-block";
	document.getElementById("storelist").style.display="none";
	document.getElementById("productlist2").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("categorylist2").style.display="none";
    document.getElementById("makerlist").style.display="none";
	document.getElementById("customerlist").style.display="none";
	document.getElementById("buylist").style.display="none";
	document.getElementById("carrieslist").style.display="none";
	
}

if(selopt=="carries"){
	document.getElementById("carrieslist").style.display="inline-block";
	
	document.getElementById("employeelist").style.display="none";
	document.getElementById("storelist").style.display="none";
	document.getElementById("productlist2").style.display="none";
	document.getElementById("none").style.display="none";
	document.getElementById("categorylist2").style.display="none";
    document.getElementById("makerlist").style.display="none";
	document.getElementById("customerlist").style.display="none";
	document.getElementById("buylist").style.display="none";
	
}
}
