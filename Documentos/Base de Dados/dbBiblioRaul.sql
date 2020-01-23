CREATE DATABASE dbatividadestemp;

USE dbatividadestemp;

CREATE TABLE user (
  user_id int AUTO_INCREMENT,
  nome varchar(50) NOT NULL,
  PASSWORD varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  PRIMARY KEY (user_id)
);

CREATE TABLE outros_espectadores (
  outros_espectadores_id int AUTO_INCREMENT,
  descricao varchar(255) NOT NULL,
  PRIMARY KEY (outros_espectadores_id)
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

CREATE TABLE atividade (
  atividade_id int AUTO_INCREMENT,
  user_id int NOT NULL,
  local_id int NOT NULL,
  inicio datetime NOT NULL,
  fim datetime,
  descricao varchar(255) NOT NULL,
  notas varchar(255),
  numero_alunos int,
  numero_professores int,
  numero_pais int,
  FOREIGN KEY (local_id) REFERENCES LOCAL (local_id),
  FOREIGN KEY (user_id) REFERENCES USER (user_id),
  PRIMARY KEY (atividade_id)
);

CREATE TABLE recursos_necessarios (
  recurso_id int,
  atividade_id int,
  quantidade int,
  FOREIGN KEY (recurso_id) REFERENCES recurso (recurso_id),
  FOREIGN KEY (atividade_id) REFERENCES atividade (atividade_id),
  PRIMARY KEY (recurso_id, atividade_id)
);

CREATE TABLE professor_atividade (
  professor_id int,
  atividade_id int,
  FOREIGN KEY (professor_id) REFERENCES professor (professor_id),
  FOREIGN KEY (atividade_id) REFERENCES atividade (atividade_id),
  PRIMARY KEY (professor_id, atividade_id)
);

CREATE TABLE turma_atividade (
  turma_id int,
  atividade_id int,
  FOREIGN KEY (turma_id) REFERENCES turma (turma_id),
  FOREIGN KEY (atividade_id) REFERENCES atividade (atividade_id),
  PRIMARY KEY (turma_id, atividade_id)
);

CREATE TABLE outros_espectadores_atividade (
  outros_espectadores_id int,
  atividade_id int,
  FOREIGN KEY (outros_espectadores_id) REFERENCES outros_espectadores (outros_espectadores_id),
  FOREIGN KEY (atividade_id) REFERENCES atividade (atividade_id),
  PRIMARY KEY (outros_espectadores_id, atividade_id)
);