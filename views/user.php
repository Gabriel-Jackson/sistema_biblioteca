
<img class="img-fluid rounded-circle img-thumbnail w-25 mx-auto d-block" src="/public/image/users_icons/admin.png" alt="user image" >
<div class="row my-3 w-100 mx-auto d-block p-2">
    <div class="p-3  row align=-items-senter">
        <p class="h2 col text-center"> Informações </p>
        <div class="w-100"></div>
        
    </div>
    <div class="my-3 p-2 border col">
            <div class="col m-2"><p class="h3"><strong>Nome:</strong> <?= $user['name'];?></p></div>
            <div class="col m-2"><p class="h3"><strong>Privilégio:</strong> <?= $user['privilege'];?></p></div>
            <div class="col m-2"><p class="h3"><strong>Últimas Ações:</strong></p></div>
            <div class="col m-2">
            <table class="table table-sm table-bordered my-2">
                <thead class="thead-light">
                    <th>Livro</th>
                    <th>Ação</th>
                    <th>Data</th>
                </thead>
                <tbody>
                    <?php//  foreach ($actions as $action):?>
                        <tr>
                            <td></td>
                        </tr>
                    <?php //endforeach; ?>
                </tbody>
            </table>
            </div> 
        </div>
</div>