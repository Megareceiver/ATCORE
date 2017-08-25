# MySQL dump of database 'at_wlagricultural' on host '128.199.124.254'
# Backup Date and Time: 2016-02-23 22:35
# Built by AccountantToday 2.3.22
# http://accountanttoday.net
# Company: WL Agricultural Enterprise
# User: WL Agricultural Enterprise



### Structure of table `areas` ###

DROP TABLE IF EXISTS `areas`;

CREATE TABLE `areas` (
  `area_code` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`area_code`),
  UNIQUE KEY `description` (`description`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `areas` ###

INSERT INTO `areas` VALUES
('1', 'Global', '0');

### Structure of table `attachments` ###

DROP TABLE IF EXISTS `attachments`;

CREATE TABLE `attachments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type_no` int(11) NOT NULL DEFAULT '0',
  `trans_no` int(11) NOT NULL DEFAULT '0',
  `unique_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `filename` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `filesize` int(11) NOT NULL DEFAULT '0',
  `filetype` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `type_no` (`type_no`,`trans_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `attachments` ###


### Structure of table `audit_trail` ###

DROP TABLE IF EXISTS `audit_trail`;

CREATE TABLE `audit_trail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) unsigned NOT NULL DEFAULT '0',
  `trans_no` int(11) unsigned NOT NULL DEFAULT '0',
  `user` smallint(6) unsigned NOT NULL DEFAULT '0',
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fiscal_year` int(11) NOT NULL,
  `gl_date` date NOT NULL DEFAULT '0000-00-00',
  `gl_seq` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Seq` (`fiscal_year`,`gl_date`,`gl_seq`),
  KEY `Type_and_Number` (`type`,`trans_no`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `audit_trail` ###


### Structure of table `bad_debts` ###

DROP TABLE IF EXISTS `bad_debts`;

CREATE TABLE `bad_debts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) NOT NULL,
  `type_no` int(16) NOT NULL,
  `tran_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `step` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

### Data of table `bad_debts` ###


### Structure of table `bank_accounts` ###

DROP TABLE IF EXISTS `bank_accounts`;

CREATE TABLE `bank_accounts` (
  `account_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `account_type` smallint(6) NOT NULL DEFAULT '0',
  `bank_account_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_account_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_address` tinytext COLLATE utf8_unicode_ci,
  `bank_curr_code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_curr_act` tinyint(1) NOT NULL DEFAULT '0',
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `last_reconciled_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ending_reconcile_balance` double NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `bank_account_name` (`bank_account_name`),
  KEY `bank_account_number` (`bank_account_number`),
  KEY `account_code` (`account_code`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `bank_accounts` ###

INSERT INTO `bank_accounts` VALUES
('1070', '1', 'PUBLIC BANK BERHAD', '3195704101', 'PUBLIC BANK BHD', NULL, 'MYR', '0', '1', '0000-00-00 00:00:00', '0', '0'),
('1065', '3', 'CASH IN HAND', '', 'CASH IN HAND', NULL, 'MYR', '0', '2', '0000-00-00 00:00:00', '0', '0');

### Structure of table `bank_trans` ###

DROP TABLE IF EXISTS `bank_trans`;

CREATE TABLE `bank_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) DEFAULT NULL,
  `trans_no` int(11) DEFAULT NULL,
  `bank_act` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tax_inclusive` tinyint(1) NOT NULL DEFAULT '0',
  `ref` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trans_date` date NOT NULL DEFAULT '0000-00-00',
  `amount` double DEFAULT NULL,
  `dimension_id` int(11) NOT NULL DEFAULT '0',
  `dimension2_id` int(11) NOT NULL DEFAULT '0',
  `person_type_id` int(11) NOT NULL DEFAULT '0',
  `person_id` tinyblob,
  `reconciled` date DEFAULT NULL,
  `cheque` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `bank_act` (`bank_act`,`ref`),
  KEY `type` (`type`,`trans_no`),
  KEY `bank_act_2` (`bank_act`,`reconciled`),
  KEY `bank_act_3` (`bank_act`,`trans_date`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `bank_trans` ###

INSERT INTO `bank_trans` VALUES
('123', '0', '0', '1', '0', 'Open Balance', '2016-11-30', '177032.46', '0', '0', '0', NULL, NULL, ''),
('124', '0', '0', '2', '0', 'Open Balance', '2016-11-30', '100000.00000000007', '0', '0', '0', NULL, NULL, '');

### Structure of table `bank_trans_detail` ###

DROP TABLE IF EXISTS `bank_trans_detail`;

CREATE TABLE `bank_trans_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `account_code` char(10) NOT NULL,
  `amount` double NOT NULL,
  `trans_no` int(11) NOT NULL,
  `currence` char(50) NOT NULL,
  `currence_rate` double NOT NULL,
  `tax` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1 ;

### Data of table `bank_trans_detail` ###

INSERT INTO `bank_trans_detail` VALUES
('1', '1', '5410', '3000', '1', 'MYR', '1', '0'),
('2', '1', '5410', '3000', '2', 'MYR', '1', '0'),
('3', '1', '5690', '3', '3', 'MYR', '1', '12'),
('4', '1', '5780', '30.5', '4', 'MYR', '1', '12'),
('5', '1', '5780', '6.37', '4', 'MYR', '1', '20'),
('6', '1', '5780', '61.63', '5', 'MYR', '1', '12'),
('7', '1', '5010', '0', '5', 'MYR', '1', '12'),
('8', '1', '5780', '16.72', '5', 'MYR', '1', '20'),
('9', '1', '5780', '61.7', '6', 'MYR', '1', '12'),
('10', '1', '5785', '1150.68', '7', 'MYR', '1', '0'),
('11', '1', '5786', '1281.97', '7', 'MYR', '1', '20'),
('12', '1', '5785', '50', '7', 'MYR', '1', '20'),
('13', '1', '5780', '100', '8', 'MYR', '1', '0'),
('14', '1', '5780', '150', '9', 'MYR', '1', '0'),
('15', '1', '5780', '150', '10', 'MYR', '1', '0'),
('16', '1', '5780', '111.52', '11', 'MYR', '1', '0'),
('17', '1', '5780', '83.73', '12', 'MYR', '1', '0'),
('18', '1', '5780', '91.76', '13', 'MYR', '1', '0'),
('19', '1', '5410', '2500', '14', 'MYR', '1', '0'),
('20', '1', '5410', '2500', '15', 'MYR', '1', '0'),
('21', '1', '5410', '2500', '16', 'MYR', '1', '0'),
('22', '1', '5791', '38.15', '17', 'MYR', '1', '0'),
('23', '1', '5791', '38.15', '18', 'MYR', '1', '0'),
('24', '1', '5791', '48.67', '19', 'MYR', '1', '12'),
('25', '1', '5791', '0.82', '19', 'MYR', '1', '12'),
('26', '1', '5791', '23.8', '20', 'MYR', '1', '0'),
('27', '1', '5790', '102.3', '21', 'MYR', '1', '0'),
('28', '1', '5790', '48.67', '22', 'MYR', '1', '12'),
('29', '1', '5790', '0.81', '22', 'MYR', '1', '20'),
('30', '1', '5791', '10.95', '23', 'MYR', '1', '0'),
('31', '1', '5790', '106.76', '24', 'MYR', '1', '12'),
('32', '1', '5790', '-2.37', '24', 'MYR', '1', '20'),
('33', '1', '5780', '50', '25', 'MYR', '1', '0'),
('34', '1', '5010', '50', '26', 'MYR', '1', '0'),
('35', '1', '5780', '494.22', '27', 'MYR', '1', '0'),
('36', '1', '5780', '50', '28', 'MYR', '1', '0'),
('37', '1', '5780', '50', '29', 'MYR', '1', '0'),
('38', '2', '2680', '-3000', '1', 'MYR', '1', '0'),
('39', '1', '5690', '7.5', '30', 'MYR', '1', '0'),
('40', '2', '2680', '-30000', '2', 'MYR', '1', '0'),
('41', '2', '2680', '-15000', '3', 'MYR', '1', '0'),
('42', '1', '2680', '44520', '31', 'MYR', '1', '0'),
('43', '1', '5690', '0.53', '32', 'MYR', '1', '0'),
('44', '1', '5690', '0.53', '33', 'MYR', '1', '0'),
('45', '1', '2680', '34810', '34', 'MYR', '1', '0'),
('46', '1', '2680', '22900', '35', 'MYR', '1', '0'),
('47', '1', '5690', '1.59', '36', 'MYR', '1', '0'),
('48', '2', '2680', '-55130', '4', 'MYR', '1', '0'),
('49', '2', '2680', '-55130', '5', 'MYR', '1', '0'),
('50', '2', '2680', '-27350', '6', 'MYR', '1', '0'),
('51', '2', '2680', '-4279', '7', 'MYR', '1', '0'),
('52', '2', '2680', '-1871.4', '8', 'MYR', '1', '0'),
('53', '2', '2680', '-2544', '9', 'MYR', '1', '0'),
('54', '2', '2680', '-29271', '10', 'MYR', '1', '0'),
('55', '2', '2680', '-14152', '11', 'MYR', '1', '0'),
('56', '2', '2680', '-50180', '12', 'MYR', '1', '0'),
('57', '2', '2680', '-34810', '13', 'MYR', '1', '0'),
('58', '2', '2680', '-22900', '14', 'MYR', '1', '0'),
('59', '1', '2680', '3400', '37', 'MYR', '1', '0'),
('60', '1', '2680', '3400', '38', 'MYR', '1', '0'),
('61', '1', '2680', '4134', '39', 'MYR', '1', '0'),
('62', '1', '2680', '1.5', '40', 'MYR', '1', '12'),
('63', '1', '2680', '2668.02', '41', 'MYR', '1', '0'),
('64', '1', '2680', '848', '42', 'MYR', '1', '0'),
('65', '1', '2680', '1093.92', '43', 'MYR', '1', '0'),
('66', '1', '2680', '1.5', '44', 'MYR', '1', '12'),
('67', '1', '2680', '2756', '45', 'MYR', '1', '0'),
('68', '1', '2680', '5100', '46', 'MYR', '1', '0'),
('69', '1', '2680', '3773.59', '47', 'MYR', '1', '0'),
('70', '1', '2680', '763.2', '48', 'MYR', '1', '0'),
('71', '1', '2680', '27000', '49', 'MYR', '1', '0'),
('72', '1', '2680', '10342.19', '50', 'MYR', '1', '0'),
('73', '1', '2680', '3637.92', '51', 'MYR', '1', '0'),
('74', '1', '5690', '3', '52', 'MYR', '1', '12'),
('75', '1', '2680', '27350', '53', 'MYR', '1', '0'),
('76', '2', '2680', '-27350', '15', 'MYR', '1', '0'),
('77', '1', '5690', '0.5', '54', 'MYR', '1', '12'),
('78', '1', '5690', '0.5', '55', 'MYR', '1', '12'),
('79', '1', '5791', '12.36', '56', 'MYR', '1', '0'),
('80', '1', '5791', '37.55', '57', 'MYR', '1', '0'),
('81', '1', '5790', '262.25', '58', 'MYR', '1', '0'),
('82', '1', '5790', '123.95', '59', 'MYR', '1', '0'),
('83', '1', '5790', '129.95', '60', 'MYR', '1', '0'),
('84', '1', '5790', '77.35', '61', 'MYR', '1', '0'),
('85', '1', '5790', '24.2', '62', 'MYR', '1', '0'),
('86', '1', '5791', '38.15', '63', 'MYR', '1', '0'),
('87', '1', '5790', '262.25', '64', 'MYR', '1', '0'),
('88', '1', '5791', '24.2', '65', 'MYR', '1', '0'),
('89', '1', '5410', '2500', '66', 'MYR', '1', '0'),
('90', '1', '5410', '3000', '67', 'MYR', '1', '0'),
('91', '1', '5790', '124.26', '68', 'MYR', '1', '0'),
('92', '1', '5790', '41.3', '69', 'MYR', '1', '0'),
('93', '1', '5791', '30.15', '70', 'MYR', '1', '0'),
('94', '1', '5791', '112.05', '71', 'MYR', '1', '0'),
('95', '1', '5790', '358', '72', 'MYR', '1', '0'),
('96', '1', '5410', '3000', '73', 'MYR', '1', '0'),
('97', '1', '5410', '2500', '74', 'MYR', '1', '0'),
('98', '1', '5790', '57.3', '75', 'MYR', '1', '0'),
('99', '1', '5790', '145.4', '76', 'MYR', '1', '0'),
('100', '1', '5791', '38.15', '77', 'MYR', '1', '0'),
('101', '1', '5791', '9.7', '78', 'MYR', '1', '0'),
('102', '1', '5410', '3000', '79', 'MYR', '1', '0'),
('103', '1', '5410', '2500', '80', 'MYR', '1', '0'),
('104', '1', '5790', '51.1', '81', 'MYR', '1', '0'),
('105', '1', '5790', '129.95', '82', 'MYR', '1', '0'),
('106', '1', '5791', '9.25', '83', 'MYR', '1', '0'),
('107', '1', '5780', '82.92', '84', 'MYR', '1', '0'),
('108', '1', '5780', '360', '85', 'MYR', '1', '0'),
('109', '1', '5791', '38.15', '86', 'MYR', '1', '0'),
('110', '1', '5410', '2500', '87', 'MYR', '1', '0'),
('111', '1', '5410', '3000', '88', 'MYR', '1', '0'),
('112', '1', '5791', '19.45', '89', 'MYR', '1', '0'),
('113', '1', '5790', '146.6', '90', 'MYR', '1', '0'),
('114', '1', '5791', '38.2', '91', 'MYR', '1', '0'),
('115', '1', '5790', '55.95', '92', 'MYR', '1', '0'),
('116', '1', '5410', '2500', '93', 'MYR', '1', '0'),
('117', '1', '5410', '3000', '94', 'MYR', '1', '0'),
('118', '1', '5410', '3000', '95', 'MYR', '1', '0'),
('119', '1', '5410', '2500', '96', 'MYR', '1', '0'),
('120', '1', '5791', '38.15', '97', 'MYR', '1', '0'),
('121', '1', '5780', '83.33', '98', 'MYR', '1', '0'),
('122', '1', '5780', '100', '99', 'MYR', '1', '0'),
('123', '1', '5780', '38.7', '100', 'MYR', '1', '0'),
('124', '1', '5780', '358', '101', 'MYR', '1', '0'),
('125', '1', '5690', '1.5', '102', 'MYR', '1', '12'),
('126', '1', '5690', '1.5', '103', 'MYR', '1', '12'),
('127', '2', '2680', '-53666.01', '16', 'MYR', '1', '0'),
('128', '2', '2680', '-51166.01', '17', 'MYR', '1', '0');

### Structure of table `bom` ###

DROP TABLE IF EXISTS `bom`;

CREATE TABLE `bom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `component` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `workcentre_added` int(11) NOT NULL DEFAULT '0',
  `loc_code` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `quantity` double NOT NULL DEFAULT '1',
  PRIMARY KEY (`parent`,`component`,`workcentre_added`,`loc_code`),
  KEY `component` (`component`),
  KEY `id` (`id`),
  KEY `loc_code` (`loc_code`),
  KEY `parent` (`parent`,`loc_code`),
  KEY `workcentre_added` (`workcentre_added`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `bom` ###


### Structure of table `budget_trans` ###

DROP TABLE IF EXISTS `budget_trans`;

CREATE TABLE `budget_trans` (
  `counter` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) NOT NULL DEFAULT '0',
  `type_no` bigint(16) NOT NULL DEFAULT '1',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `memo_` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `dimension_id` int(11) DEFAULT '0',
  `dimension2_id` int(11) DEFAULT '0',
  `person_type_id` int(11) DEFAULT NULL,
  `person_id` tinyblob,
  PRIMARY KEY (`counter`),
  KEY `Type_and_Number` (`type`,`type_no`),
  KEY `Account` (`account`,`tran_date`,`dimension_id`,`dimension2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `budget_trans` ###


### Structure of table `chart_class` ###

DROP TABLE IF EXISTS `chart_class`;

CREATE TABLE `chart_class` (
  `cid` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `class_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ctype` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `chart_class` ###

INSERT INTO `chart_class` VALUES
('1', 'Assets', '1', '0'),
('2', 'Liabilities', '2', '0'),
('3', 'Income', '4', '0'),
('4', 'Costs', '6', '0');

### Structure of table `chart_master` ###

DROP TABLE IF EXISTS `chart_master`;

CREATE TABLE `chart_master` (
  `account_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `account_code2` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `account_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `account_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`account_code`),
  KEY `account_name` (`account_name`),
  KEY `accounts_by_type` (`account_type`,`account_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `chart_master` ###

INSERT INTO `chart_master` VALUES
('1060', '', 'Checking Account', '1', '0'),
('1065', '', 'Petty Cash', '1', '0'),
('1200', '', 'Accounts Receivables', '1', '0'),
('1205', '', 'Allowance for doubtful accounts', '1', '0'),
('1510', '', 'Inventory', '2', '0'),
('1520', '', 'Stocks of Raw Materials', '2', '0'),
('1530', '', 'Stocks of Work In Progress', '2', '0'),
('1540', '', 'Stocks of Finsihed Goods', '2', '0'),
('1550', '', 'Goods Received Clearing account', '2', '0'),
('1820', '', 'Office Furniture &amp; Equipment', '3', '0'),
('1825', '', 'Accum. Amort. -Furn. &amp; Equip.', '3', '0'),
('1840', '', 'Vehicle', '3', '0'),
('1845', '', 'Accum. Amort. -Vehicle', '3', '0'),
('2100', '', 'Accounts Payable', '4', '0'),
('2110', '', 'Accrued Income Tax - Federal', '4', '0'),
('2120', '', 'Accrued Income Tax - State', '4', '0'),
('2130', '', 'Accrued Franchise Tax', '4', '0'),
('2140', '', 'Accrued Real &amp; Personal Prop Tax', '4', '0'),
('2150', '', 'GST Output Tax', '4', '0'),
('2160', '', 'Accrued Use Tax Payable', '4', '0'),
('2210', '', 'Accrued Wages', '4', '0'),
('2220', '', 'Accrued Comp Time', '4', '0'),
('2230', '', 'Accrued Holiday Pay', '4', '0'),
('2240', '', 'Accrued Vacation Pay', '4', '0'),
('2310', '', 'Accr. Benefits - 401K', '4', '0'),
('2320', '', 'Accr. Benefits - Stock Purchase', '4', '0'),
('2330', '', 'Accr. Benefits - Med, Den', '4', '0'),
('2340', '', 'Accr. Benefits - Payroll Taxes', '4', '0'),
('2350', '', 'Accr. Benefits - Credit Union', '4', '0'),
('2360', '', 'Accr. Benefits - Savings Bond', '4', '0'),
('2370', '', 'Accr. Benefits - Garnish', '4', '0'),
('2380', '', 'Accr. Benefits - Charity Cont.', '4', '0'),
('2620', '', 'Bank Loans', '5', '0'),
('2680', '', 'Loans from Shareholders', '5', '0'),
('3350', '', 'Common Shares', '6', '0'),
('3590', '', 'Retained Earnings - prior years', '7', '0'),
('4010', '', 'Sales', '8', '0'),
('4430', '', 'Shipping &amp; Handling', '9', '0'),
('4440', '', 'Interest', '9', '0'),
('4450', '', 'Foreign Exchange Gain', '9', '0'),
('4500', '', 'Prompt Payment Discounts', '9', '0'),
('4510', '', 'Discounts Given', '9', '0'),
('5010', '', 'Cost of Goods Sold - Retail', '10', '0'),
('5020', '', 'Material Usage Varaiance', '10', '0'),
('5030', '', 'Consumable Materials', '10', '0'),
('5040', '', 'Purchase price Variance', '10', '0'),
('5050', '', 'Purchases of materials', '10', '0'),
('5060', '', 'Discounts Received', '10', '0'),
('5100', '', 'Freight', '10', '0'),
('5410', '', 'Wages &amp; Salaries', '11', '0'),
('5420', '', 'Wages - Overtime', '11', '0'),
('5430', '', 'Benefits - Comp Time', '11', '0'),
('5440', '', 'Benefits - Payroll Taxes', '11', '0'),
('5450', '', 'Benefits - Workers Comp', '11', '0'),
('5460', '', 'Benefits - Pension', '11', '0'),
('5470', '', 'Benefits - General Benefits', '11', '0'),
('5510', '', 'Inc Tax Exp - Federal', '11', '0'),
('5520', '', 'Inc Tax Exp - State', '11', '0'),
('5530', '', 'Taxes - Real Estate', '11', '0'),
('5540', '', 'Taxes - Personal Property', '11', '0'),
('5550', '', 'Taxes - Franchise', '11', '0'),
('5560', '', 'Taxes - Foreign Withholding', '11', '0'),
('5610', '', 'Accounting &amp; Legal', '12', '0'),
('5615', '', 'Advertising &amp; Promotions', '12', '0'),
('5620', '', 'Bad Debts', '12', '0'),
('5660', '', 'Amortization Expense', '12', '0'),
('5685', '', 'Insurance', '12', '0'),
('5690', '', 'Interest &amp; Bank Charges', '12', '0'),
('5700', '', 'Office Supplies', '12', '0'),
('5760', '', 'Rent', '12', '0'),
('5765', '', 'Repair &amp; Maintenance', '12', '0'),
('5780', '', 'Telephone', '12', '0'),
('5785', '', 'Travelling expenses', '12', '0'),
('5790', '', 'Electricity charges', '12', '0'),
('5795', '', 'Registrations', '12', '0'),
('5800', '', 'Licenses', '12', '0'),
('5810', '', 'Foreign Exchange Loss', '12', '0'),
('9990', '', 'Year Profit/Loss', '12', '0'),
('1300', '1300', 'GST Input Tax', '1', '0'),
('5900', '5900', 'GST Expense (Not Claimable)', '12', '0'),
('2152', '', 'GST Output Tax Zero Rated', '4', '0'),
('1070', '', 'Public Bank Bhd - MYR', '1', '0'),
('1071', '', 'RHB Saving - MYR', '1', '0'),
('4451', '', 'Rounding Difference', '9', '0'),
('5791', '', 'Water Charges', '12', '0'),
('5786', '', 'Entertainment', '12', '0');

### Structure of table `chart_types` ###

DROP TABLE IF EXISTS `chart_types`;

CREATE TABLE `chart_types` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `class_id` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parent` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-1',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `class_id` (`class_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `chart_types` ###

INSERT INTO `chart_types` VALUES
('1', 'Current Assets', '1', '', '0'),
('2', 'Inventory Assets', '1', '', '0'),
('3', 'Capital Assets', '1', '', '0'),
('4', 'Current Liabilities', '2', '', '0'),
('5', 'Long Term Liabilities', '2', '', '0'),
('6', 'Share Capital', '2', '', '0'),
('7', 'Retained Earnings', '2', '', '0'),
('8', 'Sales Revenue', '3', '', '0'),
('9', 'Other Revenue', '3', '', '0'),
('10', 'Cost of Goods Sold', '4', '', '0'),
('11', 'Payroll Expenses', '4', '', '0'),
('12', 'General &amp; Administrative expenses', '4', '', '0');

### Structure of table `comments` ###

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `type` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL DEFAULT '0',
  `date_` date DEFAULT '0000-00-00',
  `memo_` tinytext COLLATE utf8_unicode_ci,
  KEY `type_and_id` (`type`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `comments` ###


### Structure of table `credit_status` ###

DROP TABLE IF EXISTS `credit_status`;

CREATE TABLE `credit_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reason_description` char(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dissallow_invoices` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `reason_description` (`reason_description`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `credit_status` ###

INSERT INTO `credit_status` VALUES
('1', 'Good History', '0', '0'),
('3', 'No more work until payment received', '1', '0'),
('4', 'In liquidation', '1', '0');

### Structure of table `crm_categories` ###

DROP TABLE IF EXISTS `crm_categories`;

CREATE TABLE `crm_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'pure technical key',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'contact type e.g. customer',
  `action` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'detailed usage e.g. department',
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'for category selector',
  `description` tinytext COLLATE utf8_unicode_ci NOT NULL COMMENT 'usage description',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'nonzero for core system usage',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`,`action`),
  UNIQUE KEY `type_2` (`type`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `crm_categories` ###

INSERT INTO `crm_categories` VALUES
('1', 'cust_branch', 'general', 'General', 'General contact data for customer branch (overrides company setting)', '1', '0'),
('2', 'cust_branch', 'invoice', 'Invoices', 'Invoice posting (overrides company setting)', '1', '0'),
('3', 'cust_branch', 'order', 'Orders', 'Order confirmation (overrides company setting)', '1', '0'),
('4', 'cust_branch', 'delivery', 'Deliveries', 'Delivery coordination (overrides company setting)', '1', '0'),
('5', 'customer', 'general', 'General', 'General contact data for customer', '1', '0'),
('6', 'customer', 'order', 'Orders', 'Order confirmation', '1', '0'),
('7', 'customer', 'delivery', 'Deliveries', 'Delivery coordination', '1', '0'),
('8', 'customer', 'invoice', 'Invoices', 'Invoice posting', '1', '0'),
('9', 'supplier', 'general', 'General', 'General contact data for supplier', '1', '0'),
('10', 'supplier', 'order', 'Orders', 'Order confirmation', '1', '0'),
('11', 'supplier', 'delivery', 'Deliveries', 'Delivery coordination', '1', '0'),
('12', 'supplier', 'invoice', 'Invoices', 'Invoice posting', '1', '0');

### Structure of table `crm_contacts` ###

DROP TABLE IF EXISTS `crm_contacts`;

CREATE TABLE `crm_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL DEFAULT '0' COMMENT 'foreign key to crm_contacts',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'foreign key to crm_categories',
  `action` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'foreign key to crm_categories',
  `entity_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'entity id in related class table',
  PRIMARY KEY (`id`),
  KEY `type` (`type`,`action`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `crm_contacts` ###

INSERT INTO `crm_contacts` VALUES
('1', '1', 'cust_branch', 'general', '1'),
('2', '1', 'customer', 'general', '1'),
('3', '2', 'cust_branch', 'general', '2'),
('4', '2', 'customer', 'general', '2'),
('5', '3', 'cust_branch', 'general', '3'),
('6', '3', 'customer', 'general', '3'),
('7', '4', 'cust_branch', 'general', '4'),
('8', '4', 'customer', 'general', '4'),
('9', '5', 'supplier', 'general', '1'),
('10', '6', 'supplier', 'general', '2'),
('11', '7', 'supplier', 'general', '3'),
('12', '8', 'supplier', 'general', '4'),
('13', '9', 'supplier', 'general', '5');

### Structure of table `crm_persons` ###

DROP TABLE IF EXISTS `crm_persons`;

CREATE TABLE `crm_persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name2` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` tinytext COLLATE utf8_unicode_ci,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ref` (`ref`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `crm_persons` ###

INSERT INTO `crm_persons` VALUES
('1', 'PERTUBUHAN PELADANG KAWASAN HU', 'PPKHL', NULL, 'BATU 14, PEKAN HULU LANGAT,\n43100 HULU LANGAT\nSELANGOR D.E\n', NULL, NULL, NULL, NULL, NULL, '', '0'),
('2', 'KIN FUNG AGRICULTURAL SDN BHD', 'KIN FUNG', NULL, 'NO:1 JALAN B.R.J. D/2,\nTAMAN BUKIT RAWANG JAYA DUA,\n48000 RAWANG, SELANGOR D.E', NULL, NULL, NULL, NULL, NULL, '', '0'),
('3', 'GOLDEN FRUIT ORCHARD SDN BHD', 'GOLDEN', NULL, 'NO:7 JALAN BRP 3/3C,\nSUNWAY RAHMAN PUTRA\n47000, SG BULOH\nSELANGOR D.E', NULL, NULL, NULL, NULL, NULL, '', '0'),
('4', 'LIAN LEE KIMIA SDN BHD', 'LIAN LEE', NULL, 'LOT:3 &amp; 4, FU YEN BUILDING,\nMILE 1.5, JALAN TUARAN\nP.O BOX NO:14200,\nKOTA KINABALU, SABAH', NULL, NULL, NULL, NULL, NULL, '', '0'),
('5', 'YOON FATT', '', NULL, 'NO:16, JALAN JATI,86000 KLUANG, JOHOR', NULL, NULL, NULL, NULL, NULL, '', '0'),
('6', 'KUM CHUN', '', NULL, '1U, GROUND FLOOR,JALAN LEONG BOON SWEE,\nIPOH PERAK', NULL, NULL, NULL, NULL, NULL, '', '0'),
('7', 'SIN SENG', '', NULL, 'NO:6, JALAN BP 4/7, BANDAR BUKIT PUCHONG\n47100 PUCHONG, SELANGOR', NULL, NULL, NULL, NULL, NULL, '', '0'),
('8', 'SALESWIDE', '', NULL, 'NO:1, JALAN 7/152, \nTAMAN PERINDUSTRIAN O.U.G.\nBATU 6, JALAN PUCHONG, 58200 K.L.', NULL, NULL, NULL, NULL, NULL, '', '0'),
('9', 'SALESWIDE ', '', NULL, 'NO:1, JALAN 7/152, \nTAMAN PERINDUSTRIAN OUG\nBATU 6, JALAN PUCHONG,58200 K.L.\n', NULL, NULL, NULL, NULL, NULL, '', '0');

### Structure of table `currencies` ###

DROP TABLE IF EXISTS `currencies`;

CREATE TABLE `currencies` (
  `currency` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `curr_abrev` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `curr_symbol` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `hundreds_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `auto_update` tinyint(1) NOT NULL DEFAULT '1',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`curr_abrev`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `currencies` ###

INSERT INTO `currencies` VALUES
('US Dollars', 'USD', 'US$', 'United States', 'Cents', '1', '0'),
('CA Dollars', 'CAD', '$', 'Canada', 'Cents', '1', '0'),
('Euro', 'EUR', '?', 'Europe', 'Cents', '1', '0'),
('Pounds', 'GBP', '?', 'England', 'Pence', '1', '0'),
('DK Kroner', 'DKK', 'kr', 'Denmark', 'Ore', '1', '0'),
('Singapore Dollars', 'SGD', 'SG$', 'Singapore', 'Cents', '1', '0'),
('Malaysian Ringgit', 'MYR', 'MYR', 'Malaysia', 'Sen', '1', '0');

### Structure of table `cust_allocations` ###

DROP TABLE IF EXISTS `cust_allocations`;

CREATE TABLE `cust_allocations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amt` double unsigned DEFAULT NULL,
  `date_alloc` date NOT NULL DEFAULT '0000-00-00',
  `trans_no_from` int(11) DEFAULT NULL,
  `trans_type_from` int(11) DEFAULT NULL,
  `trans_no_to` int(11) DEFAULT NULL,
  `trans_type_to` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `From` (`trans_type_from`,`trans_no_from`),
  KEY `To` (`trans_type_to`,`trans_no_to`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `cust_allocations` ###


### Structure of table `cust_branch` ###

DROP TABLE IF EXISTS `cust_branch`;

CREATE TABLE `cust_branch` (
  `branch_code` int(11) NOT NULL AUTO_INCREMENT,
  `debtor_no` int(11) NOT NULL DEFAULT '0',
  `br_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `branch_ref` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `br_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `area` int(11) DEFAULT NULL,
  `salesman` int(11) NOT NULL DEFAULT '0',
  `contact_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `default_location` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tax_group_id` int(11) DEFAULT NULL,
  `sales_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sales_discount_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `receivables_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `payment_discount_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `default_ship_via` int(11) NOT NULL DEFAULT '1',
  `disable_trans` tinyint(4) NOT NULL DEFAULT '0',
  `br_post_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `group_no` int(11) NOT NULL DEFAULT '0',
  `notes` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`branch_code`,`debtor_no`),
  KEY `branch_code` (`branch_code`),
  KEY `branch_ref` (`branch_ref`),
  KEY `group_no` (`group_no`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `cust_branch` ###

INSERT INTO `cust_branch` VALUES
('1', '1', 'PERTUBUHAN PELADANG KAWASAN HULU LANGAT', 'PPKHL', 'BATU 14, PEKAN HULU LANGAT,\n43100 HULU LANGAT\nSELANGOR D.E\n', '1', '2', '', 'DEF', '1', '', '4510', '1200', '4500', '1', '0', 'BATU 14, PEKAN HULU LANGAT,\n43100 HULU LANGAT\nSELANGOR D.E\n', '0', '', '0'),
('2', '2', 'KIN FUNG AGRICULTURAL SDN BHD', 'KIN FUNG', 'NO:1 JALAN B.R.J. D/2,\nTAMAN BUKIT RAWANG JAYA DUA,\n48000 RAWANG, SELANGOR D.E', '1', '2', '', 'DEF', '1', '', '4510', '1200', '4500', '1', '0', 'NO:1 JALAN B.R.J. D/2,\nTAMAN BUKIT RAWANG JAYA DUA,\n48000 RAWANG, SELANGOR D.E', '0', '', '0'),
('3', '3', 'GOLDEN FRUIT ORCHARD SDN BHD', 'GOLDEN', 'NO:7 JALAN BRP 3/3C,\nSUNWAY RAHMAN PUTRA\n47000, SG BULOH\nSELANGOR D.E', '1', '2', '', 'DEF', '1', '', '4510', '1200', '4500', '1', '0', 'NO:7 JALAN BRP 3/3C,\nSUNWAY RAHMAN PUTRA\n47000, SG BULOH\nSELANGOR D.E', '0', '', '0'),
('4', '4', 'LIAN LEE KIMIA SDN BHD', 'LIAN LEE', 'LOT:3 &amp; 4, FU YEN BUILDING,\nMILE 1.5, JALAN TUARAN\nP.O BOX NO:14200,\nKOTA KINABALU, SABAH', '1', '2', '', 'DEF', '1', '', '4510', '1200', '4500', '1', '0', 'LOT:3 &amp; 4, FU YEN BUILDING,\nMILE 1.5, JALAN TUARAN\nP.O BOX NO:14200,\nKOTA KINABALU, SABAH', '0', '', '0');

### Structure of table `dashboard_reminders` ###

DROP TABLE IF EXISTS `dashboard_reminders`;

CREATE TABLE `dashboard_reminders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `next_date` date NOT NULL,
  `description` text,
  `frequency` varchar(20) NOT NULL,
  `param` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

### Data of table `dashboard_reminders` ###


### Structure of table `dashboard_widgets` ###

DROP TABLE IF EXISTS `dashboard_widgets`;

CREATE TABLE `dashboard_widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `app` varchar(50) NOT NULL,
  `column_id` int(11) NOT NULL,
  `sort_no` int(11) NOT NULL,
  `collapsed` tinyint(4) NOT NULL,
  `widget` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `param` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

### Data of table `dashboard_widgets` ###


### Structure of table `debtor_trans` ###

DROP TABLE IF EXISTS `debtor_trans`;

CREATE TABLE `debtor_trans` (
  `trans_no` int(11) unsigned NOT NULL DEFAULT '0',
  `type` smallint(6) unsigned NOT NULL DEFAULT '0',
  `version` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `debtor_no` int(11) unsigned DEFAULT NULL,
  `branch_code` int(11) NOT NULL DEFAULT '-1',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `due_date` date NOT NULL DEFAULT '0000-00-00',
  `reference` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tpe` int(11) NOT NULL DEFAULT '0',
  `order_` int(11) NOT NULL DEFAULT '0',
  `ov_amount` double NOT NULL DEFAULT '0',
  `ov_gst` double NOT NULL DEFAULT '0',
  `ov_freight` double NOT NULL DEFAULT '0',
  `ov_freight_tax` double NOT NULL DEFAULT '0',
  `ov_discount` double NOT NULL DEFAULT '0',
  `alloc` double NOT NULL DEFAULT '0',
  `rate` double NOT NULL DEFAULT '1',
  `ship_via` int(11) DEFAULT NULL,
  `dimension_id` int(11) NOT NULL DEFAULT '0',
  `dimension2_id` int(11) NOT NULL DEFAULT '0',
  `payment_terms` int(11) DEFAULT NULL,
  `cheque` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`type`,`trans_no`),
  KEY `debtor_no` (`debtor_no`,`branch_code`),
  KEY `tran_date` (`tran_date`),
  KEY `order_` (`order_`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `debtor_trans` ###

INSERT INTO `debtor_trans` VALUES
('1', '10', '0', '2', '2', '2015-11-03', '2016-01-30', 'IV-00001', '1', '1', '9530', '571.8', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('2', '10', '0', '2', '2', '2015-11-13', '2016-01-30', 'IV-00002', '1', '2', '5160', '309.6', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('3', '10', '0', '2', '2', '2015-11-26', '2016-01-30', 'IV-00003', '1', '3', '3800', '228', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('4', '10', '0', '2', '2', '2015-12-02', '2016-01-30', 'IV-00004', '1', '4', '16420', '985.2', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('5', '10', '0', '1', '1', '2015-11-12', '2016-01-30', 'IV-00005', '1', '5', '6222', '373.32', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('6', '10', '0', '3', '3', '2015-11-07', '2016-01-30', 'IV-00006', '1', '6', '4010', '240.6', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('7', '10', '0', '3', '3', '2015-12-08', '2016-01-30', 'IV-00007', '1', '7', '2486', '149.16', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('8', '10', '0', '2', '2', '2015-12-12', '2016-01-30', 'IV-00008', '1', '8', '300', '18', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('9', '10', '0', '2', '2', '2015-12-19', '2016-01-30', 'IV-00009', '1', '9', '5600', '336', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('10', '10', '0', '3', '3', '2015-12-22', '2016-01-30', 'IV-00010', '1', '10', '780', '46.8', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('11', '10', '0', '4', '4', '2015-12-21', '2016-01-30', 'IV-00011', '1', '11', '1920', '115.2', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('12', '10', '0', '4', '4', '2015-12-03', '2016-01-30', 'IV-00012', '1', '12', '66108', '3966.48', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('1', '13', '1', '2', '2', '2015-11-03', '2016-01-30', 'auto', '1', '1', '9530', '0', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('2', '13', '1', '2', '2', '2015-11-13', '2016-01-30', 'auto', '1', '2', '5160', '0', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('3', '13', '1', '2', '2', '2015-11-26', '2016-01-30', 'auto', '1', '3', '3800', '0', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('4', '13', '1', '2', '2', '2015-12-02', '2016-01-30', 'auto', '1', '4', '16420', '0', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('5', '13', '1', '1', '1', '2015-11-12', '2016-01-30', 'auto', '1', '5', '6222', '0', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('6', '13', '1', '3', '3', '2015-11-07', '2016-01-30', 'auto', '1', '6', '4010', '0', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('7', '13', '1', '3', '3', '2015-12-08', '2016-01-30', 'auto', '1', '7', '2486', '0', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('8', '13', '1', '2', '2', '2015-12-12', '2016-01-30', 'auto', '1', '8', '300', '0', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('9', '13', '1', '2', '2', '2015-12-19', '2016-01-30', 'auto', '1', '9', '5600', '0', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('10', '13', '1', '3', '3', '2015-12-22', '2016-01-30', 'auto', '1', '10', '780', '0', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('11', '13', '1', '4', '4', '2015-12-21', '2016-01-30', 'auto', '1', '11', '1920', '0', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL),
('12', '13', '1', '4', '4', '2015-12-03', '2016-01-30', 'auto', '1', '12', '66108', '0', '0', '0', '0', '0', '1', '1', '0', '0', '5', NULL, NULL);

### Structure of table `debtor_trans_details` ###

DROP TABLE IF EXISTS `debtor_trans_details`;

CREATE TABLE `debtor_trans_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `debtor_trans_no` int(11) DEFAULT NULL,
  `debtor_trans_type` int(11) DEFAULT NULL,
  `stock_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` tinytext COLLATE utf8_unicode_ci,
  `unit_price` double NOT NULL DEFAULT '0',
  `unit_tax` double NOT NULL DEFAULT '0',
  `quantity` double NOT NULL DEFAULT '0',
  `discount_percent` double NOT NULL DEFAULT '0',
  `standard_cost` double NOT NULL DEFAULT '0',
  `qty_done` double NOT NULL DEFAULT '0',
  `src_id` int(11) NOT NULL,
  `tax_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Transaction` (`debtor_trans_type`,`debtor_trans_no`),
  KEY `src_id` (`src_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `debtor_trans_details` ###

INSERT INTO `debtor_trans_details` VALUES
('1', '1', '13', 'Sales', 'Sales', '10101.8', '0', '1', '0', '0', '1', '1', '26'),
('2', '1', '10', 'Sales', 'Sales', '10101.8', '571.8', '1', '0', '0', '0', '1', '26'),
('3', '2', '13', 'Sales', 'Sales', '5469.6', '0', '1', '0', '0', '1', '2', '26'),
('4', '2', '10', 'Sales', 'Sales', '5469.6', '309.6', '1', '0', '0', '0', '3', '26'),
('5', '3', '13', 'Sales', 'Sales', '4028', '0', '1', '0', '0', '1', '3', '26'),
('6', '3', '10', 'Sales', 'Sales', '4028', '228', '1', '0', '0', '0', '5', '26'),
('7', '4', '13', 'Sales', 'Sales', '17405.2', '0', '1', '0', '0', '1', '4', '26'),
('8', '4', '10', 'Sales', 'Sales', '17405.2', '985.2', '1', '0', '0', '0', '7', '26'),
('9', '5', '13', 'Sales', 'Sales', '6595.32', '0', '1', '0', '0', '1', '5', '26'),
('10', '5', '10', 'Sales', 'Sales', '6595.32', '373.32', '1', '0', '0', '0', '9', '26'),
('11', '6', '13', 'Sales', 'Sales', '4250.6', '0', '1', '0', '0', '1', '6', '26'),
('12', '6', '10', 'Sales', 'Sales', '4250.6', '240.6', '1', '0', '0', '0', '11', '26'),
('13', '7', '13', 'Sales', 'Sales', '2635.16', '0', '1', '0', '0', '1', '7', '26'),
('14', '7', '10', 'Sales', 'Sales', '2635.16', '149.16', '1', '0', '0', '0', '13', '26'),
('15', '8', '13', 'Sales', 'Sales', '318', '0', '1', '0', '0', '1', '8', '26'),
('16', '8', '10', 'Sales', 'Sales', '318', '18', '1', '0', '0', '0', '15', '26'),
('17', '9', '13', 'Sales', 'Sales', '5936', '0', '1', '0', '0', '1', '9', '26'),
('18', '9', '10', 'Sales', 'Sales', '5936', '336', '1', '0', '0', '0', '17', '26'),
('19', '10', '13', 'Sales', 'Sales', '826.8', '0', '1', '0', '0', '1', '10', '26'),
('20', '10', '10', 'Sales', 'Sales', '826.8', '46.8', '1', '0', '0', '0', '19', '26'),
('21', '11', '13', 'Sales', 'Sales', '2035.2', '0', '1', '0', '0', '1', '11', '26'),
('22', '11', '10', 'Sales', 'Sales', '2035.2', '115.2', '1', '0', '0', '0', '21', '26'),
('23', '12', '13', 'Sales', 'Sales', '70074.48', '0', '1', '0', '0', '1', '12', '26'),
('24', '12', '10', 'Sales', 'Sales', '70074.48', '3966.48', '1', '0', '0', '0', '23', '26');

### Structure of table `debtors_master` ###

DROP TABLE IF EXISTS `debtors_master`;

CREATE TABLE `debtors_master` (
  `debtor_no` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `debtor_ref` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` tinytext COLLATE utf8_unicode_ci,
  `tax_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `curr_code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sales_type` int(11) NOT NULL DEFAULT '1',
  `dimension_id` int(11) NOT NULL DEFAULT '0',
  `dimension2_id` int(11) NOT NULL DEFAULT '0',
  `credit_status` int(11) NOT NULL DEFAULT '0',
  `payment_terms` int(11) DEFAULT NULL,
  `discount` double NOT NULL DEFAULT '0',
  `pymt_discount` double NOT NULL DEFAULT '0',
  `credit_limit` float NOT NULL DEFAULT '1000',
  `notes` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  `customer_tax_id` int(11) DEFAULT NULL,
  `industry_code` int(11) DEFAULT NULL,
  `msic` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`debtor_no`),
  UNIQUE KEY `debtor_ref` (`debtor_ref`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `debtors_master` ###

INSERT INTO `debtors_master` VALUES
('1', 'PERTUBUHAN PELADANG KAWASAN HULU LANGAT', 'PPKHL', 'BATU 14, PEKAN HULU LANGAT,\n43100 HULU LANGAT\nSELANGOR D.E\n', '', 'MYR', '1', '0', '0', '1', '5', '0', '0', '1000', '', '0', '-1', NULL, '-1'),
('2', 'KIN FUNG AGRICULTURAL SDN BHD', 'KIN FUNG', 'NO:1 JALAN B.R.J. D/2,\nTAMAN BUKIT RAWANG JAYA DUA,\n48000 RAWANG, SELANGOR D.E', '', 'MYR', '1', '0', '0', '1', '5', '0', '0', '1000', '', '0', '-1', NULL, '-1'),
('3', 'GOLDEN FRUIT ORCHARD SDN BHD', 'GOLDEN', 'NO:7 JALAN BRP 3/3C,\nSUNWAY RAHMAN PUTRA\n47000, SG BULOH\nSELANGOR D.E', '', 'MYR', '1', '0', '0', '1', '5', '0', '0', '1000', '', '0', '-1', NULL, '-1'),
('4', 'LIAN LEE KIMIA SDN BHD', 'LIAN LEE', 'LOT:3 &amp; 4, FU YEN BUILDING,\nMILE 1.5, JALAN TUARAN\nP.O BOX NO:14200,\nKOTA KINABALU, SABAH', '', 'MYR', '1', '0', '0', '1', '5', '0', '0', '1000', '', '0', '-1', NULL, '-1');

### Structure of table `dimensions` ###

DROP TABLE IF EXISTS `dimensions`;

CREATE TABLE `dimensions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type_` tinyint(1) NOT NULL DEFAULT '1',
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `date_` date NOT NULL DEFAULT '0000-00-00',
  `due_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `reference` (`reference`),
  KEY `date_` (`date_`),
  KEY `due_date` (`due_date`),
  KEY `type_` (`type_`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `dimensions` ###

INSERT INTO `dimensions` VALUES
('1', '1', 'Support', '1', '1', '2014-06-21', '2020-07-11'),
('2', '2', 'Development', '1', '0', '2014-06-21', '2014-06-21');

### Structure of table `exchange_rates` ###

DROP TABLE IF EXISTS `exchange_rates`;

CREATE TABLE `exchange_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curr_code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rate_buy` double NOT NULL DEFAULT '0',
  `rate_sell` double NOT NULL DEFAULT '0',
  `date_` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `curr_code` (`curr_code`,`date_`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `exchange_rates` ###


### Structure of table `fiscal_year` ###

DROP TABLE IF EXISTS `fiscal_year`;

CREATE TABLE `fiscal_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begin` date DEFAULT '0000-00-00',
  `end` date DEFAULT '0000-00-00',
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `begin` (`begin`),
  UNIQUE KEY `end` (`end`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `fiscal_year` ###

INSERT INTO `fiscal_year` VALUES
('1', '2015-01-01', '2015-12-31', '0'),
('3', '2016-01-01', '2016-12-31', '0'),
('4', '2017-01-01', '2017-11-30', '0');

### Structure of table `gl_trans` ###

DROP TABLE IF EXISTS `gl_trans`;

CREATE TABLE `gl_trans` (
  `counter` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) NOT NULL DEFAULT '0',
  `type_no` bigint(16) NOT NULL DEFAULT '1',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `memo_` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `dimension_id` int(11) NOT NULL DEFAULT '0',
  `dimension2_id` int(11) NOT NULL DEFAULT '0',
  `person_type_id` int(11) DEFAULT NULL,
  `person_id` tinyblob,
  `gst` int(11) NOT NULL,
  `openning` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`counter`),
  KEY `Type_and_Number` (`type`,`type_no`),
  KEY `dimension_id` (`dimension_id`),
  KEY `dimension2_id` (`dimension2_id`),
  KEY `tran_date` (`tran_date`),
  KEY `account_and_tran_date` (`account`,`tran_date`)
) ENGINE=InnoDB AUTO_INCREMENT=398 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `gl_trans` ###

INSERT INTO `gl_trans` VALUES
('389', '0', '3', '2016-11-30', '1065', 'Open Balance', '-0.000000000014551915228366852', '0', '0', NULL, NULL, '0', ''),
('390', '0', '3', '2016-11-30', '1070', 'Open Balance', '177032.46', '0', '0', NULL, NULL, '0', ''),
('391', '0', '3', '2016-11-30', '1200', 'Open Balance', '129676.16', '0', '0', NULL, NULL, '0', ''),
('392', '0', '3', '2016-11-30', '1300', 'Open Balance', '5746.78', '0', '0', NULL, NULL, '0', ''),
('393', '0', '3', '2016-11-30', '1510', 'Open Balance', '0', '0', '0', NULL, NULL, '0', ''),
('394', '0', '3', '2016-11-30', '1550', 'Open Balance', '0', '0', '0', NULL, NULL, '0', ''),
('395', '0', '3', '2016-11-30', '2100', 'Open Balance', '-101168.4', '0', '0', NULL, NULL, '0', ''),
('396', '0', '3', '2016-11-30', '2150', 'Open Balance', '-7340.16', '0', '0', NULL, NULL, '0', ''),
('397', '0', '3', '2016-11-30', '2680', 'Open Balance', '-228213.56999999998', '0', '0', NULL, NULL, '0', '');

### Structure of table `grn_batch` ###

DROP TABLE IF EXISTS `grn_batch`;

CREATE TABLE `grn_batch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL DEFAULT '0',
  `purch_order_no` int(11) DEFAULT NULL,
  `reference` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `delivery_date` date NOT NULL DEFAULT '0000-00-00',
  `loc_code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `delivery_date` (`delivery_date`),
  KEY `purch_order_no` (`purch_order_no`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `grn_batch` ###


### Structure of table `grn_items` ###

DROP TABLE IF EXISTS `grn_items`;

CREATE TABLE `grn_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grn_batch_id` int(11) DEFAULT NULL,
  `po_detail_item` int(11) NOT NULL DEFAULT '0',
  `item_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` tinytext COLLATE utf8_unicode_ci,
  `qty_recd` double NOT NULL DEFAULT '0',
  `quantity_inv` double NOT NULL DEFAULT '0',
  `tax_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `grn_batch_id` (`grn_batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `grn_items` ###


### Structure of table `groups` ###

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `description` (`description`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `groups` ###

INSERT INTO `groups` VALUES
('1', 'Small', '0'),
('2', 'Medium', '0'),
('3', 'Large', '0');

### Structure of table `item_codes` ###

DROP TABLE IF EXISTS `item_codes`;

CREATE TABLE `item_codes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `stock_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category_id` smallint(6) unsigned NOT NULL,
  `quantity` double NOT NULL DEFAULT '1',
  `is_foreign` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `stock_id` (`stock_id`,`item_code`),
  KEY `item_code` (`item_code`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `item_codes` ###

INSERT INTO `item_codes` VALUES
('2', 'Sales', 'Sales', 'Sales', '1', '1', '0', '0'),
('3', 'Purchase', 'Purchase', 'Purchase', '2', '1', '0', '0');

### Structure of table `item_tax_type_exemptions` ###

DROP TABLE IF EXISTS `item_tax_type_exemptions`;

CREATE TABLE `item_tax_type_exemptions` (
  `item_tax_type_id` int(11) NOT NULL DEFAULT '0',
  `tax_type_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_tax_type_id`,`tax_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `item_tax_type_exemptions` ###


### Structure of table `item_tax_types` ###

DROP TABLE IF EXISTS `item_tax_types`;

CREATE TABLE `item_tax_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `exempt` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `item_tax_types` ###

INSERT INTO `item_tax_types` VALUES
('1', 'Standard Rated', '0', '0'),
('2', 'GST Zero Rated', '0', '0');

### Structure of table `item_units` ###

DROP TABLE IF EXISTS `item_units`;

CREATE TABLE `item_units` (
  `abbr` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `decimals` tinyint(2) NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`abbr`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `item_units` ###

INSERT INTO `item_units` VALUES
('each', 'Each', '0', '0'),
('hr', 'Hours', '1', '0');

### Structure of table `loc_stock` ###

DROP TABLE IF EXISTS `loc_stock`;

CREATE TABLE `loc_stock` (
  `loc_code` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `stock_id` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `reorder_level` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`loc_code`,`stock_id`),
  KEY `stock_id` (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `loc_stock` ###

INSERT INTO `loc_stock` VALUES
('DEF', '_OILCOOKING', '0'),
('DEF', '_PHONE', '0'),
('DEF', '_RICE', '0'),
('DEF', '102', '0'),
('DEF', '103', '0'),
('DEF', '104', '0'),
('DEF', '201', '0'),
('DEF', '3400', '0'),
('DEF', 'ITM0001', '5'),
('DEF', 'PC0001', '0'),
('DEF', 'Purchase', '0'),
('DEF', 'Sales', '0'),
('DEF', 'SP001', '0'),
('DEF', 'tax-123', '0'),
('DEF', 'Test1', '0'),
('DEF', 'Test2', '0'),
('DEF', 'TP0001', '10');

### Structure of table `locations` ###

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `loc_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `location_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `delivery_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone2` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fax` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contact` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`loc_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `locations` ###

INSERT INTO `locations` VALUES
('DEF', 'Default', 'Delivery 1\nDelivery 2\nDelivery 3', '', '', '', '', '', '0');

### Structure of table `movement_types` ###

DROP TABLE IF EXISTS `movement_types`;

CREATE TABLE `movement_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `movement_types` ###

INSERT INTO `movement_types` VALUES
('1', 'Adjustment', '0');

### Structure of table `msic_division` ###

DROP TABLE IF EXISTS `msic_division`;

CREATE TABLE `msic_division` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `section` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1 ;

### Data of table `msic_division` ###

INSERT INTO `msic_division` VALUES
('1', '1', 'CROPS AND ANIMAL PRODUCTION, HUNTING', '1'),
('2', '1', 'FORESTRY &amp; LOGGING', '1'),
('3', '1', 'FISHING AND AQUACULTURE', '1'),
('4', '2', 'MINING OF COAL AND LIGNITE', '1'),
('5', '2', 'EXTRACTION OF CRUDE, PETROLEUM AND NATURAL GAS', '1'),
('6', '2', 'MINING OF METAL ORES', '1'),
('7', '2', 'OTHER MINING AND QUARRYING', '1'),
('8', '2', 'MINING SUPPORT SERVICE ACTIVITIES', '1'),
('9', '3', 'MANUFACTURE OF FOOD PRODUCTS', '1'),
('10', '3', 'MANUFACTURE OF BEVERAGES  .', '1'),
('11', '3', 'MANUFACTURE OF TOBACCO PRODUCTS', '1'),
('12', '3', 'MANUFACTURE OF TEXTILES', '1'),
('13', '3', 'MANUFACTURE OF WEARING APPAREL', '1'),
('14', '3', 'MANUFACTURE OF LEATHER AND RELATED PRODUCTS', '1'),
('15', '3', 'MANUFACTURE OF WOOD AND OF PRODUCTS', '1'),
('16', '3', 'MANUFACTURE OF PAPER AND PAPER PRODUCTS', '1'),
('17', '3', 'PRINTING AND REPRODUCTION OF RECORDED MEDIA', '1'),
('18', '3', 'MANUFACTURE OF COKE AND REFINED PETROLEUM PRODUCTS', '1'),
('19', '3', 'MANUFACTURE OF CHEMICALS AND CHEMICAL PRODUCTS', '1'),
('20', '3', 'MANUFACTURE OF BASIC PHARMACEUTICALS', '1'),
('21', '3', 'MANUFACTURE OF RUBBER &amp; PLASTIC PRODUCTS', '1'),
('22', '3', 'MANUFACTURE OF OTHER NON-METALLIC MINERAL PRODUCTS', '1'),
('23', '3', 'MANUFACTURE OF BASIC METALS', '1'),
('24', '3', 'MANUFACTURE OF FABRICATED METAL PRODUCTS', '1'),
('25', '3', 'MANUFACTURE OF COMPUTER, ELECTRONIC AND OPTICAL PRODUCTS', '1'),
('26', '3', 'MANUFACTURE OF ELECTRICAL EQUIPMENT', '1'),
('27', '3', 'MANUFACTURE OF MACHINERY AND EQUIPMENT N.E.0', '1'),
('28', '3', 'MANUFACTURE OF MOTOR VEHICLES, TRAILERS AND SEMI-TRAILERS', '1'),
('29', '3', 'MANUFACTURE OF OTHER TRANSPORT EQUIPMENT', '1'),
('30', '3', 'MANUFACTURE OF FURNITURE', '1'),
('31', '3', 'OTHER MANUFACTURING', '1'),
('32', '3', 'REPAIR AND INSTALLATION OF MACHINERY AND EQUIPMENT', '1'),
('33', '4', 'Electric power generation, transmission and distributio', '1'),
('34', '4', 'Manufacture of gas; distribution of gaseous fuels through mains', '1'),
('35', '4', 'Steam and air conditioning supply', '1'),
('36', '5', 'WATER COLLECTION, TREATMENT &amp; SUPPLY', '1'),
('37', '5', 'WASTE COLLECTION, TREATMENT &amp; DISPOSAL', '1'),
('38', '6', 'Construction of building', '1'),
('39', '6', 'CIVIL ENGINEERING', '1'),
('40', '6', 'SPECIALIZED CONSTRUCTION ACTIVTIES', '1'),
('41', '7', 'WHOLESALE, RETAIL TRADE, REPAIR OF MOTOR VEHICLES &amp; CYCLES', '1'),
('42', '7', 'WHOLESALE TRADE, EXCEPT OF MOTOR VEHICLES AND MOTORCYCLES', '1'),
('43', '7', 'RETAIL TRADE, EXCEPT OF MOTOR VEHICLES AND MOTORCYCLES', '1'),
('44', '8', 'LAND TRANSPORT AND TRANSPORT VIA PIPELINES', '1'),
('45', '8', 'WATER TRANSPORT', '1'),
('46', '8', 'AIR TRANSPORT', '1'),
('47', '8', 'WAREHOUSING AND SUPPORT ACTIVITIES FOR TRANSPORTATIO', '1'),
('48', '8', 'POSTAL AND COURIER-ACTIVITIES', '1'),
('49', '9', 'ACCOMMODATIO', '1'),
('50', '9', 'FOOD AND BEVERAGE SERVICE ACTIVITIES', '1'),
('51', '10', 'INFORMATION AND COMMUNICATIO', '1'),
('52', '10', 'MOTION PICTURE, VIDEO AND TELEVISION PROGRAMME PRODUCTION, SOUND RECORDING AND MUSIC PUBLISHING ACTIVITIES', '1'),
('53', '10', 'PROGRAMMING AND BROADCASTING ACTIVITIES', '1'),
('54', '10', 'COMPUTER PROGRAMMING, CONSULTANCY AND RELATED ACTIVITIES', '1'),
('55', '10', 'INFORMATION SERVICE ACTIVITIES', '1'),
('56', '11', 'FINANCIAL SERVICE ACTIVITIES', '1'),
('57', '11', 'INSURANCE/TAKAFUL, REINSURANCE/RETAKAFUL AND PENSION FUNDING, EXCEPT COMPULSORY SOCIAL SECURITY', '1'),
('58', '11', 'ACTIVITIES AUXILIARY TO FINANCIAL SERVICE AND INSURANCE/TAKAFUL ACTIVITIES', '1'),
('59', '12', 'REAL ESTATE ACTIVTIES', '1'),
('60', '13', 'PROFESSIONAL, SCIENTIFIC AND TECHNICAL ACTIVITIES', '1'),
('61', '13', 'ACTIVITIES OF HEAD OFFICES, MANAGEMENT CONSULTANCY ACTIVITIES', '1'),
('62', '13', 'ARCHITECTURAL AND ENGINEERING ACTIVITIES, TECHNICAL TESTING AND ANALYSIS', '1'),
('63', '13', 'SCIENTIFIC RESEARCH AND DEVELOPMENT', '1'),
('64', '13', 'ADVERTISING AND MARKET RESEARCH', '1'),
('65', '13', 'OTHER PROFESSIONAL, SCIENTIFIC AND TECHNICAL ACTIVITIES', '1'),
('66', '14', 'RENTAL &amp; LEASING ACTIVITIES', '1'),
('67', '14', 'EMPLOYMENT ACTIVITIES', '1'),
('68', '14', 'TRAVEL AGENCY, TOUR OPERATOR, RESERVATION SERVICE AND RELATED ACTIVITIES', '1'),
('69', '14', 'SECURITY AND INVESTIGATION ACTIVITIES', '1'),
('70', '14', 'SERVICES TO BUILDING AND LANDSCAPE ACTIVITIES', '1'),
('71', '14', 'OFFICE ADMINISTRATIVE, OFFICE SUPPORT AND OTHER BUSINESS SUPPORT ACTIVITIES', '1'),
('72', '15', 'PUBLIC ADMINISTRATION AND DEFENCE, COMPULSORY SOCIAL ACTIVITIES', '1'),
('73', '16', 'EDUCATIO', '1'),
('74', '17', 'HUMAN HEALTH AND SOCIAL WORK ACTIVITIES', '1'),
('75', '17', 'RESIDENTIAL CARE ACTIVITIES', '1'),
('76', '18', 'CREATIVE, ARTS AND ENTERTAINMENT ACTIVITIES', '1'),
('77', '18', 'LIBRARIES, ARCHIVES, MUSEUMS AND OTHER CULTURAL ACTIVITIES', '1'),
('78', '18', 'SPORTS ACTIVITIES AND AMUSEMENT AND RECREATION ACTIVITIES', '1'),
('79', '19', 'ACTIVITIES&#039;OF MEMBERSHIP ORGANIZATIONS', '1'),
('80', '19', 'REPAIR OF COMPUTERS AND PERSONAL AND HOUSEHOLD GOODS', '1'),
('81', '19', 'OTHER PERSONAL SERVICE ACTIVITIES', '1'),
('82', '20', 'GOODS- AND SERVICES-PRODUCING ACTIVITIES OF HOUSEHOLDS FOR OWN USE', '1'),
('83', '21', 'Activities of extraterritorial organizationd bodies', '1');

### Structure of table `msic_item` ###

DROP TABLE IF EXISTS `msic_item`;

CREATE TABLE `msic_item` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `division` int(11) NOT NULL,
  `code` varchar(8) NOT NULL,
  `description` varchar(200) NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1174 DEFAULT CHARSET=latin1 ;

### Data of table `msic_item` ###

INSERT INTO `msic_item` VALUES
('1', '1', '01111', 'Growing of maize', '1'),
('2', '1', '01112', 'Growing of leguminous crops', '1'),
('3', '1', '01113', 'Growing of oil seeds', '1'),
('4', '1', '01119', 'Growing of other cereals n.e.c.', '1'),
('5', '1', '01120', 'Growing of paddy', '1'),
('6', '1', '01131', 'Growing of leafy or stem vegetables', '1'),
('7', '1', '01132', 'Growing of fruits bearing vegetables', '1'),
('8', '1', '01133', 'Growing of melons', '1'),
('9', '1', '01134', 'Growing of mushrooms and truffles', '1'),
('10', '1', '01135', 'Growing of vegetables seeds, except beet seeds', '1'),
('11', '1', '01136', 'Growing of other vegetables', '1'),
('12', '1', '01137', 'Growing of sugar beet', '1'),
('13', '1', '01138', 'Growing of roots, tubers, bulb or tuberous vegetables', '1'),
('14', '1', '01140', 'Growing of sugar cane', '1'),
('15', '1', '01150', 'Growing of tobacco', '1'),
('16', '1', '01160', 'Growing of fibre crops', '1'),
('17', '1', '01191', 'Growing of flowers', '1'),
('18', '1', '01192', 'Growing of flower seeds', '1'),
('19', '1', '01193', 'Growing of sago (rumbia)', '1'),
('20', '1', '01199', 'Growing of other non-perennial crops n.e.c.', '1'),
('21', '1', '01210', 'Growing of grapes', '1'),
('22', '1', '01221', 'Growing of banana', '1'),
('23', '1', '01222', 'Growing of mango', '1'),
('24', '1', '01223', 'Growing of duria', '1'),
('25', '1', '01224', 'Growing of rambuta', '1'),
('26', '1', '01225', 'Growing of star fruit', '1'),
('27', '1', '01226', 'Growing of papaya', '1'),
('28', '1', '01227', 'Growing of pineapple', '1'),
('29', '1', '01228', 'Growing of pitaya (dragon fruit)', '1'),
('30', '1', '01229', 'Growing of other tropical and subtropical fruits n.e.c.', '1'),
('31', '1', '01231', 'Growing of pomelo', '1'),
('32', '1', '01232', 'Growing of lemon and limes', '1'),
('33', '1', '01233', 'Growing of tangerines and mandari', '1'),
('34', '1', '01239', 'Growing of other citrus fruits n.e.c.', '1'),
('35', '1', '01241', 'Growing of guava', '1'),
('36', '1', '01249', 'Growing of other pome fruits and stones fruits n.e.c.', '1'),
('37', '1', '01251', 'Growing of berries', '1'),
('38', '1', '01252', 'Growing of fruit seeds', '1'),
('39', '1', '01253', 'Growing of edible nuts', '1'),
('40', '1', '01259', 'Growing of other tree and bush fruits', '1'),
('41', '1', '01261', 'Growing of oil palm (estate)', '1'),
('42', '1', '01262', 'Growing of oil palm (smallholdings)', '1'),
('43', '1', '01263', 'Growing of coconut (estate and smallholdings)', '1'),
('44', '1', '01269', 'Growing of other oleaginous fruits n.e.c.', '1'),
('45', '1', '01271', 'Growing of coffee', '1'),
('46', '1', '01272', 'Growing of tea', '1'),
('47', '1', '01273', 'Growing of cocoa', '1'),
('48', '1', '01279', 'Growing of other beverage crops n.e.c.', '1'),
('49', '1', '01281', 'Growing of pepper (piper nigrum)', '1'),
('50', '1', '01282', 'Growing of chilies and pepper (capsicum spp.)', '1'),
('51', '1', '01283', 'Growing of nutmeg', '1'),
('52', '1', '01284', 'Growing of ginger', '1'),
('53', '1', '01285', 'Growing of plants used primarily in perfumery, in pharmacy or for insecticidal, fungicidal or similar purposes', '1'),
('54', '1', '01289', 'Growing of other spices and aromatic crops n.e.c.', '1'),
('55', '1', '01291', 'Growing of rubber trees (estate)', '1'),
('56', '1', '01292', 'Growing of rubber trees (smallholdings)', '1'),
('57', '1', '01293', 'Growing of trees for extraction of sap', '1'),
('58', '1', '01294', 'Growing of nipa palm', '1'),
('59', '1', '01295', 'Growing of areca', '1'),
('60', '1', '01296', 'Growing of roselle', '1'),
('61', '1', '01299', 'Growing of other perennial crops n.e.c.', '1'),
('62', '1', '01301', 'Growing of plants for planting', '1'),
('63', '1', '01302', 'Growing of plants for ornamental purposes', '1'),
('64', '1', '01303', 'Growing of live plants for bulbs, tubers and roots; cuttings and slips; mushroom spaw', '1'),
('65', '1', '01304', 'Operation of tree nurseries', '1'),
('66', '1', '01411', 'Raising, breeding and production of cattle or buffaloes', '1'),
('67', '1', '01412', 'Production of raw milk from cows or buffaloes', '1'),
('68', '1', '01413', 'Production of bovine seme', '1'),
('69', '1', '01420', 'Raising and breeding of horses, asses, mules or hinnes', '1'),
('70', '1', '01430', 'Raising and breeding of camels (dromedary) and camelids', '1'),
('71', '1', '01441', 'Raising, breeding and production of sheep and goats', '1'),
('72', '1', '01442', 'Production of raw sheep or goat&#039;s milk', '1'),
('73', '1', '01443', 'Production of raw wool', '1'),
('74', '1', '01450', 'Raising, breeding and production of swine/pigs', '1'),
('75', '1', '01461', 'Raising, breeding and production of chicken, broiler', '1'),
('76', '1', '01462', 'Raising, breeding and production of ducks', '1'),
('77', '1', '01463', 'Raising, breeding and production of geese', '1'),
('78', '1', '01464', 'Raising, breeding and production of quails', '1'),
('79', '1', '01465', 'Raising and breeding of other poultry n.e.c.', '1'),
('80', '1', '01466', 'Production of chicken eggs', '1'),
('81', '1', '01467', 'Production of duck eggs', '1'),
('82', '1', '01468', 'Production of other poultry eggs n.e.c.', '1'),
('83', '1', '01469', 'Operation of poultry hatcheries', '1'),
('84', '1', '01491', 'Raising, breeding and production of semi-domesticated', '1'),
('85', '1', '01492', 'Production of fur skins, reptile or bird&#039;s skin from ranching operatio', '1'),
('86', '1', '01493', 'Operation of worm farms, land mollusc farms, snail farms', '1'),
('87', '1', '01494', 'Raising of silk worms and production of silk worm cocoons', '1'),
('88', '1', '01495', 'Bee keeping and production of honey and beeswax', '1'),
('89', '1', '01496', 'Raising and breeding of pet animals', '1'),
('90', '1', '01497', 'Raising and breeding of swiflet', '1'),
('91', '1', '01499', 'Raising of diverse/other animals n.e.c.', '1'),
('92', '1', '01500', 'Mixed Farming', '1'),
('93', '1', '01610', 'Agricultural activities for crops production on a fee or contract basis', '1'),
('94', '1', '01620', 'Agricultural activities for animal production on a fee or contract basis', '1'),
('95', '1', '01631', 'Preparation of crops for primary markets', '1'),
('96', '1', '01632', 'Preparation of tobacco leaves', '1'),
('97', '1', '01633', 'Preparation of cocoa beans', '1'),
('98', '1', '01634', 'Sun-drying of fruits and vegetables', '1'),
('99', '1', '01640', 'Seed processing for propagatio', '1'),
('100', '1', '01701', 'Hunting and trapping on a commercial basis', '1'),
('101', '1', '01702', 'Taking of animals (dead or alive)', '1'),
('102', '2', '02101', 'Planting, replanting, transplanting, thinning and conserving of forests and timber tracts', '1'),
('103', '2', '02102', 'Growing of coppice, pulpwood and fire wood', '1'),
('104', '2', '02103', 'Operation of forest tree nurseries', '1'),
('105', '2', '02104', 'Collection and raising of wildings (peat swamp forest tree species)', '1'),
('106', '2', '02105', 'Forest plantatio', '1'),
('107', '2', '02201', 'Production of round wood for forest-based manufacturing industries', '1'),
('108', '2', '02202', 'Production of round wood used in an unprocessed form', '1'),
('109', '2', '02203', 'Production of charcoal in the forest (using traditional methods)', '1'),
('110', '2', '02204', 'Rubber wood logging', '1'),
('111', '2', '02301', 'Collection of rattan, bamboo', '1'),
('112', '2', '02302', 'Bird&#039;s nest collectio', '1'),
('113', '2', '02303', 'Wild sago palm collectio', '1'),
('114', '2', '02309', 'Gathering of non-wood forest products n.e.c.', '1'),
('115', '2', '02401', 'Carrying out part of the forestry and forest plantation operation on a fee or contract basis for forestry service activities', '1'),
('116', '2', '02402', 'Carrying out part of the forestry operation on a fee or contract basis for logging service activities', '1'),
('117', '3', '03111', 'Fishing on a commercial basis in ocean and coastal waters', '1'),
('118', '3', '03112', 'Collection of marine crustaceans and molluscs', '1'),
('119', '3', '03113', 'Taking of aquatic animals: sea squirts, tunicates, sea urchins', '1'),
('120', '3', '03114', 'Activities of vessels engaged both in fishing and in processing and preserving of fish', '1'),
('121', '3', '03115', 'Gathering of other marine organisms and materials (natural pearls, sponges, coral and algae)', '1'),
('122', '3', '03119', 'Marine fishing n.e.c.', '1'),
('123', '3', '03121', 'Fishing on a commercial basis in inland waters', '1'),
('124', '3', '03122', 'Taking of freshwater crustaceans and molluscs', '1'),
('125', '3', '03123', 'Taking of freshwater aquatic animals', '1'),
('126', '3', '03124', 'Gathering of freshwater flora and fauna', '1'),
('127', '3', '03129', 'Freshwater fishing n.e.c.', '1'),
('128', '3', '03211', 'Fish farming in sea water', '1'),
('129', '3', '03212', 'Production of bivalve spat (oyster, mussel), lobster lings, shrimp post-larvae, fish fry and fingerlings', '1'),
('130', '3', '03213', 'Growing of laver and other edible seaweeds', '1'),
('131', '3', '03214', 'Culture of crustaceans, bivalves, other molluscs and other aquatic animals in sea water', '1'),
('132', '3', '03215', 'Aquaculture activities in brackish water', '1'),
('133', '3', '03216', 'Aquaculture activities in salt water filled tanks or reservoirs', '1'),
('134', '3', '03217', 'Operation of hatcheries (marine)', '1'),
('135', '3', '03218', 'Operation of marine worm farms for fish feed', '1'),
('136', '3', '03219', 'Marine aquaculture n.e.c.', '1'),
('137', '3', '03221', 'Fish farming in freshwater', '1'),
('138', '3', '03222', 'Shrimp farming in freshwater', '1'),
('139', '3', '03223', 'Culture of freshwater crustaceans, bivalves, other molluscs and other aquatic animals', '1'),
('140', '3', '03224', 'Operation of hatcheries (freshwater)', '1'),
('141', '3', '03225', 'Farming of frogs', '1'),
('142', '3', '03229', 'Freshwater aquaculture n.e.c.', '1'),
('143', '4', '05100', 'Mining of hard coal', '1'),
('144', '4', '05200', 'Mining of lignite (brown coal)', '1'),
('145', '5', '06101', 'Extraction of crude petroleum oils', '1'),
('146', '5', '06102', 'Extraction of bituminous or oil shale and tar sand', '1'),
('147', '5', '06103', 'Production of crude petroleum from bituminous shale and sand', '1'),
('148', '5', '06104', 'Processes to obtain crude oils', '1'),
('149', '5', '06201', 'Production of crude gaseous hydrocarbon (natural gas)', '1'),
('150', '5', '06202', 'Extraction of condensates', '1'),
('151', '5', '06203', 'Draining and separation of liquid hydrocarbon fractions', '1'),
('152', '5', '06204', 'Gas desulphurizatio', '1'),
('153', '5', '06205', 'Mining of hydrocarbon liquids, obtain through liquefaction or pyrolysis', '1'),
('154', '6', '07101', 'Mining of ores valued chiefly for iron content', '1'),
('155', '6', '07102', 'Beneficiation and agglomeration of iron ores', '1'),
('156', '6', '07210', 'Mining of uranium and thorium ores', '1'),
('157', '6', '07291', 'Mining of tin ores', '1'),
('158', '6', '07292', 'Mining of copper', '1'),
('159', '6', '07293', 'Mining of bauxite (aluminium)', '1'),
('160', '6', '07294', 'Mining of ilmenite', '1'),
('161', '6', '07295', 'Mining of gold', '1'),
('162', '6', '07296', 'Mining of silver', '1'),
('163', '6', '07297', 'Mining of platinum', '1'),
('164', '6', '07298', 'Amang retreatment', '1'),
('165', '6', '07299', 'Mining of other non-ferrous metal ores n.e.c.', '1'),
('166', '7', '08101', 'Quarrying, rough trimming and sawing of monumental and building stone such as marble, granite (dimension stone), sandstone', '1'),
('167', '7', '08102', 'Quarrying, crushing and breaking of limestone', '1'),
('168', '7', '08103', 'Mining of gypsum and anhydrite', '1'),
('169', '7', '08104', 'Mining of chalk and uncalcined dolomite', '1'),
('170', '7', '08105', 'Extraction and dredging of industrial sand, sand for construction and gravel', '1'),
('171', '7', '08106', 'Breaking and crushing of stone and gravel', '1'),
('172', '7', '08107', 'Quarrying of sand', '1'),
('173', '7', '08108', 'Mining of clays, refractory clays and kaoli', '1'),
('174', '7', '08109', 'Quarrying, crushing and breaking of granite', '1'),
('175', '7', '08911', 'Mining of natural phosphates', '1'),
('176', '7', '08912', 'Mining of natural potassium salts', '1'),
('177', '7', '08913', 'Mining of native sulphur', '1'),
('178', '7', '08914', 'Extraction and preparation of pyrites and pyrrhotite, except roasting', '1'),
('179', '7', '08915', 'Mining of natural barium sulphate and carbonate (barytes and witherite)', '1'),
('180', '7', '08916', 'Mining of natural borates, natural magnesium sulphates (kieserite)', '1'),
('181', '7', '08917', 'Mining of earth colours, fluorspar and other minerals valued chiefly as a source of chemicals', '1'),
('182', '7', '08918', 'Guano mining', '1'),
('183', '7', '08921', 'Peat digging', '1'),
('184', '7', '08922', 'Peat agglomeratio', '1'),
('185', '7', '08923', 'Preparation of peat to improve quality or facilitate transport or storage', '1'),
('186', '7', '08931', 'Extraction of salt from underground', '1'),
('187', '7', '08932', 'Salt production by evaporation of sea water or other saline waters', '1'),
('188', '7', '08933', 'Crushing, purification and refining of salt by the producer', '1'),
('189', '7', '08991', 'Mining and quarrying of abrasive materials', '1'),
('190', '7', '08992', 'Mining and quarrying of asbestos', '1'),
('191', '7', '08993', 'Mining and quarrying of siliceous fossil meals', '1'),
('192', '7', '08994', 'Mining and quarrying of natural graphite', '1'),
('193', '7', '08995', 'Mining and quarrying of steatite (talc)', '1'),
('194', '7', '08996', 'Mining and quarrying of gemstones', '1'),
('195', '7', '08999', 'Other mining and quarrying n.e.c.', '1'),
('196', '8', '09101', 'Oil and gas extraction service activities provided on a fee or contract basis', '1'),
('197', '8', '09102', 'Oil and gas field fire fighting services', '1'),
('198', '8', '09900', 'Support activities for other mining and quarrying', '1'),
('199', '9', '10101', 'Processing and preserving of meat and production of meat products', '1'),
('200', '9', '10102', 'Processing and preserving of poultry and poultry products', '1'),
('201', '9', '10103', 'Production of hides and skins originating from slaughterhouses', '1'),
('202', '9', '10104', 'Operation of slaughterhouses engaged in killing, houses dressing or packing meat', '1'),
('203', '9', '10109', 'Processing and preserving of meat n.e.c.', '1'),
('204', '9', '10201', 'Canning of fish, crustaceans and mollusks', '1'),
('205', '9', '10202', 'Processing, curing and preserving of fish, crustacean and molluscs', '1'),
('206', '9', '10203', 'Production of fish meals for human consumption or animal feed', '1'),
('207', '9', '10204', 'Production of keropok including keropok lekor', '1'),
('208', '9', '10205', 'Processing of seaweed', '1'),
('209', '9', '10301', 'Manufacture of fruits and vegetable food products', '1'),
('210', '9', '10302', 'Manufacture of fruit and vegetable juices', '1'),
('211', '9', '10303', 'Pineapple canning', '1'),
('212', '9', '10304', 'Manufacture of jams, marmalades and table jellies', '1'),
('213', '9', '10305', 'Manufacture of nuts and nut products', '1'),
('214', '9', '10306', 'Manufacture of bean curd products', '1'),
('215', '9', '10401', 'Manufacture of crude palm oil', '1'),
('216', '9', '10402', 'Manufacture of refined palm oil', '1'),
('217', '9', '10403', 'Manufacture of palm kernel oil', '1'),
('218', '9', '10404', 'Manufacture of crude and refined vegetable oil', '1'),
('219', '9', '10405', 'Manufacture of coconut oil', '1'),
('220', '9', '10406', 'Manufacture of compound cooking fats', '1'),
('221', '9', '10407', 'Manufacture of animal oils and fats', '1'),
('222', '9', '10501', 'Manufacture of ice cream and other edible ice such as sorbet', '1'),
('223', '9', '10502', 'Manufacture of condensed, powdered and evaporated milk', '1'),
('224', '9', '10509', 'Manufacture of other dairy products n.e.c.', '1'),
('225', '9', '10611', 'Rice milling', '1'),
('226', '9', '10612', 'Provision of milling services', '1'),
('227', '9', '10613', 'Flour milling', '1'),
('228', '9', '10619', 'Manufacture of grain mill products n.e.c.', '1'),
('229', '9', '10621', 'Manufacture of starches and starch products', '1'),
('230', '9', '10622', 'Manufacture of glucose, glucose syrup, maltose, inuli', '1'),
('231', '9', '10623', 'Manufacture of sago and tapioca flour/products', '1'),
('232', '9', '10711', 'Manufacture of biscuits and cookies', '1'),
('233', '9', '10712', 'Manufacture of bread, cakes and other bakery products', '1'),
('234', '9', '10713', 'Manufacture of snack products', '1'),
('235', '9', '10714', 'Manufacture of frozen bakery products', '1'),
('236', '9', '10721', 'Manufacture of sugar', '1'),
('237', '9', '10722', 'Manufacture of sugar products', '1'),
('238', '9', '10731', 'Manufacture of cocoa products', '1'),
('239', '9', '10732', 'Manufacture of chocolate and chocolate products', '1'),
('240', '9', '10733', 'Manufacture of sugar confectionery', '1'),
('241', '9', '10741', 'Manufacture of meehoon, noodles and other related products', '1'),
('242', '9', '10742', 'Manufacture of pastas', '1'),
('243', '9', '10750', 'Manufacture of prepared meals and dishes', '1'),
('244', '9', '10791', 'Manufacture of coffee', '1'),
('245', '9', '10792', 'Manufacture of tea', '1'),
('246', '9', '10793', 'Manufacture of sauces and condiments', '1'),
('247', '9', '10794', 'Manufacture of spices and curry powder', '1'),
('248', '9', '10795', 'Manufacture of egg products', '1'),
('249', '9', '10799', 'Manufacture of other food products n.e.c.', '1'),
('250', '9', '10800', 'Manufacture of prepared animal feeds', '1'),
('251', '10', '11010', 'Distilling, rectifying and blending of spirits', '1'),
('252', '10', '11020', 'Manufacture of wines', '1'),
('253', '10', '11030', 'Manufacture of malt liquors and malt', '1'),
('254', '10', '11041', 'Manufacture of soft drinks', '1'),
('255', '10', '11042', 'Production of natural mineral water and other bottled water', '1'),
('256', '11', '12000', 'MANUFACTURE OF TOBACCO PRODUCTS', '1'),
('257', '12', '13110', 'Preparation and spinning of textile fibres', '1'),
('258', '12', '13120', 'Weaving of textiles', '1'),
('259', '12', '13131', 'Batik making', '1'),
('260', '12', '13132', 'Dyeing, bleaching, printing and finishing of yarns and fabrics', '1'),
('261', '12', '13139', 'Other finishing textiles', '1'),
('262', '12', '13910', 'Manufacture of knitted and crocheted fabrics', '1'),
('263', '12', '13921', 'Manufacture of made-up articles of any textile materials, including of knitted or crocheted fabrics', '1'),
('264', '12', '13922', 'Manufacture of made-up furnishing articles', '1'),
('265', '12', '13930', 'Manufacture of carpets and rugs', '1'),
('266', '12', '13940', 'Manufacture of cordage, rope, twine and netting', '1'),
('267', '12', '13990', 'Manufacture of other textiles n.e.c.', '1'),
('268', '13', '14101', 'Manufacture of specific wearing apparel', '1'),
('269', '13', '14102', 'Manufacture of clothings', '1'),
('270', '13', '14103', 'Custom tailoring', '1'),
('271', '13', '14109', 'Manufacture of other clothing accessories', '1'),
('272', '13', '14200', 'Manufacture of articles made of fur skins', '1'),
('273', '13', '14300', 'Manufacture of knitted and crocheted apparel', '1'),
('274', '14', '15110', 'Tanning and dressing of leather; dressing and dyeing of fur', '1'),
('275', '14', '15120', 'Manufacture of luggage, handbags and the like, saddlery and harness', '1'),
('276', '14', '15201', 'Manufacture of leather footwear', '1'),
('277', '14', '15202', 'Manufacture of plastic footwear', '1'),
('278', '14', '15203', 'Manufacture of rubber footwear', '1'),
('279', '14', '15209', 'Manufacture of other footwear n.e.c.', '1'),
('280', '15', '16100', 'Sawmilling and planning of wood', '1'),
('281', '15', '16211', 'Manufacture of veneer sheets and plywood', '1'),
('282', '15', '16212', 'Manufacture of particle board and fibreboard', '1'),
('283', '15', '16221', 'Manufacture of builders&#039; carpentry', '1'),
('284', '15', '16222', 'Manufacture of joinery wood products', '1'),
('285', '15', '16230', 'Manufacture of wooden containers', '1'),
('286', '15', '16291', 'Manufacture of wood charcoal', '1'),
('287', '15', '16292', 'Manufacture of other products of wood, cane, articles of cork, straw and plaiting materials', '1'),
('288', '16', '17010', 'Manufacture of pulp, paper and paperboard', '1'),
('289', '16', '17020', 'Manufacture of corrugated paper and paperboard and of containers of paper and paperboard', '1'),
('290', '16', '17091', 'Manufacture of envelopes and letter-card', '1'),
('291', '16', '17092', 'Manufacture of household and personal hygiene paper', '1'),
('292', '16', '17093', 'Manufacture of gummed or adhesive paper in strips or rolls and labels and wall paper', '1'),
('293', '16', '17094', 'Manufacture of effigies, funeral paper goods, joss paper', '1'),
('294', '16', '17099', 'Manufacture of other articles of paper and paperboard n.e.c.', '1'),
('295', '17', '18110', 'Printing', '1'),
('296', '17', '18120', 'Service activities related to printing', '1'),
('297', '17', '18200', 'Reproduction of recorded media', '1'),
('298', '18', '19100', 'Manufacture of coke oven products', '1'),
('299', '18', '19201', 'Manufacture of refined petroleum products', '1'),
('300', '18', '19202', 'Manufacture of bio-diesel products', '1'),
('301', '19', '20111', 'Manufacture of liquefied or compressed inorganic industrial or medical gases', '1'),
('302', '19', '20112', 'Manufacture of basic organic chemicals', '1'),
('303', '19', '20113', 'Manufacture of inorganic compounds', '1'),
('304', '19', '20119', 'Manufacture of other basic chemicals n.e.c.', '1'),
('305', '19', '20121', 'Manufacture of fertilizers', '1'),
('306', '19', '20129', 'Manufacture of associated nitrogen products', '1'),
('307', '19', '20131', 'Manufacture of plastic in primary forms', '1'),
('308', '19', '20132', 'Manufacture of synthetic rubber in primary forms: synthetic rubber, factice', '1'),
('309', '19', '20133', 'Manufacture of mixtures of synthetic rubber and natural rubber or rubber - like gums', '1'),
('310', '19', '20210', 'Manufacture of pesticides and other agrochemical products', '1'),
('311', '19', '20221', 'Manufacture of paints, varnishes and similar coatings ink and mastics', '1'),
('312', '19', '20222', 'Manufacture of printing ink', '1'),
('313', '19', '20231', 'Manufacture of soap and detergents, cleaning and polishing preparations', '1'),
('314', '19', '20232', 'Manufacture of perfumes and toilet preparations', '1'),
('315', '19', '20291', 'Manufacture of photographic plates, films, sensitized paper and other sensitized unexposed materials', '1'),
('316', '19', '20292', 'Manufacture of writing and drawing ink', '1'),
('317', '19', '20299', 'Manufacture of other chemical products n.e.c.', '1'),
('318', '19', '20300', 'Manufacture of man-made fibres', '1'),
('319', '20', '21001', 'Manufacture of medicinal active substances to be used for their pharmacological properties in the manufacture of medicaments', '1'),
('320', '20', '21002', 'Processing of blood', '1'),
('321', '20', '21003', 'Manufacture of medicaments', '1'),
('322', '20', '21004', 'Manufacture of chemical contraceptive products', '1'),
('323', '20', '21005', 'Manufacture of medical diagnostic preparatio', '1'),
('324', '20', '21006', 'Manufacture of radioactive in-vivo diagnostic substances', '1'),
('325', '20', '21007', 'Manufacture of biotech pharmaceuticals', '1'),
('326', '20', '21009', 'Manufacture of other pharmaceuticals, medicinal chemical and botanical products n.e.c.', '1'),
('327', '21', '22111', 'Manufacture of rubber tyres for vehicles', '1'),
('328', '21', '22112', 'Manufacture of interchangeable tyre treads and retreading rubber tyres', '1'),
('329', '21', '22191', 'Manufacture of other products of natural or synthetic rubber, unvulcanized, vulcanized or hardened', '1'),
('330', '21', '22192', 'Manufacture of rubber gloves', '1'),
('331', '21', '22193', 'Rubber remilling and latex processing', '1'),
('332', '21', '22199', 'Manufacture of other rubber products n.e.c', '1'),
('333', '21', '22201', 'Manufacture of semi-manufactures of plastic products', '1'),
('334', '21', '22202', 'Manufacture of finished plastic products', '1'),
('335', '21', '22203', 'Manufacture of plastic articles for the packing of goods', '1'),
('336', '21', '22204', 'Manufacture of builders&#039; plastics ware', '1'),
('337', '21', '22205', 'Manufacture of plastic tableware, kitchenware and toilet articles', '1'),
('338', '21', '22209', 'Manufacture of diverse plastic products n.e.c.', '1'),
('339', '22', '23101', 'Manufacture of flat glass, including wired, coloured or tinted flat glass', '1'),
('340', '22', '23102', 'Manufacture of laboratory, hygienic or pharmaceutical glassware', '1'),
('341', '22', '23109', 'Manufacture of other glass products n.e.c.', '1'),
('342', '22', '23911', 'Manufacture of refractory mortars and concretes', '1'),
('343', '22', '23912', 'Manufacture of refractory ceramic goods', '1'),
('344', '22', '23921', 'Manufacture of non-refractory ceramic', '1'),
('345', '22', '23929', 'Manufacture of other clay building materials', '1'),
('346', '22', '23930', 'Manufacture of other porcelain and ceramic products', '1'),
('347', '22', '23941', 'Manufacture of hydraulic cement', '1'),
('348', '22', '23942', 'Manufacture of lime and plaster', '1'),
('349', '22', '23951', 'Manufacture of ready-mix and dry-mix concrete and mortars', '1'),
('350', '22', '23952', 'Manufacture of precast concrete, cement or artificial stone articles for use in constructio', '1'),
('351', '22', '23953', 'Manufacture of prefabricated structural components for building or civil engineering of cement, concrete or artificial stone', '1'),
('352', '22', '23959', 'Manufacture of other articles of concrete, cement and plaster n.e.c.', '1'),
('353', '22', '23960', 'Cutting, shaping and finishing of stone', '1'),
('354', '22', '23990', 'Manufacture of other non-metallic mineral products n.e.c.', '1'),
('355', '23', '24101', 'Production of pig iron and spiegeleisen in pigs, blocks or other primary forms', '1'),
('356', '23', '24102', 'Production of bars and rods of stainless steel or other alloy steel', '1'),
('357', '23', '24103', 'Manufacture of seamless tubes, by hot rolling, hot extrusion or hot drawing, or by cold drawing or cold rolling', '1'),
('358', '23', '24104', 'Manufacture of steel tube fittings', '1'),
('359', '23', '24109', 'Manufacture of other basic iron and steel products n.e.c.', '1'),
('360', '23', '24201', 'Tin smelting', '1'),
('361', '23', '24202', 'Production of aluminium from alumina', '1'),
('362', '23', '24209', 'Manufacture of other basic precious and other non-ferrous metals n.e.c.', '1'),
('363', '23', '24311', 'Casting of iro', '1'),
('364', '23', '24312', 'Casting of steel', '1'),
('365', '23', '24320', 'Casting of non-ferrous metals', '1'),
('366', '24', '25111', 'Manufacture of industrial frameworks in metal', '1'),
('367', '24', '25112', 'Manufacture of prefabricated buildings mainly of metal', '1'),
('368', '24', '25113', 'Manufacture of metal doors, windows and their frames, shutters and gates', '1'),
('369', '24', '25119', 'Manufacture of other structural metal products', '1'),
('370', '24', '25120', 'Manufacture of tanks, reservoirs and containers of metal', '1'),
('371', '24', '25130', 'Manufacture of steam generators, except central heating hot water boilers', '1'),
('372', '24', '25200', 'Manufacture of weapons and ammunitio', '1'),
('373', '24', '25910', 'Forging, pressing, stamping and roll-forming of metal; powder metallurgy', '1'),
('374', '24', '25920', 'Treatment and coating of metals; machining', '1'),
('375', '24', '25930', 'Manufacture of cutlery, hand tools and general hardware', '1'),
('376', '24', '25991', 'Manufacture of tins and cans for food products, collapsible tubes and boxes', '1'),
('377', '24', '25992', 'Manufacture of metal cable, plaited bands and similar articles', '1'),
('378', '24', '25993', 'Manufacture of bolts, screws, nuts and similar threaded products', '1'),
('379', '24', '25994', 'Manufacture of metal household articles', '1'),
('380', '24', '25999', 'Manufacture of any other fabricated metal products n.e.c.', '1'),
('381', '25', '26101', 'Manufacture of diodes, transistors and similar semiconductor devices', '1'),
('382', '25', '26102', 'Manufacture electronic integrated circuits micro assemblies', '1'),
('383', '25', '26103', 'Manufacture of electrical capacitors and resistors', '1'),
('384', '25', '26104', 'Manufacture of printed circuit boards', '1'),
('385', '25', '26105', 'Manufacture of display components', '1'),
('386', '25', '26109', 'Manufacture of other components for electronic applications', '1'),
('387', '25', '26201', 'Manufacture of computers', '1'),
('388', '25', '26202', 'Manufacture of peripheral equipment', '1'),
('389', '25', '26300', 'Manufacture of communication equipment', '1'),
('390', '25', '26400', 'Manufacture of consumer electronics', '1'),
('391', '25', '26511', 'Manufacture of measuring, testing, navigating and control equipment', '1'),
('392', '25', '26512', 'Manufacture of industrial process control equipment', '1'),
('393', '25', '26520', 'Manufacture of watches and clocks and parts', '1'),
('394', '25', '26600', 'Manufacture of irradiation, electro medical and electrotherapeutic equipment', '1'),
('395', '25', '26701', 'Manufacture of optical instruments and equipment', '1'),
('396', '25', '26702', 'Manufacture of photographic equipment', '1'),
('397', '25', '26800', 'Manufacture of magnetic and optical recording media', '1'),
('398', '26', '27101', 'Manufacture of electric motors, generators and transformers', '1'),
('399', '26', '27102', 'Manufacture of electricity distribution and control apparatus', '1'),
('400', '26', '27200', 'Manufacture of batteries and accumulators', '1'),
('401', '26', '27310', 'Manufacture of fibre optic cables', '1'),
('402', '26', '27320', 'Manufacture of other electronic and electric wires and cables', '1'),
('403', '26', '27330', 'Manufacture of current-carrying and non current-carrying wiring devices for electrical circuits regardless of material', '1'),
('404', '26', '27400', 'Manufacture of electric lighting equipment', '1'),
('405', '26', '27500', 'Manufacture of domestic appliances', '1'),
('406', '26', '27900', 'Manufacture of miscellaneous electrical equipment other than motors, generators and transformers, batteries and accumulators, wires and wiring devices, lighting equipment or domestic appliances', '1'),
('407', '27', '28110', 'Manufacture of engines and turbines, except aircraft, vehicle and cycle engines', '1'),
('408', '27', '28120', 'Manufacture of fluid power equipment', '1'),
('409', '27', '28130', 'Manufacture of other pumps, compressors, taps and valves', '1'),
('410', '27', '28140', 'Manufacture of bearings, gears, gearing and driving elements', '1'),
('411', '27', '28150', 'Manufacture of ovens, furnaces and furnace burners', '1'),
('412', '27', '28160', 'Manufacture of lifting and handling equipment', '1'),
('413', '27', '28170', 'Manufacture of office machinery and equipment (except computers and peripheral equipment)', '1'),
('414', '27', '28180', 'Manufacture of power-driven hand tools with self-contained electric or non-electric motor or pneumatic drives', '1'),
('415', '27', '28191', 'Manufacture of refrigerating or freezing industrial equipment', '1'),
('416', '27', '28192', 'Manufacture of air-conditioning machines, including for motor vehicles', '1'),
('417', '27', '28199', 'Manufacture of other general-purpose machinery n.e.c.', '1'),
('418', '27', '28210', 'Manufacture of agricultural and forestry machinery', '1'),
('419', '27', '28220', 'Manufacture of metal-forming machinery and machine tools', '1'),
('420', '27', '28230', 'Manufacture of machinery for metallurgy', '1'),
('421', '27', '28240', 'Manufacture of machinery for mining, quarrying and constructio', '1'),
('422', '27', '28250', 'Manufacture of machinery for food, beverage and tobacco processing', '1'),
('423', '27', '28260', 'Manufacture of machinery for textile, apparel and leather productio', '1'),
('424', '27', '28290', 'Manufacture of other special-purpose machinery n.e.c.', '1'),
('425', '28', '29101', 'Manufacture of passenger cars', '1'),
('426', '28', '29102', 'Manufacture of commercial vehicles', '1'),
('427', '28', '29200', 'Manufacture of bodies (coachwork) for motor vehicles; manufacture of trailers and semitrailers', '1'),
('428', '28', '29300', 'Manufacture of parts and accessories for motor vehicles', '1'),
('429', '29', '30110', 'Building of ships and floating structures', '1'),
('430', '29', '30120', 'Building of pleasure and sporting boats', '1'),
('431', '29', '30200', 'Manufacture of railway locomotives and rolling stock', '1'),
('432', '29', '30300', 'Manufacture of air and spacecraft and related machinery', '1'),
('433', '29', '30400', 'Manufacture of military fighting vehicles', '1'),
('434', '29', '30910', 'Manufacture of motorcycles', '1'),
('435', '29', '30920', 'Manufacture of bicycles and invalid carriages', '1'),
('436', '29', '30990', 'Manufacture of other transport equipments n.e.c.', '1'),
('437', '30', '31001', 'Manufacture of wooden and cane furniture', '1'),
('438', '30', '31002', 'Manufacture of metal furniture', '1'),
('439', '30', '31003', 'Manufacture of mattress', '1'),
('440', '30', '31009', 'Manufacture of other furniture, except of stone, concrete or ceramic', '1'),
('441', '31', '32110', 'Manufacture of jewellery and related articles', '1'),
('442', '31', '32120', 'Manufacture of imitation jewellery and related articles', '1'),
('443', '31', '32200', 'Manufacture of musical instruments', '1'),
('444', '31', '32300', 'Manufacture of sports goods', '1'),
('445', '31', '32400', 'Manufacture of games and toys', '1'),
('446', '31', '32500', 'Manufacture of medical and dental instrument and supplies', '1'),
('447', '31', '32901', 'Manufacture of stationery', '1'),
('448', '31', '32909', 'Other manufacturing n.e.c.', '1'),
('449', '32', '33110', 'Repair of fabricated metal products', '1'),
('450', '32', '33120', 'Repair and maintenance of industrial machinery and equipment', '1'),
('451', '32', '33131', 'Repair and maintenance of the measuring, testing, navigating and control equipment', '1'),
('452', '32', '33132', 'Repair and maintenance of irradiation, electro medical and electrotherapeutic equipment', '1'),
('453', '32', '33133', 'Repair of optical instruments and photographic equipment', '1'),
('454', '32', '33140', 'Repair and maintenance of electrical equipment except domestic appliances', '1'),
('455', '32', '33150', 'Repair and maintenance of transport equipment except motorcycles and bicycles', '1'),
('456', '32', '33190', 'Repair and maintenance of other equipment n.e.c.', '1'),
('457', '32', '33200', 'Installation of industrial machinery and equipment\r\nELECTRICITY, GAS, STEAM AND AIR CONDITIONMQ.,§pep4y..,?_,  ,', '1'),
('458', '33', '35101', 'Operation of generation facilities that produce electric energy', '1'),
('459', '33', '35102', 'Operation of transmission, distribution and sales of electricity', '1'),
('460', '34', '35201', 'Manufacture of gaseous fuels with a specified calorific value, by purification, blending and other processes from gases of various types including natural gas', '1'),
('461', '34', '35202', 'Transportation, distribution and supply of gaseous fuels of all kinds through a system of mains', '1'),
('462', '34', '35203', 'Sale of gas to the user through mains', '1'),
('463', '35', '35301', 'Production, collection and distribution of steam and hot water for heating, power and other purposes', '1'),
('464', '35', '35302', 'Production and distribution of cooled air, chilled water for cooling purposes', '1'),
('465', '35', '35303', 'Production of ice, including ice for food and non-food (e.g. cooling) purposes', '1'),
('466', '36', '36001', 'Purification and distribution of water for water supply purposes', '1'),
('467', '36', '36002', 'Desalting of sea or ground water to produce water as the principal product of interest', '1'),
('468', '36', '37000', 'Sewerage and similar activities', '1'),
('469', '37', '38111', 'Collection of non-hazardous solid waste (i.e. garbage) within a local area', '1'),
('470', '37', '38112', 'Collection of recyclable materials', '1'),
('471', '37', '38113', 'Collection of refuse in litter-bins in public places', '1'),
('472', '37', '38114', 'Collection of construction and demolition waste', '1'),
('473', '37', '38115', 'Operation of waste transfer stations for non-hazardous waste', '1'),
('474', '37', '38121', 'Collection of hazardous waste', '1'),
('475', '37', '38122', 'Operation of waste transfer stations for hazardous waste', '1'),
('476', '37', '38210', 'Treatment and disposal of non-hazardous waste', '1'),
('477', '37', '38220', 'Treatment and disposal of hazardous waste', '1'),
('478', '37', '38301', 'Mechanical crushing of metal waste', '1'),
('479', '37', '38302', 'Dismantling of automobiles, computers, televisions and other equipment for material recover', '1'),
('480', '37', '38303', 'Reclaiming of rubber such as used tires to produce secondary raw material', '1'),
('481', '37', '38304', 'Reuse of rubber products', '1'),
('482', '37', '38309', 'Materials recovery n.e.c.', '1'),
('483', '37', '39000', 'Remediation activities and other waste management services', '1'),
('484', '38', '41001', 'Residential buildings', '1'),
('485', '38', '41002', 'Non-residential buildings', '1'),
('486', '38', '41003', 'Assembly and erection of prefabricated constructions on the site', '1'),
('487', '38', '41009', 'Construction of buildings n.e.c.', '1'),
('488', '39', '42101', 'Construction of motorways, streets, roads, other vehicular and pedestrian ways', '1'),
('489', '39', '42102', 'Surface work on streets, roads, highways, bridges or tunnels', '1'),
('490', '39', '42103', 'Construction of bridges, including those for elevated highways', '1'),
('491', '39', '42104', 'Construction of tunnels', '1'),
('492', '39', '42105', 'Construction of railways and subways', '1'),
('493', '39', '42106', 'Construction of airfield/airports runways', '1'),
('494', '39', '42109', 'Construction of roads and railways n.e.c.', '1'),
('495', '39', '42201', 'Long-distance pipelines, communication and power lines', '1'),
('496', '39', '42202', 'Urban pipelines, urban communication and power lines; ancillary urban works', '1'),
('497', '39', '42203', 'Water main and line constructio', '1'),
('498', '39', '42204', 'Reservoirs', '1'),
('499', '39', '42205', 'Construction of irrigation systems (canals)', '1'),
('500', '39', '42206', 'Construction of sewer systems (including repair) and sewage disposal plants', '1'),
('501', '39', '42207', 'Construction of power plants', '1'),
('502', '39', '42209', 'Construction of utility projects n.e.c.', '1'),
('503', '39', '42901', 'Construction of refineries', '1'),
('504', '39', '42902', 'Construction of waterways, harbour and river works, pleasure ports (marinas), locks', '1'),
('505', '39', '42903', 'Construction of dams and dykes', '1'),
('506', '39', '42904', 'Dredging of waterways', '1'),
('507', '39', '42905', 'Outdoor sports facilities', '1'),
('508', '39', '42906', 'Land subdivision with land improvement', '1'),
('509', '39', '42909', 'Construction of other engineering projects n.e.c.', '1'),
('510', '40', '43110', 'Demolition or wrecking of buildings and other structures', '1'),
('511', '40', '43121', 'Clearing of building sites', '1'),
('512', '40', '43122', 'Earth moving', '1'),
('513', '40', '43123', 'Drilling, boring and core sampling for construction, geophysical, geological or similar purposes', '1'),
('514', '40', '43124', 'Site preparation for mining', '1'),
('515', '40', '43125', 'Drainage of agricultural or forestry land', '1'),
('516', '40', '43126', 'Land reclamation work', '1'),
('517', '40', '43129', 'Other site preparation activities n.e.c.', '1'),
('518', '40', '43211', 'Electrical wiring and fittings', '1'),
('519', '40', '43212', 'Telecommunications wiring', '1'),
('520', '40', '43213', 'Computer network and cable television wiring', '1'),
('521', '40', '43214', 'Satellite dishes', '1'),
('522', '40', '43215', 'Lighting systems', '1'),
('523', '40', '43216', 'Security systems', '1'),
('524', '40', '43219', 'Electrical installation n.e.c.', '1'),
('525', '40', '43221', 'Installation of heating systems (electric, gas and oil)', '1'),
('526', '40', '43222', 'Installation of furnaces, cooling towers', '1'),
('527', '40', '43223', 'Installation of non-electric solar energy collectors', '1'),
('528', '40', '43224', 'Installation of plumbing and sanitary equipment', '1'),
('529', '40', '43225', 'Installation of ventilation, refrigeration or air-conditioning equipment and ducts', '1'),
('530', '40', '43226', 'Installation of gas fittings', '1'),
('531', '40', '43227', 'Installation of fire and lawn sprinkler systems', '1'),
('532', '40', '43228', 'Steam piping', '1'),
('533', '40', '43229', 'Plumbing, heat and air-conditioning installation n.e.c.', '1'),
('534', '40', '43291', 'Installation of elevators, escalators in buildings or other construction projects', '1'),
('535', '40', '43292', 'Installation of automated and revolving doors in buildings or other construction projects', '1'),
('536', '40', '43293', 'Installation of lighting conductors in buildings or other construction projects', '1'),
('537', '40', '43294', 'Installation vacuum cleaning systems in buildings or other construction projects', '1'),
('538', '40', '43295', 'Installation thermal, sound or vibration insulation in buildings or other construction projects', '1'),
('539', '40', '43299', 'Other construction installation n.e.c.', '1'),
('540', '40', '43301', 'Installation of doors, windows, door and window frames of wood or other materials, fitted kitchens, staircases, shop fittings and furniture', '1'),
('541', '40', '43302', 'Laying, tiling, hanging or fitting in buildings or other construction projects of various types of materials', '1'),
('542', '40', '43303', 'Interior and exterior painting of buildings', '1'),
('543', '40', '43304', 'Painting of civil engineering structures', '1'),
('544', '40', '43305', 'Installation of glass, mirrors', '1'),
('545', '40', '43306', 'Interior completio', '1'),
('546', '40', '43307', 'Cleaning of new buildings after constructio', '1'),
('547', '40', '43309', 'Other building completion and finishing work n.e.c.', '1'),
('548', '40', '43901', 'Construction of foundations, including pile driving', '1'),
('549', '40', '43902', 'Erection of non-self-manufactured steel elements', '1'),
('550', '40', '43903', 'Scaffolds and work platform erecting and dismantling', '1'),
('551', '40', '43904', 'Bricklaying and stone setting', '1'),
('552', '40', '43905', 'Construction of outdoor swimming pools', '1'),
('553', '40', '43906', 'Steam cleaning, sand blasting and similar activities for building exteriors', '1'),
('554', '40', '43907', 'Renting of construction machinery and equipment with operator (e.g. cranes)', '1'),
('555', '40', '43909', 'Other specialized construction activities, n.e.c.', '1'),
('556', '41', '45101', 'Wholesale and retail of new motor vehicles', '1'),
('557', '41', '45102', 'Wholesale and retail of used motor vehicles', '1'),
('558', '41', '45103', 'Sale of industrial, commercial and agriculture vehicles — new', '1'),
('559', '41', '45104', 'Sale of industrial, commercial and agriculture vehicles — used', '1'),
('560', '41', '45105', 'Sale by commission agents', '1'),
('561', '41', '45106', 'Car auctions', '1'),
('562', '41', '45109', 'Sale of other motor vehicles n.e.c.', '1'),
('563', '41', '45201', 'Maintenance and repair of motor vehicles', '1'),
('564', '41', '45202', 'Spraying and painting', '1'),
('565', '41', '45203', 'Washing and polishing (car wash)', '1'),
('566', '41', '45204', 'Repair of motor vehicle seats', '1'),
('567', '41', '45205', 'Installation of parts and accessories not as part of the manufacturing process', '1'),
('568', '41', '45300', 'Wholesale and retail sale of all kinds of parts, components, supplies, tools and accessories for motor vehicles', '1'),
('569', '41', '45401', 'Wholesale and retail sale of motorcycles', '1'),
('570', '41', '45402', 'Wholesale and retail sale of parts and accessories for motorcycles', '1'),
('571', '41', '45403', 'Repair and maintenance of motorcycles', '1'),
('572', '42', '46100', 'Wholesale on a fee or contract basis', '1'),
('573', '42', '46201', 'Wholesale of rubber', '1'),
('574', '42', '46202', 'Wholesale of palm oil', '1'),
('575', '42', '46203', 'Wholesale of lumber and timber', '1'),
('576', '42', '46204', 'Wholesale of flowers and plants', '1'),
('577', '42', '46205', 'Wholesale of livestock', '1'),
('578', '42', '46209', 'Wholesale of agricultural raw material and live animal n.e.c.', '1'),
('579', '42', '46311', 'Wholesale of meat, poultry and eggs', '1'),
('580', '42', '46312', 'Wholesale of fish and other seafood', '1'),
('581', '42', '46313', 'Wholesale of fruits', '1'),
('582', '42', '46314', 'Wholesale of vegetables', '1'),
('583', '42', '46319', 'Wholesale of meat, fish, fruits and vegetables n.e.c.', '1'),
('584', '42', '46321', 'Wholesale of rice, other grains, flour and sugars', '1'),
('585', '42', '46322', 'Wholesale of dairy products', '1'),
('586', '42', '46323', 'Wholesale of confectionary', '1'),
('587', '42', '46324', 'Wholesale of biscuits, cakes, breads and other bakery products', '1'),
('588', '42', '46325', 'Wholesale of coffee, tea, cocoa and other beverages', '1'),
('589', '42', '46326', 'Wholesale of beer, wine and spirits', '1'),
('590', '42', '46327', 'Wholesale of tobacco, cigar, cigarettes', '1'),
('591', '42', '46329', 'Wholesale of other foodstuffs', '1'),
('592', '42', '46411', 'Wholesale of yarn and fabrics', '1'),
('593', '42', '46412', 'Wholesale of household linen, towels, blankets', '1'),
('594', '42', '46413', 'Wholesale of clothing', '1'),
('595', '42', '46414', 'Wholesale of clothing accessories', '1'),
('596', '42', '46415', 'Wholesale of fur articles', '1'),
('597', '42', '46416', 'Wholesale of footwear', '1'),
('598', '42', '46417', 'Wholesale of haberdashery', '1'),
('599', '42', '46419', 'Wholesale of textiles, clothing n.e.c.', '1'),
('600', '42', '46421', 'Wholesale of pharmaceutical and medical goods', '1'),
('601', '42', '46422', 'Wholesale of perfumeries, cosmetics, soap and toiletries', '1'),
('602', '42', '46431', 'Wholesale of bicycles and their parts and accessories', '1'),
('603', '42', '46432', 'Wholesale of photographic and optical goods', '1'),
('604', '42', '46433', 'Wholesale of leather goods and travel accessories', '1'),
('605', '42', '46434', 'Wholesale of musical instruments, games and toys, sports goods', '1'),
('606', '42', '46441', 'Wholesale of handicrafts and artificial flowers', '1'),
('607', '42', '46442', 'Wholesale of cut flowers and plants', '1'),
('608', '42', '46443', 'Wholesale of watches and clocks', '1'),
('609', '42', '46444', 'Wholesale of jewellery', '1'),
('610', '42', '46491', 'Wholesale of household furniture', '1'),
('611', '42', '46492', 'Wholesale of household appliances', '1'),
('612', '42', '46493', 'Wholesale of lighting equipment', '1'),
('613', '42', '46494', 'Wholesale of household utensils and cutlery, crockery, glassware, chinaware and pottery', '1'),
('614', '42', '46495', 'Wholesale of woodenware, wickerwork and corkware', '1'),
('615', '42', '46496', 'Wholesale of electrical and electronic goods', '1'),
('616', '42', '46497', 'Wholesale of stationery, books, magazines and newspapers', '1'),
('617', '42', '46499', 'Wholesale of other household goods n.e.c.', '1'),
('618', '42', '46510', 'Wholesale of computer hardware, software and peripherals', '1'),
('619', '42', '46521', 'Wholesale of telephone and telecommunications equipment, cell phones, pagers', '1'),
('620', '42', '46522', 'Wholesale of electronic components and wiring accessories', '1'),
('621', '42', '46531', 'Wholesale of agricultural machinery, equipment and supplies', '1'),
('622', '42', '46532', 'Wholesale of lawn mowers however operated', '1'),
('623', '42', '46591', 'Wholesale of office machinery and business equipment, except computers and computer peripheral equipment', '1'),
('624', '42', '46592', 'Wholesale of office furniture', '1'),
('625', '42', '46593', 'Wholesale of computer-controlled machines tools', '1'),
('626', '42', '46594', 'Wholesale of industrial machinery, equipment and supplies', '1'),
('627', '42', '46595', 'Wholesale of construction and civil engineering machinery and equipment', '1'),
('628', '42', '46596', 'Wholesale of lift escalators, air-conditioning, security and fire fighting equipment', '1'),
('629', '42', '46599', 'Wholesale of other machinery for use in industry, trade and navigation and other services n.e.c.', '1'),
('630', '42', '46611', 'Wholesale of petrol, diesel, lubricants', '1'),
('631', '42', '46612', 'Wholesale of liquefied petroleum gas', '1'),
('632', '42', '46619', 'Wholesale of other solid, liquid and gaseous fuels and related products n.e.c.', '1'),
('633', '42', '46621', 'Wholesale of ferrous and non-ferrous metal ores and metals', '1'),
('634', '42', '46622', 'Wholesale of ferrous and non-ferrous semi-finished metal ores and products n.e.c.', '1'),
('635', '42', '46631', 'Wholesale of logs, sawn timber, plywood, veneer and related products', '1'),
('636', '42', '46632', 'Wholesale of paints and varnish', '1'),
('637', '42', '46633', 'Wholesale of construction materials', '1'),
('638', '42', '46634', 'Wholesale of fittings and fixtures', '1'),
('639', '42', '46635', 'Wholesale of hot water heaters', '1'),
('640', '42', '46636', 'Wholesale of sanitary installation and equipment', '1'),
('641', '42', '46637', 'Wholesale of tools', '1'),
('642', '42', '46639', 'Wholesale of other construction materials, hardware, plumbing and heating equipment and supplies n.e.c.', '1'),
('643', '42', '46691', 'Wholesale of industrial chemicals', '1'),
('644', '42', '46692', 'Wholesale of fertilizers and agrochemical products', '1'),
('645', '42', '46693', 'Wholesale of plastic materials in primary forms', '1'),
('646', '42', '46694', 'Wholesale of rubber scrap', '1'),
('647', '42', '46695', 'Wholesale of textile fibres', '1'),
('648', '42', '46696', 'Wholesale of paper in bulk, packaging materials', '1'),
('649', '42', '46697', 'Wholesale of precious stones', '1'),
('650', '42', '46698', 'Wholesale of metal and non-metal waste and scrap and materials for recycling', '1'),
('651', '42', '46699', 'Dismantling of automobiles, computer, televisions and other equipment to obtain and re-sell usable parts', '1'),
('652', '42', '46901', 'Wholesale of aquarium fishes, pet birds and animals', '1'),
('653', '42', '46902', 'Wholesale of animal/pet food', '1'),
('654', '42', '46909', 'Wholesale of a variety of goods without any particular specialization n.e.c.', '1'),
('655', '43', '47111', 'Provision stores', '1'),
('656', '43', '47112', 'Supermarket', '1'),
('657', '43', '47113', 'Mini market', '1');
INSERT INTO `msic_item` VALUES
('658', '43', '47114', 'Convenience stores', '1'),
('659', '43', '47191', 'Department stores', '1'),
('660', '43', '47192', 'Department stores and supermarket', '1'),
('661', '43', '47193', 'Hypermarket', '1'),
('662', '43', '47194', 'News agent and miscellaneous goods store', '1'),
('663', '43', '47199', 'Other retail sale in non-specialized stores n.e.c.', '1'),
('664', '43', '47211', 'Retail sale of rice, flour, other grains and sugars', '1'),
('665', '43', '47212', 'Retail sale of fresh or preserved vegetables and fruits', '1'),
('666', '43', '47213', 'Retail sale of dairy products and eggs', '1'),
('667', '43', '47214', 'Retail sale of meat and meat products (including poultry)', '1'),
('668', '43', '47215', 'Retail sale of fish, other seafood and products thereof', '1'),
('669', '43', '47216', 'Retail sale of bakery products and sugar confectionery', '1'),
('670', '43', '47217', 'Retail sale of mee, kuey teow, mee hoon, wantan skins and other food products made from flour or soya', '1'),
('671', '43', '47219', 'Retail sale of other food products n.e.c.', '1'),
('672', '43', '47221', 'Retail sale of beer, wine and spirits', '1'),
('673', '43', '47222', 'Retail sale of tea, coffee, soft drinks, mineral water and other beverages', '1'),
('674', '43', '47230', 'Retail sale of tobacco products in specialized store', '1'),
('675', '43', '47300', 'Retail sale of automotive fuel in specialized stores', '1'),
('676', '43', '47411', 'Retail sale of computers, computer equipment and supplies', '1'),
('677', '43', '47412', 'Retail sale of video game consoles and non-customized software', '1'),
('678', '43', '47413', 'Retail sale of telecommunication equipment', '1'),
('679', '43', '47420', 'Retail sale of audio and video equipment in specialized store', '1'),
('680', '43', '47510', 'Retail sale of textiles in specialized stores', '1'),
('681', '43', '47520', 'Retail sale of construction materials, hardware, paints and glass', '1'),
('682', '43', '47531', 'Retail sale of carpets and rugs', '1'),
('683', '43', '47532', 'Retail sale of curtains and net curtains', '1'),
('684', '43', '47533', 'Retail sale of wallpaper and floor coverings', '1'),
('685', '43', '47591', 'Retail sale of household furniture', '1'),
('686', '43', '47592', 'Retail sale of articles for lighting', '1'),
('687', '43', '47593', 'Retail sale of household utensils and cutlery, crockery, glassware, chinaware and pottery', '1'),
('688', '43', '47594', 'Retail sale of wood, cork goods and wickerwork goods', '1'),
('689', '43', '47595', 'Retail sale of household appliances', '1'),
('690', '43', '47596', 'Retail sale of musical instruments and scores', '1'),
('691', '43', '47597', 'Retail sale of security systems', '1'),
('692', '43', '47598', 'Retail sale of household articles and equipment n.e.c.', '1'),
('693', '43', '47611', 'Retail sale of office supplies and equipment', '1'),
('694', '43', '47612', 'Retail sale of books, newspapers and stationary', '1'),
('695', '43', '47620', 'Retail sale of musical records, audio tapes, compact discs , cassettes, video tapes, VCDs and DVDs, blank tapes and discs', '1'),
('696', '43', '47631', 'Retail sale of sports goods and equipments', '1'),
('697', '43', '47632', 'Retail sale of fishing equipment', '1'),
('698', '43', '47633', 'Retail sale of camping goods', '1'),
('699', '43', '47634', 'Retail sale of boats and equipments', '1'),
('700', '43', '47635', 'Retail sale of bicycles and related parts and accessories', '1'),
('701', '43', '47640', 'Retail sale of games and toys, made of all materials', '1'),
('702', '43', '47711', 'Retail sale of articles of clothing, articles of fur and clothing accessories', '1'),
('703', '43', '47712', 'Retail sale of footwear', '1'),
('704', '43', '47713', 'Retail sale of leather goods, accessories of leather and leather substitutes', '1'),
('705', '43', '47721', 'Stores specialized in retail sale of pharmaceuticals, medical and orthopaedic goods', '1'),
('706', '43', '47722', 'Stores specialized in retail sale of perfumery, cosmetic and toilet articles', '1'),
('707', '43', '47731', 'Retail sale of photographic and precision equipment', '1'),
('708', '43', '47732', 'Retail sale of watches and clocks', '1'),
('709', '43', '47733', 'Retail sale of jewellery', '1'),
('710', '43', '47734', 'Retail sale of flowers, plants, seeds, fertilizers', '1'),
('711', '43', '47735', 'Retail sale of souvenirs, craftwork and religious articles', '1'),
('712', '43', '47736', 'Retail sale of household fuel oil, cooking gas, coal and fuel wood', '1'),
('713', '43', '47737', 'Retail sale of spectacles and other optical goods', '1'),
('714', '43', '47738', 'Retail sale of aquarium fishes, pet animals and pet food', '1'),
('715', '43', '47739', 'Other retail sale of new goods in specialized stores n.e.c.', '1'),
('716', '43', '47741', 'Retail sale of second-hand books', '1'),
('717', '43', '47742', 'Retail sale of second-hand electrical and electronic goods', '1'),
('718', '43', '47743', 'Retail sale of antiques', '1'),
('719', '43', '47744', 'Activities of auctioning houses (retail)', '1'),
('720', '43', '47749', 'Retail sale of second-hand goods n.e.c.', '1'),
('721', '43', '47810', 'Retail sale of food, beverages and tobacco products via stalls or markets', '1'),
('722', '43', '47820', 'Retail sale of textiles, clothing and footwear via stalls or markets', '1'),
('723', '43', '47891', 'Retail sale of carpets and rugs via stalls or markets', '1'),
('724', '43', '47892', 'Retail sale of books via stalls or markets', '1'),
('725', '43', '47893', 'Retail sale of games and toys via stalls or markets', '1'),
('726', '43', '47894', 'Retail sale of household appliances and consumer electronics via stall or markets', '1'),
('727', '43', '47895', 'Retail sale of music and video recordings via stall or markets', '1'),
('728', '43', '47911', 'Retail sale of any kind of product by mail order', '1'),
('729', '43', '47912', 'Retail sale of any kind of product over the Internet', '1'),
('730', '43', '47913', 'Direct sale via television, radio and telephone', '1'),
('731', '43', '47914', 'Internet retail auctions', '1'),
('732', '43', '47991', 'Retail sale of any kind of product by direct sales or door-to-door sales persons', '1'),
('733', '43', '47992', 'Retail sale of any kind of product through vending machines', '1'),
('734', '43', '47999', 'Other retail sale not in stores, stalls or markets n.e.c.', '1'),
('735', '44', '49110', 'Passenger transport by inter-urban railways', '1'),
('736', '44', '49120', 'Freight transport by inter-urban, suburban and urban railways', '1'),
('737', '44', '49211', 'City bus services', '1'),
('738', '44', '49212', 'Urban and suburban railway passenger transport service', '1'),
('739', '44', '49221', 'Express bus services', '1'),
('740', '44', '49222', 'Employees bus services', '1'),
('741', '44', '49223', 'School bus services', '1'),
('742', '44', '49224', 'Taxi operation and limousine services', '1'),
('743', '44', '49225', 'Rental of cars with driver', '1'),
('744', '44', '49229', 'Other passenger land transport n.e.c.', '1'),
('745', '44', '49230', 'Freight transport by road', '1'),
('746', '44', '49300', 'Transport via pipeline', '1'),
('747', '45', '50111', 'Operation of excursion, cruise or sightseeing boats', '1'),
('748', '45', '50112', 'Operation of ferries, water taxis', '1'),
('749', '45', '50113', 'Rental of pleasure boats with crew for sea and coastal water transport', '1'),
('750', '45', '50121', 'Transport of freight overseas and coastal waters, whether scheduled or not', '1'),
('751', '45', '50122', 'Transport by towing or pushing of barges, oil rigs', '1'),
('752', '45', '50211', 'Transport of passenger via rivers, canals, lakes and other inland waterways', '1'),
('753', '45', '50212', 'Rental of pleasure boats with crew for inland water transport', '1'),
('754', '45', '50220', 'Transport of freight via rivers, canals, lakes and other inland waterways', '1'),
('755', '46', '51101', 'Transport of passengers by air over regular routes and on regular schedules', '1'),
('756', '46', '51102', 'Non-scheduled transport of passenger by air', '1'),
('757', '46', '51103', 'Renting of air-transport equipment with operator for the purpose of passenger transportatio', '1'),
('758', '46', '51201', 'Transport freight by air over regular routes and on regular schedules', '1'),
('759', '46', '51202', 'Non-scheduled transport of freight by air', '1'),
('760', '46', '51203', 'Renting of air-transport equipment with operator for the purpose of freight transportatio', '1'),
('761', '47', '52100', 'Warehousing and storage services', '1'),
('762', '47', '52211', 'Operation of terminal facilities', '1'),
('763', '47', '52212', 'Towing and road side assistance', '1'),
('764', '47', '52213', 'Operation of parking facilities for motor vehicles (parking lots)', '1'),
('765', '47', '52214', 'Highway, bridge and tunnel operation services', '1'),
('766', '47', '52219', 'Other service activities incidental to land transportation n.e.c.', '1'),
('767', '47', '52221', 'Port, harbours and piers operation services', '1'),
('768', '47', '52222', 'Vessel salvage and refloating services', '1'),
('769', '47', '52229', 'Other service activities incidental to water transportation n.e.c.', '1'),
('770', '47', '52231', 'Operation of terminal facilities', '1'),
('771', '47', '52232', 'Airport and air-traffic-control activities', '1'),
('772', '47', '52233', 'Ground service activities on airfields', '1'),
('773', '47', '52234', 'Fire fighting and fire-prevention services at airports', '1'),
('774', '47', '52239', 'Other service activities incidental to air transportation n.e.c.', '1'),
('775', '47', '52241', 'Stevedoring services', '1'),
('776', '47', '52249', 'Other cargo handling activities n.e.c.', '1'),
('777', '47', '52291', 'Forwarding of freight', '1'),
('778', '47', '52292', 'Brokerage for ship and aircraft space', '1'),
('779', '47', '52299', 'Other transportation support activities n.e.c.', '1'),
('780', '48', '53100', 'National postal services', '1'),
('781', '48', '53200', 'Courier activities other than national post activities', '1'),
('782', '49', '55101', 'Hotels and resort hotels', '1'),
('783', '49', '55102', 'Motels', '1'),
('784', '49', '55103', 'Apartment hotels', '1'),
('785', '49', '55104', 'Chalets', '1'),
('786', '49', '55105', 'Rest house/guest house', '1'),
('787', '49', '55106', 'Bed and breakfast units', '1'),
('788', '49', '55107', 'Hostels', '1'),
('789', '49', '55108', 'Home stay', '1'),
('790', '49', '55109', 'Other short term accommodation activities n.e.c.', '1'),
('791', '49', '55200', 'Camping grounds, recreational vehicle parks and trailer parks', '1'),
('792', '49', '55900', 'Other accommodatio', '1'),
('793', '50', '56101', 'Restaurants and restaurant cum night clubs', '1'),
('794', '50', '56102', 'Cafeterias/canteens', '1'),
('795', '50', '56103', 'Fast-food restaurants', '1'),
('796', '50', '56104', 'Ice cream truck vendors and parlours', '1'),
('797', '50', '56105', 'Mobile food carts', '1'),
('798', '50', '56106', 'Food stalls/hawkers', '1'),
('799', '50', '56107', 'Food or beverage, food and beverage preparation in market stalls/hawkers', '1'),
('800', '50', '56210', 'Event/food caterers', '1'),
('801', '50', '56290', 'Other food service activities', '1'),
('802', '50', '56301', 'Pubs, bars, discotheques, coffee houses, cocktail lounges and karaoke', '1'),
('803', '50', '56302', 'Coffee shops', '1'),
('804', '50', '56303', 'Drink stalls/hawkers', '1'),
('805', '50', '56304', 'Mobile beverage', '1'),
('806', '50', '56309', 'Others drinking places n.e.c.', '1'),
('807', '51', '58110', 'Publishing of books, brochures and other publications', '1'),
('808', '51', '58120', 'Publishing of mailing lists, telephone book, other directories', '1'),
('809', '51', '58130', 'Publishing of newspapers, journals, magazines and periodicals in print or electronic form', '1'),
('810', '51', '58190', 'Publishing of catalogues, photos, engraving and postcards, greeting cards, forms, posters, reproduction of works of art, advertising material and other printed matter n.e.c.', '1'),
('811', '51', '58201', 'Business and other applications', '1'),
('812', '51', '58202', 'Computer games for all platforms', '1'),
('813', '51', '58203', 'Operating systems', '1'),
('814', '52', '59110', 'Motion picture, video and television programme production activities', '1'),
('815', '52', '59120', 'Motion picture, video and television programme post-production activities', '1'),
('816', '52', '59130', 'Motion picture, video and television programme distribution activities', '1'),
('817', '52', '59140', 'Motion picture projection activities', '1'),
('818', '52', '59200', 'Sound recording and music publishing activities', '1'),
('819', '53', '60100', 'Radio broadcasting', '1'),
('820', '53', '60200', 'Television programming and broadcasting activities', '1'),
('821', '53', '61101', 'Wired telecommunications services', '1'),
('822', '53', '61102', 'Internet access providers by the operator of the wired infrastructure', '1'),
('823', '53', '61201', 'Wireless telecommunications services', '1'),
('824', '53', '61202', 'Internet access providers by the operator of the wireless infrastructure', '1'),
('825', '53', '61300', 'Satellite telecommunications services', '1'),
('826', '53', '61901', 'Provision of Internet access over networks between the client and the ISP not owned or controlled by the ISP', '1'),
('827', '53', '61902', 'Provision of telecommunications services over existing telecom connectio', '1'),
('828', '53', '61903', 'Telecommunications resellers', '1'),
('829', '53', '61904', 'Provision of telecommunications services over existing telecom connections VOIP (Voice Over Internet Protocol) provisio', '1'),
('830', '53', '61905', 'Provision of specialized telecommunications applications', '1'),
('831', '53', '61909', 'Other telecommunications activities n.e.c.', '1'),
('832', '54', '62010', 'Computer programming activities', '1'),
('833', '54', '62021', 'Computer consultancy', '1'),
('834', '54', '62022', 'Computer facilities management activities', '1'),
('835', '54', '62091', 'Information Communication Technology (ICT) system security', '1'),
('836', '54', '62099', 'Other information technology service activities n.e.c.', '1'),
('837', '55', '63111', 'Activities of providing infrastructure for hosting, data processing services and related activities', '1'),
('838', '55', '63112', 'Data processing activities', '1'),
('839', '55', '63120', 'Web portals', '1'),
('840', '55', '63910', 'News syndicate and news agency activities', '1'),
('841', '55', '63990', 'Other information service activities n.e.c.', '1'),
('842', '56', '64110', 'Central banking', '1'),
('843', '56', '64191', 'Commercial Banks', '1'),
('844', '56', '64192', 'Islamic Banks', '1'),
('845', '56', '64193', 'Offshore Banks', '1'),
('846', '56', '64194', 'Investment Banks', '1'),
('847', '56', '64195', 'Development financial institutions (with deposit taking functions)', '1'),
('848', '56', '64199', 'Other monetary intermediation (with deposit taking functions) n.e.c.', '1'),
('849', '56', '64200', 'Activities of holding companies', '1'),
('850', '56', '64301', 'Venture capital companies', '1'),
('851', '56', '64302', 'Unit trust fund excludes REITs', '1'),
('852', '56', '64303', 'Property unit trust (REITs)', '1'),
('853', '56', '64304', 'Other administration of trusts accounts', '1'),
('854', '56', '64309', 'Trusts, funds and similar financial entities n.e.c.', '1'),
('855', '56', '64910', 'Financial leasing activities', '1'),
('856', '56', '64921', 'Development financial institutions (without deposit taking functions)', '1'),
('857', '56', '64922', 'Credit card services', '1'),
('858', '56', '64923', 'Licensed money lending activities', '1'),
('859', '56', '64924', 'Pawnshops and pawnbrokers includes Ar-Rahnu', '1'),
('860', '56', '64925', 'Co-operative with credits functions', '1'),
('861', '56', '64929', 'Other credit granting n.e.c.', '1'),
('862', '56', '64991', 'Factoring companies', '1'),
('863', '56', '64992', 'Representative office of foreign banks', '1'),
('864', '56', '64993', 'Nominee companies', '1'),
('865', '56', '64999', 'Other financial service activities, except insurance/takaful and pension funding n.e.c.', '1'),
('866', '57', '65111', 'Life insurance', '1'),
('867', '57', '65112', 'Family takaful', '1'),
('868', '57', '65121', 'General insurance', '1'),
('869', '57', '65122', 'General takaful', '1'),
('870', '57', '65123', 'Composite insurance', '1'),
('871', '57', '65124', 'Offshore insurance', '1'),
('872', '57', '65125', 'Offshore takaful', '1'),
('873', '57', '65201', 'Life reinsurance', '1'),
('874', '57', '65202', 'Family retakaful', '1'),
('875', '57', '65203', 'General reinsurance', '1'),
('876', '57', '65204', 'General retakaful', '1'),
('877', '57', '65205', 'Composite retakaful', '1'),
('878', '57', '65206', 'Offshore reinsurance', '1'),
('879', '57', '65207', 'Offshore retakaful', '1'),
('880', '57', '65301', 'Pension funding', '1'),
('881', '57', '65302', 'Provident funding', '1'),
('882', '58', '66111', 'Stock exchanges', '1'),
('883', '58', '66112', 'Exchanges for commodity contracts', '1'),
('884', '58', '66113', 'Securities exchange', '1'),
('885', '58', '66114', 'Exchanges for commodity futures contracts', '1'),
('886', '58', '66119', 'Administration of financial markets n.e.c.', '1'),
('887', '58', '66121', 'Stock, share and bond brokers', '1'),
('888', '58', '66122', 'Commodity brokers and dealers', '1'),
('889', '58', '66123', 'Gold bullion dealers', '1'),
('890', '58', '66124', 'Foreign exchange broker and dealers (Bureaux de change)', '1'),
('891', '58', '66125', 'Money-changing services', '1'),
('892', '58', '66129', 'Other financial and commodity futures brokers and dealers', '1'),
('893', '58', '66191', 'Investment advisory services', '1'),
('894', '58', '66192', 'Financial consultancy services', '1'),
('895', '58', '66199', 'Activities auxiliary to finance n.e.c.', '1'),
('896', '58', '66211', 'Insurance adjusting service', '1'),
('897', '58', '66212', 'Takaful adjusting service', '1'),
('898', '58', '66221', 'Insurance agents', '1'),
('899', '58', '66222', 'Takaful agents', '1'),
('900', '58', '66223', 'Insurance brokers', '1'),
('901', '58', '66224', 'Takaful brokers', '1'),
('902', '58', '66290', 'Other activities auxiliary to insurance, takaful and pension funding', '1'),
('903', '58', '66301', 'Management of pension funds', '1'),
('904', '58', '66302', 'Assets/portfolio management', '1'),
('905', '58', '66303', 'Unit trust management companies', '1'),
('906', '59', '68101', 'Buying, selling, renting and operating of self-owned or leased real estate — residential buildings', '1'),
('907', '59', '68102', 'Buying, selling, renting and operating of self-owned or leased real estate — non-residential buildings', '1'),
('908', '59', '68103', 'Buying, selling, renting and operating of self-owned or leased real estate — land', '1'),
('909', '59', '68104', 'Development of building projects for own operation, i.e. for renting of space in these buildings', '1'),
('910', '59', '68109', 'Real estate activities with own or leased property n.e.c.', '1'),
('911', '59', '68201', 'Activities of real estate agents and brokers for buying, selling and renting of real estate', '1'),
('912', '59', '68202', 'Management of real estate on a fee or contract basis', '1'),
('913', '59', '68203', 'Appraisal services for real estate', '1'),
('914', '59', '68209', 'Real estate activities on a fee or contract basis n.e.c.', '1'),
('915', '60', '69100', 'Legal activities', '1'),
('916', '60', '69200', 'Accounting, bookkeeping and auditing activities; tax consultancy', '1'),
('917', '61', '70100', 'Activities of head offices', '1'),
('918', '61', '70201', 'Business management consultancy services', '1'),
('919', '61', '70202', 'Human resource consultancy services', '1'),
('920', '61', '70203', 'Consultancy services in public relation and communications', '1'),
('921', '61', '70209', 'Other management consultancy activities n.e.c', '1'),
('922', '62', '71101', 'Architectural services', '1'),
('923', '62', '71102', 'Engineering services', '1'),
('924', '62', '71103', 'Land surveying services', '1'),
('925', '62', '71109', 'Other architectural and engineering activities and related technical consultancy n.e.c.', '1'),
('926', '62', '71200', 'Technical testing and analysis', '1'),
('927', '63', '72101', 'Research and development on natural sciences', '1'),
('928', '63', '72102', 'Research and development on engineering and technology', '1'),
('929', '63', '72103', 'Research and development on medical sciences', '1'),
('930', '63', '72104', 'Research and development on biotechnology', '1'),
('931', '63', '72105', 'Research and development on agricultural sciences', '1'),
('932', '63', '72106', 'Research and development on Information Communication Technology (ICT)', '1'),
('933', '63', '72109', 'Research and development on other natural science and engineering n.e.c.', '1'),
('934', '63', '72201', 'Research and development on social sciences', '1'),
('935', '63', '72202', 'Research and development on humanities', '1'),
('936', '63', '72209', 'Research and development of other social sciences and humanities n.e.c.', '1'),
('937', '64', '73100', 'Advertising', '1'),
('938', '64', '73200', 'Market research and public opinion polling', '1'),
('939', '65', '74101', 'Activities of interior decorators', '1'),
('940', '65', '74102', 'Services of graphic designers', '1'),
('941', '65', '74103', 'Fashion design services', '1'),
('942', '65', '74109', 'Specialized design activities n.e.c.', '1'),
('943', '65', '74200', 'Photographic activities', '1'),
('944', '65', '74901', 'Translation and interpretation activities', '1'),
('945', '65', '74902', 'Business brokerage activities', '1'),
('946', '65', '74903', 'Security consulting', '1'),
('947', '65', '74904', 'Activities of quantity surveyors', '1'),
('948', '65', '74905', 'Activities of consultants other than architecture, engineering and management consultants', '1'),
('949', '65', '74909', 'Any other professional, scientific and technical activities n.e.c.', '1'),
('950', '65', '75000', 'Veterinary Activities', '1'),
('951', '66', '77102', 'Renting and operational leasing of trucks, utility trailers and recreational vehicles', '1'),
('952', '66', '77211', 'Renting and leasing of pleasure boats, canoes, sailboats', '1'),
('953', '66', '77212', 'Renting and leasing of bicycles', '1'),
('954', '66', '77213', 'Renting and leasing of beach chairs and umbrellas', '1'),
('955', '66', '77219', 'Renting and leasing of other sports equipment n.e.c.', '1'),
('956', '66', '77220', 'Renting of video tapes, records, CDs, DVDs', '1'),
('957', '66', '77291', 'Renting and leasing of textiles, wearing apparel and footwear', '1'),
('958', '66', '77292', 'Renting and leasing of furniture, pottery and glass, kitchen and tableware, electrical appliances and house wares', '1'),
('959', '66', '77293', 'Renting and leasing of jewellery, musical instruments, scenery and costumes', '1'),
('960', '66', '77294', 'Renting and leasing of books, journals and magazines', '1'),
('961', '66', '77295', 'Renting and leasing of machinery and equipment used by amateurs or as a hobby', '1'),
('962', '66', '77296', 'Renting of flowers and plants', '1'),
('963', '66', '77297', 'Renting and leasing of electronic equipment for household use', '1'),
('964', '66', '77299', 'Renting and leasing of other personal and household goods n.e.c.', '1'),
('965', '66', '77301', 'Renting and operational leasing, without operator, of other machinery and equipment that are generally used as capital goods by industries', '1'),
('966', '66', '77302', 'Renting and operational leasing of land-transport equipment (other than motor vehicles) without drivers', '1'),
('967', '66', '77303', 'Renting and operational leasing of water-transport equipment without operator', '1'),
('968', '66', '77304', 'Renting and operational leasing of air transport equipment without operator', '1'),
('969', '66', '77305', 'Renting and operational leasing of agricultural and forestry machinery and equipment without operator', '1'),
('970', '66', '77306', 'Renting and operational leasing of construction and civil-engineering machinery and equipment without operator', '1'),
('971', '66', '77307', 'Rental and operational leasing of office machinery and equipment without operator', '1'),
('972', '66', '77309', 'Renting and leasing of other machinery, equipment and tangible goods n.e.c.', '1'),
('973', '66', '77400', 'Leasing of intellectual property and similar products, except copyrighted works', '1'),
('974', '67', '78100', 'Activities of employment placement agencies', '1'),
('975', '67', '78200', 'Temporary employment agency activities', '1'),
('976', '67', '78300', 'Provision of human resources for client businesses', '1'),
('977', '68', '79110', 'Travel agency activities', '1'),
('978', '68', '79120', 'Tour operator activities', '1'),
('979', '68', '79900', 'Other reservation service and related activities', '1'),
('980', '69', '80100', 'Private security activities', '1'),
('981', '69', '80200', 'Security systems service activities', '1'),
('982', '69', '80300', 'Investigation and detective activities', '1'),
('983', '70', '81100', 'Combined facilities support activities', '1'),
('984', '70', '81210', 'General cleaning of buildings', '1'),
('985', '70', '81291', 'Cleaning of buildings of all types', '1'),
('986', '70', '81292', 'Swimming pool cleaning and maintenance services', '1'),
('987', '70', '81293', 'Cleaning of industrial machinery', '1'),
('988', '70', '81294', 'Cleaning of trains, buses, planes', '1'),
('989', '70', '81295', 'Cleaning of pest control services not in connection with agriculture', '1'),
('990', '70', '81296', 'Disinfecting and exterminating activities', '1'),
('991', '70', '81297', 'Cleaning of sea tankers', '1'),
('992', '70', '81299', 'Other building and industrial cleaning activities, n.e.c.', '1'),
('993', '70', '81300', 'Landscape care and maintenance service activities', '1'),
('994', '71', '82110', 'Combined office administrative service activities', '1'),
('995', '71', '82191', 'Document preparation, editing and/or proofreading', '1'),
('996', '71', '82192', 'Typing, word processing or desktop publishing', '1'),
('997', '71', '82193', 'Secretarial support services', '1'),
('998', '71', '82194', 'Transcription of documents and other secretarial services', '1'),
('999', '71', '82195', 'Provision of mailbox rental and other postal and mailing services', '1'),
('1000', '71', '82196', 'Photocopying, duplicating, blueprinting', '1'),
('1001', '71', '82199', 'Photocopying, document preparation and other specialized office support activities n.e.c.', '1'),
('1002', '71', '82200', 'Activities of call centres', '1'),
('1003', '71', '82301', 'Organization, promotions and/or management of event', '1'),
('1004', '71', '82302', 'Meeting, incentive, convention, exhibition (MICE)', '1'),
('1005', '71', '82910', 'Activities of collection agencies and credit bureaus', '1'),
('1006', '71', '82920', 'Packaging activities on a fee or contract basis, whether or not these involve an automated process', '1'),
('1007', '71', '82990', 'Other business support service activities n.e.c.', '1'),
('1008', '72', '84111', 'General (overall) public administration activities', '1'),
('1009', '72', '84112', 'Ancillary service activities for the government as a whole', '1'),
('1010', '72', '84121', 'Administrative educational services', '1'),
('1011', '72', '84122', 'Administrative health care services', '1'),
('1012', '72', '84123', 'Administrative housing and local government services', '1'),
('1013', '72', '84124', 'Administrative recreational, cultural, arts and sports services', '1'),
('1014', '72', '84125', 'Administrative religious affairs services', '1'),
('1015', '72', '84126', 'Administrative welfare services', '1'),
('1016', '72', '84129', 'Other community and social affairs services', '1'),
('1017', '72', '84131', 'Domestic and international trade affairs', '1'),
('1018', '72', '84132', 'Agriculture and rural development affairs', '1'),
('1019', '72', '84133', 'Primary industries affairs', '1'),
('1020', '72', '84134', 'Public works affairs', '1'),
('1021', '72', '84135', 'Transport affairs', '1'),
('1022', '72', '84136', 'Energy, telecommunication and postal affairs', '1'),
('1023', '72', '84137', 'Tourism affairs', '1'),
('1024', '72', '84138', 'Human resource affairs', '1'),
('1025', '72', '84139', 'Other regulation of and contribution to more efficient operation of businesses n.e.c.', '1'),
('1026', '72', '84210', 'Foreign affairs', '1'),
('1027', '72', '84220', 'Military and civil defence services', '1'),
('1028', '72', '84231', 'Police service', '1'),
('1029', '72', '84232', 'Prison service', '1'),
('1030', '72', '84233', 'Immigration service', '1'),
('1031', '72', '84234', 'National registration service', '1'),
('1032', '72', '84235', 'Judiciary and legal service', '1'),
('1033', '72', '84236', 'Firefighting and fire preventio', '1'),
('1034', '72', '84239', 'Other public order and safety affairs related services', '1'),
('1035', '72', '84300', 'Compulsory social security activities e.g. SOCSO', '1'),
('1036', '73', '85101', 'Pre-primary education (Public)', '1'),
('1037', '73', '85102', 'Pre-primary education (Private)', '1'),
('1038', '73', '85103', 'Primary education (Public)', '1'),
('1039', '73', '85104', 'Primary education (Private)', '1'),
('1040', '73', '85211', 'General school secondary education (Public)', '1'),
('1041', '73', '85212', 'General school secondary education (Private)', '1'),
('1042', '73', '85221', 'Technical and vocational education below the level of higher education (Public)', '1'),
('1043', '73', '85222', 'Technical and vocational education below the level of higher education (Private)', '1'),
('1044', '73', '85301', 'College and university education (Public)', '1'),
('1045', '73', '85302', 'College and university education (Private)', '1'),
('1046', '73', '85411', 'Sports instructio', '1'),
('1047', '73', '85412', 'Martial arts instructio', '1'),
('1048', '73', '85419', 'Any other sports and recreation education n.e.c', '1'),
('1049', '73', '85421', 'Music and dancing school', '1'),
('1050', '73', '85429', 'Any other cultural education n.e.c.', '1'),
('1051', '73', '85491', 'Tuition centre', '1'),
('1052', '73', '85492', 'Driving school', '1'),
('1053', '73', '85493', 'Religious instructio', '1'),
('1054', '73', '85494', 'Computer training', '1'),
('1055', '73', '85499', 'Others education n.e.c', '1'),
('1056', '73', '85500', 'Educational support services for provision of non-instructional services', '1'),
('1057', '74', '86101', 'Hospital activities', '1'),
('1058', '74', '86102', 'Maternity home services (outside hospital)', '1'),
('1059', '74', '86201', 'General medical services', '1'),
('1060', '74', '86202', 'Specialized medical services', '1'),
('1061', '74', '86203', 'Dental services', '1'),
('1062', '74', '86901', 'Dialysis Centres', '1'),
('1063', '74', '86902', 'Medical laboratories', '1'),
('1064', '74', '86903', 'Physiotherapy and occupational therapy service', '1'),
('1065', '74', '86904', 'Acupuncture services', '1'),
('1066', '74', '86905', 'Herbalist and homeopathy services', '1'),
('1067', '74', '86906', 'Ambulance services', '1'),
('1068', '74', '86909', 'Other human health services n.e.c.', '1'),
('1069', '75', '87101', 'Homes for the elderly with nursing care', '1'),
('1070', '75', '87102', 'Nursing homes', '1'),
('1071', '75', '87103', 'Palliative or hospices', '1'),
('1072', '75', '87201', 'Drug rehabilitation centres', '1'),
('1073', '75', '87209', 'Other residential care activities for mental retardation n.e.c.', '1'),
('1074', '75', '87300', 'Residential care activities for the elderly and disabled', '1'),
('1075', '75', '87901', 'Orphanages', '1'),
('1076', '75', '87902', 'Welfare homes services', '1'),
('1077', '75', '87909', 'Other residential care activities n.e.c.', '1'),
('1078', '75', '88101', 'Day-care activities for the elderly or for handicapped adults', '1'),
('1079', '75', '88109', 'Others social work activities without accommodation for the elderly and disabled', '1'),
('1080', '75', '88901', 'Counselling service', '1'),
('1081', '75', '88902', 'Child day-care activities', '1'),
('1082', '75', '88909', 'Other social work activities without accommodation n.e.c.', '1'),
('1083', '76', '90001', 'Theatrical producer, singer group band and orchestra entertainment services', '1'),
('1084', '76', '90002', 'Operation of concert and theatre halls and other arts facilities', '1'),
('1085', '76', '90003', 'Activities of sculptors, painters, cartoonists, engravers, etchers', '1'),
('1086', '76', '90004', 'Activities of individual writers, for all subjects', '1'),
('1087', '76', '90005', 'Activities of independent journalists', '1'),
('1088', '76', '90006', 'Restoring of works of art such as painting', '1'),
('1089', '76', '90007', 'Activities of producers or entrepreneurs of arts live events, with or without facilities', '1'),
('1090', '76', '90009', 'Creative, arts and entertainment activities n.e.c.', '1'),
('1091', '77', '91011', 'Documentation and information activities of libraries of all kinds', '1'),
('1092', '77', '91012', 'Stock photo libraries and services', '1'),
('1093', '77', '91021', 'Operation of museums of all kinds', '1'),
('1094', '77', '91022', 'Operation of historical sites and buildings', '1'),
('1095', '77', '91031', 'Operation of botanical and zoological gardens', '1'),
('1096', '77', '91032', 'Operation of nature reserves, including wildlife preservatio', '1'),
('1097', '77', '92000', 'GAMBLING AND BETTING ACTIVITIES', '1'),
('1098', '78', '93111', 'Football, hockey, cricket, baseball, badminton, futsal, paintball', '1'),
('1099', '78', '93112', 'Racetracks for auto', '1'),
('1100', '78', '93113', 'Equestrian clubs', '1'),
('1101', '78', '93114', 'Swimming pools and stadiums, ice-skating arenas', '1'),
('1102', '78', '93115', 'Track and field stadium', '1'),
('1103', '78', '93116', 'Golf courses', '1'),
('1104', '78', '93117', 'Bowling centre', '1'),
('1105', '78', '93118', 'Fitness centres', '1'),
('1106', '78', '93119', 'Organization and operation of outdoor or indoor sports events for professionals or amateurs by organizations with own facilities', '1'),
('1107', '78', '93120', 'The operation of sports clubs such as football club, bowling club, swimming club', '1'),
('1108', '78', '93191', 'Activities of producers or promoters of sports events, with or without facilities', '1'),
('1109', '78', '93192', 'Activities of sports leagues and regulating bodies', '1'),
('1110', '78', '93193', 'Activities of related to promotion of sporting events', '1'),
('1111', '78', '93199', 'Other sports activities n.e.c.', '1'),
('1112', '78', '93210', 'Activities of amusement parks and theme parks', '1'),
('1113', '78', '93291', 'Activities of recreation parks and beaches', '1'),
('1114', '78', '93292', 'Operation of recreational transport facilities', '1'),
('1115', '78', '93293', 'Renting of leisure and pleasure equipment as an integral part of recreational facilities', '1'),
('1116', '78', '93294', 'Operation of fairs and shows of a recreational nature', '1'),
('1117', '78', '93295', 'Operation of discotheques and dance floors', '1'),
('1118', '78', '93296', 'Activities of producers or entrepreneurs of live events other than arts or sports events, with or without facilities', '1'),
('1119', '78', '93297', 'Cyber Cafe/Internet Centre', '1'),
('1120', '78', '93299', 'Any other amusement and recreation activities n.e.c.', '1'),
('1121', '79', '94110', 'Activities of business and employers membership organizations', '1'),
('1122', '79', '94120', 'Activities of professional membership organizations', '1'),
('1123', '79', '94200', 'Activities of trade unions', '1'),
('1124', '79', '94910', 'Activities of religious organizations', '1'),
('1125', '79', '94920', 'Activities of political organizations', '1'),
('1126', '79', '94990', 'Activities of other membership organizations n.e.c.', '1'),
('1127', '80', '95111', 'Repair of electronic equipment', '1'),
('1128', '80', '95112', 'Repair and maintenance of computer terminals', '1'),
('1129', '80', '95113', 'Repair and maintenance of hand-held computers (PDA&#039;s)', '1'),
('1130', '80', '95121', 'Repair and maintenance of cordless telephones', '1'),
('1131', '80', '95122', 'Repair and maintenance of cellular phones', '1'),
('1132', '80', '95123', 'Repair and maintenance of carrier equipment modems', '1'),
('1133', '80', '95124', 'Repair and maintenance of fax machines', '1'),
('1134', '80', '95125', 'Repair and maintenance of communications transmission equipment', '1'),
('1135', '80', '95126', 'Repair and maintenance of two-way radios', '1'),
('1136', '80', '95127', 'Repair and maintenance of commercial TV and video cameras', '1'),
('1137', '80', '95211', 'Repair and maintenance of television, radio receivers', '1'),
('1138', '80', '95212', 'Repair and maintenance of VCR/DVDNCD', '1'),
('1139', '80', '95213', 'Repair and maintenance of CD players', '1'),
('1140', '80', '95214', 'Repair and maintenance of household-type video cameras', '1'),
('1141', '80', '95221', 'Repair and servicing of household appliances', '1'),
('1142', '80', '95222', 'Repair and servicing of home and garden equipment', '1'),
('1143', '80', '95230', 'Repair of footwear and leather goods', '1'),
('1144', '80', '95240', 'Repair of furniture and home furnishings', '1'),
('1145', '80', '95291', 'Repair of bicycles', '1'),
('1146', '80', '95292', 'Repair and alteration of clothing', '1'),
('1147', '80', '95293', 'Repair and alteration of jewellery', '1'),
('1148', '80', '95294', 'Repair of watches, clocks and their parts', '1'),
('1149', '80', '95295', 'Repair of sporting goods', '1'),
('1150', '80', '95296', 'Repair of musical instruments', '1'),
('1151', '80', '95299', 'Repair of other personal and household goods n.e.c.', '1'),
('1152', '81', '96011', 'Laundering and dry-cleaning, pressing', '1'),
('1153', '81', '96012', 'Carpet and rug shampooing, and drapery and curtain cleaning, whether on clients&#039; premises or not', '1'),
('1154', '81', '96013', 'Provision of linens, work uniforms and related items by laundries', '1'),
('1155', '81', '96014', 'Diaper supply services', '1'),
('1156', '81', '96020', 'Hairdressing and other beauty treatment', '1'),
('1157', '81', '96031', 'Preparing the dead for burial or cremation and embalming and morticians services', '1'),
('1158', '81', '96032', 'Providing burial or cremation services', '1'),
('1159', '81', '96033', 'Rental of equipped space in funeral parlours', '1'),
('1160', '81', '96034', 'Rental or sale of graves', '1'),
('1161', '81', '96035', 'Maintenance of graves and mausoleums', '1'),
('1162', '81', '96091', 'Activities of sauna, steam baths, massage salons', '1'),
('1163', '81', '96092', 'Astrological and spiritualists&#039; activities', '1'),
('1164', '81', '96093', 'Social activities such as escort services, dating services, services of marriage bureaux', '1'),
('1165', '81', '96094', 'Pet care services', '1'),
('1166', '81', '96095', 'Genealogical organizations', '1'),
('1167', '81', '96096', 'Shoe shiners, porters, valet car parkers', '1'),
('1168', '81', '96097', 'Concession operation of coin-operated personal service machines', '1'),
('1169', '81', '96099', 'Other service activities n.e.c.', '1'),
('1170', '82', '97000', 'Activities of households as employers of domestic personnel', '1'),
('1171', '82', '98100', 'Undifferentiated goods-producing activities of private households for own use', '1'),
('1172', '82', '98200', 'Undifferentiated service-producing activities of private households for own use', '1'),
('1173', '83', '99000', 'Activities of extraterritorial organizationd bodies', '1');

### Structure of table `msic_section` ###

DROP TABLE IF EXISTS `msic_section`;

CREATE TABLE `msic_section` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `section` char(1) NOT NULL,
  `description` varchar(150) NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 ;

### Data of table `msic_section` ###

INSERT INTO `msic_section` VALUES
('1', 'A', 'AGRICULTURE FORESTRY AND FISHING', '1'),
('2', 'B', 'MINING &amp; QUARRYING', '1'),
('3', 'C', 'MANUFACTURING', '1'),
('4', 'D', 'ELECTRICITY, GAS, STEAM &amp; AIRCON SUPPLY', '1'),
('5', 'E', 'WATER SUPPLY, SEWERAGE, WASTE MGT &amp; REMEDIATIO', '1'),
('6', 'F', 'CONSTRUCTIO', '1'),
('7', 'G', 'WHOLESALE &amp; RETAIL TRADE', '1'),
('8', 'H', 'TRANSPORTATION &amp; STORAGE', '1'),
('9', 'I', 'ACCOMODATION &amp; FOOD SERVICE ACTIVITIES', '1'),
('10', 'J', 'INFORMATION AND COMMUNICATIO', '1'),
('11', 'K', 'FINANCIAL AND INSURANCE /TAKAFUL ACTIVITIES ', '1'),
('12', 'L', 'REAL ESTATE ACTIVTIES', '1'),
('13', 'M', 'PROFESSIONAL, SCIENTIFIC AND TECHNICAL ACTIVITIES', '1'),
('14', '', 'ADMINISTRATIVE &amp; SUPPORT SERVICE ACTIVITIES', '1'),
('15', 'O', 'PUBLIC ADMIN, DEFENCE, COMPULSORY SOCIAL ACTIVITIES', '1'),
('16', 'P', 'EDUCATIO', '1'),
('17', 'Q', 'HUMAN HEALTH AND SOCIAL WORK ACTIVITIES', '1'),
('18', 'R', 'ARTS, ENTERTAINMENT &amp; RECREATIO', '1'),
('19', 'S', 'OTHER SERVICES ACTIVITIES', '1'),
('20', 'T', 'ACTIVITIES OF HOUSEHOLDS AS EMPLOYERS; UNDIFFERENTIATED', '1'),
('21', 'U', 'ACTIVITIES OF EXTRATERRESTRIAL ORGANIZATIONS', '1');

### Structure of table `opening_cache` ###

DROP TABLE IF EXISTS `opening_cache`;

CREATE TABLE `opening_cache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ;

### Data of table `opening_cache` ###

INSERT INTO `opening_cache` VALUES
('1', '2016-01-27 09:32:16', '{&quot;id&quot;:&quot;1&quot;,&quot;pay_type&quot;:&quot;bank&quot;,&quot;type&quot;:&quot;bank&quot;,&quot;account&quot;:&quot;2&quot;,&quot;amount&quot;:&quot;10000&quot;,&quot;tran_date&quot;:&quot;2014-12-31&quot;,&quot;gl_tran_id&quot;:&quot;1&quot;}'),
('2', '2016-02-15 09:48:32', '{&quot;id&quot;:&quot;2&quot;,&quot;pay_type&quot;:&quot;bank&quot;,&quot;type&quot;:&quot;bank&quot;,&quot;account&quot;:&quot;1&quot;,&quot;amount&quot;:&quot;200000&quot;,&quot;tran_date&quot;:&quot;2014-12-31&quot;,&quot;gl_tran_id&quot;:&quot;2&quot;}');

### Structure of table `opening_customer` ###

DROP TABLE IF EXISTS `opening_customer`;

CREATE TABLE `opening_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` char(50) NOT NULL,
  `balance` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `balance` (`balance`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

### Data of table `opening_customer` ###


### Structure of table `opening_gl` ###

DROP TABLE IF EXISTS `opening_gl`;

CREATE TABLE `opening_gl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_type` char(15) NOT NULL,
  `type` char(20) NOT NULL,
  `account` char(20) NOT NULL,
  `amount` double NOT NULL,
  `tran_date` date NOT NULL,
  `gl_tran_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ;

### Data of table `opening_gl` ###

INSERT INTO `opening_gl` VALUES
('1', 'bank', 'bank', '2', '100000', '2014-12-31', '1'),
('2', 'bank', 'bank', '1', '0', '2014-12-31', '2');

### Structure of table `opening_gl_system` ###

DROP TABLE IF EXISTS `opening_gl_system`;

CREATE TABLE `opening_gl_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` int(10) NOT NULL,
  `amount` double NOT NULL,
  `tran_date` date NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

### Data of table `opening_gl_system` ###


### Structure of table `opening_product` ###

DROP TABLE IF EXISTS `opening_product`;

CREATE TABLE `opening_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(20) NOT NULL,
  `cost` int(20) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `gl_tran_id` int(11) NOT NULL DEFAULT '0',
  `trans_no` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

### Data of table `opening_product` ###


### Structure of table `opening_sale` ###

DROP TABLE IF EXISTS `opening_sale`;

CREATE TABLE `opening_sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(15) DEFAULT 'sale',
  `customer` int(11) DEFAULT NULL,
  `branch` int(11) DEFAULT NULL,
  `ref` varchar(40) DEFAULT NULL,
  `trans_no` int(11) DEFAULT NULL,
  `tran_date` date NOT NULL,
  `currency` char(10) DEFAULT NULL,
  `curr_rate` double NOT NULL,
  `amount` double DEFAULT NULL,
  `payment` double DEFAULT NULL,
  `debit` double NOT NULL,
  `credit` double NOT NULL,
  `status` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

### Data of table `opening_sale` ###


### Structure of table `opening_sale_item` ###

DROP TABLE IF EXISTS `opening_sale_item`;

CREATE TABLE `opening_sale_item` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `description` tinytext NOT NULL,
  `quantity` double NOT NULL,
  `discount_percent` int(2) DEFAULT NULL,
  `tax_type_id` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `currency` char(10) DEFAULT NULL,
  `credit` double NOT NULL DEFAULT '0',
  `debit` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

### Data of table `opening_sale_item` ###


### Structure of table `payment_terms` ###

DROP TABLE IF EXISTS `payment_terms`;

CREATE TABLE `payment_terms` (
  `terms_indicator` int(11) NOT NULL AUTO_INCREMENT,
  `terms` char(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `days_before_due` smallint(6) NOT NULL DEFAULT '0',
  `day_in_following_month` smallint(6) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`terms_indicator`),
  UNIQUE KEY `terms` (`terms`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `payment_terms` ###

INSERT INTO `payment_terms` VALUES
('1', 'Due 15th Of the Following Month', '0', '17', '0'),
('2', 'Due By End Of The Following Month', '0', '30', '0'),
('3', 'Payment due within 10 days', '10', '0', '0'),
('4', 'Cash Only', '0', '0', '0'),
('5', 'Term 30 Days', '30', '0', '0');

### Structure of table `prices` ###

DROP TABLE IF EXISTS `prices`;

CREATE TABLE `prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sales_type_id` int(11) NOT NULL DEFAULT '0',
  `curr_abrev` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `price` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `price` (`stock_id`,`sales_type_id`,`curr_abrev`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `prices` ###


### Structure of table `print_profiles` ###

DROP TABLE IF EXISTS `print_profiles`;

CREATE TABLE `print_profiles` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `profile` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `report` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `printer` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `profile` (`profile`,`report`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `print_profiles` ###

INSERT INTO `print_profiles` VALUES
('1', 'Out of office', NULL, '0'),
('2', 'Sales Department', NULL, '0'),
('3', 'Central', NULL, '2'),
('4', 'Sales Department', '104', '2'),
('5', 'Sales Department', '105', '2'),
('6', 'Sales Department', '107', '2'),
('7', 'Sales Department', '109', '2'),
('8', 'Sales Department', '110', '2'),
('9', 'Sales Department', '201', '2');

### Structure of table `printers` ###

DROP TABLE IF EXISTS `printers`;

CREATE TABLE `printers` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `queue` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `host` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `port` smallint(11) unsigned NOT NULL,
  `timeout` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `printers` ###

INSERT INTO `printers` VALUES
('1', 'QL500', 'Label printer', 'QL500', 'server', '127', '20'),
('2', 'Samsung', 'Main network printer', 'scx4521F', 'server', '515', '5'),
('3', 'Local', 'Local print server at user IP', 'lp', '', '515', '10');

### Structure of table `purch_data` ###

DROP TABLE IF EXISTS `purch_data`;

CREATE TABLE `purch_data` (
  `supplier_id` int(11) NOT NULL DEFAULT '0',
  `stock_id` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `price` double NOT NULL DEFAULT '0',
  `suppliers_uom` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `conversion_factor` double NOT NULL DEFAULT '1',
  `supplier_description` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`supplier_id`,`stock_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `purch_data` ###

INSERT INTO `purch_data` VALUES
('1', 'Purchase', '3990', '', '1', 'Purchase'),
('2', 'Purchase', '30100', '', '1', 'Purchase'),
('3', 'Purchase', '3619.89', '', '1', 'Purchase'),
('5', 'Purchase', '6952', '', '1', 'Purchase');

### Structure of table `purch_order_details` ###

DROP TABLE IF EXISTS `purch_order_details`;

CREATE TABLE `purch_order_details` (
  `po_detail_item` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `item_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` tinytext COLLATE utf8_unicode_ci,
  `delivery_date` date NOT NULL DEFAULT '0000-00-00',
  `qty_invoiced` double NOT NULL DEFAULT '0',
  `unit_price` double NOT NULL DEFAULT '0',
  `act_price` double NOT NULL DEFAULT '0',
  `std_cost_unit` double NOT NULL DEFAULT '0',
  `quantity_ordered` double NOT NULL DEFAULT '0',
  `quantity_received` double NOT NULL DEFAULT '0',
  `tax_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`po_detail_item`),
  KEY `order` (`order_no`,`po_detail_item`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `purch_order_details` ###


### Structure of table `purch_orders` ###

DROP TABLE IF EXISTS `purch_orders`;

CREATE TABLE `purch_orders` (
  `order_no` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL DEFAULT '0',
  `comments` tinytext COLLATE utf8_unicode_ci,
  `ord_date` date NOT NULL DEFAULT '0000-00-00',
  `reference` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `requisition_no` tinytext COLLATE utf8_unicode_ci,
  `into_stock_location` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `delivery_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `total` double NOT NULL DEFAULT '0',
  `tax_included` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_no`),
  KEY `ord_date` (`ord_date`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `purch_orders` ###


### Structure of table `quick_entries` ###

DROP TABLE IF EXISTS `quick_entries`;

CREATE TABLE `quick_entries` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `base_amount` double NOT NULL DEFAULT '0',
  `base_desc` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bal_type` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `description` (`description`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `quick_entries` ###

INSERT INTO `quick_entries` VALUES
('1', '1', 'Maintenance', '0', 'Amount', '0'),
('2', '4', 'Phone', '0', 'Amount', '0'),
('3', '2', 'Cash Sales', '0', 'Amount', '0');

### Structure of table `quick_entry_lines` ###

DROP TABLE IF EXISTS `quick_entry_lines`;

CREATE TABLE `quick_entry_lines` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `qid` smallint(6) unsigned NOT NULL,
  `amount` double DEFAULT '0',
  `action` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `dest_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dimension_id` smallint(6) unsigned DEFAULT NULL,
  `dimension2_id` smallint(6) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qid` (`qid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `quick_entry_lines` ###

INSERT INTO `quick_entry_lines` VALUES
('1', '1', '0', 't-', '1', '0', '0'),
('2', '2', '0', 't-', '1', '0', '0'),
('3', '3', '0', 't-', '1', '0', '0'),
('4', '3', '0', '=', '4010', '0', '0'),
('5', '1', '0', '=', '5765', '0', '0'),
('6', '2', '0', '=', '5780', '0', '0');

### Structure of table `recurrent_invoices` ###

DROP TABLE IF EXISTS `recurrent_invoices`;

CREATE TABLE `recurrent_invoices` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `order_no` int(11) unsigned NOT NULL,
  `debtor_no` int(11) unsigned DEFAULT NULL,
  `group_no` smallint(6) unsigned DEFAULT NULL,
  `days` int(11) NOT NULL DEFAULT '0',
  `monthly` int(11) NOT NULL DEFAULT '0',
  `begin` date NOT NULL DEFAULT '0000-00-00',
  `end` date NOT NULL DEFAULT '0000-00-00',
  `last_sent` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `description` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `recurrent_invoices` ###


### Structure of table `refs` ###

DROP TABLE IF EXISTS `refs`;

CREATE TABLE `refs` (
  `id` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `reference` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`type`),
  KEY `Type_and_Reference` (`type`,`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `refs` ###

INSERT INTO `refs` VALUES
('3', '0', '6');

### Structure of table `sales_order_details` ###

DROP TABLE IF EXISTS `sales_order_details`;

CREATE TABLE `sales_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `trans_type` smallint(6) NOT NULL DEFAULT '30',
  `stk_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` tinytext COLLATE utf8_unicode_ci,
  `qty_sent` double NOT NULL DEFAULT '0',
  `unit_price` double NOT NULL DEFAULT '0',
  `quantity` double NOT NULL DEFAULT '0',
  `discount_percent` double NOT NULL DEFAULT '0',
  `tax_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sorder` (`trans_type`,`order_no`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `sales_order_details` ###


### Structure of table `sales_orders` ###

DROP TABLE IF EXISTS `sales_orders`;

CREATE TABLE `sales_orders` (
  `order_no` int(11) NOT NULL,
  `trans_type` smallint(6) NOT NULL DEFAULT '30',
  `version` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `debtor_no` int(11) NOT NULL DEFAULT '0',
  `branch_code` int(11) NOT NULL DEFAULT '0',
  `reference` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `customer_ref` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `comments` tinytext COLLATE utf8_unicode_ci,
  `ord_date` date NOT NULL DEFAULT '0000-00-00',
  `order_type` int(11) NOT NULL DEFAULT '0',
  `ship_via` int(11) NOT NULL DEFAULT '0',
  `delivery_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deliver_to` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `freight_cost` double NOT NULL DEFAULT '0',
  `from_stk_loc` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `delivery_date` date NOT NULL DEFAULT '0000-00-00',
  `payment_terms` int(11) DEFAULT NULL,
  `total` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`trans_type`,`order_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `sales_orders` ###


### Structure of table `sales_pos` ###

DROP TABLE IF EXISTS `sales_pos`;

CREATE TABLE `sales_pos` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `pos_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cash_sale` tinyint(1) NOT NULL,
  `credit_sale` tinyint(1) NOT NULL,
  `pos_location` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `pos_account` smallint(6) unsigned NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pos_name` (`pos_name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `sales_pos` ###

INSERT INTO `sales_pos` VALUES
('1', 'Default', '1', '1', 'DEF', '2', '0'),
('2', 'Jess ', '0', '1', 'DEF', '2', '0');

### Structure of table `sales_types` ###

DROP TABLE IF EXISTS `sales_types`;

CREATE TABLE `sales_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_type` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tax_included` int(1) NOT NULL DEFAULT '0',
  `factor` double NOT NULL DEFAULT '1',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sales_type` (`sales_type`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `sales_types` ###

INSERT INTO `sales_types` VALUES
('1', 'Retail', '1', '1', '0'),
('2', 'Wholesale', '0', '0.7', '0');

### Structure of table `salesman` ###

DROP TABLE IF EXISTS `salesman`;

CREATE TABLE `salesman` (
  `salesman_code` int(11) NOT NULL AUTO_INCREMENT,
  `salesman_name` char(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `salesman_phone` char(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `salesman_fax` char(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `salesman_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `provision` double NOT NULL DEFAULT '0',
  `break_pt` double NOT NULL DEFAULT '0',
  `provision2` double NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`salesman_code`),
  UNIQUE KEY `salesman_name` (`salesman_name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `salesman` ###

INSERT INTO `salesman` VALUES
('1', 'Sales Person', '', '', '', '5', '1000', '4', '0'),
('2', 'Denise Lim', '90430238', '90430239', 'denise@a2000.net', '0.5', '1', '2', '0');

### Structure of table `security_roles` ###

DROP TABLE IF EXISTS `security_roles`;

CREATE TABLE `security_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sections` text COLLATE utf8_unicode_ci,
  `areas` text COLLATE utf8_unicode_ci,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `role` (`role`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `security_roles` ###

INSERT INTO `security_roles` VALUES
('1', 'Inquiries', 'Inquiries', '768;2816;3072;3328;5632;5888;8192;8448;10752;11008;13312;15872;16128', '257;258;259;260;513;514;515;516;517;518;519;520;521;522;523;524;525;773;774;2822;3073;3075;3076;3077;3329;3330;3331;3332;3333;3334;3335;5377;5633;5640;5889;5890;5891;7937;7938;7939;7940;8193;8194;8450;8451;10497;10753;11009;11010;11012;13313;13315;15617;15618;15619;15620;15621;15622;15623;15624;15625;15626;15873;15882;16129;16130;16131;16132', '0'),
('2', 'System Administrator', 'System Administrator', '256;512;768;2816;3072;3328;5376;5632;5888;7936;8192;8448;10496;10752;11008;13056;13312;15616;15872;16128', '257;258;259;260;513;514;515;516;517;518;519;520;521;522;523;524;525;526;769;770;771;772;773;774;2817;2818;2819;2820;2821;2822;2823;3073;3074;3082;3075;3076;3077;3078;3079;3080;3081;3329;3330;3331;3332;3333;3334;3335;5377;5633;5634;5635;5636;5637;5641;5638;5639;5640;5889;5890;5891;7937;7938;7939;7940;8193;8194;8195;8196;8197;8449;8450;8451;10497;10753;10754;10755;10756;10757;11009;11010;11011;11012;13057;13313;13314;13315;15617;15618;15619;15620;15621;15622;15623;15624;15628;15625;15626;15627;15873;15874;15875;15876;15877;15878;15879;15880;15883;15881;15882;16129;16130;16131;16132', '0'),
('3', 'Salesman', 'Salesman', '768;3072;5632;8192;15872', '773;774;3073;3075;3081;5633;8194;15873', '0'),
('4', 'Stock Manager', 'Stock Manager', '2816;3072;3328;5632;5888;8192;8448;10752;11008;13312;15872;16128', '2818;2822;3073;3076;3077;3329;3330;3330;3330;3331;3331;3332;3333;3334;3335;5633;5640;5889;5890;5891;8193;8194;8450;8451;10753;11009;11010;11012;13313;13315;15882;16129;16130;16131;16132', '0'),
('5', 'Production Manager', 'Production Manager', '512;2816;3072;3328;5632;5888;8192;8448;10752;11008;13312;15616;15872;16128', '521;523;524;2818;2819;2820;2821;2822;2823;3073;3074;3076;3077;3078;3079;3080;3081;3329;3330;3330;3330;3331;3331;3332;3333;3334;3335;5633;5640;5640;5889;5890;5891;8193;8194;8196;8197;8450;8451;10753;10755;11009;11010;11012;13313;13315;15617;15619;15620;15621;15624;15624;15876;15877;15880;15882;16129;16130;16131;16132', '0'),
('6', 'Purchase Officer', 'Purchase Officer', '512;2816;3072;3328;5376;5632;5888;8192;8448;10752;11008;13312;15616;15872;16128', '521;523;524;2818;2819;2820;2821;2822;2823;3073;3074;3076;3077;3078;3079;3080;3081;3329;3330;3330;3330;3331;3331;3332;3333;3334;3335;5377;5633;5635;5640;5640;5889;5890;5891;8193;8194;8196;8197;8449;8450;8451;10753;10755;11009;11010;11012;13313;13315;15617;15619;15620;15621;15624;15624;15876;15877;15880;15882;16129;16130;16131;16132', '0'),
('7', 'AR Officer', 'AR Officer', '512;768;2816;3072;3328;5632;5888;8192;8448;10752;11008;13312;15616;15872;16128', '521;523;524;771;773;774;2818;2819;2820;2821;2822;2823;3073;3073;3074;3075;3076;3077;3078;3079;3080;3081;3081;3329;3330;3330;3330;3331;3331;3332;3333;3334;3335;5633;5633;5634;5637;5638;5639;5640;5640;5889;5890;5891;8193;8194;8194;8196;8197;8450;8451;10753;10755;11009;11010;11012;13313;13315;15617;15619;15620;15621;15624;15624;15873;15876;15877;15878;15880;15882;16129;16130;16131;16132', '0'),
('8', 'AP Officer', 'AP Officer', '512;2816;3072;3328;5376;5632;5888;8192;8448;10752;11008;13312;15616;15872;16128', '257;258;259;260;521;523;524;769;770;771;772;773;774;2818;2819;2820;2821;2822;2823;3073;3074;3082;3076;3077;3078;3079;3080;3081;3329;3330;3331;3332;3333;3334;3335;5377;5633;5635;5640;5889;5890;5891;7937;7938;7939;7940;8193;8194;8196;8197;8449;8450;8451;10497;10753;10755;11009;11010;11012;13057;13313;13315;15617;15619;15620;15621;15624;15876;15877;15880;15882;16129;16130;16131;16132', '0'),
('9', 'Accountant', 'New Accountant', '512;768;2816;3072;3328;5376;5632;5888;8192;8448;10752;11008;13312;15616;15872;16128;91136', '257;258;259;260;515;516;517;518;521;522;523;524;525;771;772;773;774;2817;2818;2819;2820;2821;2822;2823;3073;3074;3082;3075;3076;3077;3078;3079;3080;3081;3329;3330;3331;3332;3333;3334;3335;5377;5633;5634;5635;5636;5637;5641;5638;5639;5640;5889;5890;5891;7937;7938;7939;7940;8193;8194;8196;8197;8449;8450;8451;10497;10753;10754;10755;11009;11010;11012;13057;13313;13315;15617;15618;15619;15620;15621;15622;15623;15624;15628;15625;15626;15627;15629;15873;15874;15875;15876;15877;15878;15879;15880;15883;15881;15882;15884;16129;16130;16131;16132;91236;91237', '0'),
('10', 'Sub Admin', 'Sub Admin', '512;768;2816;3072;3328;5376;5632;5888;8192;8448;10752;11008;13312;15616;15872;16128', '257;258;259;260;521;523;524;771;772;773;774;2818;2819;2820;2821;2822;2823;3073;3074;3082;3075;3076;3077;3078;3079;3080;3081;3329;3330;3331;3332;3333;3334;3335;5377;5633;5634;5635;5637;5638;5639;5640;5889;5890;5891;7937;7938;7939;7940;8193;8194;8196;8197;8449;8450;8451;10497;10753;10755;11009;11010;11012;13057;13313;13315;15617;15619;15620;15621;15624;15873;15874;15876;15877;15878;15879;15880;15882;16129;16130;16131;16132', '0');

### Structure of table `shippers` ###

DROP TABLE IF EXISTS `shippers`;

CREATE TABLE `shippers` (
  `shipper_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipper_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone2` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contact` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shipper_id`),
  UNIQUE KEY `name` (`shipper_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `shippers` ###

INSERT INTO `shippers` VALUES
('1', 'Default', '', '', '', '', '0');

### Structure of table `source_reference` ###

DROP TABLE IF EXISTS `source_reference`;

CREATE TABLE `source_reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_type` tinyint(5) DEFAULT NULL,
  `trans_no` tinyint(11) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

### Data of table `source_reference` ###


### Structure of table `sql_trail` ###

DROP TABLE IF EXISTS `sql_trail`;

CREATE TABLE `sql_trail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sql` text COLLATE utf8_unicode_ci NOT NULL,
  `result` tinyint(1) NOT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `sql_trail` ###

INSERT INTO `sql_trail` VALUES
('1', 'UPDATE users SET last_visit_date=&#039;2015-10-28 11:11:34&#039;\n		WHERE user_id=&#039;janicelohsw&#039;', '1', 'could not update last visit date for user janicelohsw');

### Structure of table `stock_category` ###

DROP TABLE IF EXISTS `stock_category`;

CREATE TABLE `stock_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_tax_type` int(11) NOT NULL DEFAULT '1',
  `dflt_units` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'each',
  `dflt_mb_flag` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'B',
  `dflt_sales_act` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_cogs_act` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_inventory_act` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_adjustment_act` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_assembly_act` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_dim1` int(11) DEFAULT NULL,
  `dflt_dim2` int(11) DEFAULT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  `dflt_no_sale` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `description` (`description`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `stock_category` ###

INSERT INTO `stock_category` VALUES
('1', 'Sales', '1', 'each', 'D', '4010', '4010', '1510', '5040', '1530', '0', '0', '0', '0'),
('2', 'Purchase', '1', 'each', 'D', '5010', '5010', '1510', '5040', '1530', '0', '0', '0', '0');

### Structure of table `stock_master` ###

DROP TABLE IF EXISTS `stock_master`;

CREATE TABLE `stock_master` (
  `stock_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `tax_type_id` int(11) NOT NULL DEFAULT '0',
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `long_description` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `units` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'each',
  `mb_flag` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'B',
  `sales_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `cogs_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inventory_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `adjustment_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `assembly_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dimension_id` int(11) DEFAULT NULL,
  `dimension2_id` int(11) DEFAULT NULL,
  `actual_cost` double NOT NULL DEFAULT '0',
  `last_cost` double NOT NULL DEFAULT '0',
  `material_cost` double NOT NULL DEFAULT '0',
  `labour_cost` double NOT NULL DEFAULT '0',
  `overhead_cost` double NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  `no_sale` tinyint(1) NOT NULL DEFAULT '0',
  `editable` tinyint(1) NOT NULL DEFAULT '0',
  `sales_gst_type` int(11) NOT NULL,
  `purchase_gst_type` int(11) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `stock_master` ###

INSERT INTO `stock_master` VALUES
('Purchase', '2', '0', 'Purchase', 'Purchase', 'each', 'B', '5050', '5010', '1510', '5040', '1530', '0', '0', '0', '0', '14990.29076923', '0', '0', '0', '0', '0', '26', '12'),
('Sales', '1', '0', 'Sales', 'Sales', 'each', 'D', '4010', '4010', '1510', '5040', '1530', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '26', '0');

### Structure of table `stock_moves` ###

DROP TABLE IF EXISTS `stock_moves`;

CREATE TABLE `stock_moves` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL DEFAULT '0',
  `stock_id` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` smallint(6) NOT NULL DEFAULT '0',
  `loc_code` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `person_id` int(11) DEFAULT NULL,
  `price` double NOT NULL DEFAULT '0',
  `reference` char(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `qty` double NOT NULL DEFAULT '1',
  `discount_percent` double NOT NULL DEFAULT '0',
  `standard_cost` double NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`trans_id`),
  KEY `type` (`type`,`trans_no`),
  KEY `Move` (`stock_id`,`loc_code`,`tran_date`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `stock_moves` ###

INSERT INTO `stock_moves` VALUES
('26', '0', 'Purchase', '0', 'DEF', '2016-11-30', NULL, '0', 'Open Balance', '13', '0', '15056.72', '1'),
('27', '0', 'Sales', '0', 'DEF', '2016-11-30', NULL, '0', 'Open Balance', '-12', '0', '0', '1');

### Structure of table `supp_allocations` ###

DROP TABLE IF EXISTS `supp_allocations`;

CREATE TABLE `supp_allocations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amt` double unsigned DEFAULT NULL,
  `date_alloc` date NOT NULL DEFAULT '0000-00-00',
  `trans_no_from` int(11) DEFAULT NULL,
  `trans_type_from` int(11) DEFAULT NULL,
  `trans_no_to` int(11) DEFAULT NULL,
  `trans_type_to` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `From` (`trans_type_from`,`trans_no_from`),
  KEY `To` (`trans_type_to`,`trans_no_to`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `supp_allocations` ###


### Structure of table `supp_invoice_items` ###

DROP TABLE IF EXISTS `supp_invoice_items`;

CREATE TABLE `supp_invoice_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supp_trans_no` int(11) DEFAULT NULL,
  `supp_trans_type` int(11) DEFAULT NULL,
  `gl_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `grn_item_id` int(11) DEFAULT NULL,
  `po_detail_item_id` int(11) DEFAULT NULL,
  `stock_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` tinytext COLLATE utf8_unicode_ci,
  `quantity` double NOT NULL DEFAULT '0',
  `unit_price` double NOT NULL DEFAULT '0',
  `unit_tax` double NOT NULL DEFAULT '0',
  `memo_` tinytext COLLATE utf8_unicode_ci,
  `tax_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Transaction` (`supp_trans_type`,`supp_trans_no`,`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `supp_invoice_items` ###

INSERT INTO `supp_invoice_items` VALUES
('8', '8', '20', '0', '8', '8', 'Purchase', 'Purchase', '1', '3990', '0', NULL, '12'),
('9', '9', '20', '0', '9', '9', 'Purchase', 'Purchase', '1', '39480', '0', NULL, '12'),
('10', '10', '20', '0', '10', '10', 'Purchase', 'Purchase', '1', '11300', '0', NULL, '12'),
('11', '11', '20', '0', '11', '11', 'Purchase', 'Purchase', '1', '30100', '0', NULL, '12'),
('12', '12', '20', '0', '12', '12', 'Purchase', 'Purchase', '1', '6952', '0', NULL, '12'),
('13', '13', '20', '0', '13', '13', 'Purchase', 'Purchase', '1', '3619.89', '0', NULL, '12');

### Structure of table `supp_trans` ###

DROP TABLE IF EXISTS `supp_trans`;

CREATE TABLE `supp_trans` (
  `trans_no` int(11) unsigned NOT NULL DEFAULT '0',
  `type` smallint(6) unsigned NOT NULL DEFAULT '0',
  `supplier_id` int(11) unsigned DEFAULT NULL,
  `reference` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `supp_reference` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `due_date` date NOT NULL DEFAULT '0000-00-00',
  `ov_amount` double NOT NULL DEFAULT '0',
  `ov_discount` double NOT NULL DEFAULT '0',
  `ov_gst` double NOT NULL DEFAULT '0',
  `rate` double NOT NULL DEFAULT '1',
  `alloc` double NOT NULL DEFAULT '0',
  `tax_included` tinyint(1) NOT NULL DEFAULT '0',
  `fixed_access` tinyint(1) NOT NULL DEFAULT '0',
  `cheque` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imported_goods` tinyint(1) DEFAULT '0',
  `paid_tax` tinyint(1) DEFAULT '0',
  `permit` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`type`,`trans_no`),
  KEY `supplier_id` (`supplier_id`),
  KEY `SupplierID_2` (`supplier_id`,`supp_reference`),
  KEY `type` (`type`),
  KEY `tran_date` (`tran_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `supp_trans` ###

INSERT INTO `supp_trans` VALUES
('8', '20', '1', 'YF10532', 'YF10532', '2015-11-01', '2016-01-27', '3990', '0', '239.4', '1', '0', '0', '0', NULL, NULL, '0', '0', '0'),
('9', '20', '2', 'INV000774', 'INV000774', '2015-12-03', '2015-12-03', '39480', '0', '2368.8', '1', '0', '0', '0', NULL, NULL, '0', '0', '0'),
('10', '20', '2', 'INV000797', 'INV000797', '2015-12-09', '2016-01-02', '11300', '0', '678', '1', '0', '0', '0', NULL, NULL, '0', '0', '0'),
('11', '20', '2', 'INV000869', 'INV000869', '2015-12-29', '2016-01-08', '30100', '0', '1806', '1', '0', '0', '0', NULL, NULL, '0', '0', '0'),
('12', '20', '5', 'INV000870', 'B516/15', '2015-12-30', '2016-01-28', '6952', '0', '417.12', '1', '0', '0', '0', NULL, NULL, '0', '0', '0'),
('13', '20', '3', 'INV16490', 'inv16490', '2015-12-08', '2016-01-30', '3619.89', '0', '217.1934', '1', '0', '0', '0', NULL, NULL, '0', '0', '0');

### Structure of table `suppliers` ###

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supp_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `supp_ref` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `supp_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `gst_no` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contact` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `supp_account_no` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_account` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `curr_code` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_terms` int(11) DEFAULT NULL,
  `tax_included` tinyint(1) NOT NULL DEFAULT '0',
  `dimension_id` int(11) DEFAULT '0',
  `dimension2_id` int(11) DEFAULT '0',
  `tax_group_id` int(11) DEFAULT NULL,
  `credit_limit` double NOT NULL DEFAULT '0',
  `purchase_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `payable_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `payment_discount_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `notes` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  `supplier_tax_id` int(11) DEFAULT NULL,
  `industry_code` int(11) DEFAULT NULL,
  `valid_gst` tinyint(1) NOT NULL DEFAULT '1',
  `last_verifile` date DEFAULT NULL,
  `self_bill` tinyint(1) DEFAULT '0',
  `self_bill_approval_ref` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`supplier_id`),
  KEY `supp_ref` (`supp_ref`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `suppliers` ###

INSERT INTO `suppliers` VALUES
('1', 'YOON FATT INDUSTRIES (M) SDN BHD', 'YOON FATT', 'NO:16, JALAN JATI,86000 KLUANG, JOHOR', '', '001125687296', '', '164975-A', '', '', 'MYR', '5', '0', '0', '0', NULL, '0', '5050', '2100', '5060', '', '0', '12', NULL, '0', '0000-00-00', '0', NULL),
('2', 'KUM CHUN SENG TRADING SDN BHD', 'KUM CHUN', '1U, GROUND FLOOR,JALAN LEONG BOON SWEE,\nIPOH PERAK', '', '000596725760', '', '', '', '', 'MYR', '5', '0', '0', '0', NULL, '0', '', '2100', '5060', '', '0', '12', NULL, '0', '0000-00-00', '0', NULL),
('3', 'SIN SENG HUAT SEEDS SDN BHD', 'SIN SENG', 'NO:6, JALAN BP 4/7, BANDAR BUKIT PUCHONG\n47100 PUCHONG, SELANGOR', '', '000255729664', '', '', '', '', 'MYR', '5', '0', '0', '0', NULL, '0', '5050', '2100', '5060', '', '0', '16', NULL, '0', '0000-00-00', '0', NULL),
('5', 'SALESWIDE SDN BHD', 'SALESWIDE ', 'NO:1, JALAN 7/152, \nTAMAN PERINDUSTRIAN OUG\nBATU 6, JALAN PUCHONG,58200 K.L.\n', '', '000269697024', '', '', '', '', 'MYR', '5', '0', '0', '0', NULL, '0', '5050', '2100', '5060', '', '0', '12', NULL, '0', '0000-00-00', '0', NULL);

### Structure of table `sys_prefs` ###

DROP TABLE IF EXISTS `sys_prefs`;

CREATE TABLE `sys_prefs` (
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `length` smallint(6) DEFAULT NULL,
  `value` tinytext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`name`),
  KEY `category` (`category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `sys_prefs` ###

INSERT INTO `sys_prefs` VALUES
('coy_name', 'setup.company', 'varchar', '60', 'WL Agricultural Enterprise'),
('gst_no', 'setup.company', 'varchar', '25', 'G-987654-2000'),
('coy_no', 'setup.company', 'varchar', '25', '12345678-9'),
('tax_prd', 'setup.company', 'int', '11', '3'),
('tax_last', 'setup.company', 'int', '11', '1'),
('postal_address', 'setup.company', 'tinytext', '0', '40, Jalan Indah 2/8, Taman Universiti Indah, 43300 Seri Kembangan.'),
('phone', 'setup.company', 'varchar', '30', '(+603) 6720 2000'),
('fax', 'setup.company', 'varchar', '30', '(+603) 6720 2987'),
('email', 'setup.company', 'varchar', '100', 'limkokweng1978@gmail.com'),
('coy_logo', 'setup.company', 'varchar', '100', NULL),
('domicile', 'setup.company', 'varchar', '55', 'Malaysia'),
('curr_default', 'setup.company', 'char', '3', 'MYR'),
('use_dimension', 'setup.company', 'tinyint', '1', NULL),
('f_year', 'setup.company', 'int', '11', '1'),
('no_item_list', 'setup.company', 'tinyint', '1', '1'),
('no_customer_list', 'setup.company', 'tinyint', '1', '1'),
('no_supplier_list', 'setup.company', 'tinyint', '1', '1'),
('base_sales', 'setup.company', 'int', '11', '1'),
('time_zone', 'setup.company', 'tinyint', '1', '0'),
('add_pct', 'setup.company', 'int', '5', '-1'),
('round_to', 'setup.company', 'int', '5', '1'),
('login_tout', 'setup.company', 'smallint', '6', '6000'),
('past_due_days', 'glsetup.general', 'int', '11', '30'),
('profit_loss_year_act', 'glsetup.general', 'varchar', '15', '9990'),
('retained_earnings_act', 'glsetup.general', 'varchar', '15', '3590'),
('bank_charge_act', 'glsetup.general', 'varchar', '15', '5690'),
('exchange_diff_act', 'glsetup.general', 'varchar', '15', '4450'),
('default_credit_limit', 'glsetup.customer', 'int', '11', '1000'),
('accumulate_shipping', 'glsetup.customer', 'tinyint', '1', '0'),
('legal_text', 'glsetup.customer', 'tinytext', '0', NULL),
('freight_act', 'glsetup.customer', 'varchar', '15', '4430'),
('debtors_act', 'glsetup.sales', 'varchar', '15', '1200'),
('default_sales_act', 'glsetup.sales', 'varchar', '15', '4010'),
('default_sales_discount_act', 'glsetup.sales', 'varchar', '15', '4510'),
('default_prompt_payment_act', 'glsetup.sales', 'varchar', '15', '4500'),
('default_delivery_required', 'glsetup.sales', 'smallint', '6', '1'),
('default_dim_required', 'glsetup.dims', 'int', '11', '20'),
('pyt_discount_act', 'glsetup.purchase', 'varchar', '15', '5060'),
('creditors_act', 'glsetup.purchase', 'varchar', '15', '2100'),
('po_over_receive', 'glsetup.purchase', 'int', '11', '10'),
('po_over_charge', 'glsetup.purchase', 'int', '11', '10'),
('allow_negative_stock', 'glsetup.inventory', 'tinyint', '1', '0'),
('default_inventory_act', 'glsetup.items', 'varchar', '15', '1510'),
('default_cogs_act', 'glsetup.items', 'varchar', '15', '5010'),
('default_adj_act', 'glsetup.items', 'varchar', '15', '5040'),
('default_inv_sales_act', 'glsetup.items', 'varchar', '15', '4010'),
('default_assembly_act', 'glsetup.items', 'varchar', '15', '1530'),
('default_workorder_required', 'glsetup.manuf', 'int', '11', '20'),
('version_id', 'system', 'varchar', '11', '2.3rc'),
('auto_curr_reval', 'setup.company', 'smallint', '6', '1'),
('grn_clearing_act', 'glsetup.purchase', 'varchar', '15', '1550'),
('bcc_email', 'setup.company', 'varchar', '100', NULL),
('baddeb_sale_reverse', NULL, '', NULL, '4015'),
('baddeb_sale_tax_reverse', NULL, '', NULL, 'A2150'),
('baddeb_purchase_reverse', NULL, '', NULL, '5620'),
('baddeb_purchase_tax_reverse', NULL, '', NULL, 'A1300'),
('baddeb_sale_tax', NULL, '', NULL, '35'),
('baddeb_purchase_tax', NULL, '', NULL, '25'),
('gst_start_date', NULL, '', NULL, '2015-10-28'),
('gst_default_code', NULL, '', NULL, NULL),
('self_bill_approval_ref', NULL, '', NULL, NULL),
('self_bill_start_date', NULL, '', NULL, NULL),
('self_bill_end_date', NULL, '', NULL, NULL),
('maximum_claimable_currency', NULL, '', NULL, NULL),
('maximum_claimable_input_tax', NULL, '', NULL, NULL),
('rounding_difference_act', NULL, '', NULL, '4451');

### Structure of table `sys_types` ###

DROP TABLE IF EXISTS `sys_types`;

CREATE TABLE `sys_types` (
  `type_id` smallint(6) NOT NULL DEFAULT '0',
  `type_no` int(11) NOT NULL DEFAULT '1',
  `next_reference` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `sys_types` ###

INSERT INTO `sys_types` VALUES
('0', '19', '7'),
('1', '8', '106'),
('2', '5', '17'),
('4', '3', '1'),
('10', '19', 'IV-00013'),
('11', '3', '2'),
('12', '6', '30'),
('13', '5', 'auto'),
('16', '2', '1'),
('17', '2', '5'),
('18', '1', 'auto'),
('20', '8', 'INV16491'),
('21', '1', '1'),
('22', '4', '6'),
('25', '1', 'auto'),
('26', '1', '8'),
('28', '1', '1'),
('29', '1', '2'),
('30', '5', 'auto'),
('32', '0', '8'),
('35', '1', '1'),
('40', '1', '3');

### Structure of table `tag_associations` ###

DROP TABLE IF EXISTS `tag_associations`;

CREATE TABLE `tag_associations` (
  `record_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tag_id` int(11) NOT NULL,
  UNIQUE KEY `record_id` (`record_id`,`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `tag_associations` ###


### Structure of table `tags` ###

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `tags` ###


### Structure of table `tax_group_items` ###

DROP TABLE IF EXISTS `tax_group_items`;

CREATE TABLE `tax_group_items` (
  `tax_group_id` int(11) NOT NULL DEFAULT '0',
  `tax_type_id` int(11) NOT NULL DEFAULT '0',
  `rate` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`tax_group_id`,`tax_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `tax_group_items` ###


### Structure of table `tax_groups` ###

DROP TABLE IF EXISTS `tax_groups`;

CREATE TABLE `tax_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tax_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `tax_groups` ###

INSERT INTO `tax_groups` VALUES
('1', 'Standard Taxable Customers', '1', '0'),
('2', 'Tax Exempt', '0', '0');

### Structure of table `tax_types` ###

DROP TABLE IF EXISTS `tax_types`;

CREATE TABLE `tax_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` double NOT NULL DEFAULT '0',
  `sales_gl_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `purchasing_gl_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  `gst_03_type` tinyint(3) NOT NULL,
  `f3_box` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `use_for` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `tax_types` ###

INSERT INTO `tax_types` VALUES
('12', '6', '1300', '1300', 'Purchase GST Standard 6% (TX)', '0', '1', '6a', '3'),
('13', '6', '2150', '1300', 'Purchase - Goods And Services Tax (IM)', '0', '2', '6a', '3'),
('14', '0', '2150', '1300', 'Purchase - Goods And Services Tax (IS)', '0', '3', '6a', '3'),
('15', '6', '2150', '5900', 'Purchase - Goods And Services Tax (BL)', '0', '4', '', '3'),
('16', '0', '2150', '1300', 'Purchase - Goods And Services Tax (NR)', '0', '5', '', '3'),
('17', '0', '2150', '1300', 'Purchase - Goods And Services Tax (ZP)', '0', '6', '6a', '3'),
('18', '0', '2150', '1300', 'Purchase - Goods And Services Tax (ZP)', '0', '6', '6a', '3'),
('19', '0', '2150', '1300', 'Purchase - Goods And Services Tax (EP)', '0', '7', '', '3'),
('20', '0', '2150', '1300', 'Purchase - Goods And Services Tax (OP)', '0', '8', '6a', '3'),
('21', '6', '2150', '1300', 'Purchase - Goods And Services Tax (TX-E43)', '0', '9', '6a', '3'),
('22', '6', '2150', '1300', 'Purchase - Goods And Services Tax (TX-N43)', '0', '10', '', '3'),
('23', '6', '2150', '1300', 'Purchase - Goods And Services Tax (TX-RE)', '0', '11', '', '3'),
('24', '0', '2150', '1300', 'Purchase - Goods And Services Tax (GP)', '0', '12', '', '3'),
('25', '6', '2150', '1300', 'Purchase - Goods And Services Tax (AP)', '0', '13', '', '3'),
('26', '6', '2150', '1300', 'Supply GST Standard 6% (SR)', '0', '14', '5a', '2'),
('27', '0', '2150', '1300', 'Supply - Goods And Services Tax (ZRE)', '0', '104', '', '2'),
('28', '0', '2150', '1300', 'Supply - Goods And Services Tax (ES43)', '0', '16', '', '2'),
('29', '0', '2150', '1300', 'Supply - Goods And Services Tax (ESN43)', '0', '17', '', '2'),
('30', '6', '2150', '1300', 'Supply - Goods And Services Tax (DS)', '0', '18', '', '2'),
('31', '0', '2150', '1300', 'Supply - Goods And Services Tax (OS)', '0', '19', '', '2'),
('32', '0', '2150', '1300', 'Supply - Goods And Services Tax (ES)', '0', '20', '', '2'),
('33', '0', '2150', '1300', 'Supply - Goods And Services Tax (RS)', '0', '21', '', '2'),
('34', '0', '2150', '1300', 'Supply - Goods And Services Tax (GS)', '0', '22', '', '2'),
('35', '6', '2150', '1300', 'Supply - Services Tax (AJS)', '0', '105', '', '2'),
('37', '0', '2150', '1300', 'Supply - Goods And Services Tax (ZRL)', '0', '103', '', '2');

### Structure of table `tbltaxcode` ###

DROP TABLE IF EXISTS `tbltaxcode`;

CREATE TABLE `tbltaxcode` (
  `taxcodeid` int(11) NOT NULL AUTO_INCREMENT,
  `taxcodeno` varchar(60) NOT NULL,
  `defaultrate` double DEFAULT NULL,
  `taxcodecategory` varchar(1) NOT NULL,
  PRIMARY KEY (`taxcodeid`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=latin1 ;

### Data of table `tbltaxcode` ###

INSERT INTO `tbltaxcode` VALUES
('1', 'TX', '6', '0'),
('2', 'IM', '6', '0'),
('3', 'IS', '0', '0'),
('4', 'BL', '6', '0'),
('5', 'NR', '0', '0'),
('6', 'ZP', '0', '0'),
('7', 'EP', '0', '0'),
('8', 'OP', '0', '0'),
('9', 'TX-E43', '6', '0'),
('10', 'TX-N43', '6', '0'),
('11', 'TX-RE', '0', '0'),
('12', 'GP', '6', '0'),
('13', 'AP', '0', '0'),
('14', 'SR', '6', '1'),
('15', 'ZR', '6', '1'),
('16', 'ES43', '0', '1'),
('17', 'ESN43', '0', '1'),
('18', 'DS', '0', '1'),
('19', 'OS', '6', '1'),
('20', 'ES', '0', '1'),
('21', 'RS', '0', '1'),
('22', 'GS', '0', '1'),
('23', 'AS', '6', '1');

### Structure of table `trans_tax_details` ###

DROP TABLE IF EXISTS `trans_tax_details`;

CREATE TABLE `trans_tax_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_type` smallint(6) DEFAULT NULL,
  `trans_no` int(11) DEFAULT NULL,
  `tran_date` date NOT NULL,
  `tax_type_id` int(11) NOT NULL DEFAULT '0',
  `rate` double NOT NULL DEFAULT '0',
  `ex_rate` double NOT NULL DEFAULT '1',
  `included_in_price` tinyint(1) NOT NULL DEFAULT '0',
  `net_amount` double NOT NULL DEFAULT '0',
  `amount` double NOT NULL DEFAULT '0',
  `memo` tinytext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `Type_and_Number` (`trans_type`,`trans_no`),
  KEY `tran_date` (`tran_date`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `trans_tax_details` ###


### Structure of table `useronline` ###

DROP TABLE IF EXISTS `useronline`;

CREATE TABLE `useronline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` int(15) NOT NULL DEFAULT '0',
  `ip` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `file` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `timestamp` (`timestamp`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `useronline` ###


### Structure of table `users` ###

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `real_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `role_id` int(11) NOT NULL DEFAULT '1',
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_format` tinyint(1) NOT NULL DEFAULT '0',
  `date_sep` tinyint(1) NOT NULL DEFAULT '0',
  `tho_sep` tinyint(1) NOT NULL DEFAULT '0',
  `dec_sep` tinyint(1) NOT NULL DEFAULT '0',
  `theme` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `page_size` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A4',
  `prices_dec` smallint(6) NOT NULL DEFAULT '2',
  `qty_dec` smallint(6) NOT NULL DEFAULT '2',
  `rates_dec` smallint(6) NOT NULL DEFAULT '4',
  `percent_dec` smallint(6) NOT NULL DEFAULT '1',
  `show_gl` tinyint(1) NOT NULL DEFAULT '1',
  `show_codes` tinyint(1) NOT NULL DEFAULT '0',
  `show_hints` tinyint(1) NOT NULL DEFAULT '0',
  `last_visit_date` datetime DEFAULT NULL,
  `query_size` tinyint(1) unsigned NOT NULL DEFAULT '10',
  `graphic_links` tinyint(1) DEFAULT '1',
  `pos` smallint(6) DEFAULT '1',
  `print_profile` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rep_popup` tinyint(1) DEFAULT '1',
  `sticky_doc_date` tinyint(1) DEFAULT '0',
  `startup_tab` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  `amount_dec` tinyint(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `users` ###

INSERT INTO `users` VALUES
('1', 'wlagricultural', 'e10adc3949ba59abbe56e057f20f883e', 'WL Agricultural Enterprise', '2', '', 'limkokweng1978@gmail.com', 'C', '1', '2', '0', '0', 'template', 'A4', '2', '2', '4', '1', '1', '1', '1', '2016-02-23 19:22:14', '10', '1', '1', '', '1', '1', 'orders', '0', '2');

### Structure of table `voided` ###

DROP TABLE IF EXISTS `voided`;

CREATE TABLE `voided` (
  `type` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL DEFAULT '0',
  `date_` date NOT NULL DEFAULT '0000-00-00',
  `memo_` tinytext COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id` (`type`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `voided` ###


### Structure of table `wo_issue_items` ###

DROP TABLE IF EXISTS `wo_issue_items`;

CREATE TABLE `wo_issue_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `issue_id` int(11) DEFAULT NULL,
  `qty_issued` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `wo_issue_items` ###


### Structure of table `wo_issues` ###

DROP TABLE IF EXISTS `wo_issues`;

CREATE TABLE `wo_issues` (
  `issue_no` int(11) NOT NULL AUTO_INCREMENT,
  `workorder_id` int(11) NOT NULL DEFAULT '0',
  `reference` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `loc_code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workcentre_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`issue_no`),
  KEY `workorder_id` (`workorder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `wo_issues` ###


### Structure of table `wo_manufacture` ###

DROP TABLE IF EXISTS `wo_manufacture`;

CREATE TABLE `wo_manufacture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workorder_id` int(11) NOT NULL DEFAULT '0',
  `quantity` double NOT NULL DEFAULT '0',
  `date_` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  KEY `workorder_id` (`workorder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `wo_manufacture` ###

INSERT INTO `wo_manufacture` VALUES
('1', '1', '2', '2', '2014-06-21');

### Structure of table `wo_requirements` ###

DROP TABLE IF EXISTS `wo_requirements`;

CREATE TABLE `wo_requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workorder_id` int(11) NOT NULL DEFAULT '0',
  `stock_id` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `workcentre` int(11) NOT NULL DEFAULT '0',
  `units_req` double NOT NULL DEFAULT '1',
  `std_cost` double NOT NULL DEFAULT '0',
  `loc_code` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `units_issued` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `workorder_id` (`workorder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `wo_requirements` ###


### Structure of table `workcentres` ###

DROP TABLE IF EXISTS `workcentres`;

CREATE TABLE `workcentres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `workcentres` ###


### Structure of table `workorders` ###

DROP TABLE IF EXISTS `workorders`;

CREATE TABLE `workorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wo_ref` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `loc_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `units_reqd` double NOT NULL DEFAULT '1',
  `stock_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date_` date NOT NULL DEFAULT '0000-00-00',
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `required_by` date NOT NULL DEFAULT '0000-00-00',
  `released_date` date NOT NULL DEFAULT '0000-00-00',
  `units_issued` double NOT NULL DEFAULT '0',
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `released` tinyint(1) NOT NULL DEFAULT '0',
  `additional_costs` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `wo_ref` (`wo_ref`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `workorders` ###

INSERT INTO `workorders` VALUES
('2', '2', 'DEF', '3', '3400', '2014-06-21', '2', '2014-07-11', '2014-06-21', '2', '0', '1', '0');