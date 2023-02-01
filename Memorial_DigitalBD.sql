create database Memorial_Digital;
use Memorial_Digital;

create table usuario (
	id int auto_increment,
	login varchar(255) not null,
    senha varchar(255) not null,
    nivel varchar(255) not null,
    foto longblob,
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

create table documentos(
	id int auto_increment,
    titulo varchar(100),
	documento longblob not null,
    data_upload varchar(20),
    usuario varchar(50),
    primary key (id)
);

select * from documentos ORDER BY id DESC;

create table personagens (
id int NOT NULL primary key auto_increment,
nome varchar(100) NOT NULL,
data_de_referência int(4),
região varchar(100) default 'Interior de Pernambuco',
oficio varchar(100),
genero varchar(10),
coondição varchar(100),
parentesco varchar(100),
outras_informações longtext,
saude varchar(100),
idade int(3),
valor decimal(8,2),

id_doc int, FOREIGN KEY (id_doc) REFERENCES documentos (id)
) DEFAULT CHARSET = utf8mb4;

insert into personagens values
(DEFAULT,'José', 1785, 'Fazendas Poção, Barro vermelho e Salgado, Ribeira do Moxotó, termo da vila de Cimbres', null, 'Masculino', 'Escravo/crioulo', null, null, null, 20, 100000, null),
(DEFAULT,'Francisco', 1785, 'Fazenda das Almas, julgado do Pajeú', null, 'Masculino', 'Escravo/crioulo', null, 'Doente: calor de fígado', null, 30, 50000, null),
(DEFAULT,'Ventura', 1785, 'Fazenda das Almas, julgado do Pajeú', null, 'Masculino', 'Escrabo/Angola', null, 'Doente: potroso', null, 60, 40000, null),
(DEFAULT,'Bastião', 1785, 'Fazenda das Almas, julgado do Pajeú', null, 'Masculino', 'Escrabo/Angola', null, null, null, 30, 100000, null),




(DEFAULT,'Severino', 1774, 'Arrabalde da vila de Cimbres', null, 'Masculino', 'Escravo/Crioulo', 'testeparesteco', 'testeinfo', null, 43, 1240.90, null);


SELECT count(*) from personagens;

select * from personagens ORDER BY id DESC;

select * from personagens where nome LIKE '%allany%' AND idade >= 16 and preço >= 10 AND sexo LIKE '%f%';

select personagens.id,personagens.nome,personagens.id_doc,documentos.titulo,documentos.usuario from personagens join documentos 
on documentos.id = personagens.id_doc order by personagens.id desc;

/*truncate personagens;  */
describe personagens;

create table imagem(
	id int auto_increment,
    binario longblob, 
    nome varchar(255),
    tipo varchar(255),
    primary key (id)
);








