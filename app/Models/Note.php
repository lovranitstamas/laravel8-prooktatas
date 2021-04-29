<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function hasTag($tagId)
    {
        //return true;
        return in_array($tagId, $this->tags()->pluck('id')->toArray());
        //return $this->tags()->where('id', $tagId)->count() > 0 ? true : false;
        //return $this->tags()->find($tagId);
    }
}
