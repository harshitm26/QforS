
delete from user_monetary;
delete from ngo_monetary;

LOAD DATA local INFILE "user_monetary1.csv"
INTO TABLE user_monetary
COLUMNS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
ESCAPED BY '"'
LINES TERMINATED BY '\n'
;

LOAD DATA local INFILE "ngo_monetary.csv"
INTO TABLE ngo_monetary
COLUMNS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
ESCAPED BY '"'
LINES TERMINATED BY '\n'
;
/*





LOAD DATA local INFILE "user_monetary2.csv"
INTO TABLE user_monetary
COLUMNS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
ESCAPED BY '"'
LINES TERMINATED BY '\n'
;

*/
