DROP DATABASE IF EXISTS ezdubsdatabase;
CREATE DATABASE ezdubsdatabase;
USE ezdubsdatabase;

GRANT SELECT, INSERT, DELETE, UPDATE
ON ezdubsdatabase.*
TO ezdubs@localhost
IDENTIFIED BY 'ezdubspass';

CREATE TABLE customer_info (
  customerID        INT            NOT NULL   AUTO_INCREMENT,
  firstName         VARCHAR(60)    NOT NULL,
  lastName          VARCHAR(60)    NOT NULL,
  emailAddress      VARCHAR(255)   NOT NULL,
  username          VARCHAR(255)   NOT NULL,
  password          VARCHAR(60)    NOT NULL,
  PRIMARY KEY (customerID)
);

CREATE TABLE products (
  productID         INT            NOT NULL   AUTO_INCREMENT,
  productName       VARCHAR(255)   NOT NULL,
  description       TEXT           NOT NULL,
  quantity          INT            NOT NULL, 
  itemPrice         DECIMAL(10,2)  NOT NULL,
  PRIMARY KEY (productID)
);

CREATE TABLE cart (
  itemID            INT            NOT NULL   AUTO_INCREMENT,
  orderID           INT            NOT NULL,
  productID         INT            NOT NULL,
  itemPrice         DECIMAL(10,2)  NOT NULL,
  quantity          INT NOT NULL,
  PRIMARY KEY (itemID)
);

CREATE TABLE admin (
  adminID           INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)   NOT NULL,
  firstName         VARCHAR(255)   NOT NULL,
  lastName          VARCHAR(255)   NOT NULL,
  PRIMARY KEY (adminID)
);
