<?= view('headprin'); ?>

<div class="user-details-container">
    <?php $session = session()->get('usuario'); ?>
    <h2>Datos del Usuario</h2>
    <p>Nombre: <?= $session['nombre']; ?></p>
    <p>Apellido: <?= $session['apellido']; ?></p>
    <p>Correo: <?= $session['correo']; ?></p>
    <p>Telefono: <?= $session['telefono']; ?></p>
</div>  

<div class="user-details-container">
    <h2>Historial de Compra</h2>
    <?php if (!empty($historialEnvios)) : ?>
        <ul>
            <?php foreach ($historialEnvios as $envio) : ?>
                <li>
                    <p>Provincia: <?= $envio['provincia']; ?></p>
                    <p>Ciudad: <?= $envio['ciudad']; ?></p>
                    <p>Calle: <?= $envio['calle']; ?></p>
                    <p>Piso: <?= $envio['piso']; ?></p>
                    <p>Observaciones: <?= $envio['observaciones']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No hay historial de envíos.</p>
    <?php endif; ?>
</div>  

<?= view('footer'); ?>
