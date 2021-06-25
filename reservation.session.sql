-- @block
CREATE TABLE reservation (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_id INT NOT NULL,
    flight_id INT NOT NULL,
    origin VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (flight_id) REFERENCES flight(id) ON DELETE CASCADE
)

-- @block
DROP TABLE reservation

-- @block
CREATE TABLE passenger (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_id INT NOT NULL,
    reservation_id INT NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (reservation_id) REFERENCES reservation(id) ON DELETE CASCADE
)

-- @block
DROP TABLE passenger

-- @block
DROP TABLE users

-- @block
DROP TABLE flight

