<h3>Setup</h3><br>
<h4>Stack : Php Laravel </h4>
1. Install Php either through LAMP or XAMPP<br>
2.  Install composer for Php dependencies<br>
3.  Clone the project to your local environment after completing the steps above, on your Linux or Windows terminal, in the project's root directory, run "composer install"<br>
4  Run "php artisan serve" in the project root directory from your terminal. This will give a localhost server address <br>
5. Run the test endpoint on POSTMAN or POSTCODE <br><br>
The backend API uses Luhn's algorithm to validate PAN for credit/debit cards. <i>http://base_url/card/validate-credit-card</i> is the endpoint
The "pan" parameter takes in a numeric data type for the PAN. "cvv" parameter takes 3 or 4 digits, and "expiry_date" takes a DateTime. 
