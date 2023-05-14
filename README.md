# Student CRUD Application
This a fully functional web application with Laravel. 
The app performs the following
- CRUD Student and the courses they take
- Search Student and courses

## Instruction
- Install composer for package management

## Installation
- Clone the repo by executing `git@github.com:pitch-cardinal-coding/matawalle4u.git`
- navigate into the directory by `cd students-crud`
- Create .env file by running `cp .env.example .env`

## Usage
- Build the docker container by executing `COMPOSE_DOCKER_CLI_BUILD=1 DOCKER_BUILDKIT=1 ./vendor/bin/sail build`
- Start the laravel-sail by running `./vendor/bin/sail up`
- Generate laravel project key by running `./vendor/bin/sail artisan key:generate`
- Run laravel migration by `./vendor/bin/sail artisan migrate --force`

## Further Reading
- https://laravel-livewire.com
- 
