    <div class="conteudo">
        <div class="title">
            <div class="title-text">Logs</div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Role</th>
                <th scope="col">Tipo</th>
                <th scope="col">Descrição</th>
                <th scope="col">Data</th>
            </tr>
            </thead>
            <tbody>
                <?php if(!is_null($logs)):?>
                    <?php foreach($logs as $log):?>
                    <tr id="<?= $log->id?>">
                        <td scope="row"><?= $log->id?></td>
                        <td scope="row"><?= $log->user->email ?></td>
                        <td scope="row">
                            <?php if($log->user->role == USER_ADMIN):?>
                                <div class="branded-blue">
                            <?php else: ?>
                                <div class="branded-yellow">
                            <?php endif; ?>
                                <?= $log->user->role ?>
                            </div>
                        </td>
                        
                        <td scope="row"><?= $log->tipo?></td>
                        <td scope="row"><?= $log->descricao?></td>
                        <td scope="row"><?= $log->date?></td>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
</div>