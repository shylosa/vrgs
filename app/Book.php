<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

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
     * @return Book
     */
    public static function add($fields)
    {
        $book = new static();
        $book->fill($fields);
        $book->save();

        return $book;
    }

    /**
     * Edit existing book
     *
     * @param $fields
     */
    public function edit($fields): void
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

    /**
     * Upload image
     *
     * @param $image
     */
    public function uploadImage($image)
    {
        if ($image === null) {
            return;
        }

        $this->removeImage();
        $filename = Str::random(10) . '.' . mb_strtolower($image->getClientOriginalExtension());
        $image = Image::make($image)->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $path = 'uploads';

        // Check for the existence of a directory and create it if necessary
        $this->checkDirectory($path);
        $image->save($path . '/' . $filename);
        $this->image = $filename;
        $this->save();
    }

    /**
     * Getting a image belonging to the book
     *
     * @return string
     */
    public function getImage(): string
    {
        if ($this->image === null) {
            return '/images/no-image.png';
        }

        return '/uploads/' . $this->image;
    }

    /**
     * Check for a directory
     *
     * @param $directory
     */
    public function checkDirectory($directory)
    {
        $path = public_path() . '/' . $directory;

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
    }
}
