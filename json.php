<?php
        function dir_tree($dir, $as_json = false) {
            $files = [];
            foreach( glob($dir . "./*") as $file ) {
                if ( is_file($file) ) {
                    $files[$file] = $file;
                } else {
                    $files[$file] = dir_tree($file, false);
                }
            }
            return $as_json ? json_encode($files) : $files;
        }

       $file = dir_tree("./",true);

       $fp = fopen("Json-Text.txt","wb");

        if( $fp == false ){

            echo 'There seems to be something wrong';

        }else{
            fwrite($fp, $file);
            fclose($fp);
            echo 'File "Json-Text.txt" successfully created.';
        }



  
