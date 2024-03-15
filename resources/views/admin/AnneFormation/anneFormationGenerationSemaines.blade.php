<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de génération</title>
    
    <style>
     body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
}

#formationForm {
    flex: 1;
    margin: 20px;
}

form {
    margin-right: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="date"] {
    width: calc(100% - 12px);
    padding: 5px;
    margin-bottom: 10px;
    border-radius: 3px;
    border: 1px solid #ccc;
}

button {
    padding: 8px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

#joursFeries {
    margin-top: 20px;
}

#joursFeries h2 {
    margin-bottom: 10px;
}

#resultContainer {
    flex: 1;
    margin: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

table th,
table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #f2f2f2;
}


    </style>
</head>
<body>

<form id="formationForm" method="POST">
    @csrf
    <h2>Ajouter Les informations sur l'annee de formation :</h2>
    <label for="anneFormation">Année Formation</label>
    <input type="text" id="anneFormation" name="anneFormation" required>

    <label for="dateDebut">Date de début :</label>
    <input type="date" id="dateDebut" name="dateDebut" required>

    <label for="dateFin">Date de fin :</label>
    <input type="date" id="dateFin" name="dateFin" required>

    <!-- Section pour ajouter les jours fériés -->
    <div id="joursFeries">
        <h2>Ajouter le ou les  jour(s) férié(s) :</h2>
        <label for="du">Du :</label>
        <input type="date" id="du" name="du" required>

        <label for="au">Au :</label>
        <input type="date" id="au" name="au" required>

        <label for="libelle_jour_ferie">Libellé :</label>
        <input type="text" id="libelle_jour_ferie" name="libelle_jour_ferie" required>

        <button type="button" id="ajouterFerieBtn">Ajouter Jour(s) ferie(s)</button>
        <input type="submit" value="Générer Année de Formation" id="genererBtn" style="display:none;">
    </div>
    <input type="hidden" id="joursFeriesData" name="joursFeriesData">
</form>

<div id="resultContainer">
    <h2>Liste des jours fériés ajoutés :</h2>
    <table id="joursFeriesTable">
        <thead>
            <tr>
                <th>Libellé</th>
                <th>Date de début</th>
                <th>Date de fin</th>
            </tr>
        </thead>
        <tbody id="joursFeriesBody">
            <!-- Les données seront ajoutées dynamiquement ici -->
        </tbody>
    </table>
    <button id="validerModificationsBtn" style="display: none;">Valider les modifications</button>
</div>



    
<script>
    var joursFeriesData = [];

    // Gestionnaire d'événements pour le bouton de validation
    document.getElementById("validerModificationsBtn").addEventListener("click", function() {
        var tableRows = document.getElementById("joursFeriesBody").getElementsByTagName("tr");

        // Parcourir chaque ligne du tableau
        for (var i = 0; i < tableRows.length; i++) {
            var cells = tableRows[i].getElementsByTagName("td");

            // Récupérer les nouvelles valeurs des champs de saisie
            var libelle = cells[0].querySelector("input").value;
            var dateDebut = cells[1].querySelector("input").value;
            var dateFin = cells[2].querySelector("input").value;

            // Mettre à jour les données dans le tableau de jours fériés
            joursFeriesData[i].libelle = libelle;
            joursFeriesData[i].du = dateDebut;
            joursFeriesData[i].au = dateFin;
        }

        // Mettre à jour l'affichage du tableau avec les nouvelles données
        updateTable();
    });

    // Gestionnaire d'événements pour le bouton "Ajouter Jour(s) ferie(s)"
    document.getElementById("ajouterFerieBtn").addEventListener("click", function() {
        // Récupérer les valeurs des champs
        var du = document.getElementById("du").value;
        var au = document.getElementById("au").value;
        var libelle = document.getElementById("libelle_jour_ferie").value;

        // Ajouter les données dans le tableau
        joursFeriesData.push({
            libelle: libelle,
            du: du,
            au: au
        });

        // Mettre à jour l'affichage du tableau
        updateTable();

        // Vérifier si le nombre de jours fériés ajoutés est supérieur ou égal à 1
        if (joursFeriesData.length >= 1) {
            document.getElementById("validerModificationsBtn").style.display = "inline"; // Afficher le bouton "Valider les modifications"
        }
        if (joursFeriesData.length >= 1) {
            document.getElementById("genererBtn").style.display = "inline";
            document.getElementById("du").removeAttribute("required");
            document.getElementById("au").removeAttribute("required");
            document.getElementById("libelle_jour_ferie").removeAttribute("required");
        }
    });

    // Fonction pour mettre à jour l'affichage du tableau avec des champs de saisie modifiables
    function updateTable() {
        var tableBody = document.getElementById("joursFeriesBody");
        // Effacer le contenu actuel du tableau
        tableBody.innerHTML = "";

        // Ajouter chaque jour férié au tableau avec des champs de saisie
        joursFeriesData.forEach(function(jourFerie) {
            var newRow = document.createElement("tr");
            newRow.innerHTML = "<td><input type='text' value='" + jourFerie.libelle + "'></td>" +
                               "<td><input type='date' value='" + jourFerie.du + "'></td>" +
                               "<td><input type='date' value='" + jourFerie.au + "'></td>";
            tableBody.appendChild(newRow);
        });

        // Mettre à jour le champ de formulaire invisible avec les données des jours fériés
        document.getElementById("joursFeriesData").value = JSON.stringify(joursFeriesData);
    }
</script>

  


</body>
</html>
