@extends('layouts.app')

@section('title', 'Simulator Interaktif | Slot atau Deposito?')

@section('content')
  <!-- Header / Navbar -->
  <header class="w-full bg-slate-900/90 border-b border-slate-800 sticky top-0 z-40 backdrop-blur-md text-white">
   <nav aria-label="Navigasi simulator" class="max-w-7xl mx-auto px-5 py-3.5 flex items-center justify-between gap-4">
    <a href="{{ route('home') }}" class="flex items-center gap-3 group no-underline">
     <span class="w-10 h-10 rounded-xl bg-gradient-to-tr from-blue-600 via-indigo-600 to-emerald-500 text-white grid place-items-center shadow-md shadow-blue-500/25 group-hover:scale-105 transition-transform shrink-0">
      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h18"/></svg>
     </span>
     <span>
      <span class="block font-bold leading-none text-white text-base">Slot atau Deposito?</span>
      <span class="block text-[11px] font-medium text-slate-400 mt-1">Simulator Finansial</span>
     </span>
    </a>

    <div class="flex items-center gap-4">
     <div class="hidden sm:flex items-center gap-2 text-xs text-slate-300 bg-slate-800 px-3.5 py-2 rounded-xl border border-slate-700">
      <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
      <span>Halo, <b class="text-white">{{ auth()->user()->name }}</b></span>
     </div>

     @if (auth()->user()->isAdmin())
      <a href="{{ route('admin.dashboard') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl px-4 py-2 text-xs font-bold no-underline transition-all">
       Admin Panel
      </a>
     @endif

     <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="bg-rose-950/80 hover:bg-rose-900 border border-rose-800 text-rose-300 rounded-xl px-4 py-2 text-xs font-bold transition-all">
       Logout
      </button>
     </form>
    </div>
   </nav>
  </header>

  <main class="bg-slate-950 min-h-screen py-10 text-white">
   <div class="max-w-7xl mx-auto px-5">
    
    <!-- Welcome Header -->
    <div class="mb-8 bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8 relative overflow-hidden shadow-2xl">
     <div class="absolute right-0 top-0 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
     <div class="relative z-10">
      <span class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 text-xs font-bold uppercase tracking-wider mb-3">
       Sesi Akses Aktif
      </span>
      <h1 class="display-font text-2xl sm:text-4xl font-bold text-white">Simulator Finansial Interaktif</h1>
      <p class="text-slate-400 mt-2 text-sm sm:text-base max-w-2xl">
       Uji nominal modal awal Anda dan lihat perbandingan grafik tren secara obyektif antara potensi kekalahan judi slot versus kepastian imbal hasil deposito bank.
      </p>
     </div>
    </div>

    <!-- Simulation Form Controls -->
    <section aria-label="Pengaturan simulasi" class="glass-dark rounded-[2rem] p-6 sm:p-9 border border-slate-800 shadow-2xl">
     <form id="simulator-form" class="grid md:grid-cols-3 gap-6 items-end">
      <div>
       <label class="block text-xs font-bold mb-2.5 text-slate-300 uppercase tracking-wider" for="money-input">Nominal Modal (Rp)</label>
       <div class="relative">
        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-emerald-400 font-bold text-base">Rp</span>
        <input id="money-input" aria-describedby="input-feedback" type="text" inputmode="numeric" value="1000000" class="w-full rounded-xl border border-slate-700 bg-slate-900/90 text-white pl-12 pr-4 py-3.5 font-bold text-base placeholder:text-slate-500 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all">
       </div>
      </div>

      <div>
       <label class="block text-xs font-bold mb-2.5 text-slate-300 uppercase tracking-wider" for="period-select">Jangka Waktu</label>
       <select id="period-select" class="w-full rounded-xl border border-slate-700 bg-slate-900/90 text-white px-4 py-3.5 font-bold text-base focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all">
        <option value="1">1 Bulan</option>
        <option value="6">6 Bulan</option>
        <option value="12" selected>1 Tahun (12 Bln)</option>
        <option value="36">3 Tahun (36 Bln)</option>
        <option value="60">5 Tahun (60 Bln)</option>
       </select>
      </div>

      <button type="submit" class="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white rounded-xl px-6 py-3.5 font-bold text-base transition-all shadow-lg shadow-emerald-500/25 hover:shadow-emerald-500/40 flex justify-center items-center gap-2 hover:-translate-y-0.5">
       <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 3 4 4-4 4"/><path d="M20 7H4"/><path d="m8 21-4-4 4-4"/><path d="M4 17h16"/></svg>
       <span>Hitung Simulasi</span>
      </button>

      <div class="md:col-span-2">
       <div class="flex justify-between items-center mb-2.5">
        <label class="text-xs font-bold text-slate-300 uppercase tracking-wider" for="rate-input">Suku Bunga Deposito Bank</label>
        <span id="rate-value" class="px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 font-bold text-sm border border-emerald-500/30">5,0% / tahun</span>
       </div>
       <input id="rate-input" type="range" min="1" max="10" value="5" step="0.1" class="w-full">
      </div>

      <p id="input-feedback" class="md:col-span-1 text-xs text-slate-400 leading-relaxed font-medium"></p>
     </form>
    </section>

    <!-- Simulation Panels Grid -->
    <div class="mt-8 grid lg:grid-cols-2 gap-8 items-stretch">
     <!-- Slot Panel (Left) -->
     <article id="slot-panel" class="rounded-[2rem] p-6 sm:p-8 border-t-4 border-t-rose-500 border border-rose-900/60 bg-gradient-to-b from-rose-950/70 to-slate-950 shadow-xl flex flex-col justify-between">
      <div>
       <div class="flex flex-wrap justify-between gap-4 items-start">
        <div class="flex gap-3.5 items-center">
         <span class="shrink-0 w-12 h-12 bg-rose-900/80 text-rose-300 rounded-2xl grid place-items-center shadow-sm border border-rose-700/50">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
         </span>
         <div>
          <p class="text-xs font-bold text-rose-400 uppercase tracking-wider">Simulasi Judi Slot</p>
          <h2 class="font-bold mt-0.5 text-xl text-white">{{ $content['slot_title'] ?? 'Risiko Tinggi & Hampir Pasti Rugi' }}</h2>
         </div>
        </div>
        <span class="text-xs font-bold rounded-full px-3.5 py-1.5 bg-rose-950 text-rose-300 border border-rose-700/80 shadow-sm flex items-center gap-1.5">
         <span class="w-2 h-2 rounded-full bg-rose-500 animate-ping"></span>
         Risiko Ekstrem
        </span>
       </div>

       <p class="text-sm leading-relaxed mt-5 text-slate-300 font-normal">
        {{ $content['slot_description'] ?? 'Judi online dirancang dengan algoritma House Edge yang menguntungkan bandar. Kebanyakan pemain mengalami kekalahan total (rungkat).' }}
       </p>

       <div class="mt-6 grid grid-cols-3 gap-3">
        <div class="bg-slate-900/90 border border-slate-700/70 rounded-xl p-3 sm:p-3.5 shadow-sm">
         <p class="text-[10px] sm:text-[11px] font-bold text-slate-400 uppercase tracking-wider">Modal Awal</p>
         <p id="slot-initial" class="stat-number text-xs sm:text-sm font-bold mt-1 text-white"></p>
        </div>
        <div class="bg-rose-950/90 border border-rose-800/80 rounded-xl p-3 sm:p-3.5 shadow-sm">
         <p class="text-[10px] sm:text-[11px] font-bold text-rose-300 uppercase tracking-wider">Sisa Saldo</p>
         <p id="slot-balance" class="stat-number text-xs sm:text-sm font-bold mt-1 text-rose-400"></p>
        </div>
        <div class="bg-rose-950/90 border border-rose-800/80 rounded-xl p-3 sm:p-3.5 shadow-sm">
         <p class="text-[10px] sm:text-[11px] font-bold text-rose-300 uppercase tracking-wider">Kerugian</p>
         <p id="slot-change" class="stat-number text-xs sm:text-sm font-bold mt-1 text-rose-400"></p>
        </div>
       </div>

       <div class="mt-6 bg-slate-900 rounded-xl p-4.5 border border-slate-800">
        <div class="flex justify-between text-xs font-bold uppercase tracking-wider">
         <span class="text-slate-300">Risk Meter (Risiko Rungkat)</span>
         <span id="risk-level" class="text-rose-400">Sangat Tinggi (Rungkat)</span>
        </div>
        <div class="h-3.5 rounded-full bg-slate-950 overflow-hidden mt-3 p-0.5 border border-slate-800">
         <div id="risk-fill" class="progress-fill h-full rounded-full bg-gradient-to-r from-amber-500 to-rose-600 shadow-sm" style="width:88%"></div>
        </div>
        <div class="flex justify-between text-[11px] text-slate-500 font-semibold mt-2">
         <span>Rendah</span>
         <span>Ekstrem (100%)</span>
        </div>
       </div>

       <!-- Canvas Chart Slot -->
       <div class="mt-6 bg-slate-950 rounded-2xl p-4 sm:p-5 border border-slate-800 shadow-2xl relative">
        <div class="flex justify-between items-center mb-3 px-1">
         <div class="flex items-center gap-2">
          <span class="w-2.5 h-2.5 rounded-full bg-rose-500 animate-pulse"></span>
          <h3 class="text-xs font-bold text-white uppercase tracking-wider">Grafik Tren Uang Slot</h3>
         </div>
         <span class="text-[11px] font-bold text-rose-400 bg-rose-950/80 border border-rose-800/60 px-2.5 py-0.5 rounded-full">Proyeksi Rungkat</span>
        </div>
        <div class="relative w-full h-52 sm:h-60">
         <canvas id="slotChart" style="width:100%;height:100%;display:block;"></canvas>
        </div>
       </div>

       <!-- Slot Pattern Spin Results -->
       <div class="mt-5 rounded-2xl bg-slate-950 p-4 sm:p-5 text-white border border-slate-800">
        <div class="flex flex-wrap items-start justify-between gap-3">
         <div>
          <h3 class="text-xs font-bold text-white uppercase tracking-wider">Simulasi 6 Putaran Slot</h3>
          <p class="text-[11px] text-slate-400 mt-0.5">Ilustrasi hasil per spin berdasarkan algoritma House Edge</p>
         </div>
         <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-slate-800 text-slate-300">Live Result</span>
        </div>
        <div id="slot-pattern" class="mt-4 grid grid-cols-3 gap-2" aria-live="polite"></div>
       </div>
      </div>
     </article>

     <!-- Deposito Panel (Right) -->
     <article id="deposit-panel" class="rounded-[2rem] p-6 sm:p-8 border-t-4 border-t-emerald-500 border border-emerald-900/60 bg-gradient-to-b from-emerald-950/70 to-slate-950 shadow-xl flex flex-col justify-between">
      <div>
       <div class="flex flex-wrap justify-between gap-4 items-start">
        <div class="flex gap-3.5 items-center">
         <span class="shrink-0 w-12 h-12 bg-emerald-900/80 text-emerald-300 rounded-2xl grid place-items-center shadow-sm border border-emerald-700/50">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 5c-1.5 0-2.8 1.4-3 2-3.5-1.5-11-.3-11 5 0 1.8 0 3 2 4.5V20h4v-2h3v2h4v-3.5c1-.5 1.5-1 2-2.5V7c0-.6-.4-1-1-1Z"/><path d="M16 11h.01"/></svg>
         </span>
         <div>
          <p class="text-xs font-bold text-emerald-400 uppercase tracking-wider">Simulasi Deposito Bank</p>
          <h2 class="font-bold mt-0.5 text-xl text-white">{{ $content['deposit_title'] ?? 'Pertumbuhan Pasti & Aman' }}</h2>
         </div>
        </div>
        <span class="text-xs font-bold rounded-full px-3.5 py-1.5 bg-emerald-950 text-emerald-300 border border-emerald-700/80 shadow-sm flex items-center gap-1.5">
         <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
         Rendah Risiko
        </span>
       </div>

       <p class="text-sm leading-relaxed mt-5 text-slate-300 font-normal">
        {{ $content['deposit_description'] ?? 'Deposito bank dijamin oleh LPS (Lembaga Penjamin Simpanan) dengan bunga pasti setiap bulan tanpa risiko kehilangan modal.' }}
       </p>

       <div class="mt-6 grid grid-cols-3 gap-3">
        <div class="bg-slate-900/90 border border-slate-700/70 rounded-xl p-3 sm:p-3.5 shadow-sm">
         <p class="text-[10px] sm:text-[11px] font-bold text-slate-400 uppercase tracking-wider">Modal Awal</p>
         <p id="dep-initial" class="stat-number text-xs sm:text-sm font-bold mt-1 text-white"></p>
        </div>
        <div class="bg-emerald-950/90 border border-emerald-800/80 rounded-xl p-3 sm:p-3.5 shadow-sm">
         <p class="text-[10px] sm:text-[11px] font-bold text-emerald-300 uppercase tracking-wider">Total Bunga</p>
         <p id="dep-interest" class="stat-number text-xs sm:text-sm font-bold mt-1 text-emerald-400"></p>
        </div>
        <div class="bg-emerald-950/90 border border-emerald-800/80 rounded-xl p-3 sm:p-3.5 shadow-sm">
         <p class="text-[10px] sm:text-[11px] font-bold text-emerald-300 uppercase tracking-wider">Hasil Akhir</p>
         <p id="dep-final" class="stat-number text-xs sm:text-sm font-bold mt-1 text-emerald-400"></p>
        </div>
       </div>

       <div class="mt-6 bg-slate-900 rounded-xl p-4.5 border border-slate-800">
        <div class="flex justify-between text-xs font-bold uppercase tracking-wider">
         <span class="text-slate-300">Estimasi Hasil / Bulan</span>
         <span id="monthly-value" class="text-emerald-400 font-bold"></span>
        </div>
        <div class="h-3.5 rounded-full bg-slate-950 overflow-hidden mt-3 p-0.5 border border-slate-800">
         <div id="deposit-fill" class="progress-fill h-full rounded-full bg-gradient-to-r from-emerald-400 to-teal-600 shadow-sm" style="width:18%"></div>
        </div>
        <p id="projection-value" class="mt-2.5 text-xs text-slate-400 font-medium"></p>
       </div>

       <!-- Canvas Chart Deposito -->
       <div class="mt-6 bg-slate-950 rounded-2xl p-4 sm:p-5 border border-slate-800 shadow-2xl relative">
        <div class="flex justify-between items-center mb-3 px-1">
         <div class="flex items-center gap-2">
          <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
          <h3 class="text-xs font-bold text-white uppercase tracking-wider">Grafik Pertumbuhan Deposito</h3>
         </div>
         <span class="text-[11px] font-bold text-emerald-400 bg-emerald-950/80 border border-emerald-800/60 px-2.5 py-0.5 rounded-full">Bunga Berbunga</span>
        </div>
        <div class="relative w-full h-52 sm:h-60">
         <canvas id="depositoChart" style="width:100%;height:100%;display:block;"></canvas>
        </div>
       </div>

       <!-- Deposito Compounding Breakdown Grid -->
       <div class="mt-5 rounded-2xl bg-slate-950 p-4 sm:p-5 text-white border border-slate-800">
        <div class="flex flex-wrap items-start justify-between gap-3">
         <div>
          <h3 class="text-xs font-bold text-white uppercase tracking-wider">Rincian Pertumbuhan Deposito</h3>
          <p class="text-[11px] text-slate-400 mt-0.5">Akumulasi saldo dan bunga pasti secara berkala</p>
         </div>
         <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-emerald-950 text-emerald-400 border border-emerald-800/60">Pasti Untung</span>
        </div>
        <div id="deposit-breakdown" class="mt-4 grid grid-cols-3 gap-2"></div>
       </div>
      </div>
     </article>
    </div>

   </div>
  </main>
@endsection
