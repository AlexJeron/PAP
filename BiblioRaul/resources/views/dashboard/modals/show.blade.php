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
                                placeholder="Sem outros possíveis espectadores" style="width:94%" maxlength="80"
                                disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="turmas" class="col-sm-2 col-form-label text-md-right">{{ __('Turmas') }}</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" id="turmas_select" name="turmas_select[]"
                                title="Selecione uma ou mais turmas" multiple data-live-search="true">
                                @foreach ($turmas as $turma)
                                <option value="{{ $turma->id }}"> {{ $turma->nome }}</option>
                                @endforeach
                            </select>

                            @error('turmas_select')
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
                            <select class="form-control selectpicker" id="professores_select"
                                name="professores_select[]" title="Selecione um ou mais professores" multiple
                                data-live-search="true">
                                @foreach ($professores as $professor)
                                <option value="{{ $professor->id }}"> {{ $professor->nome }}</option>
                                @endforeach
                            </select>

                            @error('professores_select')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <input id="professores_input" name="professores_input" type="hidden" class="form-control"
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

                        <div class="col-sm-9 pl-0 num-col-sm-9" style="padding-right: 1.1rem;">
                            <select class="form-control selectpicker" id="recurso_select" name="recurso_select"
                                title="Selecione um recurso" data-live-search="true">
                                @foreach ($recursos as $recurso)
                                <option value="{{ $recurso->id }}"> {{ $recurso->nome }}</option>
                                @endforeach
                            </select>

                            @error('recurso_select')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <input id="recurso_input" name="recurso_input" type="hidden" class="form-control"
                                placeholder="Nenhum recurso" maxlength="80" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="observacao"
                            class="col-sm-2 col-form-label text-md-right">{{ __('Observações') }}</label>

                        <div class="col-sm-10">
                            <textarea id="observacao" name="observacao" class="form-control" rows="2"
                                placeholder="Sem observações" style="width:95.3%" disabled></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" id="close_atividade" class="btn" data-dismiss="modal">Fechar</button>
                        <button type="button" id="cancel_atividade" class="btn">Cancelar</button>
                        <button type="button" id="delete_atividade" class="btn btn-danger"
                            onclick="deleteButtonClick()">
                            <svg aria-hidden="true" viewBox="0 0 448 512" width="16" height="16">
                                <path fill="currentColor"
                                    d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z">
                                </path>
                            </svg>
                            Apagar
                        </button>
                        <button type="button" id="edit_atividade" class="btn btn-warning"
                            onclick="changeModalToEditMode()">
                            <svg aria-hidden="true" viewBox="0 0 576 512" width="17" height="17">
                                <path fill="currentColor"
                                    d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z">
                                </path>
                            </svg>
                            Editar
                        </button>
                        <button type="button" id="save_atividade" class="btn btn-primary save-event">
                            <svg aria-hidden="true" viewBox="0 0 448 512" width="17" height="17">
                                <path fill="currentColor"
                                    d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z">
                                </path>
                            </svg>
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>