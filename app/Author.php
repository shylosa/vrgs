<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Author extends AppModel
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
     * Add entity in Storage.
     *
     * @param $fields
     * @return Author
     */
    public static function add($fields)
    {
        $author = new static();
        $author->fill($fields);
        $author->save();

        return $author;
    }

    /**
     * Edit entity in Storage.
     *
     * @param $fields
     */
    public function edit($fields): void
    {
        $this->fill($fields);
        $this->save();
    }

    /**
     * Remove entity from Storage.
     */
    public function remove(): void
    {
        try {
            $this->delete();
        } catch (\Exception $e) {
        }
    }

    /**
     * Get firstname
     *
     * @return mixed
     */
    public function getFirstame()
    {
        return $this->firstname;
    }

    /**
     * Get lastname
     *
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Get patronymic
     *
     * @return mixed
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }

    /**
     * Get author's fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->getLastname() . ' ' . $this->getFirstame() . ' ' . $this->getPatronymic();
    }
}
