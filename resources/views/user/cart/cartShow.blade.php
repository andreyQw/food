@extends('layout')

@section('content')
    <div class="container profile-page">

        <div id="contentBox">
            <div class="cart-layout ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="restoran-cart" >
                            <h2 class="restoran-cart_title">
                                <a class="nameCart" href="#">Еда-Еда</a>
                                <button class="restoran-cart_delete btn--delete" id="zz-btn_cart_clear">
                                    Удалить
                                </button>
                            </h2>
                            @foreach($cartFoodList as $item)
                                <div class="product-cart  zz-cart_item" id="{{ $item['food']->id }}">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-5">
                                            <div class="product-cart_image">
                                                <img src="{{ asset($item['food']->image) }}" height="50" width="50" alt="{{ $item['food']->name }}">
                                                <div class="product-cart_tooltip">
                                                    <img src="{{ asset($item['food']->image) }}" height="200" width="200" alt="{{ $item['food']->name }}">
                                                    <p>{{ $item['food']->description }}</p>
                                                </div>
                                            </div>
                                            <p class="product-cart_title">{{ $item['food']->name }}</p>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <div class="product-cart_top js-cart-calc">
                                                <button class="product-cart_calc btn--minus zz-btn_minus_product" data-food_id="{{ $item['food']->id }}">-</button>
                                                <input type="text" class="product-cart_calc-result" disabled="" value="{{ $item['quantity']}}">
                                                <button class="product-cart_calc btn--plus zz-btn_plus_product" data-food_id="{{ $item['food']->id }}">+</button>
                                            </div>
                                            </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6 priseProduct--mod">
                                            <div class="product-cart_top text-left">
                                                <p class="product-cart_price">{{ $item['food']->price }} Р</p>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                            <button class="product-cart_delete btn--delete btn--Product zz-removeAllByProduct" data-food_id="{{ $item['food']->id }}">
                                                Удалить
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{--<div class="product-cart row" id="item2724579">
                                <div class="col s-6">
                                    <div class="product-cart_image">
                                        <img src="/db/menu/264/954/dsn86_pitstsa-218.7924.54gub.jpg" height="50" width="50" alt="Пицца мясное ассорти">
                                        <div class="product-cart_tooltip">
                                            <img src="/db/menu/264/954/dsn86_pitstsa-218.7924.54gub.jpg" height="200" width="200" alt="Пицца мясное ассорти">
                                            <p>Cыр моцарелла, ветчина, салями, куриное филе, пепперони, лук, маслины, фирменный соус</p>
                                        </div>
                                    </div>
                                    <p class="product-cart_title">Пицца мясное ассорти</p>
                                </div>
                                <div class="col s-3 product-cart_top js-cart-calc">
                                    <button onclick="incrementItem(2724579, 23171478, -1)" class="product-cart_calc btn--minus">-</button>
                                    <input type="text" class="product-cart_calc-result" disabled="" value="1">
                                    <button onclick="incrementItem(2724579, 23171478, 1)" class="product-cart_calc btn--plus">+</button>
                                </div>
                                <div class="col s-2 product-cart_top text-right">
                                    <p class="product-cart_price">450 Р</p>
                                </div>
                                <div class="col s-1">
                                    <button onclick="removeItem(2724579, 23171478)" class="product-cart_delete btn--delete js-cart-tovar-delete">Удалить</button>
                                </div>
                            </div>--}}
                            {{--<div class="restoran-cart_title restoran-cart_title--small">Блюда в подарок</div>--}}
                            {{--<div class="product-cart row">--}}
                            {{--<div class="col s-6">--}}
                            {{--<div class="product-cart_image">--}}
                            {{--<img src="/db/menu/382/837/dsn86_pitstsa-211.4576.q94e.jpg" height="50" width="50" alt="Пицца маргарита">--}}
                            {{--<div class="product-cart_tooltip">--}}
                            {{--<img src="/db/menu/382/837/dsn86_pitstsa-211.4576.q94e.jpg" height="200" width="200" alt="Пицца маргарита">--}}
                            {{--<p>Соус, сыр моцарелла, томаты, орегано, базилик.</p>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<p class="product-cart_title">Пицца маргарита</p>--}}
                            {{--</div>--}}
                            {{--<div class="col s-2"></div>--}}
                            {{--<div class="col s-3 product-cart_top text-right">--}}
                                {{--<p class="product-cart_price">Бесплатно</p>--}}
                            {{--</div>--}}
                            {{--<div class="col s-1"></div>--}}
                            {{--</div>--}}
                            <div class=" cart-summary">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <a href="/restaurants/menu/eda-edamsk" class="btn btn--grey">вернуться в меню</a>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">
                                        Итого:
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3 cart-summary_price">
                                        <b id="zz-cartShowTotalCost">{{ $cartSummary['totalCost'] }} P</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cart-form" data-city="Москва">
                            <div class="cart-form_title">Оформление</div>
                            <form action="{{ $action }}" id="cart_form" method="post">
                                {{ csrf_field() }}
                                @if(!Auth::check() || (empty(Auth::user()->profile) || Auth::user()->profile->userAddresses->isEmpty()))
                                    <input type="text" name="customer_name" placeholder="Имя" required>
                                    <input type="tel" id="phone-cart" name="phone" value="" placeholder="Телефон" required >
                                    <input type="hidden" name="city" value="Сочи">
                                    <div class="address-form__input-wrapper">
                                        <input type="text" name="street" data-value="" value="" placeholder="Улица" required>
                                        <div class="address-live-box scroll"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col s-4">
                                            <input type="text" name="house" data-value="" value="" placeholder="Дом" required>
                                        </div>
                                        <div class="col s-4">
                                            <input type="text" name="flat" value="" placeholder="Кварт.">
                                        </div>
                                    </div>
                                    <textarea name="description" value="" placeholder="Комментарий"></textarea>
                                @else
                                    <?php /* @var \App\Model\UserAddress $userAddress*/
                                          /* @var  \App\Model\Profile $profile*/
                                    $profile = Auth::user()->profile;
                                    ?>
                                    <p>Имя: {{ $profile->first_name }}</p>
                                    <p>Телефон: {{ $profile->phone_1 }}</p>
                                    @foreach(Auth::user()->profile->userAddresses as $userAddress)
                                        <input type="radio" id="address_{{ $userAddress->id }}"  name="user_address_id" value="{{ $userAddress->id }}"
                                                {{ $loop->first ? 'checked' : '' }}>
                                        <label for="address_{{ $userAddress->id }}">
                                            ул. {{ $userAddress->street }}, дом {{ $userAddress->house }}{{ !empty($userAddress->flat) ? '/' . $userAddress->flat : ''}}
                                        </label>
                                    @endforeach
                                @endif

                                @if(Auth::check() && !empty(Auth::user()->profile))
                                    <label for="zz-bonus-payment">У вас на счету {{ Auth::user()->profile->bonus_score }} бонусов</label>
                                    {{--<input id="zz-bonus-payment" type="text" placeholder="Оплатить бонусами" data-bonus-score="{{ Auth::user()->profile->bonus_score }}">--}}
                                @endif

                                <ul class="cart-switch">
                                    @foreach($paymentMethods as $paymentMethod)
                                        @if($paymentMethod->alias !== 'bonus')
                                        <li>
                                            <input id="{{$paymentMethod->id}}"
                                                   name="payment_method_id"
                                                   value="{{$paymentMethod->id}}"
                                                   type="radio"
                                                   @if($paymentMethod->alias == 'cash')
                                                    checked="checked"
                                                   @endif
                                            >
                                            <label for="{{$paymentMethod->id}}">{{$paymentMethod->name}}</label>
                                        </li>
                                        @endif
                                    @endforeach
                                    @foreach($paymentMethods as $paymentMethod)
                                        @if($paymentMethod->alias == 'bonus')
                                            @if(Auth::check() && (!empty(Auth::user()->profile) && Auth::user()->profile->bonus_score >= $cartSummary['totalCost']) )
                                                <li>
                                                    <input id="{{$paymentMethod->id}}"
                                                           name="payment_method_id"
                                                           value="{{$paymentMethod->id}}"
                                                           type="radio">
                                                    <label for="{{$paymentMethod->id}}">
                                                        {{$paymentMethod->name}} ({{ Auth::user()->profile->bonus_score}} )
                                                    </label>
                                                </li>
                                            @else
                                                <p>У Вас не достаточно бонусов для оплаты бонусами</p>
                                                <p>Бонус счет: 0</p>
                                            @endif
                                        @endif
                                    @endforeach

                                    {{--<li>
                                        <input id="cart-switch2" name="payment_type" value="2" type="radio">
                                        <label for="cart-switch2">Картой онлайн</label>
                                    </li>--}}
                                </ul>
                                <button type="submit" class="btn btn--green">Заказать</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        window.urlBag.removeFromCart = '{{ route('user_cart_remove') }}';
        window.urlBag.addToCart = '{{ route('user_cart_add') }}';
        window.urlBag.removeAllByProduct = '{{ route('user_cart_remove_allByProduct') }}';
        window.urlBag.cartClear = '{{ route('user_cart_clear') }}';
    </script>

@endsection