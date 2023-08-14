<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'length',
        'url',
        'slug',
        'description',
        'thumbnail',
        'category_id',
        'user_id'
    ];
    protected $with = ['user','category'];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getLengthInHumanAttribute()
    {
        return gmdate("i:s", $this->length);
    }

    public function getCreatedAtAttribute($value)
    {
        return (new Verta($value))->formatDifference();
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function relatedVideos(int $count = 6)
    {

        return $this->category->videos->take($count)->load('category');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getOwnerNameAttribute()
    {
        return $this->user?->name;
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
