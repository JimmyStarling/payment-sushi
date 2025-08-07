<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
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
        $orders = Order::latest()->paginate(10); // Ordena por mais recente e pagina
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
            'status' => 'required|string',
            'items' => 'required|array',
            'total' => 'required|numeric',
            'tags' => 'nullable|array',
        ]);

        $order = Order::create([
            'user_id' => Auth::id(), // pega o ID do usuário autenticado
            'status' => $data['status'],
            'items' => $data['items'],
            'total' => $data['total'],
            'tags' => $data['tags'] ?? [],
        ]);

        return response()->json($order, 201);
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
