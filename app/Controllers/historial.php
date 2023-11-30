<?php

namespace App\Controllers;

use App\Models\CarritoModel;
use App\Models\DetalleVentaModel;
use App\Models\historialcompra;
use App\Models\VentaModel;

class CompraController extends BaseController
{
    public function finalizarCompra()
    {
        // Obtener datos del carrito
        $idUsuario = 1; // Reemplaza con la lógica para obtener el ID del usuario actual
        $carritoModel = new CarritoModel();
        $productosEnCarrito = $carritoModel->obtenerProductosEnCarrito($idUsuario);

        // Crear una nueva venta
        $ventaModel = new historialcompra(); // Asegúrate de tener un modelo para la tabla 'venta'
        $idVenta = $ventaModel->insert(['id_usuario' => $idUsuario, 'fecha' => date('Y-m-d H:i:s')]);

        // Mover productos del carrito a detalle_venta
        $detalleVentaModel = new historialcompra(); // Asegúrate de tener un modelo para la tabla 'detalle_venta'
        foreach ($productosEnCarrito as $producto) {
            $detalleVentaModel->insert([
                'id_venta' => $idVenta,
                'id_producto' => $producto['id_talle_producto'], // Ajusta según tu estructura real
                'cantidad' => $producto['cantidad'],
                'precio' => $producto['precio'],
            ]);
        }

        // Vaciar el carrito
        $carritoModel->where('id_usuario', $idUsuario)->delete();

        // Redirigir a la página de confirmación o a donde desees
        return redirect()->to('pagina-de-confirmacion');
    }
}

