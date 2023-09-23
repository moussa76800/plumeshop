<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cookies - Plumeshop</title>
    <link rel="stylesheet" href="style.css">
    <style>
    /* Style pour la gestion des cookies */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f7f7;
    color: #333;
}

header {
    background-color: #0099cc;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

h2 {
    font-size: 20px;
    margin-top: 20px;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.container p {
    margin: 0 0 20px;
}

.container a {
    text-decoration: none;
}

.container a:hover {
    text-decoration: underline;
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

footer {
    background-color: #0099cc;
    color: #fff;
    text-align: center;
    padding: 10px 0;
}
</style>

</head>
<body>
    <header>
        <h1>Gestion des Cookies</h1>
    </header>
    <main>
        <div class="container">
            <h2>Utilisation des Cookies</h2>
            <p>Notre site web utilise des cookies pour améliorer votre expérience de navigation. Les cookies sont de petits fichiers texte stockés sur votre ordinateur ou appareil mobile lorsque vous visitez un site web.</p>
            
            <p>Nous utilisons ces cookies pour analyser l'utilisation de notre site, personnaliser le contenu et les publicités, fournir des fonctionnalités de médias sociaux, et pour vous proposer une expérience de shopping optimale.</p>
            
            <p>En continuant à utiliser notre site, vous consentez à l'utilisation de cookies conformément à notre Politique de Confidentialité que vous trouverez dans la rubrique "Mentions Légales".</a>.</p>
            
            <h2>Gérer les Cookies</h2>
            <p>Vous pouvez gérer les cookies en modifiant les paramètres de votre navigateur pour accepter, refuser ou supprimer les cookies. Veuillez consulter la documentation de votre navigateur pour des instructions détaillées sur la gestion des cookies.</p>
            
            <h2>Questions et Contact</h2>
            <p>Si vous avez des questions sur notre utilisation des cookies, veuillez nous contacter à l'adresse suivante : PlumeShop@gmail.com.</p>
            
            <br>
            <br>
            <div class="bottom-button-container">
                <!-- Bouton "Retour à la page d'accueil" -->
                <a href="{{url('/')}}" class="return-button">Retour à la page d'accueil</a>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Plumeshop. Tous droits réservés.</p>
        <p>Mise à jour : 19.09.2023</p>
    </footer>
</body>
</html>
