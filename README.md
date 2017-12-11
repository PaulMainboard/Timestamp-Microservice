# Timestamp-Microservice

## Synopsis

This is a program that takes a date parameter and return a JSON object containing the timestamp and the numerical date format of that parameter that was entered.

You can visit the site [here](https://paul-mainboard-timestamp.herokuapp.com/). 

## Code Example

When visiting the site, if no parameters are given, a JSON object is created with two properties named date and timestamp. Both of these properties are set to null. Also you will presented with the instructions on have to use the site.

### Instructions

The site takes on parameter named date. To set this parameter, put a question mark "?" at the end of the URL and enter the desired timestamp or correctly formatted date.

Here are a list of examples:
https://paul-mainboard-timestamp.herokuapp.com/?date=2/18/2018

https://paul-mainboard-timestamp.herokuapp.com/?date=Feb%2018%202018

https://paul-mainboard-timestamp.herokuapp.com/?date=1518912000

https://paul-mainboard-timestamp.herokuapp.com/?date=February%2018%202018

https://paul-mainboard-timestamp.herokuapp.com/?date=2018-2-18

https://paul-mainboard-timestamp.herokuapp.com/?date=02-18-2018

The output of all the examples above is >{"date":"02-18-2018","timestamp":1518912000}


## Motivation

To test my PHP development skills and get me in the habit of building and creating projects.
Installation

