Please run the attached SQL script on your instance of MySQL. It creates a simple database named grovodb that contains the tables needed to answer the following tasks and questions. 

1. Write a query to return the course lesson IDs and when those lessons were viewed by 'ted@grovo.com' on 3/27/2013. Order the results by when the lesson was viewed (ascending).
  SELECT
    lv.courselesson_id,
    lv.view_timestamp
  FROM
    lessonviews as lv
    INNER JOIN users AS u ON lv.user_id = u.id
  WHERE
    u.email = 'ted@grovo.com'
    AND
    DATE(lv.view_timestamp) = '2013-3-27'
  ORDER BY
    lv.view_timestamp ASC
  ;

2. Write a query to return the total number of lessons viewed by each email domain. Sort the results by the number of lessons viewed. The results should look something like:
domain  | views
abc.org | 12
xyz.com | 150
jfk.net | 2134
  SELECT
    SUBSTR(u.email, LOCATE('@', u.email) + 1) as domain,
    COUNT(*) as views
  FROM
    lessonviews as lv
    INNER JOIN users AS u ON lv.user_id = u.id
  GROUP BY
    domain
  ORDER BY
    views ASC
  ;

3. Write a query to find all the records in the lessonviews table that have user_id values that do not exist as id values in the users table. Bonus: Provide an alternative query with a different structure that accomplishes the same goal.
  SELECT
    lv.id,
    lv.courselesson_id,
    lv.user_id,
    lv.view_timestamp
  FROM
    lessonviews as lv
    LEFT JOIN users AS u ON lv.user_id = u.id
  WHERE
    u.id IS NULL
  ;

  SELECT
    lv.id,
    lv.courselesson_id,
    lv.user_id,
    lv.view_timestamp
  FROM
    lessonviews AS lv
  WHERE
    NOT EXISTS (
      SELECT 1 FROM users WHERE id = lv.user_id
    )
  ;


4. How would you modify this database to make sure such a condition would never happen again? Please provide an answer in both plain English and in a MySql statement.
  FK constraint specifying that either:
    - DELETEs of users records must cascade to associated lessonviews rows
      CONSTRAINT fk_lessonviews_users FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
    - Prevent DELETE of users records that still have associated lessonviews rows
      CONSTRAINT fk_lessonviews_users FOREIGN KEY (user_id) REFERENCES users (id)

5. If you actually tried to make this modification to your database, you might have noticed that there was an error. How would you "scrub" the data, so that you could run your statement(s) from Question 4?
  If retention of the data is desired:
    - move the orphaned rows to a new table
    - create an orphaned user row and update the orphaned rows to reference the orphan account
  If data can be wiped:
    DELETE
    FROM
      lessonviews
    WHERE
      NOT EXISTS (
        SELECT 1 FROM users WHERE id = lessonviews.user_id
      )
    ;
