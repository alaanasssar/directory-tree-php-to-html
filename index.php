<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .file-tree {
            background-color: #fafafa;
            padding: 20px 10px 10px
        }
        
        .file-tree ul {
            list-style: none;
            padding-left: 25px;
            display: none
        }
        
        .file-tree>ul {
            display: block
        }
        
        .file-tree li {
            padding: 4px 0;
            line-height: 24px
        }
        
        .file-tree i {
            margin-left: 24px;
            display: block;
            font-style: normal;
            font-size: 12px;
            line-height: 20px;
            color: #b4b7b8;
            cursor: default;
            transition: color .4s ease
        }
        
        .file-tree li:hover>i {
            color: #697376
        }
        
        .file-tree .is-folder>span {
            font-family: Montserrat, sans-serif;
            font-weight: 500;
            font-size: 15px;
            cursor: pointer;
            display: inline-block;
            min-width: 120px
        }
        
        .file-tree .is-folder>span:before {
            content: "\f07b";
            font-family: FontAwesome;
            margin-right: 8px;
            color: #8b949e;
            cursor: pointer;
            display: inline-block;
            width: 18px
        }
        
        .file-tree .is-folder.open>span:before {
            content: "\f07c"
        }
        
        .file-tree .is-folder.open>ul {
            display: block
        }
        
        .file-tree .is-file>span {
            display: inline-block;
            min-width: 120px
        }
        
        .file-tree .is-file>span:before {
            content: "\f016";
            font-family: FontAwesome;
            margin-right: 8px;
            color: #bec7d2;
            cursor: pointer;
            display: inline-block;
            width: 18px
        }
    </style>

</head>

<body>
    <?php

        $json = '{".\/.\/New folder":[],".\/.\/file.php":".\/.\/file.php",".\/.\/geodata.php":".\/.\/geodata.php",".\/.\/index.html":".\/.\/index.html",".\/.\/index.php":".\/.\/index.php",".\/.\/mac.php":".\/.\/mac.php",".\/.\/old":{".\/.\/old.\/00.php":".\/.\/old.\/00.php",".\/.\/old.\/1.php":".\/.\/old.\/1.php",".\/.\/old.\/10.php":".\/.\/old.\/10.php",".\/.\/old.\/11.php":".\/.\/old.\/11.php",".\/.\/old.\/2.php":".\/.\/old.\/2.php",".\/.\/old.\/3.php":".\/.\/old.\/3.php",".\/.\/old.\/4.php":".\/.\/old.\/4.php",".\/.\/old.\/6.php":".\/.\/old.\/6.php",".\/.\/old.\/7.php":".\/.\/old.\/7.php",".\/.\/old.\/8.php":".\/.\/old.\/8.php",".\/.\/old.\/9.php":".\/.\/old.\/9.php"},".\/.\/test_app":{".\/.\/test_app.\/1.php":".\/.\/test_app.\/1.php",".\/.\/test_app.\/10.php":".\/.\/test_app.\/10.php",".\/.\/test_app.\/2.php":".\/.\/test_app.\/2.php",".\/.\/test_app.\/3.php":".\/.\/test_app.\/3.php",".\/.\/test_app.\/4.php":".\/.\/test_app.\/4.php",".\/.\/test_app.\/5.php":".\/.\/test_app.\/5.php",".\/.\/test_app.\/6.php":".\/.\/test_app.\/6.php",".\/.\/test_app.\/7.php":".\/.\/test_app.\/7.php",".\/.\/test_app.\/8.php":".\/.\/test_app.\/8.php",".\/.\/test_app.\/9.php":".\/.\/test_app.\/9.php",".\/.\/test_app.\/css":{".\/.\/test_app.\/css.\/style.css":".\/.\/test_app.\/css.\/style.css"},".\/.\/test_app.\/functions.php":".\/.\/test_app.\/functions.php",".\/.\/test_app.\/home.php":".\/.\/test_app.\/home.php",".\/.\/test_app.\/images":{".\/.\/test_app.\/images.\/flash-logo.png":".\/.\/test_app.\/images.\/flash-logo.png",".\/.\/test_app.\/images.\/quicktime-logo.gif":".\/.\/test_app.\/images.\/quicktime-logo.gif",".\/.\/test_app.\/images.\/t_1.jpg":".\/.\/test_app.\/images.\/t_1.jpg",".\/.\/test_app.\/images.\/t_2.jpg":".\/.\/test_app.\/images.\/t_2.jpg",".\/.\/test_app.\/images.\/t_3.jpg":".\/.\/test_app.\/images.\/t_3.jpg",".\/.\/test_app.\/images.\/t_4.jpg":".\/.\/test_app.\/images.\/t_4.jpg",".\/.\/test_app.\/images.\/t_5.jpg":".\/.\/test_app.\/images.\/t_5.jpg"},".\/.\/test_app.\/includes":{".\/.\/test_app.\/includes.\/footer.php":".\/.\/test_app.\/includes.\/footer.php",".\/.\/test_app.\/includes.\/header.php":".\/.\/test_app.\/includes.\/header.php",".\/.\/test_app.\/includes.\/navigation.txt":".\/.\/test_app.\/includes.\/navigation.txt"},".\/.\/test_app.\/index.php":".\/.\/test_app.\/index.php",".\/.\/test_app.\/js":{".\/.\/test_app.\/js.\/myscript.js":".\/.\/test_app.\/js.\/myscript.js",".\/.\/test_app.\/js.\/scripts.js":".\/.\/test_app.\/js.\/scripts.js"}},".\/.\/text.php":".\/.\/text.php",".\/.\/url":{".\/.\/url.\/src":{".\/.\/url.\/src.\/base_facebook.php":".\/.\/url.\/src.\/base_facebook.php",".\/.\/url.\/src.\/facebook.php":".\/.\/url.\/src.\/facebook.php",".\/.\/url.\/src.\/fb_ca_chain_bundle.crt":".\/.\/url.\/src.\/fb_ca_chain_bundle.crt",".\/.\/url.\/src.\/index.php":".\/.\/url.\/src.\/index.php"},".\/.\/url.\/url.php":".\/.\/url.\/url.php"},".\/.\/url.zip":".\/.\/url.zip"}';
           
            function foreach_files($files){
                $files =  str_replace("././","",$files);
                $webwecho = '';
                    foreach ($files as $k => $file){   
                    $file_cleaned =  str_replace((basename($k)) . "./","",$file);             
                        if(is_array($file)){
                        $webwecho .= '<li class="is-folder"><span>';
                        $webwecho .= basename($k);
                        $webwecho .= '</span>';
                        $webwecho .='<ul>';
                        $webwecho .= foreach_files($file_cleaned);
                        $webwecho .='</ul></li>';
                        }else {
                            $webwecho .= '<li class="is-file"><span>'.basename($k).'</span>';
                            $webwecho .= '</li>';
                        }
                }
                return $webwecho;
            }

            $jsoncode = json_decode($json, true);
  
            $webwechoo = '';
            $webwechoo .= '<div class="file-tree"> <ul>';
            $webwechoo .= foreach_files($jsoncode);
            $webwechoo .= '</ul> </div>';
            return $webwechoo;
    ?>


    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script>
        $(".file-tree li.is-file > span").on("click", function(a) {
            a.stopPropagation()
        })
        $(".file-tree li.is-folder > span").on("click", function(a) {
            $(this).parent("li").find("ul:first").slideToggle(400, function() {
                $(this).parent("li").toggleClass("open")
            }), a.stopPropagation()
        })
    </script>
</body>

</html>
