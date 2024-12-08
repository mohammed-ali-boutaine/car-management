
CREATE DATABASE voitures_system;
USE voitures_system;

-- creation des tableau

CREATE TABLE clients (
     cin VARCHAR(10) PRIMARY KEY,
     nom VARCHAR(100),
     adress VARCHAR(255),
     tel VARCHAR(20)
);

CREATE TABLE voitures (
     matricule VARCHAR(10) PRIMARY KEY,
     marque VARCHAR(50),
     modele VARCHAR(50),
     annee INT
);

CREATE TABLE contrats (
     id INT PRIMARY KEY AUTO_INCREMENT,
     date_debut DATE,
     date_fin DATE,
     dure INT ,

     cin_client VARCHAR(10),
     id_matric VARCHAR(10),
     FOREIGN KEY (cin_client) REFERENCES clients(cin),
     FOREIGN KEY (id_matric) REFERENCES voitures(matricule)
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20),
reg_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- insertion des donnes

INSERT INTO clients VALUES
 ("ae13214","Fatima El Amri","Rabat, Maroc","0678901234"),
 ("ab142654","Ahmed Saidi","Casablanca, Maroc","0612345678");

 INSERT INTO voitures VALUES
 ("1234ABC","Toyota","Corolla",2020),
 ("5678XYZ","Renault","Clio",2021);

INSERT INTO contrats (date_debut, date_fin, dure, cin_client, id_matric) VALUES
    ("2024-01-01", "2024-01-10", 10, "ae13214", "1234ABC"),
    ("2024-02-01", "2024-02-05", 5, "ab142654", "5678XYZ");

INSERT INTO users (name, email, password, role) 
VALUES ("ali","ali","ali","admin");


-- insertion
insert into clients values(3,"Mohammed Ali Boutaine","Sale,Maroc","0650256210");
insert into voitures values("1234ABC14","Dodge","Hell Cat",1994);
insert into contrats values(3,"2026-02-22","2028-02-22",7,3,"1234ABC14");



-- requêtes pour manipuler les données.

-- contra:
select * from contrats;

select * from contrats
where dure > 7;

select * from contrats 
join clients on clients.id = contrats.id_client
join voitures on voitures.matric = contrats.id_matric;





