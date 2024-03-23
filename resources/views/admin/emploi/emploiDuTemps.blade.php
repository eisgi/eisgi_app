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
  th, td {

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

<table>
  <tr>
    <th rowspan="3">Jour/Filière</th>
    <th colspan="4">Lundi</th>
    <th colspan="4">Mardi</th>
    <th colspan="4">Mercredi</th>
    <th colspan="4">Jeudi</th>
    <th colspan="4">Vendredi</th>
    <th colspan="4">Samedi</th>
  </tr>
  <tr>
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
    <td>8h30-11h</td>
    <td>11h-13h30</td>
    <td>13h30-16h</td>
    <td>16h-18h30</td>
    <td>8h30-11h</td>
    <td>11h-13h30</td>
    <td>13h30-16h</td>
    <td>16h-18h30</td>
    <td>8h30-11h</td>
    <td>11h-13h30</td>
    <td>13h30-16h</td>
    <td>16h-18h30</td>
    <td>8h30-11h</td>
    <td>11h-13h30</td>
    <td>13h30-16h</td>
    <td>16h-18h30</td>
    <td>8h30-11h</td>
    <td>11h-13h30</td>
    <td>13h30-16h</td>
    <td>16h-18h30</td>
    <td>8h30-11h</td>
    <td>11h-13h30</td>
    <td>13h30-16h</td>
    <td>16h-18h30</td>
  </tr>
  {{-- 3ndi 25 col --}}

  @if(isset($groupes) && isset($formateurs) && isset($salles) && isset($modules))

@foreach($groupes as $groupe)
    <tr>

        <th >{{$groupe->libelleGroupe}}</th>

                <td>
                    Formateur
                </td>
            @for($i = 0; $i < 23; $i++)
                <td>
                    <select name="formateurs[]">
                        <option value="">Select Formateur</option>
                        @foreach($formateurs as $formateur)
                            <option value="{{$formateur->id}}">{{$formateur->nom}}-{{$formateur->prenom}}</option>
                        @endforeach
                    </select>
                </td>
            @endfor
    </tr>
    <tr>

        <th >{{$groupe->libelleGroupe}}</th>

                <td>
                    Module
                </td>

            @for($i = 0; $i < 23; $i++)
                <td>
                    <select name="modules[]">
                        <option value="">Select Module</option>
                        @foreach($modules as $module)
                            <option value="{{$module->id}}">{{$module->codeModule}}-{{$module->libelleModule}}</option>
                        @endforeach
                    </select>
                </td>
            @endfor

    </tr>
    <tr>

        <th >{{$groupe->libelleGroupe}}</th>

                <td>
                    Salle
                </td>
                @for($i = 0; $i < 23; $i++)
                <td>
                    <select name="salles[]">
                        <option value="">Select Salle</option>
                        @foreach($salles as $salle)
                            <option value="{{$salle->id}}">{{$salle->Salle}}</option>
                        @endforeach
                    </select>
                </td>
            @endfor
    </tr>


{{-- <tr>
    <td></td> <!-- Vous pouvez laisser cette colonne vide ou ajouter les données spécifiques du formateur -->
    <td></td> <!-- Vous pouvez laisser cette colonne vide ou ajouter les données spécifiques du module -->
    <td></td> <!-- Vous pouvez laisser cette colonne vide ou ajouter les données spécifiques de la salle -->
</tr> --}}
@endforeach
@endif



</table>

</body>
</html>
