
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

I have created a simple flowchart that shows how system will work (usually I do this ) [click here ](https://viewer.diagrams.net/?tags=%7B%7D&highlight=0000ff&edit=_blank&layers=1&nav=1&title=Weather%20Forecast#R7VrLcpswFP0aL5Phjb30I2kW6Uw7aSbNUjYyqBWIChFDv75XIAwY7HHr%2BDFuNgFdve%2FROfciZ2BOw%2BwTR3HwmXmYDgzNywbmbGAYuu268JCWXFlGI7O0%2BJx4ylYbnshvrIyasqbEw0mroWCMChK3jQsWRXghWjbEOVu1my0Zbc8aIx93DE8LRLvWF%2BKJoLQOba22P2DiB9XMuqZqQlQ1VoYkQB5bNUzm3cCccsZE%2BRZmU0yl9yq%2FlP3ut9SuF8ZxJPbpMEYv2HDenoPnr4%2F3ePht9eCTGwXGG6Kp2rBarMgrD2APHKKKjIuA%2BSxC9K62TjhLIw%2FLaTQo1W0eGYvBqIPxBxYiV%2BiiVDAwBSKkqnbJIqEqpV8m5RrkxFv3qkwJS%2FkC79hgdWYQ97HY0c5YIwJnGbMQC55DP44pEuStvQ6kzpS%2Fble7HV6U5%2F8CBf0sXgdf8vy76l8UXmXh1rWr8ixr1s5yVboAuKwD4Sq6jjlHeaNBzEgkksbIX6QBGig5M11FZSVmFniqDX05Yn0Q1ks74Gz0MNShQsHQOjTOr5RVFTdJAdAYGsDGsgKlqh7efPmcIYHl9inHyJOOwBlJpAPK8WG55RRl684R5QEL5yn4brIKiMBPMSqgXUEkaB80tQPMBc52n5AuoqqDMWy7%2FqYS4FUtynrVJmgKcmV8d9La1y6dxom4eJh0Oh8wKE%2FY58TBOFymtC0yBckYBWwMjeJkLU5zXuuSg0KpONE8kQ8RoAgaW9JnJITcUWaMnhT6y5M1ayOiGFpX1gyzT9bcY8mae%2B18svbkk3NOOlmH00nfQSe55Jjsy4jj88A27HZmZfaEd6OHB86xaFB9f14vD5w9eTA6Jw%2F6ovs7Zb9p7JX5L8dJzKIEXy4d7L5s96R0GG7FYV75KcfNL4f5VveBW0TbY4gSP4L3BbgHczBI5xHQqbGqCInnlXzCACyaF0NJRqkvNhjXngzsmRwLKFSCXwydCM5%2B4imjDMadRSySoywJpZumXp4dBqLWju1OF0O7B0LzaIrWh%2BFVKdpoT0XT3XNK2ugEkqZivMp%2FL1XWnB5KnDjK6x03nOLiLSOiuHe7tVXptVFTX7rJwgnu3PZNBM6aEOt9N9UbEShiHwGoQTdzIwAZ6rqySTfrpBGo%2B1VTJA3%2FKT72qC2H5rCLz2kzhL4rzXcKTVJaYHr5Z8lZWMSoRXBBOffQbKMBSfe5g1PfVUzpriQu7rj%2BHQ6ORcqj8uMnpaIBQzn0xeQIrnv2HGF7wvYRefpBdK2NyGMdLfJAsf4JvfzNrf5PBPPuDw%3D%3D) .
