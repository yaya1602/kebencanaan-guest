<!DOCTYPE html>
<html>
<head>
<title>Info Kejadian Bencana</title>
<style>
body { font-family: Arial, sans-serif; margin: 20px; background: #f9f9f9; }
h1 { color: #452d2dff; text-align: center; }
.card {
background: #fff;
padding: 15px;
margin-bottom: 15px;
border-radius: 8px;
box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}
.status {
font-weight: bold;
color: green;
}
.status.aktif { color: red; }
</style>
</head>
<body>
<h1>Informasi Kejadian Bencana</h1>
@foreach($kejadian as $item)
<div class="card">
<h2>{{ $item['jenis_bencana'] }}</h2>
<p><b>Tanggal:</b> {{ $item['tanggal'] }}</p>
<p><b>Lokasi:</b> {{ $item['lokasi_text'] }}</p>
<p class="status {{ strtolower($item['status_kejadian']) }}">
<b>Status:</b> {{ $item['status_kejadian'] }}
</p>
</div>
@endforeach
</body>
</html>
