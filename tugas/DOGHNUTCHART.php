<?php

	include('koneksi.php'); // menyambungkan dengan file koneksi agar tersambung dengan database

	$query 	= "SELECT * FROM tb_covid19"; // Menampilkan tb_covid19 yang sudah kita buat
	$result	= mysqli_query($koneksi, $query); // mengecek kembali koneksi dan query

	if( mysqli_num_rows($result) > 0 ){	// menampilkna data jika row lebih dari 0

		while( $row = mysqli_fetch_assoc($result) ){  // row tersebut disimpan didalam result

			$country[] 			= $row['country'];	// menyimpan data country dalam row
			$total_cases[]		= $row['total_cases'];  // menyimpan data total_cases dalam row
			$new_cases[]		= $row['new_cases'];   // menyimpan data new_cases dalam row
			$total_deaths[]		= $row['total_deaths'];  // menyimpan data total_deaths dalam row
			$new_deaths[]		= $row['new_deaths'];	// menyimpan data new_deaths dalam row
			$total_recovered[] 	= $row['total_recovered'];  // menyimpan data total_recovered dalam row
			$active_cases[] 	= $row['active_cases'];   // menyimpan data active_cases dalam row

		}

	}else{
		echo "<script> alert('DATA KOSONG '); </script>";  // jika tidak ada data makan akan menampilkan alert
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="Chart.js"></script> <!--menghubungkan dengan file chart.js-->
</head>
<body>

	<div style="width: 100%;">   <!--membuat ukuran menjadi 100 persen-->
		<canvas id="chart_bar"></canvas>  <!--membuat canvas-->
	</div>

	<script>

		var ctx  = document.getElementById("chart_bar").getContext("2d");  //cart line diubah menjadi bentuk 2d
		
		var data = {

					labels : <?php echo json_encode($country); ?>,  // menampilkan label dari nama negara

					datasets : [

								{
									label 	: "Total Cases",  // menampilkan label dari total cases
									data 	: <?php echo json_encode($total_cases); ?>,// data akan menampilkan dari total cases
									backgroundColor : [ // merubah warna
														'rgba(165, 42, 42, 1)',
														'rgba(255, 140, 25, 1)',
														'rgba(255, 0, 0, 1)',
														'rgba(140, 255, 25, 1)',
														'rgba(105, 105, 105, 1)',
														'rgba(205, 92, 92, 1)',
														'rgba(251, 160, 122, 1)',
														'rgba(250, 99, 71, 1)',
														'rgba(220,20,60,1)',
														'rgba(240,128,128, 1)',
														'rgba(255,160,122, 1)'
													  ]
								},

								{
									label 	: "New Cases",  // menampilkan label dari new cases
									data 	: <?php echo json_encode($new_cases); ?>, // data akan menampilkan dari new cases
									backgroundColor : [ // merubah warna
														'rgba(165, 42, 42, 1)',
														'rgba(255, 140, 25, 1)',
														'rgba(255, 0, 0, 1)',
														'rgba(140, 255, 25, 1)',
														'rgba(105, 105, 105, 1)',
														'rgba(205, 92, 92, 1)',
														'rgba(251, 160, 122, 1)',
														'rgba(250, 99, 71, 1)',
														'rgba(220,20,60,1)',
														'rgba(240,128,128, 1)',
														'rgba(255,160,122, 1)'
													  ]
								},

								{
									label 	: "Total Deaths", // menampilkan label dari total deaths
									data 	: <?php echo json_encode($total_deaths); ?>, // data akan menampilkan dari total deaths
									backgroundColor : [ // merubah warna
														'rgba(165, 42, 42, 1)',
														'rgba(255, 140, 25, 1)',
														'rgba(255, 0, 0, 1)',
														'rgba(140, 255, 25, 1)',
														'rgba(105, 105, 105, 1)',
														'rgba(205, 92, 92, 1)',
														'rgba(251, 160, 122, 1)',
														'rgba(250, 99, 71, 1)',
														'rgba(220,20,60,1)',
														'rgba(240,128,128, 1)',
														'rgba(255,160,122, 1)'
													  ]
								},

								{
									label 	: "New Deaths", // menampilkan label dari new deaths
									data 	: <?php echo json_encode($new_deaths); ?>, // data akan menampilkan dari new deaths
									backgroundColor : [ // merubah warna
														'rgba(165, 42, 42, 1)',
														'rgba(255, 140, 25, 1)',
														'rgba(255, 0, 0, 1)',
														'rgba(140, 255, 25, 1)',
														'rgba(105, 105, 105, 1)',
														'rgba(205, 92, 92, 1)',
														'rgba(251, 160, 122, 1)',
														'rgba(250, 99, 71, 1)',
														'rgba(220,20,60,1)',
														'rgba(240,128,128, 1)',
														'rgba(255,160,122, 1)'
													  ]
								},
								{
									label 	: "Total Recovered", // menampilkan label dari total recovered
									data 	: <?php echo json_encode($total_recovered); ?>, // data akan menampilkan dari total recovered
									backgroundColor : [ // merubah warna
														'rgba(165, 42, 42, 1)',
														'rgba(255, 140, 25, 1)',
														'rgba(255, 0, 0, 1)',
														'rgba(140, 255, 25, 1)',
														'rgba(105, 105, 105, 1)',
														'rgba(205, 92, 92, 1)',
														'rgba(251, 160, 122, 1)',
														'rgba(250, 99, 71, 1)',
														'rgba(220,20,60,1)',
														'rgba(240,128,128, 1)',
														'rgba(255,160,122, 1)'
													  ]
								},
								{
									label 	: "Active Cases", // menampilkan label dari active cases
									data 	: <?php echo json_encode($active_cases); ?>, // data akan menampilkan dari active cases
									backgroundColor : [ // merubah warna
														'rgba(165, 42, 42, 1)',
														'rgba(255, 140, 25, 1)',
														'rgba(255, 0, 0, 1)',
														'rgba(140, 255, 25, 1)',
														'rgba(105, 105, 105, 1)',
														'rgba(205, 92, 92, 1)',
														'rgba(251, 160, 122, 1)',
														'rgba(250, 99, 71, 1)',
														'rgba(220,20,60,1)',
														'rgba(240,128,128, 1)',
														'rgba(255,160,122, 1)'
													  ]
								}
					]

		};

		var myLineChart = new Chart(ctx, { // membuat varibel baru
		    type: 'doughnut', // membuat type menjadi doughnut
		    data: data, // membuat varibel data
		    options: {   // membuat options
	    	            responsive: true,  // membuat program menjadi responsive
					    tooltips: {  // merupakan tampilan informasi berupa teks maupun gambar yang tampil saat cursor di arahkan (mouse over) pada sebuah item
						      callbacks: {  //untuk memanggil fungsi lain, setelah suatu hal dijalankan
						        label: function(item, data){ // membuat label function item dan data
						        console.log(data.labels, item); //consule log dengan data labels dan item
						            return data.datasets[item.datasetIndex].label+ ": "+ data.labels[item.index]+ ": "+ data.datasets[item.datasetIndex].data[item.index]; // kembali pada datashets
						        }
						    }
						}
    	            }
		});

	</script>

</body>
</html>