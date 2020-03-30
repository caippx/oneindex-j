<?php view::layout('layout')?>

<?php 
$item['thumb'] = onedrive::thumbnail($item['path']);
?>

<?php view::begin('content');?>
<div class="mdui-container-fluid">
	<div class="nexmoe-item">
	<video class="mdui-video-fluid mdui-center" preload controls poster="<?php @e($item['thumb']);?>">
	  <source src="<?php if (config('proxy_domain') != "" && config('main_domain') != "" ){
			$url = str_replace(config('main_domain'),config('proxy_domain'),$item['downloadUrl']);
			}else {
				$url = $item['downloadUrl'];
			}
e($url);?>" type="video/mp4">
	</video>
	<!-- 固定标签 -->
	<div class="mdui-row">
	  <select class="mdui-select" mdui-select="{position: 'top'}" id="sel">
	    <option value="<?php e($url);?>" selected>下载地址</option>
	    <option value="<video><source src='<?php e($url);?>' type='video/mp4'></video>">引用地址</option>
	  </select>
	  <textarea class="mdui-textfield-input" id="val" readonly><?php e($url);?></textarea>
	</div>
	<script type="text/javascript">
	    window.onload = function() {
	        var sel = document.getElementById("sel");
	        if(sel && sel.addEventListener){
	            sel.addEventListener('change',function(e){
	                var ev = e||window.event;
	                var target = ev.target||ev.srcElement;
	                document.getElementById("val").value = target.value;
	            },false)
	        }
	    }
	</script>
	</div>
</div>
<a href="<?php e($url);?>" class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent"><i class="mdui-icon material-icons">file_download</i></a>
<?php view::end('content');?>
