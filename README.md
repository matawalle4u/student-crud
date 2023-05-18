# Student CRUD Application
A simple Student and Courses registration application with Laravel and laravel-livewire.  
The app performs the following
## Students
- Create students
- Listing all created students
- Editing Students
- Deleting students
## Courses
- Create courses
- List courses
- Edit courses
- Delete courses
## Student Courses
-  Assign courses to students
-  Remove course assignment

## Tools
- composer (for package management)
- Docker
- docker-compose

## Installation
- Clone the repo by executing `git@github.com:pitch-cardinal-coding/matawalle4u.git`
- navigate into the directory by `cd students-crud`
- Create .env file by running `cp .env.example .env`
- Configure your .env file
- Build with docker by running `docker-compose up`

## Usage
- Build the docker container by executing `COMPOSE_DOCKER_CLI_BUILD=1 DOCKER_BUILDKIT=1 ./vendor/bin/sail build`
- Start the laravel-sail by running `./vendor/bin/sail up`
- Generate laravel project key by running `./vendor/bin/sail artisan key:generate`
- Run laravel migration by `./vendor/bin/sail artisan migrate --force`

## Further Reading
- https://laravel.com/
- https://laravel-livewire.com
- https://pestphp.com/
