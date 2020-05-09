<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\User;

class ListController extends Controller
{
    /**
* GET /list
*/
    public function show(Request $request)
    {
        # Note how in sortByDesc we specify `pivot.created_at` to get the created_at value for the *relationship*, not the book itself
        $books = $request->user()->books->sortByDesc('pivot.created_at');
        
        return view('lists.show')->with([
        'books' => $books
    ]);
    }
    // Add book to your list
    public function add($slug)
    {
        $book = Book::findBySlug($slug);
        # TODO: Handle case where book isn't found for the given slug
        return view('lists.add')->with(['book' => $book]);
    }

    public function save(Request $request, $slug)
    {
        # TODO: Validate incoming data, making sure they entered a note - if I want to make note required

        $book = Book::findBySlug($slug);

        # Add book to user's list
        # (i.e. create a new row in the book_user table)
        $request->user()->books()->save($book, ['notes' => $request->notes]);

        return redirect('/list')->with([
        'flash-alert' => 'The book ' .$book->title. ' was added to your list.'
    ]);
    }
    # Delete the book from the list
    
    /**
     * GET /list/{$slug}/confirm
     */
    public function delete(Request $request, $slug)
    {
        $book = Book::where('slug', '=', $slug)->first();
        //return view('lists.delete');
        return view('lists.delete')->with([
            'book' => $book
        ]);
    }
    public function destroy(Request $request, $slug)
    {
        # As an example, grab a user we know has books on their list
        $user = $request->user();
        # Grab the first book on their list
        # specify which book I'm getting by slug
        $book = $user->books()->first();
        //$book = $user->books()->pivot->notes;
        dump($book);

        
        // dump($book->pivot); // returns error: Trying to get property 'pivot' of non-object?
        // $book2 = Book::where('slug', '=', $slug)->first(); //gets the same book but the delete deosn't work
        // dump($book2->pivot); // returns error
        //dump($book2);
        //$book = Book::findBySlug($slug);
        # Delete the relationship
        //$book->pivot->delete();
        
        // $book2->pivot->delete();
        //dump($book->toArray());

        return 'Delete complete';
        // return redirect('/list')->with([
        //     'flash-alert' => 'The book ' .$book->title. ' was deleted from your list.'
        // ]);
    }
    # Update the note example
    public function update(Request $request, $slug)
    {
        $book = Book::findBySlug($slug);
        //$book = Book::where('slug', '=', $slug)->first();
        # get the user
        $user = $request->user();

        # get the note from the form
        $request->validate([
            'note' => 'min:1'
        ]);
        $note = "New note...";
        //$note = $request->note;
        dump($request->user()->books);
        dump($book->id);
        
    
        # Grab the first book on their list
        $book = $user->books()->findBySlug($slug);
        //$book = $user->books()->first();
        
        # Update and save the notes for this relationship
        $book->pivot->notes = $note;
        $book->pivot->save();
        dump($book->toArray());
    
        return 'Update complete';
        // return redirect('/list')->with([
        //     'flash-alert' => 'The note for ' .$book->title. ' was updated.'
        // ]);
    }
}
