<?php

namespace App\Application\UseCases\Order;

use App\Models\Order;

use Twilio\Rest\Client;

class HandleOrderCreatedUseCase
{
    public function __construct(private Client $twilio) {}

    public function execute(Order $order): void//array $orderData): void
    {
        $message = "Seu pedido #{$order->id} foi recebido e está com status '{$order->status}'.";

        // Telefone do cliente (TODO: buscar isso do relacionamento com o User)
        $from = config('services.twilio.twilio_whatsapp_number'); // número oficial do sandbox ou production da Twilio
        # TODO: $to = 'whatsapp:' . $order->user->phone_number;
        $to = config('services.twilio.twilio_whatsapp_recipient_number');// exemplo: whatsapp:+5511999999999

        $this->twilio->messages->create($to, [
            'from' => $from,
            'body' => $message
        ]);
    }
}