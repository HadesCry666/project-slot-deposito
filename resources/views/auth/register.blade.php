@extends('layouts.auth')

@section('title', 'Daftar')

@section('auth-content')
 <h1 class="display-font text-2xl font-bold text-white mb-1">Buat Akun Baru</h1>
 <p class="text-slate-400 text-sm mb-7">Daftar gratis untuk mengakses simulator finansial.</p>

 @if ($errors->any())
  <div class="mb-5 rounded-xl bg-rose-950/80 border border-rose-700/60 p-3.5 text-sm text-rose-300">
   <div class="flex items-center gap-2 font-semibold mb-1">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
    Pendaftaran Gagal
   </div>
   <ul class="space-y-0.5 list-disc list-inside">
    @foreach ($errors->all() as $error)
     <li>{{ $error }}</li>
    @endforeach
   </ul>
  </div>
 @endif

 <form action="{{ route('register.post') }}" method="POST" class="space-y-5">
  @csrf

  <div>
   <label for="name" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Nama Lengkap</label>
   <input
    id="name" name="name" type="text" autocomplete="name"
    value="{{ old('name') }}" required
    placeholder="Nama Anda"
    class="input-field w-full rounded-xl px-4 py-3.5 text-sm font-medium"
   >
  </div>

  <div>
   <label for="email" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Email</label>
   <input
    id="email" name="email" type="email" autocomplete="email"
    value="{{ old('email') }}" required
    placeholder="email@contoh.com"
    class="input-field w-full rounded-xl px-4 py-3.5 text-sm font-medium"
   >
  </div>

  <div>
   <label for="password" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Password</label>
   <input
    id="password" name="password" type="password" autocomplete="new-password"
    required
    placeholder="Minimal 6 karakter"
    class="input-field w-full rounded-xl px-4 py-3.5 text-sm font-medium"
   >
  </div>

  <div>
   <label for="password_confirmation" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Konfirmasi Password</label>
   <input
    id="password_confirmation" name="password_confirmation" type="password"
    required
    placeholder="Ulangi password"
    class="input-field w-full rounded-xl px-4 py-3.5 text-sm font-medium"
   >
  </div>

  <button type="submit" class="btn-primary w-full rounded-xl py-3.5 text-white font-bold text-sm flex items-center justify-center gap-2 shadow-lg shadow-emerald-500/20">
   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
   Daftar Sekarang
  </button>
 </form>

 <p class="text-center text-sm text-slate-500 mt-6">
  Sudah punya akun?
  <a href="{{ route('login') }}" class="text-emerald-400 font-semibold hover:text-emerald-300 transition-colors">Masuk di sini</a>
 </p>

 <div class="mt-6 pt-5 border-t border-slate-800">
  <a href="{{ route('home') }}" class="flex items-center justify-center gap-2 text-sm text-slate-500 hover:text-slate-300 transition-colors">
   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"/></svg>
   Kembali ke Beranda
  </a>
 </div>
@endsection
