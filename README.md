**Instructions:**
1. clone repository
2. change directory to laravel:
`cd laravel`
3. install composer dependencies:
`composer install`
4. install NPM dependencies:
`npm install`
5. create a copy of your .env file:
`cp .env.example .env`
6. generate an app encryption key:
`php artisan key:generate`
7. create an empty database 
8. change .env file information:
`DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password`
9. migrate the database:
`php artisan migrate`
10. run project:
`php artisan serve`

**Description:**
Application reads exchange rates from RSS feed, shows them to users and saves them to database. 
When accessing route `/all-rates`, all the latest rates for currencies are showed. To provide table pagination functionality,
a table plug-in for jQuery `DataTables` was used.

When clicked on specific currency, route is directed to `/rate/{currency_name}`, where previous days rates for this
currency are showed.
First time working with RSS feed and cron job.

`ShowRatesController` uses methods `lastDay()`, `lastUpdate()` from model `Rate` and returns view `all-rates`. 
`lastDay()` finds last updated exchange rate values from RSS feed. `lastUpdate()` finds last date from RSS feed, when 
updates were made.

`ShowRateHistoryController` uses method `lastUpdate()`, which finds last date from RSS feed, when updates were made.
Also a variable is defined, which contains information from RSS feed like 'description' and 'pubDate', which is later 
looped through, so I could get previous days exchange rate values and dates. Returns view `current-rate`.

Also a command `update:rates` was created, which when called, updates database with newest exchange rate values from RSS 
feed. To call command, run: `php artisan update:rates`.

**In project were also used:**
- SimpleXMLElement
- DataTables


