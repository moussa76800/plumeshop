<!-- ============================================================= FOOTER ============================================================= -->
@php
$setting = App\Models\SiteSetting::find(1);
@endphp

<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="module-heading">
              <h4 class="module-title">  @if (session()->get('language') == 'french')Nous Contactez @else Contact Us @endif</h4>
            </div>
            <!-- /.module-heading -->
            
            <div class="module-body">
              <ul class="toggle-footer" style="">
                <li class="media">
                  <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                  <div class="media-body">
                    <p>{{ ($setting->company_name)}}, {{($setting->company_address) }}</p>
                  </div>
                </li>
                <li class="media">
                  <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                  <div class="media-body">
                    <p>+ {{ ($setting->phone_one) }}<br>
                      + {{ ($setting->phone_two) }}</p>
                  </div>
                </li>
                <li class="media">
                  <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                  <div class="media-body"> <span><a href="#">{{ ($setting->email) }}</a></span> </div>
                </li>
              </ul>
            </div>
            <!-- /.module-body --> 
          </div>
          <!-- /.col -->
          
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="module-heading">
              <h4 class="module-title">A propos</h4>
            </div>
            <!-- /.module-heading -->
            
            <div class="module-body">
              <ul class='list-unstyled'>
                <li class="first"><a href="{{ url('/aPropos') }}" title="Qui sommes-nous ?">Qui sommes-nous ?</a></li>
                <li><a href="{{url('/donnate/book#about-uss')}}" title="Nos engagements">Nos engagements</a></li>
                <li><a href="{{ url('/blog') }}" title="Le blog">Le blog</a></li>
                <li><a href="#" title="Nos partenaires">Nos partenaires</a></li>
              </ul>
            </div>
            <!-- /.module-body --> 
          </div>
          <!-- /.col -->
          
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="module-heading">
              <h4 class="module-title">FAQ</h4>
            </div>
            <!-- /.module-heading -->
            
            <div class="module-body">
              <ul class='list-unstyled'>
                <li class="first"><a title="Your Account" href="{{url('/FAQ/Assistance')}}">Aide et assitance</a></li>
                <li><a title="Information" href="{{url('/FAQ/EtatDesLivres')}}">Etats des livres</a></li>
                <li><a title="Addresses" href="{{url('/FAQ/Livraison')}}">Livraison</a></li>
                <li><a title="Addresses" href="{{url('/FAQ/Paiement')}}">Paiement</a></li>
              </ul>
            </div>
            <!-- /.module-body --> 
          </div>
          <!-- /.col -->
          
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="module-heading">
              <h4 class="module-title">Cadre juridique</h4>
            </div>
            <!-- /.module-heading -->
            
            <div class="module-body">
              <ul class='list-unstyled'>
                <li class="first"><a href="{{url('/juridique/protectionDonnées') }}" title="Protection des données">Protection des données</a></li>
                <li><a href="{{url('/juridique/mentionsLegales') }}" title="Mentions Légales">Mentions Légales</a></li>
                <li><a href="{{url('/juridique/CGV') }}" title="CGV">CGV</a></li>
                <li><a href="{{url('/juridique/gestionsCookies') }}" title="Gestions des Cookies">Gestions des Cookies</a></li>
              </ul>
            </div>
            <!-- /.module-body --> 
          </div>
        </div>
      </div>
    </div>
    <div class="copyright-bar">
      <div class="container">
        <div class="col-xs-12 col-sm-6 no-padding social">
          <ul class="link">
            <li class="fb pull-left"><a target="_blank" rel="nofollow" href="{{ ($setting->facebook) }}" title="Facebook"></a></li>
            <li class="tw pull-left"><a target="_blank" rel="nofollow" href="{{ ($setting->twitter) }}" title="Twitter"></a></li>
            <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
              <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="{{ ($setting->linkedin )}}" title="Linkedin"></a></li>
            <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="{{ ($setting->facebook) }}" title="Youtube"></a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-6 no-padding">
          <div class="clearfix payment-methods">
            <ul>
              <li><img src="assets/images/payments/1.png" alt=""></li>
              <li><img src="assets/images/payments/2.png" alt=""></li>
              <li><img src="assets/images/payments/3.png" alt=""></li>
              <li><img src="assets/images/payments/4.png" alt=""></li>
              <li><img src="assets/images/payments/5.png" alt=""></li>
            </ul>
          </div>
          <!-- /.payment-methods --> 
        </div>
      </div>
    </div>
  </footer>
  <!-- ============================================================= FOOTER : END============================================================= --> 
  