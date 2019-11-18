<?php

$db = "mysql:dbname=phpmyadmin;host=127.0.0.1";
$userDb = "root";
$passwordDb = "";

try {
    $pdo = new PDO($db,$userDb,$passwordDb);
    $sql = "
    
        create database osmakers;
        use osmakers;

        create table equipes(
            id int auto_increment primary key not null,
            nome varchar(100)
        );

        create table funcionarios (
            id int auto_increment primary key not null,
            nome varchar(100) not null,
            id_equipe int not null,
            foreign key (id_equipe) references equipes(id)
        );

        create table tipos_de_os(
            id int auto_increment primary key not null,
            nome varchar(100)
        );

        create table bairros(
            id int auto_increment primary key not null,
            nome varchar(100)
        );

        create table oss(
            id int auto_increment primary key not null,
            endereco text,
            id_bairro int not null,
            id_tipo int not null,
            duracao_prev int,
            duracao_real int,
            valor decimal(7,2),
            data date,
            foreign key (id_tipo) references tipos_de_os(id),
            foreign key (id_bairro) references bairros(id)
        );

        create table oss_equipes(
            id_os int not null,
            id_equipe int not null,
            foreign key (id_os) references oss(id),
            foreign key (id_equipe) references equipes(id)
        );

        insert into equipes (nome) values
            ('Equipe A'),
            ('Equipe B'),
            ('Equipe C'),
            ('Equipe D'),
            ('Equipe E');


        insert into funcionarios (nome,id_equipe) values
        ('Mariana Alves',1),
            ('Mariana Andressa',1),
            ('Beatriz Beatriz',1),
            ('Rony Candeli',1),
            ('Ana Carolina',1),
            ('Caroline Caroline',1),
            ('Teresa Cristina',2),
            ('Marcelo Da Mata',2),
            ('Tatiana De Oliveira' ,2),
            ('Lucas Ferrari',2),
            ('Leslie Gamarra',2),
            ('Nkuansambo Justem',3),
            ('Marion Jutglar',3),
            ('Laura Laura',3),
            ('Eloir Magalhães',3),
            ('Amanda Martins',3),
            ('Wilson Mateus',3),
            ('Megumi Miyata',3),
            ('Wilson Morais',4),
            ('Angela M',4),
            ('Domingos Mussumar',4),
            ('Debora Orsolon',4),
            ('Cristiane Reis',4),
            ('Guilherme Rodrigues',4),
            ('Silvana Sales',4),
            ('Taísa Salton',5),
            ('Aline Soares',5),
            ('Alaercio Vieira',5),
            ('Roseane Yumi',5),
            ('Angelica Zanetti',5),
            ('Felgueiras Zeferino',5),
            ('Megumi',5);
            
        insert into tipos_de_os (nome) values
            ('Recapeamento de pavimento'),
            ('Fresagem contínua de pavimento a frio'),
            ('Construção e/ou recuperação de guias'),
            ('Construção e/ou recuperação de sarjetas');

        insert into bairros (nome) values
            ('AEROPORTO VIRACOPOS'),
            ('ALTO DO JD IPAUSSURAMA'),
            ('ALTO JD IPAUSSURAMA'),
            ('BACURI'),
            ('BOSQUE'),
            ('BUENO DE MIRANDA'),
            ('CAMBO BELO'),
            ('CAMPINAS'),
            ('CAMPO REDONDO'),
            ('CAMPOS ELISEOS'),
            ('CENTRO'),
            ('CH ARVORE GRANDE'),
            ('CH BURITI'),
            ('CH CAMPOS ELISEOS'),
            ('CH CRUZEIRO DO SUL'),
            ('CH DA REPUBLICA'),
            ('CH FLORIANO'),
            ('C. PENTEADO'),
            ('CH FORMOSA'),
            ('CH LULU PONTES'),
            ('CH MARISA'),
            ('CH MORUMBI'),
            ('CH OLIMPIA'),
            ('CH PRADO'),
            ('CH RECANTO DA COLINA');

        insert into oss (
            id_bairro,
            id_tipo,
            duracao_prev,
            duracao_real,
            valor,
            data,
            endereco
        ) values

        (1,1,120,100,15000,'2019-11-17','Rua Maximiliano Weinlich, 34'),
        (1,2,100,110,12000,'2019-11-17','Rua Nilo Rezende Rubim, 35'),
        (1,3,240,300,35000,'2019-11-17','Avenida das Amoreiras, 5300'),
        (1,4,360,380,11000,'2019-11-17','Avenida das Amoreiras, 4990'),
        (1,2,480,480,10000,'2019-11-17','Rua Doutor Israel Martins, 45'),
        (1,1,330,320,12500,'2019-11-17','Rua Mineiros do Tiete, 635'),
        (1,2,300,200,13350,'2019-11-17','Rua General Lauro Sodre, 514'),
        (1,3,120,100,22110,'2019-11-17','Rua Itatiba, 513'),
        (1,4,100,110,12344,'2019-11-17','Rua Laranjal Paulista, 766'),
        (1,3,240,300,44330,'2019-11-17','Rua Arlindo Lucio da Silva, 125'),
        (2,1,360,320,15000,'2019-11-17','Rua Professora Amalia de Arruda L Martini, 621'),
        (2,2,480,200,12000,'2019-11-17','Rua Rodolfo Ribeiro, 156'),
        (2,3,330,100,35000,'2019-11-17','Avenida Francisco Glicerio, 1058'),
        (2,4,300,330,44342,'2019-11-17','Rua Celso de Barros, 213'),
        (2,4,120,240,11223,'2019-11-17','Avenida da Saudade, 869'),
        (2,1,100,100,44330,'2019-11-17','Rua Professora Nadir Leite do Canto, 40'),
        (2,2,240,110,15000,'2019-11-17','Rua Jose Ferreira da Silva, 385'),
        (2,3,360,300,12000,'2019-11-17','Rua Cristovao Bonini, 597'),
        (2,4,480,320,35000,'2019-11-17','Rua Gentil Ribeiro, 54'),
        (2,1,330,200,44342,'2019-11-17','Rua Mario Bassani, 206'),
        (2,1,300,100,15000,'2019-11-17','Rua Virginia Fontes da Silva Padilha, 35'),
        (2,2,120,060,12000,'2019-11-17','Rua Sarah Kubitschek de Oliveira, 87'),
        (2,3,100,100,35000,'2019-11-17','Rua Antonio Luchiari, 499'),
        (3,4,240,110,12500,'2019-11-18','Rua Antonio Fernando Von Ah, 176'),
        (3,2,360,300,13350,'2019-11-18','Rua Apostal Sotir Tako, 35'),
        (3,1,480,320,22110,'2019-11-18','Rua Rogerio Garcia Sanches, 488'),
        (3,2,330,200,11000,'2019-11-18','Rua Anair Caetano Goncalves, 608'),
        (3,3,300,100,21000,'2019-11-18','Rua Manoella Marcolino da Silva Derigo, 65'),
        (3,4,120,100,35000,'2019-11-18','Rua Onze, 609'),
        (3,3,100,110,11000,'2019-11-18','Rua Cacilda Becker, 0 / Rua Zulmira de Souza Rodrigues, 0'),
        (3,1,240,300,10000,'2019-11-18','Rua Urupes, 75'),
        (4,2,360,320,43333,'2019-11-18','Rua Jose Gomes Oliveira Filho, 173'),
        (4,3,480,200,44330,'2019-11-18','Rua Itaocara, 31'),
        (4,4,330,100,15000,'2019-11-18','Rua Antonio Baracat, 36'),
        (4,4,300,480,12000,'2019-11-18','Avenida Marginal, 584'),
        (4,1,120,100,35000,'2019-11-18','Rua Roberto Antonio Manfredini Filho, 328'),
        (4,2,100,110,44342,'2019-11-18','Rua Professora Carolina de Oliveira, 5'),
        (4,3,240,300,44330,'2019-11-18','Avenida John Boyd Dunlop, 12500'),
        (4,1,360,320,15000,'2019-11-18','Rua Romeu Marinelli, 780'),
        (4,2,480,200,12000,'2019-11-18','Rua Fernando Padua Castro Mundt, 517'),
        (4,1,330,100,35000,'2019-11-18','Rua Rene Verinaud, 512'),
        (4,2,300,320,44342,'2019-11-18','Rua Rene Verinaud, 530'),
        (4,1,120,200,13350,'2019-11-18','Rua Expedicionario Horacio Carlos Teixeira, 25'),
        (4,2,100,100,22110,'2019-11-18','Rua Guilherme Fragoso Ferrao, 112'),
        (5,3,240,200,11000,'2019-11-18','Rua Celso Soares Couto, 366'),
        (5,1,360,600,21000,'2019-11-18','Rua General Carlos Coari Iracema Gomes, 202'),
        (5,2,480,600,35000,'2019-11-18','Rua Rio Capivari, 72'),
        (5,3,330,100,11111,'2019-11-18','Rua Expedicionario Horacio Carlos Teixeira, 33'),
        (5,4,300,110,21000,'2019-11-18','Rua Expedicionario Horacio CArlos Teixeira, 41'),
        (5,4,270,300,20500,'2019-11-18','Rua Osvaldo Gallerani, 494');

        insert into oss_equipes(id_equipe,id_os) values 
        (1,1),
        (2,1),
        (3,2),
        (4,3),
        (1,4),
        (2,5),
        (3,5),
        (4,5),
        (1,6),
        (2,7),
        (3,8),
        (4,9),
        (1,10),
        (2,11),
        (3,11),
        (4,11),
        (1,12),
        (2,13),
        (3,14),
        (4,15),
        (1,16),
        (2,16),
        (3,17),
        (4,18),
        (1,19),
        (1,20),
        (2,21),
        (3,22),
        (4,23),
        (1,24),
        (2,25),
        (3,26),
        (4,27),
        (1,28),
        (2,29),
        (3,30),
        (4,30),
        (1,31),
        (2,32),
        (3,33),
        (4,34),
        (1,35),
        (2,36),
        (3,37),
        (4,38),
        (1,39),
        (2,40);

    ";
    $sql = $pdo->query($sql);
    header("Location: index.php");

} catch (PDOException $e) {
    echo ("Deu Ruim Parça" .$e->getMessage());
}