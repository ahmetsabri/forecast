
# Weather Forecast app

# Installation

After cloning the repo please follow these steps :

- run `composer install`
- run `cp .env.example .env`
- config your database 
- add your open weather api key to key `OPEN_WEATHER_API_KEY` ( you can create one from [here](https://home.openweathermap.org/api_keys) )
- run `php artisan key:generate` 
- run `php artisan migrate`
- start the server `php artisan serve`

## Note : 

Because I am using the free plan of the api we can get weather only for today or any day within past 5 day .

## Workflow 

I have created a simple flowchart that shows how system will work (usually I do this ) [click here ](shorturl.at/dejR6) .
