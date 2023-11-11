-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/11/2023 às 19:38
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
(1, 'Amazon Brasilia ', 'Amazon@gmail.com ', '11236985698 ', 'Jeff ', 1),
(2, 'Americanas', 'Americanas@gmail.com', '11962549632', 'Jorge Paulo ', 1),
(5, 'Pão de Açucar ', 'Abilio@gmail.com', '5511963214569', 'Abilio Diniz', 1),
(12, 'Microsoft', 'Bill@gmail.com', '11963215698', 'Bill Gates', 1),
(13, 'Magazine Luiza', 'Magalu@gmail.com', '(55)11962569856', 'Luiza Trajano', 1),
(15, 'TECNOTRIBE', 'felipevaleriano@gmail.com', '11962849591', 'FELIPE', 1),
(18, 'Bandeirantes TV', 'Luciana_Gimenez@gmail.com', '551196321569', 'Luciana Gimenez', 1),
(22, 'aa', 'felipevalerianodosreis@gmail.com', '11962849591', 'aaaa', 0),
(23, 'Igor\'s Ecommerce', 'IgorSilveraFerraz@gmail.com', '(55)11965845963', 'Igor Silveira', 1),
(24, 'DSADSA', 'DASDAS@GMAIL.COM', '5484545454', 'TESTE', 0),
(25, 'ETEC JA', 'felipevalerianodosreis@gmail.com', '(55)45454545454', 'Felipe Valeriano dos Reis', 0);

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
(21, 'Lingua Espanhola');

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
(1, 1, 'Felipe Valeriano dos Reis', '525.412.968-94', 'valerianodosreis@gmail.com', '2003-10-07', '545445454545454', '2023-10-11', '123', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/525.412.968-94.jpg', 'back-end senior'),
(2, 1, 'Julia Gimenez Silva', '162.664.210-97', 'JuliaSilva@hotmail.com', '2005-12-05', '11968959632', '2023-10-11', 'novasenhadajulia', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/162.664.210-97.jpg', 'Front-end'),
(3, 1, 'Felipe ', '605.567.210-39', 'felipevalerianodosreis@gmail.com', '2023-10-21', '11962849591', '2023-10-27', 'aaa', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/605.567.210-39.png', 'Estagiario'),
(4, 2, 'Lucas Moreto Neves', '336.816.640-99', 'felipe@gmail.com', '2003-05-02', '11963214569', '2023-10-13', 'lucasreis', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/336.816.640-99.jpg', 'Estagiario'),
(5, 1, 'Manuela Ferreira de Souza', '461.762.190-35', 'Ferreira@gmail.com', '1998-12-05', '11968959632', '2023-10-13', 'ferreira', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/461.762.190-35.jpg', 'Data Manager'),
(6, 1, 'teste', '124.781.250-21', 'teste02@gmail.com', '1969-05-09', '454445454554', '2023-10-14', 'novasenhateste', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/124.781.250-21.png', 'Programador JR'),
(7, 2, 'Luana Marques Bonfim', '308.164.180-20', 'LuanaBonfim@hotmail.com', '1980-12-03', '1196321569', '2023-10-14', 'luana', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/308.164.180-20.jpg', 'Tech Recruiter'),
(8, 2, 'Rafaela Queiroz Silva', '367.309.300-20', 'RafaQuesiroz@gmail.com', '2000-10-09', '11963219689', '2023-02-14', 'queiroz', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/367.309.300-20.jpg', 'People Analytics'),
(9, 1, 'Rafaela Mendes Santos', '888.081.100-28', 'RafelaSantos@gmail.com', '2000-02-09', '11963214569', '2023-10-02', '123', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/888.081.100-28.jpg', 'Analista Junior'),
(10, 3, 'Giulia Marsal Rocha', '590.415.430-58', 'GiuliaRocha@gmail.com', '2000-12-02', '(55)11962596321', '2023-08-07', 'giulia', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/590.415.430-58.jpg', 'Analista de SEO'),
(11, 1, 'Igor Guimarães', '881.502.710-66', 'IgorGuimaraes@hotmail.com', '1994-06-05', '(55)11962569321', '2023-10-01', '123', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/881.502.710-66.jpg', 'Infraestrutura'),
(12, 1, 'Felipe Valeriano dos Reis', '992.334.830-02', 'felipevalerianodosreis@gmail.com', '2023-10-25', '11962849591', '2023-10-25', 'aaa', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/992.334.830-02.jpg', 'dasdsa'),
(13, 2, 'Conceição Reis', '665.351.250-92', 'Conceicao@gmail.com', '2003-10-05', '11963214569', '2023-10-25', 'aaaaa', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/665.351.250-92.jpg', 'saddasd'),
(47, 1, 'Ninja Poderoso', '052.591.500-15', 'PoderosoNinja@fatec.com', '2023-10-28', '(55)11963214569', '2023-10-28', 'ninjanovo', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/052.591.500-15.png', 'Analista de Sistema'),
(48, 3, 'Lionel Messi Cuccittini', '242.277.320-69', 'LionelMessi@gmail.com', '1987-06-24', '(55)11962845959', '2023-10-30', 'messinova', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/242.277.320-69.png', 'diretor de marketing'),
(49, 7, 'Livia Andrade', '991.709.870-41', 'LiviaAndrade@gmail.com', '2002-10-05', '(55)11962549655', '2023-08-09', 'Andrade', 1, NULL, 'Contadora Junior'),
(50, 9, 'Matheus Lopes Reis', '366.545.275-93', 'matheusReis@gmail.com', '2003-10-09', '(55)11963254545', '2018-05-11', 'matheuslopes', 1, '../../../COLABORADOR/UPLOADS_IMAGENS/366.545.275-93.png', 'Gerente de RH');

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
(1, 7, 5, 5, 50, '00:00:00', 0),
(1, 9, NULL, NULL, NULL, '00:00:00', 1),
(1, 11, NULL, NULL, NULL, '00:00:00', 1),
(1, 12, NULL, NULL, NULL, '00:00:00', 1),
(1, 13, NULL, NULL, NULL, '00:00:00', 1),
(1, 14, NULL, NULL, NULL, '00:00:00', 1),
(1, 15, NULL, NULL, NULL, '00:00:00', 1),
(1, 16, NULL, NULL, NULL, '00:00:00', 1),
(1, 17, NULL, NULL, NULL, '00:00:00', 1),
(1, 19, NULL, NULL, NULL, '00:00:00', 1),
(1, 20, NULL, NULL, NULL, '00:00:00', 1),
(1, 21, NULL, NULL, NULL, '00:00:00', 1),
(1, 22, NULL, NULL, NULL, '00:00:00', 1),
(1, 23, NULL, NULL, NULL, '00:00:00', 1),
(1, 25, NULL, NULL, NULL, '00:00:00', 1),
(1, 26, NULL, NULL, NULL, '00:00:00', 1),
(1, 27, NULL, NULL, NULL, '00:00:00', 1),
(1, 28, NULL, NULL, NULL, '00:00:00', 1),
(1, 29, NULL, NULL, NULL, '00:00:00', 1),
(1, 30, NULL, NULL, NULL, '00:00:00', 1),
(1, 31, NULL, NULL, NULL, '00:00:00', 1),
(1, 32, NULL, NULL, NULL, '00:00:00', 1),
(1, 33, NULL, NULL, NULL, '00:00:00', 1),
(1, 34, NULL, NULL, NULL, '00:00:00', 1),
(1, 35, NULL, NULL, NULL, '00:00:00', 1),
(1, 37, NULL, NULL, NULL, '00:00:00', 1),
(1, 38, NULL, NULL, NULL, '00:00:00', 1),
(1, 39, 2, 3, 40, '00:00:00', 0),
(1, 41, 1, 4, 20, '00:00:00', 0),
(1, 61, 5, 0, 100, NULL, 0),
(1, 67, 6, 2, 75, NULL, 0),
(1, 68, 6, 9, 40, NULL, 0),
(1, 73, 2, 3, 40, NULL, 0),
(1, 74, NULL, NULL, NULL, NULL, 1),
(2, 24, NULL, NULL, NULL, '00:00:00', 1),
(2, 25, NULL, NULL, NULL, '00:00:00', 1),
(2, 26, NULL, NULL, NULL, '00:00:00', 1),
(2, 27, NULL, NULL, NULL, '00:00:00', 1),
(2, 28, NULL, NULL, NULL, '00:00:00', 1),
(2, 29, NULL, NULL, NULL, '00:00:00', 1),
(2, 30, NULL, NULL, NULL, '00:00:00', 1),
(2, 31, NULL, NULL, NULL, '00:00:00', 1),
(2, 36, NULL, NULL, NULL, '00:00:00', 1),
(2, 37, NULL, NULL, NULL, '00:00:00', 1),
(2, 39, 2, 3, 40, '00:00:00', 0),
(2, 41, 1, 4, 20, '00:00:00', 0),
(2, 55, 10, 0, 100, NULL, 0),
(2, 56, 4, 11, 26.6667, NULL, 0),
(2, 57, 2, 3, 40, NULL, 0),
(2, 59, 2, 3, 40, NULL, 0),
(3, 40, NULL, NULL, NULL, '00:00:00', 1),
(3, 41, NULL, NULL, NULL, '00:00:00', 1),
(3, 42, NULL, NULL, NULL, '00:00:00', 1),
(3, 43, NULL, NULL, NULL, '00:00:00', 1),
(3, 44, NULL, NULL, NULL, '00:00:00', 1),
(4, 45, 2, 3, 40, '00:00:00', 0),
(4, 47, 4, 2, NULL, '00:00:00', 1),
(5, 46, NULL, NULL, NULL, '00:00:00', 1),
(6, 52, NULL, NULL, NULL, NULL, NULL),
(6, 54, 1, 4, 20, NULL, 0),
(6, 60, 3, 7, 30, NULL, 0),
(7, 51, 2, 3, 40, NULL, 0),
(7, 62, 2, 3, 40, NULL, 0),
(8, 51, 1, 4, 20, NULL, 0),
(9, 58, 1, 4, 20, NULL, 0),
(10, 63, 3, 2, 60, NULL, 0),
(11, 64, 3, 2, 60, NULL, 0),
(11, 65, 3, 2, 60, NULL, 0),
(11, 66, 4, 6, 40, NULL, 0),
(47, 69, 3, 2, 60, NULL, 0),
(48, 70, 1, 4, 20, NULL, 0),
(49, 71, 3, 2, 60, NULL, 0),
(50, 72, 0, 5, 0, NULL, 0);

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
(5, 'Contabilidade');

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
(1, 3, 1, 'Felipe Reis', '516.312.956-94', 'FelipeValeriano@fatec.com', '2003-10-09', '11962849591', '2023-09-07', '123', 1, ''),
(2, 2, 1, 'Adriana Santos Silva', '100.897.610-57', 'Adrina@gmail.com', '1990-02-06', '1196325963', '2023-09-07', 'aaa', 1, NULL),
(3, 4, 5, 'Matheus Martins', '282.560.140-32', 'Martins@gmai.com', '2002-05-12', '11962859632', '2023-10-01', 'Lopes', 1, NULL),
(4, 5, 12, 'Guilherme Ramos', '523.021.800-20', 'GuilherRamos@microsoft.com', '1960-10-06', '(55)11963215962', '2023-10-01', 'adm', 1, NULL),
(5, 4, 15, 'Pedro Alvares Cabral', '011.409.430-65', 'PedroAlvares@gmail.com', '1990-05-01', '(55)11962845963', '2023-02-02', '123', 1, ''),
(6, 2, 12, 'Henri Borges', '083.664.490-50', 'BorgesHenrique@gmail.com', '2023-11-01', '11962849591', '2023-11-24', 'Borges', 1, ''),
(7, 5, 18, 'Ricardo Rocha', '778.136.660-38', 'RicardoApenas@gmail.com', '1976-04-01', '(55)11962859632', '2023-07-04', 'Ricardonovasenha', 1, ''),
(8, 4, 12, 'Antonio Carlos', '090.471.440-31', 'AntonioCarlos@gmail,com', '1993-03-05', '(55)11962546987', '2023-07-03', 'Antonionovo', 1, ''),
(9, 2, 23, 'Raul Menezes Ferrari', '419.508.967-06', 'RaulMenezes@fatec.com', '1996-05-09', '(55)1196325963', '2023-07-01', 'raulferraz', 1, ''),
(10, 4, 13, 'aaaa', '077.886.640-81', 'felipevalerianodosreis@gmail.com', '2023-11-11', '11962849591', '2023-11-11', 'aaaa', 1, ''),
(11, 4, 15, 'Felipe Valeriano dos Reis', '858.806.950-42', 'felipevalerianodosreis@gmail.com', '2023-11-11', '11962849591', '2023-11-11', 'aaa', 1, '');

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
(1, 1, 'aaaa', '2023-10-11 00:00:00', '2023-10-18 00:00:00', 9, 1),
(2, 1, 'dasdsa', '2023-10-11 00:00:00', '2023-10-04 00:00:00', 9, 1),
(3, 1, 'dasdsa', '2023-10-11 00:00:00', '2023-10-04 00:00:00', 9, 1),
(4, 1, 'dasdsa', '2023-10-11 00:00:00', '2023-10-04 00:00:00', 9, 1),
(5, 1, 'dasdsa', '2023-10-11 00:00:00', '2023-10-04 00:00:00', 9, 1),
(6, 1, 'dasdsa', '2023-10-11 00:00:00', '2023-10-04 00:00:00', 9, 1),
(7, 1, 'dasdsa', '2023-10-11 00:00:00', '2023-10-04 00:00:00', 9, 1),
(8, 1, 'TESTETETSTEE', '2023-10-11 00:00:00', '2023-11-01 00:00:00', 15, 1),
(9, 1, 'TESTETETSTEE', '2023-10-11 00:00:00', '2023-11-01 00:00:00', 15, 1),
(10, 1, 'Felipe Valeriano ', '2023-10-09 00:00:00', '2023-10-12 00:00:00', 5, 1),
(11, 1, 'Felipe Valeriano ', '2023-10-09 00:00:00', '2023-10-12 00:00:00', 5, 1),
(12, 1, 'FELIPEREIS', '2023-10-04 00:00:00', '2023-10-09 00:00:00', 7, 1),
(13, 1, 'aaaaa', '2023-10-09 00:00:00', '2023-10-09 00:00:00', 10, 1),
(14, 1, 'aaaaa', '2023-10-09 00:00:00', '2023-10-09 00:00:00', 10, 1),
(15, 1, 'aaaaa', '2023-10-09 00:00:00', '2023-10-09 00:00:00', 10, 1),
(16, 1, 'ama', '2023-10-06 00:00:00', '2023-10-06 00:00:00', 5, 1),
(17, 1, 'dasdas', '2023-10-14 00:00:00', '2023-10-14 00:00:00', 15, 1),
(18, 1, 'aaaaa', '2023-09-06 00:00:00', '2023-10-13 00:00:00', 5, 1),
(19, 1, 'dsadasdas', '2023-05-23 00:00:00', '2023-06-08 00:00:00', 15, 1),
(20, 1, 'dadasdsa', '2023-11-08 00:00:00', '2023-11-16 00:00:00', 8, 1),
(21, 1, 'dsadsa', '2023-10-07 00:00:00', '2023-10-01 00:00:00', 5, 1),
(22, 1, 'bolt', '2023-10-03 00:00:00', '2023-10-14 00:00:00', 10, 1),
(23, 1, 'Vai dar certo ', '2023-10-09 00:00:00', '2023-11-08 00:00:00', 9, 1),
(24, 1, 'Esse questionario será necessario fazer', '2023-10-11 00:00:00', '2023-10-25 00:00:00', 10, 1),
(25, 1, 'dasdasd', '2023-10-11 00:00:00', '2023-10-18 00:00:00', 10, 1),
(26, 1, 'dsadsa', '2023-10-13 00:00:00', '2023-10-06 00:00:00', 6, 1),
(27, 1, 'dsadsa', '2023-10-07 00:00:00', '2023-10-03 00:00:00', 15, 1),
(28, 1, 'dsadsa', '2023-10-07 00:00:00', '2023-10-03 00:00:00', 15, 1),
(29, 1, 'dsadsa', '2023-10-07 00:00:00', '2023-10-03 00:00:00', 15, 1),
(30, 1, 'dasdsadsa', '2023-10-12 00:00:00', '2023-10-06 00:00:00', 15, 1),
(31, 1, 'dasdsadsa', '2023-10-12 00:00:00', '2023-10-06 00:00:00', 15, 1),
(32, 1, 'dasdsa', '2023-10-05 00:00:00', '2023-10-27 00:00:00', 10, 1),
(33, 1, 'dsadsad', '2023-10-05 00:00:00', '2023-10-20 00:00:00', 15, 1),
(34, 1, 'dasdsa', '2023-10-14 00:00:00', '2023-10-06 00:00:00', 15, 1),
(35, 1, 'dasdsad', '2023-10-14 00:00:00', '2023-10-06 00:00:00', 8, 1),
(36, 1, 'dsadsada', '2023-10-07 00:00:00', '2023-10-07 00:00:00', 15, 1),
(37, 1, 'dasdsa', '2023-10-13 00:00:00', '2023-10-13 00:00:00', 15, 1),
(38, 1, 'dasdsa', '2023-10-14 00:00:00', '2023-10-07 00:00:00', 15, 1),
(39, 1, 'dsadsadas', '2023-10-13 00:00:00', '2023-10-20 00:00:00', 5, 1),
(40, 1, 'aaaa', '2023-10-11 00:00:00', '2023-10-25 00:00:00', 5, 1),
(41, 1, 'sadasdas', '2023-10-12 00:00:00', '2023-10-19 00:00:00', 5, 1),
(42, 1, 'dasdsadasdas', '2023-10-13 00:00:00', '2023-10-06 00:00:00', 5, 1),
(43, 1, 'dasdasdas', '2023-10-06 00:00:00', '2023-10-07 00:00:00', 8, 1),
(44, 1, 'csasddasads', '2023-10-17 00:00:00', '2023-10-10 00:00:00', 5, 1),
(45, 2, 'Quero que sejam os mais sinceros possíveis, pois isso será imprescindível! Bom teste a todos.', '2023-10-13 00:00:00', '2023-10-27 00:00:00', 6, 1),
(46, 1, 'dsadasdsa', '2023-10-13 00:00:00', '2023-11-03 00:00:00', 5, 1),
(47, 2, 'dsadsadas', '2023-10-21 00:00:00', '2023-10-25 00:00:00', 6, 1),
(48, 2, '\nEspero que esta mensagem os encontre bem. Estamos felizes em anunciar a realização de um teste de Avaliação de Competências como parte de nosso compromisso contínuo em apoiar o desenvolvimento e crescimento de nossa equipe.', '2023-10-14 00:00:00', '2023-10-21 00:00:00', 5, 1),
(49, 2, 'aaaaa', '2023-10-14 00:00:00', '2023-10-14 00:00:00', 5, 1),
(50, 2, '\r\nEspero que esta mensagem os encontre bem. Estamos felizes em anunciar a realização de um teste de Avaliação de Competências como parte de nosso compromisso contínuo em apoiar o desenvolvimento e crescimento de nossa equipe.', '2023-10-14 00:00:00', '2023-10-14 00:00:00', 5, 1),
(51, 2, '\r\nEspero que esta mensagem os encontre bem. Estamos felizes em anunciar a realização de um teste de Avaliação de Competências como parte de nosso compromisso contínuo em apoiar o desenvolvimento e crescimento de nossa equipe.', '2023-10-14 00:00:00', '2023-10-14 00:00:00', 5, 1),
(52, 1, 'Bom dia colaboradores de TI', '2023-10-14 00:00:00', '2023-10-21 00:00:00', 5, 1),
(53, 1, 'Caros amigos de TI', '2023-10-07 00:00:00', '2023-10-28 00:00:00', 5, 1),
(54, 1, 'Caros agora vai dar certo', '2023-10-14 00:00:00', '2023-10-28 00:00:00', 5, 1),
(55, 1, 'Para julia ', '2023-10-14 00:00:00', '2023-10-21 00:00:00', 10, 1),
(56, 1, 'dsadasdasdasdasdas', '2023-10-14 00:00:00', '2023-10-21 00:00:00', 15, 1),
(57, 1, 'JULIAAAAA\r\n', '2023-10-14 00:00:00', '2023-10-21 00:00:00', 5, 1),
(58, 1, 'Colaboradora Rafela, esse questionario é personalizado para você', '2023-10-16 00:00:00', '2023-10-23 00:00:00', 5, 1),
(59, 1, 'Formulario especifico para julia', '2023-10-16 00:00:00', '2023-10-23 00:00:00', 5, 1),
(60, 1, 'Para o teste', '2023-10-21 00:00:00', '2023-10-28 00:00:00', 10, 1),
(61, 1, 'Para o felipe valeriano', '2023-10-22 00:00:00', '2023-10-31 00:00:00', 5, 1),
(62, 2, 'Para luana', '2023-10-22 00:00:00', '2023-10-24 00:00:00', 5, 1),
(63, 3, 'Questionario de marketing digital', '2023-10-23 00:00:00', '2023-10-25 00:00:00', 5, 1),
(64, 1, 'Para o igor', '2023-10-23 00:00:00', '2023-10-28 00:00:00', 5, 1),
(65, 1, 'teste', '2023-10-23 00:00:00', '2023-10-30 00:00:00', 5, 1),
(66, 1, 'aaa', '2023-10-24 00:00:00', '2023-10-25 00:00:00', 10, 1),
(67, 1, 'FELIPE REIS', '2023-10-25 00:00:00', '2023-10-26 00:00:00', 8, 1),
(68, 1, 'dasdsadasddasdsadasdsad', '2023-10-25 00:00:00', '2023-10-28 00:00:00', 15, 1),
(69, 1, 'Para o ninja', '2023-10-28 00:00:00', '2023-10-28 00:00:00', 5, 1),
(70, 3, 'Para o lionel messi, um questionario ', '2023-10-30 00:00:00', '2023-11-30 00:00:00', 5, 1),
(71, 7, 'Para a livia', '2023-11-01 00:00:00', '2023-11-01 00:00:00', 5, 1),
(72, 9, 'Para matheus lopes', '2023-11-11 00:00:00', '2023-11-12 00:00:00', 5, 1),
(73, 1, 'aaadsa felipe', '2023-05-05 00:00:00', '2024-02-05 00:00:00', 5, 1),
(74, 1, 'dsadasda', '2023-11-11 00:00:00', '2023-11-11 00:00:00', 5, 1);

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
(23, 3),
(23, 4),
(24, 3),
(24, 7),
(25, 3),
(25, 4),
(25, 7),
(26, 3),
(26, 4),
(28, 4),
(29, 3),
(29, 4),
(31, 4),
(32, 4),
(32, 7),
(33, 4),
(33, 7),
(34, 4),
(34, 7),
(35, 3),
(35, 7),
(36, 3),
(36, 7),
(37, 4),
(37, 7),
(39, 3),
(39, 4),
(39, 7),
(40, 3),
(40, 4),
(40, 7),
(41, 3),
(41, 4),
(41, 7),
(42, 7),
(43, 3),
(43, 4),
(43, 6),
(43, 7),
(44, 7),
(45, 2),
(45, 4),
(45, 5),
(45, 6),
(45, 7),
(46, 2),
(47, 2),
(47, 4),
(47, 5),
(47, 6),
(47, 7),
(48, 8),
(49, 8),
(50, 8),
(51, 8),
(54, 2),
(54, 3),
(54, 4),
(54, 5),
(54, 6),
(55, 2),
(55, 3),
(55, 4),
(55, 7),
(56, 2),
(56, 3),
(56, 4),
(56, 5),
(56, 6),
(56, 7),
(57, 7),
(58, 4),
(58, 9),
(59, 4),
(59, 9),
(60, 2),
(60, 5),
(60, 9),
(61, 2),
(62, 2),
(62, 3),
(62, 4),
(62, 7),
(63, 11),
(64, 4),
(64, 5),
(64, 9),
(65, 4),
(65, 9),
(66, 2),
(66, 7),
(67, 3),
(67, 4),
(67, 7),
(68, 2),
(68, 3),
(68, 4),
(68, 5),
(68, 6),
(68, 7),
(68, 9),
(69, 3),
(69, 6),
(69, 9),
(70, 13),
(71, 19),
(72, 8),
(72, 9),
(72, 12),
(73, 7),
(74, 2);

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
(1, 1, 1, 4, '(UFT-TO) A nota final para uma disciplina de uma instituição de ensino superior é a média ponderada das notas A, B e C, cujos pesos são 1, 2 e 3, respectivamente. Paulo obteve A = 3,0 e B = 6,0. Quanto ele deve obter em C para que sua nota final seja 6,0?', '7', '8', '9', '6', 'A', '2023-10-27', 0),
(2, 1, 1, 7, 'Qual das seguintes linguagens de marcação é amplamente usada no desenvolvimento Front-End para estruturar o conteúdo de uma página web?', 'JavaScript', 'Python', 'HTML', 'SQL', 'A', '2023-10-27', 1),
(3, 2, 2, 7, 'dsa', 'dasds', 'aaa', 'sdasdsadas', 'A', 'A', '2023-10-11', 1),
(4, 1, 1, 3, 'fasd', 'aa', 'aaa', 'aaa', 'dasdsadsa', 'C', '2023-10-30', 1),
(5, 1, 2, 7, 'dsadsad', 'dasdas', 'dsadas', 'dasdas', 'dsadas', 'A', '2023-10-11', 1),
(6, 1, 2, 7, 'dsadsadsa', 'dsadsa', 'dsadsa', 'dsadsa', 'ddsadsad', 'B', '2023-10-11', 1),
(7, 2, 2, 4, 'dasdas', 'dasdsa', 'adsdas', 'dsa', 'dasdas', 'C', '2023-10-11', 1),
(8, 1, 1, 6, 'aaaaaaaaaaaaaaaaa', 'aaa', 'aaa', 'aaa', 'aaaa', 'C', '2023-10-30', 1),
(9, 1, 2, 7, 'asdasdas', 'saddasd', 'dasdsa', 'dsdas', 'ddasdas', 'A', '2023-10-12', 1),
(10, 1, 2, 7, 'dasdasdas', 'dasdasd', 'dasdasd', 'dasdas', 'dasdasdas', 'A', '2023-10-12', 1),
(11, 2, 1, 4, 'O que é um arranjo ', 'condicional', 'Atributo', 'loop', 'B', 'C', '2023-10-13', 1),
(12, 2, 1, 3, 'O que é um include?', 'LISP', 'inclusão', 'COBOL', 'B', 'A', '2023-10-13', 1),
(13, 2, 1, 2, 'O que é uma sprint?', 'ciclo do projeto', 'dono do projeto', 'o programador', 'o prazo', 'A', '2023-10-13', 1),
(14, 2, 1, 6, 'Qual a sua relação com os colegas de RH', 'Ruim', 'mediana', 'boa', 'excelente', 'C', '2023-10-13', 1),
(15, 1, 1, 2, 'Apenas do gestor 1', 'Apenas do gestor 1', 'Apenas do gestor 1', 'Apenas do gestor 1', 'Apenas do gestor 1', 'A', '2023-10-13', 1),
(16, 1, 1, 2, 'Apenas do gestor 1.2', 'Apenas do gestor 1.2', 'Apenas do gestor 1.2', 'Apenas do gestor 1.2', 'Apenas do gestor 1.2', 'C', '2023-10-13', 1),
(17, 1, 2, 2, 'Apenas do gestor 1.3', 'Apenas do gestor 1.3', 'Apenas do gestor 1.3', 'Apenas do gestor 1.3', 'Apenas do gestor 1.3', 'A', '2023-10-13', 1),
(18, 1, 2, 2, 'Apenas do gestor 1.4', 'Apenas do gestor 1.4', 'Apenas do gestor 1.4', 'Apenas do gestor 1.4', 'Apenas do gestor 1.4', 'B', '2023-10-13', 1),
(19, 1, 2, 2, 'Apenas do gestor 1.5', 'Apenas do gestor 1.5', 'Apenas do gestor 1.5', 'Apenas do gestor 1.5', 'Apenas do gestor 1.5', 'B', '2023-10-13', 1),
(20, 2, 1, 8, 'Qual é o principal objetivo do processo de recrutamento?', 'Treinamento e desenvolvimento de funcionários', 'Manter registros de funcionários', 'Identificar candidatos qualificados para vagas', 'Gerenciar a folha de pagamento', 'A', '2023-10-14', 1),
(21, 2, 1, 8, 'Qual dos seguintes fatores não faz parte do processo de integração de novos funcionários?', 'Treinamento e desenvolvimento', 'Verificação de antecedentes criminais', 'Apresentação da cultura da empresa', 'Configuração de benefícios e folha de pagamento', 'B', '2023-10-14', 1),
(22, 2, 1, 8, 'Qual é o propósito das avaliações de desempenho dos funcionários?', 'Identificar candidatos para promoção', 'Melhorar a comunicação interna', 'Identificar áreas de desenvolvimento e fornecer feedback', 'Configuração de benefícios e folha de pagamento', 'C', '2023-10-14', 1),
(23, 2, 1, 8, 'O que é o \"onboarding\" de funcionários?', 'Um evento de equipe para fortalecer o espírito de grupo', 'O processo de treinamento de novos funcionários', 'Uma prática de demissão de funcionários com baixo desempenh', ' Uma técnica de redução de custos na folha de pagamento', 'B', '2023-10-14', 1),
(24, 2, 1, 8, 'Qual dos seguintes é um componente chave de um programa de retenção de funcionários eficaz?', 'Rotatividade elevada', 'Comunicação ineficaz', 'Reconhecimento e recompensas', 'Falta de oportunidades de desenvolvimento', 'C', '2023-10-14', 1),
(25, 1, 2, 5, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'A', '2023-10-14', 1),
(26, 1, 2, 2, 'dasdasdassad', 'dasdsadsadsa', 'dasdassadas', 'dasdasdasdas', 'dasdasdasdas', 'B', '2023-10-14', 1),
(27, 1, 1, 9, 'O que faz um analista?', 'Programa', 'Designer', 'Modela Banco de dados', ' pesquisam, analisam e relatam as diversas tendências', 'D', '2023-10-16', 1),
(28, 1, 2, 9, 'Qual é o papel de um analista de dados em uma organização e como ele contribui para as tomadas de decisão estratégicas?', 'Coletar e armazenar dados', 'Preparar relatórios semanalmente', 'Analisar dados para obter insights e apoiar decisões', 'Gerenciar redes sociais da empresa', 'C', '2023-10-16', 1),
(29, 1, 2, 9, 'Quais são as principais habilidades técnicas necessárias para um analista de dados? Explique a importância de cada uma delas em seu trabalho.', 'Habilidade de comunicação.', 'Conhecimento de marketing.', 'Programação e estatísticas.', 'Criatividade artística.', 'D', '2023-10-30', 1),
(30, 1, 2, 4, 'Qual é a medida de tendência central que é menos sensível a valores extremos (outliers) em um conjunto de dados?', 'Média aritmética', 'Mediana', 'Moda', 'Variancia', 'A', '2023-10-27', 1),
(31, 3, 1, 11, 'O que é SEO (Search Engine Optimization)?', 'Uma técnica para criar anúncios pagos no Google.', 'Um método para otimizar sites e conteúdo para melhorar seu posicionamento nos resultados de pesquisa.', 'Uma estratégia para aumentar o número de seguidores nas redes sociais.', 'Uma abordagem para criar conteúdo de vídeo de alta qualidade.', 'B', '2023-10-23', 1),
(32, 3, 2, 11, 'Qual das seguintes plataformas é mais adequada para marketing de conteúdo visual?', 'Facebook', 'LinkedIn', 'Instagram', 'Twitter', 'D', '2023-10-23', 1),
(33, 3, 2, 11, ' O que é CTA (Call to Action) em marketing digital?', 'Uma estratégia de publicidade paga.', 'Um software de análise de dados.', ' Um bot de atendimento ao cliente.', 'Uma mensagem ou elemento de um conteúdo que incentiva o usuário a realizar uma ação específica, como clicar em um botão.', 'C', '2023-10-23', 1),
(34, 3, 1, 11, 'O que é o ROI (Return on Investment) no contexto do marketing digital?', 'Uma plataforma de mídia social.', 'Uma estratégia de marketing de guerrilha.', ' Uma métrica que mede o retorno financeiro em relação aos gastos em campanhas de marketing.', 'Uma ferramenta de análise de tráfego do site.', 'C', '2023-10-23', 1),
(35, 3, 2, 11, 'Qual das seguintes opções é uma forma comum de marketing de influência?', 'E-mail marketing', 'Blogging', ' Publicidade de TV', 'Colaborações com influenciadores de mídias sociais', 'D', '2023-10-23', 1),
(36, 2, 2, 12, 'sdadasd', 'dasdsa', 'dsadsa', 'dasdas', 'dasdas', 'A', '2023-10-25', 1),
(37, 2, 2, 3, 'dasdasd', 'dasdsa', 'dasdas', 'dsadasd', 'dasdasd', 'A', '2023-10-25', 1),
(38, 1, 2, 12, 'bbbbbb', 'condicional', 'Atributo', 'aaa', 'Variavel', 'D', '2023-11-11', 1),
(39, 3, 1, 13, 'Qual dos seguintes elementos compõe o mix de marketing, também conhecido como os \"4Ps\"?', 'Perfil de público-alvo, pesquisa de mercado, orçamento, distribuição.', 'Produto, preço, promoção, praça.', ' Propaganda, publicidade, relações públicas, vendas diretas.', ' Planejamento estratégico, logística, gerenciamento de equipe, pesquisa de mercado.', 'B', '2023-10-30', 1),
(40, 3, 1, 13, 'Qual das seguintes métricas de marketing se concentra no número de pessoas que visitam um site e interagem com seu conteúdo?', 'Custo por clique (CPC).', 'Taxa de conversão.', 'Tráfego orgânico', 'Taxa de rejeição (Bounce rate)', 'C', '2023-10-30', 1),
(41, 3, 1, 13, 'O que é o \"funil de vendas\" no contexto do marketing?', 'Uma ferramenta de corte de custos para maximizar os lucros.', 'Um gráfico que mostra o desempenho financeiro de uma empresa.', ' Um modelo que descreve o processo pelo qual os clientes avançam desde o conhecimento até a compra', ' Um tipo de estratégia de preços para atrair clientes de alto valor', 'C', '2023-10-30', 1),
(42, 3, 1, 13, 'Qual dos seguintes canais de marketing é frequentemente associado ao conteúdo de longo prazo e à construção de relacionamentos com a audiência?', 'Publicidade de busca (Search advertising)', 'Marketing de influência (Influencer marketing)', 'Email marketing', 'Editada', 'C', '2023-10-30', 1),
(43, 3, 1, 13, 'Qual é o objetivo central da segmentação de mercado', 'Aumentar os custos de produção', ' Criar produtos genéricos para atrair um público amplo', 'Dividir o mercado em grupos menores com características e necessidades semelhantes.', 'Minimizar o alcance da marca para se concentrar apenas em um nicho', 'C', '2023-10-30', 1),
(44, 7, 1, 19, 'Teste1', 'Teste1', 'Teste1', 'Teste1', 'Teste1', 'B', '2023-11-06', 1),
(45, 7, 2, 19, 'Teste2', 'Teste2', 'Teste2', 'Teste2', 'Teste2', 'A', '2023-11-06', 1),
(46, 7, 2, 19, 'Teste3', 'Teste3', 'Teste3', 'Teste3', 'Teste3', 'C', '2023-11-06', 1),
(47, 7, 2, 19, 'Teste4', 'Teste4', 'Teste4', 'Teste4', 'Editada', 'D', '2023-11-06', 1),
(48, 7, 2, 19, 'Teste5', 'Teste5', 'Teste5', 'Teste5', 'Teste5', 'B', '2023-11-06', 1),
(49, 1, 1, 20, 'Pergunta sobre node.js', 'Teste1', 'Teste2', 'Teste3', 'Teste4', 'B', '2023-11-11', 1),
(50, 9, 2, 8, 'Qutesões de desenvolvimento humano', 'aa', 'aaa', 'aaa', 'aaa', 'D', '2023-11-11', 1),
(51, 9, 2, 8, 'dsadasdas', 'dasdas', 'dsadas', 'dsadasd', 'dasdsadas', 'C', '2023-11-11', 1),
(52, 9, 2, 12, 'dasdsad', 'dsadas', 'dsadas', 'dasdsa', 'dasdas', 'C', '2023-11-11', 1),
(53, 9, 2, 9, 'dasdasdas', 'dasdasd', 'dsadasd', 'adsadas', 'dsdasdas', 'B', '2023-11-11', 1),
(54, 9, 2, 12, 'dasddasd', 'dasdas', 'dasdasd', 'dasdsa', 'dasdasdsa', 'A', '2023-11-11', 1);

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
(1, 'Tecnica'),
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
  MODIFY `idTB_Categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb_colaborador`
--
ALTER TABLE `tb_colaborador`
  MODIFY `idTB_Colaborador` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `tb_departamento`
--
ALTER TABLE `tb_departamento`
  MODIFY `idTB_Departamento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_gestor`
--
ALTER TABLE `tb_gestor`
  MODIFY `idTB_Gestor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_questionario`
--
ALTER TABLE `tb_questionario`
  MODIFY `idTB_Questionario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `tb_questoes`
--
ALTER TABLE `tb_questoes`
  MODIFY `idTB_Questoes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
