<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * App\Models\Blog
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $title
 * @property string $illustration
 * @property string $content
 * @property string $html
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $email_share_url
 * @property-read string $facebook_share_url
 * @property-read string $preview
 * @property-read int $reading_time
 * @property-read string $twitter_share_url
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereIllustration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUserId($value)
 * @mixin \Eloquent
 */
class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'illustration',
        'content',
        'html',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function isPublished(): bool
    {
        return $this->published_at !== null;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getPreviewAttribute(): string
    {
        // find first <p> element content in html
        $html = $this->html;
        $preview = strip_tags(preg_replace("/^.*<p>(.*?)<\/p>.*$/U", '$1', $html));

        return $preview;
    }

    public function getReadingTimeAttribute(): int
    {
        $words = str_word_count(strip_tags($this->html));
        $minutes = round($words / 200);

        return $minutes ?: 1;
    }

    public function getTwitterShareUrlAttribute(): string
    {
        $url = urlencode(route('blog.show', ['blog' => $this, 'slug' => Str::slug($this->title)]));
        $title = urlencode($this->title);

        return "https://twitter.com/intent/tweet?text=$title&url=$url";
    }

    public function getFacebookShareUrlAttribute(): string
    {
        $url = urlencode(route('blog.show', ['blog' => $this, 'slug' => Str::slug($this->title)]));
        $title = urlencode($this->title);

        return "https://www.facebook.com/sharer/sharer.php?u=$url&quote=$title";
    }

    public function getEmailShareUrlAttribute(): string
    {
        $url = urlencode(route('blog.show', ['blog' => $this, 'slug' => Str::slug($this->title)]));
        $title = urlencode($this->title);

        return "mailto:?subject=$title&body=$url";
    }
}
