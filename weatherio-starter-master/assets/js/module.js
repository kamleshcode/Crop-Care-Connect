/**
 * @license MIT
 * @fileoverview All module functions
 * @copyright codewithsadee 2023 All rights reserved
 * @author codewithsadee <mohammadsadee24@gmail.com>
 */

'use strict';

export const weekDayNames = [
    "Sunday ",
    "Monday ",
    "Tuesday ",
    "Wednesday ",
    "Thursday ",
    "Friday ",
    "Saturday "
];

export const monthNames = [
    "Jan  ",
    "Feb  ",
    "Mar  ",
    "Apr  ",
    "May  ",
    "Jun  ",
    "Jul  ",
    "Aug  ",
    "Sep  ",
    "Oct  ",
    "Nov  ",
    "Dec  ",
];
/**
 * 
 * @param {number} dateUnix unix date in seconds 
 * @param {number} timezone  timezone shift from utc in seconds.
 * @returns {string} data sring. formet: "sunday 10,jan"
 */

export const getDate = function(dateUnix, timezone) {
        const date = new Date((dateUnix + timezone) * 1000);
        const weekDayName = weekDayNames[date.getUTCDay()];
        const monthName = monthNames[date.getUTCMonth()];

        return `${weekDayName} ${date.getUTCDate()}, ${monthName}`;

    }
    /**
     * 
     * @param {number} timeUnix unix date in seconds 
     * @param {number} timezone  timezone shift from utc in seconds.
     * @returns {string} time sring. formet: "HH:MM AM/PM"
     */

export const getTime = function(timeUnix, timezone) {
    const date = new Date((timeUnix + timezone) * 1000);
    const hours = date.getUTCHours();
    const minutes = date.getUTCMinutes();
    const period = hours >= 12 ? "PM" : "AM";

    return `${hours %12 || 12}:${minutes} ${period}`;
}

/**
 * 
 * @param {number} timeUnix unix date in seconds 
 * @param {number} timezone  timezone shift from utc in seconds.
 * @returns {string} time sring. formet: "HH Am/PM"
 */
export const getUTCHours = function(dateUnix, timezone) {
    const date = new Date((dateUnix + timezone) * 1000);
    const hours = date.getUTCHours();
    const period = hours >= 12 ? "PM" : "AM";

    return `${hours %12 || 12} ${period}`;
}

/**
 * 
 * @param {number} mps metter perseconds 
 * @returns {number} kilometer per seconds 
 */

export const mps_to_kmh = mps => {
    const mph = mps * 3600;
    return mph / 1000;
}

export const aqiText = {
    1: {
        level: "Goog",
        message: "Air quality is considered satisfactory, and air pollution poses little or no risk"
    },
    2: {
        level: "Fair",
        message: "Air quality is acceptable; however, for some pollutionts there may bea moderate health concern for a very small number of people who are usually sensitive to air pollution."
    },
    3: {
        level: "Moderate",
        message: "Members of sensitive groups may experience health effects. The general public is not likely to be affected."
    },
    4: {
        level: "poor",
        message: "Everyone may begin to experience health effects; members of sensitive groups may experience more serious health effects"
    },
    5: {
        level: "Very Poor",
        message: "Health warnings of emergency conditions. the entire population is more likely to be affected."

    }


}