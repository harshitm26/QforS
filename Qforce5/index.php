
<?php
include ("dblink.php");
?>
<!--DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Mini Social - free website template</title>
<meta name="keywords" content="mini social, free download, website templates, CSS, HTML"/>
<meta name="description" content="Mini Social is a free website template from templatemo.com"/>
<link href="templatemo_style.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/coda-slider.css" type="text/css" media="screen" charset="utf-8"/>
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>


<script src="js/jquery.scrollTo-1.3.3.js" type="text/javascript"></script>
<script src="js/jquery.localscroll-1.2.5.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.serialScroll-1.2.1.js" type="text/javascript" charset="utf-8"></script>
<script src="js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
<script src="js/header.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" type="text/css" media="all" href="css/jquery-ui.css" />
<script src="js/jquery.ptTimeSelect.js"></script>
<script src="js/jquery.ptTimeSelect.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/jquery.ptTimeSelect.css" />
<script src="js/jsDatePick.full.1.3.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />

<script>

function showUser()
{
    //alert("Called")
    ngo = $("#ngo_name").val();
    date = $("#date").val(); 
    start_time = $("#start_time").val(); 
    end_time = $("#end_time").val();


if (ngo=="" && start_time == "" && end_time == "")
  {
  document.getElementById("txtHint").innerHTML="<b>Free Slots information will be shown here.</b>";
  return;
  }

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	if (document.getElementById("txtHint") != null)
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","show_free_slots.php?ngo="+ngo+"&date="+date+"&start_time="+start_time+"&end_time="+end_time,true);
xmlhttp.send();
}

</script>

</head>
<body>

<div id="slider">
    <div id="templatemo_sidebar">
            <a href="http://www.facebook.com/Qfors" target="_parent">
                <img src="images/templatemo_logo.png" alt="Mini Social"/></a>
        <!-- end of header -->
        <ul class="navigation">
            <li><a href="#home"><text  style='color:white;font-size:20px;'>Home</text><span class="ui_icon home"></span></a></li>
            <li><a href="#aboutus"><text  style='color:white;font-size:20px;'>About Us<span class="ui_icon aboutus"></text></span></a></li>
            <li><a href="#user_login" onclick="get_user_login()"><text  style='color:white;font-size:20px;'>User Login</text><span class="ui_icon gallery"></span></a></li>
            <li><a href="#ngo_login" onclick="get_ngo_login()"><text  style='color:white;font-size:20px;'>NGO Login</text><span class="ui_icon gallery"></span></a></li>
            <li><a href="#gallery"><text  style='color:white;font-size:20px;'>Be the Change</text><span class="ui_icon gallery"></span></a></li>
            <li><a href="#contactus"><text  style='color:white;font-size:20px;'>Contact Us</text><span class="ui_icon contactus"></span></a></li>
        </ul>
    </div>
    <!-- end of sidebar -->
    <div id="templatemo_main">
        
        <div id="content">
            <!-- scroll -->
            <div class="scroll">
                <div class="scrollContainer">
                    <div class="panel" id="home">
                        <h1 align ='center' style='color:white;font-size:40px;'><b>QforS</b></h1>
                        <br><br>
                        <div class="image_wrapper image_fl">
                            <img src="images/home1.jpg" alt="image"/>
                        </div>
                        <p style='color:FFFED9;font-size:15px;'>
                            People often feel a sense of social responsibility on moral grounds but in today's fast paced modern society every individual falls short of ‘time’.
							<br><br>
							On the other hand put an effort in dealing with the very basic problem of our country, need of social help for quite a big fraction of people, such as basic education, basic household needs, monetary support and many more.
							<br><br>

                        </p>                       
                    </div>
                    <!-- end of home -->
                    <div class="panel" id="aboutus">
                        <h1 align ='center' style='color:white;font-size:40px;'><b>QforS</b></h1>
                        <p style='color:white;face-family:comic sans ms;font-size:22px;'>
							What do we do ???
						</p>
                        <div class="image_wrapper image_fl">
                            <img src="images/home.jpg" alt="image"/>
                        </div>
                        
                        <p style='color:FFFED9;font-size:15px;'>
                        <ul style='color:FFFED9;font-size:15px;'>
                            <li>Online portal tied up with various NGOs across the area (starting with a city -Hyderabad)
							</li>
							<br>
                            <li>They would provide us with information containing social requirements in their respective localities. 
							</li>
							<br>
							<li>QforS would collect all such data from various NGOs  corresponding to various localities, process and project them online.
							</li>
							<br>
							<li>Volunteers could choose from the list what they could contribute considering their ease.
							</li>
							<br>
							<li>Ngo’s would be timely updating the requirement list.
							</li>
						</ul>
						</p>
                    </div>
                    
                    <div class="panel" id="user_login">
                        <form method='post' action='' align='center'>
                            <div id = 'user_login_div'>
                                <table align='center'>
                                    <tr>
                                        <td align='left' style='color:white;font-size:20px;'>
                                            User Name:
                                        </td>
                                        <td align='right'>
                                            <input class='button_example' style='width:200;height:40' type='text' size='20' id='login_user_uniqueid'  name='login_user_uniqueid'/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='left' style='color:white;font-size:20px;'>
                                            Password:
                                        </td>
                                        <td align='right'>
                                            <input class='button_example' style='width:200;height:40' type='password' size='20' id='login_user_password' name='login_user_password'/>
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                <input class='button_example' style='width:200;height:40' type='button' value='Submit' size='20' id='mybutton' name='password' onclick='userlogin();'/><br><br>
                                <input class='button_example' style='width:200;height:40' type='button' size='8' value='Register' onclick="showsidediv('sidediv2');"/>
                            </div>
                            <div id='user_login_error'>
                             </div>
                            <div id='sidediv2' style="float:left;">
                                <form method='post' action='' align='center'>
                                    <table align='center'>
                                        <tr><td align='left' style='color:white;font-size:20px;'>User Id:</td>
                                            <td align='right'><input class='button_example' style='width:200;height:40' type='text' size='20' id='user_uniqueid' name='user_uniqueid'/></td>
                                        </tr>
                                        <tr><td align='left' style='color:white;font-size:20px;'>Name:</td>
                                            <td align='right'><input class='button_example' style='width:200;height:40' type='text' size='20' id='name' name='name'/></td>
                                        </tr>
                                        <tr><td align='left' style='color:white;font-size:20px;'>Last Name:</td>
                                            <td align='right'><input class='button_example' style='width:200;height:40' type='text' size='20' id='last_name' name='last_name'/></td>
                                        </tr>
                                        <tr><td align='left' style='color:white;font-size:20px;'>Contact:</td>
                                            <td align='right'><input class='button_example' style='width:200;height:40' type='text' size='20' id='user_contact' name='user_contact'/></td>
                                        </tr>
                                        <tr><td align='left' style='color:white;font-size:20px;'>Email:</td>
                                            <td align='right'><input class='button_example' style='width:200;height:40' type='text' size='20' id='user_email' name='user_email'/></td>
                                        </tr>
                                        <tr><td align='left' style='color:white;font-size:20px;'>Address:</td>
                                            <td align='right'><input class='button_example' style='width:200;height:40' type='text' size='20' id='user_exact_address' name='user_exact_address'/></td>
                                            <td align= 'left'> <input class='button_example' style='width:200;height:40' type='button' value='Find on map' id='mybutton' onclick='findplace(1);'></td>
                                        </tr>
                                        <tr><td align='left' style='color:white;font-size:20px;'>Password:</td>
                                            <td align='right'><input class='button_example' style='width:200;height:40' type='password' size='20' id='user_password' name='user_password'/></td>
                                        </tr>
                                        <tr><td colspan='2' align='center'><input class='button_example' style='width:200;height:40' type='button' value='Submit' id='mybutton' onclick='userregistration();' style='float:bottom'></td>
                                        </tr>
                                    </table>
                                </form>
                             </div>
                             
                        </form>
                    </div>
                    <div class="panel" id="ngo_login">
                        <form method='post' action='' align='center'>
                            <div id='ngo_login_div'>
                                <table align='center'>
                                <tr>
                                    <td align='left' style='color:white;font-size:20px;'>
                                        NGO Name:
                                    </td>
                                    <td align='right'>
                                        <input class='button_example' style='width:200;height:40' type='text' size='20' id='login_uniqueid' name='login_uniqueid'/>
                                    </td>
                                </tr>
                                <tr>
                                    <td align='left' style='color:white;font-size:20px;'>
                                        Password:
                                    </td>
                                    <td align='right'>
                                        <input class='button_example' style='width:200;height:40' type='password' size='20' id='login_password' name='login_password'/>
                                    </td>
                                </tr>
                                <tr>
                                    <td align='right'>
										<br>
                                        <input class='button_example' style='width:200;height:40' type='button' value='Submit' size='20' id='mybutton' name='password' onclick='ngologin();'/><br><br>
                                        <input class='button_example' style='width:200;height:40' type='button' size='8' value='Register' onclick="showsidediv('sidediv1');"/>
                                    </td>
                                </tr>
                                </table>
                            </div>
                            <div id='ngo_login_error'>
                             </div>
                            <div id='sidediv1' style="float:left;">
                                <form method='post' action='' align='center'>
                                    <table align='center'>
                                    <tr>
                                        <td align='left' style='color:white;font-size:20px;'>
                                            NGO Name:
                                        </td>
                                        <td align='right'>
                                            <input class='button_example' style='width:200;height:40' type='text' size='20' id='uniqueid' name='uniqueid'/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='left' style='color:white;font-size:20px;'>
                                            NGO Name:
                                        </td>
                                        <td align='right'>
                                            <input class='button_example' style='width:200;height:40' type='text' size='20' id='ngo_name' name='ngo_name'/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='left' style='color:white;font-size:20px;'>
                                            Contact:
                                        </td>
                                        <td align='right'>
                                            <input class='button_example' style='width:200;height:40' type='text' size='20' id='contact' name='contact'/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='left' style='color:white;font-size:20px;'>
                                            Address:
                                        </td>
                                        <td align='right' >
                                            <input class='button_example' style='width:200;height:40' type='text' size='20' id='ngo_exact_address' name='exact_address'/>
                                        </td>
                                        <td align 'left'>
                                            <input class='button_example' style='width:200;height:40' type='button' value='Find on map' id='mybutton' onclick='findplace(2);' />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='left'style='color:white;font-size:20px;'>
                                            Email:
                                        </td>
                                        <td align='right'>
                                            <input class='button_example' style='width:200;height:40' type='text' size='20' id='email' name='email'/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='left' style='color:white;font-size:20px;'>
                                            Password:
                                        </td>
                                        <td align='right'>
                                            <input class='button_example' style='width:200;height:40' type='password' size='20' id='password' name='password'/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='2' align='center'>
                                            <input class='button_example' style='width:200;height:40' type='button' value='Submit' id='mybutton' onclick='ngoregistration();' style='float:bottom'>
                                        </td>
                                    </tr>
                                    </table>
                                </form>
                            </div>
                            <div id='ngo_teach_div' style="display:none;">
                            </div>
                        </form>
                    </div>
                    
                    <div class="panel" id="gallery">
                        <h1 align ='center' style='color:white;font-size:40px;'><b>QforS</b></h1>
                        <div id="gallery_container">
                            <div class="gallery_box">
                                <img src="images/teach.jpg" alt="01"/>
                                <h4 style='color:C29E0E;font-size:23px;'>Be a Teacher</h4>
                                <p>
                                    Time  and 
									willingness to teach
									 are the only  two things
									 we ask for… Pick a slot nearest to Ur place where
									 U could  go teach …. !!!
									All we expect is a little punctuality..!!!
                                </p>
                                <div class="btn_more">
                                    <a href="">Visit <span>&raquo;</span></a>
                                </div>
                            </div>
                            <div class="gallery_box">
                                <img src="images/gallery/image_02.jpg" alt="02"/>
                                <h4 style='color:C29E0E;font-size:23px;'>Share your food</h4>
                                <p>
									In case you 
									 have extra food QforS 
									 is here to help you share. .. 
									Choose available  food collection services… In no time collection 
									would be arranged!!! 
									U could also personally
									 go and donate if 
									willing to !!!                             
								</p>
                                <div class="btn_more">
                                    <a href="">Visit <span>&raquo;</span></a>
                                </div>
                            </div>
                            <div class="gallery_box">
                                <img src="images/gallery/image_03.jpg" alt="03"/>
                                <h4 style='color:C29E0E;font-size:23px;'>Non Monetary</h4>
                                <p>
                                     Just identify all that
									 you have to donate …
									QforS identifies most needy NGO …. asap these would be picked up from your
									 doorsteps  !!!
									 All you need to do is ensure things are in  usable 
									condition !!!
                                </p>
                                <div class="btn_more">
                                    <a href="#">Visit <span>&raquo;</span></a>
                                </div>
                                <div class="cleaner">
                                </div>
                            </div>
                            <div class="gallery_box">
                                <img src="images/gallery/image_04.jpg" alt="04"/>
                                <h4 style='color:C29E0E;font-size:23px;'>Donate Money</h4>
                                <p>
                                     Donate to the 
									NGO working on the
									 cause you wish to donate Check on Ur QforS account to look where Ur donations are spent…..!!!
									 This satisfaction would
									 be obviously 
									priceless !!!
                                </p>
                                <div class="btn_more">
                                    <a href="#">Visit <span>&raquo;</span></a>
                                </div>
                                <div class="cleaner">
                                </div>
                            </div>
                            <div class="cleaner">
                            </div>
                        </div>
                    </div>
                    <div class="panel" id="contactus">
                        <h1>Feel free to send us a message</h1>
                        <div id="contact_form">
                            <form method="post" name="contact" action="#contactus">
                                <label for="author">Your Name:</label><input type="text" id="author"   name="author" cf/>
                                <div class="cleaner_h10">
                                </div>
                                <label for="email">Your Email:</label><input type="text" id="email" name="email" class="validate-email required input_field"/>
                                <div class="cleaner_h10">
                                </div>
                                <label for="text">Message:</label><textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                                <div class="cleaner_h10">
                                </div>
                                <input type="submit" class="submit_btn" name="submit" id="submit" value="Send"/>
                                <input type="reset" class="submit_btn" name="reset" id="reset" value="Reset"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of scroll -->
        </div >
        <!-- end of content -->
        <div align='center'>
			<ul id="social_box">
			<table>
				<tr>
					<td>
						<a href="http://www.facebook.com/Qfors"><img src="images/facebook.png" alt="facebook"/>
					</td>
					<td>
						<a href="http://www.facebook.com/Qfors"><img src="images/twitter.png" alt="twitter"/>
					</td>
					<td>
						<a href="http://www.facebook.com/Qfors"><img src="images/myspace.png" alt="myspace"/>
					</td>
				</tr>
			</table>
			</ul>
        </div>
       
        <div id="templatemo_footer">
             QforS: Priyatam, Shivangi, Mounica, Soumya, Harshit
        </div>
        <!-- end of templatemo_footer -->
    </div>
    <!-- end of main -->
</div>
</body>
</html>
