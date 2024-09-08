-- Create table Jadwal Mapel
create table tb_jadwal_mapel (
	id int auto_increment primary key,
	hari varchar(20) not null,
	jam_ke int(5) not null,
	waktu_mulai varchar(20) not null,
	waktu_selesai varchar(20) not null,
	mapel varchar(50) not null,
	guru_mapel varchar(50) not null
);


-- UPDATE QUERY JADWAL 02-03-2024
alter table sia_yaj.tb_jadwal_mapel add column kelas varchar(15) after hari;