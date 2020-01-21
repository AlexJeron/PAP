CREATE DATABASE BiblioRaul;

USE BiblioRaul;

CREATE TABLE user (
  user_id int AUTO_INCREMENT,
  nome varchar(50) NOT NULL,
  PASSWORD varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  remember_token varchar(255),
  PRIMARY KEY (user_id)
);

CREATE TABLE total_espectadores (
  total_espectadores_id int AUTO_INCREMENT,
  numero_alunos int,
  numero_professores int,
  numero_pais int,
  outros varchar(255),
  PRIMARY KEY (espectador_id)
);

CREATE TABLE LOCAL (
  local_id int AUTO_INCREMENT,
  nome varchar(50) NOT NULL,
  espaço int,
  PRIMARY KEY (local_id)
);

CREATE TABLE recurso (
  recurso_id int AUTO_INCREMENT,
  nome varchar(50) NOT NULL,
  quantidade int,
  PRIMARY KEY (recurso_id)
);

CREATE TABLE professor (
  professor_id int AUTO_INCREMENT,
  nome varchar(50) NOT NULL,
  PRIMARY KEY (professor_id)
);

CREATE TABLE turma (
  turma_id int AUTO_INCREMENT,
  nome varchar(10) NOT NULL,
  PRIMARY KEY (turma_id)
);

CREATE TABLE evento (
  evento_id int AUTO_INCREMENT,
  user_id int NOT NULL,
  total_espectadores_id int NOT NULL,
  local_id int,
  inicio datetime NOT NULL,
  fim datetime,
  atividade varchar(255) NOT NULL,
  FOREIGN KEY (local_id) REFERENCES LOCAL (local_id),
  FOREIGN KEY (user_id) REFERENCES USER (user_id),
  FOREIGN KEY (espectador_id) REFERENCES espectador (espectador_id),
  PRIMARY KEY (evento_id)
);

CREATE TABLE recursos_necessarios (
  recurso_id int,
  evento_id int,
  quantidade int,
  FOREIGN KEY (recurso_id) REFERENCES recurso (recurso_id),
  FOREIGN KEY (evento_id) REFERENCES evento (evento_id),
  PRIMARY KEY (recurso_id, evento_id)
);

CREATE TABLE professor_evento (
  professor_id int,
  evento_id int,
  FOREIGN KEY (professor_id) REFERENCES professor (professor_id),
  FOREIGN KEY (evento_id) REFERENCES evento (evento_id),
  PRIMARY KEY (professor_id, evento_id)
);

CREATE TABLE turma_evento (
  turma_id int,
  evento_id int,
  FOREIGN KEY (turma_id) REFERENCES turma (turma_id),
  FOREIGN KEY (evento_id) REFERENCES evento (evento_id),
  PRIMARY KEY (turma_id, evento_id)
);