<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\File
 *
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @mixin \Eloquent
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $url
 * @property string $name
 * @property string $ext
 * @property int $size
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUrl($value)
 */
class File extends Model
{
    protected $fillable = [
        'url',
        'name',
        'ext',
        'size',
    ];
}
