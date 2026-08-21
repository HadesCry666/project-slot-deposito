@extends('layouts.admin')

@section('title', 'CMS Kelola Konten')
@section('page-title', 'Kelola Konten Website (CMS)')
@section('page-subtitle', 'Ubah teks, judul, deskripsi, dan kutipan nasihat yang tampil di website utama')

@section('admin-content')
 <div class="space-y-8">
  @php
    $sectionTitles = [
      'hero' => ['title' => 'Bagian Hero (Halaman Depan Atas)', 'desc' => 'Judul utama, subjudul, badge, dan teks tombol'],
      'slot' => ['title' => 'Bagian Simulasi Judi Slot', 'desc' => 'Judul risiko, deskripsi, dan 3 poin fakta slot'],
      'deposito' => ['title' => 'Bagian Simulasi Deposito Bank', 'desc' => 'Judul keunggulan, deskripsi, dan 3 poin keunggulan'],
      'nasihat' => ['title' => 'Bagian Nasihat & Kutipan Quote', 'desc' => '4 kartu kutipan nasihat finansial'],
      'comparison' => ['title' => 'Bagian Seksi Perbandingan', 'desc' => 'Judul dan subjudul seksi perbandingan'],
    ];
  @endphp

  @foreach ($contents as $sectionKey => $items)
   <div class="card-admin overflow-hidden shadow-sm">
    <div class="bg-slate-900 text-white p-5 flex items-center justify-between">
     <div>
      <h2 class="font-bold text-base">{{ $sectionTitles[$sectionKey]['title'] ?? uppercase($sectionKey) }}</h2>
      <p class="text-xs text-slate-400 mt-0.5">{{ $sectionTitles[$sectionKey]['desc'] ?? 'Edit teks untuk bagian ini' }}</p>
     </div>
     <span class="text-xs bg-emerald-500/20 text-emerald-300 font-bold px-3 py-1 rounded-full border border-emerald-500/30 uppercase tracking-wider">
      {{ $sectionKey }}
     </span>
    </div>

    <div class="p-6 space-y-6">
     @foreach ($items as $item)
      <form action="{{ route('admin.content.update', $item->key) }}" method="POST" class="bg-slate-50 rounded-xl p-4 border border-slate-200 hover:border-slate-300 transition-colors">
       @csrf
       @method('PUT')

       <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
        <label for="input-{{ $item->key }}" class="font-bold text-slate-900 text-sm">
         {{ $item->label }}
        </label>
        <span class="text-[11px] font-mono text-slate-500 bg-white px-2 py-0.5 rounded border border-slate-200">
         key: {{ $item->key }}
        </span>
       </div>

       <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 mt-2">
        @if ($item->type === 'textarea')
         <textarea
          id="input-{{ $item->key }}"
          name="value"
          rows="3"
          class="input-admin flex-1 bg-white"
         >{{ old('value', $item->value) }}</textarea>
        @else
         <input
          id="input-{{ $item->key }}"
          name="value"
          type="text"
          value="{{ old('value', $item->value) }}"
          class="input-admin flex-1 bg-white"
         >
        @endif

        <button type="submit" class="btn-green shrink-0 self-end sm:self-center">
         Simpan Perubahan
        </button>
       </div>
      </form>
     @endforeach
    </div>
   </div>
  @endforeach
 </div>
@endsection
