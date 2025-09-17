drop table tb_profil_lembaga;

create table tb_profil_lembaga (
	id int primary key auto_increment,
	nama_sekolah varchar(255),
	jenjang_sekolah varchar(10),
	nsm varchar(50),
	npsn varchar(50),
	status_sekolah varchar(20),
	status_akreditasi varchar(20),
	nilai_akreditasi int,
	tgl_akreditasi date,
	berlaku_akreditasi date,
	no_akreditasi varchar(50),
	npwp varchar(50),
	tahun_berdiri varchar(10),
	no_telp varchar(20),
	email_sekolah varchar(100)
);
