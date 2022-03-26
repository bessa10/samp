-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.36 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para blog_samplemed
CREATE DATABASE IF NOT EXISTS `blog_samplemed` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `blog_samplemed`;

-- Copiando estrutura para tabela blog_samplemed.tb_categories
CREATE TABLE IF NOT EXISTS `tb_categories` (
  `cod_category` int(11) NOT NULL AUTO_INCREMENT,
  `category_description` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `url_category` varchar(100) DEFAULT NULL,
  `excluded` int(1) DEFAULT '0',
  `dth_excluded` datetime DEFAULT NULL,
  `dth_insert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_category`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela blog_samplemed.tb_categories: 5 rows
/*!40000 ALTER TABLE `tb_categories` DISABLE KEYS */;
INSERT IGNORE INTO `tb_categories` (`cod_category`, `category_description`, `order`, `url_category`, `excluded`, `dth_excluded`, `dth_insert`) VALUES
	(1, 'News', 1, 'news', 0, NULL, '2022-03-25 07:50:50'),
	(2, 'Economy', 3, 'economy', 0, NULL, '2022-03-25 07:50:50'),
	(3, 'Politics', 4, 'politics', 0, NULL, '2022-03-25 07:50:50'),
	(4, 'Sports', 2, 'sports', 0, NULL, '2022-03-25 07:50:50'),
	(5, 'Technology', 5, 'technology', 0, NULL, '2022-03-25 07:50:50');
/*!40000 ALTER TABLE `tb_categories` ENABLE KEYS */;

-- Copiando estrutura para tabela blog_samplemed.tb_posts
CREATE TABLE IF NOT EXISTS `tb_posts` (
  `cod_post` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `text` longtext,
  `cod_category` int(11) DEFAULT NULL,
  `excluded` int(1) DEFAULT '0',
  `dth_excluded` datetime DEFAULT NULL,
  `dth_insert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_post`),
  KEY `FK_tb_posts_tb_category` (`cod_category`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela blog_samplemed.tb_posts: 2 rows
/*!40000 ALTER TABLE `tb_posts` DISABLE KEYS */;
INSERT IGNORE INTO `tb_posts` (`cod_post`, `title`, `description`, `text`, `cod_category`, `excluded`, `dth_excluded`, `dth_insert`) VALUES
	(1, 'TESTE', '<p>Lorem ipsum hendrerit id amet aenean fusce purus mauris faucibus, odio magna quisque luctus bibendum lacinia diam elementum litora aptent, quam egestas ultricies sem sodales a vulputate aptent. volutpat per laoreet consequat felis arcu neque suspendisse, placerat aenean amet habitant neque vitae vestibulum, feugiat sit dictum vulputate ultricies viverra. dui platea dolor curae consectetur enim netus suspendisse dapibus leo accumsan, interdum integer quam consequat donec purus blandit magna tincidunt, aptent quisque viverra primis amet ipsum curae quisque convallis. bibendum per blandit scelerisque lobortis enim porta suspendisse, vehicula sagittis etiam felis cursus lectus massa, tempor arcu luctus nulla placerat vitae.&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;Ultrices scelerisque ante inceptos habitant porta nunc senectus eros dictumst iaculis, per nostra volutpat ipsum himenaeos lorem nam nostra justo orci bibendum, elit metus ultricies molestie mauris eros vestibulum eu congue. imperdiet iaculis justo dictumst per hendrerit aliquet ut fusce ad lobortis, praesent lacinia aenean quam eleifend dolor cursus sem vehicula quisque, lobortis nunc nostra id vehicula euismod placerat quisque semper. consequat nisi volutpat augue blandit venenatis nam posuere vestibulum, per sapien conubia consequat ultricies dolor luctus ipsum tempus, purus sociosqu condimentum vitae velit diam placerat. purus viverra arcu quam etiam pellentesque etiam felis conubia odio gravida egestas sapien facilisis, quis pellentesque at gravida suspendisse quisque nullam at himenaeos scelerisque ligula.</p>', '<p>&nbsp;&nbsp; &nbsp;Lorem ipsum hendrerit id amet aenean fusce purus mauris faucibus, odio magna quisque luctus bibendum lacinia diam elementum litora aptent, quam egestas ultricies sem sodales a vulputate aptent. volutpat per laoreet consequat felis arcu neque suspendisse, placerat aenean amet habitant neque vitae vestibulum, feugiat sit dictum vulputate ultricies viverra. dui platea dolor curae consectetur enim netus suspendisse dapibus leo accumsan, interdum integer quam consequat donec purus blandit magna tincidunt, aptent quisque viverra primis amet ipsum curae quisque convallis. bibendum per blandit scelerisque lobortis enim porta suspendisse, vehicula sagittis etiam felis cursus lectus massa, tempor arcu luctus nulla placerat vitae.&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;Ultrices scelerisque ante inceptos habitant porta nunc senectus eros dictumst iaculis, per nostra volutpat ipsum himenaeos lorem nam nostra justo orci bibendum, elit metus ultricies molestie mauris eros vestibulum eu congue. imperdiet iaculis justo dictumst per hendrerit aliquet ut fusce ad lobortis, praesent lacinia aenean quam eleifend dolor cursus sem vehicula quisque, lobortis nunc nostra id vehicula euismod placerat quisque semper. consequat nisi volutpat augue blandit venenatis nam posuere vestibulum, per sapien conubia consequat ultricies dolor luctus ipsum tempus, purus sociosqu condimentum vitae velit diam placerat. purus viverra arcu quam etiam pellentesque etiam felis conubia odio gravida egestas sapien facilisis, quis pellentesque at gravida suspendisse quisque nullam at himenaeos scelerisque ligula.&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;Elementum pulvinar tortor accumsan ullamcorper quisque orci integer nisl congue, suspendisse netus nam pulvinar tempus eu condimentum non enim velit, nulla et curabitur mauris nullam vitae nibh sed. velit non consectetur commodo ultrices vitae potenti, lectus donec nisi commodo integer feugiat per, ultricies massa lorem aenean primis. nisi litora ut primis senectus himenaeos dolor aliquet, mollis class sit justo ut donec, leo imperdiet nulla turpis nam purus. sem viverra aptent curabitur hac torquent quam fusce, ad eros elit fringilla adipiscing eget ipsum, consequat a maecenas pretium sed turpis. lacinia curae litora malesuada turpis ac quam class, mollis class fringilla nisl sodales luctus aenean elementum, arcu torquent netus nec class lectus.&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;Platea fermentum torquent tempus egestas pulvinar turpis aptent urna sapien platea nec, mattis tortor congue vestibulum aliquet facilisis suspendisse ligula facilisis lobortis fringilla, tincidunt varius gravida venenatis arcu id sodales ac fames nam. est fermentum viverra commodo sollicitudin nulla malesuada elementum lacinia sit, molestie gravida conubia volutpat purus consequat tempus lorem aenean purus, tortor condimentum placerat elit ut diam felis euismod. leo molestie a lacinia aenean commodo blandit himenaeos platea dictumst molestie turpis euismod, facilisis morbi phasellus dictum fusce magna at dictumst lacus congue. imperdiet pretium scelerisque donec ullamcorper fermentum est sociosqu, commodo congue quisque tristique consectetur litora, massa proin vivamus fringilla consectetur primis.&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;Consequat vulputate eu consequat habitant et phasellus quisque, lacus himenaeos pharetra enim aliquet hac tincidunt tellus, vivamus maecenas lacus ac litora ut. vivamus nulla vivamus integer eros erat curabitur lorem odio a, iaculis ante tristique sapien fames aliquet consequat sociosqu himenaeos, morbi ad scelerisque ac justo porta velit platea. congue nam vulputate luctus ipsum duis ad iaculis, quam vitae tellus in dapibus sociosqu, eu urna ipsum nostra enim sodales. eget potenti hendrerit a est, blandit mattis.&nbsp;</p>', 1, 0, NULL, '2022-03-22 21:41:05'),
	(4, 'teste2 alt', '<p>Lorem ipsum tellus nostra accumsan integer fermentum aliquam feugiat blandit, est ornare suspendisse tristique et purus auctor cursus. magna lectus adipiscing donec egestas lectus porta at augue, interdum ultrices enim magna pellentesque amet etiam, quisque neque mi euismod feugiat sapien maecenas. convallis semper potenti lorem inceptos dictum cursus morbi commodo vestibulum ut, curabitur odio in et conubia nunc enim netus ipsum, sociosqu litora nibh gravida platea orci euismod luctus massa. egestas hendrerit accumsan sagittis faucibus habitasse curabitur commodo, donec ultrices conubia nibh hendrerit sed non leo, odio mollis auctor nisl aenean ornare.&nbsp;</p>', '<p>&nbsp;&nbsp; &nbsp;Lorem ipsum tellus nostra accumsan integer fermentum aliquam feugiat blandit, est ornare suspendisse tristique et purus auctor cursus. magna lectus adipiscing donec egestas lectus porta at augue, interdum ultrices enim magna pellentesque amet etiam, quisque neque mi euismod feugiat sapien maecenas. convallis semper potenti lorem inceptos dictum cursus morbi commodo vestibulum ut, curabitur odio in et conubia nunc enim netus ipsum, sociosqu litora nibh gravida platea orci euismod luctus massa. egestas hendrerit accumsan sagittis faucibus habitasse curabitur commodo, donec ultrices conubia nibh hendrerit sed non leo, odio mollis auctor nisl aenean ornare.&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;Quisque etiam felis rhoncus tortor donec purus bibendum elit nisi maecenas conubia, ipsum iaculis suscipit fusce auctor cubilia iaculis turpis sed proin curabitur, hac curabitur lacinia dui fringilla in mauris ligula curabitur aliquet. suspendisse pellentesque egestas metus mollis sollicitudin molestie quisque, eleifend rutrum venenatis litora purus vitae inceptos augue, class laoreet porta suscipit dictum leo. rutrum aenean pharetra praesent condimentum cursus aptent, inceptos ut varius morbi hac class nisl, metus mauris vivamus sociosqu tempor. est mattis porttitor orci nulla blandit torquent vehicula nisl quisque, ac euismod et adipiscing sodales commodo iaculis leo hac, dictumst cras eleifend aenean ut class dictumst proin.&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;A faucibus platea velit maecenas ornare est nibh, ipsum scelerisque lacus sodales aliquet porttitor nunc, accumsan ultricies felis massa vel dictumst. odio auctor in eget volutpat quisque consequat donec suspendisse nulla, phasellus nulla ornare luctus vel facilisis praesent ligula dui, erat nullam nunc maecenas proin quam nibh dui. quis vulputate magna nisl accumsan mauris dictumst imperdiet dapibus imperdiet accumsan magna ornare molestie, tristique ad class congue fringilla et purus sed etiam massa purus. ultrices accumsan risus ornare aenean lacus dictum mollis, donec congue aliquam condimentum vestibulum platea est, fusce vestibulum id imperdiet conubia pharetra.&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;Vitae massa ultricies conubia augue torquent neque torquent vestibulum, neque lacinia donec nostra mattis cras at, augue in facilisis laoreet quisque volutpat tincidunt. platea tincidunt cras vel dui quis eros ac vel purus, ut et vel proin est morbi iaculis accumsan condimentum, donec sapien sed auctor bibendum convallis nullam aenean. adipiscing pellentesque purus nostra quam lobortis cubilia sapien platea, tempor pulvinar aliquet ad lobortis eros viverra id, mattis elit vehicula euismod nam lorem potenti. leo porttitor habitasse mi id volutpat iaculis aenean commodo curae ut, semper aliquam class sodales hendrerit libero molestie nunc feugiat etiam, facilisis mattis lobortis potenti in lacus consectetur aenean nec.&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;Sodales tristique eu id consectetur vel tristique ad nulla vulputate tempus, blandit donec dui aenean eget malesuada suscipit nec ad, aenean torquent laoreet dictum eleifend ut enim sociosqu aenean. litora sollicitudin ultrices aliquam commodo facilisis in cras placerat platea, senectus curabitur justo aliquam fames nulla consectetur eros vitae lorem, integer pretium tellus molestie egestas vitae amet etiam. sem justo sollicitudin velit quam orci ac mattis massa cursus ante, arcu himenaeos potenti habitasse erat aliquam cursus odio torquent, tincidunt phasellus ac facilisis interdum duis rhoncus etiam class. posuere volutpat sagittis felis eleifend etiam nisl lorem blandit, cursus nostra etiam arcu orci torquent sem, molestie quis habitant metus pharetra sodales maecenas.&nbsp;</p>', 4, 0, NULL, '2022-03-26 13:34:56');
/*!40000 ALTER TABLE `tb_posts` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
