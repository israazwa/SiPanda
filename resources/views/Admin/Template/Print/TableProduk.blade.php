{{-- <div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
</div> --}}
<head>
    @vite('resources/js/tanggal.js')
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
                background: white;
                font-size: 12px;
            }

            table {
                width: 100%;
                table-layout: fixed;
                border-collapse: collapse;
                page-break-inside: auto;
            }

            thead {
                display: table-header-group;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            th, td {
                border: 1px solid #ccc;
                padding: 4px;
                word-wrap: break-word;
                text-align: left;
            }

            .print\:hidden {
                display: none !important;
            }

            .print\:block {
                display: block !important;
            }
        }
        .datetime-box p {
            font-size: 1.25rem;
            font-weight: bold;
        }

    </style>
</head>
<header x-data="{ open: false }" class="bg-gray-900 text-white shadow-md fixed top-0 left-0 w-full z-30 ">
      <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-3">
          <img src="/logo.png" alt="SiPanda Admin" class="h-8 w-auto">
          <span class="text-lg font-bold tracking-wide">SiPanda Catalog</span>
        </div>
         <div class="datetime-box">
        <p id="datetime">Memuat...</p>
    </div>
      </div>
    </header>
<table class="mt-25 mr-20">
    <thead>
        <tr>
            <th class="w-10">No</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Promo</th>
            <th class="w-20 text-center">Stok</th>
        </tr>
    </thead>
    <tbody>
        <?php $n=1; ?>
        @foreach($products as $product)
            <tr>
                <td class="w-10"><?= $n; ?></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? 'Kategori belum diisi' }}</td>
                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td>
                    @if ($product->is_promo && $product->promo_price)
                        Rp {{ number_format($product->promo_price, 0, ',', '.') }}
                    @else
                        Tidak ada diskon
                    @endif
                </td>
                <td class="text-center w-10">{{ $product->stock }}</td>
            </tr>
            <?php $n++; ?>
        @endforeach
    </tbody>
</table>
