
# News Project

A modular project for publishing articles and news

# Description

I made this project with my current knowledge and the project is being completed...

## Authors

- [@mrezaaminii](https://github.com/mrezaaminii)


## Features

- special CMS
- Using Laravel Spatie to handle roles and permissions
- Login Register system



## Tech Stack

**Client:** React, Bootstrap, TailwindCSS, JQuery

**Server:** PHP, Laravel


## Installation

Step 1: After cloning project run this command to install vendor and all dependencies

```bash
    composer install
```

Step 2:  copy .env.example file and make your own .env file and paste the content of .env.example in it then insert your private information such as your DB_PASSWORD

Step 3: run the following command to build the tables
```bash
    php artisan migrate
```

Step 4: run all seeders using following command to insert all permissions and a predefined user record that has super admin role to access the project's CMS
```bash
    php artisan db:seed
```

Step 5: insert these information to login as super admin and access all the parts of project

###### email : superadmin@example.com
###### password : 12345678
