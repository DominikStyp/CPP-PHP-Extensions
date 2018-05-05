<?php
$inputString = "alskdfj xcv http://bla.ok/12343-2234/?x=123&y=22 http https://github.com/?user=my and https://is.ok.domain/fuckit.html alskdfj xcv http://bla.ok/12343-2234/?x=123&y=22 http https://github.com/?user=my and https://is.ok.domain/fuckit.html alskdfj xcv http://bla.ok/12343-2234/?x=123&y=22 http https://github.com/?user=my and https://is.ok.domain/fuckit.html alskdfj xcv http://bla.ok/12343-2234/?x=123&y=22 http https://github.com/?user=my and https://is.ok.domain/fuckit.html alskdfj xcv http://bla.ok/12343-2234/?x=123&y=22 http https://github.com/?user=my and https://is.ok.domain/fuckit.html alskdfj xcv http://bla.ok/12343-2234/?x=123&y=22 http https://github.com/?user=my and https://is.ok.domain/fuckit.html";

function predefined_replace_urls_with_anchors($input){
	return preg_replace("#http(s?)://[^\s]+#", "<a href=\"$0\">$0</a>", $input);
}

$iterations = 10000;

// test native C++ implementation time
$t1 = microtime(true);
for($x = 0; $x<$iterations; $x++)
	ds_replace_urls_with_anchors($inputString);
$t2 = microtime(true);


// test PHP implementation time
$t3 = microtime(true);
for($x = 0; $x<$iterations; $x++)
	predefined_replace_urls_with_anchors($inputString);
$t4 = microtime(true);



echo "--------- NATIVE: ds_replace_urls_with_anchors() : " . ($t2-$t1) . "\n";
echo "--------- PREDEFINED: predefined_replace_urls_with_anchors() : " . ($t4-$t3) . "\n";

echo "\n ---------- TEST predefined_replace_urls_with_anchors() -------- \n";
echo predefined_replace_urls_with_anchors($inputString);
echo "\n ---------- TEST ds_replace_urls_with_anchors() -------- \n";
echo ds_replace_urls_with_anchors($inputString);
?>