e# Lumen PHP RESTful API for managing Beer

The Lumen RESTful JSON API is a simple, JSON-backed interface that allows a registered user to add and review beers.

The API will provide the following functionality:


1. User Registration
2. User Login
3. Provide a filtered, paged list of beers 
5. Add a beer (one per user per day)
6. View details of any beer
7. View all ratings of any beer  
9. Rate a beer on the specific points of interest, only one rating per user per beer allowed: 
    * Aroma (1-5)
    * Appearance (1-5)
    * Taste (1-10)
10. Provide a filtered, paged list of styles available for beers.
11. View a specific rating of a beer.
12. Provide a list of beers with their overall rating calculated based on user reviews for a beer
13. Provide an overall rating calculated based on user reviews for a beer

`Calculation: weighted rank (WR) = (v / (v+m)) * R + (m / (v+m)) * C`
`where:`
`R = average for the beer (mean) = (Rating)`
`v = number of reviews for the beer = (Rate Count)`
`m = minimum votes required to be listed in the top beers list (varies according to average of ratecounts for top 50 beers)`
`C = the midpoint of the scale (2.5 in our case)`

### Requirements

* Composer
* PHP 7
* MySQL Database


### Provides: 
 
* Repository
* Eloquent ORM
* Database Seeding
* Swagger UI integration

## Official Documentation

Documentation for the API can be found [here](https://github.com/ReneRautenbach/Lumen-RESTfulAPI/wiki). 

## Client Documentation

Hosted at Swagger Hub
[https://app.swaggerhub.com/apis/clickasite/BeerAPI/1.0.0](https://app.swaggerhub.com/apis/clickasite/BeerAPI/1.0.0)

## Issues

If you experience any issues, please send an e-mail to Rene Rautenbach at [rene@clickasite.co.za](mailto:rene@clickasite.co.za).
 
 
