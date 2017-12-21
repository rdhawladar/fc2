<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Anam\Phpcart\Cart;
use DB;


class ShopManagerController extends Controller
{
    public function index()
	{
		$cart = new Cart();
		/*$cart->add([
			'id'       => 1001,
			'name'     => 'Skinny Jeans',
			'quantity' => 1,
			'price'    => 90
		]);*/
		
		$carts = $cart->items();
		dd($carts);
	}
}


/*******************************************
https://github.com/anam-hossain/phpcart
Add Item

The add method required id, name, price and quantity keys. However, you can pass any data that your application required.

use Anam\Phpcart\Cart;

$cart = new Cart();

$cart->add([
    'id'       => 1001,
    'name'     => 'Skinny Jeans',
    'quantity' => 1,
    'price'    => 90
]);

Update Item

$cart->update([
    'id'       => 1001,
    'name'     => 'Hoodie'
]);

Update quantity

$cart->updateQty(1001, 3);

Update price

$cart->updatePrice(1001, 30);

Remove an Item

$cart->remove(1001);

Get all Items

$cart->getItems();
// or
$cart->items();

Get an Item

$cart->get(1001);

Determining if an Item exists in the cart

$cart->has(1001);

Get the total number of items in the cart

$cart->count();

Get the total quantities of items in the cart

$cart->totalQuantity();

Total sum

$cart->getTotal();

Empty the cart

$cart->clear();











********************************************/
