<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
    protected $table = 'orders';

    protected $fillable = [
        'client_id',
        'branch_id',
        'total_price',
        'status',
        'delivery_type',
        'delivery_person_id',
    ];

    protected $attributes = [
        'status' => 'pendiente',
        'delivery_type' => 'en_local',
    ];

    const STATUS_PENDIENTE = 'pendiente';
    const STATUS_EN_PREPARACION = 'en_preparacion';
    const STATUS_LISTO = 'listo';
    const STATUS_ENTREGADO = 'entregado';

    const DELIVERY_LOCAL = 'en_local';
    const DELIVERY_DOMICILIO = 'a_domicilio';

    // Relación con el cliente 
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Relación con la sucursal 
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    // Relación con el repartidor 
    public function deliveryPerson()
    {
        return $this->belongsTo(Employee::class, 'delivery_person_id');
    }

    // Relación con pizza_size 
    public function pizzaSizes()
    {
        return $this->belongsToMany(PizzaSize::class, 'order_pizza');
    }

    // Relación con extra_ingredients a través de order_extra_ingredient
    public function extraIngredients()
    {
        return $this->belongsToMany(ExtraIngredient::class, 'order_extra_ingredient');
    }
}
