
CREATE TABLE `Bookings` ( id INTEGER PRIMARY KEY ASC, passanger_id INTEGER, datebooking TEXT, numberinparty INTEGER );

CREATE TABLE `Journey_Legs` ( id INTEGER PRIMARY KEY ASC, booking_id INTEGER, leg_id INTEGER );

CREATE TABLE `Legs` ( id INTEGER PRIMARY KEY ASC, actual_departure_time DATETIME, actual_arrival_time DATETIME );

CREATE TABLE `Passanger_File` ( id INTEGER PRIMARY KEY ASC, passanger_id INTEGER, files_id INTEGER );

CREATE TABLE `Passangers` ( id INTEGER PRIMARY KEY ASC, prenom VARCHAR, nom VARCHAR, telephone VARCHAR, email VARCHAR, adresse VARCHAR, ville VARCHAR, province VARCHAR, pays VARCHAR );

CREATE TABLE `Pays` ( id INTEGER PRIMARY KEY ASC, nom VARCHAR );

CREATE TABLE `Provinces` ( id INTEGER PRIMARY KEY ASC, nom VARCHAR, pays_id INTEGER );

CREATE TABLE `Users` ( 'id' INTEGER PRIMARY KEY, 'username' VARCHAR, 'password' VARCHAR, 'role' VARCHAR, 'created' DATETIME , 'modified' DATETIME );

CREATE TABLE `evenements` ( id INTEGER PRIMARY KEY ASC, name TEXT, is_done TINYINT );

CREATE TABLE `files` ( id INTEGER PRIMARY KEY ASC, name VARCHAR, path TEXT, created DATETIME, modified DATETIME, status TINYINT );
