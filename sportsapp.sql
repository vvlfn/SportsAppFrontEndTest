drop database if exists sportsappdb;

create database sportsappdb;

use sportsappdb;

create table Competitions (
    ID int primary key auto_increment,
    Name varchar(200)
);

create table Teams (
    ID int primary key auto_increment,
    Name varchar(100),
    CompetitionID int null
);

create table Contenders (
    ID int primary key auto_increment,
    FirstName varchar(50),
    LastName varchar(50),
    Class varchar(3),
    Gender varchar(1),
    Status varchar(1),
    TeamID int null, foreign key (TeamID) references Teams(ID) ON DELETE SET null
);