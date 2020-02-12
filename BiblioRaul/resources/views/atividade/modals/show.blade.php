<div class="modal fade" id="showAtividadeModal" tabindex="-1" role="dialog" aria-labelledby="showAtividadeModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showAtividadeModal">Consultar Atividade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id" value="{{ $atividade->id }}">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">{{ __('Atividade') }}</label>
                    <div class="col-sm-10">
                        <input id="name" type="text" class="form-control @error('nome') is-invalid @enderror"
                            name="nome" maxlength="80" disabled>

                        @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <div class="form-group row">
                    <label for="local_nome" class="col-sm-2 col-form-label text-md-right">{{ __('Local') }}</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="local_nome" name="local_nome" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inicio" class="col-sm-2 col-form-label text-md-right">{{ __('Início') }}</label>

                    <div class="col-sm-10">
                        <input id="inicio" type="datetime-local" class="form-control" name="inicio" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fim" class="col-sm-2 col-form-label text-md-right">{{ __('Fim') }}</label>

                    <div class="col-sm-10">
                        <input id="fim" type="datetime-local" class="form-control" name="fim" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="total_espectadores"
                        class="col-sm-2 col-form-label text-md-right">{{ __('Espectadores') }}</label>

                    <div class="col-sm-2">
                        <input id="total_espectadores" type="number" min="1" class="form-control"
                            name="total_espectadores" disabled>

                    </div>

                    <div class="col-sm-8">
                        <input id="outros_espectadores" type="text" class="form-control" name="outros_espectadores"
                            placeholder="Sem outros possíveis espectadores" maxlength="80" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="turmas" class="col-sm-2 col-form-label text-md-right">{{ __('Turmas') }}</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="turmas" name="turmas[]" multiple disabled>
                            @foreach ($turma as $turma)
                            <option value="{{ $turma->id }}"> {{ $turma->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="professor_id"
                        class="col-sm-2 col-form-label text-md-right">{{ __('Professores') }}</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="professor_id" name="professor_id[]" multiple disabled>
                            @foreach ($professor as $professor)
                            <option value="{{ $professor->id }}"> {{ $professor->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="recurso_id" class="col-sm-2 col-form-label text-md-right">{{ __('Recursos') }}</label>
                    <div class="col-sm-2">
                        <input id="num_recursos" type="number" min="1" class="form-control" name="num_recursos"
                            disabled>
                    </div>

                    <div class=" col-sm-8">
                        <select class="form-control selectpicker" id="recurso_id" name="recurso_id" disabled>
                            @foreach ($recurso as $recurso)
                            <option value="{{ $recurso->id }}">{{ $recurso->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="observacao"
                        class="col-sm-2 col-form-label text-md-right">{{ __('Observações') }}</label>

                    <div class="col-sm-10">
                        <textarea id="observacao" class="form-control" name="observacao" rows="1"
                            placeholder="Sem observações" disabled></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="user_name" class="col-sm-2 col-form-label text-md-right">{{ __('Criada por') }}</label>

                    <div class="col-sm-10">
                        <input id="user_name" type="text" class="form-control" name="user_name" disabled>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>
