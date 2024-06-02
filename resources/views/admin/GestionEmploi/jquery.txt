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
        <h1>{{$semaine}}</h1>
    <tr>
        <th rowspan="3">Jour/Filière</th>
        <th colspan="5">Lundi</th>
        {{-- <th colspan="4">Mardi</th>
        <th colspan="4">Mercredi</th>
        <th colspan="4">Jeudi</th>
        <th colspan="4">Vendredi</th>
        <th colspan="4">Samedi</th> --}}
    </tr>
    <tr>
        <th colspan="1"></th>
        <th colspan="2">Matin</th>
        <th colspan="2">Après-midi</th>
        {{-- <th colspan="2">Matin</th>
        <th colspan="2">Après-midi</th>
        <th colspan="2">Matin</th>
        <th colspan="2">Après-midi</th>
        <th colspan="2">Matin</th>
        <th colspan="2">Après-midi</th>
        <th colspan="2">Matin</th>
        <th colspan="2">Après-midi</th>
        <th colspan="2">Matin</th>
        <th colspan="2">Après-midi</th> --}}
    </tr>
    <tr>
        <td></td>
        <td>8h30-11h</td>
        <td>11h-13h30</td>
        <td>13h30-16h</td>
        <td>16h-18h30</td>
        {{-- <td>8h30-11h</td>
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
        <td>16h-18h30</td> --}}
    </tr>
    {{-- 3ndi 25 col --}}

    @if(isset($groupesDistanciels) && isset($groupesPresentiels)  && isset($salles) && isset($groupesPhysiques) && isset($seances)
        && isset($jours)
    )
    {{-- partie dist --}}
<tr>
     <td>
        <form action={{route("gestionemploi.remplir_select")}} method="POST">
            @csrf

                <select name="grouperecherche">
                    <optgroup label="Groupes Distanciels" name="grouperecherche">
                        @foreach ( $groupesDistanciels as $grDst )

                            <option value="{{$grDst->codeGroupeDS}}">{{$grDst->codeGroupeDS}}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Groupes Presentiels" name="grouperecherche">
                        @foreach ( $groupesPresentiels as $grPrt )

                            <option value="{{$grPrt->codeGroupePR}}">{{$grPrt->codeGroupePR}}</option>
                        @endforeach
                    </optgroup>

                </select>
                <button type="submit">Choisir</button>
        </form>
    </td>
    <td>Salle</td>
    <td>
        <select>
        @foreach ( $salles as $salle )
                <option value="{{$salle->codeSalle}}">{{$salle->nomSalle}}</option>
        @endforeach
    </select>

    </td>

</tr>
    @endif



    </table>



</body>
</html>
