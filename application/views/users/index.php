<div class="conteudo">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach($usuarios as $usuario):?>
                    <tr>
                        <td><?= $usuario['id'] ?></td>
                        <td><?= $usuario['nome'] ?></td>
                        <td><?= $usuario['email'] ?></td>
                        <td><?= $usuario['role'] ?></td>
                        <td><?= $usuario['status'] ?></td>
                        <td>
                            <button>Ver</button>
                            <button>Ativar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>