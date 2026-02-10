<?php
// // read only
// $File=fopen("file.txt","r");
// fclose($File);
// //read and write
// $File=fopen("file.txt","r+");
// fclose($File);
// //write only
// $File=fopen("file.txt","w");
// fwrite($File,"This is something added to the file using the write only mode.");
// fclose($File);
// //wrote only and append
// $File=fopen("file.txt","a");
// fwrite($File,"This is something added to the file using the write only and append mode.");
// fclose($File);
// //read and write
// $File=fopen("file.txt","w+");
// fwrite($File,"This is something added to the file using the read and write mode.");
// fclose($File);
// //binary version of read only
// $File=fopen("file.txt","rb");
// fclose($File);
// //binary version of read and write
// $File=fopen("file.txt","r+b");
// fclose($File);
// //binary version of write only
// $File=fopen("file.txt","wb");
// fwrite($File,"This is something added to the file using the binary version of write only mode.");
// fclose($File);
// //binary version of write only and append       
// $File=fopen("file.txt","ab");
// fwrite($File,"This is something added to the file using the binary version of write only and append mode.");
// fclose($File);
// //binary version of read and write
// $File=fopen("file.txt","w+b");
// fwrite($File,"This is something added to the file using the binary version of read and write mode.");
// //closing a file 
// fclose($File);
$file=fopen("file.txt","w");
$content="This is something added to the file using the write only mode.";
fwrite($file,$content);
echo  fread($file,filesize("file.txt"));
fclose($file);
//create new file for read and write
$file=fopen("file2.txt","x+");
?>