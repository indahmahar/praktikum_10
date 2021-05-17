<?php
include('koneksi.php'); //menyambungkan dengan file koneksi
$negara = mysqli_query($koneksi,"SELECT * from nama_negara"); //menampilkan isi dari form nama_negara
while($row = mysqli_fetch_array($negara)){ // jika terdapat data maka akan di simpan dan dikonversi ke data array
	$nama_negara[] = $row['nama_negara'];
	
	$query = mysqli_query($koneksi,"SELECT sum(total_cases) as total_cases from nama_negara where id_negara='".$row['id_negara']."'"); // menambahkan data total cases dari id negara
	$row = $query->fetch_array(); // row tersebut dijadikan array
	$jumlah_cases[] = $row['total_cases']; //jumlah cases akan ditampilkan
}
?>
<!doctype html>
<html>
<head>
	<title>Pie Chart</title>  <!--membuat title-->
	<script type="text/javascript" src="Chart.js"></script> <!--memanggil script chart.js-->
</head>
<body>
	<div id="canvas-holder" style="width:50%"> <!--membuat cart tesebut berukuran 800px untuk lebar dan tinggi-->
		<canvas id="chart-area"></canvas> <!--membuat suatu canvas-->
	</div>
	<script>
		var config = {  
			type: 'pie', // membuat varibel yang menyimpan type program pie.
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_cases); ?>, // mengambil data dan menampilkan jumlah_cases
					backgroundColor: [ // mengubah warna background color
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(249, 19, 147, 0.2)',
					'rgba(47, 79, 79, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 250, 205, 0.2)',
					'rgba(0, 0, 128, 0.2)'
					],
					borderColor: [  // mengubah warna bordercolor
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(249, 19, 147, 1)',
					'rgba(47, 79, 79, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255, 250, 205, 1)',
					'rgba(0, 0, 128, 1)'
					],
					label: 'Presentase terkena covid-19'  // membuat label
				}],
				labels: <?php echo json_encode($nama_negara); ?>}, // label tersebut akan mengambil data dan menampilkan nama_negara
			options: {
				responsive: true // grafik tersebut responsive
			}
		};
		window.onload = function() { // membuat suatu function onload 
			var ctx = document.getElementById('chart-area').getContext('2d'); // membuat chat area menjadi tampilan 2D
			window.myPie = new Chart(ctx, config); 
		};
		document.getElementById('randomizeData').addEventListener('click', function() { //pembuatan function click data akan masuk jika pie di klick
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});
			window.myPie.update(); 
		});
		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() { //data akan memiliiki warna yang disimpan dalam array
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length, // membuat label
			};
			for (var index = 0; index < config.data.labels.length; ++index) { // jika data index 0 maka data akan tampil dengan label
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length]; // membuat varibel color name dengan color name
				var newColor = window.chartColors[colorName]; // membuat color baru yang dimana tersimpan dalam array
				newDataset.backgroundColor.push(newColor);
			}
			config.data.datasets.push(newDataset); // adalah salah satu fungsi yang dapat kalian gunakan dalam mengolah data array
			window.myPie.update(); 
		});
		document.getElementById('removeDataset').addEventListener('click', function() { // jika data klik maka maka akan masuk dalam events
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>
</html>
