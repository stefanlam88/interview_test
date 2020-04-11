Question 1
- This assignment is written using React.JS & PHP laravel project.
- Backend project is playingcard-web-service
- Frontend project is frontend-react-app
- Frontend API url located frontend-react-app/src/App.js (Hardcoded for demo purpose)
- http://playingcard-web-service.localhost.com change to your local domain 
- setup yarn dependencies by running
  yarn
- In order to run frontend-react-app, Go to the project and type
  yarn start
- Default would be localhost:3000
- Apache / Nginx webserver need to point to playingcard-web-service/public folder
- This program will randomly assigned based on number of person input. If more than 52, on first come first serve basic. Remaining person will not get card.
- non positive or non number PC will be displaying invalid value message.
- In normal circumstance, the cards shall distributed equally to the players/person.
- Screenshot folders to display the UI.
- The time taken to develop this would be 3 hours.

Question 2
- Suggestion to improve steps/performance
1. Create a new table to store popular keywords or search keyword history purpose. Then store main index key id such as job id, or related job category id.
Everytime search will get result from a table instead of so many left joins table.

2. Use PHP memcached or redis to cache the search result. So next time query same keyword can get the result instantly. Cache result might need to be refreshed or updated every 1 hour or 30min, depends the requirement.

3. Use top rank method. Each search result we can store the count in the same table. Search result with most search indicate as top rank with count. When query, may sorted by top with most frequent search. This does help to fast retrieval of search result into the user.

4. Add Index to the search column. This will help mysql to have better indexing during searching of data.

5. Split big chunk of query into small queries and run it. Sometimes the process of small queries will help to process faster.

6. Add Full Text Search on related column that need to be searched. This will only scan the required rows rather than all rows in  a table.

7. Time taken for this one hour.
