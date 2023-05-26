<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kyslik\ColumnSortable\Sortable;

/**
 * @mixin Builder
 * @property int $id
 * @property int $product_id
 * @property float $net
 * @property float $gross
 * @property float $vat
 * @property int $vat_percentage
 * @property Product $product
 */
class Price extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'product_id',
        'net',
        'gross',
        'vat',
        'vat_percentage',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(related: Product::class);
    }

    public function net(): Attribute
    {
        return Attribute::make(
            get: fn (float $value) => number_format($value, 2, '.', ''),
        );
    }

    public function gross(): Attribute
    {
        return Attribute::make(
            get: fn (float $value) => number_format($value, 2, '.', ''),
        );
    }

    public function vat(): Attribute
    {
        return Attribute::make(
            get: fn (float $value) => number_format($value, 2, '.', ''),
        );
    }
}
