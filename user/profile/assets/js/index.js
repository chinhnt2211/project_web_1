// Ngày tháng 
var fallbackPicker = document.querySelector('.fallbackDatePicker');
var yearSelect = document.querySelector('#year');
var monthSelect = document.querySelector('#month');
var daySelect = document.querySelector('#day');


function populateDays(month) {
    // delete the current set of <option> elements out of the
    // day <select>, ready for the next set to be injected
    while (daySelect.firstChild) {
        daySelect.removeChild(daySelect.firstChild);
    }
    // Create variable to hold new number of days to inject
    var dayNum;
    // 31 or 30 days?
    if (month == 1 | month == 3 | month == 5 | month == 7 | month == 8 | month == 10 | month == 12) {
        dayNum = 31;
    } else if (month == 4 | month == 6 | month == 9 | month == 11) {
        dayNum = 30;
    } else {
        // If month is February, calculate whether it is a leap year or not
        var year = yearSelect.value;
        if (year % 4 == 0) {
            dayNum = 29
        } else {
            dayNum = 28;
        }
    }
    // inject the right number of new <option> elements into the day <select>
    for (i = 1; i <= dayNum; i++) {
        var option = document.createElement('option');
        option.textContent = i;
        daySelect.appendChild(option);
    }
    // if previous day has already been set, set daySelect's value
    // to that day, to avoid the day jumping back to 1 when you
    // change the year
    if (previousDay) {
        daySelect.value = previousDay;

        // If the previous day was set to a high number, say 31, and then
        // you chose a month with less total days in it (e.g. February),
        // this part of the code ensures that the highest day available
        // is selected, rather than showing a blank daySelect
        if (daySelect.value === "") {
            daySelect.value = previousDay - 1;
        }

        if (daySelect.value === "") {
            daySelect.value = previousDay - 2;
        }

        if (daySelect.value === "") {
            daySelect.value = previousDay - 3;
        }
    }
}
function populateYears() {
    // get this year as a number
    var date = new Date();
    var year = date.getFullYear();

    // Make this year, and the 100 years before it available in the year <select>
    for (var i = 0; i <= 100; i++) {
        var option = document.createElement('option');
        option.textContent = year - i;
        yearSelect.appendChild(option);
    }
}
// when the month or year <select> values are changed, rerun populateDays()
// in case the change affected the number of available days
yearSelect.onchange = function() {
    populateDays(monthSelect.value);
}
monthSelect.onchange = function() {
    populateDays(monthSelect.value);
}
//preserve day selection
var previousDay;
// update what day has been set to previously
// see end of populateDays() for usage
daySelect.onchange = function() {
    previousDay = daySelect.value;
}