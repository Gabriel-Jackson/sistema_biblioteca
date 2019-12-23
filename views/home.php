<form class="form-check-inline border rounded p-2" id="pageForm">
    <span class="mr-2">Livros por Página: </span>
    <div class="form-check form-check-inline ml-1 " name="firstRadio">
        <input class="form-check-input" type="radio" name="limit" id="numMax5" value="5">
        <label class="form-check-label" for="numMax5">5</label>
    </div>
    <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="limit" id="numMax10" value="10">
            <label class="form-check-label" for="numMax10">10</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="limit" id="numMax20" value="20">
        <label class="form-check-label" for="numMax20">20</label>
    </div>
</form>
<input type="hidden" name="pag" id="pag" value="0">
<table class="table table-stripped mt-3 mb-3 border">
    <thead class="thead">
        <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Autor</th>
            <th scope="col">Status</th>
            <th scope="col"><i class="fas fa-ellipsis-h"></i></th>
        </tr>
    </thead>
    <tbody >
    <?php foreach ($livros as $livro):?>
        <tr>
            <td scope="row" class="titulo"><?=$livro['titulo']?></td>
            <td class="autor"><?=$livro['autor']?></td>
            <td class="status"><?= "Disponível" ?></td>
            <td><button class="btn"><i class="fas fa-ellipsis-h"></button></i></td>
        </tr>
    <?php endforeach; ?> 
    </tbody>
</table>

<nav aria-label="Page navigation">
    <ul class="pagination" id="ulPagination">
    </ul>
</nav>
<script src="public/js/pagination.js"></script>