/**
 * @license MIT
 * @fileoverview All api related stuff like api_key, api request etc.
 * @copyright codewithsadee 2023 All rights reserved
 * @author codewithsadee <mohammadsadee24@gmail.com>
 */

'use strict';

const api_key = "5745a4940980a98eda647895eed4e992";

export const fetchData = function (URL, callback) {
    fetch('${URL}&appid=${api_key}')
    .then(res => res.json())
    .then(data => callback(data));
}

export const url = {
    currentweather(lat, lon){
        return 'https://api.openweathermap.org/data/2.5/weather?${lat}&${lon}&units=metric'
    },
    forecast(lat, lon) {
        return 'https://api.openweathermap.org/data/2.5/forecast?${lat}&${lon}&units=metric'
    },
    airPollution(lat, lon){
        return 'https://api.openweathermap.org/data/2.5/air_pollution?${lat}&${lon}'
    },
    reverseGeo(lat, lon){
        return 'https://api.openweathermap.org/data/1.0/reverse?${lat}&${lon}&limit=5'
    },
    geo(query){
        return 'https://api.openweathermap.org/geo/1.0/direct?q=${query}&limit=5'
    }
}