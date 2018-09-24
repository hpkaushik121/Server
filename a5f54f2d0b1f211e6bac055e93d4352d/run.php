<?php

$mbox = @imap_open("{mail.ipuniversity.tk}", 'sk@ipuniversity.tk', 'password')or die("can't connect: " . imap_last_error());;
$folders = imap_listmailbox($mbox, "{mail.ipuniversity.tk}", "*");

$list = imap_list($mbox, "{mail.ipuniversity.tk}", "*");
if (is_array($list)) {
    foreach ($list as $val) {
        echo imap_utf7_decode($val) . "\n";
    }
} else {
    echo "imap_list failed: " . imap_last_error() . "\n";
}

imap_close($mbox);


?>
