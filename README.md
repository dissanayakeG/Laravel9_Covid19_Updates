***project setup***

```
clone the project
cd into project
open a terminal in project root path

create .env file by running
cp .env.example .env

create new database and update .env

run
composer i
npm i

then run
php artisan key:generate
php artisan jwt:secret
php artisan migrate

open three new terminals in project root path

run 
php artisan serve on one terminal
npm run watch-poll or npm run watch on one terminal

run below in other terminal
crontab -e
select preferred editor (nano or vim)
assume that you have choosen nano

copy and paste below line after updating the path-to-project

* * * * * php /path-to-project/artisan schedule:run 1>> /dev/null 2>&1

Ctrl+o
Enter
Ctrl+x

Done!

Brows http://localhost:8000
```
