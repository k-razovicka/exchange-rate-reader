<head>
    <title>Currency Rates</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

    <style>
        table th:nth-child(3), td:nth-child(3) {
            display: none;
        }

        table, th {
            border-bottom: none !important;
        }

        .dataTables_wrapper .dataTables_paginate {
            text-align: center !important;
            float: none !important;
            margin-top: 15px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #28a745;
            color: black !important;
            border-radius: 4px;
            border: 1px solid #828282;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            background: #28a745;
            color: black !important;
        }

    </style>
</head>

<p class="text-right small mr-2 mt-2">last update: {{$lastUpdate}}</p>
<h4 class="text-center mt-4">Current Rate Table</h4>
<p class="text-center small">*click on currency to see previous days rates</p>


<table id="currency-table" class="table table-striped table-hover display col-md-6 m-auto">

    <thead class="thead-dark" >
    <tr>
        <th>Currency</th>
        <th>Rate</th>
    </tr>
    </thead>

    <tbody>
    @foreach($lastDayRates as $key => $value)
        <tr>
            <td>
                <a href="/rate/{{$key}}">
                    <button class="btn btn-outline-success">{{$key}} </button>
                </a>
            </td>

            <td class="align-middle">
                {{$value}}
            </td>
        </tr>
    @endforeach
    </tbody>

</table>

<script>
    $(document).ready(function () {
        $('#currency-table').DataTable({
            stripeClasses: [],
            responsive: true,
            "searching": false,
            "lengthChange": false,
            "info": false,
            "ordering": false,
            "pagingType": "numbers",
            "pageLength": 7
        });
    });
</script>
