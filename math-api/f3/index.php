<?php
$data = array('numbers' => [1, 5, 8], 'dttm' => date("Y-m-d H:i:s"));

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents('http://localhost/math-api/f3/mul', false, $context);

echo $result;
?>