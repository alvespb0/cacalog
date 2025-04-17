<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Produtos</title>   
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">     
        <style>
            /* Navbar com gradiente em tons escuros */
            .navbar {
                background: linear-gradient(135deg, #1c2e4b, #0a1d37); /* Azul escuro para sério e sofisticado */
                border-bottom: 3px solid #ff8a00; /* Laranja suave para dar contraste */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra suave para dar profundidade */
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 1030; /* Para garantir que a navbar fique sempre no topo */
            }

            /* Ajustando o espaço de conteúdo para a navbar fixa */
            body {
                margin-top: 0;
                background-color: #f0f0f0; /* Cinza claro */
                font-family: 'Arial', sans-serif;
                padding-top: 70px; /* Espaço para a navbar fixa */
                min-height: 100vh; /* Garantir que o corpo ocupe pelo menos 100% da altura da tela */
                display: flex;
                flex-direction: column;
            }

            html {
                height: 100%;
            }

            /* Estilo do link da navbar e a marca */
            .navbar-brand, .nav-link {
                color: white !important;
                font-weight: 600;
                transition: color 0.3s ease, transform 0.3s ease;
            }

            /* Hover nos links da navbar */
            .navbar-brand:hover, .nav-link:hover {
                color: #ff8a00 !important; /* Laranja suave no hover */
                transform: scale(1.05); /* Zoom suave */
            }



            /* Hover nos itens da navbar (para um efeito sutil) */
            .nav-item:hover {
                background-color: rgba(255, 138, 0, 0.1); /* Laranja suave no fundo do hover */
                border-radius: 25px; /* Borda arredondada para suavizar */
                transition: background-color 0.3s ease;
            }

            /* Estilo do menu collapsable (ícone de menu para dispositivos móveis) */
            .navbar-toggler-icon {
                background-color: #ff8a00; /* Laranja suave para o ícone */
            }

            /* Estilo do menu dropdown */
            .navbar-nav .dropdown-menu {
                background-color: #1c2e4b; /* Azul escuro para o dropdown */
                border: none;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
            }

            .navbar-nav .dropdown-item {
                color: white;
                transition: background-color 0.3s ease;
            }

            .navbar-nav .dropdown-item:hover {
                background-color: #ff8a00; /* Laranja suave no hover do dropdown */
                color: white;
            }

            /* Seção de conteúdo */
            .container {
                transition: background-color 0.3s ease;
                flex-grow: 1; /* Faz com que o conteúdo ocupe o espaço restante disponível */
            }

            /* Rodapé */
            footer {
                background-color: #1c2e4b; /* Azul escuro para o rodapé */
                color: white;
                text-align: center;
                padding: 20px;
                position: relative;
                bottom: 0;
                width: 100%;
            }

            footer a {
                color: #ff8a00;
                text-decoration: none;
            }

            footer a:hover {
                color: #f4f4f4; /* Cor mais clara para o hover */
                text-decoration: underline;
            }

        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">&nbsp;&nbsp;Caça Log</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Dropdown HOME -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="homeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cliente
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="homeDropdown">
                            <li><a class="dropdown-item" href="/cliente/cadastroCliente">Cadastro de Cliente</a></li>
                            <li><a class="dropdown-item" href="/cliente">Lista de Clientes</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown Features -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="featuresDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Estado
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="featuresDropdown">
                            <li><a class="dropdown-item" href="/estado/cadastroEstado">Cadastro Estado</a></li>
                            <li><a class="dropdown-item" href="/estado">Lista de Estados</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown Pricing -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pricingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Motoboy
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="pricingDropdown">
                            <li><a class="dropdown-item" href="/motoboy/cadastroMotoboy">Cadastro Motoboy</a></li>
                            <li><a class="dropdown-item" href="/motoboy">Lista de Motoboys</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pricingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Plano Delivery
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="pricingDropdown">
                            <li><a class="dropdown-item" href="/planoDelivery/cadastrar">Cadastro Plano Delivery</a></li>
                            <li><a class="dropdown-item" href="/planoDelivery">Lista de Planos</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    @yield('conteudo')
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>

        <!-- Rodapé -->
        <footer>
            <p>&copy; 2025 Logística - Todos os direitos reservados. <a href="#">Política de Privacidade</a> | <a href="#">Termos de Serviço</a></p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
