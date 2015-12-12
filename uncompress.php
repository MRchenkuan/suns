<?php
$zip = new ZipArchive;
$res = $zip->open('project.zip');
if ($res === TRUE) {
    echo 'ok';
    //解压缩到test文件夹 
    $zip->extractTo('./test');
    $zip->close();
} else {
    echo 'failed, code:' . $res;
}
?> 