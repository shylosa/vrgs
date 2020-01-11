<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Book extends AppModel
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'published_at'
    ];

    /**
     * Book-authors Database Dependencies
     *
     * @return BelongsToMany
     */
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(
            Author::class,
            'books_authors',
            'book_id',
            'author_id'
        );
    }

    /**
     * Add book
     *
     * @param $fields
     */
    public function addBook($fields): void
    {
        $book = new static();
        $book->fill($fields);
        $book->save();
    }

    /**
     * Edit existing book
     *
     * @param $fields
     */
    public function editBook($fields): void
    {
        $this->fill($fields);
        $this->save();
    }

    /**
     * Set authors for current book
     *
     * @param array $authors
     */
    public function setAuthors(array $authors): void
    {
        if ($authors === null) {
            return;
        }
        foreach ($authors as $key => $author) {
            if ($author) {
                Author::updateOrCreate(['author' => $author]);
            }
        }
    }

    /**
     * Get authors
     *
     * @return string
     */
    public function getAuthors()
    {
        return (!$this->authors->isEmpty())
            ?   implode(', ', $this->authors->pluck('author')->all())
            : 'Authors does not exist!';
    }

    /**
     * Remove existing book
     */
    public function remove(): void
    {
        $this->removeImage();
        try {
            $this->delete();
        } catch (\Exception $e) {
        }
    }

    /**
     * Remove image from uploads directory
     */
    public function removeImage()
    {
        if ($this->image !== null) {
            Storage::delete('uploads/' . $this->image);
        }
    }
}
