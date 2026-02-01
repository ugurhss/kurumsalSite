@extends('admin.layout')

@section('page-title', 'Tedarikçi Başvuru Detayı')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Başvuru #{{ $application->id }}</h2>
            <p class="text-sm text-gray-500">{{ $application->created_at->format('d.m.Y H:i') }} tarihinde alındı</p>
        </div>
        <a href="{{ route('admin.supplier_applications.index') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors flex items-center gap-2">
            <i class="fa fa-arrow-left"></i> Listeye Dön
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Sol Kolon: Başvuru Bilgileri --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-200 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <i class="fa fa-briefcase text-indigo-500"></i> Firma ve İletişim Bilgileri
                    </h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-4">
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Yetkili Ad Soyad</label>
                        <p class="text-gray-900 font-semibold">{{ $application->full_name }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Firma Adı</label>
                        <p class="text-gray-900 font-semibold">{{ $application->company }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">E-posta</label>
                        <p class="text-gray-900 font-semibold italic">
                            <a href="mailto:{{ $application->email }}" class="text-indigo-600 hover:underline">{{ $application->email }}</a>
                        </p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Telefon</label>
                        <p class="text-gray-900 font-semibold">{{ $application->phone }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Şehir</label>
                        <p class="text-gray-900 font-semibold">{{ $application->city }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Ürün Grubu</label>
                        <p class="text-gray-900 font-semibold text-indigo-600 font-bold">{{ $application->product }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-200 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <i class="fa fa-file-alt text-indigo-500"></i> Başvuru Detayları / Notlar
                    </h3>
                </div>
                <div class="p-6">
                    <div class="bg-gray-50 p-5 rounded-xl border border-gray-100 text-gray-700 leading-relaxed whitespace-pre-wrap">
                        {{ $application->details }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Sağ Kolon: Durum ve Hızlı İşlemler --}}
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-200 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <i class="fa fa-tasks text-indigo-500"></i> Başvuru Süreci
                    </h3>
                </div>
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.supplier_applications.status', $application->id) }}" class="space-y-4">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-2">GÜNCEL DURUM</label>
                            <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                                <option value="new" {{ $application->status=='new'?'selected':'' }}>Yeni Başvuru</option>
                                <option value="reviewed" {{ $application->status=='reviewed'?'selected':'' }}>İncelendi</option>
                                <option value="approved" {{ $application->status=='approved'?'selected':'' }}>Onaylandı</option>
                                <option value="rejected" {{ $application->status=='rejected'?'selected':'' }}>Reddedildi</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-all">
                            Durumu Kaydet
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-6">
                <h4 class="font-bold text-indigo-900 mb-2 text-sm flex items-center gap-2">
                    <i class="fa fa-lightbulb"></i> Hatırlatma
                </h4>
                <p class="text-xs text-indigo-700 leading-relaxed italic">
                    Tedarikçi başvurularını değerlendirirken firma geçmişini ve ürün grubunun kurumsal kimliğimizle uyumunu kontrol etmeyi unutmayın.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
