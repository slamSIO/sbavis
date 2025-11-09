drop database if exists sbavis ;
create database sbavis ;

use sbavis ;

create table client (

	id int auto_increment not null ,
	nom varchar(100) not null ,
	prenom varchar(100) not null ,
	mdp varchar(100) not null ,
	email varchar( 100 ) not null ,
	primary key(id)
) ;

create table avis (

	id int auto_increment not null ,
	note int default 0 check (note between 0 and 5) ,
	commentaire varchar( 200 ) ,
	idClient int not null ,
	horodatage  timestamp default CURRENT_TIMESTAMP ,
	primary key( id ) ,
	foreign key( idClient ) references client( id ) 
) ;

insert into client values
( NULL , 'ONESTAS' , 'Valentine' , 'azerty' , 'valentine.onestas@gmail.com') ,
( NULL , 'HAFIDI' , 'Nadiya' , 'azerty' , 'n.hafidi@gmail.com') ,
( NULL , 'OSARO' , 'Clémence' , 'azerty' , 'c.osaro@orange.fr' ) ,
( NULL , 'JADOUX' , 'Lucie' , 'azerty' , 'lucie.jadoux@gmail.com' ) ,
( NULL , 'KANNY' , 'Pauline' , 'azerty' , 'p.kanny@gmail.com' ) ,
( NULL , 'KARA' , 'Juliette' , 'azerty' , 'juliette.kara@gmail.com' ) ,
( NULL , 'LAURY' , 'Sophie' , 'azerty' , 'sophie.laury@gmail.com' ) , 
( NULL , 'BELLIL' , 'Rim' , 'azerty' , 'rim.bellil@gmail.com' ) ;


insert into avis( note , commentaire , idClient ) values
( 3 , 'Pas mal. Bcp de produits à prix abordables' , 8 ) ,
( 1 , 'Vraiment bof. Je suis déçue' , 7 ) ,
( 5 , 'Excellent. Des produits de qualité.' , 2 ) ,
( 4 , 'Mieux depuis ma dernière visite' , 8 ) ;

