<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecreationalActivitiesModel extends Model
{
    use HasFactory;

    protected $table = "recreational_activities";

    const ID = "id";
    const IMAGE = "image";
    const IMAGE2 = "image2";
    const IMAGE3 = "image3";
    const HEADING_TOP = "heading_top";
    const HEADING_MIDDLE = "heading_middle";
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
}
