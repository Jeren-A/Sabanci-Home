DROP DATABASE IF EXISTS SabanciAtHome;
CREATE DATABASE IF NOT EXISTS SabanciAtHome;

DROP TABLE IF EXISTS Problem;
DROP TABLE IF EXISTS Chunk;
DROP TABLE IF EXISTS Customer;
DROP TABLE IF EXISTS Donator;
DROP TABLE IF EXISTS Computer;
DROP TABLE IF EXISTS ProblemChunk;
DROP TABLE IF EXISTS Payments;
DROP TABLE IF EXISTS CustomerProblem;
DROP TABLE IF EXISTS ChunkSolveStatus;
DROP TABLE IF EXISTS DonatorComputer;

CREATE TABLE Problem (
    problem_id INT,
    problem_name VARCHAR(200) NOT NULL,
    weight VARCHAR(20) NOT NULL DEFAULT 'easy',
    PRIMARY KEY(problem_id)
);

CREATE TABLE Chunk (
    chunk_id INT NOT NULL,
    weight VARCHAR(20) NOT NULL,
    description VARCHAR(16),
    -- Will add an address system for files
    PRIMARY KEY (chunk_id)
);

CREATE TABLE Customer (
    user_id INT NOT NULL,
    email VARCHAR(50),
    passphrase VARCHAR(50),
    display_name VARCHAR(100),
    business_type VARCHAR(200),
    flop_demand INT,
    problem_count INT,
    PRIMARY KEY (user_id)
);

CREATE TABLE Donator (
    user_id INT NOT NULL,
    email VARCHAR(50),
    passphrase VARCHAR(50),
    display_name VARCHAR(100),
    none_profit INT,
    for_profit INT,
    total_flops INT,
    computer_count INT,
    PRIMARY KEY(user_id)
);

CREATE TABLE Computer (
    comp_id INT AUTO_INCREMENT,
    core_count INT NOT NULL,
    gpu_core_count INT DEFAULT 0,
    PRIMARY KEY (comp_id)
);

CREATE TABLE ProblemChunk (
  problem_id INT NOT NULL,
  chunk_id INT NOT NULL,
  PRIMARY KEY (chunk_id, problem_id),
  FOREIGN KEY (problem_id) REFERENCES Problem (problem_id) ON DELETE CASCADE,
  FOREIGN KEY (chunk_id) REFERENCES Chunk (chunk_id) ON DELETE CASCADE
);

CREATE TABLE Payments (
    payment_id INTEGER AUTO_INCREMENT,
    chunk_id INTEGER,
    amount DOUBLE,
    payed_at DATE,
    payer INTEGER,
    payee INTEGER,
    PRIMARY KEY(payment_id),
    FOREIGN KEY(payer) REFERENCES Customer(user_id) ON DELETE SET NULL,
    FOREIGN KEY(payee) REFERENCES Donator(user_id) ON DELETE SET NULL,
    FOREIGN KEY(chunk_id) REFERENCES Chunk(chunk_id) ON DELETE SET NULL
);

CREATE TABLE CustomerProblem (
    customer_id INT NOT NULL,
    problem_id INT NOT NULL,
    date_posted VARCHAR(10) NOT NULL,
    deadline VARCHAR(10) NOT NULL,
    PRIMARY KEY(problem_id),
    FOREIGN KEY(customer_id) REFERENCES Customer (user_id) ON DELETE CASCADE ON UPDATE NO ACTION,
    FOREIGN KEY(problem_id) REFERENCES Problem (problem_id) ON DELETE CASCADE ON UPDATE NO ACTION
);

CREATE TABLE ChunkSolveStatus (
  comp_id INTEGER NOT NULL,
  chunk_id INTEGER,
  `status` VARCHAR(20),
  last_changed_at DATE,
  PRIMARY KEY (chunkId),
  FOREIGN KEY (comp_id) REFERENCES Computer (comp_id) ON DELETE SET NULL
  FOREIGN KEY (chunk_id) REFERENCES Chunk (chunk_id) ON DELETE CASCADE
);

CREATE TABLE DonatorComputer (
    donator_id INT NOT NULL,
    comp_id INT NOT NULL,
    PRIMARY KEY(donator_id, comp_id),
    FOREIGN KEY(donator_id) REFERENCES Donator(user_id) ON DELETE CASCADE,
    FOREIGN KEY(comp_id) REFERENCES Computer(comp_id) ON DELETE CASCADE
);