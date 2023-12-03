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