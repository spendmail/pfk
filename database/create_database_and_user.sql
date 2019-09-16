CREATE DATABASE pfk_database CHARACTER SET utf8 COLLATE utf8_general_ci;
GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON pfk_database.* TO 'pfk_user'@'any';
