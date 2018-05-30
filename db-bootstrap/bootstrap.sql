CREATE DATABASE `project`;
CREATE USER 'project'@'%' IDENTIFIED BY 'Password1';
GRANT ALL PRIVILEGES ON `project`.* TO 'project'@'%';