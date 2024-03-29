## Laravel Task Assessment

### Objective: create a user registration form to generate random voucher codes.

## Tasks:

1. Build a user registration form contains username (unique), first name, password, email address(unique)
2. After user is successfully registered, a welcome email will be sent to user which contains a unique voucher code generated by the system.
3. When user logins into the system, he can generate more unique voucher codes, he also can view and delete his own voucher codes.
4. When user has more than 5 codes, code list needs have pagination.
5. When user has more than 10 codes, no more codes can be generated, an error will be displayed to the user when he tries to generate more codes.
6. Create an admin panel to
   a. view all users with number of codes
   b. create a function to export all codes with user id in csv or excel format
   c. generate a line or bar chart to display number of codes generated by minutes.
   i. X-axis: minutes (For demo purpose, normally this will be by days)
   ii. Y-axis: number of codes generated

## Requirements:

1. Setup a repository which contains master, dev and feature branches.
2. Create database tables use Laravel migrations.
3. Must use testing using phpunit
4. Must adhere to SOLID or DRY principle.
5. Implement basic frontend error handling.
6. Implement basic Laravel access control.
7. You can use any email engine.
8. Please use VUE.js, CSS.
