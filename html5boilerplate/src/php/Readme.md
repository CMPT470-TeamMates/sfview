# Help for testing and runing files in this page


## 1, Please create a folder whose name is "**_panoramas_**" in the root ($_SERVER['DOCUMENT_ROOT'])

## 2, Please create these tbales in mysql before you test or run this website:

```MYSQL
CREATE TABLE `pan` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`username` varchar(255) NOT NULL,
`location` varchar(255) NOT NULL,
`dirction` varchar(255) NOT NULL UNIQUE,
PRIMARY KEY (`id`),
FOREIGN KEY (`username`) REFERENCES `user`(`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
```

```MYSQL
CREATE TABLE `marker` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`longitude` varchar(255),
`latitude` varchar(255),
`name` varchar(255) NOT NULL,
`info` varchar(255),
`loaction` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
```

```MYSQL
CREATE TABLE `user` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`username` varchar(255) NOT NULL UNIQUE,
`password` varchar(255) NOT NULL,
`admin` int(11) DEFAULT 0,
`email` varchar(255) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
```

## 3, Please edit the files **panoramaUpload.php**, **usersInfo/login.php** and **usersInfo/signup.php**:
change all `DBPASS` and `DBNAME` to the database's username and password
