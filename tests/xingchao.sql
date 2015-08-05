-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-08-04 13:31:34
-- 服务器版本： 5.6.24
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `xingchao`
--

-- --------------------------------------------------------

--
-- 表的结构 `z_auth_assignment`
--

CREATE TABLE IF NOT EXISTS `z_auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `z_auth_assignment`
--

INSERT INTO `z_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1438092509);

-- --------------------------------------------------------

--
-- 表的结构 `z_auth_item`
--

CREATE TABLE IF NOT EXISTS `z_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `z_auth_item`
--

INSERT INTO `z_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Administrator', NULL, NULL, 1438092350, 1438092350),
('author', 1, '', NULL, NULL, 1438092390, 1438092959),
('createPost', 2, 'create a post', NULL, NULL, 1438092389, 1438092389),
('guest', 1, 'Guest', NULL, NULL, 1438092350, 1438092350),
('reader', 1, NULL, NULL, NULL, 1438092390, 1438092390),
('readPost', 2, 'read a post', NULL, NULL, 1438092390, 1438092390),
('updatePost', 2, 'update post', NULL, NULL, 1438092390, 1438092390),
('user', 1, 'User', NULL, NULL, 1438092350, 1438092350);

-- --------------------------------------------------------

--
-- 表的结构 `z_auth_item_child`
--

CREATE TABLE IF NOT EXISTS `z_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `z_auth_item_child`
--

INSERT INTO `z_auth_item_child` (`parent`, `child`) VALUES
('author', 'createPost'),
('author', 'reader'),
('author', 'readPost'),
('reader', 'readPost');

-- --------------------------------------------------------

--
-- 表的结构 `z_auth_rule`
--

CREATE TABLE IF NOT EXISTS `z_auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `z_message`
--

CREATE TABLE IF NOT EXISTS `z_message` (
  `id` int(10) unsigned NOT NULL,
  `real_name` varchar(64) NOT NULL COMMENT '姓名',
  `real_mobile` bigint(11) unsigned NOT NULL COMMENT '移动电话',
  `real_remark` varchar(255) NOT NULL COMMENT '留言信息',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态:0未读,1已读',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='留言表';

--
-- 转存表中的数据 `z_message`
--

INSERT INTO `z_message` (`id`, `real_name`, `real_mobile`, `real_remark`, `status`, `created`, `updated`) VALUES
(1, '赵严', 13634567895, '测试留言', 1, '2015-08-04 12:31:09', '2015-08-04 13:03:02'),
(2, '天天', 13543532345, 'ddddddd', 0, '2015-08-04 12:33:38', '2015-08-04 12:33:38');

-- --------------------------------------------------------

--
-- 表的结构 `z_migration`
--

CREATE TABLE IF NOT EXISTS `z_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `z_migration`
--

INSERT INTO `z_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1438092346),
('m140608_201405_user_init', 1438092350),
('m140608_201406_rbac_init', 1438092350),
('m140708_201431_rbac_init', 1438092390);

-- --------------------------------------------------------

--
-- 表的结构 `z_model`
--

CREATE TABLE IF NOT EXISTS `z_model` (
  `id` int(10) unsigned NOT NULL COMMENT '主键',
  `user_id` int(10) unsigned DEFAULT '0' COMMENT '用户ID',
  `model_cat` int(8) NOT NULL DEFAULT '0',
  `model_name` varchar(64) DEFAULT '' COMMENT '模特姓名',
  `model_height` varchar(32) DEFAULT '' COMMENT '模特身高',
  `model_weight` varchar(32) DEFAULT '' COMMENT '模特体重',
  `model_bust` varchar(32) DEFAULT '' COMMENT '胸围',
  `model_waist` varchar(32) DEFAULT '' COMMENT '腰围',
  `model_hip` varchar(32) DEFAULT '' COMMENT '臀围',
  `model_arm` varchar(32) DEFAULT '' COMMENT '臂围',
  `model_shoes` varchar(32) DEFAULT '' COMMENT '鞋码',
  `model_thigh` varchar(32) DEFAULT '' COMMENT '大腿围',
  `model_calf` varchar(32) DEFAULT '' COMMENT '小腿围',
  `model_coat` varchar(32) DEFAULT '' COMMENT '上衣码',
  `model_pants` varchar(32) DEFAULT '' COMMENT '裤码',
  `model_bras` varchar(32) DEFAULT '' COMMENT '内衣码',
  `model_leg_length` varchar(32) DEFAULT '' COMMENT '腿长',
  `model_arm_length` varchar(32) DEFAULT '' COMMENT '臂长',
  `model_head` varchar(32) DEFAULT '' COMMENT '头围',
  `model_shoulder` varchar(32) DEFAULT '' COMMENT '肩宽',
  `model_tattoo` tinyint(1) DEFAULT '0' COMMENT '是否纹身 0 否 1 是',
  `model_style` varchar(255) DEFAULT '' COMMENT '模特style',
  `model_address` varchar(255) DEFAULT '' COMMENT '模特地址',
  `is_long_hair` tinyint(1) DEFAULT '0' COMMENT '是否长发. 0 否 1 是',
  `starting_expenses` decimal(10,2) DEFAULT '0.00' COMMENT '起拍费用',
  `shed_piece` int(10) unsigned DEFAULT '0' COMMENT '棚内记件',
  `studio_time` int(10) unsigned DEFAULT '0' COMMENT '棚拍记时',
  `outside_nerve` int(10) unsigned DEFAULT '0' COMMENT '外拍包天',
  `address` varchar(255) DEFAULT '' COMMENT '联系地址',
  `disabled` tinyint(1) DEFAULT '0' COMMENT '是否删除0 正常 1 删除',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序',
  `default_image` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '封面图片',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `updated` datetime DEFAULT NULL COMMENT '更新时间'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='模特信息表';

--
-- 转存表中的数据 `z_model`
--

INSERT INTO `z_model` (`id`, `user_id`, `model_cat`, `model_name`, `model_height`, `model_weight`, `model_bust`, `model_waist`, `model_hip`, `model_arm`, `model_shoes`, `model_thigh`, `model_calf`, `model_coat`, `model_pants`, `model_bras`, `model_leg_length`, `model_arm_length`, `model_head`, `model_shoulder`, `model_tattoo`, `model_style`, `model_address`, `is_long_hair`, `starting_expenses`, `shed_piece`, `studio_time`, `outside_nerve`, `address`, `disabled`, `sort`, `default_image`, `created`, `updated`) VALUES
(1, 1, 1, 'aa', '173', '48', '25', '26', '27', '28', '38', '34', '36', 'xl', '23', '26', '25', '44', '77', '54', 0, 'ss', 'dddddd', 1, '3444.00', 5675, 567, 456, 'ytuytu', 0, 0, 39, '2015-07-29 17:17:56', '2015-08-03 22:43:31'),
(2, 1, 2, '234', '123', '123', '123', '123', '23', '123', '32', '123', '3213', '123', '213', '123', '12', '132', '123', '123', 0, '123', '123', 1, '123.00', 123, 123, 123, '123', 0, 1, 42, '2015-08-03 22:45:17', '2015-08-03 22:47:41'),
(3, 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, '2015-08-04 20:05:42', '2015-08-04 20:05:42');

-- --------------------------------------------------------

--
-- 表的结构 `z_model_cat`
--

CREATE TABLE IF NOT EXISTS `z_model_cat` (
  `id` int(10) unsigned NOT NULL COMMENT 'ID',
  `title` varchar(64) NOT NULL COMMENT '分类标题',
  `created` datetime NOT NULL COMMENT '创建时间',
  `updated` datetime NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='模特分类表';

--
-- 转存表中的数据 `z_model_cat`
--

INSERT INTO `z_model_cat` (`id`, `title`, `created`, `updated`) VALUES
(1, '摄影作品', '2015-08-02 09:41:18', '2015-08-02 09:44:03'),
(2, '设计作品', '2015-08-02 09:44:31', '2015-08-02 09:44:31');

-- --------------------------------------------------------

--
-- 表的结构 `z_model_gallery`
--

CREATE TABLE IF NOT EXISTS `z_model_gallery` (
  `id` int(10) unsigned NOT NULL COMMENT '主键',
  `model_id` int(10) unsigned DEFAULT NULL COMMENT '与z_model关联',
  `thumb_image` varchar(255) DEFAULT '' COMMENT '缩略图路径',
  `image` varchar(255) DEFAULT '' COMMENT '原图路径',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `updated` datetime DEFAULT NULL COMMENT '更新时间'
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `z_model_gallery`
--

INSERT INTO `z_model_gallery` (`id`, `model_id`, `thumb_image`, `image`, `created`, `updated`) VALUES
(39, 1, '', '1d87aecf264bf766cc6f442571caa615b.gif', '2015-08-03 22:37:20', '2015-08-03 22:37:20'),
(40, 1, '', '19fc1af1dda981192942a68f72380021b.gif', '2015-08-03 22:37:28', '2015-08-03 22:37:28'),
(41, 1, '', '1afc62fe5b040b811cc365cdd56a30dec.jpg', '2015-08-03 22:37:37', '2015-08-03 22:37:37'),
(42, 2, '', '1afc62fe5b040b811cc365cdd56a30dec.jpg', '2015-08-03 22:47:07', '2015-08-03 22:47:07'),
(43, 2, '', '1d87aecf264bf766cc6f442571caa615b.gif', '2015-08-03 22:47:29', '2015-08-03 22:47:29'),
(44, 2, '', '153cb05a81928fe28ce1a7b14adf2f3f5.gif', '2015-08-03 22:47:30', '2015-08-03 22:47:30'),
(45, 2, '', '19fc1af1dda981192942a68f72380021b.gif', '2015-08-03 22:47:30', '2015-08-03 22:47:30'),
(47, 2, '', '1fa936e7fd1176e98fecee42098d55b2e.gif', '2015-08-03 22:47:30', '2015-08-03 22:47:30'),
(48, 2, '', '1d9598a08761c42951db57c4446f18b98.gif', '2015-08-04 07:16:21', '2015-08-04 07:16:21');

-- --------------------------------------------------------

--
-- 表的结构 `z_user`
--

CREATE TABLE IF NOT EXISTS `z_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `z_user`
--

INSERT INTO `z_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'aYLr0TDsKTqYqf0I2vRcYY8KDbFdEIMf', '$2y$13$oZplf5KZBP3GlOz67Vvib.b6QRiGMEwzWiJZGOt5hZ6I4M2lw6vc2', 'lWuY4slFanAvNE7zd8k1La3t7drXz53C_1438092509', 'admin@demo.com', 'admin', 1, 1438092350, 1438092509);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `z_auth_assignment`
--
ALTER TABLE `z_auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `z_auth_item`
--
ALTER TABLE `z_auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `z_auth_item_child`
--
ALTER TABLE `z_auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `z_auth_rule`
--
ALTER TABLE `z_auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `z_message`
--
ALTER TABLE `z_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `z_migration`
--
ALTER TABLE `z_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `z_model`
--
ALTER TABLE `z_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_model_cat`
--
ALTER TABLE `z_model_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_model_gallery`
--
ALTER TABLE `z_model_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_user`
--
ALTER TABLE `z_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role` (`role`),
  ADD KEY `status` (`status`),
  ADD KEY `created_at` (`created_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `z_message`
--
ALTER TABLE `z_message`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `z_model`
--
ALTER TABLE `z_model`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `z_model_cat`
--
ALTER TABLE `z_model_cat`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `z_model_gallery`
--
ALTER TABLE `z_model_gallery`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `z_user`
--
ALTER TABLE `z_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- 限制导出的表
--

--
-- 限制表 `z_auth_assignment`
--
ALTER TABLE `z_auth_assignment`
  ADD CONSTRAINT `z_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `z_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `z_auth_item`
--
ALTER TABLE `z_auth_item`
  ADD CONSTRAINT `z_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `z_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `z_auth_item_child`
--
ALTER TABLE `z_auth_item_child`
  ADD CONSTRAINT `z_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `z_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `z_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `z_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
