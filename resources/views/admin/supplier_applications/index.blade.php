@extends('admin.layout')

@section('page-title', 'Tedarikçi Başvuruları')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    {{-- Header & Filter --}}
    <div class="p-6 border-b border-gray-200 bg-gray-50">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-lg font-bold text-gray-800">Başvuru Listesi</h2>
                <p class="text-sm text-gray-500">Toplam {{ $applications->count() }} başvuru bulundu</p>
            </div>
        </div>

        <form method="GET" action="{{ route('admin.supplier_applications.index') }}" class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <input type="text" name="email" value="{{ request('email') }}" placeholder="E-posta" 
                   class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            
            <input type="text" name="phone" value="{{ request('phone') }}" placeholder="Telefon" 
                   class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            
            <input type="text" name="city" value="{{ request('city') }}" placeholder="Şehir" 
                   class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            
            <select name="status" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                <option value="">Durum (Hepsi)</option>
                <option value="new" {{ request('status')=='new'?'selected':'' }}>Yeni</option>
                <option value="reviewed" {{ request('status')=='reviewed'?'selected':'' }}>İncelendi</option>
                <option value="approved" {{ request('status')=='approved'?'selected':'' }}>Onaylandı</option>
                <option value="rejected" {{ request('status')=='rejected'?'selected':'' }}>Reddedildi</option>
            </select>

            <div class="flex gap-2">
                <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition-colors text-sm flex items-center justify-center gap-2">
                    <i class="fa fa-filter"></i> Filtrele
                </button>
                <a href="{{ route('admin.supplier_applications.index') }}" class="bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium py-2 px-4 rounded-lg transition-colors text-sm flex items-center justify-center" title="Sıfırla">
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
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ad Soyad / E-posta</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Firma</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ürün</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Durum</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">İşlem</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($applications as $app)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            #{{ $app->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $app->full_name }}</div>
                            <div class="text-xs text-gray-500">{{ $app->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $app->company }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $app->product }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @php
                                $statusClasses = [
                                    'new' => 'bg-blue-100 text-blue-800',
                                    'reviewed' => 'bg-yellow-100 text-yellow-800',
                                    'approved' => 'bg-green-100 text-green-800',
                                    'rejected' => 'bg-red-100 text-red-800',
                                ];
                                $statusLabels = [
                                    'new' => 'Yeni',
                                    'reviewed' => 'İncelendi',
                                    'approved' => 'Onaylandı',
                                    'rejected' => 'Reddedildi',
                                ];
                            @endphp
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClasses[$app->status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ $statusLabels[$app->status] ?? $app->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.supplier_applications.show', $app->id) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1 rounded-md transition-colors">
                                Detay
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fa fa-truck text-4xl text-gray-300 mb-3"></i>
                                <p>Henüz başvuru bulunmuyor.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
