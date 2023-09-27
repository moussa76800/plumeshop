@extends('frontend.main_master')

@section('title')
@if (session()->get('language') == 'french') Accueil @else Home  @endif 
@endsection

@section('content')
<style>
  /* Styles CSS en ligne */
  /* ... Copiez vos styles CSS ici ... */
  
  /* Couleur de fond pour la section "about" */
  .about {
    background-color: #f5f5f5;
    padding: 50px;
    margin-top: 50px;
  }

  
  .about p {
    font-size: 18px;
    line-height: 1.5;
    margin-bottom: 20px;
    color: #333; /* Couleur texte noir */
  }
  h1 {
    color: #000;
    text-align: center;
    background-color: #87CEEB;
    padding: 10px;
    border-radius: 10px;
  }

  /* Couleur de fond pour la section "stats" */
  .stats {
    background-color: #f9f9f9;
    padding: 50px 0;
  }

  .stats h2 {
    font-size: 2em;
    text-align: center;
    margin-bottom: 50px;
    color: #007bff; /* Couleur bleu */
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
    color: #007bff; /* Couleur bleu */
  }

  .stats .stat-label {
    font-size: 1.2em;
    display: block;
    color: #777;
  }
</style>
@if (session()->get('locale') == 'fr')
<div class="container">
  <h1 style="color: #000; text-center"><b>Notre histoire</b></h1>
</div>


<main>
  <section class="about">
    <div class="container"> 
      <p>Chez <b>PlumeShop</b>, nous sommes passionnés par les livres d'occasion et nous nous engageons à leur donner une seconde vie. Nous sommes une entreprise belge qui croit en l'importance de l'environnement, du social et du sociétal, et c'est pourquoi nous avons construit notre ADN autour de ces trois piliers.</p>
      <p>Notre histoire a commencé avec notre fondateur, qui comme beaucoup d'amoureux des livres, s'est retrouvé avec des étagères pleines de livres lus et relus. Il a réalisé qu'il devait y avoir une meilleure façon de se débarrasser de ces livres, sans pour autant les jeter. C'est ainsi que PlumeShop est né.</p>
      <p>Nous sommes fiers d'être une entreprise engagée et nous travaillons dur pour réduire notre impact sur l'environnement. Nous offrons une solution de collecte gratuite partout en Belgique, pour les particuliers comme pour les professionnels, afin de récupérer les livres qui n'ont plus de place chez eux. Nous veillons également à ce que nos livraisons soient effectuées de manière responsable et respectueuse de l'environnement.</p>
      <p>Nous sommes également très attachés à notre rôle social et sociétal. Nous croyons que les livres sont un moyen important d'accéder à la culture et à l'éducation, et nous travaillons avec des associations et des organisations pour mettre des livres entre les mains de ceux qui en ont besoin.</p>
      <p>Chez PlumeShop, nous avons à cœur de soutenir les livres d'occasion et de les rendre accessibles à tous. Nous sommes fiers de notre rôle en tant que premier vendeur de livres d'occasion en Belgique, et nous continuerons à travailler pour offrir des livres de qualité à des prix abordables, tout en préservant l'environnement et en soutenant notre communauté.</p>
    </div>
  </section>
  
  <section class="stats">
    <div class="container">
      <h2>Nos chiffres clés</h2>
      <ul>
        <li>
          <span class="stat-value" style="color: #007bff;">{{ $booksSoldByYear }}</span>
          <span class="stat-label">Livres vendus cette année-ci</span>
        </li>
        <li>
          <span class="stat-value" style="color: #007bff;">{{ $booksSoldByMonth[date('F')] ?? 0 }}</span>
          <span class="stat-label">Livres vendus ce mois-ci</span>
        </li>
        <li>
          <span class="stat-value" style="color: #007bff;">X</span>
          <span class="stat-label">Clients satisfaits</span>
        </li>
        <li>
          <span class="stat-value" style="color: #007bff;">{{$num_partners}}</span>
          <span class="stat-label">Organisations partenaires</span>
        </li>
      </ul>
    </div>
  </section>
</main>
@else
<div class="container">
  <h1 style="color: #000; text-align: center"><b>Our Story</b></h1>
</div>

<main>
  <section class="about">
    <div class="container"> 
      <p>At <b>PlumeShop</b>, we are passionate about used books and committed to giving them a second life. We are a Belgian company that believes in the importance of the environment, social responsibility, and community, and we have built our DNA around these three pillars.</p>
      <p>Our story began with our founder, who, like many book lovers, found himself with shelves full of books that had been read and reread. He realized there had to be a better way to part with these books without simply discarding them. That's how PlumeShop was born.</p>
      <p>We take pride in being a socially and environmentally responsible company. We offer free book collection services across Belgium for both individuals and businesses to reclaim books that no longer have a place in their homes. We also ensure that our deliveries are made in a responsible and environmentally friendly manner.</p>
      <p>We are deeply committed to our social and community role. We believe that books are an important means of accessing culture and education, and we work with associations and organizations to get books into the hands of those in need.</p>
      <p>At PlumeShop, we are dedicated to supporting used books and making them accessible to all. We are proud to be the leading seller of used books in Belgium and will continue to work to offer quality books at affordable prices while preserving the environment and supporting our community.</p>
    </div>
  </section>
  
  <section class="stats">
    <div class="container">
      <h2>Our Key Figures</h2>
      <ul>
        <li>
          <span class="stat-value" style="color: #007bff;">{{ $booksSoldByYear }}</span>
          <span class="stat-label">Books sold this year</span>
        </li>
        <li>
          <span class="stat-value" style="color: #007bff;">{{ $booksSoldByMonth[date('F')] ?? 0 }}</span>
          <span class="stat-label">Books sold this month</span>
        </li>
        <li>
          <span class="stat-value" style="color: #007bff;">X</span>
          <span class="stat-label">Satisfied customers</span>
        </li>
        <li>
          <span class="stat-value" style="color: #007bff;">{{$num_partners}}</span>
          <span class="stat-label">Partner organizations</span>
        </li>
      </ul>
    </div>
  </section>
</main>



@endif
@endsection
