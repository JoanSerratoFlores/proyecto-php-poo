<h1>Gestionar Categorias</h1>

<a href="<?=base_url?>categoria/crear" class="button-small">
    Crear Categoria
</a>
<br/>
<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
    </tr>
    <?php while ($cat = $categorias->fetch_object()): ?>
        <tr>
            <td><?= $cat->id; ?></td>
            <td><?= $cat->nombre; ?></td>
        </tr>
    <?php endwhile; ?>
</table>
