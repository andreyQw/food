@extends('admin.mainTemplates.order')

@section('content')
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#new-orders" aria-controls="home" role="tab" data-toggle="tab">Новые заказы</a>
            </li>
            <li role="presentation">
                <a href="#handled" aria-controls="handled" role="tab" data-toggle="tab">Обработанные</a>
            </li>
            <li role="presentation">
                <a href="#archived" aria-controls="archived" role="tab" data-toggle="tab">В архиве</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="new-orders">
                <table class=" table table-hover">
                    <tr>
                        <th>Номер</th>
                        <th>Имя заказчика</th>
                        <th>Номер телефона</th>
                        <th>Дата и время <br> оформления заказа</th>
                        <th>Действия</th>
                    </tr>

                    @foreach ($newFastOrders as $order)
                        <tr>
                            <td>{{ $order->number }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->creation_date }}</td>
                            <td>
                                <a class="btn btn-default btn-tabl" href="{{ route('admin_order_fast_show', [$order]) }}">Подробнее</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="handled">
                <table class=" table table-hover">
                    <tr>
                        <th>Номер</th>
                        <th>Имя заказчика</th>
                        <th>Номер телефона</th>
                        <th>Дата и время <br> оформления заказа</th>
                        <th>Действия</th>
                    </tr>
                    @foreach ($handledFastOrders as $order)
                        <tr>
                            <td>{{ $order->number }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->creation_date }}</td>
                            <td>
                                <a class="btn btn-default btn-tabl" href="{{ route('admin_order_fast_show', [$order]) }}">Подробнее</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="archived">
                <table class=" table table-hover">
                    <tr>
                        <th>Номер</th>
                        <th>Имя заказчика</th>
                        <th>Номер телефона</th>
                        <th>Дата и время <br> оформления заказа</th>
                        <th>Действия</th>
                    </tr>

                    @foreach ($archivedFastOrders as $order)
                        <tr>
                            <td>{{ $order->number }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->creation_date }}</td>
                            <td>
                                <a class="btn btn-default" href="{{ route('admin_order_fast_show', [$order]) }}">Подробнее</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="infoMobil infoMobil--border">
            @foreach($newFastOrders as $order)
                <p class="infoMobil__stat infoMobil__stat--mod">Новые:</p>

                <p class="infoMobil__stat">Номер</p>
                <div>{{ $order->number }}</div>

                <p class="infoMobil__stat">Имя заказчика</p>
                <div>{{ $order->customer_name }}</div>

                <p class="infoMobil__stat">Номер телефона</p>
                <div>{{ $order->phone }}</div>

                <p class="infoMobil__stat">Дата и время <br> оформления заказа</p>
                <div>{{ $order->creation_date }}</div>
                <p class="infoMobil__stat">Действия</p>
                <div>
                    <a class="btn btn-default btn-tabl" href="{{ route('admin_order_fast_show', [$order]) }}">Подробнее</a>
                </div>
            @endforeach
        </div>
        <div class="infoMobil infoMobil--border">
            @foreach($handledFastOrders as $order)
                <p class="infoMobil__stat infoMobil__stat--mod">Обработанные:</p>

                <p class="infoMobil__stat">Номер</p>
                <div>{{ $order->number }}</div>

                <p class="infoMobil__stat">Имя заказчика</p>
                <div>{{ $order->customer_name }}</div>

                <p class="infoMobil__stat">Номер телефона</p>
                <div>{{ $order->phone }}</div>

                <p class="infoMobil__stat">Дата и время <br> оформления заказа</p>
                <div>{{ $order->creation_date }}</div>
                <p class="infoMobil__stat">Действия</p>
                <div>
                    <a class="btn btn-default btn-tabl" href="{{ route('admin_order_fast_show', [$order]) }}">Подробнее</a>
                </div>
            @endforeach
        </div>

        <div class="infoMobil infoMobil--border">
            @foreach($archivedFastOrders as $order)
                <p class="infoMobil__stat infoMobil__stat--mod">В архиве:</p>

                <p class="infoMobil__stat">Номер</p>
                <div>{{ $order->number }}</div>

                <p class="infoMobil__stat">Имя заказчика</p>
                <div>{{ $order->customer_name }}</div>

                <p class="infoMobil__stat">Номер телефона</p>
                <div>{{ $order->phone }}</div>

                <p class="infoMobil__stat">Дата и время <br> оформления заказа</p>
                <div>{{ $order->creation_date }}</div>
                <p class="infoMobil__stat">Действия</p>
                <div>
                    <a class="btn btn-default btn-tabl" href="{{ route('admin_order_fast_show', [$order]) }}">Подробнее</a>
                </div>
            @endforeach
        </div>

    </div>
@endsection