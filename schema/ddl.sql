-- Users
CREATE TABLE users(
    id INT(11) AUTO_INCREMENT NOT NULL,
    username VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    bio TEXT,
    created_at DATETIME NOT NULL,
    modified_at DATETIME,
    deleted_at DATETIME,
    PRIMARY KEY(id)
);

-- Posts
CREATE TABLE posts(
    id INT(11) AUTO_INCREMENT NOT NULL,
    creator_user_id INT(11) NOT NULL,
    message TEXT NOT NULL,
    created_at DATETIME NOT NULL,
    modified_at DATETIME,
    deleted_at DATETIME,
    PRIMARY KEY(id)
);

-- Comments
CREATE TABLE comments(
    id INT(11) AUTO_INCREMENT NOT NULL,
    creator_user_id INT(11) NOT NULL,
    post_id INT(11) NOT NULL,
    comment TEXT NOT NULL,
    created_at DATETIME NOT NULL,
    modified_at DATETIME,
    deleted_at DATETIME,
    PRIMARY KEY(id)
);

-- Foreign keys
ALTER TABLE posts ADD CONSTRAINT posts_users FOREIGN KEY(creator_user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE comments ADD CONSTRAINT comments_users FOREIGN KEY(creator_user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE comments ADD CONSTRAINT comments_posts FOREIGN KEY(post_id) REFERENCES posts(id) ON UPDATE CASCADE ON DELETE RESTRICT;