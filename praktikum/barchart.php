<?php
include('koneksi.php'); //menyambungkan dengan file koneksi
$negara = mysqli_query($koneksi,"SELECT * from nama_negara"); //menampilkan isi dari form nama_negara
while($row = mysqli_fetch_array($negara)){ // jika terdapat data maka akan di simpan dan dikonversi ke data array
	$nama_negara[] = $row['nama_negara'];
	
	$query = mysqli_query($koneksi,"SELECT sum(total_cases) as total_cases from nama_negara where id_negara='".$row['id_negara']."'"); // menambahkan data total cases dari id negara
	$row = $query->fetch_array(); // row tersebut dijadikan array
	$jumlah_cases[] = $row['total_cases']; //jumlah cases akan ditampilkan
};
?>
<!DOCTYPE html> 
<html>
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title> <!--membuat title-->
	<script type="text/javascript" src="Chart.js"></script> <!--memanggil script chart.js-->
</head>
<body>
	<div style="width: 800px;height: 800px"> <!--membuat cart tesebut berukuran 800px untuk lebar dan tinggi-->
		<canvas id="myChart"></canvas> <!--membuat suatu canvas-->
	</div>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d'); //canvas dari elemen cart diubah ke 2d
		var myChart = new Chart(ctx, { //mendeklarasikan ke dalam varibel baru
			type: 'bar', //menjadikan chart bertipe bar
			data: {
				labels: <?php echo json_encode($nama_negara); ?>, // mengambil data dan menampilkan nama negara
				datasets: [{
					label: 'Grafik Covid-19',// membuat label
					data: <?php echo json_encode($jumlah_cases); ?>, // mengambil data dan juga menampilkan data tersebut
					backgroundColor: 'rgba(255, 99, 132, 0.2)', // mengubah warna backgroundcolour 
					borderColor: 'rgba(255,99,132,1)', // mengubah warna bordercolour
					borderWidth: 1 // menambahkan suatu border berukuran 1px
				}]
			},
			options: { // membuat option atau menu
				scales: { // membuat scale jarak
					yAxes: [{ // membuat yAxses
						ticks: { // menjadikan ticks
							beginAtZero:true 
						}
					}]
				}
			}
		});
	</script>
</body>
</html>