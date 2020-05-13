# Project 3
+ By: Anya Zinoveva
+ Production URL: <http://e15p3.atozez.com>

## Feature summary
+ Visitors can register/log in (free registration, membership)
+ Registered Users can publish articles and edit articles
+ Each user has their own account page
+ User and visitors can search the database by the artcle title
+ The home page features
  + a stream of recently added artcles
+ The wiki page features
  + a stream of recently added artcles
  + articles published by the logged in user
  + a stream of all articles


### Master Template
There are two master templates in layouts directory:
master.blade.php is used for most pages
app.blade.php is used for the user dashboard, as it doesn't need a big logo

  
## Database summary
+ My application has 3 tables in total (`users`, `article`, `article_user`)
+ There's a many-to-many relationship between `users` and `articles`


## Outside resources
<https://laravel.com/docs/7.x/database-testing#writing-factories>
<https://github.com/fzaninotto/Faker#fakerprovideren_usperson>

## Notes for instructor
 In the future, I'm planning to add features that will allow users to collaborate on the articles, so I chose many to many relationship model for users and articles.

 Jill user has 1 published article

