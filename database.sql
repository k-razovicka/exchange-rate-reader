-- convert Laravel migrations to raw SQL scripts --

-- unfortunately table 'exchange_rates' wasn't created with migration, but it looks like this:
-- create table `exchange_rates` (
--   `id` bigint unsigned not null auto_increment primary key,
--   `currency` varchar(255) not null unique,
--   `rate` double not null,
-- )

-- migration:2020_06_10_150930_add_currency_to_exchange_rates --
alter table
  `exchange_rates`
add
  `currency` varchar(255) not null;

-- migration:2020_06_10_152042_add_rate_to_exchange_rates --
alter table
  `exchange_rates`
add
  `rate` double not null
after
  `currency`;

