<?php
include 'cabecalho.php';
?>
  <section class="jumbotron">
    <div class="container">
      <!--Repetir a .row pra cada registro-->
      <div class="row top-15">

        <div class="card h-100">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-7 col-xl-4">
                <!--Recomendado usar imagens vetoriais .svg para evitar perda de qualidade ou imagens de tamanho médio-->
                <img class="img-fluid" src="https://via.placeholder.com/500x500" alt="placeholder">
              </div>

              <div class="col-12 col-sm-4 col-xl-8">
                <h5 class="card-title">Nome projeto / Data Desfile</h5>
                <p class="card-text overflow-text-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent feugiat neque vitae nibh efficitur convallis.
                  Quisque ultrices non eros nec sollicitudin. Sed at mollis sapien. Donec aliquet purus sit amet posuere
                  malesuada. Ut interdum ornare vestibulum. Nam tincidunt.</p>
                <p>
                  <span class="font-weight-bold">Turma:</span>...</p>
                <p>
                  <span class="font-weight-bold">Fase:</span>...</p>
                <p>
                  <span class="font-weight-bold">Datas:</span>inicio/termino
                </p>
              </div>
            </div>  
          </div>
          <div class="card-footer">
            <a href="#IdDoProjeto1" data-toggle="modal" data-target="#detail-modal" class="btn btn-primary float-right load-project">Detalhes</a>
          </div>
        </div>
      </div>

      <!--REPETIÇÃO-->
      <div class="row top-15">

        <div class="card h-100">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-7 col-xl-4">
                <img class="img-fluid" src="https://via.placeholder.com/500x500" alt="placeholder">
              </div>

              <div class="col-12 col-sm-4 col-xl-8">
                <h5 class="card-title">Nome projeto / Data Desfile</h5>
                <p class="card-text overflow-text-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pellentesque metus placerat aliquam iaculis. Aliquam iaculis placerat urna, sed interdum nulla faucibus id. Pellentesque aliquet purus sit amet tortor finibus, a hendrerit arcu malesuada. Aenean volutpat cursus ante, sed consequat quam vehicula ut. Aenean lacinia ex id nisl ornare volutpat. Mauris vitae nulla a metus pulvinar facilisis. In varius ac odio vel euismod. Nullam porttitor eget eros vitae semper. Nullam vehicula fringilla ligula, et bibendum elit pellentesque in. Vivamus eu dictum ipsum.

Vestibulum maximus libero et scelerisque tincidunt. Pellentesque eu blandit lectus. Sed id eros eu tellus eleifend varius. Morbi ultricies malesuada ante, et venenatis neque tempus quis. Ut at blandit felis. Suspendisse consectetur, ipsum maximus ultrices consectetur, eros ipsum bibendum justo, id bibendum lacus odio nec lectus. Mauris molestie consectetur fermentum. Vestibulum eros arcu, elementum eu volutpat pellentesque, pretium eu odio.

Proin a mauris tempus, ultricies turpis auctor, laoreet leo. Fusce hendrerit justo vitae magna dignissim, vel rhoncus metus dignissim. In fermentum iaculis justo, quis hendrerit leo venenatis non. Nulla facilisi. Morbi et turpis varius, fringilla diam congue, auctor est. Sed dignissim neque at quam facilisis, in mattis turpis tincidunt. Donec gravida faucibus dui, nec lobortis massa facilisis non. Pellentesque commodo felis vitae laoreet pellentesque. Maecenas vel neque nec purus fermentum viverra eu non nibh. Donec consectetur lorem sapien, quis lacinia est pulvinar id.

Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed pretium metus rhoncus mi lacinia, eget interdum nisl fermentum. Quisque ac ipsum orci. Donec et justo velit. Cras suscipit urna ut urna pretium tincidunt. Morbi mollis mi vel dolor eleifend pharetra. Aenean in tortor gravida, maximus lacus dignissim, feugiat justo.

Aenean faucibus est neque. Quisque nisl dui, elementum sed mi nec, imperdiet maximus ligula. Vestibulum pellentesque faucibus metus commodo tempus. Phasellus tellus arcu, facilisis quis tristique eget, convallis nec orci. Nullam a velit volutpat, tincidunt metus ut, interdum ex. Vestibulum pharetra sem nibh, ac rhoncus nulla placerat at. Sed pharetra tellus vel ipsum congue, sit amet vehicula mauris eleifend. Cras elementum libero ipsum, vitae blandit eros dapibus ut.</p>
                <p>
                  <span class="font-weight-bold">Turma:</span>...</p>
                <p>
                  <span class="font-weight-bold">Fase:</span>...</p>
                <p>
                  <span class="font-weight-bold">Datas:</span>inicio/termino
                </p>
              </div>
            </div>  
          </div>
          <div class="card-footer">
            <a href="#IdDoProjeto2" data-toggle="modal" data-target="#detail-modal" class="btn btn-primary float-right load-project">Detalhes</a>
          </div>
          
        </div>
      </div>
    </div>
  </section>

  <!-- MODAL DETALHES-->
  <div class="modal fade" id="detail-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
<?php
include 'rodape.php';
?>