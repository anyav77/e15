# Project 3
+ By: Anya Zinoveva
+ Production URL: <http://e15p3.atozez.com>

## Feature summary
+ Visitors can register/log in (free registration, membership)
+ Registered Users can contribute/author wiki articles
+ Registered Users can sell the articles and get a percentage of sale
+ Articles are brocken down by free introduction or synopsis (for unregistered users), full article (for logged in users/members), expanded article or book (paid)
+ Registered Users can post questions to the forum, subscribe to posts, edit posts, respond to other members 




*Outline a summary of features that your application has. The following details are from a hypothetical project called "Movie Tracker". Note that it is similar to Bookmark, yet it has its own unique features. Delete this example and replace with your own feature summary*

+ Users can add/update/delete movies in their collection (title, release date, director, writer, summary, category)
+ There's a file uploader that's used to upload poster images for each movie
+ User's can toggle whether movies in their collection are public or private
+ Each user has a public profile page which presents a short bio about their movie tastes, as well as a list of public movies in their collection
+ Each user has their own account page where they can edit their bio, email, password
+ Users can clone movies from another user's public collection into their collection
+ The home page features
  + a stream of recently added public movies
  + a list of categories, with a link to each category that shows a page of movies (with links) within that category

### Master Template

  
## Database summary
*Describe the tables and relationships used in your database. Delete the examples below and replace with your own info.*

+ My application has 3 tables in total (`users`, `movies`, `categories`)
+ There's a many-to-many relationship between `movies` and `categories`
+ There's a one-to-many relationship between `movies` and `users`

## Outside resources
*Your list of outside resources go here*

## Notes for instructor
*Any notes for me to refer to while grading; if none, omit this section*
