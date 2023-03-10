@extends('frontend.main_master')
@section('content')
 
@section('title')
@if (session()->get('language') == 'french')Donnez vos Livres @else Donnate your Books @endif 
@endsection

<style>
/* Style général */


body {
font-family: Arial, sans-serif;
}

div {
  text-align: center;
}

nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

nav li {
  display: inline-block;
  margin-right: 20px;
}

nav li:last-child {
  margin-right: 0;
}

nav a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
  font-size: 1.2em;
  padding: 10px;
  transition: all 0.3s ease;
}

nav a:hover {
  color:black;
  background-color:yellow;
}

h1 {
  font-size: 3em;
  font-weight: bold;
  text-align: center;
  margin-top: 50px;
  margin-bottom: 10px;
}

p {
  font-size: 1.2em;
  text-align: center;
  margin-bottom: 50px;
}

h1::after {
  content: "";
  display: block;
  width: 100px;
  height: 5px;
  background-color: #007bff;
  margin: 10px auto 0 auto;
}



section {
padding: 60px 0;
}

h2 {
font-size: 36px;
font-weight: bold;
text-align: center;
margin-bottom: 30px;
color: #2196f3;
}

.cards-container {
display: flex;
justify-content: center;
align-items: center;
flex-wrap: wrap;
}

.card {
flex-basis: 300px;
background-color: #fff;
border-radius: 10px;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
padding: 30px;
text-align: center;
margin: 20px;
transition: transform 0.2s ease-in-out;
}

.card:hover {
transform: translateY(-10px);
}

.card i {
font-size: 48px;
margin-bottom: 20px;
color: #2196f3;
}

.card h3 {
font-size: 24px;
font-weight: bold;
margin-bottom: 20px;
color: #444;
}

.card p {
font-size: 18px;
line-height: 1.5;
color: #777;
}

ol {
font-size: 18px;
color: #777;
line-height: 1.5;
margin-left: 40px;
margin-bottom: 20px;
}

ol li {
margin-bottom: 10px;
position: relative;
}

ol li::before {
content: "\2022";
color: #2196f3;
font-weight: bold;
display: inline-block;
position: absolute;
left: -25px;
}

#about-us {
  background-image: url('https://i.imgur.com/kDdnrKr.jpg');
  background-size: cover;
  background-position: center;
  padding: 60px 0;
  text-align: center;
}

.about-content {
  background-color: yellow;
  padding: 40px;
  max-width: 600px;
  margin: 0 auto;
  border-radius: 10px;
}

h2 {
 
  font-size: 2.5em;
  margin-bottom: 30px;
}

p {
  
  font-size: 1.5em;
  margin-bottom: 40px;
  line-height: 1.5;
}


#how-to-donate {
  background-color: #f5f5f5;
  padding: 60px 0;
}

.section-title {
    font-size: 30px;
font-weight: bold;
text-align: center;
color: #2196f3;
  text-align: center;
  margin-bottom: 50px;
}

.step {
  text-align: center;
  margin-bottom: 40px;
}

.step-icon {
  display: inline-block;
  width: 80px;
  height: 80px;
  line-height: 80px;
  text-align: center;
  background-color: #fff;
  border-radius: 50%;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  font-size: 30px;
  color: #4f4f4f;
  margin-bottom: 20px;
}

.step-title {
  font-size: 18px;
  line-height: 1.5;
  color: #4f4f4f;
}

 </style>

    <br>
    @if (session()->get('language') == 'french')
<body>
    <div>
      <nav>
        <ul>
          <li><a href="#why-donate">Pourquoi donner</a></li>
          <li><a href="#how-to-donate">Comment donner</a></li>
          <li><a href="#about-us">À propos de nous</a></li>
          <li><a href="#partners">Nos Partenaires</a></li>
        </ul>
      </nav>
      <h1>Livres d'occasion</h1>
      <p>Donnez une seconde vie à vos livres</p>
    </div>

    <main>
      <section id="why-donate">
        <h2>Pourquoi faire don de vos livres ?</h2>
        <div class="cards-container">
          <div class="card">
            <i class="fa fa-recycle"></i>
            <h3>Contribuer à l'environnement</h3>
            <p>En donnant vos livres, vous contribuez à la réduction des déchets et à la préservation de l'environnement.</p>
          </div>
          <div class="card">
            <i class="fa fa-book open"></i>
            <h3>Favoriser la lecture</h3>
            <p>En donnant vos livres, vous offrez la possibilité à d'autres personnes de découvrir de nouveaux horizons et de s'enrichir culturellement.</p>
          </div>
          <div class="card">
            <i class="fa fa-book open"></i>
            <h3>Aider des associations</h3>
            <p>En donnant vos livres,vous pouvez aider des associations caritatives qui les redistribuent à des personnes dans le besoin.</p>
          </div>
          
        </div>
      </section>

      <section id="how-to-donate">
        <div class="container">
          <h2 class="section-title">Comment faire un don ?</h2>
          <div class="row">
            <div class="col-md-3 step">
              <div class="step-icon"><i class="fa fa-book"></i></div>
              <div class="step-title">Regroupez vos livres et vérifiez qu'ils sont en bon état.</div>
            </div>
            <div class="col-md-3 step">
              <div class="step-icon"><i class="fa fa-phone"></i></div>
              <div class="step-title">Contactez notre association par téléphone ou par e-mail pour organiser la collecte de vos livres.</div>
            </div>
            <div class="col-md-3 step">
              <div class="step-icon"><i class="fa fa-truck"></i></div>
              <div class="step-title">Un bénévole viendra récupérer vos livres chez vous ou vous pourrez les déposer dans l'un de nos points de collecte.</div>
            </div>
            <div class="col-md-3 step">
              <div class="step-icon"><i class="fa fa-check"></i></div>
              <div class="step-title">Vous recevrez une confirmation de réception par e-mail.</div>
            </div>
          </div>
        </div>
      </section>
      
      

      <section id="about-us">
        <div class="about-content">
            <h2>À propos de notre association</h2>
            <p>Notre association a pour but de collecter des livres pour leur offrir une seconde vie.</p>
            <p> Nous collaborons avec des associations caritatives pour distribuer les livres aux personnes dans le besoin et nous vendons les livres en bon état pour financer nos actions.</p>
            <p> N'hésitez pas à nous contacter pour faire un don ou pour plus d'informations !</p>
          </div>
      </section>

          <section id="partners">
            <h2>Nos partenaires associatifs</h2>
            <hr>
          <div class="row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <div class="card">
                <div class="card-body">  
                    <img src="https://noe.org/media/logo-noe-115px.png?1606486237" alt="Noé">
                  <h5 class="card-title">Noé</h5>
                  <p class="card-text">Noé a pour mission de sauvegarder la biodiversité en France et à l’international. Pour mener à bien sa mission,l’association déploie des programmes de conservation d’espèces menacées de préservation et de restauration de milieux naturels protégés. </p>
                  <a href="https://noe.org/" class="btn btn-primary">Explorer le site</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card">
                <div class="card-body">
                    <img src="https://environnement.brussels/themes/custom/ocelot_baseline/components/logo/assets/logo.svg" alt="Environnement Brussels">
                  <h5 class="card-title">Environnement Brussels</h5>
                  <p class="card-text">À propos de Bruxelles Environnement
                    Améliorer la qualité de vie au sein de cette magnifique région, verte, créative et multiculturelle qu’est Bruxelles et faciliter sa transition vers une société plus écologique, plus éthique et socialement plus juste : telle est la raison d’être de Bruxelles Environnement depuis plus de 30 ans !
                    </p>
                  <a href="https://environnement.brussels/" class="btn btn-primary">Explorer le site</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card">
                  <div class="card-body">
                      <img src="https://www.natagora.be/themes/custom/natagora/img/donation_v2/logo1.png" alt="Natogora">
                    <h5 class="card-title">Natagora</h5>
                    <p class="card-text">Présente sur tous les fronts pour défendre la biodiversité, Natagora crée et gère des réserves naturelles et développe de nombreuses autres actions impliquant tous les acteurs de la société.
                        Le but de Natagora est de protéger la nature près de chez vous, en Wallonie et à Bruxelles. Avec un grand objectif : redéployer la biodiversité.  </p>
                    <a href="https://www.natagora.be/qui-est-natagora" class="btn btn-primary">Explorer le site</a>
                  </div>
                </div>
              </div>
          </div>
      </section>
      
    </main>
</body>
@else
<body>
    <div>
      <nav>
        <ul>
          <li><a href="#why-donate">Why donate</a></li>
          <li><a href="#how-to-donate">How to donate</a></li>
          <li><a href="#about-us">About-us</a></li>
          <li><a href="#partners">Ours Partners</a></li>
        </ul>
      </nav>
      <h1>Used books</h1>
      <p>Give your books a second life</p>
    </div>

php

<main>
  <section id="why-donate">
    <h2>Why donate your books?</h2>
    <div class="cards-container">
      <div class="card">
        <i class="fa fa-recycle"></i>
        <h3>Contribute to the environment</h3>
        <p>By donating your books, you contribute to waste reduction and environmental preservation.</p>
      </div>
      <div class="card">
        <i class="fa fa-book open"></i>
        <h3>Promote reading</h3>
        <p>By donating your books, you offer the opportunity for others to discover new horizons and enrich themselves culturally.</p>
      </div>
      <div class="card">
        <i class="fa fa-charity"></i>
        <h3>Help charities</h3>
        <p>By donating your books, you can help charitable organizations that redistribute them to people in need.</p>
      </div>
    </div>
  </section>

  <section id="how-to-donate">
    <div class="container">
      <h2 class="section-title">How to donate?</h2>
      <div class="row">
        <div class="col-md-3 step">
          <div class="step-icon"><i class="fa fa-book"></i></div>
          <div class="step-title">Gather your books and check that they're in good condition.</div>
        </div>
        <div class="col-md-3 step">
          <div class="step-icon"><i class="fa fa-phone"></i></div>
          <div class="step-title">Contact our association by phone or email to organize the collection of your books.</div>
        </div>
        <div class="col-md-3 step">
          <div class="step-icon"><i class="fa fa-truck"></i></div>
          <div class="step-title">A volunteer will come to pick up your books from your place or you can drop them off at one of our collection points.</div>
        </div>
        <div class="col-md-3 step">
          <div class="step-icon"><i class="fa fa-check"></i></div>
          <div class="step-title">You'll receive a confirmation of receipt via email.</div>
        </div>
      </div>
    </div>
  </section>

  <section id="about-us">
    <div class="about-content">
        <h2>About us</h2>
        <p>Our association aims to collect books to give them a second life.</p>
        <p>We collaborate with charitable organizations to distribute books to people in need, and we sell books in good condition to fund our actions.</p>
        <p>Don't hesitate to contact us to make a donation or for more information!</p>
      </div>
  </section>

  <section id="partners">
    <h2>Our associate partners</h2>
  <div class="row">
    <div class="col-sm-4 mb-3 mb-sm-0">
      <div class="card">
        <div class="card-body">  
            <img src="https://noe.org/media/logo-noe-115px.png?1606486237" alt="Noé">
          <h5 class="card-title">Noé</h5>
          <p class="card-text">Noé's mission is to safeguard biodiversity in France and internationally. To carry out this mission, the association deploys conservation programs for endangered species and restoration of protected natural habitats. </p>
          <a href="https://noe.org/" class="btn btn-primary">Explore website</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
            <img src="https://environnement.brussels/themes/custom/ocelot_baseline/components/logo/assets/logo.svg" alt="Environnement Brussels">
          <h5 class="card-title">Environnement Brussels</h5>
          <p class="card-text">About Brussels Environment
            Improving the quality of life in this magnificent, green, creative and multicultural region that is Brussels and facilitating its transition to a more ecological, more ethical and socially fairer society: this is the reason for being of Brussels Environment for more than 30 years!
            </p>
          <a href="https://environnement.brussels/" class="btn btn-primary">Explore website</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mb-3 mb-sm-0">
        <div class="card">
          <div class="card-body">
              <img src="https://www.natagora.be/themes/custom/natagora/img/donation_v2/logo1.png" alt="Natogora">
            <h5 class="card-title">Natagora</h5>
            <p class="card-text">Present on all fronts to defend biodiversity, Natagora creates and manages nature reserves and develops many other actions involving all actors of society. Natagora's goal is to protect nature near you, in Wallonia and Brussels. With a great objective: to redeploy biodiversity. </p>
            <a href="https://www.natagora.be/qui-est-natagora" class="btn btn-primary">Explore website</a>
          </div>
        </div>
      </div>
  </div>
</section>
</main>
</body>
@endif






            @endsection
            