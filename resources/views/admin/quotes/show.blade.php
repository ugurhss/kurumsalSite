@extends('admin.layout')

@section('title', 'Teklif Detay')

@section('page-title', 'Teklif Talebi Detayı')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Teklif #{{ $quote->id }}</h2>
            <p class="text-sm text-gray-500">{{ optional($quote->created_at)->format('d.m.Y H:i') }} tarihinde oluşturuldu</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ url('/admin/quotes') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors flex items-center gap-2">
                <i class="fa fa-arrow-left"></i> Listeye Dön
            </a>
            <form method="POST" action="{{ url('/admin/quotes/'.$quote->id) }}" onsubmit="return confirm('Silmek istediğine emin misin?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700 transition-colors flex items-center gap-2">
                    <i class="fa fa-trash"></i> Sil
                </button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Sol Kolon: Teklif İçeriği --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-200 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <i class="fa fa-id-card text-indigo-500"></i> İletişim ve Firma Bilgileri
                    </h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-4">
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Ad Soyad</label>
                        <p class="text-gray-900 font-semibold">{{ $quote->full_name }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Firma</label>
                        <p class="text-gray-900 font-semibold">{{ $quote->company ?? '-' }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">E-posta</label>
                        <p class="text-gray-900 font-semibold italic">
                            <a href="mailto:{{ $quote->email }}" class="text-indigo-600 hover:underline">{{ $quote->email }}</a>
                        </p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Telefon</label>
                        <p class="text-gray-900 font-semibold">{{ $quote->phone }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Şehir</label>
                        <p class="text-gray-900 font-semibold">{{ $quote->city ?? '-' }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">İlgilenilen Ürün</label>
                        <p class="text-gray-900 font-semibold">{{ $quote->product ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-200 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <i class="fa fa-align-left text-indigo-500"></i> Talep Detayları
                    </h3>
                </div>
                <div class="p-6">
                    <div class="bg-gray-50 p-5 rounded-xl border border-gray-100 text-gray-700 leading-relaxed whitespace-pre-wrap">
                        {{ $quote->details }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Sağ Kolon: Durum Yönetimi --}}
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-200 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <i class="fa fa-sync-alt text-indigo-500"></i> Durum Güncelle
                    </h3>
                </div>
                <div class="p-6 text-center">
                    @php
                        $statusColors = [
                            'new' => 'bg-blue-100 text-blue-700',
                            'contacted' => 'bg-yellow-100 text-yellow-700',
                            'closed' => 'bg-gray-100 text-gray-700'
                        ];
                        $statusLabels = [
                            'new' => 'Yeni Talep',
                            'contacted' => 'İletişime Geçildi',
                            'closed' => 'Kapatıldı'
                        ];
                    @endphp
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $statusColors[$quote->status] ?? 'bg-gray-100 text-gray-700' }} mb-6">
                        {{ $statusLabels[$quote->status] ?? $quote->status }}
                    </span>

                    <form method="POST" action="{{ url('/admin/quotes/'.$quote->id) }}" class="space-y-4 text-left">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-2">YENİ DURUM</label>
                            <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                                <option value="new" {{ $quote->status==='new' ? 'selected' : '' }}>Yeni</option>
                                <option value="contacted" {{ $quote->status==='contacted' ? 'selected' : '' }}>İletişime Geçildi</option>
                                <option value="closed" {{ $quote->status==='closed' ? 'selected' : '' }}>Kapatıldı</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-all">
                            Durumu Güncelle
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h4 class="font-bold text-gray-800 mb-4 flex items-center gap-2 text-sm">
                    <i class="fa fa-lightbulb text-yellow-500"></i> Yönetici Notu
                </h4>
                <p class="text-xs text-gray-500 leading-relaxed italic">
                    Bu talep üzerinden müşteriye doğrudan e-posta veya telefon ile ulaşarak süreci yönetebilirsiniz. Durumu güncellemeyi unutmayın.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
