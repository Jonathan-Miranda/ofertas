CREATE TABLE user (
    ID INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NOMBRE VARCHAR(100) NOT NULL,
    APELLIDO VARCHAR(100) NOT NULL,
    CORREO VARCHAR(200) NOT NULL,
    TELEFONO VARCHAR(20) NOT NULL
);

CREATE TABLE lab (
    ID INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NOMBRE VARCHAR(100) NOT NULL
);

CREATE TABLE product (
    ID INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NOMBRE VARCHAR(100) NOT NULL,
    DESCRIPCION TEXT NOT NULL,
    ID_LAB INT(100) NOT NULL,
    IMG VARCHAR(255) NOT NULL,
    FOREIGN KEY (ID_LAB) REFERENCES lab(ID)
);

CREATE TABLE compra (
    ID INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ID_USER INT(100) NOT NULL,
    FECHA_COMPRA TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ID_USER) REFERENCES user(ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE compra_producto (
    ID INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ID_COMPRA INT(100) NOT NULL,
    ID_PRODUCT INT(100) NOT NULL,
    CANTIDAD INT(10) NOT NULL,
    FOREIGN KEY (ID_COMPRA) REFERENCES compra(ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (ID_PRODUCT) REFERENCES product(ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE promo (
    ID INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ID_USER INT(100) NOT NULL,
    ID_PRODUCT INT(100) NOT NULL,
    COMPRADOS INT(10) NOT NULL,
    FALTANTES INT(10) NOT NULL,
    RESET BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (ID_USER) REFERENCES user(ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (ID_PRODUCT) REFERENCES product(ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE admin (
    ID INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NOMBRE VARCHAR(100) NOT NULL,
    MAIL VARCHAR(200) NOT NULL,
    PW TEXT NOT NULL,
    ROLL INT(3) NOT NULL DEFAULT 2
);

CREATE TABLE history (
    ID INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ID_USER INT(100) NOT NULL,
    ID_PRODUCT INT(100) NOT NULL,
    FECHA TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ID_USER) REFERENCES user(ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (ID_PRODUCT) REFERENCES product(ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);