CREATE DATABASE exercise_3;
USE exercise_3;
CREATE TABLE movies(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(50),
	actors VARCHAR(255),
	director VARCHAR(100),
	producer VARCHAR(100),
	year_of_prod YEAR,
	`language` VARCHAR(50),
	category ENUM('comedy', 'action', 'romance', 'horror'),
	storyline TEXT,
	video VARCHAR(255)
)engine=innoDB;