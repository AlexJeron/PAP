create database dbEventos;

use dbEventos;

create table utilizador (
utilizador_id int auto_increment,
nome varchar(50) not null,
password varchar(250) not null,
email varchar(100) not null,
primary key (utilizador_id)
);

create table espectador (
espectador_id int auto_increment,
numero_alunos int,
numero_professores int,
numero_pais int,
outros varchar(250),
primary key (espectador_id)
);

create table local (
local_id int auto_increment,
nome varchar(50) not null,
primary key (local_id)
);

create table recurso (
recurso_id int auto_increment,
nome varchar(50) not null,
primary key (recurso_id)
);

create table professor (
professor_id int auto_increment,
nome varchar(50) not null,
primary key (professor_id)
);

create table turma (
turma_id int auto_increment,
nome_turma varchar(10) not null,
primary key (turma_id)
);

create table evento (
evento_id int auto_increment,
utilizador_id int not null,
espectador_id int not null,
local_id int,
inicio datetime not null,
fim datetime,
atividade varchar(250) not null,
foreign key (local_id) references local (local_id),
foreign key (utilizador_id) references utilizador (utilizador_id),
foreign key (espectador_id) references espectador (espectador_id),
primary key (evento_id)
);

create table recursos_necessarios (
recurso_id int,
evento_id int,
quantidade int,
foreign key (recurso_id) references recurso (recurso_id),
foreign key (evento_id) references evento (evento_id),
primary key (recurso_id, evento_id)
);

create table professor_evento (
professor_id int,
evento_id int,
foreign key (professor_id) references professor (professor_id),
foreign key (evento_id) references evento (evento_id),
primary key (professor_id, evento_id)
);

create table turma_evento (
turma_id int,
evento_id int,
foreign key (turma_id) references turma (turma_id),
foreign key (evento_id) references evento (evento_id),
primary key (turma_id, evento_id)
);













