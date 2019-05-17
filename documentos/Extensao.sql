CREATE TABLE `designers` (
    `id` int auto_increment NOT NULL,
    `senha` varchar(60) NOT NULL,
    `aprovado` boolean NOT NULL,
    `nome` varchar(256) NOT NULL,
    `email` varchar(128) NOT NULL,
    `telefone` varchar(32),
    `celular` varchar(32),
    `celular_whatsapp` boolean,
    `inscricao` datetime NOT NULL,
    `atualizacao` datetime NOT NULL,
    `curso` varchar(256),
    `fase` varchar(128),
    `apresentacao_breve` varchar(512) NOT NULL,
    `apresentacao_detalhada` longtext NOT NULL,
    `caminho_fotografia` varchar(512),
    PRIMARY KEY (`id`),
    UNIQUE (`email`)
);

CREATE TABLE `administradores` (
    `id` int auto_increment NOT NULL,
    `senha` varchar(60) NOT NULL,
    `nome` varchar(256) NOT NULL,
    `email` varchar(128) NOT NULL,
    `recebe_contato` boolean NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`email`)
);

CREATE TABLE `artigos` (
    `id` int auto_increment NOT NULL,
    `designer_id` int NOT NULL,
    `categoria_id` int NOT NULL,
    `codigo` varchar(32) NOT NULL,
    `nome` varchar(128) NOT NULL,
    `descricao_breve` varchar(512) NOT NULL,
    `descricao_completa` text NOT NULL,
    `disponibilidade` varchar(1) NOT NULL,
    `customizavel` boolean NOT NULL,
    `criacao` datetime NOT NULL,
    `atualizacao` datetime NOT NULL,
    `variacoes_disponiveis` longtext,
    `numero_visualizacoes` int NOT NULL,
    `numero_favoritacoes` int NOT NULL,
    `numero_compartilhamentos` int NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`codigo`)
);

CREATE TABLE `categorias` (
    `id` int auto_increment NOT NULL,
    `nome` varchar(128) NOT NULL,
    `descricao` varchar(512) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `paginas` (
    `id` int auto_increment NOT NULL,
    `identificador` varchar(32) NOT NULL,
    `nome` varchar(64) NOT NULL,
    `conteudo` longtext NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`identificador`)
);

CREATE TABLE `artigo_fotografias` (
    `id` int auto_increment NOT NULL,
    `artigo_id` int NOT NULL,
    `ordem` int NOT NULL,
    `nome_arquivo` varchar(128) NOT NULL,
    `caminho_arquivo` varchar(512) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `desfiles` (
    `id` int auto_increment NOT NULL,
    `data` date NOT NULL,
    `turma` varchar(128) NOT NULL,
    `descricao_breve` varchar(512) NOT NULL,
    `descricao_detalhada` longtext NOT NULL,
    `caminho_capa` varchar(512) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `desfile_fotografias` (
    `id` int auto_increment NOT NULL,
    `desfile_id` int NOT NULL,
    `ordem` int NOT NULL,
    `nome_arquivo` varchar(128) NOT NULL,
    `caminho_arquivo` varchar(512) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `projetos` (
    `id` int auto_increment NOT NULL,
    `nome` varchar(128) NOT NULL,
    `turma` varchar(128) NOT NULL,
    `fase` varchar(128) NOT NULL,
    `datainicio` date NOT NULL,
    `datatermino` date NOT NULL,
    `descricao_breve` varchar(512) NOT NULL,
    `descricao_detalhada` longtext NOT NULL,
    `caminho_capa` varchar(512) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `projeto_fotografias` (
    `id` int auto_increment NOT NULL,
    `projeto_id` int NOT NULL,
    `ordem` int NOT NULL,
    `nome_arquivo` varchar(128) NOT NULL,
    `caminho_arquivo` varchar(512) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `log_contatodesigners` (
    `id` int auto_increment NOT NULL,
    `artigo_id` int NOT NULL,
    `datahora` datetime NOT NULL,
    `nome` varchar(256) NOT NULL,
    `email` varchar(128) NOT NULL,
    `telefone` varchar(32),
    `celular` varchar(32),
    `celular_whatsapp` boolean,
    `variacoes_disponiveis` longtext,
    `variacoes_escolhidas` longtext,
    `mensagem` longtext,
    PRIMARY KEY (`id`)
);

CREATE TABLE `log_customizacoes` (
    `id` int auto_increment NOT NULL,
    `artigo_id` int NOT NULL,
    `datahora` datetime NOT NULL,
    `nome` varchar(256) NOT NULL,
    `email` varchar(128) NOT NULL,
    `telefone` varchar(32),
    `celular` varchar(32),
    `celular_whatsapp` boolean,
    `customizacao` text,
    PRIMARY KEY (`id`)
);

CREATE TABLE `log_contatos` (
    `id` int auto_increment NOT NULL,
    `datahora` datetime NOT NULL,
    `nome` varchar(256) NOT NULL,
    `email` varchar(128) NOT NULL,
    `telefone` varchar(32),
    `celular` varchar(32),
    `celular_whatsapp` boolean,
    `mensagem` longtext,
    PRIMARY KEY (`id`)
);

ALTER TABLE `artigos` ADD FOREIGN KEY (`designer_id`) REFERENCES `designers`(`id`);
ALTER TABLE `artigos` ADD FOREIGN KEY (`categoria_id`) REFERENCES `categorias`(`id`);
ALTER TABLE `artigo_fotografias` ADD FOREIGN KEY (`artigo_id`) REFERENCES `artigos`(`id`);
ALTER TABLE `desfile_fotografias` ADD FOREIGN KEY (`desfile_id`) REFERENCES `desfiles`(`id`);
ALTER TABLE `projeto_fotografias` ADD FOREIGN KEY (`projeto_id`) REFERENCES `projetos`(`id`);
ALTER TABLE `log_contatodesigners` ADD FOREIGN KEY (`artigo_id`) REFERENCES `artigos`(`id`);
ALTER TABLE `log_customizacoes` ADD FOREIGN KEY (`artigo_id`) REFERENCES `artigos`(`id`);