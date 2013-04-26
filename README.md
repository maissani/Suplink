SupLink
========================

This is a free Url Shortener for people who wanted to know how it works or using it for free.

This app is not under developpement yet.

This app is under public license and works with symfony2 you can copy,and modify it.

Cordialy Mehdi Aissani


1) How to install
----------------------------------

Download it, copy it where you need to put it. 



Create a database schema (You can edit the parameters.yml in app/config directory to match you database configuration): 

php app/console doctrine:database:create



Update the database schema: 

php app/console doctrine:schema:update --force



Clear the cache using the apache or nginx user (www-data by default): 

php app/console cache:clear


Enjoy it.

Cordialy, 
Mehdi Aissani
