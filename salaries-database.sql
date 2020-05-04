CREATE TABLE salariés (
ID INT AUTO_INCREMENT,
prenom VARCHAR(50),
nom VARCHAR (50),
adresse VARCHAR (120),
CP INT(10),
ville VARCHAR(50),
date_de_naissance DATETIME,
sexe INT,
ancienneté INT,
fichier VARCHAR (50),
CONSTRAINT PK_SALARIES PRIMARY KEY(ID)
);