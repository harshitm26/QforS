var temp;
temp=new XMLHttpRequest();


function clearsidediv(){
	//handwave('clearsidediv()');
	document.getElementById('sidediv1').style.display='none';
	document.getElementById('sidediv2').style.display='none';
	//document.getElementById('sidediv3').style.display='none';
	//document.getElementById('sidediv4').style.display='none';
	//~ document.getElementById('sidediv5').style.display='none';
}


function clearmaindiv(){
	//handwave('clearmaindiv()');
	//document.getElementById('maindiv1').innerHTML="";
	//~ document.getElementById('maindiv2').innerHTML="";
	//~ document.getElementById('maindiv3').innerHTML="";
	//~ document.getElementById('maindiv4').innerHTML="";
	
}
			

function showsubbuttons(id){
	//handwave(' showsubbuttons() ')
	$(id).show();
	//document.getElementById(id).style.display="inline";	
}

function clear(){
		//handwave('clear()');
		clearsidediv();
		//~ clearmaindiv();
}

function showsidediv(id){
	clear();
	document.getElementById(id).style.display="inline";
	document.getElementById('ngo_login_div').style.display = "none";
	document.getElementById('user_login_div').style.display = "none";

}

	
window.onload=clear;
document.onload=clear;


function get_user_login()
{
	document.getElementById('user_login_error').style.display = 'none';
	document.getElementById('user_login_div').style.display = 'inline';
	document.getElementById('sidediv2').style.display = 'none';
	return;
}




function get_ngo_login()
{
	document.getElementById('ngo_login_error').style.display = 'none';
	document.getElementById('ngo_login_div').style.display = 'inline';
	document.getElementById('sidediv1').style.display = 'none';

	return;
}


function ngoregistration(){
	

	//~ var objectquota=document.getElementById('quota');
	//~ var quota= objectquota.options[objectquota.selectedIndex].value;
	
	var params= "uniqueid="+document.getElementById('uniqueid').value + "&ngo_name="
	+ document.getElementById('ngo_name').value + "&contact=" + document.getElementById('contact').value
	+ "&exact_address=" + document.getElementById('exact_address').value + "&email="
	+ document.getElementById('email').value + "&password=" + document.getElementById('password').value;
	
	temp.open("POST", "registerngo.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			get_ngo_login();
		}
	}
	temp.send(params);
	
}



function userregistration(){


	//~ var objectquota=document.getElementById('quota');
	//~ var quota= objectquota.options[objectquota.selectedIndex].value;
	
	var params= "user_uniqueid="+document.getElementById('user_uniqueid').value + "&name="
	+ document.getElementById('name').value + "&last_name=" + 	document.getElementById('last_name').value + 
	"&user_contact=" + document.getElementById('user_contact').value
	+ "&user_exact_address=" + document.getElementById('user_exact_address').value + "&user_email="
	+ document.getElementById('user_email').value + "&user_password=" + document.getElementById('user_password').value;
	
	$temp = document.getElementById('name').value;
	//alert ($temp);
	temp.open("POST", "registeruser.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			
			//document.getElementById('sidediv10').innerHTML=temp.responseText;
			get_user_login();
		}
	}
	temp.send(params);
	
}


function ngologin(){
	
	//~ var objectquota=document.getElementById('quota');
	//~ var quota= objectquota.options[objectquota.selectedIndex].value;
	
	var params= "login_uniqueid="+document.getElementById('login_uniqueid').value + "&login_password="
	+ document.getElementById('login_password').value;
	
	temp.open("POST", "ngologin.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	clearmaindiv();
	clearsidediv();
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			
			document.getElementById('ngo_login_error').style.display = 'inline';
			document.getElementById('ngo_login_error').innerHTML=temp.responseText;
			document.getElementById('sidediv1').style.display = 'none';
			document.getElementById('ngo_login_div').style.display = 'none';

		}
	}
	//~ showsubbuttons('subbuttons1');
	temp.send(params);
	//document.getElementById('sidediv5').style.display='none';
	
}

function add_cause(){
	var params ="cause="+document.getElementById('ngo_cause').value;
	temp.open("POST", "add_cause.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");

	temp.onreadystatechange=function(){
		
		if(temp.readyState==4 && temp.status==200){

			document.getElementById('sidediv5').innerHTML=temp.responseText;

		}
	}
	temp.send(params);	
}

function userlogin(){
	//handwave(' userlogin() start');
	//alert("hi");
	//~ var objectquota=document.getElementById('quota');
	//~ var quota= objectquota.options[objectquota.selectedIndex].value;
	
	var params= "login_user_uniqueid="+document.getElementById('login_user_uniqueid').value + "&login_user_password="
	+ document.getElementById('login_user_password').value;
	
	temp.open("POST", "userlogin.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	clearmaindiv();
	clearsidediv();
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			//handwave(params);
			//document.getElementById('user_login').innerHTML=temp.responseText;
			document.getElementById('user_login_error').style.display = 'inline';
			document.getElementById('user_login_error').innerHTML=temp.responseText;
			document.getElementById('sidediv2').style.display = 'none';
			document.getElementById('user_login_div').style.display = 'none';

		}
	}
	temp.send(params);
	
}


function monetary_info(){
	var params ='';
	temp.open("POST", "monetary_info.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			document.getElementById('ngo_login_error').innerHTML=temp.responseText;
		}
	}
	temp.send(params);
	document.getElementById('ngo_login_error').style.display='inline';
	
}



function fill_money(radio_id){
	//alert("fill_money");
	var cause = get_radio_value(radio_id);
	var params ='cause='+cause;
	temp.open("POST", "fill_money.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			document.getElementById('ngo_login_error').innerHTML=temp.responseText;
		}
	}
	temp.send(params);
	document.getElementById('ngo_login_error').style.display='inline';
}


function extract_money(){
	//alert("extract_money");
	var params ='amount='+document.getElementById('extract_amount').value + '&exact_cause='+ document.getElementById('exact_cause').value;
	temp.open("POST", "extract_money.php", true);
	//alert('hi');
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			document.getElementById('ngo_login_error').innerHTML=temp.responseText;
		}
	}
	temp.send(params);
	document.getElementById('ngo_login_error').style.display='inline';
}


function user_donation(){
	var params ='';
	temp.open("POST", "user_donation.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			document.getElementById('user_login_error').innerHTML=temp.responseText;
		}
	}
	temp.send(params);
	document.getElementById('user_login_error').style.display='inline';
	//~ alert('user');
}

function donate_ngo(){
	var params ='';
	temp.open("POST", "donate_ngo.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			document.getElementById('user_login_error').innerHTML=temp.responseText;
		}
	}
	temp.send(params);
	document.getElementById('user_login_error').style.display='inline';
}


function user_teaching(){
	var params ='';
	temp.open("POST", "user_teaching.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			//handwave(params);
			//alert(temp.responseText);
			document.getElementById('user_login_error').style.display = 'inline';
			document.getElementById('user_login_error').innerHTML=temp.responseText;

			new JsDatePick({
			    useMode:2,
			    dateFormat:"%Y-%m-%d",
			    yearsRange: new Array(2013,2015),
			    target:"date"                   
			});
			        
			$('#start_time').ptTimeSelect();
			$('#end_time').ptTimeSelect();
			//alert("Done");
		}
	}
	temp.send(params);
            
	//handwave(' user_donation() end  ');
}


function ngo_teching()
{
	var params ='';
	temp.open("POST", "user_teaching.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			//handwave(params);
			//alert(temp.responseText);
			document.getElementById('user_login_error').style.display = 'inline';
			document.getElementById('user_login_error').innerHTML=temp.responseText
			//alert("Done");
		}
	}
	temp.send(params);
}



function book_slot(){
	  var check = 0;
	  var chx = document.getElementsByTagName('input');
	  for (var i=0; i<chx.length; i++){
	    if (chx[i].type == 'radio' && chx[i].checked){
	    	check = 1; 
	    } 
	  }

	if (check == 0){
		alert('Please select one slot');
	}
	else{
		var params= "book="+$('input:radio[name=book]:checked').val();
		//var params ='';
		temp.open("POST", "book_slot.php", true);
		temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		temp.setRequestHeader("Content-length", params.length);
		temp.setRequestHeader("Connection", "close");
		temp.onreadystatechange=function(){
			if(temp.readyState==4 && temp.status==200){
				//~ document.getElementById('sidediv2').style.display = 'none';
				document.getElementById('user_login_error').style.display = 'none';
				//document.getElementById('sidediv2').innerHTML=temp.responseText;
				alert(temp.responseText);
				userlogin();
				
			}	
		}
		temp.send(params);

	}
}	

 function get_radio_value(radio_id) {
            var inputs = document.getElementsByName(radio_id);
            for (var i = 0; i < inputs.length; i++) {
              if (inputs[i].checked) {
                return inputs[i].value;
              }
            }
}



function ngo_selection1(radio_id){
	//~ alert("Ngo Selectoin");
	//~ alert("ngo_selection:"+ radio_id);
	var id = get_radio_value(radio_id);
	//handwave(' ngo_selection() start');
	//~ onsubmit(radio_id);
	//~ alert("selected input is: " + id);
	var params ='id='+id;
	temp.open("POST", "ngo_selection.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			//handwave(params);
			//alert(temp.responseText);
			document.getElementById('user_login_error').innerHTML="";
			document.getElementById('user_login_error').innerHTML=temp.responseText;
		}
	}
	temp.send(params);
	document.getElementById('user_login_error').style.display='inline';
}




function donate_money(){
	//~ alert("ngo_selection:"+ radio_id);
	//~ onsubmit(radio_id);
	var bank = document.getElementById("bank").value;
	var params ='bank='+bank;
	temp.open("POST", "donate_money.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			document.getElementById('user_login_error').innerHTML=temp.responseText;
		}
	}
	temp.send(params);
	showsidediv('user_login_error');
}


function insert_money(bank){
	//~ onsubmit(radio_id);
	var amount = document.getElementById("amount").value;
	var params ="amount="+amount+"&bank="+bank;
	temp.open("POST", "insert_money.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			document.getElementById('user_login_error').innerHTML="";
			document.getElementById('user_login_error').innerHTML=temp.responseText;
		}
	}
	
	temp.send(params);
	document.getElementById('user_login_error').style.display='inline';
}

function verify_fund_usage(){
	//~ onsubmit(radio_id);
	//~ var amount = document.getElementById("amount").value;
	var params ="";
	temp.open("POST", "verify_fund_usage.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			document.getElementById('user_login_error').innerHTML="";
			document.getElementById('user_login_error').innerHTML=temp.responseText;
		}
	}
	
	temp.send(params);
	document.getElementById('user_login_error').style.display='inline';
}
function food_donation(){
	//~ onsubmit(radio_id);
	//~ var amount = document.getElementById("amount").value;
	var params ="";
	temp.open("POST", "verify_fund_usage.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			document.getElementById('user_login_error').innerHTML="";
			document.getElementById('user_login_error').innerHTML=temp.responseText;
		}
	}
	
	temp.send(params);
	document.getElementById('user_login_error').style.display='inline';
}
function medicine_donation(){
	//~ onsubmit(radio_id);
	//~ var amount = document.getElementById("amount").value;
	var params ="";
	temp.open("POST", "verify_fund_usage.php", true);
	temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	temp.setRequestHeader("Content-length", params.length);
	temp.setRequestHeader("Connection", "close");
	
	temp.onreadystatechange=function(){
		if(temp.readyState==4 && temp.status==200){
			document.getElementById('user_login_error').innerHTML="";
			document.getElementById('user_login_error').innerHTML=temp.responseText;
		}
	}
	
	temp.send(params);
	document.getElementById('user_login_error').style.display='inline';
}
