# Miles Clue

## Local development setup instructions

### Install necessary system requirements

- [Docker Desktop](https://www.docker.com/products/docker-desktop) - latest
- PHP 8.1
- NodeJS 14^

### Setup the environment

- Create an `.env` file by copying the example file: `cp .env.example .env`
- Run `sail up` from the command-line to start up the Docker container. You can optionally add the `-d` flag
  to run the container in detached mode so that you don't have to keep the process running in the terminal.
  Use `sail down` to stop the container.
- Install php dependencies: `composer install`
- Setup app key: `sail artisan key:generate`
- Migrate and seed the database: `sail artisan migrate:fresh && sail artisan db:seed --class="MockDataSeeder"`

### Compiling frontend assets

- Navigate to the `app` directory
- Install dependencies: `npm install`
- One time build: `npm run build`
- Build & watch: `npm run dev`