<div class="conteudo">
    <div class="title">
        <div class="title-text">Endereços</div>
            <button type="button" class="btn-header" data-bs-toggle="modal" data-bs-target="#cadastrarEndereco">
                Criar
            </button>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">CEP</th>
                <th scope="col">Bairro</th>
                <th scope="col">Logradouro</th>
                <th scope="col">CIdade</th>
                <th scope="col">Estado</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($enderecos as $endereco):?>
                <tr id="<?= $endereco['id']?>">
                    <td scope="row"><?= $endereco['id']?></td>
                    <td scope="row"><?= $endereco['user_id']?></td>
                    <td scope="row"><?= $endereco['cep']?></td>
                    <td scope="row"><?= $endereco['bairro']?></td>
                    <td scope="row"><?= $endereco['logradouro']?></td>
                    <td scope="row"><?= $endereco['cidade']?></td>
                    <td scope="row"><?= $endereco['estado']?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>    
    </div>
</div>
