<?= view('headprin'); ?>
<h1 class="carrito-unique123">Carrito de Compras</h1>
<?php if (!empty($productosCarrito)) : ?>
    <form action="<?= base_url('carrito/actualizar'); ?>" method="post" class="cart-update-form-unique123">
        <ul class="cart-list-unique123">
                <?php $totalCarrito = 0; 
                foreach ($productosCarrito as $producto) :
                ?>
                    <li class="cart-item-unique123">
                        <span class="cart-nombre-unique123">Nombre: <?= $producto['nombre']; ?></span>
                        <span class="cart-precio-unique123">Precio: <?= $producto['precio']; ?></span>
                        <input type="hidden" name="id_talle_producto[]" value="<?= $producto['id_talle_producto']; ?>">
                        <input type="number" name="nueva_cantidad[]" value="<?= $producto['cantidad']; ?>" class="cart-quantity-input-unique123">
                        <?php
                        $subtotal = $producto['precio'] * $producto['cantidad'];
                        $totalCarrito += $subtotal;
                        ?>
                        <input type="total" name="total" value="<?= $subtotal; ?>">
                    </li>
                    <a href="<?= base_url('carrito/eliminar/' . $producto['id_talle_producto']); ?>" class="cart-delete-link-unique123">Eliminar</a>
                <?php endforeach; ?>
        </ul>
        <button type="submit" class="cart-update-button-unique123">Actualizar</button>
    </form>
    <p >Total del carrito: <?= $totalCarrito; ?></p>
    <a href="<?= base_url('carrito/finalizarcompra'); ?>" class="btn btn-primary cart-finalizar-compra-unique123">Finalizar Compra</a>
<?php else : ?>
    <p class="cart-empty-message-unique123">No hay productos en el carrito</p>
<?php endif; ?>
<?= view('footer'); ?>
