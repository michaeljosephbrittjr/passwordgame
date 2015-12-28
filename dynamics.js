function centerform() {
	var element = document.getElementById("mainform");
	var distance = ((window.innerWidth / 2) - (element.clientWidth / 2));
	element.style.left = distance;
	distance = ((window.innerHeight / 2) - (element.clientHeight / 2));
	element.style.top = distance;
	}

function nightandday(i) {
    var d = new Date();
    var r = ((Math.abs(30 - d.getSeconds()) + 5)).toString();
    var g = ((Math.abs(30 - d.getSeconds()) * 5)).toString();
    var b = ((Math.abs(30 - d.getSeconds()) * 8) + 23).toString();
    document.body.style.background = "rgb(" + r + "," + g + "," + b + ")";
    document.getElementById("mainform").style.background = "rgb(" + g + "," + b + ",255)";
    return Number(i);
	}

function limitlength(obj, length) {
	var maxlength=length
	if (obj.value.length>maxlength) {
		obj.value=obj.value.substring(0, maxlength); 
		}
	}

function numbersonly(e) { 
	var unicode=e.charCode? e.charCode : e.keyCode;
	if (unicode!=8&&unicode!=32) { //if not backspace AND not space
		if (unicode<48||unicode>57) {//if not a number
			if (unicode<97||unicode>122) {//if not a letter
				if (unicode<65||unicode>90) { // if not uppercase 
	 				return false;
					}
				}
			}		
		}
	}	

var receiveReq =  new XMLHttpRequest(); 

function handleSayHello() { 	//Called every time our XmlHttpRequest objects state changes.
	if (receiveReq.readyState == 4) { //Check to see if the XmlHttpRequests state is finished.
		var element = document.getElementById('fiftyfiftyfeed');		//get our span element
		element.innerHTML = receiveReq.responseText;		//Set the contents to the result of the asyncronous call.
		}
	}

function postquip(userid) {
	var fiftyfiftyfeed = document.getElementById("fiftyfiftyfeed");
	fiftyfiftyfeed.style.visibility = "visible";
	var element = document.getElementById("quipform");
	var quip = element.inputquip.value;
	if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {	//If our XmlHttpRequest object is not in the middle of a request
		var quipstring = 'makequip.php?quip=' + quip + '&userid=' + userid;		//Setup the connection as a GET call to makequip.php
		receiveReq.open("GET", quipstring, true);		//True explicity sets the request to asyncronous (default).
		receiveReq.onreadystatechange = handleSayHello; 		//Set the function that will be called when the XmlHttpRequest objects state changes.
		receiveReq.send(null);		//Make the actual request.
		}
	}

function hidebox() {
	var element = document.getElementById("mainform");
	element.style.visibility = "hidden"; 
	}

function showbox() {
	var element = document.getElementById("mainform");
	element.style.visibility = "visible";	
	}

var o = setInterval(function(){centerform()}, 300);
clearTimeout(o);
var i = 140;
var o = setInterval(function(){nightandday(i)}, ((i % 69) * 13));

