<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Nullable;

/**
 * @property mixed|string $name
 * @property mixed|string $speciality
 * @property mixed|Nullable|string $image
 * @property mixed|Nullable|string $description
 */
class Chef extends Model
{
    use HasFactory;
}
