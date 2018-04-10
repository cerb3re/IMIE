# Symfony4 Movie project

# About
This project print a movietech in symfony 4

# Install
- import ./SQL/*.sql file in your database
- install composer then type in the movie directory:
	composer install
- open the .env file, then modify the database access addr.
- php bin\console doctrine:generate:schema --dump-sql --force
  	generate database	
- php bin\console app:load-data > 200
	generate fake data
- php -S localhost:8888 -t public
- go to http://localhost/movie/1

# by
T.CHENIER @ 2018 