<div class="modal fade" data-bs-backdrop="static" id="edit_modal_{{$lancamento->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h3>{{ !is_null($lancamento->tipo) ? $lancamento->tipo : '' }}</h3>
        <form action="{{ route('lancamento.update', $lancamento->id) }}" method="POST">
            @method('PUT')
          {{ csrf_field() }}
          <div class="mb-3" style="display: none;">
            <label for="recipient-tipo" class="col-form-label">Receita:</label>
            <input type="text" class="form-control" id="recipient-tipo" name="tipo" value="{{ !is_null($lancamento->tipo) ? $lancamento->tipo : '' }}" required>
          </div>
          <div class="mb-3">
            <label for="valor" class="col-form-label">Valor(R$):</label>
            <input type="text" class="form-control valor_edit_lancamento" id="" name="valor" placeholder="0,00" value="{{ !is_null($lancamento->valor) ? number_format($lancamento->valor, 2, ',', ',') : '' }}" required>
        </div>
          <div class="mb-3">
            <label for="recipient-data" class="col-form-label">Data:</label>
            <input type="date" class="form-control" id="recipient-data" name="data" value="{{ !is_null($lancamento->data) ? $lancamento->data : 'Y-m-d' }}" required>
          </div>
          <div class="mb-3">
            <label for="recipient-categoria_id" class="col-form-label">Categoria:</label>
            <select name="categoria_id" id="recipient-categoria_id" class="form-control" required>
              <option value="{{ !is_null($lancamento->categoria->id) ? $lancamento->categoria->id : '' }}" selected>{{ !is_null($lancamento->categoria->nome) ? $lancamento->categoria->nome : '' }}</option>
                @if (isset($lancamento->tipo) && $lancamento->tipo == 'Receita')
                    @foreach ($categorias_receita as $categoria_receita)
                    <option value="{{ !is_null($categoria_receita->id) ? $categoria_receita->id : '' }}">{{ !is_null($categoria_receita->nome) ? $categoria_receita->nome : '' }}</option>
                    @endforeach
                @else
                    @foreach ($categorias_despesa as $categoria_despesa)
                    <option value="{{ !is_null($categoria_despesa->id) ? $categoria_despesa->id : '' }}">{{ !is_null($categoria_despesa->nome) ? $categoria_despesa->nome : '' }}</option>
                    @endforeach
                @endif
            </select>
          </div>
          <div class="mb-3">
            <label for="recipient-cescricao" class="col-form-label">Descrição:</label>
            <input type="text" class="form-control" id="recipient-cescricao" name="descricao" maxlength="26" placeholder="26 caracteres" value="{{ !is_null($lancamento->descricao) ? $lancamento->descricao : '' }}" required>
          </div>
      </div>
        <div class="modal-footer {{ isset($lancamento->tipo) && $lancamento->tipo == 'Receita' ? 'bg-success' : 'bg-danger' }}">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </form>
      </div>
    </div>
</div>