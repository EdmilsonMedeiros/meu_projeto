<div class="modal fade" data-bs-backdrop="static" id="add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h3>Receita</h3>
        <form action="{{ route('lancamento.store') }}" method="POST">
          {{ csrf_field() }}
          <div class="mb-3" style="display: none;">
            <label for="recipient-tipo" class="col-form-label">Receita:</label>
            <input type="text" class="form-control" id="recipient-tipo" name="tipo" value="Receita" required>
          </div>
          <div class="mb-3">
            <label for="valor" class="col-form-label">Valor(R$):</label>
            <input type="text" class="form-control" id="valor_receita" name="valor" placeholder="0,00" data-symbol="R$ " data-thousands="." data-decimal="," required>
          </div>
          <div class="mb-3">
            <label for="recipient-data" class="col-form-label">Data:</label>
            <input type="date" class="form-control" id="recipient-data" name="data" value="{{ date('Y-m-d') }}" required>
          </div>
          <div class="mb-3">
            <label for="recipient-categoria_id" class="col-form-label">Categoria:</label>
            <select name="categoria_id" id="recipient-categoria_id" class="form-control" required>
              <option value="" selected disabled>Selecione uma categoria</option>
                @foreach ($categorias_receita as $categoria_receita)
                  <option value="{{ !is_null($categoria_receita->id) ? $categoria_receita->id : '' }}">{{ !is_null($categoria_receita->nome) ? $categoria_receita->nome : '' }}</option>
                @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="recipient-cescricao" class="col-form-label">Descrição:</label>
            <input type="text" class="form-control" id="recipient-cescricao" name="descricao" maxlength="26" placeholder="26 caracteres" required>
          </div>
      </div>
        <div class="modal-footer bg-success">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </form>
      </div>
    </div>
  </div>

