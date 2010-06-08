CREATE TABLE copisim_choix (id BIGINT AUTO_INCREMENT, etudiant BIGINT NOT NULL, poste BIGINT NOT NULL, complement BIGINT NOT NULL, ordre BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX poste_idx (poste), INDEX complement_idx (complement), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE copisim_etudiant (id BIGINT AUTO_INCREMENT, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, fac BIGINT NOT NULL, naissance DATE, email VARCHAR(255) NOT NULL, anonyme TINYINT(1) DEFAULT '0' NOT NULL, doublant TINYINT(1) DEFAULT '0' NOT NULL, classement BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX fac_idx (fac), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE copisim_flux (id BIGINT AUTO_INCREMENT, periode BIGINT NOT NULL, ville BIGINT NOT NULL, complement BIGINT NOT NULL, total BIGINT NOT NULL, INDEX periode_idx (periode), INDEX complement_idx (complement), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE copisim_item (id BIGINT AUTO_INCREMENT, periode BIGINT NOT NULL, type VARCHAR(20) NOT NULL, titre VARCHAR(255) NOT NULL, INDEX periode_idx (periode), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE copisim_periode (id BIGINT AUTO_INCREMENT, annee year NOT NULL, debut_choix DATE NOT NULL, fin_choix DATE NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE copisim_poste (id BIGINT AUTO_INCREMENT, periode BIGINT NOT NULL, ville BIGINT NOT NULL, filiere BIGINT NOT NULL, total BIGINT NOT NULL, INDEX periode_idx (periode), INDEX filiere_idx (filiere), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id INT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id INT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id INT AUTO_INCREMENT, user_id INT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id, ip_address)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id INT AUTO_INCREMENT, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id INT, group_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE copisim_choix ADD CONSTRAINT copisim_choix_poste_copisim_poste_id FOREIGN KEY (poste) REFERENCES copisim_poste(id);
ALTER TABLE copisim_choix ADD CONSTRAINT copisim_choix_complement_copisim_item_id FOREIGN KEY (complement) REFERENCES copisim_item(id);
ALTER TABLE copisim_etudiant ADD CONSTRAINT copisim_etudiant_fac_copisim_item_id FOREIGN KEY (fac) REFERENCES copisim_item(id);
ALTER TABLE copisim_flux ADD CONSTRAINT copisim_flux_periode_copisim_periode_id FOREIGN KEY (periode) REFERENCES copisim_periode(id);
ALTER TABLE copisim_flux ADD CONSTRAINT copisim_flux_complement_copisim_item_id FOREIGN KEY (complement) REFERENCES copisim_item(id);
ALTER TABLE copisim_item ADD CONSTRAINT copisim_item_periode_copisim_periode_id FOREIGN KEY (periode) REFERENCES copisim_periode(id);
ALTER TABLE copisim_poste ADD CONSTRAINT copisim_poste_periode_copisim_periode_id FOREIGN KEY (periode) REFERENCES copisim_periode(id);
ALTER TABLE copisim_poste ADD CONSTRAINT copisim_poste_filiere_copisim_item_id FOREIGN KEY (filiere) REFERENCES copisim_item(id);
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
