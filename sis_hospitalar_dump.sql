-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jul-2025 às 09:07
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sih`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`id`, `nome`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'NADO CASSAMBA', 'Bernardocassamba@gmail.com', NULL, '$2y$10$GG6ttf6OizJ48AixDjcCOO4s1xAHFqOZSIkhO29bZz9qk.AzYZcUG', NULL, '2025-07-05 20:54:54', '2025-07-05 21:03:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clinicos`
--

CREATE TABLE `clinicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `especialidade_id` bigint(20) UNSIGNED NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `horario_atendimento` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clinicos`
--

INSERT INTO `clinicos` (`id`, `nome`, `email`, `password`, `telefone`, `data_inicio`, `hora_inicio`, `especialidade_id`, `ativo`, `horario_atendimento`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bernardo Cassamba', 'Bernardocassamba@gmail.com', '$2y$10$CmnyQDakFu8zQtCaBv/ZyejsCy4Jrx4z6iLyjZD4fIxyXCQMT6z66', '929298019', NULL, NULL, 4, 1, NULL, NULL, '2025-07-05 21:06:24', '2025-07-05 22:50:28'),
(2, 'Joaquim Muzemena', 'abiail@gmail.com', '$2y$10$RfvYeahb9evu6eJntq7KgujRzSBMlD403rWEQ0lW3KvWAUUwqc7OC', '929298019', NULL, NULL, 3, 1, NULL, NULL, '2025-07-06 10:02:17', '2025-07-06 13:38:34'),
(3, 'Maria Cassamba', 'Mariacassamba@gmail.com', '$2y$10$FzkYyMIcexfScUEJCHLD0ef.RYYRpBUpoaztKs63lxBfqS64AhoZC', '923965687', NULL, NULL, 4, 1, NULL, NULL, '2025-07-06 15:08:41', '2025-07-06 15:08:41'),
(4, 'Adilson De Carvalho', 'Adilson@gmail.com', '$2y$10$ix5/h5WYIvkotABtbzVz1OZqDZvONFIuImHfh3t7tx7N.xhK1pyXC', '929298019', NULL, NULL, 2, 1, NULL, NULL, '2025-07-06 15:09:21', '2025-07-06 15:09:21'),
(5, 'Edson Pinheiro', 'Edson@gmail.com', '$2y$10$IyuRx10j4u2T7nSdzDm3..wciTbhHlw1FiaZivLhNsR92mQRTlQhi', '929298019', NULL, NULL, 1, 1, NULL, NULL, '2025-07-06 15:09:55', '2025-07-06 15:09:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidades`
--

CREATE TABLE `especialidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `especialidades`
--

INSERT INTO `especialidades` (`id`, `nome`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'Cardiologia', NULL, '2025-07-05 20:54:53', '2025-07-05 20:54:53'),
(2, 'Pediatria', NULL, '2025-07-05 20:54:54', '2025-07-05 20:54:54'),
(3, 'Ginecologia', NULL, '2025-07-05 20:54:54', '2025-07-05 20:54:54'),
(4, 'Ortopedia', NULL, '2025-07-05 20:54:54', '2025-07-05 20:54:54'),
(5, 'Neurologia', NULL, '2025-07-05 20:54:54', '2025-07-05 20:54:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame_complementars`
--

CREATE TABLE `exame_complementars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE `horarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clinico_id` bigint(20) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcacoes`
--

CREATE TABLE `marcacoes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clinico_id` bigint(20) UNSIGNED DEFAULT NULL,
  `utente_id` bigint(20) UNSIGNED NOT NULL,
  `data_marcacao` date DEFAULT NULL,
  `especialidade_id` bigint(20) UNSIGNED NOT NULL,
  `medico_id` bigint(20) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `tipo` enum('consulta','exame') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `marcacoes`
--

INSERT INTO `marcacoes` (`id`, `clinico_id`, `utente_id`, `data_marcacao`, `especialidade_id`, `medico_id`, `data`, `tipo`, `created_at`, `updated_at`) VALUES
(1, NULL, 5, NULL, 1, 1, '2025-07-12', 'consulta', '2025-07-05 21:09:55', '2025-07-05 21:09:55'),
(4, 1, 7, '2025-07-06', 4, 1, '2025-07-15', 'exame', '2025-07-06 16:04:20', '2025-07-06 16:04:20'),
(6, NULL, 7, NULL, 1, 5, '2025-07-09', 'exame', '2025-07-06 15:12:04', '2025-07-06 15:12:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos`
--

CREATE TABLE `medicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `especialidade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `medicos`
--

INSERT INTO `medicos` (`id`, `nome`, `email`, `telefone`, `especialidade_id`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Bernardo Cassamba', 'Bernardocassamba@gmail.com', NULL, 1, '2025-07-05 20:54:54', '2025-07-05 20:54:54'),
(2, 'Dra. Anária Dias', 'Anariadias@gmail.com', NULL, 2, '2025-07-05 20:54:54', '2025-07-05 20:54:54'),
(3, 'Dr. André Rita', 'AndreRira@gmail.com', NULL, 4, '2025-07-05 20:54:54', '2025-07-05 20:54:54'),
(4, 'Dra. Luzia Venancio', 'Luziavenancio@gmail.com', NULL, 3, '2025-07-05 20:54:54', '2025-07-05 20:54:54'),
(5, 'Dr. Miguel Santos', 'miguel.santos@example.com', NULL, 5, '2025-07-05 20:54:54', '2025-07-05 20:54:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_06_26_183834_create_utentes_table', 1),
(6, '2025_06_26_190342_create_especialidades_table', 1),
(7, '2025_06_26_190344_create_medicos_table', 1),
(8, '2025_06_26_190345_create_rcus_table', 1),
(9, '2025_06_26_191403_create_marcacoes_table', 1),
(10, '2025_06_26_222305_add_remember_token_to_utentes_table', 1),
(11, '2025_06_27_230331_add_senha_to_utentes_table', 1),
(12, '2025_06_27_232541_remove_senha_column_from_utentes_table', 1),
(13, '2025_06_27_999999_drop_senha_column_from_utentes_table', 1),
(14, '2025_06_28_004920_add_utente_id_foreign_to_rcus_table', 1),
(15, '2025_06_29_101223_create_exame_complementars_table', 1),
(16, '2025_06_29_121535_create_clinicos_table', 1),
(17, '2025_06_29_125555_create_admins_table', 1),
(18, '2025_06_30_143709_remove_bi_from_utentes_table', 1),
(19, '2025_06_30_194933_add_entidade_fields_to_utentes_table', 1),
(20, '2025_07_01_205339_add_ativo_to_utentes_table', 1),
(21, '2025_07_01_220550_update_rcus_table_add_and_rename_fields', 1),
(22, '2025_07_01_221159_update_rcus_add_grupo_sanguineo', 1),
(23, '2025_07_03_201026_add_horario_to_clinicos_table', 1),
(24, '2025_07_04_163814_create_horarios_table', 1),
(25, '2025_07_04_165538_add_ativo_to_clinicos_table', 1),
(26, '2025_07_04_205421_add_clinico_id_to_marcacoes_table', 1),
(27, '2025_07_04_205853_add_data_marcacao_to_marcacoes_table', 1),
(28, '2025_07_04_213524_add_campos_publicos_to_rcus_table', 1),
(29, '2025_07_05_210651_alterar_fk_marcacoes_para_clinicos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rcus`
--

CREATE TABLE `rcus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `utente_id` bigint(20) UNSIGNED NOT NULL,
  `grupo_sanguineo` varchar(255) DEFAULT NULL,
  `historico_medico` text DEFAULT NULL COMMENT 'Doenças anteriores, cirurgias, etc.',
  `alergias` text DEFAULT NULL COMMENT 'Reacções alérgicas conhecidas.',
  `medicacoes_atuais` text DEFAULT NULL COMMENT 'Medicamentos que o utente está a tomar.',
  `historia_familiar` text DEFAULT NULL COMMENT 'Histórico de saúde da família.',
  `boletim_vacinas` text DEFAULT NULL COMMENT 'Vacinas recebidas.',
  `diagnostico` text DEFAULT NULL,
  `tratamento` text DEFAULT NULL,
  `observacoes` text DEFAULT NULL COMMENT 'Notas adicionais do clínico.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `rcus`
--

INSERT INTO `rcus` (`id`, `utente_id`, `grupo_sanguineo`, `historico_medico`, `alergias`, `medicacoes_atuais`, `historia_familiar`, `boletim_vacinas`, `diagnostico`, `tratamento`, `observacoes`, `created_at`, `updated_at`) VALUES
(1, 5, '1', '1', '1', '1', '1', '1', NULL, NULL, '1', '2025-07-05 21:09:04', '2025-07-05 21:09:39'),
(2, 6, '', '', '', '', '', '', NULL, NULL, '', '2025-07-05 22:37:25', '2025-07-05 22:37:25'),
(3, 7, '', '', '', '', '', '', NULL, NULL, '', '2025-07-06 14:57:50', '2025-07-06 14:57:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utentes`
--

CREATE TABLE `utentes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `genero` varchar(255) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `entidade_financeira` varchar(255) DEFAULT NULL,
  `numero_utente_entidade` varchar(255) DEFAULT NULL,
  `documento_identificacao` varchar(255) DEFAULT NULL,
  `numero_documento` varchar(255) DEFAULT NULL,
  `historia_familiar` text DEFAULT NULL,
  `boletim_vacinas` text DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `utentes`
--

INSERT INTO `utentes` (`id`, `nome`, `email`, `password`, `remember_token`, `telefone`, `ativo`, `genero`, `data_nascimento`, `endereco`, `entidade_financeira`, `numero_utente_entidade`, `documento_identificacao`, `numero_documento`, `historia_familiar`, `boletim_vacinas`, `observacoes`, `created_at`, `updated_at`) VALUES
(2, 'Carlos Mateus', 'carlos@example.com', '$2y$10$ViapMCRBLFiVREWVUEWTy.YWqY8yt0MnRfgL2W11CT/p5uXdahCfC', NULL, '922223344', 1, 'M', '1988-03-15', 'Benguela', 'Fidelidade', 'FID99887', 'Passaporte', 'P00998877', NULL, NULL, NULL, '2025-07-05 21:03:02', '2025-07-05 21:03:02'),
(3, 'Laura Pinto', 'laura@example.com', '$2y$10$7rQ1W.k59yR8AsfH6cYWxuslXS4Q.soF8YiFXjFD4XZobdnoQX10C', NULL, '92456789011', 1, 'F', '2000-11-10', 'Lubango', 'Mutue', 'MT123900', 'BI', '004412235HH78', NULL, NULL, NULL, '2025-07-05 21:03:02', '2025-07-05 21:05:50'),
(5, 'Bernardo Cassamba', 'abiail@gmail.com', '$2y$10$KXUN4vXRnFgvL/AZbRKqI.KF/d7PIsc/dP6rpjQB0SqBr2ZjLWMTS', NULL, '929298019', 1, 'Masculino', '2025-07-03', 'Ramiros\r\nApartamento', 'ANDI', '34', 'BI', '123E4444', NULL, NULL, NULL, '2025-07-05 21:09:04', '2025-07-05 21:09:04'),
(6, 'Bernardo Cassamba', 'Bernardocassamba@gmail.com', '$2y$10$bYBZSUC8LmQugdwDP7A2zOIqZUDO5FPOGivcnU25w9tZ8l0ecGED.', NULL, '929298019', 1, 'Masculino', '2025-06-30', 'Ramiros\r\nApartamento', 'NADO', 'Bernardocassamba@gmail.com', 'BI', '11111111', NULL, NULL, NULL, '2025-07-05 22:37:25', '2025-07-05 22:37:25'),
(7, 'Adilson', 'hibridamascara599@gmail.com', '$2y$10$OGT0QmAOeZGL5EEZdmdb4.E3JqkttU3gRd.dgnOA39PXUivH5a3zO', NULL, '929298019', 1, 'Feminino', '2025-06-30', 'Benfica, Antigo control', 'Fundacao Kissama', 'Bernardocassamba@gmail.com', 'Passaporte', '12345678U', NULL, NULL, NULL, '2025-07-06 14:57:50', '2025-07-06 14:57:50');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Índices para tabela `clinicos`
--
ALTER TABLE `clinicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clinicos_email_unique` (`email`),
  ADD KEY `clinicos_especialidade_id_foreign` (`especialidade_id`);

--
-- Índices para tabela `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `especialidades_nome_unique` (`nome`);

--
-- Índices para tabela `exame_complementars`
--
ALTER TABLE `exame_complementars`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horarios_clinico_id_foreign` (`clinico_id`);

--
-- Índices para tabela `marcacoes`
--
ALTER TABLE `marcacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marcacoes_utente_id_foreign` (`utente_id`),
  ADD KEY `marcacoes_especialidade_id_foreign` (`especialidade_id`),
  ADD KEY `marcacoes_clinico_id_foreign` (`clinico_id`),
  ADD KEY `marcacoes_medico_id_foreign` (`medico_id`);

--
-- Índices para tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medicos_email_unique` (`email`),
  ADD KEY `medicos_especialidade_id_foreign` (`especialidade_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `rcus`
--
ALTER TABLE `rcus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rcus_utente_id_unique` (`utente_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices para tabela `utentes`
--
ALTER TABLE `utentes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utentes_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clinicos`
--
ALTER TABLE `clinicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `exame_complementars`
--
ALTER TABLE `exame_complementars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marcacoes`
--
ALTER TABLE `marcacoes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `rcus`
--
ALTER TABLE `rcus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `utentes`
--
ALTER TABLE `utentes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `clinicos`
--
ALTER TABLE `clinicos`
  ADD CONSTRAINT `clinicos_especialidade_id_foreign` FOREIGN KEY (`especialidade_id`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_clinico_id_foreign` FOREIGN KEY (`clinico_id`) REFERENCES `clinicos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `marcacoes`
--
ALTER TABLE `marcacoes`
  ADD CONSTRAINT `marcacoes_clinico_id_foreign` FOREIGN KEY (`clinico_id`) REFERENCES `clinicos` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `marcacoes_especialidade_id_foreign` FOREIGN KEY (`especialidade_id`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marcacoes_medico_id_foreign` FOREIGN KEY (`medico_id`) REFERENCES `clinicos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marcacoes_utente_id_foreign` FOREIGN KEY (`utente_id`) REFERENCES `utentes` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_especialidade_id_foreign` FOREIGN KEY (`especialidade_id`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `rcus`
--
ALTER TABLE `rcus`
  ADD CONSTRAINT `fk_rcus_utente_id` FOREIGN KEY (`utente_id`) REFERENCES `utentes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rcus_utente_id_foreign` FOREIGN KEY (`utente_id`) REFERENCES `utentes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
