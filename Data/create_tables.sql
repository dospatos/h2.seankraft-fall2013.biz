CREATE TABLE posts (
  post_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  post_text VARCHAR(160) NULL,
  PRIMARY KEY(post_id, user_id),
  INDEX posts_FKIndex1(user_id)
);

CREATE TABLE users (
  user_id INT NOT NULL AUTO_INCREMENT,
  created INT NULL,
  modified INT NULL,
  token VARCHAR(255) NULL,
  [password] VARCHAR(255) NULL,
  last_login INT NULL,
  time_zone VARCHAR(255) NULL,
  first_name VARCHAR(255) NULL,
  last_name VARCHAR(255) NULL,
  email VARCHAR(255) NULL,
  profile_text VARCHAR(255) NULL,
  location VARCHAR(255) NULL,
  PRIMARY KEY(user_id)
);

