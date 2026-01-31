@extends('admin.layout')

@section('page-title', 'Teklif Talepleri')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    {{-- Header & Filter --}}
    <div class="p-6 border-b border-gray-200 bg-gray-50">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-lg font-bold text-gray-800">Teklif Listesi</h2>
                <p class="text-sm text-gray-500">Toplam {{ $quotes->count() }} teklif talebi bulundu</p>
            </div>
        </div>

        <form method="GET" action="{{ url('/admin/quotes') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">Durum</label>
                <select name="status" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                    @php $st = request('status'); @endphp
                    <option value="">Hepsi</option>
                    <option value="new" {{ $st==='new' ? 'selected' : '' }}>Yeni</option>
                    <option value="contacted" {{ $st==='contacted' ? 'selected' : '' }}>İletişime Geçildi</option>
                    <option value="closed" {{ $st==='closed' ? 'selected' : '' }}>Kapandı</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">E-posta</label>
                <input type="text" name="email" value="{{ request('email') }}" placeholder="ornek@mail.com" 
                       class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            </div>

            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">Telefon</label>
                <input type="text" name="phone" value="{{ request('phone') }}" placeholder="05xx..." 
                       class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            </div>

            <div class="flex items-end gap-2">
                <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition-colors text-sm flex items-center justify-center gap-2 h-[38px]">
                    <i class="fa fa-filter"></i> Filtrele
                </button>
                <a href="{{ url('/admin/quotes') }}" class="bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium py-2 px-4 rounded-lg transition-colors text-sm flex items-center justify-center h-[38px]" title="Sıfırla">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </form>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ad Soyad / İletişim</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Firma / Şehir</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ürün</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Durum</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tarih</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">İşlem</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($quotes as $q)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            #{{ $q->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $q->full_name }}</div>
                            <div class="text-xs text-gray-500">{{ $q->email }}</div>
                            <div class="text-xs text-gray-500">{{ $q->phone }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $q->company }}</div>
                            <div class="text-xs text-gray-500">{{ $q->city }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $q->product }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @php
                                $statusClasses = [
                                    'new' => 'bg-blue-100 text-blue-800',
                                    'contacted' => 'bg-yellow-100 text-yellow-800',
                                    'closed' => 'bg-green-100 text-green-800',
                                ];
                                $statusLabels = [
                                    'new' => 'Yeni',
                                    'contacted' => 'İletişime Geçildi',
                                    'closed' => 'Kapandı',
                                ];
                            @endphp
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClasses[$q->status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ $statusLabels[$q->status] ?? $q->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ optional($q->created_at)->format('d.m.Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ url('/admin/quotes/'.$q->id) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1 rounded-md transition-colors">
                                Detay
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-10 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fa fa-file-invoice-dollar text-4xl text-gray-300 mb-3"></i>
                                <p>Henüz teklif talebi bulunmuyor.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
