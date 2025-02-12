-- Active: 1739035017893@@127.0.0.1@3306@task_app


--Creating Tasks table
CREATE TABLE tasks(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    priority ENUM('low', 'medium', 'high') DEFAULT 'low',
    is_completed TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0: Not Completed, 1: Completed',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);