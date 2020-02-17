<div class="modal fade" id="editAtividadeModal" tabindex="-1" role="dialog" aria-labelledby="editAtividadeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="/atividades/{{ $atividade->id }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editAtividadeModalLabel">Editar Atividade</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="{{ $atividade->id }}">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label text-md-right">{{ __('Atividade') }}<span
                                class="red" style="margin-right: -0.5rem">*</span></label>
                        <div class="col-sm-10">
                            <input id="name" type="text" class="form-control @error('nome') is-invalid @enderror"
                                name="nome" maxlength="80" autofocus required>

                            @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="local_id" class="col-sm-2 col-form-label text-md-right">{{ __('Local') }}<span
                                class="red" style="margin-right: -0.5rem">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" id="local_id" name="local_id"
                                data-live-search="true">
                                @foreach ($local as $local)
                                <option value="{{ $local->id }}">{{ $local->nome }}</option>
                                @endforeach
                            </select>

                            @error('local_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inicio" class="col-sm-2 col-form-label text-md-right">{{ __('Início') }}<span
                                class="red" style="margin-right: -0.5rem">*</span></label>

                        <div class="col-sm-10">
                            <input id="inicio" type="datetime-local"
                                class="form-control @error('inicio') is-invalid @enderror" name="inicio" required>

                            @error('inicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fim" class="col-sm-2 col-form-label text-md-right">{{ __('Fim') }}<span class="red"
                                style="visibility: hidden; margin-right: -0.5rem">*</span></label>

                        <div class="col-sm-10">
                            <input id="fim" type="datetime-local"
                                class="form-control @error('fim') is-invalid @enderror" name="fim">

                            @error('fim')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total_espectadores"
                            class="col-sm-2 col-form-label text-md-right">{{ __('Espectadores') }}<span class="red"
                                style="margin-right: -0.5rem">*</span></label>

                        <div class="col-sm-2" style="margin-right: -0.3rem">
                            <input id="total_espectadores" type="number" min="1"
                                class="form-control @error('total_espectadores') is-invalid @enderror"
                                name="total_espectadores" value="{{ old('total_espectadores') }}" required>

                            @error('total_espectadores')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-sm-8 pl-0">
                            <input id="outros_espectadores" type="text"
                                class="form-control @error('outros_espectadores') is-invalid @enderror"
                                name="outros_espectadores" value="{{ old('outros_espectadores') }}"
                                placeholder="Sem outros possíveis espectadores" maxlength="80">

                            @error('outros_espectadores')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="turmas" class="col-sm-2 col-form-label text-md-right">{{ __('Turmas') }}<span
                                class="red" style="visibility: hidden; margin-right: -0.5rem">*</span></label>
                        <div class="col-sm-9 mr-0 pr-0">
                            <select class="form-control selectpicker" id="turmas" name="turmas[]" multiple
                                data-live-search="true">
                                @foreach ($turma as $turma)
                                <option value="{{ $turma->id }}"> {{ $turma->nome }}</option>
                                @endforeach
                            </select>

                            @error('turmas')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-sm-1 text-center pl-0 pr-2 pt-1 mr-n1" style="margin-left:-1.6rem">
                            <button type="button" id="clearEditSelectTurmas" class="eraser">
                                <i class="fas fa-eraser"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="professor_id"
                            class="col-sm-2 col-form-label text-md-right">{{ __('Professores') }}<span class="red"
                                style="visibility: hidden; margin-right: -0.5rem">*</span></label>
                        <div class="col-sm-9 mr-0 pr-0">
                            <select class="form-control selectpicker" id="professor_id" name="professor_id[]" multiple
                                data-live-search="true">
                                @foreach ($professor as $professor)
                                <option value="{{ $professor->id }}"> {{ $professor->nome }}</option>
                                @endforeach
                            </select>

                            @error('professor_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-sm-1 text-center pl-0 pr-2 pt-1 mr-n1" style="margin-left:-1.6rem">
                            <button type="button" id="clearEditSelectProfessores" class="eraser">
                                <i class="fas fa-eraser"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="recurso_id" class="col-sm-2 col-form-label text-md-right">{{ __('Recursos') }}<span
                                style="margin-right: -0.5rem"></span></label>
                        <div class="col-sm-2">
                            <input id="num_recursos" type="number" min="1"
                                class="form-control num_recursos @error('num_recursos') is-invalid @enderror"
                                name="num_recursos" value="{{ old('num_recursos') }}" placeholder="Total">

                            @error('num_recursos')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-sm-7 pl-0 pr-0" style="margin-left:-0.3rem">
                            <select class="form-control selectpicker" id="recurso_id" name="recurso_id"
                                data-live-search="true">
                                @foreach ($recurso as $recurso)
                                <option value="{{ $recurso->id }}">{{ $recurso->nome }}</option>
                                @endforeach
                            </select>

                            @error('recurso_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-sm-1 text-center pl-0 pr-2 pt-1 mr-n1" style="margin-left:-1.3rem">
                            <button type="button" id="clearEditSelectRecursos" class="eraser">
                                <i class="fas fa-eraser"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="observacao"
                            class="col-sm-2 col-form-label text-md-right">{{ __('Observações') }}<span class="red"
                                style="visibility: hidden; margin-right: -0.5rem">*</span></label>

                        <div class="col-sm-10">
                            <textarea id="observacao" class="form-control @error('observacao') is-invalid @enderror"
                                name="observacao" rows="1"
                                placeholder="Sem observações">{{ old('observacao') }}</textarea>

                            @error('observacao')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="user_name" class="col-sm-2 col-form-label text-md-right">{{ __('Criada por') }}<span
                                class="red" style="visibility: hidden; margin-right: -0.5rem">*</span></label>

                        <div class="col-sm-10">
                            <input id="user_name" type="text"
                                class="form-control @error('user_name') is-invalid @enderror" name="user_name"
                                style="border:none" required disabled>

                            @error('user_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Editar') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
