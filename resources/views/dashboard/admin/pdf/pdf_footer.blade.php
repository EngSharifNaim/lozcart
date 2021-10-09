<!doctype html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
<body  >

<div class="information" style=" width:100%;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                {{ config('app.name') }}
            </td>
        </tr>

    </table>
</div>
</body>
</html>
