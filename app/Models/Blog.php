<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    
    protected $table = "blogs";

    const ID = "id";
    const IMAGE = "image";
    const TITLE = "title";
    const CONTENT = "content";
    const SHORT_CONTENT = "short_content";
    const META_KEYWORD = "meta_keyword";
    const META_TITLE = "meta_title";
    const META_DESCRIPTION = "meta_description";
    const FACEBOOK_LINK = "facebook_link";
    const TWITTER_LINK = "twitter_link";
    const INSTAGRAM_LINK = "instagram_link";
    const YOUTUBE_LINK = "youtube_link";
    // const HEADING_BOTTOM = "heading_bottom";
    const SLIDE_STATUS = "slide_status";
    const SLIDE_SORTING = "slide_sorting";
    const STATUS = "status";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    const SLIDE_STATUS_LIVE = "live";
    const SLIDE_STATUS_DISABLED = "disabled";

    #"live","disabled"

    protected static function boot() {
        parent::boot();
        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->title, '-');
        });
    }
}
