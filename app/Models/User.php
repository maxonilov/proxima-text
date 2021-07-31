<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'image',
        'followers',
    ];

    /**
     * @param string $url
     */
    public function setImageAttribute(string $url)
    {
        $fileName = "images/" . substr($url, strrpos($url, '/') + 1);
        Storage::put($fileName, file_get_contents($url));
        $this->attributes['image'] = $fileName;
    }

    /**
     * @return string|null
     */
    public function getImageAttribute(): ?string
    {
        return empty($this->attributes['image']) ? null : asset(Storage::url($this->attributes['image']));
    }
}
