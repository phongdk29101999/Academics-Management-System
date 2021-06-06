# Admin Level Academics Management System
> Academics Management System for admin build with CakePHP 4

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
