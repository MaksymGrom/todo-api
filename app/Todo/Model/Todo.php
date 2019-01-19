<?php

namespace App\Todo\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $text
 * @property boolean $completed
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Todo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'completed'
    ];

    public function getPerPage()
    {
        return config('api.paginate.per_page');
    }

    /**
     * @inheritdoc
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->getTimestamp();
    }

}
