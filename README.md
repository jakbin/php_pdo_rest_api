# Php Pdo rest api 

![GitHub Contributors](https://img.shields.io/github/contributors/jakbin/flask-blog)

![GitHub commit activity](https://img.shields.io/github/commit-activity/m/jakbin/flask-blog)

![GitHub last commit](https://img.shields.io/github/last-commit/jakbin/flask-blog)

![Php 7.4+](https://img.shields.io/badge/php-7.4+-green.svg)


## This is only example, You need to modify for your own use.

1. Clone the repo 

```bash
	git clone https://github.com/jakbin/php_pdo_rest_api.git
```

2. Then create database.

create a database name with "api".

```sql
	create database api;
```

```sql
	CREATE TABLE `apiTest`.`api` ( `id` INT NOT NULL AUTO_INCREMENT , 
		`fname` TEXT NOT NULL , 
		`lname` TEXT NOT NULL , 
		PRIMARY KEY (`id`)) ENGINE = InnoDB;
```
							Or

import "apiTest.sql" file into your database.

4. Start mysql server.

3. Start api server.
s
```bash 
	php -S 127.0.0.1:8080 -t php_pdo_pdo_api/
```