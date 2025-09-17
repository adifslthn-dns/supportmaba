<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'image',
        'establishment_year',
        'members_count',
        'supervisor',
        'contact_person',
        'contact_email',
        'contact_phone',
        'instagram',
        'website',
        'activities',
        'facilities',
    ];

    /**
     * Get the category that owns the UKM.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}