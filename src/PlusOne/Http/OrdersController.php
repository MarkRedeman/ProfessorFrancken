<?php

declare(strict_types=1);

namespace Francken\PlusOne\Http;

use Illuminate\Database\DatabaseManager;

final class OrdersController
{
    private $orders;

    public function __construct(DatabaseManager $db)
    {
        $this->orders = $db->connection('francken-legacy');
    }

    public function index()
    {
        return $this->orders->table('transacties')
            ->take(100)
            ->orderBy('tijd', 'DESC')
            ->get()
            ->map(function ($transactie) {
                return $transactie;
                return [
                    'id' => $transactie->id,
                    'member_id' => $transactie->lid_id,
                    'product_id' => $transactie->product_id,
                    'amount' => $transactie->aantal,
                    'orderd_at' => $transactie->tijd,
                    'price' => $transactie->totaalprijs,
                ];
            });
    }

    public function post()
    {
        \Log::info(
            'Buying an order',
            ['ip' => request()->ip(), 'order' => request()->get('order')]
        );

        $order = request()->get('order');

        foreach ($order['products'] as $product) {
            $productFromDb = $this->orders->table('producten')
                     ->where('id', $product['id'])
                     ->first();

            $this->orders->table('transacties')
                ->insert([
                    "lid_id" => $order['member']['id'],
                    "product_id" => $product['id'],
                    "aantal" =>	1,
                    "prijs" => $productFromDb->prijs,
                    "totaalprijs" => $productFromDb->prijs,
                    "tijd" => (new \DateTimeImmutable())->setTimestamp(
                        (int)($order['ordered_at'] / 1000)
                    )
                ]);
        }

        return response(['create' => 'ok'], 201);
    }
}
