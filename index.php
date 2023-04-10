<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa </title>
	<!-- tambahkan link ke file CSS Bootstrap dan DataTables -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
	<style type="text/css">
		/* tambahkan CSS tambahan */
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
			border: 1px solid black;
		}

		th {
			background-color: #4CAF50;
			color: white;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
</head>
<body>

	<div class="container">
		<h1>Data Mahasiswa TI.20.A2</h1>

		<!-- tambahkan kelas "table" dan "table-striped" dari Bootstrap -->
		<table id="mahasiswaTable" class="table table-striped">
			<thead>
				<tr>
					<th>Nomer</th>
					<th>NIM</th>
					<th>Nama</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				// ambil data dari API 
				$data = file_get_contents("https://api.steinhq.com/v1/storages/642110d4eced9b09e9c62384/20A2"); 
				//ubah data JSON menjadi arry php
				$data = json_decode($data, true);
				//looping data menampilkan data dalam tabel
				$no =1;
				foreach($data as $item) {
				    echo "<tr>";
				    echo "<td>". $no. "</td>";
				    echo "<td>". $item['NIM'] . "</td>";
				    echo "<td>". $item['Nama'] . "</td>";
				    echo"</tr>";
				    $no++;
				}
				?>
			</tbody>
		</table>
	</div>

	<!-- tambahkan link ke file JavaScript Bootstrap dan DataTables -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
	<script>
		// inisialisasi DataTables pada tabel
		$(document).ready(function() {
		    $('#mahasiswaTable').DataTable();
		} );
	</script>
</body>
</html>
