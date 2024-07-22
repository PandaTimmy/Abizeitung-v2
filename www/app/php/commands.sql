CREATE TABLE group_list (
    uuid CHAR(36) PRIMARY KEY,
    title VARCHAR(64),
    info VARCHAR(1000),
    creation_date DATETIME,
    organisation_account_uuid CHAR(36)
);

CREATE TABLE group_users_uuid (
	username VARCHAR(20),
	uuid CHAR(36) PRIMARY KEY,
	first_name VARCHAR(20),
	last_name VARCHAR(20),
    password_hash CHAR(128),
	admin_permissions BOOLEAN
);