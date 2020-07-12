#!/usr/bin/php
<?php
# cd $HOME; cat Desktop/*; echo; rm Desktop/*
$a = array(
'hey',
'yo',
'sup',
'wudup',
'ergo',
'zed'
);
for($i=1;$i<=20;$i++) {
   shuffle($a);
   file_put_contents(getenv("HOME") . "/Desktop/".$i.".txt", $a[0]);
}
?>
