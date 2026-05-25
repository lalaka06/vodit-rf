CREATE DATABASE vodit_rf;
USE vodit_rf;

-- Таблица пользователей (с датой рождения)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,  
    fio VARCHAR(100) NOT NULL,
    birthdate DATE NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Таблица заявок (с видом транспорта)
CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    transport_type VARCHAR(50) NOT NULL,
    start_date DATE NOT NULL,
    payment_method VARCHAR(50),
    status VARCHAR(50) DEFAULT 'Новая',
    review TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Добавление администратора (Admin26 / Demo20)
INSERT INTO users (login, password, fio, birthdate, phone, email) 
VALUES ('Admin26', 'Demo20', 'Администратор Системы', '1990-01-01', '+7 (000) 000-00-00', 'admin@vodit.ru');