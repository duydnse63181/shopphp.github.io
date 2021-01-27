<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Product_categoris extends Model implements Searchable
{
    use HasFactory;
    protected $table = 'product_categoris';
    protected $guarded = [];

    public function products(){
        return $this->hasMany('App\Gift');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('categories.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
