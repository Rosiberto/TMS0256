<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Hotelaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
  <body>
    <!-- Barra de Navegação (Header)-->
    <nav class="navbar d-flex justify-content-evenly border fs-3">
      <a class="nav-link active p-3" href="#">CRM4SH.com</a>          
      <a class="nav-link active p-3" href="#informacoes">Informações</a>        
      <a class="nav-link active p-3" href="#servicos">Serviços</a>
      <a class="nav-link active p-3" href="imoveisFiltro.html">Imóveis Disponíveis</a>                      
        
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-dark dropdown-toggle fs-4" data-bs-toggle="dropdown" aria-expanded="false">
          Login
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item fs-4" href="Login.html">Acessar</a></li>
          <li><a class="dropdown-item fs-4" href="cadastro.html">Cadastrar</a></li>
        </ul>
      </div>

      
    </nav>

    <!-- Filtro Inicial da Home Page -->
      <div class="conteiner-sm pt-3 m-auto" style="width: 80%;">
        <h1 class="">Vai pra onde ?</h1>        
            <div class="d-flex mt-3 align-items-center">
              
              <input class="form-control form-control-lg m-2 fs-4" list="datalistOptions" id="destino_estado" placeholder="Cidade destino">
              <datalist id="datalistOptions">
                <option value="Rio de Janeiro">
                <option value="Acre">
                <option value="São Paulo">
              </datalist>
              
                <p class="mt-3 fs-3">Entrada:</p>
                <input type="date" class="form-control form-control-lg m-2 fs-4" id="Dt_inicial" value="empty">
              
                <p class="mt-3 fs-3">Saída: </p>
                <input type="date" class="form-control form-control-lg m-2 fs-4" id="Dt_final">
              
                
              <input class="form-control form-control-lg m-2 fs-4" id="Capacidade_Pessoa" type="text" placeholder="Quantos quartos">

              <button type="button" class="btn btn-outline-dark m-2 fs-4" onclick=ValidaData()>Procurar</button>
            </div>        
      </div>

    <!-- Area de Serviços -->
      <div class="conteiner-sm pt-3 m-auto" style="width: 80%;">
        <h1 class="mx-auto" id="servicos">Serviços</h1>

            <div class="conteiner-sm d-flex pt-4">

              <a class="" href="#">                
                <div class="card mx-2">
                  <img src="imagens/Pic.TurismoRural.svg" class="card-img" alt="Turismo Rural">
                  <div class="card-img-overlay">
                    <p class="card-title text-center" style="color: white; font-size: 36px; font-weight: bold; background: rgba(0, 0, 0, 0.3); border-radius: 3%;">Turismo Rural</p>                    
                  </div>
                </div>
              </a>

              <a class="" href="#">
                <div class="card mx-2">
                  <img src="imagens/Pic.Camping.svg" class="card-img" alt="Camping">
                  <div class="card-img-overlay">
                    <p class="card-title text-center" style="color: white; font-size: 36px; font-weight: bold; background: rgba(0, 0, 0, 0.3); border-radius: 3%;">Camping</p>                    
                  </div>
                </div>
              </a>

              <a class="" href="#">
                <div class="card mx-2">
                  <img src="imagens/Pic.Hostel.svg" class="card-img" alt="Hostel">
                  <div class="card-img-overlay">
                    <p class="card-title text-center" style="color: white; font-size: 36px; font-weight: bold; background: rgba(0, 0, 0, 0.3); border-radius: 3%;">Hostel</p>                    
                  </div>
                </div>
              </a>

              <a class="" href="#">
                <div class="card mx-2">
                  <img src="imagens/Pic.Hotel.svg" class="card-img" alt="Hoteis">
                  <div class="card-img-overlay">
                    <p class="card-title text-center" style="color: white; font-size: 36px; font-weight: bold; background: rgba(0, 0, 0, 0.3); border-radius: 3%;">Hotéis</p>                    
                  </div>
                </div>
              </a>

              <a class="" href="#">
                <div class="card mx-2">
                  <img src="imagens/Pic.Praia.svg" class="card-img" alt="Práias">
                  <div class="card-img-overlay">
                    <p class="card-title text-center" style="color: white; font-size: 36px; font-weight: bold; background: rgba(0, 0, 0, 0.3); border-radius: 3%;">Práias</p>                    
                  </div>
                </div>
              </a>
          
            </div>                         
      </div>

    <!-- Carrossel da área de cerviços -->
      <div class="conteiner-sm m-auto pt-3 justify-content-center" style="width: 80%;">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner mt-1">

            <div class="carousel-item active" data-bs-interval="10000">
              <img src="imagens/Pic.Atendimento.svg" class="d-block w-100" alt="Atendimento Personalizado">
              <div class="carousel-caption d-none d-md-block">
                <h1>Atendimento Personalizado</h1>
                <p style="font-size: 30px;">Nos diga sua necessidade, que atenderemos da melhor forma possível</p>
              </div>
            </div> 
            
            <div class="carousel-item active" data-bs-interval="10000">
              <img src="imagens/Pic.Atendimento2.svg" class="d-block w-100" alt="Atendimento Personalizado">
              <div class="carousel-caption d-none d-md-block">
                <h1>Suporte Total</h1>
                <p style="font-size: 30px;">Suporte completo e 24 horas durante toda a sua viagem !</p>
              </div>
            </div> 
            
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

    <!-- Area de Informações do Negócio -->
      <div class="conteiner-sm pt-4 m-auto" style="width: 80%;">
        <h1 id="informacoes">Informações</h1>
        <p class="text-starts fs-1">O nosso sistema foi especialmente desenhado para atender as necessidades de pequenas instalações de alojamento, como hotéis, pensões, albergues e casas de turismo rural. Fornecemos uma solução total de gerenciamento de alojamento e serviços de alimentação, incluindo café da manhã, pequeno almoço e jantar. Na prática, o nosso sistema é entregue em um pacote fácil de instalar e usar. Como resultado, a sua empresa pode implementar o nosso sistema o mais rápido possível, mesmo sem experiência técnica prévia.</p>
      </div>    
      <div class="conteiner-sm pt-3 m-auto" style="width: 80%;">
        <h1 class="pt-3">Contatos</h1>

        <div class="d-flex justify-content-between align-items-center" style="height: 250px; width: 80%;">
          
          <div class="d-flex flex-column">
            <p class="fs-1">Telefone: (21) 9999-9999</p>
            <p class="fs-1">Celular: (21) 99999-9999</p>
            <p class="fs-1">E-mail: endereço@dominio.com.br</p>
          </div>

          <div>

            <a href="https://www.facebook.com/">
              <img src="imagens/facebook.svg" class="card-img" alt="Facebook" style="width: 60px; height: 360px;">
            </a>
            <a href="https://web.whatsapp.com/">
              <img src="imagens/whatsapp.svg" class="card-img" alt="Whatsapp" style="width: 60px; height: 60px;">
            </a>
            <a href="https://www.instagram.com/">
              <img src="imagens/instagram.svg" class="card-img" alt="Instagram" style="width: 60px; height: 60px;">
            </a>
            <a href="https://twitter.com/">
              <img src="imagens/twitter.svg" class="card-img" alt="Twitter" style="width: 60px; height: 60px;">
            </a>
          </div>
          
        </div>
        
      </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
  </body>
</html>
