<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CaseStudy
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $illustration
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy query()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereIllustration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CaseStudy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'illustration',
        'content',
    ];
}
