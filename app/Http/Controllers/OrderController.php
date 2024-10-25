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
        return view('orders.index',  ['orders'=> $orders]);
    }

    // Muestra el formulario para crear un nuevo pedido
    public function create()
    {
        $orders = DB::table('orders')->get();
        return view('orders.new', ['orders' => $orders]);
    }

    // Almacena un nuevo pedido
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|integer|exists:clients,id', 
            'branch_id' => 'required|integer|exists:branches,id', 
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|string|in:pendiente,en_preparacion,listo,entregado',
            'delivery_type' => 'required|string|in:en_local,a_domicilio',
            'delivery_person_id' => 'nullable|integer|exists:employees,id' 
        ]);
    
        Order::create($validatedData);
    
        return redirect()->route('orders.index')->with('success', 'Pedido creado exitosamente.'); 
    }

    // Muestra los detalles de un pedido específico
    public function show(Order $order)
    {
        //
    }

    // Muestra el formulario para editar un pedido existente
    public function edit(Order $order)
    {
        
    }

    // Actualiza un pedido existente
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'branch_id' => 'required|exists:branches,id',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pendiente,en_preparacion,listo,entregado',
            'delivery_type' => 'required|in:en_local,a_domicilio',
            'delivery_person_id' => 'nullable|exists:employees,id',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Pedido actualizado exitosamente.');
    }

    // Elimina un pedido
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pedido eliminado exitosamente.');
    }
}
