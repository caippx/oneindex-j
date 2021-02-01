<?php

require 'init.php';
ini_set('memory_limit', '128M');

oneindex::refresh_cache(get_absolute_path(config('onedrive_root')));

?>
