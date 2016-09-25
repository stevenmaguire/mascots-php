<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Mascot extends Model
{
    use Searchable;

    /**
     * Scope a query to only include popular mascots.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePopularity($query, $popularity = 6)
    {
        return $query->where('popularity', '=', $popularity);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return App::environment() . '.' . (new self)->getTable();
    }
}
