<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rekomendasi Layanan</title>
</head>
<body>
    <h2>Rekomendasi Layanan untuk User ID: {{ $userId }}</h2>

    @if($recommendations->isEmpty())
        <p>Tidak ada rekomendasi layanan yang tersedia untuk saat ini.</p>
    @else
        <ul>
            @foreach($recommendations as $rec)
                <li>
                    <p>Nama Layanan: {{ $rec['name'] }}</p>
                    <p>ID Layanan: {{ $rec['service_id'] }}</p>
                    <p>Rating Estimasi: {{ number_format($rec['estimated_rating'], 2) }}</p>
                    <hr>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
