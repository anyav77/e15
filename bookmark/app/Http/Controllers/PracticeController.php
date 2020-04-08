<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Str;

class PracticeController extends Controller
{
    # Start Week 9 Assignment
    public function practice18()
    {
        # Find any books by the author “J.K. Rowling” and update the author name to be “JK Rowling”
 
        # First get a book to update
        $books = Book::where('author', 'LIKE', '%Rowling%')->get();
        //dump($books->toArray());
        if (!$books) {
                dump("Book not found, can not update.");
        } else {
            foreach($books as $book){
                # Delete the books
                $book->delete();
                dump('Deletion complete; check the database to see if it worked...');
            }
        }
    }
    public function practice17()
    {
        # Find any books by the author “J.K. Rowling” and update the author name to be “JK Rowling”
 
        # First get a book to update
        $books = Book::where('author', '=', 'J.K. Rowling')->get();
        dump($books->toArray());
        if (!$books) {
                dump("Book not found, can not update.");
        } else {
            foreach($books as $book){
                # Change some properties
                $book->author = 'JK Rowling';
                # Save the changes
                $book->save();
            }
            dump('Update complete; check the database to confirm the update worked.');
        }
    }
    public function practice16()
    {
        # Retrieve all the books in descending order according to published year.
        $results = Book::orderByDesc('published_year')->get();
        dump($results->toArray()); # Study the results
    }
    public function practice15()
    {
        # Retrieve all the books in alphabetical order by title.
        $results = Book::orderBy('title')->get();
        dump($results->toArray()); # Study the results
    }
    public function practice14()
    {
        # Retrieve all the books published after 1950.
        $results = Book::where('published_year', '>', 1950)->get();
        dump($results->toArray()); # Study the results
    }
    public function practice13()
    {
        # Retrieve the last 2 books that were added to the books table.
        # Method 1
        $results = Book::orderByDesc('created_at')->limit(2)->get();
        dump($results->toArray()); # Study the results
        # Method 2
        $results2 = Book::latest()->limit(2)->get();
        dump($results2->toArray()); # Study the results
    }
    # End Week 9 Assignment
    public function practice12()
    {
        # Get all the books
        # There is no design method
        # `all` is the execution method
        $results = Book::all();
        dump($results->toArray()); # Study the results
    }
    public function practice11()
    {
        # Get only books that were published after 1950 *and* authored by F. Scott Fitzgerald
        # `where` is the design method, and it's used twice
        # `get` is the execution method
        $results = Book::where('published_year', '>', 1950)->where('author', '=', 'F. Scott Fitzgerald')->get();
        dump($results->toArray()); # Study the results
    }
    public function practice10()
    {
        # Get the *first* book in the table that was authored by F. Scott Fitzgerald
        # `where` & `orderBy` are the design methods
        # `first` is the execution method
        $results = Book::where('author', '=', 'F. Scott Fitzgerald')->orderBy('created_at')->first();
        dump($results->toArray()); # Study the results
    }
    public function practice9()
    {
        # Get only books that were authored by F. Scott Fitzgerald
        # `where` is the design method
        # `get` is the execution method
        $results = Book::where('author', '=', 'F. Scott Fitzgerald')->get();
        dump($results);
        dump($results->toArray()); # Study the results
    }
    public function practice8()
    {
        # First get a book to update
        # Get only books published after 1950
        #   `where` is the design method
        #   `get` is the execution method
        $results = Book::where('published_year', '>', 1950)->get();
        dump($results);
        dump($results->toArray()); # Study the results
    }
    /**
     * Demonstrates deleting data
     */
    public function practice7()
    {
        # First get a book to delete
        $book = Book::where('author', '=', 'F. Scott Fitzgerald')->first();

        if (!$book) {
            dump('Did not delete- Book not found.');
        } else {
            $book->delete();
            dump('Deletion complete; check the database to see if it worked...');
        }
    }
    
    /**
     * Demonstrates updating data
     */
    public function practice6()
    {
        # First get a book to update
        $book = Book::where('author', '=', 'F. Scott Fitzgerald')->first();

        if (!$book) {
            dump("Book not found, can not update.");
        } else {
            # Change some properties
            $book->title = 'The Really Great Gatsby';
            $book->published_year = '2025';

            # Save the changes
            $book->save();

            dump('Update complete; check the database to confirm the update worked.');
        }
    }

    /**
     * Demonstrates the `first` method
     */
    public function practice5()
    {
        $book = Book::where('slug', '=', 'the-martian')->first();

        dump($book);
        dump($book->toArray());
    }

    /**
     * Demonstate reading data
     */
    public function practice4()
    {
        //$book = new Book();
        //$books = Book::where('title', 'LIKE', '%Harry Potter%')->get();
        $books = Book::where('title', 'LIKE', '%Harry Potter%')->orWhere('published_year', '>=', 1998)->get();

        if ($books->isEmpty()) {
            dump('No matches found');
        } else {
            dump($books->toArray());

            foreach ($books as $book) {
                dump($book->title);
            }
        }
    }

    /**
     * Demonstrates creating data
     */
    public function practice3()
    {
        # Instantiate a new Book Model object
        $book = new Book();

        # Set the properties
        # Note how each property corresponds to a column in the table
        $book->title = 'The Martian';
        $book->slug = 'the-martian';
        $book->author = 'Anthony Weir';
        $book->published_year = 2011;
        $book->cover_url = 'https://hes-bookmark.s3.amazonaws.com/the-martian.jpg';
        $book->info_url = 'https://en.wikipedia.org/wiki/The_Martian_(Weir_novel)';
        $book->purchase_url = 'https://www.barnesandnoble.com/w/the-martian-andy-weir/1114993828';
        $book->description = 'The Martian is a 2011 science fiction novel written by Andy Weir. It was his debut novel under his own name. It was originally self-published in 2011; Crown Publishing purchased the rights and re-released it in 2014. The story follows an American astronaut, Mark Watney, as he becomes stranded alone on Mars in the year 2035 and must improvise in order to survive.';

        # Invoke the Eloquent `save` method to generate a new row in the
        # `books` table, with the above data
        $book->save();

        dump('Added: ' . $book->title);
    }

    /**
     * Demonstrates using the Book model
     */
    public function practice2()
    {
        //dump(Str::plural('mouse'));

        dump(Book::find(3));
        dump(Book::all()->toArray());
    }

    /**
     * First practice example
     */
    public function practice1()
    {
        dump('This is the first example.');
    }

    /**
     * ANY (GET/POST/PUT/DELETE)
     * /practice/{n?}
     * This method accepts all requests to /practice/ and
     * invokes the appropriate method.
     * http://bookmark.loc/practice => Shows a listing of all practice routes
     * http://bookmark.loc/practice/1 => Invokes practice1
     * http://bookmark.loc/practice/5 => Invokes practice5
     * http://bookmark.loc/practice/999 => 404 not found
     */
    public function index($n = null)
    {
        $methods = [];

        # Load the requested `practiceN` method
        if (!is_null($n)) {
            $method = 'practice' . $n; # practice1

            # Invoke the requested method if it exists; if not, throw a 404 error
            return (method_exists($this, $method)) ? $this->$method() : abort(404);
        } # If no `n` is specified, show index of all available methods
        else {
            # Build an array of all methods in this class that start with `practice`
            foreach (get_class_methods($this) as $method) {
                if (strstr($method, 'practice')) {
                    $methods[] = $method;
                }
            }

            # Load the view and pass it the array of methods
            return view('practice')->with(['methods' => $methods]);
        }
    }
}