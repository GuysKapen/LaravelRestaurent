<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Nullable;

/**
 * @property mixed|string $image
 * @property mixed|float $price
 * @property mixed|string $name
 * @property mixed|Nullable|string description
 */
class Food extends Model
{
    use HasFactory;
}
