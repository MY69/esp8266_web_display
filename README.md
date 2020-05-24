# esp8266_web_display
一.esp8266（arduino）：
二.服务器web：
1.新建：index.php
2.新建：db_config.php
3.新建：esp_data.php
三.数据库：
1.新建一个数据库.
2.将以下代码复制到SQL中：
CREATE TABLE SensorData (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sensor VARCHAR(30) NOT NULL,
    location VARCHAR(30) NOT NULL,
    value1 VARCHAR(10),
    value2 VARCHAR(10),
    value3 VARCHAR(10),
    reading_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
