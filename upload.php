<?php
    $valid_formats = array("xlsx", "xls", "xlsm", "xlsb", "xltx", "xltx", "xltxm", "xlt", "xml", "xlam");
    $max_size = 1024*400; // 400kb
    $message = "";
    $path = "./Files/";
    
    function getExt($filename){
        $ext = substr(strrchr($filename,"."),1);
        $ext = strtolower($ext);
        return $ext;
    }

    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_FILES['btn_file']['name'];
        if ($_FILES['btn_file']['error'] == 4) { 
            $message = "Upload Error!\nYou must Call Admin!";
        }elseif($_FILES['btn_file']['error'] == 0){
            if($_FILES['btn_file']['size'] > $max_size){
                $message = "File Size too much!\nYou must Call Admin!";
            }elseif(! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats)){
                $message = "$name is not Valid File Format!\nYou must Call Admin!";
            }else{
                $tmpname = $_FILES['btn_file']['tmp_name'];
                $realname = $_FILES['btn_file']['name'];
                $filesize = $_FILES['btn_file']['size'];
                $fileExt = getExt($realname);
                $uploadFile = $path . $realname;
                if(move_uploaded_file($tmpname, $uploadFile)){
                    @chmod($readFile,0606);
                    $message = "$name Upload Success!";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>File Upload Process :3</title>
    <script>
        setTimeout(function() {
            window.location.replace("./");
        }, 1000);
    </script>
</head>
<body>
    <?php
        echo "<h1>$message</h1>";
    ?>
</body>
</html>
