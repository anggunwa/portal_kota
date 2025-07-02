<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Layanan Kota</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f3f3f3;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .card img {
            width: 80px;
            height: auto;
            margin-bottom: 10px;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: white;
            background: #3490dc;
            padding: 6px 12px;
            border-radius: 5px;
        }

        .card a:hover {
            background: #2779bd;
        }
    </style>
</head>
<body>
    
        <h1>Portal Layanan Kota</h1>

        <div class="grid">
            @forelse ($opds as $opd)
                <div class="card">
                @if ($opd->logo)
                    <img src="{{ asset($opd->logo) }}" alt="Logo {{ $opd->nama }}">
                @else
                    <div style="font-size: 50px;">❔</div>
                @endif
                <h3>{{ $opd->nama }}</h3>
                <a href="{{ $opd->link }}" target="_blank">Kunjungi Situs</a>
                </div>
            @empty
                <p>Belum ada data OPD</p>
            @endforelse
        </div>

</body>
</html>