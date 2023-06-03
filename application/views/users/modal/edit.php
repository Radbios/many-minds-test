<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Editar usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url() ?>usuario/store" method="post">
                    <div class="modal-body">
                    <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="editrole" class="form-control">
                                <option value="" disabled selected>Selecione o tipo de usuário</option>
                                <option value="admin">Administrador</option>
                                <option value="student">Estudante</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="matricula" class="form-label">Matrícula</label>
                            <input type="text" class="form-control" id="editmatricula" name="matricula">
                        </div>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="editnome" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editemail" name="email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btn-edit-user">Editar usuário</button>
                    </div>
                </form>
            </div>
        </div>
    </div>