<?php

require 'init.php';
ini_set('memory_limit', '128M');
$key = $_GET['key'];
if ($key == config('password')){
oneindex::refresh_cache(get_absolute_path(config('onedrive_root')));
echo "刷新完成";
}else{
echo "密码错误";
}


?>
