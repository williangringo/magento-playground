<?php

$installer = $this;
$installer->startSetup();
$installer->run("
    CREATE TABLE IF NOT EXISTS `blog_comments` (
      `blogcomment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `post_id_fk` int(11) unsigned NOT NULL,
      `comment` varchar(250) NOT NULL,
      `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`blogcomment_id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

    CREATE TABLE IF NOT EXISTS `blog_posts` (
      `blogpost_id` int(11) NOT NULL AUTO_INCREMENT,
      `title` text,
      `post` text,
      `date` datetime DEFAULT NULL,
      `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`blogpost_id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
");
$installer->endSetup();