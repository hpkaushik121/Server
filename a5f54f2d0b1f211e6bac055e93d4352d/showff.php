<?php
if(isset($_GET['addr'])){
	$searchfor = $_GET['addr'];
	$file = file_get_contents('../MercuryMail/MERCURY.INI', FILE_USE_INCLUDE_PATH);
if(filter_var(gethostbyname($_GET['addr']), FILTER_VALIDATE_IP))
{
   
$pattern = preg_quote($searchfor, '/');
// finalise the regular expression, matching the whole line
$pattern = "/^.*$pattern.*\$/m";
// search, and store all matching occurences in $matches
if(preg_match_all($pattern, $file, $matches)){
   echo "Domain already exits";
}
else{
	



file_put_contents('../MercuryMail/MERCURY.INI', implode('', 
  array_map(function($data) {
    return stristr($data,'localhost: sourabhkasuhik.com') ? "localhost: ".$_GET['addr']."\n localhost: sourabhkasuhik.com\n" : $data;
  }, file('../MercuryMail/MERCURY.INI'))
));

}

}
 echo "asdfasdf";
}else{
	echo "Domain is not valid";
}
}else{
	
	header("Location: /cpanel");
}


?>