<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements Searchable
{
    use HasFactory;
    protected $table = 'product';
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('products.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
