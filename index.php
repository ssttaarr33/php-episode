<!DOCTYPE html>
<html>
<body>

<h1>Php Beer episode</h1>

<?php

$response = file_get_contents('http://ontariobeerapi.ca/beers/');
$beersJson = json_decode($response);
$map = array();
$countries =array();
foreach ($beersJson as $beer) {
    $map[$beer->country][] = 1;
}

foreach ($beersJson as $beer) {
    if (!array_key_exists($beer->country, $countries)) {
        $countries[$beer->country][] = count($map[$beer->country]);
        echo 'Country: ' . $beer->country . '; beers: '. count($map[$beer->country]) . '<br/>';
    }
    
}
?> 

</body>
</html>
