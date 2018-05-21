<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 13:34
 */

namespace App\Model;


use App\Model\Helper\CyrToLatConverter;
use App\Model\Helper\ImageSaver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Category
 * @package App\Model
 *
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $alias
 * @property Restaurant $restaurant
 * @property integer $restaurant_id
 * @property array $foods
 *
 */
class Category extends Model
{
    use ImageSaver, CyrToLatConverter;

    protected $table = 'category';
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'description','image', 'alias', 'restaurant_id'];


    public function restaurant()
    {
        return $this->belongsTo('App\Model\Restaurant');
    }

    public function foods()
    {
        return $this->hasMany('App\Model\Food');
    }

    public function specials()
    {
        return $this->belongsToMany('App\Model\Special', 'special_has_category');
    }

    public function associations()
    {
        return $this->belongsToMany('App\Model\Association', 'category_has_association');
    }

    public function save(array $options = [])
    {
        $newImageName = Auth::user()->id . '_' . time();
        $imagePath = config('custom.imageDirectories.category') . $this->alias . '/';

        if ($isFileUploaded = $this->uploadImage != null) {
            $originalExtension = $this->uploadImage->getClientOriginalExtension();
            if ($originalExtension == 'jpeg') {
                $originalExtension = 'jpg';
            }
            $this->image = str_replace('/public', '', $imagePath . $newImageName . '.' . $originalExtension);
        }

        if ($saved = parent::save($options)) {
            if ($isFileUploaded) {
                $this->saveImage($this->uploadImage->getRealPath(),
                    $newImageName,
                    $imagePath,
                    config('custom.imageSize.category')
                );
            }
        }

        return $saved;
    }

    public function getRouteKeyName()
    {
        return 'alias';
    }

    public function setAlias($cyrilicAlias)
    {
        return $this->alias = $this->convertCyrToLat($cyrilicAlias);
    }
}