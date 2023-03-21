<main>
    <section>
        <a href="index.php">
        <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="display-6 mt-3"><?= TITLE ?></h2>
    <form method="post" >
    <h4 class=" mt-3 mb-3">Preencha as informações do Cliente</h4>
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="client" id="nome_cliente" required  onclick="checkChar()"/>
            </div>
            <div class="form-group">
                <label>Data de Nascimento</label>
                <input type="date" class="form-control" name="birth_date" id="data_nascimento_cliente" required />
            </div>
            <div class="form-group">
                <label>CPF</label>
                <input type="text" class="form-control" name="register_person" id="cpf_cliente" onclick="TestaCPF()" required />
            </div>
            <div class="form-group">
                <label>Celular</label>
                <input type="tel" class="form-control" name="cellphone" id="telefone_cliente" required  />
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" name="email" id="email_cliente" required  />
            </div>
            <div class="form-group">
                <label>Observação</label>
                <textarea name="description" class="form-control" cols="30" rows="10" id="observacao_cliente" maxlength="300"></textarea>
            </div>
        <h4 class=" mt-3 mb-3">Preencha as informações Endereço</h4>
            <div class="form-group">
                <label>Cidade</label>
                <input type="text" class="form-control" name="city" id="cidade_cliente" required  />
                <label>Bairro</label>
                <input type="text" class="form-control" name="neighboorhood" id="bairro_cliente" required  />
                <label>Rua</label>
                <input type="text" class="form-control" name="street" id="rua_cliente" required   />
                <label>Numero</label>
                <input type="text" class="form-control" name="number" id="numero_cliente" required  />
                <label>Complemento</label>
                <input type="tet" class="form-control" name="complement" id="complemento_cliente" required />
            </div>
        <!-- nÃ£o pode submiter o formulario utilizar o ajax para enviar as informaÃ§Ãµes para uma pÃ¡gina php para tratar os dados no servidor -->
        <div class="form-group mt-3 mb-3">
            <input type="submit"  id="form_client" class="btn btn-success"/>
        </div>
    </form>
</main>