CREATE TABLE IF NOT EXISTS movies (
    id BINARY(16) DEFAULT (UUID_TO_BIN(UUID(), 1)) PRIMARY KEY,
    name VARCHAR(255), 
    description VARCHAR(255), 
    image VARCHAR(120), 
    year_publication YEAR, 
    featured BOOLEAN 
);