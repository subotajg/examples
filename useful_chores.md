---
export sql query result to csv file
---
```
mysql -h 127.0.0.1 -P 3306 -dbuser --column-names -p -s dbname < query.sql | tr "\t" ","> result_of_query.csv 
```
``-p`` means need to type password
``-s`` means "silent"

---
copy this file from the homedir of the server to your host

