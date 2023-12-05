CREATE TABLE paciente (
  id int NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  senha varchar(200) NOT NULL,
  endereco varchar(200) NOT NULL,
  idade int NOT NULL,
  data_nasc date NOT NULL,
  rg int NOT NULL,
  cpf int NOT NULL,
  PRIMARY KEY (id,nome));
CREATE TABLE socia (
  id int NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  senha varchar(200) NOT NULL,
  disponibilidade varchar(45) NOT NULL,
  servicos varchar(50) NOT NULL,
  PRIMARY KEY (`id`));
CREATE TABLE atendente (
  id int NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  senha varchar(200) NOT NULL,
  funcao varchar(45) NOT NULL,
  PRIMARY KEY (id,funcao));
CREATE TABLE agenda(
id int NOT NULL AUTO_INCREMENT,
paciente_id int NOT NULL,
data date NOT NULL,
hora TIME NOT NULL,
socia_id int NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (paciente_id) REFERENCES paciente (id),
FOREIGN KEY (socia_id) REFERENCES socia(id));
CREATE TABLE consulta (
  id int NOT NULL AUTO_INCREMENT,
  data date NOT NULL,
  hora time NOT NULL,
  servico varchar(100) NOT NULL,
  valor float NOT NULL,
  estoque tinyint NOT NULL,
  paciente_nome varchar(100) NOT NULL,
  PRIMARY KEY (id,paciente_nome),
  FOREIGN KEY (paciente_nome) REFERENCES paciente (nome)) ;
CREATE TABLE conteudo (
  id int NOT NULL AUTO_INCREMENT,
  link varchar(400) NOT NULL,
  atendente_id int NOT NULL,
  socia_id int NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (atendente_id) REFERENCES atendente (id),
  FOREIGN KEY (socia_id) REFERENCES socia(id));
CREATE TABLE item (
  id int NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  data_validade date NOT NULL,
  reutilizavel char(1) NOT NULL,
  valor float NOT NULL,
  Quantidade int NOT NULL,
  PRIMARY KEY (id));
CREATE TABLE despesas (
  id int NOT NULL AUTO_INCREMENT,
  valor_despesa float NOT NULL,
  descricao TEXT NOT NULL,
  PRIMARY KEY (id));
CREATE TABLE item_has_consulta (
  id int NOT NULL AUTO_INCREMENT,
  item_id int NOT NULL,
  consulta_id int NOT NULL,
  PRIMARY KEY (id,consulta_id),
  FOREIGN KEY (item_id) REFERENCES item (id),
  FOREIGN KEY (consulta_id) REFERENCES consulta(id));
CREATE TABLE exames (
  id int NOT NULL AUTO_INCREMENT,
  link varchar(400) NOT NULL,
  PRIMARY KEY (`id`));
CREATE TABLE ganhos (
  id int NOT NULL AUTO_INCREMENT,
  valor float NOT NULL,
  consulta_valor int NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (consulta_valor) REFERENCES consulta (valor));
CREATE TABLE faturamento (
  id int NOT NULL AUTO_INCREMENT,
  valor_total int NOT NULL,
  PRIMARY KEY (id));
CREATE TABLE prontuario (
  id int NOT NULL AUTO_INCREMENT,
  diagnostico varchar(500) NOT NULL,
  recomendacoes varchar(500) NOT NULL,
  evolucao varchar(500) NOT NULL,
  consulta_id int NOT NULL,
  exames_id int NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (consulta_id) REFERENCES consulta (id),
  FOREIGN KEY (exames_id) REFERENCES exames(id));
CREATE TABLE receita (
  id int NOT NULL AUTO_INCREMENT,
  descricao text NOT NULL,
  socia_id int NOT NULL,
  consulta_id int NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (socia_id) REFERENCES socia (id),
  FOREIGN KEY (consulta_id) REFERENCES consulta(id));
CREATE TABLE solicitarconsulta (
  id int NOT NULL AUTO_INCREMENT,
  paciente_id int NOT NULL,
  data date NOT NULL,
  hora time NOT NULL,
  servico varchar(100) NOT NULL,
  data_aprov date DEFAULT NULL,
  situacao tinyint NOT NULL,
  socia_id int DEFAULT NULL,
  atendente_id int DEFAULT NULL,
  PRIMARY KEY (id,paciente_id),
  FOREIGN KEY (paciente_id) REFERENCES paciente (id),
  FOREIGN KEY (socia_id) REFERENCES socia(id),
  FOREIGN KEY (atendente_id) REFERENCES atendente(id));

INSERT INTO paciente VALUES (20, 'Pedro Rosa Cauduro', 'oi@oi', '74574f42cc1bdf7b79e0476facf32fe0', 'gfgfdg', 96, '2023-12-21', 2147483647, 425);
INSERT INTO socia VALUES (5, 'Pedro Rosa Cauduro', 'ADM@ADM', '6fb4f22992a0d164b77267fde5477248', 'SMP', 'É');
  
INSERT INTO solicitarconsulta VALUES (2, 19, '2023-12-01', '19:35:00', 'poder', '2023-12-01', 1, 1, NULL);
INSERT INTO solicitarconsulta VALUES (3, 19, '2023-12-01', '19:35:00', 'poder', '2023-12-02', 1, 5, NULL);
INSERT INTO solicitarconsulta VALUES (5, 19, '2023-12-07', '20:26:00', 'socorroo', '2023-12-01', 0, NULL, NULL);
INSERT INTO solicitarconsulta VALUES (6, 19, '2023-12-07', '20:26:00', 'sos', '2023-12-02', 1, 5, NULL);
INSERT INTO solicitarconsulta VALUES (7, 19, '2023-12-07', '20:26:00', 'teste13', '2023-12-01', 1, 1, NULL);
INSERT INTO solicitarconsulta VALUES (8, 19, '2023-12-02', '22:34:00', 'poder', NULL, 0, NULL, NULL);
INSERT INTO solicitarconsulta VALUES (9, 19, '2023-12-02', '22:34:00', 'poder', NULL, 0, NULL, NULL);
INSERT INTO solicitarconsulta VALUES (10, 19, '2023-12-22', '22:38:00', 'sos', NULL, 0, NULL, NULL);
INSERT INTO solicitarconsulta VALUES (11, 19, '2023-12-02', '22:37:00', 'poder', NULL, 0, NULL, NULL);

INSERT INTO consulta VALUES (1, '2023-12-09', '22:11:00', 'poder', 547, 0, '');
INSERT INTO consulta VALUES (2, '2023-12-13', '22:38:00', 'sos', 547, 0, '');
INSERT INTO consulta VALUES (3, '2023-12-09', '17:23:00', 'socorroo', 547, 0, '');
INSERT INTO consulta VALUES (4, '2023-12-08', '17:30:00', 'socorroo', 547, 0, 'Artur Negro');
INSERT INTO consulta VALUES (5, '2023-12-01', '17:36:00', 'socorroo', 547, 1, 'Artur Negro');
INSERT INTO consulta VALUES (6, '2023-12-07', '18:39:00', 'poder', 547, 1, 'Pedro Rosa Cauduro');
INSERT INTO consulta VALUES (7, '2023-12-15', '18:40:00', 'teste13', 547, 0, 'Pedro Rosa Cauduro');
INSERT INTO consulta VALUES (8, '2023-12-08', '18:50:00', 'teste13', 547, 0, 'Pedro Rosa Cauduro');
INSERT INTO consulta VALUES (9, '2023-12-07', '18:49:00', 'teste13', 547, 0, 'Pedro Rosa Cauduro');
INSERT INTO consulta VALUES (10, '2023-12-08', '18:56:00', 'teste13', 547, 0, 'Pedro Rosa Cauduro');
INSERT INTO consulta VALUES (11, '2023-11-29', '18:56:00', 'teste13', 547, 0, 'Pedro Rosa Cauduro');
INSERT INTO consulta VALUES (12, '2023-12-01', '18:56:00', 'teste13', 547, 0, 'Pedro Rosa Cauduro');
INSERT INTO consulta VALUES (13, '2023-12-01', '18:56:00', 'teste13', 800, 0, 'Pedro Rosa Cauduro');
INSERT INTO consulta VALUES (14, '2023-12-07', '11:50:00', 'socorroo', 800, 1, 'Pedro Rosa Cauduro');

INSERT INTO despesas VALUES (1, 500, '');
INSERT INTO despesas VALUES (2, 850, 'comprei 70393 gazes \r\n');
INSERT INTO despesas VALUES (3, 850, 'sla');
INSERT INTO despesas VALUES (4, 547, '85');
INSERT INTO despesas VALUES (5, 89, 'oi');
INSERT INTO despesas VALUES (6, 250, 'comprei');

INSERT INTO ganhos VALUES (1, 547, 547);
INSERT INTO ganhos VALUES (2, 547, 547);
INSERT INTO ganhos VALUES (3, 547, 547);
INSERT INTO ganhos VALUES (4, 547, 547);
INSERT INTO ganhos VALUES (5, 547, 547);
INSERT INTO ganhos VALUES (6, 800, 800);
INSERT INTO ganhos VALUES (7, 800, 800);

INSERT INTO item  VALUES (1, 'soro', '2024-01-06', 's', 850, 18);
INSERT INTO item  VALUES (2, 'soro', '2023-12-29', '', 250, 180);
INSERT INTO item  VALUES (27, 'soro', '2023-12-22', '', 250, 180);
INSERT INTO item  VALUES (26, 'soro', '2023-12-22', '', 250, 180);