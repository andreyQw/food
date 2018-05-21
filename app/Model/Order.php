<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 16:52
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Model
 *
 * @property string $number
 * @property string $creation_date
 * @property string $delivery_date
 * @property string $description
 * @property Profile $profile
 * @property integer $user_id
 * @property integer $order_status_id
 * @property integer $payment_method_id
 * @property PaymentMethod $paymentMethod
 * @property Restaurant $restaurant
 * @property Comment $comment
 */
class Order extends Model
{
    protected $table = 'order';
    public $timestamps = false;
    protected $fillable = ['description', 'payment_method_id'];

    public function orderStatus()
    {
        return $this->belongsTo('App\Model\OrderStatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo('App\Model\Profile');
    }

    public function foods()
    {
        return $this->belongsToMany('App\Model\Food', 'order_has_food')->withPivot('actual_price', 'quantity');
    }

    public function getTotal()
    {
        $totalPrice = 0;
        $foods = $this->foods;
        foreach ($foods as $food) {
            $foodPrice = (double)$food->pivot->actual_price;
            $quantity = (int)$food->pivot->quantity;
            $totalPrice += (int)$quantity * $foodPrice;
        }

        return $totalPrice;
    }

    public function getSummaryOrderData()
    {
        $summaryData = [
            'totalCount' => 0,
            'totalCost' => 0,
        ];

        $foodList = $this->foods;

        foreach ($foodList as $food) {
            $foodPrice = (double)$food->pivot->actual_price;
            $quantity = (int)$food->pivot->quantity;
            $summaryData['totalCost'] += (int)$quantity * $foodPrice;
            $summaryData['totalCount'] += $quantity;
        }

        return $summaryData;
    }

    public function userAddress()
    {
        return $this->belongsTo('App\Model\UserAddress');
    }

    public function save(array $options = [])
    {
//        date_default_timezone_set('Europe/Kiev');
        $date = new \DateTime();

        $formattedDate = $date->format('Y-m-d H:i:s');
        $this->creation_date = $formattedDate;
        $this->delivery_date = $formattedDate;

        return parent::save($options);
    }

    public function paymentMethod()
    {
        return $this->belongsTo('App\Model\PaymentMethod');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}