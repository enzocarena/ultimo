<?php

namespace App\Models;

use CodeIgniter\Model;

class historialcompra extends Model
{
    protected $table = 'detalle_venta';
    protected $primaryKey = 'id_detalle_venta'; 
    protected $allowedFields = ['id_venta', 'id_producto', 'cantidad', 'precio'];

    public function agregarDetalleVenta($idVenta, $idProducto, $cantidad, $precio)
    {
        // Crea un nuevo registro en la tabla 'detalle_venta'
        $data = [
            'id_venta'    => $idVenta,
            'id_producto' => $idProducto,
            'cantidad'    => $cantidad,
            'precio'      => $precio
        ];

        $this->insert($data);
    }
}
      

