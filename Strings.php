<?php
$first="This is my first string";
echo strpos($first,"my");
echo "<br>";
$new_first=strtoupper($first);
echo "$new_first";
echo "<br>";
$replaced_string=str_replace("my","replaced",$first);
echo "$replaced_string<br>";
echo strrev($replaced_string)."<br>";
echo trim("    Hello World      ")."<br>";
$s1="hey,hi new  str";
$expl = explode(',',$s1);
echo "$expl";
$array=[1,2,3];
echo explode(',',$s1);
?>
