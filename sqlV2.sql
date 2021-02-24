CREATE TABLE client(
    id bigint not null auto_increment,
    first_name varchar(20),
    last_name varchar(100),
    email varchar(50),
    phone_number varchar(14),
    cellphone_number varchar(14),
    birthdate date,
    CPF int,
    RG varchar(20),
    primary key(id)
);