<h2>Rekomendasi untuk User ID: {{ $userId }}</h2>

<ul>
@foreach ($recommendations as $rec)
    <li>
        <strong>{{ $rec['name'] }}</strong> - Skor: {{ $rec['estimated_rating'] }}
    </li>
@endforeach
</ul>
