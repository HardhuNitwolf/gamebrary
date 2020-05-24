CREATE DATABASE IF NOT EXISTS gamebrary;
USE gamebrary;

CREATE TABLE members(
id                  int(255) auto_increment not null,
role                varchar(20),
name                varchar(100),
surname             varchar(200),
nick                varchar(100),
email               varchar(255),
password            varchar(255),
image               varchar(255),
maxRenting          int(5),
created_at          datetime,
updated_at          datetime,
remember_token      varchar(255),
CONSTRAINT pk_members PRIMARY KEY(id)

)ENGINE=InnoDb;

INSERT INTO members VALUES(NULL,'admin','Ricardo', 'Torres Landete','Hardhu','ricardo.torres.landete@gmail.com','Caputdraconis21',null,null,CURTIME(),CURTIME(),null);
INSERT INTO members VALUES(NULL,'admin','Guillermo', 'Bonet Collado','DarkCloudb','guiboco18@gmail.com','Squall89',null,null,CURTIME(),CURTIME(),null);
INSERT INTO members VALUES(NULL,'user','Mireia', 'Solera Torrent','Ragna','mireia.soltor94@gmail','Mireyita2908',null,null,CURTIME(),CURTIME(),null);
INSERT INTO members VALUES(NULL,'user','Alejandro', 'Roig Ferrer','Rednap','alroifer29@gmail.com','stewarto',null,null,CURTIME(),CURTIME(),null);
INSERT INTO members VALUES(NULL,'user','Helios', 'Leyton Díaz','Chrisnael','Helios_02@hotmail.com','elcaballolamato',null,null,CURTIME(),CURTIME(),null);
INSERT INTO members VALUES(NULL,'user','Beatriz', 'Vera Vinuesa','Vervin','beaveravinuesa@gmail.com','ojitosalton',null,null,CURTIME(),CURTIME(),null);
INSERT INTO members VALUES(NULL,'user','Diego', 'Clemente Collado','Rhaeghar','diego.14.cle@gmail.com','taekwondo',null,null,CURTIME(),CURTIME(),null);
INSERT INTO members VALUES(NULL,'user','Sandra', 'Santamaria Saez ','SanShelby','sandrule@live.com','algorritmo',null,null,CURTIME(),CURTIME(),null);


CREATE TABLE IF NOT EXISTS product(
id                  int(255) auto_increment not null,
name                varchar(200),
typus               varchar(100),
category            varchar(100),
description         text,
image               varchar(255),
instruction         text,
explanation         varchar(255),
created_at          datetime,
updated_at          datetime,
CONSTRAINT pk_product PRIMARY KEY(id)

)ENGINE=InnoDb;

INSERT INTO product VALUES(NULL,'Los colonos de Catán','juego', 'strategy','El objetivo es colonizar la isla y lo conseguirás cuando acumules 10 ó más puntos los puntos que tienes que lograr en tu tirada, así que espabila y crea tu estrategia. Tendrás que mostrar tus dotes de comerciante: compra materias primas, vende las que producen tus campos y construye poblados, ciudades y carreteras.',null,'Jugadores: 3-4//Edad+10',null,3,CURTIME(),CURTIME());
INSERT INTO product VALUES(NULL,'El Señor de los Anillos: Viajes por la Tierra Media','juego', 'LongDuration','Las sombras se arrastran por la Tierra Media, mientras se extienden los rumores entre los elfos, enanos y humanos sobre nuevos males que crecen en el Bosque Negro y Mordor. La Tierra Media necesita nuevos héroes para protegerse contra la sombra que se alza llena de maldad y corrupción.',null,'Jugadores: 1-5//Edad+14',null,1,CURTIME(),CURTIME());
INSERT INTO product VALUES(NULL,'Pajarracos','juego', 'cards','Pajarracos es un juego de estrategia y rivalidad. ¡Consigue más frutas que tus rivales! ¡Protege tus frutales con tus Espantapájaros! Y sobretodo ¡envía a tus Pajarracos a comerse las frutas del resto de los jugadores! ',null,'Jugadores: 3-6//Edad+6',null,4,CURTIME(),CURTIME());
INSERT INTO product VALUES(NULL,'Ciudadelas','juego', 'cards','Trata de construir la mejor ciudad de todas y ser nombrado Maestro Constructor del reino. Impresiona a la nobleza con tu capacidad para el desarrollo de las ciudades.',null,'Jugadores: 2-7//Edad+10',null,2,CURTIME(),CURTIME());
INSERT INTO product VALUES(NULL,'Sushi Party Go','juego', 'starter','Escoge tu propio menú entre 20 exquisitos platos y, después, intenta ganar el mayor número de puntos posible combinando las mejores cartas.',null,'Jugadores: 3-4//Edad+10',null,4,CURTIME(),CURTIME());
INSERT INTO product VALUES(NULL,'Ubongo','libro', 'starter','¡Trepidante, adictivo y muy sencillo! Sé el más rápido en resolver tu puzzle y grita ¡Ubongo! No querrás parar de jugar',null,'Jugadores: 2-4//Edad+8',null,3,CURTIME(),CURTIME());
INSERT INTO product VALUES(NULL,'Fábulas','libro', 'Fantasy_Sci-Fi','Juego de rol en el que se entremezclan el mundo real y el mundo de las hadas, los sucesos ocurridos entre los mortales y las investigaciones irreales y míticas. Los jugadores formarán parte de la Sociedad de Cuentacuentos, con importantes misiones que cumplir.',null,'Dados: D6',null,2,CURTIME(),CURTIME());
INSERT INTO product VALUES(NULL,'Steam States','libro', 'starter','¡Empieza el viaje! Adéntrate en los Estados Unidos de Ansalance. Descubre las antiguas culturas que pueblan el país y lánzate a conocer aquello que yace oculto en arcaicas ruinas, lejos de la comodidad de las grandes ciudades y de la moderna tecnología.',null,'Dados: D4,D6,D8, D10, D12, D20',null,3,CURTIME(),CURTIME());
INSERT INTO product VALUES(NULL,'Hombre Lobo', 'libro','Mundo Tinieblas','El Apocalipsis es un juego de rol editado por la compañía White Wolf y en el que el jugador interpreta a un hombre lobo.​ Los hombres lobo son guerreros de Gaia que luchan contra el Apocalipsis', null ,'Dados: D10', null, 4,   CURTIME(), CURTIME() );
INSERT INTO product VALUES(NULL,'Vampiro: La Mascarada','libro', 'Mundo Tinieblas','El juego trata sobre la existencia de vampiros en la edad contemporánea, en un mundo gótico-punk parecido al nuestro pero más oscuro, y fue el primero de un conjunto de juegos que describen las diferentes criaturas sobrenaturales del mundo y que recibe el nombre de Mundo de Tinieblas.',null,'Dados: D10',null,3,CURTIME(),CURTIME());
INSERT INTO product VALUES(NULL,'La Llamada de Cthulhu','libro', 'Terror','La llamada de Cthulhu es un juego de rol de horror ambientado en los años veinte y en particular en los «mitos de Cthulhu», universo de ficción iniciado por el escritor estadounidense Howard Phillips Lovecraft',null,'Dados: D4,D6,D8, D10, D12, D20, D100',null,3,CURTIME(),CURTIME());
INSERT INTO product VALUES(NULL,'Pathfinder','libro', 'Dungeon','Eres un valiente aventurero dentro de un mundo lleno de maldad y con magia por todos los rincones, ¿serás capaz de sobrevivir?',null,'Dados: D4,D6,D8, D10, D12, D20',null,1,CURTIME(),CURTIME());



CREATE TABLE IF NOT EXISTS renting(
id                  int(255) auto_increment not null,
member_id           int(255),
product_id          int(255),
iniRenting          datetime,
endRenting          datetime,
CONSTRAINT pk_renting PRIMARY KEY(id),
CONSTRAINT fk_renting_members FOREIGN KEY(member_id) REFERENCES members(id),
CONSTRAINT fk_renting_product FOREIGN KEY(product_id) REFERENCES product(id)

)ENGINE=InnoDb;



