Please run the attached SQL script on your instance of MySQL. It creates a simple database named grovodb that contains the tables needed to answer the following tasks and questions. 

1. Write a query to return the course lesson IDs and when those lessons were viewed by 'ted@grovo.com' on 3/27/2013. Order the results by when the lesson was viewed (ascending).

2. Write a query to return the total number of lessons viewed by each email domain. Sort the results by the number of lessons viewed. The results should look something like:
domain  | views
abc.org | 12
xyz.com | 150
jfk.net | 2134

3. Write a query to find all the records in the lessonviews table that have user_id values that do not exist as id values in the users table. Bonus: Provide an alternative query with a different structure that accomplishes the same goal.

4. How would you modify this database to make sure such a condition would never happen again? Please provide an answer in both plain English and in a MySql statement.

5. If you actually tried to make this modification to your database, you might have noticed that there was an error. How would you "scrub" the data, so that you could run your statement(s) from Question 4?


