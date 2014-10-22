Instructions:

Please add the necessary event handlers in the HTML file for each anchor element as described in the text it contains.
Each event must create a POST request with a single parameter to an endpoint which uses the activityModel class to process the data.
The parameter's value must be a JSON object containing the event type (click, mouse over, etc.) and the user id (an integer of your choice).
Send output to the browser's JavaScript console in case of success or error with an appropriate message for each case.
Note that the anchor tags will not point to a different URI. You may choose to use an external library to add event handlers and create HTTP requests.


We're looking for
-modified HTML file
-activityModel.php (which extends activityModelCore)
-a "controller" file to receive POST requests, a call to process the data, and return a value to the front-end