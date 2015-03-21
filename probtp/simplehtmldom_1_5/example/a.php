 <html>
<head>
    <title>PHP sript</title>
</head>
<body>

<?php
include_once('../simple_html_dom.php');

require_once('connection.php');

//$html = file_get_html('http://www.google.com/');
//$uri = array('http://dbpedia.org/page/Billie_Jean', 'http://dbpedia.org/resource/A_Brand_New_Day_(The_Wiz_song)', 'http://dbpedia.org/resource/Will_You_Be_There', 'http://dbpedia.org/resource/Give_In_to_Me');

$sql = "SELECT uri FROM uritable";
$result = mysql_query($sql,$connection);
//$re = mysql_fetch_array($result);
$arr = array();
while($rows = mysql_fetch_assoc($result))
{	
	$arr[]= $rows;
	
}


//echo count($arr);
$ss = implode(" ",$arr[10]);
echo $ss.'<br>';
echo str_replace("http://dbpedia.org/resource/", "", $ss);
echo '<br>';

/////////////////////SONG NAME///////////////////////////////////////////////////

$sql = "SELECT name FROM uritable";
$result = mysql_query($sql,$connection);
//$re = mysql_fetch_array($result);
$arrr = array();
while($rows = mysql_fetch_assoc($result))
{	
	$arrr[]= $rows;
	
}


//echo count($arr);
$sss1 = implode(" ",$arrr[4]);
//echo $ss.'<br>';
$sss2 = str_replace("@en", "", $sss1);
echo $sss2;
echo '<br>';

///////////////////////////ARTIST NAME/////////////////////////////////////////////////////


$sql = "SELECT artist FROM uritable";
$result = mysql_query($sql,$connection);
//$re = mysql_fetch_array($result);
$artist = array();
while($rows = mysql_fetch_assoc($result))
{	
	$artist[]= $rows;
	
}


//echo count($arr);
/*$sss11 = implode(" ",$artist[2]);
//echo $ss.'<br>';
$sss22 = str_replace("http://dbpedia.org/resource/", "", $sss11);
echo $sss22;
echo '<br>';
*/

/////////////////////////BAND NAME///////////////////////////////////////////////////////


$sql = "SELECT bandname FROM uritable";
$result = mysql_query($sql,$connection);
//$re = mysql_fetch_array($result);
$band = array();
while($rows = mysql_fetch_assoc($result))
{	
	$band[]= $rows;
	
}


//echo count($arr);
/*$sss111 = implode(" ",$band[2]);
//echo $ss.'<br>';
$sss222 = str_replace("http://dbpedia.org/resource/", "", $sss111);
echo $sss222;
echo '<br>';
*/

/////////////////////////ALBUM NAME///////////////////////////////////////////////////////


$sql = "SELECT albumname FROM uritable";
$result = mysql_query($sql,$connection);
//$re = mysql_fetch_array($result);
$album = array();
while($rows = mysql_fetch_assoc($result))
{	
	$album[]= $rows;
	
}

/////////////////////////Record NAME///////////////////////////////////////////////////////


$sql = "SELECT recordlabel FROM uritable";
$result = mysql_query($sql,$connection);
//$re = mysql_fetch_array($result);
$record = array();
while($rows = mysql_fetch_assoc($result))
{	
	$record[]= $rows;
	
}
/////////////////////////Format///////////////////////////////////////////////////////


$sql = "SELECT format FROM uritable";
$result = mysql_query($sql,$connection);
//$re = mysql_fetch_array($result);
$format = array();
while($rows = mysql_fetch_assoc($result))
{	
	$format[]= $rows;
	
}
/////////////////////////Genre///////////////////////////////////////////////////////


$sql = "SELECT genere FROM uritable";
$result = mysql_query($sql,$connection);
//$re = mysql_fetch_array($result);
$genre = array();
while($rows = mysql_fetch_assoc($result))
{	
	$genre[]= $rows;
	
}
/////////////////////////Producer///////////////////////////////////////////////////////


$sql = "SELECT producer FROM uritable";
$result = mysql_query($sql,$connection);
//$re = mysql_fetch_array($result);
$produce = array();
while($rows = mysql_fetch_assoc($result))
{	
	$produce[]= $rows;
	
}
/////////////////////////Writer///////////////////////////////////////////////////////


$sql = "SELECT writer FROM uritable";
$result = mysql_query($sql,$connection);
//$re = mysql_fetch_array($result);
$write = array();
while($rows = mysql_fetch_assoc($result))
{	
	$write[]= $rows;
	
}




for($i=0; $i<2000; $i++)
{
	//song_name
	$ss = implode(" ",$arr[$i]);
	$ss2 = str_replace("http://dbpedia.org/resource/", "", $ss);
//	echo $ss2;
	//artist_name
	$sss11 = implode(" ",$artist[$i]);
	$sss22 = str_replace("http://dbpedia.org/resource/", "", $sss11);
	//band_name
	$sss111 = implode(" ",$band[$i]);
	$sss222 = str_replace("http://dbpedia.org/resource/", "", $sss111);

	$a1 = implode(" ",$album[$i]);
	$a2 = str_replace("http://dbpedia.org/resource/", "", $a1);

$b1 =  implode(" ",$record[$i]);
	$b2 = str_replace("http://dbpedia.org/resource/", "", $b1);

$c1 = implode(" ",$format[$i]);
	$c2 = str_replace("http://dbpedia.org/resource/", "", $c1);

$d1 = implode(" ",$genre[$i]);
	$d2 = str_replace("http://dbpedia.org/resource/", "", $d1);

$e1 = implode(" ",$produce[$i]);
	$e2 = str_replace("http://dbpedia.org/resource/", "", $e1);

$f1 = implode(" ",$write[$i]);
	$f2 = str_replace("http://dbpedia.org/resource/", "", $f1);

	$ss2 = mysql_real_escape_string($ss2);
	$sss22 = mysql_real_escape_string($sss22);
	$sss222 = mysql_real_escape_string($sss222);
	$a2 = mysql_real_escape_string($a2);
	$b2 = mysql_real_escape_string($b2);
	$c2 = mysql_real_escape_string($c2);
	$d2 = mysql_real_escape_string($d2);
	$e2 = mysql_real_escape_string($e2);
	$f2 = mysql_real_escape_string($f2);
		

	$sql1 = "INSERT INTO songdetails (song, artist, band, album, record, format, genre, producer, writer) VALUES ('$ss2', '$sss22', '$sss222', '$a2', '$b2', '$c2', '$d2', '$e2', '$f2')";
if(mysql_query($sql1, $connection)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysql_error($connection);
}
}

//$sqll = "INSERT INTO songsdetail (song, artist, band) VALUES ('A Brand New Day (The Wiz song)', 'Michael_Jackson', 'Ted_Ross')";
//if(mysql_query($sqll, $connection)){
 //   echo "Records added successfully.";
//} else{
 //   echo "ERROR: Could not able to execute $sql. " . mysql_error($connection);
//}


/*$sss2 = mysql_real_escape_string($sss2);
$sss22 = mysql_real_escape_string($sss22);
$sss222 = mysql_real_escape_string($sss222);
$sql1 = "INSERT INTO songdetails (song, artist, band) VALUES ('$sss2', '$sss22', '$sss222')";
if(mysql_query($sql1, $connection)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysql_error($connection);
}
*/

//echo '<pre>';
//print_r($arr);

//$ax = $re["name"];
//echo $ax;
//echo '<br>';
//echo count($ax);
//echo $re["name"];
//for($i=0; $i<4; $i++)
//{echo $re[$i];}
//for($i=0; $i<count($uri); $i++)
//{
//	$string1 = $uri[i];
//	$html = file_get_html('$string1');



//$html = file_get_html('http://dbpedia.org/page/Billie_Jean');
/*$html = file_get_html(implode(" ",$arr[10]));


// Find all images 
//foreach($html->find('img') as $element) 
  //     echo $element->src . '<br>';

// Find all links 
//foreach($html->find('a') as $element)
//	foreach ($element->rel)
//	{
//		echo $element->rel .'<br>';

		// as $key => $value) {
	 	# code...
//	} 


	foreach($html->find('a') as $element)
	{ //echo $element;
	//	foreach ($element->find('dbpedia-owl:musicalArtist') as $element->rel)
//		echo $element->rel;
		$str = $element->rel;

		if($str == 'dbpedia-owl:musicalArtist')
	{	
		$st1 = $element->innertext;
//		echo trim($st1, "dpbedia:");
		$st2 = explode(":",$st1);
		echo "Artist:" . '<br>';
		echo $st2[1]; 
//		echo str_replace("dpbedia:", "", trim($st1));
//		echo '<br>';

		// as $key => $value) {
	 	# code...
	} 
		if ($str == 'dbpedia-owl:genre')
		{echo $element->innertext .'<br>';}

 //      echo $element->innertext .'<br>';
}
*/
     //echo 'Hello World';

//mysql_close($connection);
   ?>
</body>
</html>