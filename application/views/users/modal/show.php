<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="showModalLabel">Ver usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="showrole" class="form-control" disabled>
                                <option value="" disabled selected>Selecione o tipo de usuário</option>
                                <option value="admin">Administrador</option>
                                <option value="student">Estudante</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="matricula" class="form-label">Matrícula</label>
                            <input disabled type="text" class="form-control" id="showmatricula" name="matricula">
                        </div>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input disabled type="text" class="form-control" id="shownome" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input disabled type="email" class="form-control" id="showemail" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="curso" class="form-label">Curso</label>
                            <input disabled type="email" class="form-control" id="showcurso" name="curso">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">sair</button>
                    </div>
                </div>
            </div>
        </div>
    </div>