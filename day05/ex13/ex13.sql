SELECT
 ROUND(AVG(nb_seats)) AS 'Average'
FROM
  (
    SELECT
      id_cinema,
      SUM(nb_seats) as nb_seats
    FROM
      cinema
    GROUP BY
      id_cinema
  ) formatted_table;
