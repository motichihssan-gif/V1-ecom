-- SQL Script to setup authentication system
-- Run this on your database via phpmyadmin or SQL client

-- 1. Add role column to users table if it doesn't exist
ALTER TABLE users ADD COLUMN role VARCHAR(255) DEFAULT 'USER' AFTER password;

-- 2. Update all existing users without a role
UPDATE users SET role = 'USER' WHERE role IS NULL OR role = '';

-- 3. Create test users
-- Admin user (email: admin@example.com, password: password)
INSERT INTO users (name, email, password, role, created_at, updated_at) 
VALUES ('Admin User', 'admin@example.com', '$2y$12$jKvTZL8X3k0U9.0h3h.H9uX3K9Z3L9K3L9K3L9K3L9K3L9K3L9K3', 'ADMIN', NOW(), NOW())
ON DUPLICATE KEY UPDATE role = 'ADMIN';

-- Regular user (email: test@example.com, password: password)
INSERT INTO users (name, email, password, role, created_at, updated_at) 
VALUES ('Test User', 'test@example.com', '$2y$12$jKvTZL8X3k0U9.0h3h.H9uX3K9Z3L9K3L9K3L9K3L9K3L9K3L9K3', 'USER', NOW(), NOW())
ON DUPLICATE KEY UPDATE role = 'USER';

-- 4. Verify the setup
SELECT id, name, email, role FROM users;

-- Note: The password hash above is for 'password'
-- If you need a different password, generate it with:
-- php artisan tinker
-- > Hash::make('your-password')
