CREATE DATABASE IF NOT EXISTS Lotterie;
USE Lotterie;

CREATE TABLE lottery_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    slug VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE lottery_tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lottery_type_id INT NOT NULL,
    ticket_number VARCHAR(100) NOT NULL,
    prize_amount DECIMAL(10,2) NOT NULL,
    prize_description TEXT,
    is_active BOOLEAN DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (lottery_type_id) REFERENCES lottery_types(id)
);

INSERT INTO lottery_types (name, slug) VALUES
('Gold Lottery', 'gold-lottery'),
('Silver Lottery', 'silver-lottery'),
('Bronze Lottery', 'bronze-lottery');