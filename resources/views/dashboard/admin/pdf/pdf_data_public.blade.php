<!doctype html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$patient->name}}</title>

    <style type="text/css">
        @page {
            margin: 0;
        }

        body {
            margin: 0;
            width:100%
        }

        * {
            font-family: "DejaVu Sans", sans-serif !important;
        }

        a {
            color: #fff;
            text-decoration: none;
        }
        div.table-title {
            display: block;
            /*margin: 20px;*/
            /*max-width: 600px;*/
            padding:5px;
            /*width: 100%;*/
        }

        .table-title h3 {
            color: #000;
            font-size: 18px;
            font-weight: 400;
            font-style:normal;
            text-align: center;
            font-family: "Roboto", helvetica, arial, sans-serif;
            text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
            text-transform:uppercase;
        }


        /*** Table Styles **/

        .table-fill {
            background: white;
            /*border-radius:3px;*/
            border-collapse: collapse;
            /*height: 320px;*/
            margin: auto;
            /*max-width: 600px;*/
            /*padding:5px;*/
            width: 90%;
            /*box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);*/
            /*animation: float 5s infinite;*/
        }

        .table-fill th {
            color:#D5DDE5;;
            background:#1b1e24;
            /*border-bottom:4px solid #9ea7af;*/
            border-right: 1px solid #343a45;
            font-size:15px;
            font-weight: 100;
            padding:20px;
            text-align:center;
            /*text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);*/
            vertical-align:middle;
        }

        .table-fill th:first-child {
            border-top-left-radius:3px;
        }

        .table-fill  th:last-child {
            border-top-right-radius:3px;
            border-right:none;
        }

        .table-fill tr {
            border-top: 1px solid #C1C3D1;
            border-bottom: 1px solid #C1C3D1;
            color:#666B85;
            font-size:14px;
            font-weight:normal;
            text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
        }
        .table-fill tr:first-child {
            border-top:none;
        }

        .table-fill  tr:last-child {
            border-bottom:none;
        }

        .table-fill  tr:nth-child(odd) td {
            background:#EBEBEB;
        }

        .table-fill  tr:last-child td:first-child {
            border-bottom-left-radius:3px;
        }

        .table-fill  tr:last-child td:last-child {
            border-bottom-right-radius:3px;
        }

        .table-fill  td {
            background:#FFFFFF;
            padding:10px;
            text-align:center;
            vertical-align:middle;
            font-weight:300;
            font-size:18px;
            /*text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);*/
            border-right: 1px solid #C1C3D1;
        }

        .table-fill  td:last-child {
            border-right: 0px;
        }

        .table-fill  th.text-left {
            text-align: left;
        }

        .table-fill  th.text-center {
            text-align: center;
        }

        .table-fill  th.text-right {
            text-align: right;
        }

        .table-fill  td.text-left {
            text-align: left;
        }

        .table-fill td.text-center {
            text-align: center;
        }

        .table-fill td.text-right {
            text-align: right;
        }

        .information {
            background-color: #768aec ;
            color: #FFF;
            font-weight: bold;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 10px;
        }
    </style>


</head>
<body   >

<div class="information">
    <table style="width: 100%;">
        <tr>
            <td align="center" style="width: 50%;vertical-align:top">
                <img width="64" height="100" style="border-radius: 8px;" src="data:image/jpeg;base64,
                    {{ base64_encode(@file_get_contents(url(env('BACKEND_URL').'/public/uploads/static/logo-doctor.png'))) }}">
                    <br>
                   Company Name :{{ config('app.name') }}<br>
                    Email : company@gmail.com<br>
                    Mobile :0592555309
            </td>
        </tr>

    </table>
</div>


<br/>
<div>
    <table >
        <tr>
            <td align="right" style="width: 100px;vertical-align:middle">
                <img width="64" style="border-radius: 8px;" src="data:image/jpeg;base64,
                    {{ base64_encode(@file_get_contents(url(env('BACKEND_URL').$patient->photo))) }}">
            </td>
            <td  style="width: 25%; text-align: left;vertical-align:top;float: left" >

            <pre>
                Patient Name : {{$patient->name}}
                Patient Email :    {{$patient->email}}
                Patient Mobile :    {{$patient->mobile}}
                {{__('Number of bookings')}} : {{$patient['bookings']->count()}}
                {{__('Medical visits')}} : {{$patient['visits']->count()}}
            </pre>
            </td>
        </tr>

    </table>
</div>

<div class="table-title">
    <h3>Health Information</h3>
</div>
<table class="table-fill">
    <thead>
    <tr>
        <th>{{__('Blood Type')}}</th>
        <th>{{__('Length')}}</th>
        <th>{{__('Weight')}}</th>
        <th>{{__('Chronic Diseases')}}</th>
        <th>{{__('Special Drugs')}}</th>
        <th>{{__('Notes')}}</th>
    </tr>
    </thead>
    <tbody class="table-hover">
    <tr>
        <td>{{$patient->health_information->blood_type ??'Not Found'}}</td>
        <td>{{$patient->health_information->length ??'Not Found'}}</td>
        <td >{{$patient->health_information->weight ??'Not Found'}}</td>
        <td >
            @if ($patient->health_information !=null)
                @foreach($patient->health_information->chronic_diseases as $item)
                    <ul >
                        <li>{{$item->name ??'Not Found'}}</li>
                    </ul>
                @endforeach
            @else
                {{__('Not Found')}}
            @endif
        </td>
        <td >{{$patient->health_information->special_drugs ??'Not Found'}}</td>
        <td >{{$patient->health_information->notes ??'Not Found'}}</td>
    </tr>

    </tbody>
</table>

</body>
</html>
