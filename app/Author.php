<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'patronymic'
    ];

    /**
     * Author-book Database Dependencies
     *
     * @return BelongsToMany
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(
            Book::class,
            'books_authors',
            'author_id',
            'book_id'
        );
    }

    /**
     * Add author
     *
     * @param $fields
     */
    public function addAuthor($fields): void
    {
        $author = new static();
        $author->fill($fields);
        $author->save();
    }

    /**
     * Edit existing author
     *
     * @param $fields
     */
    public function editAuthor($fields): void
    {
        $this->fill($fields);
        $this->save();
    }
}
