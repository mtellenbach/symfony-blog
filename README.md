# Sample Symfony Blog Project

This project was intended to train my skills in PHP/Symphony, Docker, PHP-Unit and Vue.js and inspired by the tutorial
of [twilio.com](https://www.twilio.com/blog/get-started-docker-symfony).


## Prerequisities
Install the following packages for your environment OS.
- [Git](https://www.atlassian.com/git/tutorials/install-git)
- An ideal IDE of your choice (this project was created with PHPStorm)

Either one of the following:
- [Docker for Windows](https://docs.docker.com/desktop/install/windows-install/)
- [Docker for Linux](https://docs.docker.com/desktop/install/linux-install/)
- [Docker for Mac](https://docs.docker.com/desktop/install/mac-install/)

## Installation
1. Clone this repository into a directory of your choice
2. Open the terminal inside the project folder
3. Run `docker-compose up -d -build`
4. Open `localhost:8080` inside your browser
5. Now you should see the Symfony welcome page

### Migrations and sample data
1. Run `docker exec -it application /bin/bash`
2. Inside the application shell, run `composer install && symfony console doctrine:migrations:migrate`
3. Open `localhost:8080/post` to check if the data has been correctly seeded

### Container shutdown
To stop the docker-containers simply run the following command/s:
- Run `exit` if you are still inside the application shell
- `docker-compose dowm`
