<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emploi du temps</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {

            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <button id="ajouterGroupe">Ajouter Groupe</button>
    <table id="ma_table">
        <h1>{{ $semaine }}</h1>
        <tr>
            <th rowspan="3">Jour/Filière</th>
            <th colspan="5">Lundi</th>
            <th colspan="4">Mardi</th>
            <th colspan="4">Mercredi</th>
            <th colspan="4">Jeudi</th>
            <th colspan="4">Vendredi</th>
            <th colspan="4">Samedi</th>
        </tr>
        <tr>
            <th colspan="1"></th>
            <th colspan="2">Matin</th>
            <th colspan="2">Après-midi</th>
            <th colspan="2">Matin</th>
            <th colspan="2">Après-midi</th>
            <th colspan="2">Matin</th>
            <th colspan="2">Après-midi</th>
            <th colspan="2">Matin</th>
            <th colspan="2">Après-midi</th>
            <th colspan="2">Matin</th>
            <th colspan="2">Après-midi</th>
            <th colspan="2">Matin</th>
            <th colspan="2">Après-midi</th>
        </tr>
        <tr>
            <td></td>
            <td><input name="seance" type="hidden" readonly value="SE1"/>8h30-11h</td>
            <td><input name="seance" type="hidden" readonly value="SE2"/>11h-13h30</td>
            <td><input name="seance" type="hidden" readonly value="SE3"/>13h30-16h</td>
            <td><input name="seance" type="hidden" readonly value="SE4"/>16h-18h30</td>
            <td><input name="seance" type="hidden" readonly value="SE1"/>8h30-11h</td>
            <td><input name="seance" type="hidden" readonly value="SE2"/>11h-13h30</td>
            <td><input name="seance" type="hidden" readonly value="SE3"/>13h30-16h</td>
            <td><input name="seance" type="hidden" readonly value="SE4"/>16h-18h30</td>
            <td><input name="seance" type="hidden" readonly value="SE1"/>8h30-11h</td>
            <td><input name="seance" type="hidden" readonly value="SE2"/>11h-13h30</td>
            <td><input name="seance" type="hidden" readonly value="SE3"/>13h30-16h</td>
            <td><input name="seance" type="hidden" readonly value="SE4"/>16h-18h30</td>
            <td><input name="seance" type="hidden" readonly value="SE1"/>8h30-11h</td>
            <td><input name="seance" type="hidden" readonly value="SE2"/>11h-13h30</td>
            <td><input name="seance" type="hidden" readonly value="SE3"/>13h30-16h</td>
            <td><input name="seance" type="hidden" readonly value="SE4"/>16h-18h30</td>
            <td><input name="seance" type="hidden" readonly value="SE1"/>8h30-11h</td>
            <td><input name="seance" type="hidden" readonly value="SE2"/>11h-13h30</td>
            <td><input name="seance" type="hidden" readonly value="SE3"/>13h30-16h</td>
            <td><input name="seance" type="hidden" readonly value="SE4"/>16h-18h30</td>
            <td><input name="seance" type="hidden" readonly value="SE1"/>8h30-11h</td>
            <td><input name="seance" type="hidden" readonly value="SE2"/>11h-13h30</td>
            <td><input name="seance" type="hidden" readonly value="SE3"/>13h30-16h</td>
            <td><input name="seance" type="hidden" readonly value="SE4"/>16h-18h30</td>

        </tr>
        {{-- 3ndi 25 col --}}

        @if (isset($groupesDistanciels) &&
                isset($groupesPresentiels) &&
                isset($salles) &&
                isset($groupesPhysiques) &&
                isset($seances) &&
                isset($jours))
            {{-- partie dist --}}
            <tr>
                <td>
                    <form >
                        @csrf

                        <select name="grouperecherche_selectionne_cle" id="grouperecherche_selectionne" >
                            <option value="" selected disabled hidden>Choisir Groupe</option>
                            <optgroup label="Groupes Distanciels" name="grouperecherche">
                                @foreach ($groupesDistanciels as $grDst)
                                    <option value="{{ $grDst->codeGroupeDS }}">{{ $grDst->codeGroupeDS }}</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Groupes Presentiels" name="grouperecherche">
                                @foreach ($groupesPresentiels as $grPrt)
                                    <option value="{{ $grPrt->codeGroupePR }}">{{ $grPrt->codeGroupePR }}</option>
                                @endforeach
                            </optgroup>

                        </select>
                    </form>
                </td>
                <td>Salle</td>
                    @foreach(range(1, 24) as $index)
                    <td>
                        <select>
                            <option value="" selected disabled hidden>Choisir Salle</option>
                            @foreach ($salles as $salle)
                                <option value="{{ $salle->codeSalle }}">{{ $salle->nomSalle }}</option>
                            @endforeach
                        </select>
                    </td>
                @endforeach



                <div id="resultatsFiltrage">
                    ....
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        let increment=0;
                        $('#ajouterGroupe').click(function() {
                        let selectGroup = `
                        <tr>
                            <td>
                                <form >
                                    @csrf
                                    <select name="grouperecherche_selectionne_cle" class="grouperecherche_selectionne">
                                        <option value="" selected disabled hidden>Choisir Groupe</option>
                                        <optgroup label="Groupes Distanciels" name="grouperecherche">
                                            <!-- Ajoutez les options pour les groupes distanciels ici -->
                                        </optgroup>
                                        <optgroup label="Groupes Presentiels" name="grouperecherche">
                                            <!-- Ajoutez les options pour les groupes présentiels ici -->
                                        </optgroup>
                                    </select>
                                </form>
                            </td>
                            <!-- Ajoutez vos colonnes de sélection de salle et autres ici -->
                        </tr>`;
                        $('#ma_table').append(selectGroup);

                })
                        $('#grouperecherche_selectionne').change(function() {
                            let grouperecherche_selectionne_valeur = $(this).val();
                            console.log(grouperecherche_selectionne_valeur)
                            $.ajax({
                                url: '{{ route("gestionemploi.remplir_select") }}',
                                type: 'POST',
                                data: {
                                    '_token': '{{ csrf_token() }}',
                                    'grouperecherche_selectionne_cle': grouperecherche_selectionne_valeur
                                },
                                dataType: 'json',
                                success: function(response) {
                                    console.log(response);
                                    let affectationsGroupeResponse = response.affectationsGroupeRecherche;
                                    let html = '<table class="table">';
                                    html += '<thead><tr><th>#</th><th>Formateur</th><th>Module</th></tr></thead>';
                                    html += '<tbody>';

                                    for (let i = 0; i < affectationsGroupeResponse.length; i++) {
                                        html += '<tr>';
                                        html += '<td class="text-center">' + (i + 1) + '</td>';
                                        html += '<td class="text-center">' + affectationsGroupeResponse[i].formateurs.nom + '</td>';
                                        html += '<td class="text-center">' + affectationsGroupeResponse[i].modules.libelleModule + '</td>';
                                        html += '</tr>';
                                    }
                                    html += '</tbody></table>';

                                    //formateurs
                                    let tableRow = '<tr><td></td><td>Formateur</td>';
                                    for (let i = 0; i < 24; i++) {
                                        tableRow += '<td><select name="formateur"><option value="" selected disabled hidden>Choisir Formateur</option>';
                                        let longeurAffec=affectationsGroupeResponse.length;
                                        for (let j = 0; j < longeurAffec; j++) {
                                            tableRow += '<option value="' + affectationsGroupeResponse[j].formateurs.matricule + '">' + affectationsGroupeResponse[j].formateurs.nom + '<input type="hidden" value=""/> '+'</option>';
                                        }
                                    }
                                    tableRow += '</tr>';

                                    //Modules
                                    tableRow+= '<tr><td></td><td>Modules</td>';
                                    for (let i = 0; i < 24; i++) {
                                        tableRow += '<td><select name="modules"><option value="" selected disabled hidden>Choisir Module</option>';
                                        let longeurAffec=affectationsGroupeResponse.length;
                                        for (let j = 0; j < longeurAffec; j++) {
                                            tableRow += '<option value="' + affectationsGroupeResponse[j].modules.id + '">' + affectationsGroupeResponse[j].modules.libelleModule + '</option>';
                                        }
                                    }
                                    tableRow += '</tr>';
                                    $('#resultatsFiltrage').html(html);
                                    $('#ma_table').append(tableRow);
                                }
                            });
                        });
                    });
                </script>


            </tr>
        @endif



    </table>



</body>

</html>
