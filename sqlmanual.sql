CREATE TABLE skema(
    Kd_skema varchar(255) primary key,
    Nm_skema varchar(255),
    jenis varchar(255),
    Jml_unit int
);

CREATE TABLE peserta(
    Id_peserta serial primary key,
    Kd_skema varchar(255),
    Nm_peserta varchar(255),
    Jekel varchar(255),
    Alamat varchar(255),
    No_hp varchar(255),
    constraint fk_skema foreign key (Kd_skema) references skema(Kd_skema)
);