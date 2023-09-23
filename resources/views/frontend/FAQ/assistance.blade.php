<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aide et Assistance - Plumeshop</title>
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
        <h1>Bienvenue dans notre Centre d'Aide et d'Assistance</h1>
    </header>
    <main>
        <section>
            <h2>Foire aux Questions (FAQ)</h2>
            <p>
                Vous trouverez dans notre Foire aux Questions (FAQ) des réponses aux questions les plus fréquemment posées par nos clients. Que vous ayez des interrogations sur les modalités de paiement, les délais de livraison, les retours de produits ou d'autres sujets, notre FAQ est là pour vous guider.
            </p>
        </section>
        <section>
            <h2>Guides d'Utilisation</h2>
            <p>
                Nos guides d'utilisation détaillés sont conçus pour vous aider à profiter pleinement de nos produits. Que vous recherchiez des instructions d'assemblage, des conseils d'entretien ou des informations sur les caractéristiques techniques, nos guides sont une ressource précieuse.
            </p>
        </section>
        <section>
            <h2>Service Client dédié</h2>
            <p>
                Si vous ne trouvez pas la réponse à votre question dans notre FAQ ou nos guides, notre équipe de service client dédiée est prête à vous aider. Vous pouvez nous contacter par téléphone au [Numéro de Téléphone] ou par e-mail à <a href="mailto:contact@plumeshop.com">contact@plumeshop.com</a>. Notre équipe compétente et amicale est là pour répondre à toutes vos questions et résoudre vos problèmes.
            </p>
        </section>
        <section>
            <h2>Assistance en Ligne</h2>
            <p>
                Pour une assistance en temps réel, notre chat en ligne est disponible pendant nos heures d'ouverture. Vous pouvez discuter en direct avec un de nos agents du service client qui vous guidera à travers vos préoccupations.
            </p>
        </section>
        <section>
            <h2>Suivi de Commande</h2>
            <p>
                Si vous souhaitez suivre l'état de votre commande, utilisez simplement notre outil de suivi de commande en ligne. Entrez votre numéro de commande et votre adresse e-mail, et vous recevrez instantanément des informations à jour sur l'emplacement de votre colis.
            </p>
        </section>
        <section>
            <h2>Commentaires et Suggestions</h2>
            <p>
                Chez Plumeshop, nous apprécions vos commentaires et suggestions. Vos retours sont essentiels pour nous aider à améliorer nos produits et services. N'hésitez pas à nous faire part de vos idées et de vos préoccupations.
            </p>
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
        <p>&copy; 2023 Plumeshop. Tous droits réservés.</p>
    </footer>
</body>
</html>
