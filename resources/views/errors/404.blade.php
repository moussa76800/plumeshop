
<style>

.page_404{ padding:40px 0; background:#fff; font-family: 'Arvo', serif;
}

.page_404  img{ width:100%;}

.four_zero_four_bg{
 
 background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
    height: 400px;
    background-position: center;
 }
 
 
 .four_zero_four_bg h1{
 font-size:80px;
 }
 
  .four_zero_four_bg h3{
       font-size:80px;
       }
       
       .link_404{      
  color: #fff!important;
    padding: 10px 20px;
    background: #39ac31;
    margin: 20px 0;
    display: inline-block;}
  .contant_box_404{ margin-top:-50px;}


    </style>

<head>
 
  
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Arvo'>
    
  </head>
  
  <body>
  
      
      <section class="page_404">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="col-sm-10 col-sm-offset-1 text-center">
                <div class="four_zero_four_bg">
                  <h1 class="text-center">404</h1>
                </div>
      
                <div class="contant_box_404">
                  <h3 class="h2">
                    @if (session()->get('language') == 'english')
                      Look like you're lost
                    @else
                      On dirait que tu es perdu
                    @endif
                  </h3>
      
                  <p>
                    @if (session()->get('language') == 'english')
                      The page you are looking for is not available!
                    @else
                      La page que vous recherchez n'est pas disponible !
                    @endif
                  </p>
                  
                  @php
                  $guards = ['admin', 'web'];
                  $authenticated = false;
              
                  foreach ($guards as $guard) {
                      if(Auth::guard($guard)->check() && $guard === 'admin') {
                          $authenticated = true;
                      }
                  }
                  
                  if ($authenticated) {
                      echo '<a href="'.url('admin/dashboard').'" class="link_404">';
                      if (session()->get('language') == 'english') { 
                          echo 'Return to the Admin dashboard';
                      } else { 
                          echo 'Retourner sur le tableau de bord administration';
                      }
                      echo '</a>';
                  } else {
                      echo '<a href="'.url('/').'" class="link_404">';
                      if (session()->get('language') == 'english') { 
                          echo 'Return to the PlumeShop website';
                      } else {
                          echo 'Retourner sur le site PlumeShop';
                      }
                      echo '</a>';
                  }
              @endphp
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      
      </div>
      </div>
      </div>
    </div>
  </section>
  
  