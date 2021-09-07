<?php namespace Codecycler\Team\Models;

use Model;
use System\Models\File;

/**
 * Member Model
 */
class Member extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string table associated with the model
     */
    public $table = 'codecycler_team_members';

    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [];

    /**
     * @var array rules for validation
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
    protected $jsonable = [];

    /**
     * @var array appends attributes to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array hidden attributes removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array dates attributes that should be mutated to dates
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $attachOne = [
        'avatar' => File::class,
    ];

    public function scopeSort($query)
    {
        $query->orderBy('sort_order', 'ASC');
    }

    public function scopeActive($query)
    {
        $query->where('is_published', 1);
    }

    public function getAvatarPathAttribute()
    {
        $alternative = url('/plugins/codecycler/team/assets/images/empty-avatar.png');

        $avatar = $this->avatar;

        return $avatar ? $avatar->getThumb(500, 500) : $alternative;
    }
}
