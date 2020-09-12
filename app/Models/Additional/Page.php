<?php

namespace App\Models\Additional;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Talanoff\ImpressionAdmin\Traits\Translatable;

class Page extends Model implements HasMedia
{
	use Translatable, HasMediaTrait;

    /**
     * Defining default route key
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

	protected $fillable = [
		'slug',
		'props',
	];
}
