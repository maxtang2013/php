<?php

// open_door --> OpenDoor, make_by_id --> MakeById
function underScoreToUpper($id) {
    $arr = explode('_', $id);
    $result = "";
    foreach ($arr as $item) {
        $result .= ucfirst($item);
    }

    return $result;
}

echo underScoreToUpper("make_by_id");
echo underScoreToUpper("_Hello_world");

echo '<br/>';
preg_match('#http://([^/]+)(/[^/]+)*#', "http://www.163.com/finance/index.jsp", $matches);

print_r($matches);

echo '<br/>';

$str = '<html><script>function a(){alert("hi");}</script> <head><title>OK</title></head><body><script type="text/javascript">var r = 4; document.write("ok");</script></html>';

preg_match('#(.*)<script>.*</script>(.*)#', $str,  $matches);
print_r($matches);

echo '<br/>';
preg_match('#<html>(.*)</html>#', '<html>unction a(){alert("hi");</html>', $matches);
print_r($matches);

echo '<br/>';
$subject="<tag>Hello World</tag>"; 
preg_match( '/<tag>.*<\\/tag>/' , $subject, $matches );
print_r($matches);

echo 'Tomorrow I \'ll learn PHP global variables.';
echo 'This is a bad command : del c:\\*.*' ;

?>
