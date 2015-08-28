//Common JavaScript file
function timevalidation(form1)
{
	var rex=/^([0][1-9]|[1][1-2])\:([0-5][0-9])\ (pm|am|Am|Pm|AM|PM)+$/;
		if(!rex.test(order_search.event_time.value))
			{
			alert("Invalid time Ex:04:00 pm");			
			return false;
			}	
}
//Function to previous page
function goback()
{
	history.go(-1);	
}


//function to clear field values
function clear_values(form,count)
{
	var form_elements = form.elements
	var form_count = form_elements.length-count;
	
	for(k=0;k<form_count;k++)
	{
		form_elements[k].value="";
	}
}

//Function to confirm
function get_confirm(url,msg)
{ 
 doyou = confirm(msg);
 if (doyou == true)
 {
 	  window.location.href=url;
 }
}
//AJAX Functionalities
var http = getHTTPObject();
function request_ajax(divid,url,qrystr)
{
var loadstatustext="Loading..."
var sId="?"+qrystr;
function handleHttpResponse()
{ 
if (http.readyState == 4)
{ 
if(http.status==200)
{ 
var results=http.responseText; 
document.getElementById(divid).innerHTML = results; 
} 
}
} 
document.getElementById(divid).innerHTML = loadstatustext;  
http.open("GET", url + sId, true);
http.onreadystatechange = handleHttpResponse;
http.send(null); 
}
var http1 = getHTTPObject();
function request_ajax2(divid,url,qrystr)
{
	//alert(qrystr);
	var loadstatustext="Loading..."
	var sId="?"+qrystr;
   function handleHttpResponse()
   { 
		if (http1.readyState == 4)
		{ 
			 if(http1.status==200)
			  { 
				var results=http1.responseText; 
				document.getElementById(divid).innerHTML = results; 
			  } 
		  }
	} 
	document.getElementById(divid).innerHTML = loadstatustext;  
	http1.open("GET", url + sId, true);
	http1.onreadystatechange = handleHttpResponse;
	http1.send(null); 
}
function getHTTPObject()
{ 
var xmlhttp; 

if(window.XMLHttpRequest){ 
xmlhttp = new XMLHttpRequest();
} 
else if (window.ActiveXObject){  
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
if (!xmlhttp){ 
xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
} 
} 
return xmlhttp; 
}


