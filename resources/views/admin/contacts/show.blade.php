@extends('admin.layout')

@section('page-title', 'Mesaj Detayı')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Mesaj #{{ $contact->id }}</h2>
            <p class="text-sm text-gray-500">{{ $contact->created_at->format('d.m.Y H:i') }} tarihinde gönderildi</p>
        </div>
        <a href="{{ route('admin.contacts.index') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors flex items-center gap-2">
            <i class="fa fa-arrow-left"></i> Listeye Dön
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Sol Kolon: Mesaj İçeriği --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-200 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <i class="fa fa-user-circle text-indigo-500"></i> Gönderen Bilgileri
                    </h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase">Ad Soyad</label>
                        <p class="text-gray-900 font-medium">{{ $contact->name }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase">E-posta</label>
                        <p class="text-gray-900 font-medium">
                            <a href="mailto:{{ $contact->email }}" class="text-indigo-600 hover:underline">{{ $contact->email }}</a>
                        </p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase">Telefon</label>
                        <p class="text-gray-900 font-medium">{{ $contact->phone }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-200 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <i class="fa fa-envelope-open-text text-indigo-500"></i> Mesaj İçeriği
                    </h3>
                </div>
                <div class="p-6">
                    <div class="prose prose-sm max-w-none text-gray-700 leading-relaxed italic bg-gray-50 p-4 rounded-lg border border-gray-100">
                        {{ $contact->message }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Sağ Kolon: Durum ve İşlemler --}}
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-200 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <i class="fa fa-cog text-indigo-500"></i> Durum Yönetimi
                    </h3>
                </div>
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.contacts.status', $contact->id) }}" class="space-y-4">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Mesaj Durumu</label>
                            <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
                                <option value="new" {{ $contact->status == 'new' ? 'selected' : '' }}>Yeni</option>
                                <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>Yanıtlandı</option>
                                <option value="closed" {{ $contact->status == 'closed' ? 'selected' : '' }}>Kapatıldı</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow-md shadow-indigo-200 hover:bg-indigo-700 transition-all flex items-center justify-center gap-2">
                            <i class="fa fa-save"></i> Güncelle
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-indigo-600 rounded-xl shadow-lg shadow-indigo-200 p-6 text-white">
                <h4 class="font-bold mb-2 flex items-center gap-2">
                    <i class="fa fa-info-circle"></i> Hızlı İşlem
                </h4>
                <p class="text-indigo-100 text-xs mb-4">Kullanıcıya e-posta üzerinden yanıt vermek için aşağıdaki butonu kullanabilirsiniz.</p>
                <a href="mailto:{{ $contact->email }}?subject=Re: İletişim Mesajı" class="block w-full py-2 bg-white text-indigo-600 text-center rounded-lg font-bold text-sm hover:bg-indigo-50 transition-colors">
                    E-posta Gönder
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
