<img class="img-fluid img-thumbnail float-left m-3" src="" alt="" width="300" height="400">
<div class="row align-items-end">
    <div class="p-3  col">
        <p class="h2 text-center"> Informações </p>
        <div class="m2 p2 border col">
            <input id="id" value="<?= $livro['id'] ?>" type="hidden">
            <div class="h3 "><strong>Titulo:</strong> <?= $livro['titulo'];?></div>
            <div class="h3 "><strong>Autor:</strong> <?= $livro['autor'];?></div>
            <div class="h3 "><strong>Status:</strong> <?= $status;?></div>
            <?php 
                if ($status == "Retirado") {
            ?>
                <div class="h3"><strong>Data para Entrega:</strong> <?= date("d/m/Y",strtotime($livro['data_para_entrega']));?></div>    
                    
                    
                    
            <?php
                }
            ?>
        </div>
        <form action="/livro?id=<?= $livro['id']?>" method="post">
            <input type="hidden" name="id" value="<?= $livro['id'] ?>"> 
            <button name="action" class="btn btn-outline-dark col m-2" <?php
            if ($status == "Retirado"){
                echo "disabled=true";
            }
            ?> type="submit" value="retirar">Retirar</button>
            <button name="action" class="btn btn-outline-dark col m-2" <?php
            if ($status == "Disponível"){
                echo "disabled='true'";
            }
            ?>type="submit" value="devolver">Devolver</button>
        </form>
    </div>
</div>