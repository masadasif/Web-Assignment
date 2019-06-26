
var xHRObject = false;

if (window.XMLHttpRequest) 
{
	xHRObject = new XMLHttpRequest();
}
else if (window.ActiveXObject) 
{
	xHRObject = new ActiveXObject("Microsoft.XMLHTTP");
}

function resset() {

document.getElementById('i_name').value ="";
document.getElementById('qty').value="";
document.getElementById('desc').value="";
document.getElementById('i_price').value ="";
}


function add_item() {

    var i_name = document.getElementById('i_name').value;
    var qty = document.getElementById('qty').value;
	var desc = document.getElementById('desc').value;
	var i_price = document.getElementById('i_price').value;

	var newDate = new Date().getTime();
	
	xHRObject.open("GET","listing.php?i_name="+i_name+"&qty="+qty+"&i_price="+i_price+"&desc="+desc+"&i_number="+newDate,true);
		xHRObject.onreadystatechange = function()
		{
			
			if (xHRObject.readyState == 4 && xHRObject.status == 200) 
			{
				 document.getElementById('information').innerHTML =  xHRObject.responseText;
				 }
				 } 

xHRObject.send(null);	

    resset();
}
 function login_user(){

	
	var password = document.getElementById('password').value;
    var email = document.getElementById('email').value;
	
	xHRObject.open("GET","login.php?password="+password+"&email="+email,true);
		xHRObject.onreadystatechange = function()
		{
			
			if (xHRObject.readyState == 4 && xHRObject.status == 200) 
			{
				 var resp = xHRObject.responseText;
				 	 if (resp == 1){
			     alert("Logged In Successfully");
				
				 }
				 else{
					 alert("Incorrect Username OR Password");
					
					 }
			
				 }}
				 
				 

xHRObject.send(null);	
	
	} 
	

function validate_form() 
{   
    var f_name = document.getElementById('f_name').value;
	var l_name = document.getElementById('l_name').value;
    var p_number = document.getElementById('p_number').value;
	var password = document.getElementById('password').value;
	var c_password = document.getElementById('c_password').value;
    var email = document.getElementById('email').value;

if (f_name==="" || l_name==="" || password==="" || c_password==="" || email==="")
        { 
            alert("Please Fill All Required Field");
         
        return false;
		}
       else{
		   var number = /^\(?([0]{1})([0-9]{1})\)?[-.]?([0-9]{8})$/;
		   if(p_number.match(number)){ 
		  
		   }
		   else{
			   alert("Wrong Phone Number Format.");
		   return false;
		   } 

	   if (password !== c_password) {
            alert("Passwords do not match.");
			return false;
	   }
	   else {return true;}
	 
	   }
}
				   
function send_server() 
{        var all_correct = true;

	   all_correct = validate_form();
       if(all_correct === true){
    var f_name = document.getElementById('f_name').value;
	var l_name = document.getElementById('l_name').value;
    var p_number = document.getElementById('p_number').value;
	var password = document.getElementById('password').value;
	var c_password = document.getElementById('c_password').value;
    var email = document.getElementById('email').value;
	
	
	xHRObject.open("GET","register.php?f_name="+f_name+"&l_name="+l_name+"&p_number="+p_number+"&password="+password+"&email="+email,true);
		xHRObject.onreadystatechange = function()
		{
			
			if (xHRObject.readyState == 4 && xHRObject.status == 200) 
			{
				
				 var resp = xHRObject.responseText;
				 if (resp == 1){
			     alert("Email Address Already Exist");
				 return false; 
				 }
				 else{
					 alert("Registered Successfully");
					 return false;
					 }
			
				 }}

xHRObject.send(null);	

	   }
}

	
 function login_manager()	{

	
	var password = document.getElementById('password').value;
    var username = document.getElementById('username').value;
	username = username.trim();
	xHRObject.open("GET","mlogin.php?password="+password+"&username="+username,true);
		xHRObject.onreadystatechange = function()
		{
			
			if (xHRObject.readyState == 4 && xHRObject.status == 200) 
			{
				var resp = xHRObject.responseText;
				 if (resp == 1){
			     alert("Incorrect Password");
				 
				 }
				 else if(resp == 2){
					 
					 alert("Incorrect Username");
					 }
				 else{
					 alert("Logged IN Successfully");
					 window.location = "listing.htm";
					 }
				 }
				 } 

xHRObject.send(null);	
	
	} 



function logout1() {

xHRObject.open ("GET", "logout.php", false);

xHRObject.onreadystatechange = function(){

	if ((xHRObject.readyState == 4) && (xHRObject.status == 200)) {

	}}
	xHRObject.send(null);
	
	document.getElementById('information').innerHTML = xHRObject.responseText;
	
}

function back_home() {
 window.location = "buyonline.htm";

}
function logout() {
 window.location = "logout.htm";
 logout1();

}

function loadXMLDoc()
{ var temp;
	xHRObject.open ("GET", "processing.php?process=t", false);

xHRObject.onreadystatechange = function(){
	
	if ((xHRObject.readyState == 4) && (xHRObject.status == 200)) {
    temp = xHRObject.responseText;
	//return temp;
	}}
	xHRObject.send(null);
	
	return temp;
}



function display_p() 
{
	xmlDoc=loadXMLDoc();
	var parser = new DOMParser(); 
	var xmlDoc = parser.parseFromString(xHRObject.response, "text/xml");
	var items = xmlDoc.getElementsByTagName("Item");
	var spantag = document.getElementById("table");
	var div = document.getElementById("maintable");
	var x;
        	spantag.innerHTML = "";
			x = "<table class='container' border='1' >";
			x += "<tr bgcolor='#fff'><td>Item Number</td><td>Item Name</td><td>Item Price</td><td>Item Quantity</td><td>Quantity on Hold</td><td>Quantity Sold</td></tr>";
	
	for (i=0; i<items.length; i++) 
	{
		var itemname = items[i].getElementsByTagName("ItemName")[0].childNodes[0].nodeValue;
		var itemprice = items[i].getElementsByTagName("ItemPrice")[0].childNodes[0].nodeValue;
		var itemquantity = items[i].getElementsByTagName("ItemQuantity")[0].childNodes[0].nodeValue;
		var itemdesc = items[i].getElementsByTagName("ItemDescription")[0].childNodes[0].nodeValue;
		var itemnumber = items[i].getElementsByTagName("ItemNumber")[0].childNodes[0].nodeValue;
		var itemhold = items[i].getElementsByTagName("ItemHold")[0].childNodes[0].nodeValue;
		var itemsold = items[i].getElementsByTagName("ItemSold")[0].childNodes[0].nodeValue;
		
		x += "<tr>"
				+ "<td>" + itemnumber + "</td>"
				+ "<td>" + itemname + "</td>"
				+ "<td>" + itemprice + "</td>"
				+ "<td>" + itemquantity + "</td>"
				+ "<td>" + itemhold + "</td>"
				+ "<td>" + itemsold + "</td>"
			
				+ "</tr>";
	
   	}
	x += "</table> ";
			
				spantag.innerHTML = x;
}


function process(){
	var process;
	xHRObject.open ("GET", "processing.php?process=p", true);

xHRObject.onreadystatechange = function(){

	if ((xHRObject.readyState == 4) && (xHRObject.status == 200)) {
	}}
	xHRObject.send(null);
	
}
