DROP TABLE IF EXISTS equipes;

CREATE TABLE IF NOT EXISTS equipes (
    id              INTEGER PRIMARY KEY,
    equipe            TEXT    NOT NULL,
    academia          TEXT,
    professor           TEXT
);

DROP TABLE IF EXISTS categorias;

CREATE TABLE IF NOT EXISTS categorias (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL,
    idade           TEXT,
    graduacao       TEXT,
    genero          TEXT,
    peso            TEXT,
    kimono          TEXT
);
DROP TABLE IF EXISTS atletas;

CREATE TABLE IF NOT EXISTS atletas (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL,
    equipe          TEXT,
    categoria      TEXT,

    FOREIGN KEY (equipe)
        REFERENCES equipes (id),
    FOREIGN KEY (categoria)
        REFERENCES categorias (id)
);



