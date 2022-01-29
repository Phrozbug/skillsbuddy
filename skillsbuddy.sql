DROP DATABASE IF EXISTS skillsbuddy;

CREATE DATABASE skillsbuddy;

USE skillsbuddy;

CREATE TABLE skills ( id int PRIMARY KEY AUTO_INCREMENT, taal enum('HTML', 'CSS', 'Bootstrap', 'PHP', 'PHP-PDO', 'JavaScript', 'Python', 'GIT', 'Diversen'), onderdeel varchar(255), onlinedoc varchar(2083), snippet varchar(8000), notities varchar(255), videoid varchar(255) );

INSERT INTO skills (taal, onderdeel, onlinedoc, snippet, notities, videoid) VALUES
('HTML', 'opbouw', 'https://www.w3schools.com/html/html_intro.asp', '<!DOCTYPE html>
<html>

<head>
    <title>De pagina van Marc</title>
</head>

<body>
    <h1>Marc Roelofs</h1>
</body>


</html>
', 'De basic start van html', 'vnvS22muxQw'),

('HTML', 'title', 'https://www.w3schools.com/html/html_intro.asp', '<!DOCTYPE html>
<html>

<head>
    <title>Marc Roelofs</title>
</head>

<body>
    <h1>Marc Roelofs</h1>
</body>


</html>
', 'Het gebruik van de titel in de head', 'wWr9782LfFM'),

('CSS', 'opbouw', 'https://www.w3schools.com/css/default.asp', '
h1 {
    color: red;
}
', 'De basic start van CSS', 'rU7m1Lm5QYU'),

('CSS', 'selectors' ,'https://www.w3schools.com/css/css_selectors.asp', '
h1 {
    color: red;
}
li { 
    font-size: 20px
}
h2 {
    color: darkred;
    }
', 'Het gebruik van selectors in CSS', 'rU7m1Lm5QYU'),

('PHP', 'opbouw', 'https://www.w3schools.com/php/php_syntax.asp', '<?php
echo "Hello World!";
?>
', 'De basic start van PHP', 'WAiGPPYrQBs');



