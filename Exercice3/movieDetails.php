<?php
// get movie id
$movieId = $_GET['id'] ?? null;

// get movie details from DB
if($movieId){
    $connection = new PDO('mysql:host=localhost;dbname=exercise_3', 'root');
    
    $sql = 'SELECT * FROM movies WHERE id='.$movieId;
    
    $statement = $connection->prepare($sql);
    $statement->execute();
    
    $allResults = $statement->fetchAll();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Movie Details</title>
    </head>
	<body>
	<?php 
	// if id was valid
	if(!empty($allResults)){
	?>
		<h1>Details:</h1>
		<?php
		// display movie details
		foreach($allResults as $currentRow){
		    echo "<p>Title: ".$currentRow['title']."</p>";
		    echo "<p>Actors: ".$currentRow['actors']."</p>";
		    echo "<p>Directors: ".$currentRow['director']."</p>";
		    echo "<p>Producer: ".$currentRow['producer']."</p>";
		    echo "<p>Year of production: ".$currentRow['year_of_prod']."</p>";
		    echo "<p>Language: ".$currentRow['language']."</p>";
		    echo "<p>Category: ".$currentRow['category']."</p>";
		    echo "<p>Storyline: ".$currentRow['storyline']."</p>";
		    echo "<p>Trailer video: <a href=\"".$currentRow['video']."\">".$currentRow['video']."</a></p>";
		}
	} else {
	    // error message
	    echo 'Movie not found :/';
	}
		?>
	</body>
</html>
