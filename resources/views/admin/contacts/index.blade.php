@extends('admin.layout')

@section('page-title', 'İletişim Mesajları')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    {{-- Header & Filter --}}
    <div class="p-6 border-b border-gray-200 bg-gray-50">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-lg font-bold text-gray-800">Mesaj Listesi</h2>
                <p class="text-sm text-gray-500">Toplam {{ $contacts->count() }} mesaj bulundu</p>
            </div>
        </div>

        <form method="GET" action="{{ route('admin.contacts.index') }}" class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <input type="text" name="name" value="{{ request('name') }}" placeholder="Ad Soyad" 
                   class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            
            <input type="text" name="email" value="{{ request('email') }}" placeholder="E-posta" 
                   class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            
            <input type="text" name="phone" value="{{ request('phone') }}" placeholder="Telefon" 
                   class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            
            <select name="status" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                <option value="">Durum (Hepsi)</option>
                <option value="new" {{ request('status')=='new'?'selected':'' }}>Yeni</option>
                <option value="replied" {{ request('status')=='replied'?'selected':'' }}>Cevaplandı</option>
                <option value="closed" {{ request('status')=='closed'?'selected':'' }}>Kapandı</option>
            </select>

            <div class="flex gap-2">
                <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition-colors text-sm flex items-center justify-center gap-2">
                    <i class="fa fa-filter"></i> Filtrele
                </button>
                <a href="{{ route('admin.contacts.index') }}" class="bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium py-2 px-4 rounded-lg transition-colors text-sm flex items-center justify-center" title="Sıfırla">
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
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gönderen</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">İletişim</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durum</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">İşlem</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($contacts as $contact)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            #{{ $contact->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $contact->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $contact->email }}</div>
                            <div class="text-xs text-gray-500">{{ $contact->phone }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusClasses = [
                                    'new' => 'bg-blue-100 text-blue-800',
                                    'replied' => 'bg-green-100 text-green-800',
                                    'closed' => 'bg-gray-100 text-gray-800',
                                ];
                                $statusLabels = [
                                    'new' => 'Yeni',
                                    'replied' => 'Cevaplandı',
                                    'closed' => 'Kapandı',
                                ];
                            @endphp
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClasses[$contact->status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ $statusLabels[$contact->status] ?? $contact->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.contacts.show', $contact->id) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1 rounded-md transition-colors">
                                Detay
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fa fa-inbox text-4xl text-gray-300 mb-3"></i>
                                <p>Henüz mesaj bulunmuyor.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    {{-- Pagination if needed --}}
    @if(method_exists($contacts, 'links'))
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $contacts->links() }}
        </div>
    @endif
</div>
@endsection
