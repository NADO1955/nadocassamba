SET FOREIGN_KEY_CHECKS = 0;

SET @tables = NULL;
SELECT GROUP_CONCAT('`', table_name, '`') INTO @tables
  FROM information_schema.tables 
  WHERE table_schema = 'railway';

SET @tables = IFNULL(@tables, 'dummy');
SET @drop_stmt = CONCAT('DROP TABLE IF EXISTS ', @tables);
PREPARE stmt FROM @drop_stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET FOREIGN_KEY_CHECKS = 1;

