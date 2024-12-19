<?php
// Get cURL resource
$curl = curl_init();
//https://api.postcode.eu/nl/v1/addresses/postcode/
// Set some options - we are passing in a useragent too here

if (!empty($_GET['address_add'])) {
	$address_add = '/' . $_GET['address_add'];
} else {
	$address_add = '';
}

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.postcode.eu/nl/v1/addresses/postcode/' . $_GET['postcode'] . '/' . $_GET['housenr'] . $address_add . ''
));

/*$headers = [
    'X-Api-Key: arIcfNKZvaNaeEySXhbz7v95MCGO4DG4cEqUSRe4'
    ];*/
$username = 'TxbqzYABcOJBGadopVZDZOhwOVEkt7jBeOzUWZHKCWk';
$password = 'AuxFNao03NV9lu3j9MQzNUEB6d7CK4y8eVjALUhegzCzH9AmVb';
curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $password);
//curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

// Send the request & save response to $resp
$resp = curl_exec($curl);

// Close request to clear up some resources
curl_close($curl);

echo $resp;
