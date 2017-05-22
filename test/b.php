<?php


function getParameters() {
	$para = "";

	foreach ($_REQUEST as $k=>$v) {
		$k = stripslashes(strip_tags($k));
		$v = stripslashes(strip_tags($v));

		if ($para === "") {
			$para .= sprintf('%s=%s', $k, $v);
		} else {
			$para .= sprintf('&%s=%s', $k, $v);
		}
	}
	return $para;
}

$para = getParameters();

echo $_SERVER['QUERY_STRING'];