<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>

    <h1>Tu pedido se ha confirmado</h1>
    <br/>

    <p>

        Tu pedido ha sido guardado con exito, una vez que realices la transferencia
        bancaria a la cuenta 7382947289239ADD con el coste del pedido, será procesado y enviado.

    </p>
    <br/>

    <?php if (isset($pedido)): ?>
        <h3>Datos del pedido</h3>
        <br/>

        Numero del pedido:<?= $pedido->id ?><br/>
        Total a pagar: $ <?= $pedido->coste ?><br/>
        Productos:<br/>

        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>

            </tr>

            <?php while ($producto = $productos->fetch_object()): ?>

                <tr>
                    <td>            
                        <?php if ($producto->imagen != null): ?>
                            <img class="img_carrito" src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>"/>
                        <?php else : ?>
                            <img class="img_carrito" src="<?= base_url ?>assets/img/camiseta.png"/> 
                        <?php endif; ?>
                    </td>
                    <td><a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a></td>
                    <td><?= $producto->precio ?></td>
                    <td><?= $producto->unidades ?></td>                
                </tr>

            <?php endwhile; ?>

        </table>
    <?php endif; ?>

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>

    <h1>Tu pedido no se ha procesado</h1>

<?php endif; ?>
