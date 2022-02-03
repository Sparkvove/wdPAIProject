create table authors
(
    author_id   serial
        constraint authors_pk
            primary key,
    author_name varchar(50) not null
);

alter table authors
    owner to fjwbnbluotageh;

create unique index authors_author_id_uindex
    on authors (author_id);

INSERT INTO public.authors (author_id, author_name) VALUES (1, 'Christopher Paolini');

create table "Book_authors"
(
    "Book_ID"   integer not null
        constraint "book book_authors___fk"
            references books
            on update cascade on delete cascade,
    "Author_ID" integer not null
        constraint "authors book_authors___fk"
            references authors
            on update cascade on delete cascade
);

alter table "Book_authors"
    owner to fjwbnbluotageh;

create table user_types
(
    id        serial
        constraint user_types_pk
            primary key,
    type_name varchar(30) not null
);

alter table user_types
    owner to fjwbnbluotageh;

create unique index user_types_id_uindex
    on user_types (id);

INSERT INTO public.user_types (id, type_name) VALUES (1, 'user');
INSERT INTO public.user_types (id, type_name) VALUES (2, 'admin');

create table "Book_tags"
(
    "Tag_ID"   serial
        constraint book_tags_pk
            primary key,
    "Tag_name" varchar(50) not null
);

alter table "Book_tags"
    owner to fjwbnbluotageh;

create unique index book_tags_tag_id_uindex
    on "Book_tags" ("Tag_ID");

INSERT INTO public."Book_tags" ("Tag_ID", "Tag_name") VALUES (1, 'Fantasy');
INSERT INTO public."Book_tags" ("Tag_ID", "Tag_name") VALUES (2, 'Magic');
INSERT INTO public."Book_tags" ("Tag_ID", "Tag_name") VALUES (3, 'Sci-fi');
INSERT INTO public."Book_tags" ("Tag_ID", "Tag_name") VALUES (4, 'Romance');
INSERT INTO public."Book_tags" ("Tag_ID", "Tag_name") VALUES (5, 'Horror');


create table "Book_type"
(
    "Type_id"   serial
        constraint book_type_pk
            primary key,
    "Type_name" varchar(30) not null
);

alter table "Book_type"
    owner to fjwbnbluotageh;

create unique index book_type_type_id_uindex
    on "Book_type" ("Type_id");

INSERT INTO public."Book_type" ("Type_id", "Type_name") VALUES (1, 'Book');
INSERT INTO public."Book_type" ("Type_id", "Type_name") VALUES (2, 'Light Novel');
INSERT INTO public."Book_type" ("Type_id", "Type_name") VALUES (3, 'Manhwa');
INSERT INTO public."Book_type" ("Type_id", "Type_name") VALUES (4, 'Manga');

create table "Tags_to_book"
(
    book_id integer not null
        constraint "book book_tags___fk"
            references books
            on update cascade on delete cascade,
    tag_id  integer not null
        constraint tags_tags___fk
            references "Book_tags"
            on update cascade on delete cascade
);

alter table "Tags_to_book"
    owner to fjwbnbluotageh;

create table "Reading_Status"
(
    "Status_id"   serial
        constraint reading_status_pk
            primary key,
    "Status_Name" varchar(30) not null
);

alter table "Reading_Status"
    owner to fjwbnbluotageh;

create unique index reading_status_status_id_uindex
    on "Reading_Status" ("Status_id");

INSERT INTO public."Reading_Status" ("Status_id", "Status_Name") VALUES (1, 'Plan To Read');
INSERT INTO public."Reading_Status" ("Status_id", "Status_Name") VALUES (2, 'Completed');
INSERT INTO public."Reading_Status" ("Status_id", "Status_Name") VALUES (3, 'Dropped');

create table users
(
    id        serial
        constraint users_pk
            primary key,
    name      varchar(100)          not null,
    surname   varchar(100),
    email     varchar(255)          not null,
    password  varchar(255)          not null,
    logged_in boolean default false not null,
    user_type integer default 1     not null
        constraint users_user_types_id_fk
            references user_types
            on update cascade on delete cascade
);

alter table users
    owner to fjwbnbluotageh;

create unique index users_id_uindex
    on users (id);

INSERT INTO public.users (id, name, surname, email, password, logged_in, user_type) VALUES (7, 'spark', null, 'spark@edu.pl', '$2y$10$jCShWTUm80RJk26frp7Rhu/4DmYux6AnAsyUJPAo2hwpjLCRH.AJ.', false, 2);
INSERT INTO public.users (id, name, surname, email, password, logged_in, user_type) VALUES (6, 'spark1', null, 'spark1@edu.pl', '$2y$10$YQt5z25CDzlQr4XZet6u0eNiRHeXnxDMUorWo/B6E8hybQyklPaJq', true, 1);

create table "List"
(
    "List_id" serial
        constraint list_pk
            primary key,
    user_id   integer not null
);

alter table "List"
    owner to fjwbnbluotageh;

create unique index list_list_id_uindex
    on "List" ("List_id");

INSERT INTO public."List" ("List_id", user_id) VALUES (1, 1);

create table books
(
    id_book           integer default nextval('books_id_seq'::regclass) not null
        constraint books_pk
            primary key,
    title             varchar(50)                                       not null,
    description       varchar(300),
    relase_date       date,
    "Completion_date" date,
    rating            double precision,
    status_id         integer,
    type_id           integer,
    image             varchar(255)
);

alter table books
    owner to fjwbnbluotageh;

create unique index books_id_uindex
    on books (id_book);

INSERT INTO public.books (id_book, title, description, relase_date, "Completion_date", rating, status_id, type_id, image) VALUES (3, 'Naj', 'Naj-sum1', null, null, null, null, null, 'comment_1625425112y3iW7437D1trJm8Xeg3AbF,w400.jpg');
INSERT INTO public.books (id_book, title, description, relase_date, "Completion_date", rating, status_id, type_id, image) VALUES (4, 'Eragon', 'Eragon-desc', null, null, null, null, null, 'indeks.jpg');
INSERT INTO public.books (id_book, title, description, relase_date, "Completion_date", rating, status_id, type_id, image) VALUES (5, 'naj2', 'naj-sum2', null, null, null, null, null, 'comment_1625425112y3iW7437D1trJm8Xeg3AbF,w400.jpg');
INSERT INTO public.books (id_book, title, description, relase_date, "Completion_date", rating, status_id, type_id, image) VALUES (18, 'Dziedzictwo', 'dziedzictwo summary', null, null, null, null, null, 'dziedzictwo-b-iext44120547.jpg');
INSERT INTO public.books (id_book, title, description, relase_date, "Completion_date", rating, status_id, type_id, image) VALUES (19, 'Harry Potter', 'Harry Potter Summary', null, null, null, null, null, 'hARRY potter.jpg');
INSERT INTO public.books (id_book, title, description, relase_date, "Completion_date", rating, status_id, type_id, image) VALUES (20, 'Wojny świata wynurzonego TOM I. Sekta zabójców', 'Wojny świata wynurzonego TOM I. Sekta zabójców summary', null, null, null, null, null, 'wojny-swiata-wynurzonego-tom-i-sekta-zabojcow-b-iext66598947.jpg');

create table "Book_status"
(
    "Book_status_id" serial
        constraint book_status_pk
            primary key,
    "Status_name"    varchar(20) not null
);

alter table "Book_status"
    owner to fjwbnbluotageh;

create unique index book_status_book_status_id_uindex
    on "Book_status" ("Book_status_id");

INSERT INTO public."Book_status" ("Book_status_id", "Status_name") VALUES (1, 'Ongoing');
INSERT INTO public."Book_status" ("Book_status_id", "Status_name") VALUES (2, 'Completed');
INSERT INTO public."Book_status" ("Book_status_id", "Status_name") VALUES (3, 'Hiatus');

create table book_list
(
    book_id             integer not null
        constraint "book book_list___fk"
            references books
            on update cascade on delete cascade,
    list_id             integer not null
        constraint " list book_list___fk"
            references "List"
            on update cascade on delete cascade,
    "Reading_Status_id" integer not null,
    "Rating"            double precision,
    opinion             varchar(300)
);

alter table book_list
    owner to fjwbnbluotageh;

