create database Memorial_Digital;
use Memorial_Digital;

create table usuario (
	id int auto_increment,
	login varchar(255) not null,
    senha varchar(255) not null,
    nivel varchar(255) not null,
    
    primary key (id)
);

insert into usuario values

(DEFAULT,'Wendel', '81dc9bdb52d04dc20036dbd8313ed055','adm'),
(DEFAULT,'Gabriel Oliveira', '81dc9bdb52d04dc20036dbd8313ed055',"nivel2"),
(DEFAULT,'Elisson Gabriel','81dc9bdb52d04dc20036dbd8313ed055',"nivel1");
/* 1234 
	senha1234
    Feangyjria24533@$
*/
select * from usuario;

create table personagens (
id int not null primary key auto_increment,
nome varchar(100) NOT NULL, 
preço decimal(8,2),
região varchar(30) default 'Interior de Pernambuco',
sexo enum('M','F') default 'M',
idade decimal(2) NOT NULL,
oficio varchar(30),
id_Doc int,
CONSTRAINT fk_doc FOREIGN KEY (id_Doc) REFERENCES documentos (id)
) DEFAULT CHARSET = utf8;

insert into personagens values
(DEFAULT,'João', '1240', 'Riacho das Almas', 'M', '18', 'Carpinteiro',null),
(DEFAULT,'Maria', '100000', 'Agrestina', 'F', '99', 'Costureira',null);

select * from personagens;
select * from personagens where idade >= 17 and preço >= 200 AND sexo LIKE '%%' or nome '%d%';
select personagens.id,personagens.nome,personagens.id_Doc,documentos.titulo,documentos.usuario from personagens join documentos 
on documentos.id = personagens.id_Doc order by personagens.id desc;

/*truncate personagens;  */
describe personagens;

create table imagem(
	id int auto_increment,
    binario longblob, 
    nome varchar(255),
    tipo varchar(255),
    primary key (id)
);

create table documentos(
	id int auto_increment,
    titulo varchar(100),
	documento longblob not null,
    data_upload varchar(20),
    usuario varchar(50),
    primary key (id)
);

select * from documentos;




