<div class="modal fade" id="showAtividadeModal" tabindex="-1" role="dialog" aria-labelledby="showAtividadeModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="showAtividadeModal">Consultar Atividade</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">{{ __('Atividade') }}</label>
                    <div class="col-sm-10">
                        <input id="name" type="text" class="form-control form-show" name="nome" maxlength="80" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="local_nome" class="col-sm-2 col-form-label text-md-right">{{ __('Local') }}</label>
                    <div class="col-sm-10">
                        <input class="form-control form-show" id="local_nome" name="local_nome" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inicio" class="col-sm-2 col-form-label text-md-right">{{ __('Início') }}</label>

                    <div class="col-sm-5 pr-0" style="max-width:38.1%">
                        <input id="inicio" name="inicio" type="datetime-local"
                            class="form-control form-show @error('inicio') is-invalid @enderror" disabled>
                    </div>

                    <label for="fim" class="col-sm-1 col-form-label text-md-right pl-0 pr-0"
                        style="margin-left: -0.4rem; max-width: 4%">{{ __('Fim') }}</label>

                    <div class="col-sm-5 mr-0" style="max-width:40.2%">
                        <input id="fim" name="fim" type="datetime-local"
                            class="form-control form-show @error('fim') is-invalid @enderror" disabled>
                    </div>
                </div>

                <div class="form-group row mt-n3">
                    <div class="col-sm-2" style="display: block;"></div>
                    @error('inicio')
                    <div class="col-sm-5 invalid-feedback" id="invalid_start" style="display: none;">{{ $message }}
                    </div>
                    @enderror

                    <div class="col-sm-2" style="display: block;"></div>
                    @error('fim')
                    <div class="col-sm-5 invalid-feedback" id="invalid_end" style="display: none;">{{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="total_espectadores"
                        class="col-sm-2 col-form-label text-md-right">{{ __('Espectadores') }}</label>

                    <div class="col-sm-1">
                        <input id="total_espectadores" type="number" min="1" class="form-control form-show"
                            name="total_espectadores" disabled>

                    </div>

                    <div class="col-sm-9 pl-0">
                        <input id="outros_espectadores" type="text" class="form-control form-show"
                            name="outros_espectadores" placeholder="Sem outros possíveis espectadores" maxlength="80"
                            disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="show_turmas" class="col-sm-2 col-form-label text-md-right">{{ __('Turmas') }}</label>
                    <div class="col-sm-10">
                        <input id="show_turmas" type="text" class="form-control form-show" name="show_turmas"
                            placeholder="Sem turmas" maxlength="80" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="show_professor_id"
                        class="col-sm-2 col-form-label text-md-right">{{ __('Professores') }}</label>
                    <div class="col-sm-10">
                        <input id="show_professor_id" type="text" class="form-control form-show"
                            name="show_professor_id" placeholder="Sem professores" maxlength="80" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="num_recursos" class="col-sm-2 col-form-label text-md-right">{{ __('Recursos') }}</label>
                    <div class="col-sm-1">
                        <input id="num_recursos" type="number" min="1" class="form-control form-show"
                            name="num_recursos" placeholder="0" disabled>
                    </div>

                    <div class=" col-sm-9 pl-0">
                        <input id="recurso_nome" type="text" class="form-control form-show" name="recurso_nome"
                            placeholder="Nenhum recurso" maxlength="80" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="show_observacao"
                        class="col-sm-2 col-form-label text-md-right">{{ __('Observações') }}</label>

                    <div class="col-sm-10">
                        <textarea id="show_observacao" class="form-control" name="show_observacao" rows="2"
                            placeholder="Sem observações" disabled></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="user_name" class="col-sm-2 col-form-label text-md-right">{{ __('Criada por') }}</label>

                    <div class="col-sm-10">
                        <input id="user_name" type="text" class="form-control form-show" name="user_name" disabled>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>