<?php
header('Content-Type: text/html; charset=UTF-8');
echo '<h4>获取SharePoint网站site-id</h4><br>' ; 
echo '<form action="getsite.php" method="get">  
国际版填1，世纪互联填2<br>
<input type="text" name="type" value ="1" /><br><br>
Token <a href="https://login.chinacloudapi.cn/common/oauth2/v2.0/authorize?client_id=395ac1f4-ca51-4553-9217-b8a191c8cd54&response_type=code&redirect_uri=https://api.us.ppxwo.top/onedrive&response_mode=query&scope=offline_access%20User.Read%20Files.ReadWrite.All
">世纪互联 点我获取</a> 或者 <a href="https://login.microsoftonline.com/common/oauth2/v2.0/authorize?client_id=990b369b-3a1e-4b19-91a0-a2fcf04d861b&response_type=code&redirect_uri=https://api.us.ppxwo.top/onedrive&response_mode=query&scope=offline_access%20User.Read%20Files.ReadWrite.All
">国际版 点我获取</a><br>
<input type="text" name="code" value ="" /><br><br>
你SharePoint的域名<br>
<input type="text" name="hostname" value ="xxx.sharepoint.com" /><br><br>
网址上域名后面的 /sites/xxx 或teams/xxx<br>
<input type="text" name="site" value ="/sites/xxx" /><br><br>
<input type="submit" value="GET site-id" />
</form>';
/* https://xxx.sharepoint.cn/personal/xxx/_layouts/15/storman.aspx */
?>
