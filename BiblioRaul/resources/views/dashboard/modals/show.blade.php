<div class="modal fade" id="showAtividadeModal" tabindex="-1" role="dialog" aria-labelledby="showAtividadeModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_atividade" name="form_atividade">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label text-md-right">{{ __('Nome') }}</label>
                        <div class="col-sm-10">
                            <input id="name" type="text" class="form-control" name="name"
                                placeholder="Descreva a atividade" maxlength="80" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="local" class="col-sm-2 col-form-label text-md-right">{{ __('Local') }}</label>
                        <div class="col-sm-10" id="div_local">
                            <select class="form-control selectpicker" id="local_select" name="local_select"
                                data-live-search="true" title="Selecione um local" disabled>
                                @foreach ($locais as $local)
                                <option value="{{ $local->id }}">{{ $local->nome }}</option>
                                @endforeach
                            </select>

                            @error('new_local_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <input id="local_input" name="local_input" type="hidden" class="form-control" disabled>
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

                        <div class="col-sm-1 num-col-sm-1">
                            <input id="total_espectadores" type="number" min="1" class="form-control"
                                name="total_espectadores" placeholder="Total" disabled>

                        </div>

                        <div class="col-sm-9 pl-0 num-col-sm-9">
                            <input id="outros_espectadores" type="text" class="form-control" name="outros_espectadores"
                                placeholder="Sem outros possíveis espectadores" maxlength="80" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="turmas" class="col-sm-2 col-form-label text-md-right">{{ __('Turmas') }}</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" id="new_turmas" name="new_turmas[]"
                                title="Selecione uma ou mais turmas" multiple data-live-search="true">
                                @foreach ($turmas as $turma)
                                <option value="{{ $turma->id }}"> {{ $turma->nome }}</option>
                                @endforeach
                            </select>

                            @error('new_turmas')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <input id="turmas_input" name="turmas_input" type="hidden" class="form-control"
                                placeholder="Sem turmas" maxlength="80" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="professores"
                            class="col-sm-2 col-form-label text-md-right">{{ __('Professores') }}</label>
                        <div class="col-sm-10">
                            <input id="professores" type="text" class="form-control" name="professores"
                                placeholder="Sem professores" maxlength="80" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total_recursos"
                            class="col-sm-2 col-form-label text-md-right">{{ __('Recursos') }}</label>
                        <div class="col-sm-1 num-col-sm-1">
                            <input id="total_recursos" type="number" min="1" class="form-control" name="total_recursos"
                                placeholder="Total" disabled>
                        </div>

                        <div class="col-sm-9 pl-0 num-col-sm-9">
                            <input id="nome_recurso" type="text" class="form-control" name="nome_recurso"
                                placeholder="Nenhum recurso" maxlength="80" disabled>
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

                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Fechar</button>
                        <button type="button" id="delete_atividade" class="btn btn-danger">
                            <svg aria-hidden="true" viewBox="0 0 448 512" width="16" height="16">
                                <path fill="currentColor"
                                    d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z">
                                </path>
                            </svg>
                            Apagar
                        </button>
                        <button type="button" id="edit_atividade" class="btn btn-warning">
                            <svg aria-hidden="true" viewBox="0 0 576 512" width="17" height="17">
                                <path fill="currentColor"
                                    d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z">
                                </path>
                            </svg>
                            Editar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>