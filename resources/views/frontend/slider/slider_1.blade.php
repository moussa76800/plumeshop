@extends('frontend.main_master')
@section('content')
@section('title')
@if (session()->get('language') == 'french') Accueil @else Home  @endif 
@endsection

<style>
/* Centrage du nav */
nav {
  display:inline-flex;
  justify-content: center;
}

/* Couleur de fond et de texte pour les liens du nav */

/* Style pour le titre principal */
h1 {
  text-align: center;
  font-size: 36px;
  margin-top: 50px;
  
}

/* Style pour la section "about" */
.about {
  background-color: #f5f5f5;
  padding: 50px;
  margin-top: 50px;
 
 
  
}

.about h2 {
  font-size: 26px;
  margin-bottom: 20px;
  color: #007bff;
  text-align: center;
  padding: 10px;
  background-color: #f8f9fa;
  border: 2px solid #007bff;
  border-radius: 5px;
}

.about p {
  font-size: 18px;
  line-height: 1.5;
  margin-bottom: 20px;
}

.stats {
  background-color: #f9f9f9;
  padding: 50px 0;
}

.stats h2 {
  font-size: 2em;
  text-align: center;
  margin-bottom: 50px;
}

.stats ul {
  display: flex;
  justify-content: space-between;
  list-style: none;
  margin: 0;
  padding: 0;
}

.stats li {
  text-align: center;
  flex-basis: 25%;
}

.stats .stat-value {
  font-size: 3em;
  font-weight: bold;
  display: block;
  margin-bottom: 10px;
}

.stats .stat-label {
  font-size: 1.2em;
  display: block;
  color: #777;
}
 </style>
<body>
    
      
      <h1>Chez<b> PlumeShop</b>, donnez une seconde vie à vos livres !</h1>
  
    <main>
      <section class="about">
        <h2>Notre histoire</h2>
        <br>
        <p>Chez<b> PlumeShop</b>, nous sommes passionnés par les livres d'occasion et nous nous engageons à leur donner une seconde vie. Nous sommes une entreprise belge qui croit en l'importance de l'environnement, du social et du sociétal, et c'est pourquoi nous avons construit notre ADN autour de ces trois piliers.</p>
        <p>Notre histoire a commencé avec notre fondateur, qui comme beaucoup d'amoureux des livres, s'est retrouvé avec des étagères pleines de livres lus et relus. Il a réalisé qu'il devait y avoir une meilleure façon de se débarrasser de ces livres, sans pour autant les jeter. C'est ainsi que PlumeShop est né.</p>
        <p>Nous sommes fiers d'être une entreprise engagée et nous travaillons dur pour réduire notre impact sur l'environnement. Nous offrons une solution de collecte gratuite partout en Belgique, pour les particuliers comme pour les professionnels, afin de récupérer les livres qui n'ont plus de place chez eux. Nous veillons également à ce que nos livraisons soient effectuées de manière responsable et respectueuse de l'environnement.</p>
        <p>Nous sommes également très attachés à notre rôle social et sociétal. Nous croyons que les livres sont un moyen important d'accéder à la culture et à l'éducation, et nous travaillons avec des associations et des organisations pour mettre des livres entre les mains de ceux qui en ont besoin.</p>
        <p>Chez PlumeShop, nous avons à cœur de soutenir les livres d'occasion et de les rendre accessibles à tous. Nous sommes fiers de notre rôle en tant que premier vendeur de livres d'occasion en Belgique, et nous continuerons à travailler pour offrir des livres de qualité à des prix abordables, tout en préservant l'environnement et en soutenant notre communauté.</p>
       
        
      </section>
      <section class="stats">
        <h2>Nos chiffres clés</h2>
        <ul>
          <li>
            <span class="stat-value">{{ $booksSoldByYear }}</span>
            <span class="stat-label">Livres vendus cette année-ci</span>
        </li>
        <li>
            <span class="stat-value">{{ $booksSoldByMonth[date('F')] ?? 0 }}</span>
            <span class="stat-label">Livres vendus ce mois-ci</span>
        </li>
          <li>
            <span class="stat-value">X</span>
            <span class="stat-label">Clients satisfaits</span>
          </li>
          <li>
            <span class="stat-value">{{$num_partners}}</span>
            <span class="stat-label">Organisations partenaires</span>
          </li>
        </ul>
      </section>
      
    </main>


@endsection