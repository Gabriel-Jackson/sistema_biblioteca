<form class="form-inline">
    <div class="form-group">
    <label for="numMax">Livros por Página:</label>
    
    <input type="text" name="numMax" id="numMax" value="5">
    </div>
</form>
<table class="table table-stripped mt-3 mb-3">
    <thead class="thead">
        <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Autor</th>
            <th scope="col">Status</th>
            <th scope="col"><i class="fas fa-ellipsis-h"></i></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($livros as $livro):?>
        <tr>
            <td scope="row"><?=$livro['titulo']?></td>
            <td><?=$livro['autor']?></td>
            <td><?= "Disponível" ?></td>
            <td><button class="btn"><i class="fas fa-ellipsis-h"></button></i></td>
        </tr>
    <?php endforeach; ?> 
    </tbody>
</table>

<script src="public/js/pagination.js"></script>