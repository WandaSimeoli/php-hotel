<?php
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
    ];
    $filteredHotels = [];
    foreach ($hotels as $hotel) {
        if(isset($_GET['parking'])) {
            if ($_GET['parking'] == '1'
            &&
            $hotel['parking'] == true)
            { $filteredHotels[] = $hotel;} 
            else if  ($_GET['parking'] == '0'
            &&
            $hotel['parking'] == false ) {
                $filteredHotels[] = $hotel;
            } else if ( $_GET['parking'] == '')  
            {
                $filteredHotels[] = $hotel; 
            } 
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>PHP Hotel</title>
</head>
<body>
    <header>
        <h1>
            Hotels
        </h1>
    </header>
    <main>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">
                        Nome Hotel
                    </th>
                    <th scope="col">
                       Descrizione
                    </th>
                    <th scope="col">
                        Parcheggio
                    </th>
                    <th scope="col">
                       Voto
                    </th>
                    <th scope="col">
                       Distanza dal centro
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($filteredHotels as $index => $singleHotel) {
                    ?>
                    <tr>
                        <td scope="row">
                            <?php 
                           echo $singleHotel["name"];
                            ?>
                        </td>
                        <td scope="row">
                            <?php 
                           echo $singleHotel["description"];
                            ?>
                        </td>
                        <td scope="row">
                            <?php 
                            if ($singleHotel["parking"] == true) {
                                echo 'Si';
                            } else {
                                echo 'No';
                            }
                            ?>
                        </td>
                        <td scope="row">
                            <?php 
                           echo $singleHotel["vote"];
                            ?>
                        </td>
                        <td scope="row">
                            <?php 
                           echo $singleHotel["distance_to_center"] . 'km';
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <form action="" method="GET">
            <label for="parking">Seleziona </label>
                <select class="form-select w-25" name="parking" id="parking">
                  <option value="">Tutti gli hotel</option>
                  <option value="1">Hotel con parcheggio</option>
                  <option value="0">Hotel senza parcheggio</option>
                </select>
                <button type="submit" class="btn btn-info mt-3">Cerca</button>
                </form>
    </main>
</body>
</html>