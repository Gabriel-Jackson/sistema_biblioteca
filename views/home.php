<table class="table table-dark mt-3">
    <thead class="thead-dark">
        <tr>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Status</th>
            <th>...</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($livros as $livro):?>
        <tr>
            <td><?=$livro['titulo']?></td>
            <td><?=$livro['autor']?></td>
            <td><?= "Disponível" ?></td>
            <td>...</td>
        </tr>
    <?php endforeach; ?> 
    </tbody>
</table>