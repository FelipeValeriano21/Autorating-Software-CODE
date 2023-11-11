-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/11/2023 às 21:02
-- Versão do servidor: 8.0.32
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `autorating`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa_contratante`
--

CREATE TABLE `empresa_contratante` (
  `idEmpresa_Contratante` int NOT NULL,
  `Empresa_Nome` varchar(25) DEFAULT NULL,
  `Empresa_Email` varchar(35) DEFAULT NULL,
  `Empresa_Telefone` varchar(15) DEFAULT NULL,
  `Empresa_Dono` varchar(25) DEFAULT NULL,
  `Empresa_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `empresa_contratante`
--

INSERT INTO `empresa_contratante` (`idEmpresa_Contratante`, `Empresa_Nome`, `Empresa_Email`, `Empresa_Telefone`, `Empresa_Dono`, `Empresa_status`) VALUES
(7, 'Samsung, Ltd.', 'contact@samsung.com', '(55)11978901234', 'Kinam Kim', 1),
(8, 'Toyota Motor', 'contact@toyota.com', '(55)11989012345', 'Akio Toyoda', 1),
(9, 'Nestle S.A.', 'contact@nestle.com', '(55)11990123456', 'Ulf Mark Schneider', 1),
(10, 'Unilever PLC', 'contact@unilever.com', '(55)11901234567', 'Alan Reis', 1),
(11, 'Siemens AG', 'contact@siemens.com', '(55)11912345678', 'Roland Busch', 1),
(12, 'Volkswagen AG', 'contact@volkswagen.com', '(55)11923456789', 'Herbert Diess', 1),
(13, 'Johnson & Johnson', 'contact@jnj.com', '(55)11934567890', 'Alex Gorsky', 1),
(14, 'Procter & Gamble Co.', 'contact@pg.com', '(55)11945678901', 'David S. Taylor', 1),
(15, 'Pfizer Inc.', 'contact@pfizer.com', '(55)11956789012', 'Albert Bourla', 1),
(16, 'Apple Inc.', 'contact@apple.com', '(55)11912345678', 'Tim Cook', 1),
(17, 'Google LLC', 'contact@google.com', '(55)11923456789', 'Sundar Pichai', 1),
(18, 'Microsoft Corporation', 'contact@microsoft.com', '(55)11934567890', 'Satya Nadella', 1),
(19, 'Amazon.com Inc.', 'contact@amazon.com', '(55)11945678901', 'Andy Jassy', 1),
(20, 'Facebook, Inc.', 'contact@facebook.com', '(55)11956789012', 'Mark Zuckerberg', 1),
(21, 'Tesla, Inc.', 'contact@tesla.com', '(55)11967890123', 'Elon Musk', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_adm`
--

CREATE TABLE `tb_adm` (
  `adm_id` int NOT NULL,
  `adm_email` varchar(50) NOT NULL,
  `adm_senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_adm`
--

INSERT INTO `tb_adm` (`adm_id`, `adm_email`, `adm_senha`) VALUES
(1, 'Tecnotribe@fatec.sp.gov.br', '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `idTB_Categoria` int NOT NULL,
  `Categoria_Nome` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_categoria`
--

INSERT INTO `tb_categoria` (`idTB_Categoria`, `Categoria_Nome`) VALUES
(1, 'Banco de dados relacional'),
(2, 'SCRUM'),
(3, 'JAVASCRIPT'),
(4, 'Estatistica Aplicada'),
(5, 'PHP'),
(6, 'Algebra linear'),
(7, 'Front-end'),
(8, 'Desenvolvimento Humano '),
(9, 'Analise de dados'),
(10, 'Laboratório de Desenvolvimento Web'),
(11, 'marketing digital'),
(12, 'Infraestrutura'),
(13, 'marketing e vendas'),
(15, 'Desenvolvimento Mobile I'),
(18, 'Lingua Inglesa'),
(19, 'Jornalismo Esportivo'),
(20, 'Node.js'),
(21, 'Lingua Espanhola'),
(22, 'Redes de Computadores'),
(23, 'Engenharia de Software'),
(24, 'Inteligência Artificial'),
(25, 'Segurança da Informação'),
(26, 'Sistemas Operacionais'),
(27, 'Programação Orientada a Objetos'),
(28, 'Big Data'),
(29, 'Desenvolvimento Web'),
(30, 'Cloud Computing'),
(31, 'Gestão de Projetos'),
(32, 'Marketing Digital Avançado'),
(33, 'Finanças Corporativas'),
(34, 'Contabilidade Avançada'),
(35, 'Economia Internacional'),
(36, 'Gestão de Recursos Humanos'),
(37, 'Gestão de Qualidade'),
(38, 'Estratégia de Negócios'),
(39, 'Gestão de Operações'),
(40, 'Design de Interface de Usuário'),
(41, 'Gestão de Dados'),
(42, 'Desenvolvimento Mobile II'),
(43, 'Língua Espanhola'),
(44, 'Direito Empresarial'),
(45, 'Bioquímica'),
(46, 'História da Arte'),
(47, 'Filosofia Contemporânea'),
(48, 'Literatura Mundial'),
(49, 'Música Clássica'),
(50, 'Gestão de Projetos de TI');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_colaborador`
--

CREATE TABLE `tb_colaborador` (
  `idTB_Colaborador` int NOT NULL,
  `TB_Gestor_idTB_Gestor` int NOT NULL,
  `Colaborador_Nome` varchar(30) DEFAULT NULL,
  `Colaborador_CPF` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Colaborador_Email` varchar(35) DEFAULT NULL,
  `Colaborador_Nascimento` date DEFAULT NULL,
  `Colaborador_Telefone` varchar(15) DEFAULT NULL,
  `Colaborador_Adimissao` date DEFAULT NULL,
  `Colaborador_Senha` varchar(25) DEFAULT NULL,
  `Colaborador_Status` tinyint(1) DEFAULT NULL,
  `Colaborador_Foto` varchar(255) DEFAULT NULL,
  `Colaborador_Funcao` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_colaborador`
--

INSERT INTO `tb_colaborador` (`idTB_Colaborador`, `TB_Gestor_idTB_Gestor`, `Colaborador_Nome`, `Colaborador_CPF`, `Colaborador_Email`, `Colaborador_Nascimento`, `Colaborador_Telefone`, `Colaborador_Adimissao`, `Colaborador_Senha`, `Colaborador_Status`, `Colaborador_Foto`, `Colaborador_Funcao`) VALUES
(51, 36, 'Rogerio Martins Costa', '469.836.710-74', 'Rogerio_costa@gmail.com', '1990-12-06', '(55)11962569844', '2023-03-07', 'Rogerio', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/469.836.710-74.jpg', 'Front-End Sênior'),
(52, 36, 'Camila Castro Lima', '665.307.920-15', 'CamilaCastro@gmail.com', '1998-10-08', '(55)11963214566', '2023-11-01', 'camila', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/665.307.920-15.png', 'Estagiaria');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_colaborador_associa_tb_questionario`
--

CREATE TABLE `tb_colaborador_associa_tb_questionario` (
  `TB_Colaborador_idTB_Colaborador` int NOT NULL,
  `TB_Questionario_idTB_Questionario` int NOT NULL,
  `Respostas_Certas` int DEFAULT NULL,
  `Respostas_Erradas` int DEFAULT NULL,
  `Resultado_Final` float DEFAULT NULL,
  `duracao` time DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_colaborador_associa_tb_questionario`
--

INSERT INTO `tb_colaborador_associa_tb_questionario` (`TB_Colaborador_idTB_Colaborador`, `TB_Questionario_idTB_Questionario`, `Respostas_Certas`, `Respostas_Erradas`, `Resultado_Final`, `duracao`, `status`) VALUES
(51, 75, 4, 1, 80, NULL, 0),
(51, 76, 5, 0, 100, NULL, 0),
(52, 76, 3, 2, 60, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_departamento`
--

CREATE TABLE `tb_departamento` (
  `idTB_Departamento` int NOT NULL,
  `Departamento_Nome` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_departamento`
--

INSERT INTO `tb_departamento` (`idTB_Departamento`, `Departamento_Nome`) VALUES
(1, 'Vendas'),
(2, 'Recursos Humanos'),
(3, 'TI'),
(4, 'Marketing'),
(5, 'Contabilidade'),
(6, 'Logística'),
(7, 'Jurídico'),
(8, 'Desenvolvimento'),
(9, 'Suporte Técnico'),
(10, 'Financeiro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_gestor`
--

CREATE TABLE `tb_gestor` (
  `idTB_Gestor` int NOT NULL,
  `TB_Departamento_idTB_Departamento` int NOT NULL,
  `Empresa_Contratante_idEmpresa_Contratante` int NOT NULL,
  `Gestor_Nome` varchar(30) DEFAULT NULL,
  `Gestor_CPF` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Gestor_Email` varchar(35) DEFAULT NULL,
  `Gestor_Nascimento` date DEFAULT NULL,
  `Gestor_Telefone` varchar(15) DEFAULT NULL,
  `Gestor_Adimissao` date DEFAULT NULL,
  `Gestor_Senha` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Gestor_Status` tinyint(1) DEFAULT NULL,
  `Gestor_Foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_gestor`
--

INSERT INTO `tb_gestor` (`idTB_Gestor`, `TB_Departamento_idTB_Departamento`, `Empresa_Contratante_idEmpresa_Contratante`, `Gestor_Nome`, `Gestor_CPF`, `Gestor_Email`, `Gestor_Nascimento`, `Gestor_Telefone`, `Gestor_Adimissao`, `Gestor_Senha`, `Gestor_Status`, `Gestor_Foto`) VALUES
(1, 1, 7, 'João da Silva', '330.029.850-40', 'joao.silva@email.com', '1990-05-15', '(55)11912345678', '2023-11-11', 'senha123', 1, ''),
(2, 2, 8, 'Maria dos Santos', '742.474.930-78', 'maria.santos@email.com', '1985-08-20', '(55)11923456789', '2023-11-11', 'senha456', 1, ''),
(3, 3, 9, 'Carlos Oliveira', '345.678.901-23', 'carlos.oliveira@email.com', '1982-03-10', '(55)11934567890', '2023-11-11', 'senha789', 1, ''),
(4, 4, 10, 'Ana Pereira', '456.789.012-34', 'ana.pereira@email.com', '1987-12-05', '(55)11945678901', '2023-11-11', 'senha123', 1, ''),
(5, 5, 11, 'Pedro Gonçalves', '567.890.123-45', 'pedro.goncalves@email.com', '1995-02-18', '(55)11956789012', '2023-11-11', 'senha456', 1, ''),
(6, 6, 12, 'Sofia Mendes', '678.901.234-56', 'sofia.mendes@email.com', '1988-07-30', '(55)11967890123', '2023-11-11', 'senha789', 1, ''),
(7, 7, 13, 'Lucas Ferreira', '789.012.345-67', 'lucas.ferreira@email.com', '1992-09-22', '(55)11978901234', '2023-11-11', 'senha123', 1, ''),
(8, 8, 14, 'Larissa Silva', '890.123.456-78', 'larissa.silva@email.com', '1998-11-07', '(55)11989012345', '2023-11-11', 'senha456', 1, ''),
(9, 9, 15, 'Rafael Pereira', '901.234.567-89', 'rafael.pereira@email.com', '1983-04-14', '(55)11990123456', '2023-11-11', 'senha789', 1, ''),
(10, 10, 16, 'Mariana Santos', '012.345.678-90', 'mariana.santos@email.com', '1986-06-29', '(55)11901234567', '2023-11-11', 'senha123', 1, ''),
(11, 1, 17, 'Rodrigo Oliveira', '123.456.789-01', 'rodrigo.oliveira@email.com', '1991-01-03', '(55)11912345678', '2023-11-11', 'senha456', 1, ''),
(12, 2, 18, 'Camila Gonçalves', '234.567.890-12', 'camila.goncalves@email.com', '1984-12-27', '(55)11923456789', '2023-11-11', 'senha789', 1, ''),
(13, 3, 19, 'Renato Pereira', '842.139.780-01', 'renato.pereira@email.com', '1989-10-25', '(55)11934567890', '2023-11-11', 'senha123', 1, ''),
(14, 4, 20, 'Carolina Mendes', '270.765.330-65', 'carolina.mendes@email.com', '1994-04-09', '(55)11945678901', '2023-11-11', 'senha456', 1, ''),
(36, 3, 20, 'Felipe Valeriano dos Reis', '309.759.040-43', 'FelipeValeriano@gmail.com', '2003-10-09', '(11)96258963222', '2021-01-20', 'felipereis', 1, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_questionario`
--

CREATE TABLE `tb_questionario` (
  `idTB_Questionario` int NOT NULL,
  `TB_Gestor_idTB_Gestor` int NOT NULL,
  `Questionario_Descricao` varchar(255) DEFAULT NULL,
  `Questionario_Inicio` datetime DEFAULT NULL,
  `Questionario_Fim` datetime DEFAULT NULL,
  `Questionario_Qta_Perguntas` int DEFAULT NULL,
  `Questionario_Status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_questionario`
--

INSERT INTO `tb_questionario` (`idTB_Questionario`, `TB_Gestor_idTB_Gestor`, `Questionario_Descricao`, `Questionario_Inicio`, `Questionario_Fim`, `Questionario_Qta_Perguntas`, `Questionario_Status`) VALUES
(75, 36, 'Questionario de Front-end', '2023-11-11 00:00:00', '2023-11-12 00:00:00', 5, 1),
(76, 36, 'Teste sobre Javascript', '2023-11-11 00:00:00', '2023-11-11 00:00:00', 5, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_questionario_has_tb_categoria`
--

CREATE TABLE `tb_questionario_has_tb_categoria` (
  `TB_Questionario_idTB_Questionario` int NOT NULL,
  `TB_Categoria_idTB_Categoria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_questionario_has_tb_categoria`
--

INSERT INTO `tb_questionario_has_tb_categoria` (`TB_Questionario_idTB_Questionario`, `TB_Categoria_idTB_Categoria`) VALUES
(75, 7),
(76, 3),
(76, 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_questoes`
--

CREATE TABLE `tb_questoes` (
  `idTB_Questoes` int NOT NULL,
  `TB_Gestor_idTB_Gestor` int NOT NULL,
  `TB_Tipo_Questao_idTB_Tipo_Questao` int NOT NULL,
  `TB_Categoria_idTB_Categoria` int NOT NULL,
  `Questoes_Pergunta` varchar(255) DEFAULT NULL,
  `Questoes_A` varchar(255) DEFAULT NULL,
  `Questoes_B` varchar(255) DEFAULT NULL,
  `Questoes_C` varchar(255) DEFAULT NULL,
  `Questoes_D` varchar(255) DEFAULT NULL,
  `Questao_Correta` varchar(255) DEFAULT NULL,
  `Questao_Data` date DEFAULT NULL,
  `Questao_Status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_questoes`
--

INSERT INTO `tb_questoes` (`idTB_Questoes`, `TB_Gestor_idTB_Gestor`, `TB_Tipo_Questao_idTB_Tipo_Questao`, `TB_Categoria_idTB_Categoria`, `Questoes_Pergunta`, `Questoes_A`, `Questoes_B`, `Questoes_C`, `Questoes_D`, `Questao_Correta`, `Questao_Data`, `Questao_Status`) VALUES
(55, 36, 1, 7, 'Qual das seguintes linguagens é mais comumente usada para o desenvolvimento de Front-End?', 'JavaScript', 'Python', 'PHP', 'Ruby', 'A', '2023-11-11', 1),
(56, 36, 1, 7, 'Qual das seguintes bibliotecas ou frameworks é amplamente utilizado no desenvolvimento Front-End para criar interfaces de usuário interativas?', 'React', 'Angular', 'Django', 'Express.js', 'A', '2023-11-11', 1),
(57, 36, 1, 7, 'Qual dos seguintes formatos é comumente usado para definir a estrutura e o estilo de uma página web?', 'XML', 'HTML', 'JSON', 'SQL', 'B', '2023-11-11', 1),
(58, 36, 1, 7, 'Qual é a função principal do CSS (Cascading Style Sheets) no desenvolvimento Front-End?', 'Manipular dados no lado do servidor', 'Definir a aparência e o layout de elementos HTML', 'Criar rotas e controladores', 'Realizar cálculos matemáticos complexos', 'D', '2023-11-11', 1),
(59, 36, 1, 7, 'Qual das seguintes técnicas é usada para tornar um site responsivo, ajustando o layout de acordo com o tamanho da tela do dispositivo?', 'Media queries', 'Loops em JavaScript', 'Banco de dados SQL', 'Redes neurais artificiais', 'A', '2023-11-11', 1),
(60, 36, 1, 3, 'Qual método JavaScript é usado para adicionar um elemento ao final de um array?', 'push()', 'pop()', 'shift()', 'unshift()', 'A', '2023-11-11', 1),
(61, 36, 1, 3, 'O que é o DOM (Document Object Model) e qual é o seu papel no desenvolvimento web front-end?', 'O DOM é uma linguagem de programação usada no desenvolvimento web e é responsável pela estilização de páginas.', 'O DOM é uma linguagem de marcação utilizada para criar estrutura em páginas web, como o HTML.', ' O DOM é uma técnica de segurança utilizada para proteger sites contra ataques cibernéticos.', ' O DOM é uma representação hierárquica em forma de árvore de uma página web e é utilizado no desenvolvimento web front-end para acessar e manipular elementos HTML, permitindo a interatividade e atualização dinâmica de páginas.', 'D', '2023-11-11', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tipo_questao`
--

CREATE TABLE `tb_tipo_questao` (
  `idTB_Tipo_Questao` int NOT NULL,
  `Tipo_Nome` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_tipo_questao`
--

INSERT INTO `tb_tipo_questao` (`idTB_Tipo_Questao`, `Tipo_Nome`) VALUES
(1, 'Técnica'),
(2, 'Comportamental');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `empresa_contratante`
--
ALTER TABLE `empresa_contratante`
  ADD PRIMARY KEY (`idEmpresa_Contratante`);

--
-- Índices de tabela `tb_adm`
--
ALTER TABLE `tb_adm`
  ADD PRIMARY KEY (`adm_id`);

--
-- Índices de tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`idTB_Categoria`);

--
-- Índices de tabela `tb_colaborador`
--
ALTER TABLE `tb_colaborador`
  ADD PRIMARY KEY (`idTB_Colaborador`),
  ADD KEY `TB_Colaborador_FKIndex1` (`TB_Gestor_idTB_Gestor`),
  ADD KEY `IFK_Rel_22` (`TB_Gestor_idTB_Gestor`);

--
-- Índices de tabela `tb_colaborador_associa_tb_questionario`
--
ALTER TABLE `tb_colaborador_associa_tb_questionario`
  ADD PRIMARY KEY (`TB_Colaborador_idTB_Colaborador`,`TB_Questionario_idTB_Questionario`),
  ADD KEY `TB_Colaborador_has_TB_Questionario_FKIndex1` (`TB_Colaborador_idTB_Colaborador`),
  ADD KEY `TB_Colaborador_has_TB_Questionario_FKIndex2` (`TB_Questionario_idTB_Questionario`),
  ADD KEY `IFK_Rel_33` (`TB_Colaborador_idTB_Colaborador`),
  ADD KEY `IFK_Rel_34` (`TB_Questionario_idTB_Questionario`);

--
-- Índices de tabela `tb_departamento`
--
ALTER TABLE `tb_departamento`
  ADD PRIMARY KEY (`idTB_Departamento`);

--
-- Índices de tabela `tb_gestor`
--
ALTER TABLE `tb_gestor`
  ADD PRIMARY KEY (`idTB_Gestor`),
  ADD KEY `TB_Gestor_FKIndex1` (`Empresa_Contratante_idEmpresa_Contratante`),
  ADD KEY `TB_Gestor_FKIndex2` (`TB_Departamento_idTB_Departamento`),
  ADD KEY `IFK_Rel_20` (`Empresa_Contratante_idEmpresa_Contratante`),
  ADD KEY `IFK_Rel_21` (`TB_Departamento_idTB_Departamento`);

--
-- Índices de tabela `tb_questionario`
--
ALTER TABLE `tb_questionario`
  ADD PRIMARY KEY (`idTB_Questionario`),
  ADD KEY `TB_Questionario_FKIndex1` (`TB_Gestor_idTB_Gestor`),
  ADD KEY `IFK_Rel_09` (`TB_Gestor_idTB_Gestor`);

--
-- Índices de tabela `tb_questionario_has_tb_categoria`
--
ALTER TABLE `tb_questionario_has_tb_categoria`
  ADD PRIMARY KEY (`TB_Questionario_idTB_Questionario`,`TB_Categoria_idTB_Categoria`),
  ADD KEY `TB_Questionario_has_TB_Categoria_FKIndex1` (`TB_Questionario_idTB_Questionario`),
  ADD KEY `TB_Questionario_has_TB_Categoria_FKIndex2` (`TB_Categoria_idTB_Categoria`),
  ADD KEY `IFK_Rel_10` (`TB_Questionario_idTB_Questionario`),
  ADD KEY `IFK_Rel_11` (`TB_Categoria_idTB_Categoria`);

--
-- Índices de tabela `tb_questoes`
--
ALTER TABLE `tb_questoes`
  ADD PRIMARY KEY (`idTB_Questoes`),
  ADD KEY `TB_Questoes_FKIndex1` (`TB_Categoria_idTB_Categoria`),
  ADD KEY `TB_Questoes_FKIndex2` (`TB_Tipo_Questao_idTB_Tipo_Questao`),
  ADD KEY `TB_Questoes_FKIndex3` (`TB_Gestor_idTB_Gestor`),
  ADD KEY `IFK_Rel_23` (`TB_Categoria_idTB_Categoria`),
  ADD KEY `IFK_Rel_24` (`TB_Tipo_Questao_idTB_Tipo_Questao`),
  ADD KEY `IFK_Rel_25` (`TB_Gestor_idTB_Gestor`);

--
-- Índices de tabela `tb_tipo_questao`
--
ALTER TABLE `tb_tipo_questao`
  ADD PRIMARY KEY (`idTB_Tipo_Questao`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa_contratante`
--
ALTER TABLE `empresa_contratante`
  MODIFY `idEmpresa_Contratante` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tb_adm`
--
ALTER TABLE `tb_adm`
  MODIFY `adm_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `idTB_Categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `tb_colaborador`
--
ALTER TABLE `tb_colaborador`
  MODIFY `idTB_Colaborador` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `tb_departamento`
--
ALTER TABLE `tb_departamento`
  MODIFY `idTB_Departamento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_gestor`
--
ALTER TABLE `tb_gestor`
  MODIFY `idTB_Gestor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `tb_questionario`
--
ALTER TABLE `tb_questionario`
  MODIFY `idTB_Questionario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `tb_questoes`
--
ALTER TABLE `tb_questoes`
  MODIFY `idTB_Questoes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `tb_tipo_questao`
--
ALTER TABLE `tb_tipo_questao`
  MODIFY `idTB_Tipo_Questao` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_colaborador`
--
ALTER TABLE `tb_colaborador`
  ADD CONSTRAINT `tb_colaborador_ibfk_1` FOREIGN KEY (`TB_Gestor_idTB_Gestor`) REFERENCES `tb_gestor` (`idTB_Gestor`);

--
-- Restrições para tabelas `tb_colaborador_associa_tb_questionario`
--
ALTER TABLE `tb_colaborador_associa_tb_questionario`
  ADD CONSTRAINT `tb_colaborador_associa_tb_questionario_ibfk_1` FOREIGN KEY (`TB_Colaborador_idTB_Colaborador`) REFERENCES `tb_colaborador` (`idTB_Colaborador`),
  ADD CONSTRAINT `tb_colaborador_associa_tb_questionario_ibfk_2` FOREIGN KEY (`TB_Questionario_idTB_Questionario`) REFERENCES `tb_questionario` (`idTB_Questionario`);

--
-- Restrições para tabelas `tb_gestor`
--
ALTER TABLE `tb_gestor`
  ADD CONSTRAINT `tb_gestor_ibfk_1` FOREIGN KEY (`Empresa_Contratante_idEmpresa_Contratante`) REFERENCES `empresa_contratante` (`idEmpresa_Contratante`),
  ADD CONSTRAINT `tb_gestor_ibfk_2` FOREIGN KEY (`TB_Departamento_idTB_Departamento`) REFERENCES `tb_departamento` (`idTB_Departamento`);

--
-- Restrições para tabelas `tb_questionario`
--
ALTER TABLE `tb_questionario`
  ADD CONSTRAINT `tb_questionario_ibfk_1` FOREIGN KEY (`TB_Gestor_idTB_Gestor`) REFERENCES `tb_gestor` (`idTB_Gestor`);

--
-- Restrições para tabelas `tb_questionario_has_tb_categoria`
--
ALTER TABLE `tb_questionario_has_tb_categoria`
  ADD CONSTRAINT `tb_questionario_has_tb_categoria_ibfk_1` FOREIGN KEY (`TB_Questionario_idTB_Questionario`) REFERENCES `tb_questionario` (`idTB_Questionario`),
  ADD CONSTRAINT `tb_questionario_has_tb_categoria_ibfk_2` FOREIGN KEY (`TB_Categoria_idTB_Categoria`) REFERENCES `tb_categoria` (`idTB_Categoria`);

--
-- Restrições para tabelas `tb_questoes`
--
ALTER TABLE `tb_questoes`
  ADD CONSTRAINT `tb_questoes_ibfk_1` FOREIGN KEY (`TB_Categoria_idTB_Categoria`) REFERENCES `tb_categoria` (`idTB_Categoria`),
  ADD CONSTRAINT `tb_questoes_ibfk_2` FOREIGN KEY (`TB_Tipo_Questao_idTB_Tipo_Questao`) REFERENCES `tb_tipo_questao` (`idTB_Tipo_Questao`),
  ADD CONSTRAINT `tb_questoes_ibfk_3` FOREIGN KEY (`TB_Gestor_idTB_Gestor`) REFERENCES `tb_gestor` (`idTB_Gestor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
