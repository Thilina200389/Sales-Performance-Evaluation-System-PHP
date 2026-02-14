CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    agent_code VARCHAR(10) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('manager', 'supervisor', 'team_leader', 'agent', 'advisor', 'cashier') NOT NULL
);

-- Sample data
INSERT INTO users (agent_code, password, role) VALUES
('10001', MD5('pass123'), 'manager'),
('20001', MD5('pass123'), 'supervisor'),
('30001', MD5('pass123'), 'team_leader'),
('40001', MD5('pass123'), 'agent'),
('50001', MD5('pass123'), 'advisor'),
('60001', MD5('pass123'), 'cashier');
