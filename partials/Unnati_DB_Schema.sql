-- Unnati Movers - Minimal DB Schema
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120),
  email VARCHAR(160) UNIQUE,
  password VARCHAR(255),
  role VARCHAR(40) DEFAULT 'admin',
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS leads (
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(80), last_name VARCHAR(80),
  phone VARCHAR(40), email VARCHAR(160),
  from_city VARCHAR(80), from_state VARCHAR(80),
  to_city VARCHAR(80), to_state VARCHAR(80),
  service_type VARCHAR(80), move_date DATE,
  status VARCHAR(40) DEFAULT 'Pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
