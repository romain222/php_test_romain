<?php

// associative array to store my contact details
$contactTable = [
    'firstName' => 'Romain',
    'lastName' => 'Plier',
    'address' => 'rue des Gaulois',
    'postalCode' => 3432,
    'city' => 'Dudelange',
    'email' => 'r.plier@outlook.com',
    'telephone' => 661960222,
    'birthday' => '1996-02-22'
];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercice 1</title>
    </head>
	<body>
	<ul>
		<?php 
		// looping over the tables keys and values and display/echo them
		foreach($contactTable as $key => $value){
		    // birthday needs to be modified before echoing $value
		    if($key === 'birthday'){
		        $value = new DateTime($value);
		        $value = $value->format('d/m/Y');
		    } 
		    echo "<li> $key : $value </li>";
		}
		?>
    </ul>
	</body>
</html>