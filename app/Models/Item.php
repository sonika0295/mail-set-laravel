<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function CategoryName()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public static function getItemBySlug($slug)
    {
        return Item::whereStatus('1')->whereSlug($slug)->first();
    }


    public static function getLatestRecord()
    {
        $query = Item::whereStatus('1')->orderBy('id', 'desc');

        return $query->limit(8)->get();
    }
}
