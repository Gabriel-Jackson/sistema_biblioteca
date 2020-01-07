<form class="form-check-inline border rounded p-2" id="pageForm">
    <span class="mr-2">Usuários por Página: </span>
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
<table class="table table-dark table-striped mt-3 mb-3 border">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Privilégio</th>
            <th scope="col"><i class="fas fa-ellipsis-h"></i></th>
        </tr>
    </thead>
    <tbody >
    <?php foreach ($users as $user):?>
        <tr>
            <td scope="row"><?= $user['id'];?></td>
            <td scope="row" class=""><?=$user['name']?></td>
            <td scope="row" class=""><?=$user['privilege']?></td>
            <td scope="row"><a class="btn btn-link" href="/users/info?id=<?=$user['id']?>" aria-disabled="true"><i class="fas fa-ellipsis-h"></a></i></td>
        </tr>
    <?php endforeach; ?> 
    </tbody>
</table>

<nav aria-label="Page navigation">
    <ul class="pagination" id="ulPagination">
    </ul>
</nav>
<script src="public/js/pagination.js"></script>