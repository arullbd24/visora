<!DOCTYPE html>
<html>
<head>
    <title>Rekomendasi Layanan</title>
</head>
<body>
    <h1>Rekomendasi untuk User ID: {{ $userId }}</h1>

    @if (count($recommendations) > 0)
        <ul>
            @foreach ($recommendations as $rec)
                <li>{{ $rec['name'] }} (Rating Estimasi: {{ number_format($rec['estimated_rating'], 2) }})</li>
            @endforeach
        </ul>
    @else
        <p>Tidak ada rekomendasi ditemukan.</p>
    @endif
</body>
</html>
