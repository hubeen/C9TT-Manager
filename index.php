<?php
    function getFolder(){
        $path = "./Files";
        $handle  = opendir($path);

        $files = array();

        // 디렉터리에 포함된 파일을 저장한다.
        while (false !== ($filename = readdir($handle))) {
            if($filename == "." || $filename == ".."){
                continue;
            }

            // 파일인 경우만 목록에 추가한다.
            if(is_file($path . "/" . $filename)){
                $files[] = $filename;
            }
        }

        closedir($handle);
        sort($files);


        return $files;
    }

?>

<!DOCTYPE html5>
<html>
<head>
    <title>소비조합 시간표 변환 사이트</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <script type="text/javascript" src="./js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="./js/file_uploaded.js"></script>
</head>
    <div class="wrapper">
        <div class="File-List">
            <!-- 파일 리스트 공간 -->
            <ul>
                <?php
                    $files = getFolder();
                    foreach ($files as $f) {
                        echo "<li><a href=".">$f</a></li>";
                    }


                ?> 
            </ul>
        </div>
        <div class="file-upload">
            클릭
            <!-- 클릭 공간 -->
        </div>
        <div class="button List">
            <form id='file_form' action='upload.php' method='post' enctype="multipart/form-data">
                <input type="submit" id="btn_upload" name="btn_upload" value=""/>
                <input type="file" id="btn_file" name="btn_file" onchange="upload(this)"/>
            </form>
        </div>
    </div>
</html>
