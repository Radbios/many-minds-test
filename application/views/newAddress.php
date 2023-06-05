<div class="modal fade" id="cadastrarEndereco" tabindex="-1" aria-labelledby="cadastrarEnderecoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="cadastrarEnderecoLabel">Novo endereço</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= base_url() ?>endereco/store" method="post">
            <div class="modal-body">

            <div class="input-group mb-3">
              <label class="input-group-text" for="createAddressCEP">CEP</label>
              <input class="form-control" type="text" name="createAddressCEP" id="createAddressCEP" onchange="getAddress(this.value)">
            </div>
            <div class="input-group mb-3">
               <label class="input-group-text" for="createAddressBairro">Bairro</label>
                <input class="form-control" type="text" name="createAddressBairro" id="createAddressBairro">
            </div>
              <div class="input-group mb-3">
                <label class="input-group-text" for="createAddressLogradouro">Logradouro</label>
                <input class="form-control" type="text" name="createAddressLogradouro" id="createAddressLogradouro">
              </div>
              <div class="input-group mb-3">
                <label class="input-group-text" for="createAddressCidade">Cidade</label>
                <input class="form-control" type="text" name="createAddressCidade" id="createAddressCidade">
              </div>
              <div class="input-group mb-3">
                <label class="input-group-text" for="createAddressEstado">Estado</label>
                <input class="form-control" type="text" name="createAddressEstado" id="createAddressEstado">
              </div>

              <div id="addressList">
                <div>
                  Endereços:
                </div>
                <ul id="addresses">
                  
                </ul>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-add">Adicionar endereço</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary" id="btn-create" disabled>Criar endereço</button>
            </div>
        </form>
      </div>
    </div>
  </div>