CREATE TRIGGER user_user_info AFTER INSERT ON user_info
FOR EACH ROW INSERT INTO users(username,password)
