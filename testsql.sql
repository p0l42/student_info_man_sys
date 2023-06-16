create database sqltest;
create table class (
	id int not null primary key auto_increment,
	classname varchar(10) not null
)engine=InnoDB default charset=utf8;

create table student(
	id int not null primary key auto_increment,
	name varchar(40) not null,
	age int not null,
	classid int not null
)engine InnoDB default charset=utf8;

insert into class(classname) values("一班"),("二班"),("三班");
insert into student(name, age, classid) values("张三", 12, 1), ("李四", 13, 2), ("王五", 11, 2), ("张刘", 15, 3);