<?php
$homepage = file_get_contents("C:/xampp/apache/conf/extra/httpd-vhosts.conf");
$myfile = fopen("C:/xampp/apache/conf/extra/httpd-vhosts.conf", "w");
$txt = '<VirtualHost *:80>

    DocumentRoot "C:/xampp/htdocs/kaushik"
    ServerName ggsipuniversity.yk
    ServerAlias www.ggsipuniversity.tk
    ErrorLog "logs/dummy-host.example.com-error.log"
    CustomLog "logs/dummy-host.example.com-access.log" common
</VirtualHost>';
$text = $homepage.$txt;
fwrite($myfile, $text);
fclose($myfile);
?>
