<?php

namespace App\Models;
use CodeIgniter\Model;



class modelprod extends Model {
 protected $table = 'producto';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre','precio','tipo_id','color_id','ruta'];
  protected $validarionrules=[];

  public function produtonuevo($date)
  {
    return $this->insert($date);
  }

  public function obtenerPrecioProductoPorId($id_producto)
    {
        // Recupera y devuelve el precio del producto con el ID proporcionado
        // Debes reemplazar el código a continuación con tu lógica real para obtener el precio desde la base de datos
        $query = $this->db->table('producto')->select('precio')->where('id_producto', $id_producto)->get();
        
        // Verifica si la consulta devolvió algún resultado
        if ($query->getNumRows() > 0) {
            return $query->getRow()->precio;
        } else {
            // Maneja el caso en el que no se encuentra el producto con el ID proporcionado
            return 0; // o cualquier valor predeterminado que prefieras
        }
    }


}