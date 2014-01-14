<?php
include("dblink.php");
session_start();
if(!isset($_SESSION['login_user_uniqueid']))
	die("Invalid Access");

$sql = 'select `lat`,`long` from user where user_id="' . $_SESSION['login_user_uniqueid'] . '"';
$result = mysql_query($sql,$con) or die(" <br>Something went wrong in query".mysql_error());	
if($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
	$original_user_lat = $row["lat"];
	$original_user_long= $row["long"];
}


$sql = 'select distinct `exact_place`,`ngo_id`,`lat`,`long` from ngo_teaching';

$result = mysql_query($sql,$con) or die(" <br>Something went wrong in query".mysql_error());

$R = 6371;

$lat_arr=array();
$long_arr=array();
	
$id_arr = array();
$place_arr = array();


while($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
	$lat = $row["lat"];
	$long= $row["long"];
	$place_lat = $lat;
	$place_long = $long;
	$exact_place = $row["exact_place"];
	$ngo_id = $row["ngo_id"];
	$user_lat = $original_user_lat;
	$user_long= $original_user_long;

	$dlat = deg2rad($lat - $user_lat);
	$dlong = deg2rad($long - $user_long);

	$user_lat = deg2rad($user_lat);
	$lat = deg2rad($lat);


	$a = (sin($dlat/2) * sin($dlat/2)) + (sin($dlong/2) * sin($dlong/2) *cos($user_lat)*cos($lat));
	$c = 2 * atan2(sqrt($a),sqrt(1-$a));
	$d = $R * $c;

	//if($d < 4)
	{
		array_push($lat_arr,$place_lat);
		array_push($long_arr,$place_long);
		array_push($id_arr,"'".$ngo_id."'");
		array_push($place_arr,"'".$exact_place."'");

	}
	#echo "D:$d<br/>";

	$len=sizeof($id_arr);
	$average_lat =  array_sum($lat_arr)/$len;
	$average_long =  array_sum($long_arr)/$len;
	$message_arr = array();

	for($i=0;$i<$len;$i++)
	{
		//Double quotes are required on the client side when the javascript code evolves
		$id = str_replace('"', '', $id_arr[$i]);
		$string='"NGO:'.$id.'<br/>Place:'.$place_arr[$i].'"';
		//Pusing into the message array
		array_push($message_arr,$string);	
	}




}

?>
<!DOCTYPE html>
<html>
  <head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<style type="text/css">
	#map_canvas
	{
	height:100% ;width:100%;
	}
	</style>
	<link rel="stylesheet" href="css/jquery.mobile-1.1.0.min.css" />
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/jquery.mobile-1.1.0.min.js"></script>
	<script type="text/javascript"
	src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBGXpGIOJgNxWP7ZY1lI3BR-FOXGv6Mz-g&sensor=true&language=te">
	</script>
    <script type="text/javascript">
	var map;
	//The function to initialize the maps
function initialize() {

<?php 
	echo 'var myLatlng = new google.maps.LatLng('.$average_lat.','.$average_long.');';
?>

//Setting the options of the map
var myOptions = {
    zoom: 11,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

<?php
//Making the array comeout by seperating with commas
$latList = implode(',', $lat_arr);
$longList = implode(',', $long_arr);

$idList = implode(',',$id_arr);
$messageList = implode(',', $message_arr);
//Making the arrays in javascript by the arrays received in php
echo '
var lat_arr=['.$latList.'];
var long_arr=['.$longList.'];
var id_arr=['.$idList.'];
var message_arr=['.$messageList.'];

var length = '.$len.';';

?>

//Javascript - looping through all the arrays
  for (var i = 0; i < length; i++) {
  //Setting the marker according to the latitude and longitude of the farm
    var location = new google.maps.LatLng(lat_arr[i],long_arr[i]);
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
	//Setting the title of the marker as the farmer id
    marker.setTitle(id_arr[i].toString());
	//Calling the function to attach message to it-seding message also as argument
    attachMessage(marker, i,message_arr[i]);
  }
}



function attachMessage(marker, number,message) {

//Creating infowindow object
	var infowindow = new google.maps.InfoWindow(
	{
	content: message,
	size: new google.maps.Size(150,150)
	});

	//When the user clicks the marker we display the information of the farm
  google.maps.event.addListener(marker, "click", function() {
    infowindow.open(map,marker);
  });
  //Setting the minimum zoom level so that the user wont zoom out more
   google.maps.event.addListener(map, 'zoom_changed', function()
	{
    if (map.getZoom() < 3){
       map.setZoom(3);
    }
}); 
 // google.maps.event.addListener(marker, "mouseout", function() {
 //  infowindow.close();
 // });

}
</script>
  </head>

  <div data-role="page">
<div data-role="footer" class="ui-bar" data-theme="c" >
			<h1>Maps of Farms</h1>
		
	</div>

	</div>
		  <body onload="initialize()">
    <div id="map_canvas"></div>
  </body>
</html>
