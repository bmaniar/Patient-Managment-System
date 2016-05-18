// JavaScript Document
var XMLHttpRequestObject=false;
function display(classid)
{
if(window.XMLHttpRequest)
{
XMLHttpRequestObject=new XMLHttpRequest();
}
else if(window.ActiveXObject)
{
XMLHttpRequestObject=new ActiveXObject("Microsoft.XMLHTTP");
} 
XMLHttpRequestObject.onreadystatechange=function()
{
if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200)
{
document.getElementById("div").innerHTML=XMLHttpRequestObject.responseText;
}
}
XMLHttpRequestObject.open("GET","displaydewycat.php?classid="+classid,true);
XMLHttpRequestObject.send();
}

var XMLHttpRequestObject=false;
function getcopy(accNo)
{
if(window.XMLHttpRequest)
{
XMLHttpRequestObject=new XMLHttpRequest();
}
else if(window.ActiveXObject)
{
XMLHttpRequestObject=new ActiveXObject("Microsoft.XMLHTTP");
} 
XMLHttpRequestObject.onreadystatechange=function()
{
if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200)
{
document.getElementById("get").innerHTML=XMLHttpRequestObject.responseText;
}
}
XMLHttpRequestObject.open("GET","bookcopy.php?accNo="+accNo,true);
XMLHttpRequestObject.send();
}

var XMLHttpRequestObject=false;
function viewonly(studentid)
{
if(window.XMLHttpRequest)
{
XMLHttpRequestObject=new XMLHttpRequest();
}
else if(window.ActiveXObject)
{
XMLHttpRequestObject=new ActiveXObject("Microsoft.XMLHTTP");
} 
XMLHttpRequestObject.onreadystatechange=function()
{
if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200)
{
document.getElementById("view").innerHTML=XMLHttpRequestObject.responseText;
}
}
XMLHttpRequestObject.open("GET","viewonly.php?studentid="+studentid,true);
XMLHttpRequestObject.send();
}

var XMLHttpRequestObject=false;
function dissearch(classid)
{
if(window.XMLHttpRequest)
{
XMLHttpRequestObject=new XMLHttpRequest();
}
else if(window.ActiveXObject)
{
XMLHttpRequestObject=new ActiveXObject("Microsoft.XMLHTTP");
} 
XMLHttpRequestObject.onreadystatechange=function()
{
if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200)
{
document.getElementById("display").innerHTML=XMLHttpRequestObject.responseText;
}
}
XMLHttpRequestObject.open("GET","searchbookview.php?classid="+classid,true);
XMLHttpRequestObject.send();
}

/*new ajax for printing*/
var XMLHttpRequestObject=false;
function getbooks(year)
{
if(window.XMLHttpRequest)
{
XMLHttpRequestObject=new XMLHttpRequest();
}
else if(window.ActiveXObject)
{
XMLHttpRequestObject=new ActiveXObject("Microsoft.XMLHTTP");
} 
XMLHttpRequestObject.onreadystatechange=function()
{
if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200)
{
document.getElementById("getresult").innerHTML=XMLHttpRequestObject.responseText;
}
}
XMLHttpRequestObject.open("GET","getbooks.php?year="+year,true);
XMLHttpRequestObject.send();
}
