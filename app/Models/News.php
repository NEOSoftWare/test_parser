<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property string $short_desc
 * @property string $desc
 * @property \Illuminate\Support\Carbon $date
 * @property int $category_id
 * @property int|null $file_id
 * @property string $unique_recurse
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\File|null $file
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereShortDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUniqueRecurse($value)
 */
class News extends Model
{
    protected $dates = [
        'date'
    ];

    protected $fillable = [
        'title',
        'short_desc',
        'desc',
        'date',
        'category_id',
        'file_id',
        'unique_recurse',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
