<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       /* Reset CSS for basic styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Global styles */
body {
    font-family: Arial, sans-serif;
    font-size: 20px;
    background-color: #f2f2f2;
    color: #333;
    line-height: 1.6;
}

header {
    background-color:#007BFF;
    color: white;
    text-align: center;
    padding: 20px 0;
}
header h1 {
    font-size: 36px;
    color: white;
    padding: 10px;
    border-radius: 5px;
}

h1 {
    font-size: 36px;
    color: black;
    padding: 10px;
    border-radius: 5px;
}

main {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    display: flex;
    justify-content: space-between;
}

.content {
    flex: 1;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #007BFF;
    color: white;
}

td.highlighted {
    background-color: #FFFF00;
}

aside {
    flex: 0 0 20%;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
    text-align: center;
    background-color: #007BFF;
    color: white;
    padding: 10px 0;
    font-size: 14px;
}

/* Media query for responsiveness */
@media (max-width: 768px) {
    main {
        flex-direction: column;
    }

    aside {
        margin-top: 20px;
    }
}

    </style>
</head>
<body>
    <header>
        <h1>Page de Paiement</h1>
    </header>

    <main>
        <section class="content">
            <p>
                Bienvenue sur notre page de paiement. Vous pouvez choisir parmi plusieurs options de paiement pour régler votre commande en toute sécurité.
            </p>
            <br>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Option de Paiement</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><h1>Carte Bancaire</h1></td>
                        <td>Payez en toute sécurité avec votre carte Visa, Mastercard ou American Express.</td>
                    </tr>
                    <tr>
                        <td><h1>Paiement en Espèces (Cash)</h1></td>
                        <td>Réglez votre commande en espèces au moment de la réception de vos livres.</td>
                    </tr>
                    <tr>
                        <td><h1>Codes Promo</h1></td>
                        <td>Utilisez vos codes promotionnels pour bénéficier de réductions exclusives.</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>

            <p>
                Nous vous remercions de votre confiance. Si vous avez des questions ou des préoccupations concernant le paiement, n'hésitez pas à nous contacter. Nous sommes là pour vous aider.
            </p>

            <!-- Bouton "Retour à la page d'accueil" -->
            <div class="button-container">
                <a href="{{url('/')}}" class="return-button">Retour à la page d'accueil</a>
            </div>
        </section>
    </main>

    <footer>
        &copy; 2023 Plumeshop - Tous droits réservés
    </footer>
</body>
</html>
