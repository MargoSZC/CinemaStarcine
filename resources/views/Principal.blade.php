<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Star Cine - O melhor do cinema </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/fovicon.ico.png" />
        <!--Icone fonte awsome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-4 px-lg-5">
                <img src="assets/fovicon.ico.png" width="50px" height="50px"> <br> <br>
                <a class="navbar-brand" href="principal">Star Cine</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="principal">Filmes</a></li>
                        <li class="nav-item"><a class="nav-link" href="sobre">Sobre nós</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mais opções</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="filme">Lista e cadastro de filmes</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="produto">Lista e cadastro de produtos  </a></li>
                                <li><a class="dropdown-item" href="funcionario">Lista e cadastro de funcionários</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Arquivos Miguel</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="conecta_mysql">Conecta mysql</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="consulta_envio">Consulta e envio  </a></li>
                                <li><a class="dropdown-item" href="consulta_mac">Consulta MAC</a></li>
                                <li><a class="dropdown-item" href="consulta_push">Consulta Push</a></li>
                                <li><a class="dropdown-item" href="piloto_insert">Piloto Insert</a></li>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br> 
        <!-- Header-->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>


            </div>
          
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('assets/donnie.jpg')}}" alt="Donnie Darko" class="d-block w-100"  height="400">
              </div>
              <div class="carousel-item">
                <img src="{{asset('assets/velozes.png')}}" alt="Velozes e Furiosos 10" class="d-block w-100" height="400">
              </div>
              <div class="carousel-item">
                <img src="{{asset('assets/guardioes.png')}}" alt="guardiões da galáxia vol 3" class="d-block w-100" height="400">
              </div>
              <div class="carousel-item">
                <img src="{{asset('assets/john.png')}}" alt="John Wick 4" class="d-block w-100" height="400">
              </div>
              <div class="carousel-item">
                <img src="{{asset('assets/mario.png')}}" alt="Super Mario" class="d-block w-100" height="400">
              </div>
              <div class="carousel-item">
                <img src="{{asset('assets/mortedodemonio.png')}}" alt="A morte do demônio" class="d-block w-100" height="400">
              </div>
              <div class="carousel-item">
                <img src="{{asset('assets/cavaleiros.jpg')}}" alt="Cavaleiros do Zodíaco" class="d-block w-100" height="400">
              </div>
            </div>
          
            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
          
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-3 gx-lg-4 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Pré-venda</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="https://assets.cinebelasartes.com.br/wp-content/uploads/2023/05/DONNIE-DARKOCARTAZ-SITE-min.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h3 class="fw-bolder">Belas Sonoriza Donnie Darko </h3> <br>
                                    <p> Gênero: Ficção Científica <br> Classificação indicativa: 14 anos </p>
                                    <br>
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <b><h5>Horários: </h5> </b> 
                                    <a href="comprar" class="btn btn-dark">R$| 19:10 </a> 
                                    <a href="comprar" class="btn btn-dark">R$| 21:30 </a>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="donnie">Mais opções</a></div> <br>

                            </div>
                        </div>
                    </div>
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Sale badge-->
                                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Pré-estreia</div>
                                    <!-- Product image-->
                                    <img class="card-img-top" src="https://www.cinesystem.com.br/filmes/images/poster/velozes-e-furiosos-10.jpg" alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h3 class="fw-bolder">Velozes e <br> Furiosos 10</h3> <br>
                                            <p> Gênero: Ação/Aventura <br> Classificação indicativa: 12 anos </p>
                                            <br>
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                                <div class="bi-star-fill"></div>
                                                <div class="bi-star-fill"></div>
                                                <div class="bi-star-fill"></div>
                                                <div class="bi-star-fill"></div>
                                                <div class="bi-star-fill"></div>
                                            </div>
                                            <!-- Product price-->
                                            <b><h5>Horários: </h5> </b> 
                                            <a href="comprar" class="btn btn-dark">R$| 18:30 </a>
                                            <a href="comprar" class="btn btn-dark">R$| 20:00 </a> <br> <br>
                                            <a href="comprar" class="btn btn-dark">R$| 21:10 </a>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="velozesf">Mais opções</a></div> <br>
                            </div>
                                </div>
                            </div>
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Estreia</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="https://legadodamarvel.com.br/wp-content/uploads/2023/05/Guardioes-da-Galaxia-Vol.-3-legadodamarvel.webp" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h3 class="fw-bolder">Guardiões da Galáxia Volume 3</h3> 
                                    <!--categoria e indicação-->
                                    <p> Categoria: Aventura/Ficção Científica Classificação indicativa: 12 anos</p> <br>
                                    <!-- product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>

                                    <!-- Product hour-->
                                    <b><h5>Horários: </h5> </b> 
                                    <a href="comprar" type="button" class="btn btn-dark">R$| 14:30 </a>
                                    <a href="comprar" type="button" class="btn btn-dark">R$| 18:00</a> <br> <br>
                                    <a href="comprar" type="button" class="btn btn-dark">R$| 21:10 </a>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="guardioesdg">Mais opções</a></div> <br>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </section>
                    <section class="py-5">
                        <div class="container px-4 px-lg-5 mt-5">
                            <div class="row gx-3 gx-lg-4 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://www.kinoplex.com.br/filmes/images/cartaz/262x388/john-wick-4-baba-yaga.jpg" alt="50"/>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h3 class="fw-bolder">John <br> Wick 4</h3>
                                    <p> Gênero: Ação/Neo-noir <br> Classificação indicativa: 16 anos </p>
                                    <br>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <b><h5>Horários: </h5> </b> 
                                    <a href="comprar" class="btn btn-dark">R$| 18:30 </a>
                                    <a href="comprar" class="btn btn-dark">R$| 21:10 </a>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="john">Mais opções</a></div> <br>
                            </div>
                        </div>
                    </div>
                        <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://www.claquete.com.br/fotos/filmes/poster/14794_medio.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h3 class="fw-bolder">Super Mario Bross <br> O filme</h3>
                                    <p> Gênero: Aventura/Fantaria <br> Classificação indicativa: Livre </p>
                                    <br>
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <b><h5>Horários: </h5> </b> 
                                    <a href="comprar" class="btn btn-dark">R$| 14:30 </a>
                                    <a href="comprar" class="btn btn-dark">R$| 18:00 </a> <br> <br>
                                    <a href="comprar" class="btn btn-dark">R$| 21:20 </a>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="supermario">Mais opções</a></div> <br>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://cinevilarica.com.br/wp-content/uploads/2023/04/amdd_cartaz_print_main_baixa-Copia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h3 class="fw-bolder">A morte do demônio - A Ascensão</h3>
                                    <p> Gênero: Terror/Fantasia <br> Classificação indicativa: 18 anos </p>
                                    <br>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <b><h5>Horários: </h5> </b> 
                                    <a href="comprar" class="btn btn-dark">R$| 21:35 </a>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="mortedodemonio">Mais opções</a></div> <br>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://br.web.img3.acsta.net/pictures/23/04/24/21/50/1055506.jpg" alt="50"/>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h3 class="fw-bolder">Cavaleiros do Zodíaco Saint Seiya: O Começo</h3>
                                    <p> Gênero: Ação/Aventura <br> Classificação indicativa: 12 anos </p>
                                    <br>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <b><h5>Horários: </h5> </b> 
                                    <a href="comprar" class="btn btn-dark">R$| 14:30 </a> 
                                    <a href="comprar" class="btn btn-dark">R$| 21:10 </a>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="cavaleiros">Mais opções</a></div> <br>
                            </div>
                        </div>
                    </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
           <i class="fa-brands fa-instagram" style="color: #ffffff;"></i> <p class="text-white"> Starcine.cinema </p> <br>
           <i class="fa-brands fa-square-whatsapp" style="color: #ffffff;"></i> <p class="text-white"> (49) 99965-3874 </p><br>
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Maria Eduarda Camargo e Letícia Badin Dall Igna </p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
