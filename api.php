<?php
class Order
{
    public $busket = [];
    public function add_to_busket($good){
        // Перед этим используя Middleware проверить, авторизован ли пользователь
        array_push($this->busket, $good);
        add_to_database($this->busket);
        unset($this->busket);
        return;
    }

    public function arrange_delivery($address, $goods){
        $order = array_intersect_assoc($this->busket, $goods);
        add_order_to_db($address, $order);
        return;
    }

}