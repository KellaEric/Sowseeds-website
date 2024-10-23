create database SIMSAdmin;

use SIMSAdmin;

create table Admin(
    adminID int not null primary key auto_increment,
    fname varchar(255) not null,
    lname varchar(255) not null,
    username varchar(255) not null unique,
    password varchar(255)not null
);

create table events(
    eventID int not null primary key auto_increment,
    title varchar(255) not null,
    description text(65535) not null,
    startTime date not null,
    endTime date not null,
    picture varchar(255) not null
);

create table teachings(
    teachingID int not null primary key auto_increment,
    title varchar(255) not null,
    minister varchar(255) not null,
    teachDate date not null,
    teachDay varchar(255) not null,
    audioFile varchar(255) not null
);

create table contacts(
    contactID int not null primary key auto_increment,
    fname varchar(255) not null,
    lname varchar(255) not null,
    email varchar(255) not null,
    messageType varchar(255) not null,
    contactMessage text(65535) not null
);

create table donations(
    donationID int not null primary key auto_increment, 
    fname varchar(255) not null,
    lname varchar(255)not null,
    paymentType varchar(255) not null,
    accountDetails varchar(255) not null,
    amount float(6,2) not null
);


create table adminEvents(
    adminEventID int not null primary key auto_increment,
    adminID int not null,
    title varchar(255) not null,
    description text(65535) not null,
    startTime date not null,
    endTime date not null,
    picture varchar(255) not null,
    foreign key (adminID) references Admin(adminID)
    
);

create table adminTeachings(
    adminTeachingID int not null primary key auto_increment,
    adminID int not null,
    title varchar(255) not null,
    minister varchar(255) not null,
    teachDate date not null,
    teachDay varchar(255) not null,
    audioFile varchar(255) not null,
    foreign key (adminID) references Admin(adminID)
    
);