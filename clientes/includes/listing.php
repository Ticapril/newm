<main>
    <section>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#completeModal">Adicionar novo Cliente</button>
    </section>
    <!-- busca -->
    <div class="form-group mt-3">
        <div class="input-group">
            <span class="input-group-text">Buscar por Nome</span>
            <input type="text" name="buscar_nome" id="buscar_nome" placeholder="Digite o nome" class="form-control"/>
        </div>
        <div class="input-group mt-3">
            <span class="input-group-text">Buscar por Email</span>
            <input type="text" name="buscar_email" id="buscar_email" placeholder="Digite o email" class="form-control"/>
        </div>
    </div>
    <!-- tabela clientes -->
    <section>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Celular</th>
                    <th>E-mail</th>
                    <th>Observacao</th>
                    <th>acoes</th>
                </tr>
            </thead>
            <tbody id="displayDataTable">
                
            </tbody>
        </table>
    </section>
</main>
 <!-- modal Create -->
<div class="modal" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Criar Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <h4>Informacao Cliente</h4>
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="client" id="nome_modal" required  onclick="checkChar()"   />
                        </div>
                        <div class="form-group">
                            <label>Data de Nascimento</label>
                            <input type="date" class="form-control" name="birth_date" id="data_nascimento_modal" required  />
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" class="form-control" name="register_person" id="cpf_modal" onclick="TestaCPF()" required  />
                        </div>
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="tel" class="form-control" name="cellphone" id="telefone_modal" required  />
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" name="email" id="email_modal" required />
                        </div>
                        <div class="form-group">
                            <label>Observacao</label>
                            <textarea name="description" class="form-control" cols="30" rows="10" id="observacao_modal" maxlength="300"></textarea>
                        </div>
                        <h4 class=" mt-3 mb-3">Informacoes Endereco </h4>
                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="text" class="form-control" name="city"  id="cidade_modal" required  />
                            <label>Bairro</label>
                            <input type="text" class="form-control" name="neighboorhood" id="bairro_modal" required  />
                            <label>Rua</label>
                            <input type="text" class="form-control" name="street" id="rua_modal" required   />
                            <label>Numero</label>
                            <input type="text" class="form-control" name="number" id="numero_modal" required   />
                            <label>Complemento</label>
                            <input type="text" class="form-control" name="complement" id="complemento_modal" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit"  onclick="addClient()" class="btn btn-success"/>
                    <!-- <input type="submit"  id="btn-create" class="btn btn-success"/> -->
                </div>
            </div>
        </div>
</div>
<!-- Modal Update -->
<div class="modal" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <h4>Informacoes Cliente</h4>
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="client" id="nome_modal_edit"  required  onclick="checkChar()"/>
                        </div>
                        <div class="form-group">
                            <label>Data de Nascimento</label>
                            <input type="date" class="form-control" name="birth_date" id="data_nascimento_modal_edit" required  />
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" class="form-control" name="register_person" id="cpf_modal_edit" onclick="TestaCPF()" required  />
                        </div>
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="tel" class="form-control" name="cellphone" id="telefone_modal_edit" required  />
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" name="email" id="email_modal_edit" required />
                        </div>
                        <div class="form-group">
                            <label>Observacao</label>
                            <textarea name="description" class="form-control" cols="30" rows="10" id="observacao_modal_edit" maxlength="300"></textarea>
                        </div>
                        <h4 class=" mt-3 mb-3">Informacao Endereco </h4>
                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="text" class="form-control" name="city"  id="cidade_modal_edit" required  />
                            <label>Bairro</label>
                            <input type="text" class="form-control" name="neighboorhood" id="bairro_modal_edit" required  />
                            <label>Rua</label>
                            <input type="text" class="form-control" name="street" id="rua_modal_edit" required   />
                            <label>Numero</label>
                            <input type="text" class="form-control" name="number" id="numero_modal_edit" required   />
                            <label>Complemento</label>
                            <input type="text" class="form-control" name="complement" id="complemento_modal_edit" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-success" value="Editar" onclick="updateDetails()"/>
                    <input type="hidden" id="hiddendata">
                 <!-- <input type="submit"  id="btn-create" class="btn btn-success"/> -->
                </div>
            </div>
        </div>
</div>
