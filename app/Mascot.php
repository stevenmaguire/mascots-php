<?php

namespace App;

use Carbon\Carbon;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Mascot extends Model
{
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'domain', 'image_url', 'description',
        'suggested_at', 'suggested_by_ip'
    ];

    /**
     * Approves instance if unapproved.
     *
     * @return \App\Mascot
     */
    public function approve()
    {
        if (is_null($this->approved_at)) {
            $this->approved_at = Carbon::now();
        }

        return $this;
    }

    /**
     * Boot function for using with Mascot Events
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!isset($model->popularity)) {
                $model->popularity = 5;
            }
        });
    }

    /**
     * Scope a query to only include approved mascots.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeApproved($query)
    {
        return $query->whereNotNull('approved_at');
    }

    /**
     * Scope a query to only include non-approved mascots.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnapproved($query)
    {
        return $query->whereNull('approved_at');
    }

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

    /**
     * Creates a new query builder for third-party search using given
     * filter options.
     *
     * @param  array   $options
     *
     * @return \Laravel\Scout\Builder
     */
    public static function searchWith($options = array())
    {
        $filters = collect($options);

        $builder = static::search($filters->get('keyword'));

        array_map(function ($option) use (&$builder, $filters) {
            $value = $filters->get($option);
            if ($value) {
                $builder->where($option, (integer) $value);
            }
        }, ['popularity']);

        return $builder;
    }

    /**
     * Cleans incoming domain based on business requirements.
     *
     * @param string $domain
     *
     * @return  void
     */
    public function setDomainAttribute($domain)
    {
        $this->attributes['domain'] = strtolower(preg_replace("/[^A-Za-z]/", '.', $domain));
    }
}
