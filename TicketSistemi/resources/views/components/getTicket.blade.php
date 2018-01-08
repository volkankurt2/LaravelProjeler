<?php

$data = ['meta' => [
    'page' => 1,
    'pages' => 1,
    'perpage' => -1,
    'total' => '5',
    'sort' => 'asc',
    'field' => 'RecordID',
]];

foreach ($posts as $key => $post) {
    $data['data'][$key] = [
        'RecordID'=> 1,
        'OrderID' => '53150-422',
        'ShipCountry' => 'AF',
        'ShipCity' => 'Qaram Q\u014dl',
        'ShipName' => 'Welch Group',
        'ShipAddress' => '45 Nova Road',
        'CompanyEmail' => 'jbutner0@de.vu',
        'CompanyAgent' => 'John Butner',
        'CompanyName' => 'Bosco-Turner',
        'Currency' => 'AFN',
        'Notes' => 'platea dictumst morbc condimentum neque sapien',
        'Department' => 'Baby',
        'Website' => 'dropbox.com',
        'Latitud' => '36.533332999999999',
        'Longitud' => '69.016666999999998',
        'ShipDate' => '5\/20\/2017',
        'PaymentDate' => '2017-03-17 07:39:53',
        'TimeZone' => 'Asia\/Kabul',
        'Status'=> 4,
        'Type'=> 3,
        'TotalPayment' => '80,238.30 AFN',
    ];
}
echo json_encode($data);

@section('js')

@endsection

