CREATE TABLE organizations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    organization VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    document VARCHAR(50) NOT NULL,
    file_path VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
