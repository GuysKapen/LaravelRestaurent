<?php

namespace App\Models;

use Carbon\Traits\Date;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Nullable;
use Ramsey\Uuid\Type\Time;

/**
 * @property mixed|string $name
 * @property mixed|string $email
 * @property mixed|string $phone
 * @property mixed|integer $guest
 * @property mixed|Date $date
 * @property mixed|Time $time
 * @property mixed|Nullable|string $message
 */
class Reservation extends Model
{
    use HasFactory;
}
