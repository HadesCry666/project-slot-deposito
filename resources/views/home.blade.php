@extends('layouts.app')

@section('title', 'Slot atau Deposito? | Simulasi Literasi Keuangan')

@section('content')
  <!-- Modern Header / Navbar -->
  <header class="w-full bg-white/85 border-b border-slate-200/90 sticky top-0 z-40 backdrop-blur-md">
   <nav aria-label="Navigasi utama" class="max-w-7xl mx-auto px-5 py-3.5 flex items-center justify-between gap-4">
    <a href="#beranda" class="flex items-center gap-3 group no-underline">
     <span class="w-10 h-10 rounded-xl bg-gradient-to-tr from-blue-600 via-indigo-600 to-emerald-500 text-white grid place-items-center shadow-md shadow-blue-500/25 group-hover:scale-105 transition-transform">
      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h18"/></svg>
     </span>
     <span>
      <span class="block font-bold leading-none text-slate-900 text-base">Slot atau Deposito?</span>
      <span class="block text-[11px] font-medium text-slate-500 mt-1">Simulasi Literasi Keuangan</span>
     </span>
    </a>
    <div class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
     <a class="nav-link hover:text-blue-600 transition-colors" href="#simulator">Simulator</a>
     <a class="nav-link hover:text-blue-600 transition-colors" href="#belajar">Belajar</a>
     <a class="nav-link hover:text-blue-600 transition-colors" href="#nasihat">Nasihat</a>
    </div>
    <a href="#simulator" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-xl px-5 py-2.5 text-sm font-bold no-underline transition-all shadow-md shadow-blue-500/25 hover:shadow-lg hover:shadow-blue-500/35 hover:-translate-y-0.5">
     Coba Simulator
    </a>
   </nav>
  </header>

  <main>
   <!-- Hero Section -->
   <section id="beranda" class="w-full relative dot-grid bg-slate-50/70 overflow-hidden">
    <div class="absolute top-12 right-[-4rem] w-96 h-96 rounded-full bg-blue-400/20 hero-orb opacity-70 pointer-events-none animate-pulse-glow"></div>
    <div class="absolute bottom-10 left-[-4rem] w-80 h-80 rounded-full bg-emerald-400/15 hero-orb opacity-60 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-5 py-16 lg:py-24 relative grid lg:grid-cols-[1.05fr_.95fr] items-center gap-12">
     <div>
      <div class="inline-flex items-center gap-2 rounded-full bg-blue-50 text-blue-700 border border-blue-200/80 px-4 py-1.5 text-xs font-bold mb-6 shadow-sm">
       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
       <span>Edukasi &amp; Literasi Keuangan</span>
      </div>
      <h1 class="display-font font-bold leading-[1.08] tracking-tight text-4xl sm:text-5xl lg:text-6xl text-slate-900">
       Slot atau Deposito?
      </h1>
      <p class="mt-6 text-lg leading-relaxed max-w-2xl text-slate-600 font-normal">
       Bandingkan hasil keuangan dari kebiasaan main slot judi online versus menyimpan uang di deposito bank secara obyektif, terukur, dan rasional.
      </p>
      <div class="mt-8 flex flex-wrap gap-4 items-center">
       <a href="#simulator" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white inline-flex items-center gap-2.5 rounded-xl px-7 py-4 font-bold no-underline transition-all hover:-translate-y-0.5 shadow-lg shadow-blue-500/25">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="16" height="20" x="4" y="2" rx="2"/><line x1="8" x2="16" y1="6" y2="6"/><line x1="16" x2="16" y1="14" y2="18"/><path d="M16 10h.01"/><path d="M12 10h.01"/><path d="M8 10h.01"/><path d="M12 14h.01"/><path d="M8 14h.01"/><path d="M12 18h.01"/><path d="M8 18h.01"/></svg>
        <span>Buka Simulator</span>
       </a>
       <span class="inline-flex items-center gap-2 rounded-xl bg-white border border-slate-200/80 text-slate-700 px-4 py-3.5 text-sm font-semibold shadow-sm">
        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
        100% Gratis &amp; Edukatif
       </span>
      </div>

      <div class="mt-10 grid grid-cols-3 gap-3.5 max-w-xl">
       <div class="glass-card rounded-xl p-3.5 soft-card hover-lift">
        <div class="w-9 h-9 rounded-xl bg-blue-100/80 text-blue-600 grid place-items-center mb-2">
         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg>
        </div>
        <p class="text-xs leading-snug font-bold text-slate-800">Perhitungan Akurat</p>
        <p class="text-[10px] text-slate-500 mt-0.5">Rumus bunga presisi</p>
       </div>
       <div class="glass-card rounded-xl p-3.5 soft-card hover-lift">
        <div class="w-9 h-9 rounded-xl bg-emerald-100/80 text-emerald-600 grid place-items-center mb-2">
         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="20" y2="10"/><line x1="18" x2="18" y1="20" y2="4"/><line x1="6" x2="6" y1="20" y2="16"/></svg>
        </div>
        <p class="text-xs leading-snug font-bold text-slate-800">Grafik Modern</p>
        <p class="text-[10px] text-slate-500 mt-0.5">Visulalisasi Bezier</p>
       </div>
       <div class="glass-card rounded-xl p-3.5 soft-card hover-lift">
        <div class="w-9 h-9 rounded-xl bg-amber-100/80 text-amber-600 grid place-items-center mb-2">
         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/><path d="m9 9.5 2 2 4-4"/></svg>
        </div>
        <p class="text-xs leading-snug font-bold text-slate-800">Edukasi Risiko</p>
        <p class="text-[10px] text-slate-500 mt-0.5">Analisis House Edge</p>
       </div>
      </div>
     </div>

     <div class="hero-visual relative min-h-[390px] reveal delay-1">
      <div class="absolute inset-3 rounded-[2.2rem] overflow-hidden premium-shadow bg-gradient-to-br from-slate-900 via-indigo-950 to-emerald-950 p-1 border border-slate-700/50">
       <img src="{{ asset('images/hero.jpg') }}" alt="Simulasi Slot vs Deposito" loading="lazy" class="w-full h-full object-cover rounded-[2rem] opacity-90 transition-transform duration-700 hover:scale-105" onerror="this.onerror=null; this.parentElement.classList.add('hero-fallback'); this.style.display='none';">
      </div>

      <div class="absolute top-1 right-0 glass-card rounded-2xl p-4 premium-shadow max-w-[200px] border border-slate-200/80 hover-lift glow-box-green">
       <div class="flex items-center gap-2 text-emerald-600">
        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
        <span class="text-xs font-bold uppercase tracking-wider">Pertumbuhan</span>
       </div>
       <p class="text-2xl font-bold mt-1.5 text-slate-900 stat-number">+5,0% / thn</p>
       <p class="text-[11px] text-slate-500 font-medium mt-0.5">Deposito Bank (Stabil &amp; Pasti)</p>
      </div>

      <div class="absolute bottom-1 left-0 glass-card rounded-2xl p-4 premium-shadow flex gap-3.5 items-center max-w-[260px] border border-slate-200/80 hover-lift glow-box-red">
       <span class="w-11 h-11 rounded-xl bg-rose-100 text-rose-600 grid place-items-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
       </span>
       <div>
        <p class="text-xs font-bold text-rose-600 uppercase tracking-wider">Peringatan Risiko</p>
        <p class="text-xs font-bold text-slate-900 mt-0.5">Judi Slot Berisiko 100% Rungkat!</p>
       </div>
      </div>
     </div>
    </div>
   </section>

   <!-- Simulator Section -->
   <section id="simulator" class="w-full py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-5">
     <div class="max-w-2xl reveal">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-blue-50 text-blue-700 text-xs font-bold uppercase tracking-[0.15em]">
       SIMULATOR INTERAKTIF
      </div>
      <h2 class="display-font font-bold mt-3 text-3xl sm:text-4xl text-slate-900">Bandingkan Nasib Uang Anda</h2>
      <p class="mt-3 leading-relaxed text-slate-600 font-normal">Masukkan nominal modal awal dan pilih jangka waktu untuk melihat perbandingan realistis antara bermain judi slot dan menabung di deposito.</p>
     </div>

     <!-- Simulation Form Controls -->
     <section aria-label="Pengaturan simulasi" class="mt-9 glass-dark rounded-[2rem] p-6 sm:p-9 premium-shadow reveal delay-1 text-white border border-slate-800 shadow-2xl">
      <form id="simulator-form" class="grid md:grid-cols-3 gap-6 items-end">
       <div>
        <label class="block text-xs font-bold mb-2.5 text-slate-300 uppercase tracking-wider" for="money-input">Nominal Modal (Rp)</label>
        <div class="relative">
         <span class="absolute left-4 top-1/2 -translate-y-1/2 text-emerald-400 font-bold text-base">Rp</span>
         <input id="money-input" aria-describedby="input-feedback" type="text" inputmode="numeric" value="1.000.000" class="w-full rounded-xl border border-slate-700 bg-slate-900/90 text-white pl-12 pr-4 py-3.5 font-bold text-base placeholder:text-slate-500 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all">
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
        <span>Bandingkan Sekarang</span>
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
      <article id="slot-panel" class="rounded-[2rem] p-6 sm:p-8 border-t-4 border-t-rose-500 border border-rose-200/60 bg-gradient-to-b from-rose-50/70 to-red-50/30 shadow-xl shadow-rose-950/5 flex flex-col justify-between">
       <div>
        <div class="flex flex-wrap justify-between gap-4 items-start">
         <div class="flex gap-3.5 items-center">
          <span class="shrink-0 w-12 h-12 bg-rose-100 text-rose-600 rounded-2xl grid place-items-center shadow-sm">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
          </span>
          <div>
           <p class="text-xs font-bold text-rose-600 uppercase tracking-wider">Simulasi Judi Slot</p>
           <h3 class="font-bold mt-0.5 text-xl text-slate-900">Risiko Tinggi &amp; Hampir Pasti Rugi</h3>
          </div>
         </div>
         <span class="text-xs font-bold rounded-full px-3.5 py-1.5 bg-rose-100 text-rose-800 border border-rose-300/80 shadow-sm flex items-center gap-1.5">
          <span class="w-2 h-2 rounded-full bg-rose-600 animate-ping"></span>
          Risiko Ekstrem
         </span>
        </div>

        <p class="text-sm leading-relaxed mt-5 text-slate-600 font-normal">
         Judi online dirancang dengan algoritma House Edge yang menguntungkan bandar. Kebanyakan pemain mengalami kekalahan total (rungkat).
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

        <div class="mt-6 bg-white rounded-xl p-4.5 soft-card shadow-sm">
         <div class="flex justify-between text-xs font-bold uppercase tracking-wider">
          <span class="text-slate-600">Risk Meter (Risiko Rungkat)</span>
          <span id="risk-level" class="text-rose-600">Sangat Tinggi (Rungkat)</span>
         </div>
         <div class="h-3.5 rounded-full bg-slate-100 overflow-hidden mt-3 p-0.5 border border-slate-200">
          <div id="risk-fill" class="progress-fill h-full rounded-full bg-gradient-to-r from-amber-500 to-rose-600 shadow-sm" style="width:88%"></div>
         </div>
         <div class="flex justify-between text-[11px] text-slate-400 font-semibold mt-2">
          <span>Rendah</span>
          <span>Ekstrem (100%)</span>
         </div>
        </div>

        <!-- Chart.js Container Slot -->
        <div class="mt-6 bg-slate-950 rounded-2xl p-4 sm:p-5 border border-slate-800 shadow-2xl relative">
         <div class="flex justify-between items-center mb-3 px-1">
          <div class="flex items-center gap-2">
           <span class="w-2.5 h-2.5 rounded-full bg-rose-500 animate-pulse"></span>
           <h4 class="text-xs font-bold text-white uppercase tracking-wider">Grafik Tren Uang Slot</h4>
          </div>
          <span class="text-[11px] font-bold text-rose-400 bg-rose-950/80 border border-rose-800/60 px-2.5 py-0.5 rounded-full">Proyeksi Rungkat</span>
         </div>
         <div class="relative w-full h-52 sm:h-60">
          <canvas id="slotChart"></canvas>
         </div>
        </div>

        <!-- Slot Pattern Spin Results -->
        <div class="mt-5 rounded-2xl bg-slate-950 p-4 sm:p-5 text-white border border-slate-800">
         <div class="flex flex-wrap items-start justify-between gap-3">
          <div>
           <h4 class="text-xs font-bold text-white uppercase tracking-wider">Simulasi 6 Putaran Slot</h4>
           <p class="text-[11px] text-slate-400 mt-0.5">Ilustrasi hasil per spin berdasarkan algoritma House Edge</p>
          </div>
          <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-slate-800 text-slate-300">Live Result</span>
         </div>
         <div id="slot-pattern" class="mt-4 grid grid-cols-3 gap-2" aria-live="polite"></div>
        </div>
       </div>

       <div class="mt-5 grid sm:grid-cols-2 gap-3.5">
        <div class="rounded-xl border border-amber-200/80 bg-amber-50/80 p-4">
         <p class="text-xs font-bold text-amber-900 uppercase tracking-wider">Peluang Hasil</p>
         <div class="mt-3 space-y-2.5 text-xs">
          <div>
           <div class="flex justify-between text-slate-700 font-semibold">
            <span>Kalah Total (Rungkat)</span>
            <b class="text-rose-600">82%</b>
           </div>
           <div class="h-2 bg-amber-100 rounded-full mt-1 overflow-hidden">
            <div class="h-full w-[82%] bg-rose-500 rounded-full"></div>
           </div>
          </div>
          <div>
           <div class="flex justify-between text-slate-700 font-semibold">
            <span>Menang Menetap</span>
            <b class="text-amber-600">18%</b>
           </div>
           <div class="h-2 bg-amber-100 rounded-full mt-1 overflow-hidden">
            <div class="h-full w-[18%] bg-amber-400 rounded-full"></div>
           </div>
          </div>
         </div>
        </div>

        <div class="rounded-xl bg-white p-4 soft-card shadow-sm">
         <p class="text-xs font-bold text-slate-900 uppercase tracking-wider">Fakta Slot</p>
         <ul class="mt-2 space-y-1.5 text-xs text-slate-600 font-medium leading-relaxed">
          <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>Algoritma diatur oleh sistem bandar</li>
          <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>Kemenangan awal hanyalah umpan</li>
          <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>Makin lama main, makin habis saldo</li>
         </ul>
        </div>
       </div>
      </article>

      <!-- Deposito Panel (Right) -->
      <article id="deposit-panel" class="rounded-[2rem] p-6 sm:p-8 border-t-4 border-t-emerald-500 border border-emerald-200/60 bg-gradient-to-b from-emerald-50/70 to-teal-50/30 shadow-xl shadow-emerald-950/5 flex flex-col justify-between">
       <div>
        <div class="flex flex-wrap justify-between gap-4 items-start">
         <div class="flex gap-3.5 items-center">
          <span class="shrink-0 w-12 h-12 bg-emerald-100 text-emerald-700 rounded-2xl grid place-items-center shadow-sm">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 5c-1.5 0-2.8 1.4-3 2-3.5-1.5-11-.3-11 5 0 1.8 0 3 2 4.5V20h4v-2h3v2h4v-3.5c1-.5 1.5-1 2-2.5V7c0-.6-.4-1-1-1Z"/><path d="M16 11h.01"/></svg>
          </span>
          <div>
           <p class="text-xs font-bold text-emerald-700 uppercase tracking-wider">Simulasi Deposito Bank</p>
           <h3 class="font-bold mt-0.5 text-xl text-slate-900">Pertumbuhan Pasti &amp; Aman</h3>
          </div>
         </div>
         <span class="text-xs font-bold rounded-full px-3.5 py-1.5 bg-emerald-100 text-emerald-800 border border-emerald-300/80 shadow-sm flex items-center gap-1.5">
          <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
          Rendah Risiko
         </span>
        </div>

        <p class="text-sm leading-relaxed mt-5 text-slate-600 font-normal">
         Deposito bank dijamin oleh LPS (Lembaga Penjamin Simpanan) dengan bunga pasti setiap bulan tanpa risiko kehilangan modal.
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

        <div class="mt-6 bg-white rounded-xl p-4.5 soft-card shadow-sm">
         <div class="flex justify-between text-xs font-bold uppercase tracking-wider">
          <span class="text-slate-600">Estimasi Hasil / Bulan</span>
          <span id="monthly-value" class="text-emerald-600 font-bold"></span>
         </div>
         <div class="h-3.5 rounded-full bg-slate-100 overflow-hidden mt-3 p-0.5 border border-slate-200">
          <div id="deposit-fill" class="progress-fill h-full rounded-full bg-gradient-to-r from-emerald-400 to-teal-600 shadow-sm" style="width:18%"></div>
         </div>
         <p id="projection-value" class="mt-2.5 text-xs text-slate-500 font-medium"></p>
        </div>

        <!-- Chart.js Container Deposito -->
        <div class="mt-6 bg-slate-950 rounded-2xl p-4 sm:p-5 border border-slate-800 shadow-2xl relative">
         <div class="flex justify-between items-center mb-3 px-1">
          <div class="flex items-center gap-2">
           <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
           <h4 class="text-xs font-bold text-white uppercase tracking-wider">Grafik Pertumbuhan Deposito</h4>
          </div>
          <span class="text-[11px] font-bold text-emerald-400 bg-emerald-950/80 border border-emerald-800/60 px-2.5 py-0.5 rounded-full">Bunga Berbunga</span>
         </div>
         <div class="relative w-full h-52 sm:h-60">
          <canvas id="depositoChart"></canvas>
         </div>
        </div>

        <!-- Deposito Compounding Breakdown Grid (Matching Left Panel Height) -->
        <div class="mt-5 rounded-2xl bg-slate-950 p-4 sm:p-5 text-white border border-slate-800">
         <div class="flex flex-wrap items-start justify-between gap-3">
          <div>
           <h4 class="text-xs font-bold text-white uppercase tracking-wider">Rincian Pertumbuhan Deposito</h4>
           <p class="text-[11px] text-slate-400 mt-0.5">Akumulasi saldo dan bunga pasti secara berkala</p>
          </div>
          <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-emerald-950 text-emerald-400 border border-emerald-800/60">Pasti Untung</span>
         </div>
         <div id="deposit-breakdown" class="mt-4 grid grid-cols-3 gap-2"></div>
        </div>
       </div>

       <!-- 4 Key Advantages of Deposito Card Grid to fill bottom area -->
       <div class="mt-5 grid sm:grid-cols-2 gap-3.5">
        <div class="rounded-xl border border-emerald-200/80 bg-emerald-50/80 p-4">
         <p class="text-xs font-bold text-emerald-900 uppercase tracking-wider">Proteksi Keamanan</p>
         <div class="mt-2 text-xs text-slate-700 font-medium leading-relaxed">
          Simpanan Anda dijamin 100% aman hingga Rp2 Miliar per nasabah oleh LPS (Lembaga Penjamin Simpanan).
         </div>
        </div>

        <div class="rounded-xl bg-white p-4 soft-card shadow-sm">
         <p class="text-xs font-bold text-slate-900 uppercase tracking-wider">Keunggulan Deposito</p>
         <ul class="mt-2 space-y-1.5 text-xs text-slate-600 font-medium leading-relaxed">
          <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Bunga pasti cair tiap bulan</li>
          <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Modal awal 100% utuh &amp; dijamin</li>
          <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Bebas dari stress &amp; rungkat</li>
         </ul>
        </div>
       </div>
      </article>
     </div>
    </div>
   </section>

   <!-- Comparison Section -->
   <section class="w-full bg-slate-100/70 py-16 lg:py-20 border-y border-slate-200/80">
    <div class="max-w-7xl mx-auto px-5">
     <div class="flex flex-wrap items-end justify-between gap-4">
      <div>
       <span class="text-xs font-bold text-blue-600 uppercase tracking-[0.15em] px-3 py-1 bg-blue-50 rounded-lg">PERBANDINGAN HAPUS RAGU</span>
       <h2 class="display-font font-bold mt-3 text-3xl sm:text-4xl text-slate-900">Kenapa Deposito Lebih Unggul?</h2>
      </div>
      <p class="max-w-md text-sm leading-relaxed text-slate-600 font-normal">Ringkasan kontras antara keputusan rasional investasi aman vs perjudian spekulatif.</p>
     </div>

     <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-5 mt-9">
      <!-- Card 1 -->
      <article class="bg-white rounded-2xl p-5 soft-card hover-lift shadow-sm flex flex-col justify-between">
       <div>
        <div class="w-10 h-10 rounded-xl bg-blue-100/80 text-blue-600 grid place-items-center mb-4">
         <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
        </div>
        <h3 class="font-bold text-base text-slate-900">Selisih Hasil</h3>
        <p id="difference-output" class="stat-number font-bold text-blue-600 mt-2 text-xl"></p>
        <p class="text-xs text-slate-500 mt-2 font-medium">Beda total nilai aset akhir yang Anda miliki antara memilih Deposito dibanding Slot.</p>
       </div>
       <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] font-bold text-emerald-600">
        <span>Keuntungan Pasti</span>
        <span>+100% Utuh</span>
       </div>
      </article>

      <!-- Card 2 -->
      <article class="bg-white rounded-2xl p-5 soft-card hover-lift shadow-sm flex flex-col justify-between">
       <div>
        <div class="w-10 h-10 rounded-xl bg-emerald-100/80 text-emerald-600 grid place-items-center mb-4">
         <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20v-6"/><path d="M6 20V10"/><path d="M18 20V4"/></svg>
        </div>
        <h3 class="font-bold text-base text-slate-900">Pertumbuhan Capital</h3>
        <p class="text-xs leading-relaxed text-slate-600 mt-2">Deposito memberikan bunga pasti berbunga, sedangkan slot menggerus modal hingga habis.</p>
       </div>
       <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] font-bold text-emerald-600">
        <span>Bunga 5%/Tahun</span>
        <span>Terus Naik</span>
       </div>
      </article>

      <!-- Card 3 -->
      <article class="bg-white rounded-2xl p-5 soft-card hover-lift shadow-sm flex flex-col justify-between">
       <div>
        <div class="w-10 h-10 rounded-xl bg-rose-100/80 text-rose-600 grid place-items-center mb-4">
         <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
        </div>
        <h3 class="font-bold text-base text-slate-900">Risiko Kehilangan</h3>
        <p class="text-xs leading-relaxed text-slate-600 mt-2">Slot berisiko kerugian 100% dalam hitungan jam, sedangkan deposito 0% risiko hangus.</p>
       </div>
       <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] font-bold text-rose-600">
        <span>Slot 99% Rugi</span>
        <span>Deposito 0%</span>
       </div>
      </article>

      <!-- Card 4 -->
      <article class="bg-white rounded-2xl p-5 soft-card hover-lift shadow-sm flex flex-col justify-between">
       <div>
        <div class="w-10 h-10 rounded-xl bg-emerald-100/80 text-emerald-600 grid place-items-center mb-4">
         <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
        </div>
        <h3 class="font-bold text-base text-slate-900">Keamanan Dana</h3>
        <p class="text-xs leading-relaxed text-slate-600 mt-2">Dana deposito resmi dilindungi LPS &amp; OJK, judi online ilegal &amp; rawan penipuan deposit.</p>
       </div>
       <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] font-bold text-emerald-600">
        <span>LPS &amp; OJK</span>
        <span>Terjamin Negara</span>
       </div>
      </article>

      <!-- Card 5 -->
      <article class="bg-gradient-to-br from-indigo-900 to-slate-900 rounded-2xl p-5 text-white hover-lift shadow-lg shadow-indigo-950/20 flex flex-col justify-between">
       <div>
        <div class="w-10 h-10 rounded-xl bg-indigo-800/60 text-indigo-300 grid place-items-center mb-4 border border-indigo-700/50">
         <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
        </div>
        <h3 class="font-bold text-base text-white">Efek Jangka Panjang</h3>
        <p class="text-xs leading-relaxed text-indigo-100/90 mt-2">Makin lama di deposito makin kaya &amp; tenang, makin lama di slot makin miskin &amp; terlilit utang.</p>
       </div>
       <div class="mt-4 pt-3 border-t border-indigo-800/80 flex items-center justify-between text-[11px] font-bold text-indigo-300">
        <span>Bebas Utang</span>
        <span>Aset Bertambah</span>
       </div>
      </article>
     </div>
    </div>
   </section>

   <!-- Belajar Section -->
   <section id="belajar" class="w-full py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-5">
     <div class="max-w-2xl">
      <span class="text-xs font-bold text-blue-600 uppercase tracking-[0.15em] px-3 py-1 bg-blue-50 rounded-lg">LITERASI KEUANGAN</span>
      <h2 class="display-font font-bold mt-3 text-3xl sm:text-4xl text-slate-900">Pahami Risiko Sebelum Terlambat</h2>
      <p class="text-slate-600 mt-3 leading-relaxed font-normal">Pengetahuan dasar untuk melindungi finansial Anda dari ancaman judi online dan mengoptimalkan tabungan.</p>
     </div>

     <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
      <!-- Card 1 -->
      <article class="rounded-2xl p-6 border border-amber-200/80 bg-gradient-to-br from-amber-50/90 to-amber-50/20 hover-lift shadow-sm flex flex-col justify-between">
       <div>
        <div class="w-11 h-11 rounded-2xl bg-amber-100 text-amber-600 grid place-items-center mb-4 shadow-sm">
         <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="12" height="12" x="6" y="6" rx="2"/><circle cx="9" cy="9" r="1"/><circle cx="15" cy="15" r="1"/><circle cx="9" cy="15" r="1"/><circle cx="15" cy="9" r="1"/></svg>
        </div>
        <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md bg-amber-100 text-amber-800 text-[10px] font-bold uppercase mb-2">
         Risiko Bandar
        </div>
        <h3 class="font-bold text-lg text-slate-900">Bahaya House Edge</h3>
        <p class="text-xs leading-relaxed text-slate-600 mt-2 font-normal">Mesin judi diprogram secara sistematis agar pengelola selalu menang dalam jangka panjang. Pemain hanya diberi ilusi kemenangan sementara.</p>
       </div>
       <div class="mt-4 pt-3 border-t border-amber-200/60 text-[11px] font-semibold text-amber-900 flex items-center justify-between">
        <span>Solusi:</span>
        <span>Hindari Judi Online</span>
       </div>
      </article>

      <!-- Card 2 -->
      <article class="rounded-2xl p-6 border border-rose-200/80 bg-gradient-to-br from-rose-50/90 to-rose-50/20 hover-lift shadow-sm flex flex-col justify-between">
       <div>
        <div class="w-11 h-11 rounded-2xl bg-rose-100 text-rose-600 grid place-items-center mb-4 shadow-sm">
         <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
        </div>
        <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md bg-rose-100 text-rose-800 text-[10px] font-bold uppercase mb-2">
         Kecanduan Mental
        </div>
        <h3 class="font-bold text-lg text-slate-900">Kecanduan Dopamin</h3>
        <p class="text-xs leading-relaxed text-slate-600 mt-2 font-normal">Visual dan efek suara slot dirancang memicu hormon dopamin otak, memicu kebiasaan impulsif untuk terus melakukan deposit tanpa sadar.</p>
       </div>
       <div class="mt-4 pt-3 border-t border-rose-200/60 text-[11px] font-semibold text-rose-900 flex items-center justify-between">
        <span>Solusi:</span>
        <span>Alihkan ke Hobi Positif</span>
       </div>
      </article>

      <!-- Card 3 -->
      <article class="rounded-2xl p-6 border border-emerald-200/80 bg-gradient-to-br from-emerald-50/90 to-emerald-50/20 hover-lift shadow-sm flex flex-col justify-between">
       <div>
        <div class="w-11 h-11 rounded-2xl bg-emerald-100 text-emerald-600 grid place-items-center mb-4 shadow-sm">
         <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 20h10"/><path d="M10 20c0-3.5 2.5-6.5 6-7"/><path d="M6 13c3.5 0 6 3 6 7"/><path d="M12 20v-9"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md bg-emerald-100 text-emerald-800 text-[10px] font-bold uppercase mb-2">
         Investasi Pintar
        </div>
        <h3 class="font-bold text-lg text-slate-900">Kekuatan Bunga Berbunga</h3>
        <p class="text-xs leading-relaxed text-slate-600 mt-2 font-normal">Dengan bunga berbunga (compounding interest) pada deposito, keuntungan dari bunga akan menghasilkan keuntungan baru secara berkelanjutan.</p>
       </div>
       <div class="mt-4 pt-3 border-t border-emerald-200/60 text-[11px] font-semibold text-emerald-900 flex items-center justify-between">
        <span>Manfaat:</span>
        <span>Aset Berlipat Ganda</span>
       </div>
      </article>

      <!-- Card 4 -->
      <article class="rounded-2xl p-6 border border-blue-200/80 bg-gradient-to-br from-blue-50/90 to-blue-50/20 hover-lift shadow-sm flex flex-col justify-between">
       <div>
        <div class="w-11 h-11 rounded-2xl bg-blue-100 text-blue-600 grid place-items-center mb-4 shadow-sm">
         <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 5c-1.5 0-2.8 1.4-3 2-3.5-1.5-11-.3-11 5 0 1.8 0 3 2 4.5V20h4v-2h3v2h4v-3.5c1-.5 1.5-1 2-2.5V7c0-.6-.4-1-1-1Z"/><path d="M16 11h.01"/></svg>
        </div>
        <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md bg-blue-100 text-blue-800 text-[10px] font-bold uppercase mb-2">
         Perlindungan Hukum
        </div>
        <h3 class="font-bold text-lg text-slate-900">Proteksi Dana LPS</h3>
        <p class="text-xs leading-relaxed text-slate-600 mt-2 font-normal">LPS menjamin simpanan nasabah di bank hingga Rp2 Miliar, menjaga modal Anda tetap utuh dari krisis perbankan tanpa risiko hilang.</p>
       </div>
       <div class="mt-4 pt-3 border-t border-blue-200/60 text-[11px] font-semibold text-blue-900 flex items-center justify-between">
        <span>Manfaat:</span>
        <span>Aman 100% Dijamin</span>
       </div>
      </article>

      <!-- Card 5 -->
      <article class="rounded-2xl p-6 border border-indigo-200/80 bg-gradient-to-br from-indigo-50/90 to-indigo-50/20 hover-lift shadow-sm flex flex-col justify-between">
       <div>
        <div class="w-11 h-11 rounded-2xl bg-indigo-100 text-indigo-600 grid place-items-center mb-4 shadow-sm">
         <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 6h4"/><path d="M2 10h4"/><path d="M2 14h4"/><path d="M2 18h4"/><rect width="16" height="18" x="6" y="3" rx="2"/><path d="M10 8h8"/><path d="M10 12h8"/><path d="M10 16h6"/></svg>
        </div>
        <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md bg-indigo-100 text-indigo-800 text-[10px] font-bold uppercase mb-2">
         Fondasi Finansial
        </div>
        <h3 class="font-bold text-lg text-slate-900">Perencanaan Dana Darurat</h3>
        <p class="text-xs leading-relaxed text-slate-600 mt-2 font-normal">Memiliki tabungan atau deposito membantu Anda siap menghadapi situasi darurat seperti PHK atau sakit tanpa harus berutang pinjol.</p>
       </div>
       <div class="mt-4 pt-3 border-t border-indigo-200/60 text-[11px] font-semibold text-indigo-900 flex items-center justify-between">
        <span>Manfaat:</span>
        <span>Siap Krisis &amp; Tenang</span>
       </div>
      </article>

      <!-- Card 6 -->
      <article class="rounded-2xl p-6 border border-teal-200/80 bg-gradient-to-br from-teal-50/90 to-teal-50/20 hover-lift shadow-sm flex flex-col justify-between">
       <div>
        <div class="w-11 h-11 rounded-2xl bg-teal-100 text-teal-600 grid place-items-center mb-4 shadow-sm">
         <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="19" r="3"/><path d="M9 19h8.5a3.5 3.5 0 0 0 0-7h-11a3.5 3.5 0 0 1 0-7H15"/><circle cx="18" cy="5" r="3"/></svg>
        </div>
        <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md bg-teal-100 text-teal-800 text-[10px] font-bold uppercase mb-2">
         Gaya Hidup Sehat
        </div>
        <h3 class="font-bold text-lg text-slate-900">Menciptakan Kebiasaan Positif</h3>
        <p class="text-xs leading-relaxed text-slate-600 mt-2 font-normal">Menyapih kebiasaan judi dan mengalihkan dana bulanan ke instrumen investasi adalah langkah awal menuju kebebasan finansial sejati.</p>
       </div>
       <div class="mt-4 pt-3 border-t border-teal-200/60 text-[11px] font-semibold text-teal-900 flex items-center justify-between">
        <span>Manfaat:</span>
        <span>Kebebasan Finansial</span>
       </div>
      </article>
     </div>
    </div>
   </section>

   <!-- Nasihat Section -->
   <section id="nasihat" class="w-full bg-slate-950 py-16 lg:py-24 text-white relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[300px] bg-gradient-to-b from-blue-600/10 to-transparent blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-5 relative">
     <div class="text-center max-w-2xl mx-auto">
      <span class="text-xs font-bold text-blue-400 uppercase tracking-[0.15em] px-3 py-1 bg-blue-900/40 rounded-lg border border-blue-700/50">NASIHAT FINANSIAL</span>
      <h2 class="display-font font-bold mt-3 text-3xl sm:text-4xl text-white">Pesan Penting Untuk Masa Depan</h2>
     </div>

     <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5 mt-12">
      <blockquote class="rounded-2xl p-6 border border-slate-800 bg-slate-900/80 hover-lift shadow-lg flex flex-col justify-between">
       <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-400"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2h-4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/></svg>
        <p class="font-semibold leading-relaxed mt-5 text-sm text-slate-200">"Tidak ada orang yang kaya dari judi online, tapi sudah tak terhitung berapa banyak yang hancur karenanya."</p>
       </div>
       <p class="mt-6 pt-3 border-t border-slate-800 text-[11px] font-bold text-slate-400 uppercase tracking-wider">— Realita Finansial</p>
      </blockquote>

      <blockquote class="rounded-2xl p-6 border border-slate-800 bg-slate-900/80 hover-lift shadow-lg flex flex-col justify-between">
       <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-amber-400"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2h-4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/></svg>
        <p class="font-semibold leading-relaxed mt-5 text-sm text-slate-200">"Uang yang Anda depositkan ke slot hari ini adalah modal masa depan yang Anda buang secara cuma-cuma."</p>
       </div>
       <p class="mt-6 pt-3 border-t border-slate-800 text-[11px] font-bold text-slate-400 uppercase tracking-wider">— Pengingat Diri</p>
      </blockquote>

      <blockquote class="rounded-2xl p-6 border border-slate-800 bg-slate-900/80 hover-lift shadow-lg flex flex-col justify-between">
       <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-400"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2h-4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/></svg>
        <p class="font-semibold leading-relaxed mt-5 text-sm text-slate-200">"Deposito memberikan ketenangan pikiran. Anda tidur nyenyak, uang Anda tetap bekerja menumbuhkan nilai."</p>
       </div>
       <p class="mt-6 pt-3 border-t border-slate-800 text-[11px] font-bold text-slate-400 uppercase tracking-wider">— Ketenangan Pikiran</p>
      </blockquote>

      <blockquote class="rounded-2xl p-6 border border-slate-800 bg-slate-900/80 hover-lift shadow-lg flex flex-col justify-between">
       <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-teal-400"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2h-4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/></svg>
        <p class="font-semibold leading-relaxed mt-5 text-sm text-slate-200">"Stop sekarang! Alihkan uang Anda ke tabungan rasional dan bangun masa depan yang lebih baik untuk keluarga."</p>
       </div>
       <p class="mt-6 pt-3 border-t border-slate-800 text-[11px] font-bold text-slate-400 uppercase tracking-wider">— Langkah Nyata</p>
      </blockquote>
     </div>
    </div>
   </section>
  </main>

  <!-- Footer -->
  <footer class="w-full bg-white border-t border-slate-200">
   <div class="max-w-7xl mx-auto px-5 py-9 grid md:grid-cols-[auto_1fr] gap-6 items-start">
    <span class="w-11 h-11 rounded-2xl bg-blue-50 text-blue-600 border border-blue-200 grid place-items-center shrink-0">
     <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
    </span>
    <div>
     <h2 class="font-bold text-slate-900 text-base">Disclaimer Literasi Keuangan</h2>
     <p class="text-xs leading-relaxed text-slate-500 mt-1.5 max-w-5xl font-medium">
      Website ini dibuat murni untuk tujuan edukasi dan simulasi literasi keuangan. Angka pada simulasi slot merupakan model ilustratif probabilitas dan bukan representasi resmi dari platform mana pun. Deposito bank dihitung berdasarkan perkiraan tingkat suku bunga standar yang berlaku di Indonesia.
     </p>
    </div>
   </div>
  </footer>
@endsection
