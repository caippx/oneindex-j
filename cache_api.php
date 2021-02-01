<?php

require 'init.php';
ini_set('memory_limit', '128M');

if (oneindex::refresh_cache(get_absolute_path(config('onedrive_root')))){
echo "ok";
}else{
echo "false";
}

?>
