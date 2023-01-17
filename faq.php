
    <?php 
     include('php/header.php');
     include('php/connect.php');


       $name = "";
       $price = "";

    //    query to get data from the table
      $sql = "SELECT * FROM `currency`";
      $result = mysqli_query($conn, $sql);

    //   loop throught the returned data
      while($row = mysqli_fetch_array($result)) 
      {
          $name = $name . '"'. $row['name'].'",';
          $price = $price . '"'. $row['price'].'",';
      }
      $name = trim($name,",");
      $price = trim($price,",");

     ?>




     <canvas id="myChart" style="width: 100%; height: 60vh; background: #222; border:1px solid black">

     </canvas>

     <script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $name ?>],
        datasets: 
        [{
            label: 'Data 1',
            data: [<?php echo $name ?>],
            backgroundColor: [
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 3
        },
        {
            label: 'Data 1',
            data: [<?php echo $price ?>],
            backgroundColor: [
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 3
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

     </script>
    <?php 
     include('php/footer.php');
     ?>
