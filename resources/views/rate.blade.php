<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beri Rating Layanan</title>
    <link rel="icon" href="{{ asset('assets/img/visora..png') }}" type="image/x-icon">
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        h2 { margin-bottom: 1rem; }
        .service-box { margin-bottom: 1.5rem; padding: 1rem; border: 1px solid #ccc; border-radius: 8px; }
        select { padding: 0.3rem; }
        button { margin-top: 1rem; padding: 0.5rem 1rem; background: #007bff; color: #fff; border: none; border-radius: 4px; }
    </style>
</head>
<body>
    <h2>Beri Rating pada Layanan Berikut</h2>

    <form action="{{ route('save-ratings') }}" method="POST">
        @csrf

        @foreach($services as $service)
            <div class="service-box">
                <strong>{{ $service->name }}</strong><br>
                <small>{{ $service->description }}</small><br><br>
                <label>Rating:
                    <select name="ratings[{{ $service->id }}]" required>
                        <option value="">Pilih</option>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </label>
            </div>
        @endforeach

        <button type="submit">Simpan Rating</button>
    </form>
</body>
</html>
