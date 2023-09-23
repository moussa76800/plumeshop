<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>État des Livres - Plumeshop</title>
    <style>
        /* Réinitialisation des styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Style de base pour le corps de la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Pour occuper au moins la hauteur de la fenêtre */
        }

        /* Style de l'en-tête */
        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        /* Style de la section principale */
        main {
            flex-grow: 1; /* Pour pousser le contenu vers le bas */
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        /* Style des sections */
        section {
            margin-bottom: 20px;
        }

        section h2 {
            color: #007bff;
        }

        section p {
            margin-bottom: 10px;
        }

        .return-button {
        display: block;
        padding: 10px 20px;
        background-color: #007BFF;
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
    }

        /* Style du pied de page */
        footer {
            text-align: center;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <h1>État des Livres</h1>
    </header>
    
    <main>
        <section>
            <h2>Les différents états</h2>
            <BR>
        <BR>
            <p>Les livres d’occasion vendus par Plumeshop sont en excellent état. Nous précisons systématiquement leur état sur la fiche du livre :</p>
            <ul>
                <li><strong>État Neuf :</strong> Nos livres d'occasion sont comme neufs. Couverture, dos, coins et pages intérieures sont en parfait état, sans aucune tache, déchirure, note, marque, inscription ou annotation manuscrite.</li>
            </ul>
        </section>
        <br>
        <bR>
        <section>
            <h2>Les livres de bibliothèque</h2>
            <BR>
<br>
            <p>Nous travaillons avec des bibliothèques éco-responsables qui nous confient les livres sortis de leur inventaire plutôt que de les jeter. Nous les vendons pour eux et reversons une part des revenus nets générés par la vente de livres à des associations œuvrant pour l’humain et l'environnement.</p>
            <p>La mention bibliothèque est présente sur la fiche du livre quand le livre en stock provient d’une bibliothèque.</p>
            <p>Les livres issus de bibliothèques ont systématiquement une plastification et peuvent avoir des étiquettes sur la couverture ou des tampons de bibliothèque sur les pages intérieures.</p>
        </section>
        <br>
        <br>
        <br>
        <div class="button-container">
            <!-- Bouton "Retour à la page d'accueil" -->
            <a href="{{url('/')}}" class="return-button">Retour à la page d'accueil</a>
        </div>
    </main>
    <footer>
        © 2023 Plumeshop - Tous droits réservés
    </footer>
</body>
</html>
