<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Rekomendasi Layanan</title>
    <link rel="icon" href="{{ asset('assets/img/visora..png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 2rem;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            color: #333;
        }

        .recommendation-box {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            max-width: 600px;
            margin: 1rem auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .recommendation-box h2 {
            margin: 0 0 0.5rem;
            color: #007BFF;
        }

        .recommendation-box p {
            margin: 0 0 1rem;
            color: #555;
        }

        .score {
            background: #e1f5fe;
            display: inline-block;
            padding: 0.2rem 0.6rem;
            border-radius: 6px;
            font-size: 0.9rem;
            color: #007BFF;
        }

        .empty {
            text-align: center;
            color: #888;
            margin-top: 3rem;
        }
    </style>
</head>

<body>

    <h1>Rekomendasi Layanan untuk Anda</h1>
    {{-- <form method="GET" style="text-align:center; margin-bottom: 2rem;">
        <label for="kategori">Filter Kategori:</label>
        <input type="text" name="kategori" id="kategori" placeholder="Contoh: Desain"
            value="{{ request('kategori') }}">
        <button type="submit">Terapkan</button>
    </form> --}}

    @if ($recommendations->isEmpty())
        <div class="empty">
            <p>Belum ada rekomendasi yang bisa ditampilkan.</p>
            <p>Silakan beri rating pada beberapa layanan terlebih dahulu.</p>
        </div>
    @else
        @foreach ($recommendations as $item)
            <div class="recommendation-box">
                <h2>{{ $item['nama'] }}</h2>
                <p>{{ $item['deskripsi'] }}</p>
                <div class="score">Skor Kecocokan: {{ $item['score'] }}</div>
            </div>
        @endforeach
    @endif

</body>

</html>
