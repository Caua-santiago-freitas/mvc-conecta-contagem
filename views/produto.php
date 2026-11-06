<!-- CSS da página -->
<link rel="stylesheet" href="assets/css/produto.css">

<section>

    <div class="col-md-6 mx-auto mt-5">

        <h2>Cadastro de produtos</h2>

        <!-- Formulário -->
        <form id="formProduto">

            <!-- Nome -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-box"></i></span>
                    <input type="text" id="nome" name="nome" class="form-control">
                    <div class="invalid-feedback"></div>
                    <div class="valid-feedback"></div>
                </div>

            </div>

            <!-- Categoria -->
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-tags"></i></span>
                    <input type="text" id="categoria" name="categoria" class="form-control">
                    <div class="invalid-feedback"></div>
                    <div class="valid-feedback"></div>
                </div>

            </div>

            <!-- Preço -->
            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <div class="input-group">
                    <span class="input-group-text">R$</span>
                    <input type="text" id="preco" name="preco" class="form-control">
                    <div class="invalid-feedback"></div>
                    <div class="valid-feedback"></div>
                </div>

            </div>

            <!-- Quantidade -->
            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-123"></i></span>
                    <input type="text" id="quantidade" name="quantidade" class="form-control">
                    <div class="invalid-feedback"></div>
                    <div class="valid-feedback"></div>
                </div>

            </div>

            <!-- Botão -->
            <button type="submit" class="btn btn-primary w-100">Cadastrar</button>

        </form>

        <!-- Mensagem de retorno -->
        <div id="mensagem" class="alert d-none mt-3"></div>
    </div>

</section>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- jQuery Validation -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<!-- jQuery Mask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<!-- Script da página -->
<script src="assets/js/produto.js"></script>