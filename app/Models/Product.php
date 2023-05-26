<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;

/**
 * @mixin Builder
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Price[] $prices
 */
class Product extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'name',
        'description',
    ];

    public $sortable = [
        'name',
        'description',
    ];

    /**
     * @return HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(related: Price::class);
    }
}
