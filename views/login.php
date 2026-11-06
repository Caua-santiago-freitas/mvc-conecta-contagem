<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Sistema de Cadastros</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS da página -->
    <link rel="stylesheet" href="assets/css/login.css">

</head>


<body class="bg-light">


    <main class="container">

        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-md-6 col-lg-4">


                <!-- Card de Login -->
                <div class="card border-0 shadow">

                    <div class="card-body p-4">


                        <!-- Cabeçalho -->
                        <div class="text-center mb-4">

                            <div class="mb-3">

                                <i class="bi bi-person-circle display-3 text-primary"></i>

                            </div>

                            <h1 class="h3">
                                Acessar o sistema
                            </h1>

                            <p class="text-muted">
                                Informe seus dados de acesso.
                            </p>

                        </div>


                        <!-- Formulário -->
                        <form id="formLogin">


                            <!-- E-mail -->
                            <div class="mb-3">

                                <label for="email" class="form-label">
                                    E-mail
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>

                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="email@email.com">

                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>

                                </div>

                            </div>


                            <!-- Senha -->
                            <div class="mb-3">

                                <label for="senha" class="form-label">
                                    Senha
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>

                                    <input type="password" id="senha" name="senha" class="form-control"
                                        placeholder="Digite sua senha">

                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>

                                </div>

                            </div>


                            <!-- Botão TODO: retornar quando estiver logando--> 
                            <!-- <button
                                type="submit"
                                class="btn btn-primary w-100 mt-2">

                                <i class="bi bi-box-arrow-in-right me-1"></i>

                                Entrar

                            </button> -->

                            <a href="index.php?page=home" class="btn btn-primary w-100">

                                <i class="bi bi-box-arrow-in-right me-1"></i>
                                Entrar

                            </a>


                        </form>


                        <!-- Mensagem do sistema -->
                        <div id="mensagem" class="alert d-none mt-3">
                        </div>


                        <!-- Voltar -->
                        <div class="text-center mt-4">

                            <a href="index.php" class="text-decoration-none">

                                <i class="bi bi-arrow-left me-1"></i>

                                Voltar para página inicial

                            </a>

                        </div>


                    </div>

                </div>


                <!-- Identificação -->
                <p class="text-center text-muted small mt-4">

                    Sistema MVC de Cadastros

                </p>


            </div>

        </div>

    </main>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- jQuery Validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <!-- Helpers -->
    <script src="libs/js/helpers.js"></script>

    <!-- Script da página -->
    <script src="assets/js/login.js"></script>


</body>

</html>