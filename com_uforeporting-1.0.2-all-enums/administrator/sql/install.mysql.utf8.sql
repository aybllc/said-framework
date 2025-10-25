CREATE TABLE IF NOT EXISTS `#__ommp_domains` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`code` ENUM('F','M','C','E','S','A','O','H','D','I','G'),
`name` VARCHAR(32)  NULL  DEFAULT "",
`description` VARCHAR(255)  NULL  DEFAULT "",
`minus_range` ENUM('<1200km radius','>2900km depth','>1km depth','Below sea level','>200m depth','<FL180','160–2000km','Corona','<1.5M km','100–1000AU','<100kly') NULL,
`equal_range` ENUM('1200–3400km','70–2900km','100m–1km','0–1500m','40–200m','FL180–450','2000–35786km','Photosphere','1.5M km–3AU','0.01–1ly','100kly–10Mly') NULL,
`plus_range`  ENUM('>3400km','<70km','<100m','>1500m','<40m','>FL450','>35786km','Core direction','>3AU','>1ly','>10Mly')  NULL,
`state` TINYINT(1)  NULL  DEFAULT 0,
`ordering` INT(11)  NULL  DEFAULT 0,
`checked_out` INT(11)  UNSIGNED,
`checked_out_time` DATETIME NULL  DEFAULT NULL ,
`created_by` INT(11)  NULL  DEFAULT 0,
PRIMARY KEY (`id`)
,KEY `idx_state` (`state`)
,KEY `idx_checked_out` (`checked_out`)
,KEY `idx_created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE INDEX `#__ommp_domains_code` ON `#__ommp_domains`(`code`);

CREATE TABLE IF NOT EXISTS `#__ommp_behaviors` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`behavior_code` CHAR(1)  NULL  DEFAULT "",
`behavior_name` VARCHAR(32)  NULL  DEFAULT "",
`behavior_description` VARCHAR(255)  NULL  DEFAULT "",
`ordering` INT(11)  NULL  DEFAULT 0,
`state` TINYINT(1)  NULL  DEFAULT 0,
`checked_out` INT(11)  UNSIGNED,
`checked_out_time` DATETIME NULL  DEFAULT NULL ,
`created_by` INT(11)  NULL  DEFAULT 0,
PRIMARY KEY (`id`)
,KEY `idx_state` (`state`)
,KEY `idx_checked_out` (`checked_out`)
,KEY `idx_created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `#__ommp_environment` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`env_code` VARCHAR(4)  NULL  DEFAULT "",
`env_name` VARCHAR(48)  NULL  DEFAULT "",
`env_description` VARCHAR(255)  NULL  DEFAULT "",
`ordering` INT(11)  NULL  DEFAULT 0,
`state` TINYINT(1)  NULL  DEFAULT 0,
`checked_out` INT(11)  UNSIGNED,
`checked_out_time` DATETIME NULL  DEFAULT NULL ,
`created_by` INT(11)  NULL  DEFAULT 0,
PRIMARY KEY (`id`)
,KEY `idx_state` (`state`)
,KEY `idx_checked_out` (`checked_out`)
,KEY `idx_created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `#__ommp_observer_kinematics` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`code` ENUM('F','M','C','E','S','A','O','H','D','I','G')  NULL  DEFAULT "",
`name` VARCHAR(32)  NULL  DEFAULT "",
`definition` VARCHAR(255)  NULL  DEFAULT "",
`ordering` INT(11)  NULL  DEFAULT 0,
`state` TINYINT(1)  NULL  DEFAULT 0,
`checked_out` INT(11)  UNSIGNED,
`checked_out_time` DATETIME NULL  DEFAULT NULL ,
`created_by` INT(11)  NULL  DEFAULT 0,
PRIMARY KEY (`id`)
,KEY `idx_state` (`state`)
,KEY `idx_checked_out` (`checked_out`)
,KEY `idx_created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `#__ommp_observer_vehicle` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`code` ENUM('F','M','C','E','S','A','O','H','D','I','G')  NULL  DEFAULT "",
`name` VARCHAR(32)  NULL  DEFAULT "",
`definition` VARCHAR(255)  NULL  DEFAULT "",
`state` TINYINT(1)  NULL  DEFAULT 0,
`ordering` INT(11)  NULL  DEFAULT 0,
`checked_out` INT(11)  UNSIGNED,
`checked_out_time` DATETIME NULL  DEFAULT NULL ,
`created_by` INT(11)  NULL  DEFAULT 0,
PRIMARY KEY (`id`)
,KEY `idx_state` (`state`)
,KEY `idx_checked_out` (`checked_out`)
,KEY `idx_created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `#__ommp_invalid_pairs` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`observer_domain` CHAR(1)  NULL  DEFAULT "",
`object_domain` VARCHAR(255)  NULL  DEFAULT "",
`reason` VARCHAR(255)  NULL  DEFAULT "",
`ordering` INT(11)  NULL  DEFAULT 0,
`state` TINYINT(1)  NULL  DEFAULT 0,
`checked_out` INT(11)  UNSIGNED,
`checked_out_time` DATETIME NULL  DEFAULT NULL ,
`created_by` INT(11)  NULL  DEFAULT 0,
PRIMARY KEY (`id`)
,KEY `idx_state` (`state`)
,KEY `idx_checked_out` (`checked_out`)
,KEY `idx_created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `#__ommp_sightings` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`session_id` VARCHAR(64)  NULL  DEFAULT "",
`occurred_at` DATETIME NULL  DEFAULT NULL ,
`--` VARCHAR(255)  NULL  DEFAULT "",
`obs_mod` VARCHAR(1)  NULL  DEFAULT "",
`obs_substrate` CHAR(1)  NULL  DEFAULT "",
`obs_kin` CHAR(2)  NULL  DEFAULT "",
`obs_sens` CHAR(2)  NULL  DEFAULT "",
`obs_occ` CHAR(2)  NULL  DEFAULT "",
`obs_veh` CHAR(2)  NULL  DEFAULT "",
`--` VARCHAR(255)  NULL  DEFAULT "",
`obj_mod` VARCHAR(1)  NULL  DEFAULT "",
`obj_substrate` CHAR(1)  NULL  DEFAULT "",
`behavior_code` CHAR(1)  NULL  DEFAULT "",
`speed_mod` VARCHAR(1)  NULL  DEFAULT "",
`shape_code` CHAR(1)  NULL  DEFAULT "",
`size_mod` VARCHAR(1)  NULL  DEFAULT "",
`--` VARCHAR(255)  NULL  DEFAULT "",
`confidence` VARCHAR(2)  NULL  DEFAULT "",
`--` VARCHAR(255)  NULL  DEFAULT "",
`longitude` DECIMAL(10,7)  NULL  DEFAULT 0,
`elevation_m` DECIMAL(8,2)  NULL  DEFAULT 0,
`alt_ft` INT NULL  DEFAULT 0,
`depth_m` DECIMAL(8,2)  NULL  DEFAULT 0,
`flight_level` INT NULL  DEFAULT 0,
`velocity_kmh` DECIMAL(8,2)  NULL  DEFAULT 0,
`accel_g` DECIMAL(6,2)  NULL  DEFAULT 0,
`--` VARCHAR(255)  NULL  DEFAULT "",
`pattern_hash` VARCHAR(32)  NULL  DEFAULT "",
`--` VARCHAR(encoding)`notes`)  NULL  DEFAULT "",
`created_at` DATETIME NULL  DEFAULT NULL ,
`updated_at` DATETIME NULL  DEFAULT NULL ,
`--` VARCHAR(255)  NULL  DEFAULT "",
`'')` VARCHAR(255)  NULL  DEFAULT "",
`'')` VARCHAR(255)  NULL  DEFAULT "",
`'')` VARCHAR(255)  NULL  DEFAULT "",
`'')` VARCHAR(255)  NULL  DEFAULT "",
`2}$'` VARCHAR(255)  NULL  DEFAULT "",
`ordering` INT(11)  NULL  DEFAULT 0,
`state` TINYINT(1)  NULL  DEFAULT 0,
`checked_out` INT(11)  UNSIGNED,
`checked_out_time` DATETIME NULL  DEFAULT NULL ,
`created_by` INT(11)  NULL  DEFAULT 0,
PRIMARY KEY (`id`)
,KEY `idx_state` (`state`)
,KEY `idx_checked_out` (`checked_out`)
,KEY `idx_created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `#__ommp_media` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`sighting_id` VARCHAR(64)  NULL  DEFAULT "",
`kind` VARCHAR(16)  NULL  DEFAULT "",
`uri` VARCHAR(512)  NULL  DEFAULT "",
`mime` VARCHAR(64)  NULL  DEFAULT "",
`captured_at` DATETIME NULL  DEFAULT NULL ,
`created_at` DATETIME NULL  DEFAULT NULL ,
`ordering` INT(11)  NULL  DEFAULT 0,
`state` TINYINT(1)  NULL  DEFAULT 0,
`checked_out` INT(11)  UNSIGNED,
`checked_out_time` DATETIME NULL  DEFAULT NULL ,
`created_by` INT(11)  NULL  DEFAULT 0,
PRIMARY KEY (`id`)
,KEY `idx_state` (`state`)
,KEY `idx_checked_out` (`checked_out`)
,KEY `idx_created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `#__ommp_witnesses` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`sighting_id` VARCHAR(64)  NULL  DEFAULT "",
`label` VARCHAR(64)  NULL  DEFAULT "",
`notes` VARCHAR(255)  NULL  DEFAULT "",
`created_at` DATETIME NULL  DEFAULT NULL ,
`ordering` INT(11)  NULL  DEFAULT 0,
`state` TINYINT(1)  NULL  DEFAULT 0,
`checked_out` INT(11)  UNSIGNED,
`checked_out_time` DATETIME NULL  DEFAULT NULL ,
`created_by` INT(11)  NULL  DEFAULT 0,
PRIMARY KEY (`id`)
,KEY `idx_state` (`state`)
,KEY `idx_checked_out` (`checked_out`)
,KEY `idx_created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8mb4_unicode_ci;


INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `content_history_options`)
SELECT * FROM ( SELECT 'Domain','com_uforeporting.domain','{"special":{"dbtable":"#__ommp_domains","key":"id","type":"DomainTable","prefix":"Joomla\\\\Component\\\\Uforeporting\\\\Administrator\\\\Table\\\\"}}', CASE 
                                    WHEN 'rules' is null THEN ''
                                    ELSE ''
                                    END as rules, CASE 
                                    WHEN 'field_mappings' is null THEN ''
                                    ELSE ''
                                    END as field_mappings, '{"formFile":"administrator\/components\/com_uforeporting\/forms\/domain.xml", "hideFields":["checked_out","checked_out_time","params","language"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_uforeporting.domain')
) LIMIT 1;

INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `content_history_options`)
SELECT * FROM ( SELECT 'Behavior','com_uforeporting.behavior','{"special":{"dbtable":"#__ommp_behaviors","key":"id","type":"BehaviorTable","prefix":"Joomla\\\\Component\\\\Uforeporting\\\\Administrator\\\\Table\\\\"}}', CASE 
                                    WHEN 'rules' is null THEN ''
                                    ELSE ''
                                    END as rules, CASE 
                                    WHEN 'field_mappings' is null THEN ''
                                    ELSE ''
                                    END as field_mappings, '{"formFile":"administrator\/components\/com_uforeporting\/forms\/behavior.xml", "hideFields":["checked_out","checked_out_time","params","language"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_uforeporting.behavior')
) LIMIT 1;

INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `content_history_options`)
SELECT * FROM ( SELECT 'Environment','com_uforeporting.environment','{"special":{"dbtable":"#__ommp_environment","key":"id","type":"EnvironmentTable","prefix":"Joomla\\\\Component\\\\Uforeporting\\\\Administrator\\\\Table\\\\"}}', CASE 
                                    WHEN 'rules' is null THEN ''
                                    ELSE ''
                                    END as rules, CASE 
                                    WHEN 'field_mappings' is null THEN ''
                                    ELSE ''
                                    END as field_mappings, '{"formFile":"administrator\/components\/com_uforeporting\/forms\/environment.xml", "hideFields":["checked_out","checked_out_time","params","language"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_uforeporting.environment')
) LIMIT 1;

INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `content_history_options`)
SELECT * FROM ( SELECT 'Kinematic','com_uforeporting.kinematic','{"special":{"dbtable":"#__ommp_observer_kinematics","key":"id","type":"KinematicTable","prefix":"Joomla\\\\Component\\\\Uforeporting\\\\Administrator\\\\Table\\\\"}}', CASE 
                                    WHEN 'rules' is null THEN ''
                                    ELSE ''
                                    END as rules, CASE 
                                    WHEN 'field_mappings' is null THEN ''
                                    ELSE ''
                                    END as field_mappings, '{"formFile":"administrator\/components\/com_uforeporting\/forms\/kinematic.xml", "hideFields":["checked_out","checked_out_time","params","language"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_uforeporting.kinematic')
) LIMIT 1;

INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `content_history_options`)
SELECT * FROM ( SELECT 'Vehicle','com_uforeporting.vehicle','{"special":{"dbtable":"#__ommp_observer_vehicle","key":"id","type":"VehicleTable","prefix":"Joomla\\\\Component\\\\Uforeporting\\\\Administrator\\\\Table\\\\"}}', CASE 
                                    WHEN 'rules' is null THEN ''
                                    ELSE ''
                                    END as rules, CASE 
                                    WHEN 'field_mappings' is null THEN ''
                                    ELSE ''
                                    END as field_mappings, '{"formFile":"administrator\/components\/com_uforeporting\/forms\/vehicle.xml", "hideFields":["checked_out","checked_out_time","params","language"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_uforeporting.vehicle')
) LIMIT 1;

INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `content_history_options`)
SELECT * FROM ( SELECT 'Pair','com_uforeporting.pair','{"special":{"dbtable":"#__ommp_invalid_pairs","key":"id","type":"PairTable","prefix":"Joomla\\\\Component\\\\Uforeporting\\\\Administrator\\\\Table\\\\"}}', CASE 
                                    WHEN 'rules' is null THEN ''
                                    ELSE ''
                                    END as rules, CASE 
                                    WHEN 'field_mappings' is null THEN ''
                                    ELSE ''
                                    END as field_mappings, '{"formFile":"administrator\/components\/com_uforeporting\/forms\/pair.xml", "hideFields":["checked_out","checked_out_time","params","language"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_uforeporting.pair')
) LIMIT 1;

INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `content_history_options`)
SELECT * FROM ( SELECT 'Sighting','com_uforeporting.sighting','{"special":{"dbtable":"#__ommp_sightings","key":"id","type":"SightingTable","prefix":"Joomla\\\\Component\\\\Uforeporting\\\\Administrator\\\\Table\\\\"}}', CASE 
                                    WHEN 'rules' is null THEN ''
                                    ELSE ''
                                    END as rules, CASE 
                                    WHEN 'field_mappings' is null THEN ''
                                    ELSE ''
                                    END as field_mappings, '{"formFile":"administrator\/components\/com_uforeporting\/forms\/sighting.xml", "hideFields":["checked_out","checked_out_time","params","language"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_uforeporting.sighting')
) LIMIT 1;

INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `content_history_options`)
SELECT * FROM ( SELECT 'Media','com_uforeporting.media','{"special":{"dbtable":"#__ommp_media","key":"id","type":"MediaTable","prefix":"Joomla\\\\Component\\\\Uforeporting\\\\Administrator\\\\Table\\\\"}}', CASE 
                                    WHEN 'rules' is null THEN ''
                                    ELSE ''
                                    END as rules, CASE 
                                    WHEN 'field_mappings' is null THEN ''
                                    ELSE ''
                                    END as field_mappings, '{"formFile":"administrator\/components\/com_uforeporting\/forms\/media.xml", "hideFields":["checked_out","checked_out_time","params","language"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_uforeporting.media')
) LIMIT 1;

INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `content_history_options`)
SELECT * FROM ( SELECT 'Witnesse','com_uforeporting.witnesse','{"special":{"dbtable":"#__ommp_witnesses","key":"id","type":"WitnesseTable","prefix":"Joomla\\\\Component\\\\Uforeporting\\\\Administrator\\\\Table\\\\"}}', CASE 
                                    WHEN 'rules' is null THEN ''
                                    ELSE ''
                                    END as rules, CASE 
                                    WHEN 'field_mappings' is null THEN ''
                                    ELSE ''
                                    END as field_mappings, '{"formFile":"administrator\/components\/com_uforeporting\/forms\/witnesse.xml", "hideFields":["checked_out","checked_out_time","params","language"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_uforeporting.witnesse')
) LIMIT 1;
