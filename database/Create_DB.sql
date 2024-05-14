-- Create database NeoGymnasion if it does not exist
CREATE DATABASE IF NOT EXISTS NeoGymnasion;

-- Create table user_data to store user information
CREATE TABLE NeoGymnasion.users_data (
    user_id INT NOT NULL AUTO_INCREMENT,
    first_names VARCHAR(50) NOT NULL,
    last_names VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    birth_date DATE NOT NULL,
    u_address TEXT,
    gender ENUM('M', 'F'),
    PRIMARY KEY (user_id)
);

-- Create table users_login to manage logins
CREATE TABLE NeoGymnasion.users_login (
    login_id INT NOT NULL AUTO_INCREMENT,
    fk_user_id INT NOT NULL UNIQUE,
    username VARCHAR(50) NOT NULL UNIQUE,
    u_password VARCHAR(255) NOT NULL,
    u_role ENUM('admin', 'user') NOT NULL,
    PRIMARY KEY (login_id),
    CONSTRAINT fk_user_id
    FOREIGN KEY (fk_user_id) REFERENCES users_data (user_id)
);

-- Create table to store information about appointments
CREATE TABLE NeoGymnasion.appointments (
    appointment_id INT NOT NULL AUTO_INCREMENT,
    fk_user_id INT NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_reason ENUM('Entrenador', 'Yoga', 'Inteligencia Emocional'),
    PRIMARY KEY (appointment_id),
    CONSTRAINT fk_user_id_appointments
    FOREIGN KEY (fk_user_id) REFERENCES users_data (user_id)
);

-- Create table to store information about the news
CREATE TABLE NeoGymnasion.news (
    news_id INT NOT NULL AUTO_INCREMENT,
    news_title VARCHAR(100) NOT NULL UNIQUE,
    news_img VARCHAR(255) NOT NULL,
    news_text TEXT NOT NULL,
    news_date DATE NOT NULL,
    fk_user_id INT NOT NULL,
    PRIMARY KEY (news_id),
    CONSTRAINT fk_user_id_news
    FOREIGN KEY (fk_user_id) REFERENCES users_data (user_id) 
);
