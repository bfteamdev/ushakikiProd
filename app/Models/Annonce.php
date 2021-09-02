<?php

namespace App\Models;

use Parsedown;
use App\Models\Type;
use App\Models\Order;
use App\Models\Photo;
use App\Models\Category;
use App\Models\Annonces_feature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annonce extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "annonces";
    protected $dates = ['expired_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->with(["groupe"]);
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id')->with("category");
    }

    /**
     * Get all of the comments for the Annonce
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class, 'annonce_id');
    }
    /**
     * Get the user associated with the Annonce
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function viewPhoto()
    {
        return $this->hasOne(Photo::class);
    }

    /**
     * Get the user that owns the Annonce
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Get the order ad with the Annonce
     *
     * @return \IlluminaOrderatabase\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->hasOne(Order::class);
    }
    /**
     * Get all of the comments for the Annonce
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function featuresAds()
    {
        return $this->hasMany(Annonces_feature::class)->with(["feature", "field"]);
    }

    public function getDescriptionAttribute($value)
    {
        $Parsedown = new Parsedown();
        $Parsedown->setSafeMode(true);
        return $Parsedown->text($value);
    }
}
