create database amusementPark;
use amusementPark; 
CREATE TABLE 주문내역 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    고객명 VARCHAR(255),
    입장권_어린이 INT,
    입장권_어른 INT,
    BIG3_어린이 INT,
    BIG3_어른 INT,
    자유이용권_어린이 INT,
    자유이용권_어른 INT,
    연간이용권_어린이 INT,
    연간이용권_어른 INT,
    총금액 INT
);

describe 주문내역;
