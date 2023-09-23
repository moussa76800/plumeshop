
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
    background-color: #f2f2f2;
    color: #333;
    line-height: 1.6;
}

header {
    background-color: #007BFF;
    color: white;
    text-align: center;
    padding: 20px 0;
}

h1 {
    font-size: 36px;
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
        <h1>Livraison en Belgique</h1>
    </header>

    <main>
        <section class="content">
            <p>
                Chez Plumeshop, nous sommes fiers de vous offrir une livraison rapide en Belgique pour vos livres d'occasion en parfait état. Nous comprenons que vous souhaitez recevoir vos précieux livres dans les plus brefs délais, c'est pourquoi nous vous proposons notre service de livraison en 48 heures.
            </p>
<br>
<br>
<br>
            <table>
                <thead>
                    <tr>
                        <th>Option de Livraison</th>
                        <th>Délai de Livraison</th>
                        <th>Tarifs</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Livraison Rapide en Belgique</td>
                        <td>48 heures</td>
                        <td class="highlighted">Gratuite (sans minimum d'achat)</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>

            <p>
                Notre objectif est de rendre l'accès à la lecture aussi pratique que possible pour nos clients en Belgique. Nous vous offrons la livraison gratuite en 48 heures, quel que soit le montant de votre achat. Vous recevrez vos livres en excellent état dans un délai de 48 heures à partir de la confirmation de votre commande.
            </p>

            <p>
                Chez Plumeshop, nous nous soucions de l'environnement. Pour réduire notre empreinte carbone, nous vous encourageons à regrouper vos commandes au lieu d'acheter un livre à la fois. Vous pouvez ajouter plusieurs livres à votre panier et effectuer une seule commande pour économiser sur les frais de port.
            </p>

            <p>
                Nous espérons que notre service de livraison en 48 heures en Belgique rendra votre expérience de lecture encore plus agréable. Si vous avez des questions ou des besoins spécifiques, n'hésitez pas à nous contacter. Nous sommes là pour vous servir.
            </p> 
            <br>
        <br>
        <br>
    <div class="button-container">
            <!-- Bouton "Retour à la page d'accueil" -->
            <a href="{{url('/')}}" class="return-button">Retour à la page d'accueil</a>
        </div>
        </section>
   
    </main>
    

    <footer>
        &copy; 2023 Plumeshop - Tous droits réservés
    </footer>
</body>
</html>
</html>
