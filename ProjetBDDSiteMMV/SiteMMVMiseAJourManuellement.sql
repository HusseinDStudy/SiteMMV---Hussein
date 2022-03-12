/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  4/29/2021 1:07:40 AM                     */
/*==============================================================*/
#--MODIF 1--
DROP DATABASE IF EXISTS MMV;
create database if not exists MMV character set utf8 collate utf8_unicode_ci;
USE MMV;
/*
CREATE USER 'hussein'@'%' IDENTIFIED VIA mysql_native_password USING '***';
GRANT ALL PRIVILEGES ON *.* TO 'hussein'@'%' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
*/
grant all privileges on MMV.* to 'hussein'@'127.0.0.1' identified by 'htdocs123';
/*
alter table LISTEMUSICPARVIDEO
   drop foreign key FK_LISTEMUS_LISTEMUSI_VIDEO_MM;

alter table LISTEMUSICPARVIDEO
   drop foreign key FK_LISTEMUS_LISTEMUSI_MUSIC;

alter table MUSIC
   drop foreign key FK_MUSIC_REGROUPE_ALBUM_GR;

alter table VIDEO_MMV
   drop foreign key FK_VIDEO_MM_CREER_CHAINE_Y;

drop table if exists ALBUM_GROUPE;

drop table if exists CHAINE_YOUTUBE;


alter table LISTEMUSICPARVIDEO
   drop foreign key FK_LISTEMUS_LISTEMUSI_VIDEO_MM;

alter table LISTEMUSICPARVIDEO
   drop foreign key FK_LISTEMUS_LISTEMUSI_MUSIC;

drop table if exists LISTEMUSICPARVIDEO;


alter table MUSIC
   drop foreign key FK_MUSIC_REGROUPE_ALBUM_GR;

drop table if exists MUSIC;


alter table VIDEO_MMV
   drop foreign key FK_VIDEO_MM_CREER_CHAINE_Y;

drop table if exists VIDEO_MMV;
*/

#--FIN MODIF 1--


/*==============================================================*/
/* Table : ALBUM_GROUPE                                         */
/*==============================================================*/
create table ALBUM_GROUPE
(
   IDALBGRP             int not null auto_increment  comment '',
   NOMALBGRP            longtext  comment '',
   COMPLETALBGRP        char(1)  comment '',
   primary key (IDALBGRP)
);

/*==============================================================*/
/* Table : CHAINE_YOUTUBE                                       */
/*==============================================================*/
create table CHAINE_YOUTUBE
(
   IDCHAINEY            int not null auto_increment  comment '',
   NOMCHAINEY           varchar(60)  comment '',
   URLCHAINEY           varchar(100)  comment '',
   SOUSCRIPTIONY        bigint  comment '',
   primary key (IDCHAINEY)
);

/*==============================================================*/
/* Table : LISTEMUSICPARVIDEO                                   */
/*==============================================================*/
create table LISTEMUSICPARVIDEO
(
   IDVIDEOMMV           int not null  comment '',
   IDMUSIC              int not null  comment '',
   primary key (IDVIDEOMMV, IDMUSIC)
);

/*==============================================================*/
/* Table : MUSIC                                                */
/*==============================================================*/
create table MUSIC
(
   IDMUSIC              int not null auto_increment  comment '',
   IDALBGRP             int not null  comment '',
   TITREMUSIC           varchar(255)  comment '',
   primary key (IDMUSIC)
);

/*==============================================================*/
/* Table : VIDEO_MMV                                            */
/*==============================================================*/
create table VIDEO_MMV
(
   IDVIDEOMMV           int not null auto_increment  comment '',
   IDCHAINEY            int not null  comment '',
   TITREVIDEOMMV        varchar(100)  comment '',
   URLVIDEOMMV          varchar(100)  comment '',
   COUVERTUREVIDEOMMV   varchar(16000)  comment '',
   DATECREATIONVIDEOMMV date  comment '',
   SUJETVIDEOMMV        varchar(100)  comment '',
   LIKEVIDEOMMV         bigint  comment '',
   DISLIKEVIDEOMMV      bigint  comment '',
   VUEVIDEOMMV          bigint  comment '',
   primary key (IDVIDEOMMV)
);

alter table LISTEMUSICPARVIDEO add constraint FK_LISTEMUS_LISTEMUSI_VIDEO_MM foreign key (IDVIDEOMMV)
      references VIDEO_MMV (IDVIDEOMMV) on delete restrict on update restrict;

alter table LISTEMUSICPARVIDEO add constraint FK_LISTEMUS_LISTEMUSI_MUSIC foreign key (IDMUSIC)
      references MUSIC (IDMUSIC) on delete restrict on update restrict;

alter table MUSIC add constraint FK_MUSIC_REGROUPE_ALBUM_GR foreign key (IDALBGRP)
      references ALBUM_GROUPE (IDALBGRP) on delete restrict on update restrict;

alter table VIDEO_MMV add constraint FK_VIDEO_MM_CREER_CHAINE_Y foreign key (IDCHAINEY)
      references CHAINE_YOUTUBE (IDCHAINEY) on delete restrict on update restrict;

#--MODIF 2--
INSERT INTO album_groupe(NOMALBGRP,COMPLETALBGRP) VALUES ('Album par defaut','N');
INSERT INTO chaine_youtube(NOMCHAINEY,URLCHAINEY,SOUSCRIPTIONY) VALUES ('Chaine par defaut: Hussein','https://www.youtube.com/channel/UCO4Xq1--MrkRjvmMs1MBCEA/',0);
#--FIN MODIF 2--