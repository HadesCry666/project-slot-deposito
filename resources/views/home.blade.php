@extends('layouts.app')

@section('title', 'Slot atau Deposito? | Simulasi Literasi Keuangan')

@section('content')
  <!-- Modern Header / Navbar -->
  <header class="w-full bg-white/85 border-b border-slate-200/90 sticky top-0 z-40 backdrop-blur-md">
   <nav aria-label="Navigasi utama" class="max-w-7xl mx-auto px-5 py-3.5 flex items-center justify-between gap-4">
    <a href="#beranda" class="flex items-center gap-3 group no-underline">
     <span class="w-10 h-10 rounded-xl bg-gradient-to-tr from-blue-600 via-indigo-600 to-emerald-500 text-white grid place-items-center shadow-md shadow-blue-500/25 group-hover:scale-105 transition-transform shrink-0">
      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h18"/></svg>
     </span>
     <span class="shrink-0">
      <span class="block font-bold leading-none text-slate-900 text-base">Slot atau Deposito?</span>
      <span class="block text-[11px] font-medium text-slate-500 mt-1">Simulasi Literasi Keuangan</span>
     </span>
    </a>
    <div class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
     <a class="nav-link hover:text-blue-600 transition-colors" href="#contoh-simulasi">Contoh Simulasi</a>
     <a class="nav-link hover:text-blue-600 transition-colors" href="#belajar">Belajar</a>
     <a class="nav-link hover:text-blue-600 transition-colors" href="#nasihat">Nasihat</a>
    </div>

    <div class="flex items-center gap-3">
     @auth
      @if (auth()->user()->isAdmin())
       <a href="{{ route('admin.dashboard') }}" class="bg-slate-800 hover:bg-slate-900 text-white rounded-xl px-4 py-2.5 text-xs font-bold no-underline transition-all">
        Admin Panel
       </a>
      @endif

      <a href="{{ route('simulator') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl px-5 py-2.5 text-sm font-bold no-underline transition-all shadow-md shadow-emerald-500/20">
       Buka Simulator
      </a>

      <form action="{{ route('logout') }}" method="POST" class="inline">
       @csrf
       <button type="submit" class="text-xs font-bold text-slate-500 hover:text-rose-600 px-2 py-2">
        Logout
       </button>
      </form>
     @else
      <a href="{{ route('login') }}" class="text-sm font-bold text-slate-700 hover:text-blue-600 px-3 py-2 transition-colors">
       Masuk
      </a>
      <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-xl px-5 py-2.5 text-sm font-bold no-underline transition-all shadow-md shadow-blue-500/25">
       Daftar
      </a>
     @endauth
    </div>
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
       <span>{{ $content['hero_badge'] ?? 'Edukasi & Literasi Keuangan' }}</span>
      </div>
      <h1 class="display-font font-bold leading-[1.08] tracking-tight text-4xl sm:text-5xl lg:text-6xl text-slate-900">
       {{ $content['hero_title'] ?? 'Slot atau Deposito?' }}
      </h1>
      <p class="mt-6 text-lg leading-relaxed max-w-2xl text-slate-600 font-normal">
       {{ $content['hero_subtitle'] ?? 'Bandingkan hasil keuangan dari kebiasaan main slot judi online versus menyimpan uang di deposito bank secara obyektif, terukur, dan rasional.' }}
      </p>
      <div class="mt-8 flex flex-wrap gap-4 items-center">
       <a href="#contoh-simulasi" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white inline-flex items-center gap-2.5 rounded-xl px-7 py-4 font-bold no-underline transition-all hover:-translate-y-0.5 shadow-lg shadow-blue-500/25">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="16" height="20" x="4" y="2" rx="2"/><line x1="8" x2="16" y1="6" y2="6"/><line x1="16" x2="16" y1="14" y2="18"/><path d="M16 10h.01"/><path d="M12 10h.01"/><path d="M8 10h.01"/><path d="M12 14h.01"/><path d="M8 14h.01"/><path d="M12 18h.01"/><path d="M8 18h.01"/></svg>
        <span>Lihat Contoh Simulasi</span>
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

   <!-- Landing Page Example Simulation Showcase Section -->
   <section id="contoh-simulasi" class="w-full py-16 lg:py-24 bg-slate-950 text-white relative overflow-hidden">
    <div class="absolute top-0 right-1/4 w-[500px] h-[300px] bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-1/4 w-[500px] h-[300px] bg-rose-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-5 relative z-10">
     <div class="text-center max-w-3xl mx-auto mb-12">
      <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-widest border border-emerald-500/30">
       Contoh Simulasi Realistis
      </span>
      <h2 class="display-font text-3xl sm:text-5xl font-bold text-white mt-4 leading-tight">
       Contoh Perbandingan Uang Rp1.000.000 (1 Tahun)
      </h2>
      <p class="text-slate-400 mt-4 text-base leading-relaxed">
       Lihat perbandingan nyata apa yang terjadi pada modal uang Rp1.000.000 jika dimainkan di slot judi online versus disimpan di deposito bank selama 1 tahun.
      </p>
     </div>

     <!-- Side-by-Side Example Cards -->
     <div class="grid lg:grid-cols-2 gap-8 items-stretch mb-12">

      <!-- Sample Slot Card -->
      <div class="rounded-[2.2rem] p-6 sm:p-8 border-t-4 border-t-rose-500 border border-rose-900/60 bg-gradient-to-b from-rose-950/80 via-slate-950 to-slate-950 shadow-2xl flex flex-col justify-between">
       <div>
        <div class="flex items-center justify-between gap-4 mb-4">
         <div class="flex items-center gap-3">
          <span class="w-10 h-10 rounded-xl bg-rose-900/80 text-rose-300 grid place-items-center border border-rose-700/50">
           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
          </span>
          <div>
           <p class="text-xs font-bold text-rose-400 uppercase tracking-wider">Skenario Judi Slot</p>
           <h3 class="font-bold text-lg text-white">Modal Rp1.000.000 &rarr; Rungkat Total</h3>
          </div>
         </div>
         <span class="text-[11px] font-extrabold px-3 py-1 rounded-full bg-rose-950 text-rose-300 border border-rose-700/80 uppercase">
          RUNGKAT 100%
         </span>
        </div>

        <div class="grid grid-cols-3 gap-3 my-6">
         <div class="bg-slate-900/90 border border-slate-700/70 rounded-xl p-3">
          <p class="text-[10px] font-bold text-slate-400 uppercase">Modal Awal</p>
          <p class="text-xs sm:text-sm font-bold text-white mt-1">Rp1.000.000</p>
         </div>
         <div class="bg-rose-950/90 border border-rose-800/80 rounded-xl p-3">
          <p class="text-[10px] font-bold text-rose-300 uppercase">Sisa Saldo</p>
          <p class="text-xs sm:text-sm font-bold text-rose-400 mt-1">Rp0</p>
         </div>
         <div class="bg-rose-950/90 border border-rose-800/80 rounded-xl p-3">
          <p class="text-[10px] font-bold text-rose-300 uppercase">Kerugian</p>
          <p class="text-xs sm:text-sm font-bold text-rose-400 mt-1">−Rp1.000.000</p>
         </div>
        </div>

        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Contoh 6 Putaran Spin (House Edge):</p>
        <div class="grid grid-cols-3 gap-2">
         <div class="rounded-xl border border-rose-500/40 bg-rose-950/80 p-2.5">
          <div class="flex justify-between text-[10px] font-bold text-slate-300"><span>Spin 1</span><span class="text-rose-400">KALAH</span></div>
          <p class="text-xs font-bold text-rose-400 mt-1">−Rp250.000</p>
          <p class="text-[10px] text-slate-400 mt-0.5">Saldo: Rp750k</p>
         </div>
         <div class="rounded-xl border border-emerald-500/40 bg-emerald-950/80 p-2.5">
          <div class="flex justify-between text-[10px] font-bold text-slate-300"><span>Spin 2</span><span class="text-emerald-400">MENANG</span></div>
          <p class="text-xs font-bold text-emerald-400 mt-1">+Rp100.000</p>
          <p class="text-[10px] text-slate-400 mt-0.5">Saldo: Rp850k</p>
         </div>
         <div class="rounded-xl border border-rose-500/40 bg-rose-950/80 p-2.5">
          <div class="flex justify-between text-[10px] font-bold text-slate-300"><span>Spin 3</span><span class="text-rose-400">KALAH</span></div>
          <p class="text-xs font-bold text-rose-400 mt-1">−Rp350.000</p>
          <p class="text-[10px] text-slate-400 mt-0.5">Saldo: Rp500k</p>
         </div>
         <div class="rounded-xl border border-rose-500/40 bg-rose-950/80 p-2.5">
          <div class="flex justify-between text-[10px] font-bold text-slate-300"><span>Spin 4</span><span class="text-rose-400">KALAH</span></div>
          <p class="text-xs font-bold text-rose-400 mt-1">−Rp200.000</p>
          <p class="text-[10px] text-slate-400 mt-0.5">Saldo: Rp300k</p>
         </div>
         <div class="rounded-xl border border-rose-500/40 bg-rose-950/80 p-2.5">
          <div class="flex justify-between text-[10px] font-bold text-slate-300"><span>Spin 5</span><span class="text-rose-400">KALAH</span></div>
          <p class="text-xs font-bold text-rose-400 mt-1">−Rp200.000</p>
          <p class="text-[10px] text-slate-400 mt-0.5">Saldo: Rp100k</p>
         </div>
         <div class="rounded-xl border border-rose-500/40 bg-rose-950/80 p-2.5">
          <div class="flex justify-between text-[10px] font-bold text-slate-300"><span>Spin 6</span><span class="text-rose-400">KALAH</span></div>
          <p class="text-xs font-bold text-rose-400 mt-1">−Rp100.000</p>
          <p class="text-[10px] text-slate-400 mt-0.5">Saldo: Rp0</p>
         </div>
        </div>
       </div>

       <div class="mt-6 pt-4 border-t border-rose-900/40 flex items-center justify-between text-xs text-rose-300 font-semibold">
        <span>❌ Risiko Rungkat: 99% (Sangat Tinggi)</span>
        <span>Uang Hilang Hangus</span>
       </div>
      </div>

      <!-- Sample Deposito Card -->
      <div class="rounded-[2.2rem] p-6 sm:p-8 border-t-4 border-t-emerald-500 border border-emerald-900/60 bg-gradient-to-b from-emerald-950/80 via-slate-950 to-slate-950 shadow-2xl flex flex-col justify-between">
       <div>
        <div class="flex items-center justify-between gap-4 mb-4">
         <div class="flex items-center gap-3">
          <span class="w-10 h-10 rounded-xl bg-emerald-900/80 text-emerald-300 grid place-items-center border border-emerald-700/50">
           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 5c-1.5 0-2.8 1.4-3 2-3.5-1.5-11-.3-11 5 0 1.8 0 3 2 4.5V20h4v-2h3v2h4v-3.5c1-.5 1.5-1 2-2.5V7c0-.6-.4-1-1-1Z"/><path d="M16 11h.01"/></svg>
          </span>
          <div>
           <p class="text-xs font-bold text-emerald-400 uppercase tracking-wider">Skenario Deposito Bank</p>
           <h3 class="font-bold text-lg text-white">Modal Rp1.000.000 &rarr; Rp1.050.000</h3>
          </div>
         </div>
         <span class="text-[11px] font-extrabold px-3 py-1 rounded-full bg-emerald-950 text-emerald-300 border border-emerald-700/80 uppercase">
          UNTUNG 100% PASTI
         </span>
        </div>

        <div class="grid grid-cols-3 gap-3 my-6">
         <div class="bg-slate-900/90 border border-slate-700/70 rounded-xl p-3">
          <p class="text-[10px] font-bold text-slate-400 uppercase">Modal Awal</p>
          <p class="text-xs sm:text-sm font-bold text-white mt-1">Rp1.000.000</p>
         </div>
         <div class="bg-emerald-950/90 border border-emerald-800/80 rounded-xl p-3">
          <p class="text-[10px] font-bold text-emerald-300 uppercase">Total Bunga</p>
          <p class="text-xs sm:text-sm font-bold text-emerald-400 mt-1">+Rp50.000</p>
         </div>
         <div class="bg-emerald-950/90 border border-emerald-800/80 rounded-xl p-3">
          <p class="text-[10px] font-bold text-emerald-300 uppercase">Hasil Akhir</p>
          <p class="text-xs sm:text-sm font-bold text-emerald-400 mt-1">Rp1.050.000</p>
         </div>
        </div>

        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Rincian Bunga Berbunga (5,0% / Tahun):</p>
        <div class="grid grid-cols-3 gap-2">
         <div class="rounded-xl border border-emerald-500/40 bg-emerald-950/80 p-2.5">
          <div class="flex justify-between text-[10px] font-bold text-slate-300"><span>Bln 2</span><span class="text-emerald-400">STABIL</span></div>
          <p class="text-xs font-bold text-emerald-400 mt-1">+Rp8.333</p>
          <p class="text-[10px] text-slate-400 mt-0.5">Saldo: Rp1.008k</p>
         </div>
         <div class="rounded-xl border border-emerald-500/40 bg-emerald-950/80 p-2.5">
          <div class="flex justify-between text-[10px] font-bold text-slate-300"><span>Bln 4</span><span class="text-emerald-400">STABIL</span></div>
          <p class="text-xs font-bold text-emerald-400 mt-1">+Rp16.666</p>
          <p class="text-[10px] text-slate-400 mt-0.5">Saldo: Rp1.016k</p>
         </div>
         <div class="rounded-xl border border-emerald-500/40 bg-emerald-950/80 p-2.5">
          <div class="flex justify-between text-[10px] font-bold text-slate-300"><span>Bln 6</span><span class="text-emerald-400">STABIL</span></div>
          <p class="text-xs font-bold text-emerald-400 mt-1">+Rp25.000</p>
          <p class="text-[10px] text-slate-400 mt-0.5">Saldo: Rp1.025k</p>
         </div>
         <div class="rounded-xl border border-emerald-500/40 bg-emerald-950/80 p-2.5">
          <div class="flex justify-between text-[10px] font-bold text-slate-300"><span>Bln 8</span><span class="text-emerald-400">STABIL</span></div>
          <p class="text-xs font-bold text-emerald-400 mt-1">+Rp33.333</p>
          <p class="text-[10px] text-slate-400 mt-0.5">Saldo: Rp1.033k</p>
         </div>
         <div class="rounded-xl border border-emerald-500/40 bg-emerald-950/80 p-2.5">
          <div class="flex justify-between text-[10px] font-bold text-slate-300"><span>Bln 10</span><span class="text-emerald-400">STABIL</span></div>
          <p class="text-xs font-bold text-emerald-400 mt-1">+Rp41.666</p>
          <p class="text-[10px] text-slate-400 mt-0.5">Saldo: Rp1.041k</p>
         </div>
         <div class="rounded-xl border border-emerald-500/40 bg-emerald-950/80 p-2.5">
          <div class="flex justify-between text-[10px] font-bold text-slate-300"><span>Bln 12</span><span class="text-emerald-400">STABIL</span></div>
          <p class="text-xs font-bold text-emerald-400 mt-1">+Rp50.000</p>
          <p class="text-[10px] text-slate-400 mt-0.5">Saldo: Rp1.050k</p>
         </div>
        </div>
       </div>

       <div class="mt-6 pt-4 border-t border-emerald-900/40 flex items-center justify-between text-xs text-emerald-300 font-semibold">
        <span>🛡️ Keamanan: 100% Dijamin LPS &amp; OJK</span>
        <span>Modal Utuh + Bunga</span>
       </div>
      </div>
     </div>

     <!-- Interactive Promo Banner -->
     <div class="rounded-3xl p-8 bg-gradient-to-r from-blue-900 via-indigo-900 to-slate-900 border border-indigo-700/50 shadow-2xl text-center relative overflow-hidden">
      <div class="relative z-10 max-w-2xl mx-auto">
       <h3 class="display-font text-2xl sm:text-3xl font-bold text-white">Ingin Coba Dengan Nominal Modal Anda Sendiri?</h3>
       <p class="text-slate-300 mt-2 text-sm">
        Hitung simulasi presisi dengan nominal modal, suku bunga, dan jangka waktu (1 bln - 5 thn) sesuai keinginan Anda di simulator interaktif.
       </p>
       <div class="mt-6 flex flex-wrap justify-center gap-4">
        @auth
         <a href="{{ route('simulator') }}" class="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white rounded-2xl px-8 py-4 font-bold text-base no-underline transition-all shadow-lg shadow-emerald-500/25">
          Buka Simulator Interaktif &rarr;
         </a>
        @else
         <a href="{{ route('login') }}" class="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white rounded-2xl px-8 py-4 font-bold text-base no-underline transition-all shadow-lg shadow-emerald-500/25">
          Masuk Untuk Coba Simulator &rarr;
         </a>
         <a href="{{ route('register') }}" class="bg-slate-800 hover:bg-slate-700 text-white rounded-2xl px-8 py-4 font-bold text-base no-underline transition-all border border-slate-700">
          Daftar Akun Baru
         </a>
        @endauth
       </div>
      </div>
     </div>
    </div>
   </section>

   <!-- Comparison Section -->
   <section class="w-full bg-slate-100/70 py-16 lg:py-20 border-y border-slate-200/80">
    <div class="max-w-7xl mx-auto px-5">
     <div class="flex flex-wrap items-end justify-between gap-4">
      <div>
       <span class="text-xs font-bold text-blue-600 uppercase tracking-[0.15em] px-3 py-1 bg-blue-50 rounded-lg">PERBANDINGAN HAPUS RAGU</span>
       <h2 class="display-font font-bold mt-3 text-3xl sm:text-4xl text-slate-900">{{ $content['comparison_title'] ?? 'Kenapa Deposito Lebih Unggul?' }}</h2>
      </div>
      <p class="max-w-md text-sm leading-relaxed text-slate-600 font-normal">{{ $content['comparison_subtitle'] ?? 'Ringkasan kontras antara keputusan rasional investasi aman vs perjudian spekulatif.' }}</p>
     </div>

     <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-9">
      <!-- Card 1 -->
      <article class="bg-white rounded-2xl p-5 soft-card hover-lift shadow-sm flex flex-col justify-between">
       <div>
        <div class="w-10 h-10 rounded-xl bg-blue-100/80 text-blue-600 grid place-items-center mb-4">
         <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
        </div>
        <h3 class="font-bold text-base text-slate-900">Kepastian Hasil</h3>
        <p class="text-xs leading-relaxed text-slate-600 mt-2">Deposito memberi bunga pasti tercatat, judi slot menghabiskan saldo tanpa sisa.</p>
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
     </div>
    </div>
   </section>

   <!-- Nasihat Section -->
   <section id="nasihat" class="w-full bg-slate-950 py-16 lg:py-24 text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-5 relative">
     <div class="text-center max-w-2xl mx-auto">
      <span class="text-xs font-bold text-blue-400 uppercase tracking-[0.15em] px-3 py-1 bg-blue-900/40 rounded-lg border border-blue-700/50">NASIHAT FINANSIAL</span>
      <h2 class="display-font font-bold mt-3 text-3xl sm:text-4xl text-white">Pesan Penting Untuk Masa Depan</h2>
     </div>

     <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5 mt-12">
      <blockquote class="rounded-2xl p-6 border border-slate-800 bg-slate-900/80 hover-lift shadow-lg flex flex-col justify-between">
       <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-emerald-400"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2h-4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/></svg>
        <p class="font-semibold leading-relaxed mt-5 text-sm text-slate-200">{{ $content['quote_1'] ?? '"Tidak ada orang yang kaya dari judi online, tapi sudah tak terhitung berapa banyak yang hancur karenanya."' }}</p>
       </div>
       <p class="mt-6 pt-3 border-t border-slate-800 text-[11px] font-bold text-slate-400 uppercase tracking-wider">{{ $content['quote_1_author'] ?? '— Realita Finansial' }}</p>
      </blockquote>

      <blockquote class="rounded-2xl p-6 border border-slate-800 bg-slate-900/80 hover-lift shadow-lg flex flex-col justify-between">
       <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-amber-400"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2h-4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/></svg>
        <p class="font-semibold leading-relaxed mt-5 text-sm text-slate-200">{{ $content['quote_2'] ?? '"Uang yang Anda depositkan ke slot hari ini adalah modal masa depan yang Anda buang secara cuma-cuma."' }}</p>
       </div>
       <p class="mt-6 pt-3 border-t border-slate-800 text-[11px] font-bold text-slate-400 uppercase tracking-wider">{{ $content['quote_2_author'] ?? '— Pengingat Diri' }}</p>
      </blockquote>

      <blockquote class="rounded-2xl p-6 border border-slate-800 bg-slate-900/80 hover-lift shadow-lg flex flex-col justify-between">
       <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-blue-400"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2h-4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/></svg>
        <p class="font-semibold leading-relaxed mt-5 text-sm text-slate-200">{{ $content['quote_3'] ?? '"Deposito memberikan ketenangan pikiran. Anda tidur nyenyak, uang Anda tetap bekerja menumbuhkan nilai."' }}</p>
       </div>
       <p class="mt-6 pt-3 border-t border-slate-800 text-[11px] font-bold text-slate-400 uppercase tracking-wider">{{ $content['quote_3_author'] ?? '— Ketenangan Pikiran' }}</p>
      </blockquote>

      <blockquote class="rounded-2xl p-6 border border-slate-800 bg-slate-900/80 hover-lift shadow-lg flex flex-col justify-between">
       <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-teal-400"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2h-4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h3c0 4-2 6-4 6Z"/></svg>
        <p class="font-semibold leading-relaxed mt-5 text-sm text-slate-200">{{ $content['quote_4'] ?? '"Stop sekarang! Alihkan uang Anda ke tabungan rasional dan bangun masa depan yang lebih baik untuk keluarga."' }}</p>
       </div>
       <p class="mt-6 pt-3 border-t border-slate-800 text-[11px] font-bold text-slate-400 uppercase tracking-wider">{{ $content['quote_4_author'] ?? '— Seruan Perubahan' }}</p>
      </blockquote>
     </div>
    </div>
   </section>
  </main>
@endsection
