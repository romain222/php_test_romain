<?php
// get movies from DB
$connection = new PDO('mysql:host=localhost;dbname=exercise_3', 'root');

$sql = 'SELECT * FROM movies';

$statement = $connection->prepare($sql);
$statement->execute();

$allResults = $statement->fetchAll()
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercice 3</title>
    </head>
	<body>
		<?php 
		// display every movie from query result
		foreach ($allResults as $currentRow){
		    echo "<table border=1>";
		    echo '<thead>';
		    echo '<td>Movie</td>';
		    echo '<td>see more info</td>';
		    echo '</thead>';
		    echo "<tr>";
		    echo "<td>Title: " . $currentRow['title'] . "<br/>Director: " . $currentRow['director']. "<br/>Year: ".$currentRow['year_of_prod']."</td>";
		    echo "<td><a href=\"movieDetails.php?id=".$currentRow['id']."\">click</a></td>";  // use get method to send information about the movie id
		    echo "<tr>";
		    echo "</table>";
		}
		?>
	</body>
</html>
