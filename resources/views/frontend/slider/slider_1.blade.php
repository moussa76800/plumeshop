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
@endsection
