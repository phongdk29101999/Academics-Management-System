# Admin Level Academics Management System

> Academics Management System for admin build with CakePHP 4

This is the project which I use to learn about cakePHP
![screenshot](https://github.com/phongdk29101999/AcademicsManagementSystem/blob/master/screen-shot/screen-shot-web.png)

## Feature

- Show total colleges, students and staffs in dashboard.
- Manage (add, edit, remove, show list) colleges, branch, students and staffs.
- Show College, Student, Staff 's Report and user can copy or export file to format such as: xlsx, pdf, csv.

## Requirement
Docker-CE

## Build Server
```
$ cd env && docker build -t training:latest .
$ sh docker-launch.sh
```

## Migrations & Seed
You can use the following commands to migrate the database and seed with sample users as well as destroy all data
```
# migrate & seed
$ docker exec training bash -c "cd var/html/cgi-bin && bin/cake migrations migrate && bin/cake migrations seed"
# destroy
$ docker exec training bash -c "cd var/html/cgi-bin && bin/cake migrations migrate && bin/cake migrations rollback -t 0"
```

## Access to web
```
http://localhost:8080
```

## Connect to database
You can install phpmyadmin in docker container but in this project, I use mysql workbench to connect database with host `localhost:3306`
![screenshot](https://github.com/phongdk29101999/AcademicsManagementSystem/blob/master/screen-shot/screen-shot-mysql.png)
