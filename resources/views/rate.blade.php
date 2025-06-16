<!DOCTYPE html>
<html>
<head>
    <title>Rate Gaya Layanan</title>
</head>
<body>
    <h2>Berikan Rating Anda</h2>

    <form method="POST" action="{{ route('save.ratings') }}">
        @csrf

        @php
            $tags = ['cinematic', 'formal', 'informal', 'profesional'];
        @endphp
        @foreach ($tags as $tag)
            <div>
                <label for="{{ $tag }}">{{ ucfirst($tag) }}</label>
                <select name="ratings[{{ $tag }}]" id="{{ $tag }}">
                    <option value="">Pilih rating</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        @endforeach
        <button type="submit">Kirim</button>
    </form>
</body>
</html>
