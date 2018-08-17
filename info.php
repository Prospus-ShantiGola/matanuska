<?php
$keyname=rand(1,1000000);                   //Random number for the fielname
$my_file = 'data/file_'.$keyname.'.txt';    // unique file name
                    $header_file = 'data/header.txt';
                    $headerinfo=json_encode(getallheaders(), true);
                    file_put_contents($header_file, $headerinfo);
$json_string = json_encode(file_get_contents('php://input')); // get post content and encode in json string.
        $array=json_decode($json_string, true);
        $someArray = json_decode($array, true);
        // Dump all data of the Array
        if (isset($someArray["menu_feed"])) {
            unlink('data/menu.txt');
            $my_file = 'data/menu.txt';
            
                    
            file_put_contents($my_file, $json_string);
        }
 // write content in the file.

//if(strpos($content,"menu_feed")){
//    //The name of the folder.
//$folder = 'data/';
// 
////Get a list of all of the file names in the folder.
//$files = glob($folder . '/*');
// 
////Loop through the file list.
//foreach($files as $file){
//    //Make sure that this is a file and not a directory.
//    if(is_file($file)){
//        //Use the unlink function to delete the file.
//        unlink($file);
//    }
//}
//    
//}
