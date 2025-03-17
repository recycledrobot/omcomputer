CREATE TABLE organisations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    organization VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    document VARCHAR(20) NOT NULL,
    document_number VARCHAR(255) NOT NULL,
    file_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Add indexes for better query performance
CREATE UNIQUE INDEX idx_organization ON organisations(organization);
CREATE INDEX idx_email ON organisations(email);
CREATE INDEX idx_phone ON organisations(phone);
