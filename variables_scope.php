<?php
//VARIBALES AND DATA TYPES IN PHP
//string
$str1="This is my first string<br>";
echo "$str1";
//concatination using  strings
$str2="This string is added to the str1<br>";
echo  "$str1"."$str2";
//integer declaration
$num=27;
echo "The integer defined is $num<br>";
//float point declaration(scientific notation)
$float=1.2e3;
echo "The float point defined is $float<br>";
//boolean declaration
$bool=true;
echo "The boolean value is $bool<br>";
//array declaration
$arr=array("cyber","crypto","malware");
echo "Some of the cyber related terms are:";
for($i=0;$i<3;$i++){
    echo "$arr[$i]   ";
}
echo "<br>";
//TYPES OF SCOPES IN PHP
//Local Scope
function LocalScope(){
    $a="This is the variable in the function";
    echo "$a<br>";
}
LocalScope();
//the below print nothing
echo "The value inside the function is $a<br>";
//Global Scope
function GlobalScope(){
    echo "This is printed using the global key word=>";
    global $b;
    echo "{$b}";
}
//The below is the global variable
$b="This can be accesed in the function using global keyword<br>";
GlobalScope();
//Static Scope
echo "These are the static variable declarations:";
function StatiScope(){
    static $new=20;
    echo $new." ";
    $new++;
}
StatiScope();
StatiScope();
StatiScope();

?>