CREATE TABLE `salariés` (
`ID` INT NOT NULL AUTO_INCREMENT,
`prenom` VARCHAR(50),
`nom` VARCHAR (50),
`adresse` VARCHAR (120),
`CP` INT(10),
`ville` VARCHAR(50),
`date_de_naissance` DATETIME,
`sexe` INT,
`ancienneté` INT,
PRIMARY KEY (`ID`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8salariéssalariés
