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
                <form id="form_atividade" name="form_atividade">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label text-md-right">{{ __('Nome') }}</label>
                        <div class="col-sm-10">
                            <input id="name" type="text" class="form-control" name="name" maxlength="80" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="local" class="col-sm-2 col-form-label text-md-right">{{ __('Local') }}</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="local" name="local" disabled>
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
                                name="total_espectadores" disabled>

                        </div>

                        <div class="col-sm-9 pl-0 num-col-sm-9">
                            <input id="outros_espectadores" type="text" class="form-control" name="outros_espectadores"
                                placeholder="Sem outros possíveis espectadores" maxlength="80" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="turmas" class="col-sm-2 col-form-label text-md-right">{{ __('Turmas') }}</label>
                        <div class="col-sm-10">
                            <input id="turmas" type="text" class="form-control" name="turmas" placeholder="Sem turmas"
                                maxlength="80" disabled>
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
                                placeholder="0" disabled>
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
                        <button type="button" class="btn calendar-delete-atividade" data-dismiss="modal">Apagar</button>
                        <button type="button" class="btn calendar-edit-atividade" data-dismiss="modal">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>