<div class="conteudo">
  <div class="title">
      <div class="title-text">Usuários</div>
      <button type="button" class="btn-header" data-bs-toggle="modal" data-bs-target="#createModal">
          Novo usuário
      </button>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Matricula</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($usuarios as $usuario):?>
        <tr id="<?= $usuario['id']?>">
          <td scope="row"><?= $usuario['id']?></td>
          <td scope="row"><?= $usuario['matricula']?></td>
          <td scope="row"><?= $usuario['nome']?></td>
          <td scope="row"><?= $usuario['email']?></td>
          <td>
            <?php if($usuario['role'] == USER_ADMIN):?>
              <div class="branded-blue">
            <?php else: ?>
              <div class="branded-yellow">
            <?php endif; ?>

                <?= $usuario['role']?>
              </div>
          </td>
          <td>
            <div class="td-content">
              <?php if($usuario['status'] == true):?>
                <div class="circle bg-green"></div>
              <?php else: ?>
                <div class="circle bg-red"></div>
              <?php endif; ?>
            </div>
          </td>
          <td>
            <?php if($usuario['id'] != ROOT):?>
              <button type="button" class="btn-show" data-bs-toggle="modal" value="<?= $usuario['id'] ?>" data-bs-target="#showModal">
                  Ver
              </button>
              <button type="button" class="btn-edit editModal" value="<?= $usuario['id'] ?>" data-bs-toggle="modal" data-bs-target="#editModal">
                  Editar
              </button>
              <?php if($usuario['status'] == true):?>
                <button class="btn-desactive" value="<?= $usuario['id'] ?>">Desativar</button>
              <?php else: ?>
                <button class="btn-active" value="<?= $usuario['id'] ?>">Ativar</button>
              <?php endif; ?>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>    
</div>