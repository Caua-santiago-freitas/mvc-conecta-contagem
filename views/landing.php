<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Sistema MVC</title>

    <!-- Bootstrap -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">


    <!-- =========================================
         CABEÇALHO DA LANDING PAGE
    ========================================== -->

    <header>

        <nav class="navbar navbar-dark bg-dark py-3">

            <div class="container">

                <!-- Logo / Nome -->
                <a href="index.php?page=landing"
                    class="navbar-brand fw-bold">

                    <i class="bi bi-grid me-2"></i>

                    Sistema MVC

                </a>


                <!-- Login -->
                <a href="index.php?page=login"
                    class="btn btn-outline-light">

                    <i class="bi bi-box-arrow-in-right me-1"></i>

                    Entrar

                </a>

            </div>

        </nav>

    </header>


    <!-- =========================================
         CONTEÚDO PRINCIPAL
    ========================================== -->

    <main>


        <!-- APRESENTAÇÃO -->

        <section class="py-5">

            <div class="container">

                <div class="row align-items-center py-5">


                    <!-- Texto -->

                    <div class="col-lg-6">

                        <span class="badge bg-primary mb-3">
                            Sistema de Gestão
                        </span>

                        <h1 class="display-4 fw-bold">

                            Gerencie seus cadastros
                            de forma simples

                        </h1>

                        <p class="lead text-muted mt-3">

                            Um sistema para gerenciamento de
                            produtos, clientes e funcionários.

                        </p>

                        <p class="text-muted">

                            Desenvolvido com PHP, MVC, Bootstrap,
                            JavaScript, jQuery e validação de dados.

                        </p>


                        <!-- Botões -->

                        <div class="mt-4">

                            <a href="index.php?page=login"
                                class="btn btn-primary btn-lg">

                                <i class="bi bi-box-arrow-in-right me-2"></i>

                                Acessar o sistema

                            </a>

                        </div>

                    </div>


                    <!-- Card visual -->

                    <div class="col-lg-6 mt-5 mt-lg-0">

                        <div class="card border-0 shadow-lg">

                            <div class="card-body p-5">

                                <div class="text-center mb-4">

                                    <i class="bi bi-speedometer2 display-1 text-primary"></i>

                                    <h3 class="mt-3">
                                        Sistema de Cadastros
                                    </h3>

                                    <p class="text-muted">

                                        Organize as principais
                                        informações em um único lugar.

                                    </p>

                                </div>


                                <div class="row text-center">

                                    <!-- Produto -->

                                    <div class="col-4">

                                        <i class="bi bi-box-seam fs-2 text-primary"></i>

                                        <p class="mt-2 mb-0">
                                            Produtos
                                        </p>

                                    </div>


                                    <!-- Cliente -->

                                    <div class="col-4">

                                        <i class="bi bi-people fs-2 text-primary"></i>

                                        <p class="mt-2 mb-0">
                                            Clientes
                                        </p>

                                    </div>


                                    <!-- Funcionário -->

                                    <div class="col-4">

                                        <i class="bi bi-person-badge fs-2 text-primary"></i>

                                        <p class="mt-2 mb-0">
                                            Funcionários
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- =========================================
             RECURSOS
        ========================================== -->

        <section class="bg-white py-5">

            <div class="container">

                <div class="text-center mb-5">

                    <h2>
                        Recursos do sistema
                    </h2>

                    <p class="text-muted">

                        Funcionalidades disponíveis
                        na área administrativa.

                    </p>

                </div>


                <div class="row g-4">


                    <!-- Produtos -->

                    <div class="col-md-4">

                        <div class="card h-100 border-0 shadow-sm">

                            <div class="card-body text-center p-4">

                                <i class="bi bi-box-seam fs-1 text-primary"></i>

                                <h5 class="mt-3">
                                    Produtos
                                </h5>

                                <p class="text-muted">

                                    Cadastre e gerencie
                                    os produtos do sistema.

                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- Clientes -->

                    <div class="col-md-4">

                        <div class="card h-100 border-0 shadow-sm">

                            <div class="card-body text-center p-4">

                                <i class="bi bi-people fs-1 text-primary"></i>

                                <h5 class="mt-3">
                                    Clientes
                                </h5>

                                <p class="text-muted">

                                    Organize os dados dos
                                    clientes cadastrados.

                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- Funcionários -->

                    <div class="col-md-4">

                        <div class="card h-100 border-0 shadow-sm">

                            <div class="card-body text-center p-4">

                                <i class="bi bi-person-badge fs-1 text-primary"></i>

                                <h5 class="mt-3">
                                    Funcionários
                                </h5>

                                <p class="text-muted">

                                    Gerencie os funcionários
                                    cadastrados no sistema.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- =========================================
             CHAMADA PARA LOGIN
        ========================================== -->

        <section class="py-5">

            <div class="container">

                <div class="card bg-primary text-white border-0">

                    <div class="card-body text-center p-5">

                        <h2>
                            Pronto para acessar?
                        </h2>

                        <p class="mb-4">

                            Entre na área administrativa
                            para acessar os cadastros.

                        </p>

                        <a href="index.php?page=login"
                            class="btn btn-light btn-lg">

                            <i class="bi bi-lock me-2"></i>

                            Entrar no sistema

                        </a>

                    </div>

                </div>

            </div>

        </section>


    </main>


    <!-- =========================================
         RODAPÉ DA LANDING PAGE
    ========================================== -->

    <footer class="bg-dark text-white py-4">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6 text-center text-md-start">

                    <strong>
                        Sistema MVC
                    </strong>

                    <p class="text-white-50 mb-0">

                        Sistema de gerenciamento de cadastros.

                    </p>

                </div>


                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">

                    <span class="text-white-50">

                        Projeto desenvolvido com PHP e Bootstrap

                    </span>

                </div>

            </div>

        </div>

    </footer>


    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>