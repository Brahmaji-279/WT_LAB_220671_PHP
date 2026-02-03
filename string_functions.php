<?php

echo "<h1>PARTB-STRING FUNCTIONS TASK</h1>";
//Hardcoded string functions for demonstration purposes
$string="This is a sample string<br>";
echo "$string";
echo "The length of the above string is:".strlen($string)."<br>";
echo "The word count of the above string is:".str_word_count($string)."<br>";
echo "The reverse of the above string is:".strrev($string)."<br>";
echo "The position of the word 'sample' in the above string is:".strpos($string,"sample")."<br>";
echo "The string after replacing the word 'sample' with 'test' is:".str_replace("sample","test",$string)."<br>";
echo "The string in uppercase is:".strtoupper($string)."<br>";
echo "The string in lowercase is:".strtolower($string)."<br>";
echo "The string with first letter capitalized is:".ucfirst($string)."<br>";
echo "The string with first letter of each word capitalized is:".ucwords($string)."<br>";
echo "The trimmed string is:".trim("   ".$string."   ")."<br>";
echo "The left trimmed string is:".ltrim("   ".$string)."<br>";
echo "The right trimmed string is:".rtrim($string."   ")."<br>";
echo "The string after adding slashes is:".addslashes("He said, 'Hello World!'")."<br>";
echo "The string after converting special characters to HTML entities is:".htmlspecialchars("<b>This is bold</b>")."<br>";
echo "substring of the above string from position 10 to 16 is:".substr($string,10,6)."<br>";
echo "string compared to 'This is a test string':".strcmp($string,"This is a test string")."<br>";
echo "encoding of the string is:".base64_encode($string)."<br>";
echo "decoding of the string is:".base64_decode(base64_encode($string));
//Strings from database(these ar actually collected from the registration forms)
$conn=mysqli_connect("localhost","root","","testdb");
$result=mysqli_query($conn,"select username from user_details");
$row=mysqli_fetch_assoc($result);
$string2=$row['username'];
echo "<br><br>String from database is: $string2<br>";
echo "The length of the above string is:".strlen($string2)."<br>";
echo "The word count of the above string is:".str_word_count($string2)."<br>";
echo "The reverse of the above string is:".strrev($string2)."<br>";
echo "The position of the word 'sample' in the above string is:".strpos($string2,"sample")."<br>";
echo "The string after replacing the word 'sample' with 'test' is:".str_replace("sample","test",$string2)."<br>";
echo "The string in uppercase is:".strtoupper($string2)."<br>";
echo "The string in lowercase is:".strtolower($string2)."<br>";
echo "The string with first letter capitalized is:".ucfirst($string2)."<br>";
echo "The string with first letter of each word capitalized is:".ucwords($string)."<br>";
echo "The trimmed string is:".trim("   ".$string2."   ")."<br>";
echo "The left trimmed string is:".ltrim("   ".$string2)."<br>";
echo "The right trimmed string is:".rtrim($string2."   ")."<br>";
echo "The string after adding slashes is:".addslashes("He said, 'Hello World!'")."<br>";
echo "The string after converting special characters to HTML entities is:".htmlspecialchars("<b>This is bold</b>")."<br>";
echo "substring of the above string from position 10 to 16 is:".substr($string2,10,6)."<br>";
echo "string compared to 'This is a test string':".strcmp($string2,"This is a test string")."<br>";
echo "encoding of the string is:".base64_encode($string2)."<br>";
echo "decoding of the string is:".base64_decode(base64_encode($string2));
?>