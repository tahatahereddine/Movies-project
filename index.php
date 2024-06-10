<?php
  include 'functions.php';
  include 'db.php';
  include 'header.php';
?>

    <div class="section">
        <div class="section-dark" style="background-image: url('bground.jpg') !important; background-position: center; background-size: cover;">
            <div class="container py-sm-5 mb-sm-5">

                <div class="row pt-5">
                    <div class="col-12 text-center mb-5">
                        <h1 class="presentation-title font-weight-bold text-light">Movie<wbr>Flix<wbr>.com</h1>
                    </div>
                    <div class="col-sm-6 offset-sm-3">
                        <div class="mx-auto">
                            <div>
                              <div class="autocomplete auto-start">
                                <form action="chercher.php" method="POST">
                                  <div class="input-group">
                                    <input type="text" name="film" placeholder="Trouver un film" autocomplete="off" class="form-control">
                                    <ul id="autocomplete-results" class="autocomplete-results" style="display: none;"></ul>
                                    <div class="input-group-append">
                                      <button type="submit" class="btn btn-danger search">
                                        rechercher
                                      </button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                      </div>
                    </div>
                    <div class="col-12 text-center">
                        <h2 class="h4 mt-5 text-light">Votre interface au cinema</h2>
                    </div>
                </div>
            </div>

            <div class="container pb-5">

              <div class="row">
                <div class="col-12">
                    <h3 class="font-weight-bold text-uppercase text-light titre">Classement top 12</h3>
                </div>
              </div>

              <div class="row justify-content-center">
                  <?php
                   

                   $sql = "SELECT * FROM film ORDER BY Rating DESC LIMIT 12;";
                   $resultat = mysqli_query($conn, $sql);
                   $nbr_ligne = mysqli_num_rows($resultat);

                   if($nbr_ligne > 0){
                    while($ligne = mysqli_fetch_assoc($resultat)){
                      afficher_film($ligne['ID_Film'], $ligne['Nom_film']);
                    }
                   }
                  ?>
                  
                  
                  
            </div>
        </div>
    </div>
        <div class="container">



            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="font-weight-bold text-uppercase">most downloads / month</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                                    <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                        <a href="/furiosa-i12037194">
                            <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/23_12/2024/12037194/s_furiosa-movie-poster_ae3c1492.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/23_12/2024/12037194/s_furiosa-movie-poster_ae3c1492.jpg&quot;);">
                                
                            </div>
                            <div class="sp-poster-title">Furiosa</div>
                        </a>
                    </div>
                                    <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                        <a href="/kingdom-of-the-planet-of-the-apes-i11389872">
                            <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/23_11/2024/11389872/s_kingdom-of-the-planet-of-the-apes-movie-poster_6d194455.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/23_11/2024/11389872/s_kingdom-of-the-planet-of-the-apes-movie-poster_6d194455.jpg&quot;);">
                                
                            </div>
                            <div class="sp-poster-title">Kingdom of the Planet of the Apes</div>
                        </a>
                    </div>
                                    <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                        <a href="/star-wars-i76759">
                            <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/06_07/1977/0076759/s_123404_0076759_e7bfc429.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/06_07/1977/0076759/s_123404_0076759_e7bfc429.jpg&quot;);">
                                
                            </div>
                            <div class="sp-poster-title">Star Wars</div>
                        </a>
                    </div>
                                    <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                        <a href="/mad-max-fury-road-i1392190">
                            <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/15_07/2015/1392190/s_1392190_50142848.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/15_07/2015/1392190/s_1392190_50142848.jpg&quot;);">
                                
                            </div>
                            <div class="sp-poster-title">Mad Max: Fury Road</div>
                        </a>
                    </div>
                                    <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                        <a href="/the-garfield-movie-i5779228">
                            <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/23_12/2024/5779228/s_the-garfield-movie-movie-poster_c56f63c9.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/23_12/2024/5779228/s_the-garfield-movie-movie-poster_c56f63c9.jpg&quot;);">
                                
                            </div>
                            <div class="sp-poster-title">The Garfield Movie</div>
                        </a>
                    </div>
                                    <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                        <a href="/harry-potter-and-the-deathly-hallows-part-2-i1201607">
                            <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/11_07/2011/1201607/s_1201607_06d25beb.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/11_07/2011/1201607/s_1201607_06d25beb.jpg&quot;);">
                                
                            </div>
                            <div class="sp-poster-title">Harry Potter and the Deathly Hallows: Part 2</div>
                        </a>
                    </div>
                                    <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                        <a href="/the-fall-guy-i1684562">
                            <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/23_11/2024/1684562/s_the-fall-guy-movie-poster_af257014.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/23_11/2024/1684562/s_the-fall-guy-movie-poster_af257014.jpg&quot;);">
                                
                            </div>
                            <div class="sp-poster-title">The Fall Guy</div>
                        </a>
                    </div>
                                    <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                        <a href="/the-dark-knight-i468569">
                            <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/08_05/2008/468569/s_468569_f0e2cd63.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/08_05/2008/468569/s_468569_f0e2cd63.jpg&quot;);">
                                
                            </div>
                            <div class="sp-poster-title">The Dark Knight</div>
                        </a>
                    </div>
                                    <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                        <a href="/dune-part-two-i15239678">
                            <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/24_02/2024/15239678/s_dune-part-two-movie-poster_18c5c05f.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/24_02/2024/15239678/s_dune-part-two-movie-poster_18c5c05f.jpg&quot;);">
                                
                            </div>
                            <div class="sp-poster-title">Dune: Part Two</div>
                        </a>
                    </div>
                                    <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                        <a href="/the-hobbit-the-desolation-of-smaug-i1170358">
                            <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/13_11/2013/1170358/s_1170358_a210aae5.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/13_11/2013/1170358/s_1170358_a210aae5.jpg&quot;);">
                                
                            </div>
                            <div class="sp-poster-title">The Hobbit: The Desolation of Smaug</div>
                        </a>
                    </div>
                                    <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                        <a href="/southland-i1299368">
                            <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/09_12/2009/1299368/s_1299368_58441323.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/09_12/2009/1299368/s_1299368_58441323.jpg&quot;);">
                                
                            </div>
                            <div class="sp-poster-title">Southland</div>
                        </a>
                    </div>
                                    <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                        <a href="/a-clockwork-orange-i66921">
                            <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/10_02/1971/66921/s_66921_6ce7659c.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/10_02/1971/66921/s_66921_6ce7659c.jpg&quot;);">
                                
                            </div>
                            <div class="sp-poster-title">A Clockwork Orange</div>
                        </a>
                    </div>
                            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="font-weight-bold text-uppercase">latest additions</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                    <a href="/the-secret-life-of-college-escorts-i15293072/38be7bc1">
                        <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/24_06/2022/15293072/s_the-secret-life-of-college-escorts-movie-poster_38be7bc1.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/24_06/2022/15293072/s_the-secret-life-of-college-escorts-movie-poster_38be7bc1.jpg&quot;);">
                            
                        </div>
                        <div class="sp-poster-title">The Secret Life of College Escorts</div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                  <a href="/beetlejuice-beetlejuice-i2049403/6129dd6a">
                      <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/24_06/2024/2049403/s_beetlejuice-beetlejuice-movie-poster_6129dd6a.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/24_06/2024/2049403/s_beetlejuice-beetlejuice-movie-poster_6129dd6a.jpg&quot;);">
                          
                      </div>
                      <div class="sp-poster-title">Beetlejuice Beetlejuice</div>
                  </a>
                </div>
                <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                  <a href="/beetlejuice-beetlejuice-i2049403/c936bbd6">
                      <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/24_06/2024/2049403/s_beetlejuice-beetlejuice-movie-poster_c936bbd6.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/24_06/2024/2049403/s_beetlejuice-beetlejuice-movie-poster_c936bbd6.jpg&quot;);">
                          
                      </div>
                      <div class="sp-poster-title">Beetlejuice Beetlejuice</div>
                  </a>
                </div>
                <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                    <a href="/die-hart-die-harter-i32094375/b21309fa">
                        <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/24_06/2024/32094375/s_die-hart-die-harter-movie-poster_b21309fa.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/24_06/2024/32094375/s_die-hart-die-harter-movie-poster_b21309fa.jpg&quot;);">
                            
                        </div>
                        <div class="sp-poster-title">Die Hart: Die Harter</div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                  <a href="/chojiku-yosai-macross-ai-oboeteimasuka-i87660/dcde951c">
                      <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/24_06/1984/87660/s_chojiku-yosai-macross-ai-oboeteimasuka-movie-poster_dcde951c.png" style="background-image: url(&quot;https://posters.movieposterdb.com/24_06/1984/87660/s_chojiku-yosai-macross-ai-oboeteimasuka-movie-poster_dcde951c.png&quot;);">
                          
                      </div>
                      <div class="sp-poster-title">Chôjikû Yôsai Macross: Ai Oboeteimasuka</div>
                  </a>
                </div>
                <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                  <a href="/thor-i800369/2427044d">
                      <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/24_06/2011/800369/s_thor-movie-poster_2427044d.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/24_06/2011/800369/s_thor-movie-poster_2427044d.jpg&quot;);">
                          
                      </div>
                      <div class="sp-poster-title">Thor</div>
                  </a>
                </div>
                <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                  <a href="/thor-i800369/d9d484b5">
                      <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/24_06/2011/800369/s_thor-movie-poster_d9d484b5.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/24_06/2011/800369/s_thor-movie-poster_d9d484b5.jpg&quot;);">
                          
                      </div>
                      <div class="sp-poster-title">Thor</div>
                  </a>
                </div>
                <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                  <a href="/thor-i800369/5603d595">
                      <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/24_06/2011/800369/s_thor-movie-poster_5603d595.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/24_06/2011/800369/s_thor-movie-poster_5603d595.jpg&quot;);">
                          
                      </div>
                      <div class="sp-poster-title">Thor</div>
                  </a>
                </div>
                <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                    <a href="/thor-i800369/7859f1ef">
                        <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/24_06/2011/800369/s_thor-movie-poster_7859f1ef.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/24_06/2011/800369/s_thor-movie-poster_7859f1ef.jpg&quot;);">
                            
                        </div>
                        <div class="sp-poster-title">Thor</div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                    <a href="/the-incredible-hulk-i800080/adc6007b">
                        <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/24_06/2008/800080/s_the-incredible-hulk-movie-poster_adc6007b.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/24_06/2008/800080/s_the-incredible-hulk-movie-poster_adc6007b.jpg&quot;);">
                            
                        </div>
                        <div class="sp-poster-title">The Incredible Hulk</div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                  <a href="/12-strong-i1413492/46178092">
                      <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/24_06/2018/1413492/s_12-strong-movie-poster_46178092.jpg" style="background-image: url(&quot;https://posters.movieposterdb.com/24_06/2018/1413492/s_12-strong-movie-poster_46178092.jpg&quot;);">
                          
                      </div>
                      <div class="sp-poster-title">12 Strong</div>
                  </a>
                </div>
                <div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">
                  <a href="/priscilla-i22041854/7a03f99b">
                      <div class="sp-poster lazybgimage" data-src="https://posters.movieposterdb.com/24_06/2023/22041854/s_priscilla-movie-poster_7a03f99b.png" style="background-image: url(&quot;https://posters.movieposterdb.com/24_06/2023/22041854/s_priscilla-movie-poster_7a03f99b.png&quot;);">
                          
                      </div>
                      <div class="sp-poster-title">Priscilla</div>
                  </a>
                </div>
            </div>
            
        </div>
    </div>
  </html>