create table ecole
(
    id  int auto_increment
        primary key,
    nom varchar(255) not null
);

create table eleve
(
    id       int auto_increment
        primary key,
    nom      varchar(255) not null,
    prenom   varchar(255) not null,
    ecole_id int          not null
);

create index eleve_ecole_id_fk
    on eleve (ecole_id);

create table sport
(
    id  int auto_increment
        primary key,
    nom varchar(255) not null
);

create table eleve_sport
(
    id       int auto_increment
        primary key,
    eleve_id int not null,
    sport_id int not null,
    constraint eleve_sport_pk
        unique (sport_id, eleve_id),
    constraint eleve_sport_eleve_id_fk
        foreign key (eleve_id) references eleve (id),
    constraint eleve_sport_sport_id_fk
        foreign key (sport_id) references sport (id)
);

