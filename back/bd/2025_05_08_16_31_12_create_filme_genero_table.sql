CREATE TABLE filmes_generos (
    id_filme binary(16),
    id_genero binary(36),
    PRIMARY KEY (id_filme, id_genero),
    Foreign Key (id_filme) REFERENCES movies(id),
    Foreign Key (id_genero) REFERENCES genres(id)
)