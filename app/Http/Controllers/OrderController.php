<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Muestra la lista de pedidos
    public function index()
    {
        $orders = Order::with(['client', 'branch', 'deliveryPerson'])->get();
        return view('orders.index', ['orders'=> $orders]);
    }

    // Muestra el formulario para crear un nuevo pedido
    public function create()
    {
        //
    }

    // Almacena un nuevo pedido
    public function store(Request $request)
    {
        //
    }

    // Muestra los detalles de un pedido específico
    public function show(Order $order)
    {
        //
    }

    // Muestra el formulario para editar un pedido existente
    public function edit(Order $order)
    {
        //
    }

    // Actualiza un pedido existente
    public function update(Request $request, Order $order)
    {
        //
    }

    // Elimina un pedido
    public function destroy(Order $order)
    {
        //
    }
}
