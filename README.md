<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/asticsoftwares/stud" alt="License"></a>
</p>

## About Brick-Hill
Stud is a modern Brick Hill remake project made using Laravel

## Installing
# Requirements:
- PHP
- Composer
- MariaDB server
- Preferably a Linux machine
- Brain

# Guide
Clone the GitHub repository by running 
```
git clone https://github.com/asticsoftwares/stud
```
<br>
CD into the directory and rename the .env.example file to just env
<br>
Edit the .env file and change the database credentials 
<br>
<br>
Install the required composer packages by running

```
composer install
```
<br>
Now, to setup the needed database tables, run 

```
php artisan migrate
```
<br>
Now the final step, we need to generate an encryption key by running

```
php artisan key:generate
```
<br>
And that's it, now run the following command and you should be able to access Stud on localhost:8000:

```
php artisan serve
```

## Notes
If you lose the .env file and don't have a backup of APP_KEY, you won't be able to access already existing sessions and user balance as they are encrypted using that key 
<br>
<br>
To give user admin permission, set the account's power to 4 (Below that power will be used for things such as forum moderators)

## Contributing 
There are no specific rules to contributing, just make sure to inclue the changelog in the pull request message 

## Contributors
<a href="https://github.com/asticsoftwares/stud/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=asticsoftwares/stud" />
</a>
