<?php
$servernimi="localhost"; // d101721.mysql.zonevs.eu
$kasutaja="Nikolajev21"; //d101721_nikol21
$parool="Nikolajev27"; // 'Targv21nikola'
$andmebaas="nikolajev21"; // d101721_nikol21

$yhendus=new mysqli($servernimi,$kasutaja,$parool,$andmebaas);

$yhendus->set_charset('UTF8');
/*
CREATE TABLE  inimene(
    id int AUTO_INCREMENT PRIMARY KEY,
    nimi varchar(20) NOT NULL,
    synnipaev date);

INSERT INTO inimene(nimi,synnipaev)
VALUES('Test', '2000-12-10');

SELECT * from inimene



ALTER TABLE inimene ADD pilt TEXT
ALTER TABLE inimene ADD silmadevarv TEXT
 */
