<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 14.04.2017
 * Time: 14:39
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;


/**
 * Class FastOrder
 * @package App\Model
 *
 * @property string $number
 * @property string $customer_name
 * @property string $phone
 * @property string $region
 * @property string $city
 * @property string $street
 * @property string $house
 * @property string $flat
 * @property string $description
 * @property string $creation_date
 * @property string $delivery_date
 * @property integer $payment_method_id
 * @property integer $order_status_id
 * @property PaymentMethod $paymentMethod
 * @property OrderStatus $orderStatus
 */
class FastOrder extends Model
{
    protected $table = 'fast_order';
    public $timestamps = false;
    protected $fillable = ["customer_name", "phone", "city", "street", "house", "flat", "description", "payment_method_id"];

    public function orderStatus()
    {
        return $this->belongsTo('App\Model\OrderStatus');
    }

    public function paymentMethod()
    {
        return $this->belongsTo('App\Model\PaymentMethod');
    }

    public function foods()
    {
        return $this->belongsToMany('App\Model\Food', 'fast_order_has_food')->withPivot('actual_price', 'quantity');
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

    public function save(array $options = [])
    {
//        date_default_timezone_set('Europe/Kiev');
        $date = new \DateTime();

        $formattedDate = $date->format('Y-m-d H:i:s');
        $this->creation_date = $formattedDate;
        $this->delivery_date = $formattedDate;

        return parent::save($options);
    }


}