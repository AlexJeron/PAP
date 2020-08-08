<div class="modal fade" id="masterAtividadeModal" tabindex="-1" role="dialog" aria-labelledby="masterAtividadeModal"
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
                <form id="form" name="form">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label text-md-right">{{ __('Nome') }}<span
                                class="red" style="margin-right: -0.5rem">*</span></label>
                        <div class="col-sm-10">
                            <input id="name" type="text" class="form-control" name="name"
                                placeholder="Descreva a atividade" maxlength="80" required disabled>

                            <div class="invalid-feedback" id="invalid_name" style="display: none">O campo 'nome' é
                                obrigatório!</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="local" class="col-sm-2 col-form-label text-md-right">{{ __('Local') }}<span
                                class="red" style="margin-right: -0.5rem">*</span></label>
                        <div class="col-sm-10" id="div_local">

                            <select class="form-control selectpicker" id="local_select" name="local_select"
                                data-live-search="true" title="Selecione um local" disabled>
                                @foreach ($locais as $local)
                                <option value="{{ $local->id }}">{{ $local->nome }}</option>
                                @endforeach
                            </select>

                            <input id="local_input" name="local_input" type="hidden" class="form-control" disabled>

                            <div class="invalid-feedback" id="invalid_local" style="display: none">O campo 'local' é
                                obrigatório!</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inicio" class="col-sm-2 col-form-label text-md-right">{{ __('Início') }}<span
                                class="red" style="margin-right: -0.5rem">*</span></label>

                        <div class="col-sm-5 pr-0" style="max-width:37.7%">
                            <input id="inicio" type="datetime-local" class="form-control" name="inicio" disabled>
                        </div>

                        <label for="fim" class="col-sm-1 col-form-label text-md-right pl-0 pr-0"
                            style="margin-left: -0.4rem; max-width: 4%">{{ __('Fim') }}</label>

                        <div class="col-sm-5 mr-0" style="max-width:40.2%">
                            <input id="fim" type="datetime-local" class="form-control" name="fim" disabled>
                        </div>
                    </div>

                    <div class="form-group row mt-n3">
                        <div class="col-sm-2" style="display: block;"></div>
                        <div class="col-sm-5 invalid-feedback" id="invalid_start" style="display: none;">O campo
                            'início' é obrigatório!
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total_espectadores"
                            class="col-sm-2 col-form-label text-md-right">{{ __('Espectadores') }}<span class="red"
                                style="margin-right: -0.5rem">*</span></label>

                        <div class="col-sm-1 num-col-sm-1">
                            <input id="total_espectadores" type="number" min="1" class="form-control"
                                name="total_espectadores" placeholder="Total" disabled>
                        </div>
                        <div class="col-sm-9 pl-0 num-col-sm-9">
                            <input id="outros_espectadores" type="text" class="form-control" name="outros_espectadores"
                                placeholder="Tipo de espectadores (ex: Alunos) [Campo Opcional]" style="width:94%"
                                maxlength="80" disabled>
                        </div>
                    </div>

                    <div class="form-group row mt-n3">
                        <div class="col-sm-2" style="display: block;"></div>
                        <div class="col-sm-5 invalid-feedback" id="invalid_total" style="display: none;">O campo
                            'total' é obrigatório!
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
                                placeholder="Sem observações" style="width:95.3%; border-bottom: 1px solid #c1c2cc4d"
                                disabled></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" id="close_atividade" class="btn" data-dismiss="modal">Fechar</button>
                        <button type="button" id="cancel_atividade" class="btn">Cancelar</button>
                        <button type="button" id="delete_atividade" class="btn btn-danger"
                            onclick="deleteButtonClick()">
                            Apagar
                        </button>
                        <button type="button" id="edit_atividade" class="btn btn-warning"
                            onclick="changeModalToEditMode()">
                            Editar
                        </button>
                        <button type="submit" id="save_atividade" class="btn btn-primary save-event"
                            onclick="refetchCalendar()">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>