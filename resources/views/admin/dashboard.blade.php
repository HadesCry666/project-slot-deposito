@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Overview')
@section('page-subtitle', 'Ringkasan data pengguna dan status konten website')

@section('admin-content')
 <!-- Stats Cards Grid -->
 <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
  <div class="card-admin p-6 flex items-center gap-4">
   <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 grid place-items-center shrink-0">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
   </div>
   <div>
    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Total User Terdaftar</p>
    <p class="text-3xl font-bold text-slate-900 mt-1">{{ $totalUsers }}</p>
    <p class="text-xs text-slate-400 mt-0.5">Pengguna yang bisa mengakses simulator</p>
   </div>
  </div>

  <div class="card-admin p-6 flex items-center gap-4">
   <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 grid place-items-center shrink-0">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
   </div>
   <div>
    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Jumlah Admin</p>
    <p class="text-3xl font-bold text-slate-900 mt-1">{{ $totalAdmins }}</p>
    <p class="text-xs text-slate-400 mt-0.5">Pengelola konten & sistem</p>
   </div>
  </div>

  <div class="card-admin p-6 flex items-center gap-4">
   <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 grid place-items-center shrink-0">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>
   </div>
   <div>
    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Akses CMS Konten</p>
    <p class="text-base font-bold text-emerald-600 mt-1">Aktif & Ready</p>
    <a href="{{ route('admin.content.index') }}" class="text-xs font-semibold text-blue-600 hover:underline">Kelola Teks Website &rarr;</a>
   </div>
  </div>
 </div>

 <!-- Quick Action Cards -->
 <div class="grid lg:grid-cols-2 gap-6 mb-8">
  <div class="card-admin p-6">
   <div class="flex items-center justify-between mb-4">
    <h2 class="font-bold text-slate-900 text-base">Manajemen Konten Website (CMS)</h2>
    <span class="text-xs bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-full font-bold">100% Modifiable</span>
   </div>
   <p class="text-sm text-slate-600 leading-relaxed mb-4">
    Anda dapat mengubah judul hero, subjudul, teks perbandingan slot & deposito, poin keunggulan, serta kutipan nasihat langsung tanpa menyentuh kode program.
   </p>
   <a href="{{ route('admin.content.index') }}" class="btn-green inline-block no-underline">
    Buka Halaman CMS Konten
   </a>
  </div>

  <div class="card-admin p-6">
   <div class="flex items-center justify-between mb-4">
    <h2 class="font-bold text-slate-900 text-base">Kelola Pengguna & Hak Akses</h2>
    <span class="text-xs bg-blue-100 text-blue-700 px-2.5 py-1 rounded-full font-bold">User Management</span>
   </div>
   <p class="text-sm text-slate-600 leading-relaxed mb-4">
    Tambah akun user baru untuk klien Anda, atau hapus user yang tidak lagi membutuhkan akses ke simulator.
   </p>
   <a href="{{ route('admin.users.index') }}" class="btn-green inline-block no-underline">
    Kelola Pengguna
   </a>
  </div>
 </div>

 <!-- Recent Users Table -->
 <div class="card-admin overflow-hidden">
  <div class="p-5 border-b border-slate-200 flex items-center justify-between">
   <h3 class="font-bold text-slate-900 text-base">5 Pengguna Terbaru</h3>
   <a href="{{ route('admin.users.index') }}" class="text-xs font-bold text-blue-600 hover:underline">Lihat Semua User</a>
  </div>

  <div class="overflow-x-auto">
   <table class="w-full text-left text-sm">
    <thead class="bg-slate-50 text-slate-500 font-bold uppercase text-[11px] border-b border-slate-200">
     <tr>
      <th class="px-5 py-3">Nama</th>
      <th class="px-5 py-3">Email</th>
      <th class="px-5 py-3">Role</th>
      <th class="px-5 py-3">Tanggal Daftar</th>
     </tr>
    </thead>
    <tbody class="divide-y divide-slate-200">
     @forelse ($recentUsers as $user)
      <tr class="hover:bg-slate-50/80 transition-colors">
       <td class="px-5 py-3.5 font-bold text-slate-900">{{ $user->name }}</td>
       <td class="px-5 py-3.5 text-slate-600">{{ $user->email }}</td>
       <td class="px-5 py-3.5">
        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-700">User</span>
       </td>
       <td class="px-5 py-3.5 text-slate-500 text-xs">{{ $user->created_at->format('d M Y, H:i') }}</td>
      </tr>
     @empty
      <tr>
       <td colspan="4" class="px-5 py-6 text-center text-slate-400">Belum ada pengguna terdaftar.</td>
      </tr>
     @endforelse
    </tbody>
   </table>
  </div>
 </div>
@endsection
