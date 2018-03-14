<?php
//only execute when a post request was sent
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    // get all the data
    $title = $_POST['title'] ?? null;
    $actors = $_POST['actors'] ?? null;
    $director = $_POST['director'] ?? null;
    $producer = $_POST['producer'] ?? null;
    $year = $_POST['year'] ?? null;
    $language = $_POST['language'] ?? null;
    $category = $_POST['category'] ?? null;
    $storyline = $_POST['storyline'] ?? null;
    $video = $_POST['video'] ?? null;
    
    
    // validation checks 1. length 2. valid url
    $lengthError = strlen($title) < 5 || strlen($director) < 5 
                || strlen($actors) < 5 || strlen($producer) < 5 
                || strlen($storyline) < 5;
    
    $urlError = !filter_var($video, FILTER_VALIDATE_URL);
    
    // if no errors in validation, get connection to DB & execute query
    if(!$lengthError && !$urlError){
        $connection = new PDO('mysql:host=localhost;dbname=exercise_3', 'root');
        
        $sql = 'INSERT INTO 
                movies(title, actors, director, producer, year_of_prod,
                language, category, storyline, video) 
                VALUES(:title, :actors, :director, :producer, :year, 
                :language, :category, :storyline, :videoURL);';

        $statement = $connection->prepare($sql);
        $statement->bindValue('title', $title, PDO::PARAM_STR);
        $statement->bindValue('actors', $actors, PDO::PARAM_STR);
        $statement->bindValue('director', $director, PDO::PARAM_STR);
        $statement->bindValue('producer', $producer, PDO::PARAM_STR);
        $statement->bindValue('year', (int)$year, PDO::PARAM_INT);
        $statement->bindValue('language', $language, PDO::PARAM_STR);
        $statement->bindValue('category', $category, PDO::PARAM_STR);
        $statement->bindValue('storyline', $storyline, PDO::PARAM_STR);
        $statement->bindValue('videoURL', $video, PDO::PARAM_STR);
        
        // feedback: if INSERT worked or not
        if($statement->execute()){
            echo "The movie $title was successfully added";
        } else {
            echo implode(', ', $statement->errorInfo());
            echo "The movie $title could not be added";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercice 3</title>
    </head>
	<body>
		<?php 
		// Error messages
		if($lengthError ?? false){
		    echo "<p style=\"color:red;\">Title, Director, Actors, Producer and Storyline need at least 5 characters.</p>";
		}
		if($urlError ?? false){
		    echo "<p style=\"color:red;\">Video could not be found.</p>";
		}
		// HTML form
		?>
	
		<form method="POST">
			<input type="text" name="title" placeholder="title"/>
			<input type="text" name="actors" placeholder="actor names"/>
			<input type="text" name="director" placeholder="director name"/>
			<input type="text" name="producer" placeholder="producer name"/>
			
			<select name="year">
				<?php 
				for($i = 1900; $i <= 2018; $i++){
				    echo "<option value=\"$i\">$i</option>";
				}
				?>
			</select>
			
			<select name="language">
				<option value="english">English</option>
				<option value="german">German</option>
				<option value="french">French</option>
				<option value="spanish">Spanish</option>
				<option value="portuguese">Portuguese</option>
			</select>
			
			<select name="category">
				<option value="action">Action</option>
				<option value="comedy">Comedy</option>
				<option value="romance">Romance</option>
				<option value="horror">Horror</option>
			</select>
			
			<input type="text" name="storyline" placeholder="storyline"/>
			<input type="text" name="video" placeholder="trailer video (URL)"/>
			
			<button type="submit">Submit</button>
		</form>
	</body>
</html>
