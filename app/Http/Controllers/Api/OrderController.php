<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Order;

use App\Application\UseCases\Order\CreateOrderUseCase;
use App\Application\UseCases\Order\GetOrdersUseCase;

class OrderController extends Controller
{
    public function __construct(
        private CreateOrderUseCase $createOrderUseCase,
        private GetOrdersUseCase $getOrdersUseCase
    ){}

    /**
    * @OA\Get(
    *     path="/api/orders",
    *     tags={"Orders"},
    *     summary="Listar pedidos",
    *     security={{"bearerAuth":{}}},
    *     @OA\Response(response=200, description="OK")
    * ) 
    **/
    public function index()
    {
        $orders = $this->getOrdersUseCase->execute();
        return response()->json($orders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request) {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'items' => 'required|array',
            'tags' => 'array',
            'status' => 'required|string',
            'total' => 'required|numeric',
        ]);

        $this->createOrderUseCase->execute($data);

        return response()->json(['message' => 'Pedido criado com sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
