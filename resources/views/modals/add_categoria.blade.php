<div class="modal fade" data-bs-backdrop="static" id="add_categoria_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h3>Categoria</h3>
          <form action="{{ route('categoria.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="mb-3">
              <label for="recipient-tipo" class="col-form-label">Tipo:</label>
              <select name="tipo" id="recipient-tipo" class="form-control" required>
                <option value="" selected disabled>Escolha um tipo</option>
                <option value="Receita">Receita</option>
                <option value="Despesa">Despesa</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="recipient-nome" class="col-form-label">Nome:</label>
              <input type="text" class="form-control" id="recipient-nome" name="nome" placeholder="Roupas, Peças para o carro, Ferramentas... 20 caracteres" maxlength="20" required>
            </div>
            <div class="mb-3">
              <label for="">Cor</label>
              <input type="color" id="cores" name="cor" list="arcoIris" value="#FF0000" class="form-control" required>
              <datalist id="arcoIris">
                <option value="#FF0000">Vermelho</option>
                <option value="#FFA500">Laranja</option>
                <option value="#FFFF00">Amarelo</option>
                <option value="#008000">Verde</option>
                <option value="#0000FF">Azul</option>
                <option value="#4B0082">Indigo</option>
                <option value="#EE82EE">Violeta</option>
              </datalist>
            </div>
          

        </div>
        <div class="modal-footer bg-warning">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </form>
      </div>
    </div>
  </div>