@extends('layouts.admin')

@section('title', 'Manajemen User')
@section('page-title', 'Manajemen Pengguna')
@section('page-subtitle', 'Kelola daftar pengguna terdaftar dan tambah akun user baru')

@section('admin-content')
 <div class="grid lg:grid-cols-3 gap-8">
  <!-- Add New User Form -->
  <div class="lg:col-span-1">
   <div class="card-admin p-6 sticky top-24">
    <h2 class="font-bold text-slate-900 text-base mb-1">Tambah User Baru</h2>
    <p class="text-xs text-slate-500 mb-5">Buatkan akun user baru agar klien/pengguna dapat mengakses simulator.</p>

    @if ($errors->any())
     <div class="mb-4 p-3 bg-rose-50 border border-rose-200 text-rose-700 text-xs rounded-xl space-y-1">
      @foreach ($errors->all() as $error)
       <p>&bull; {{ $error }}</p>
      @endforeach
     </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
     @csrf
     <div>
      <label for="name" class="block text-xs font-bold uppercase text-slate-600 mb-1.5">Nama Lengkap</label>
      <input id="name" name="name" type="text" value="{{ old('name') }}" required placeholder="Nama User" class="input-admin">
     </div>

     <div>
      <label for="email" class="block text-xs font-bold uppercase text-slate-600 mb-1.5">Email</label>
      <input id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="user@contoh.com" class="input-admin">
     </div>

     <div>
      <label for="password" class="block text-xs font-bold uppercase text-slate-600 mb-1.5">Password</label>
      <input id="password" name="password" type="password" required placeholder="Minimal 6 karakter" class="input-admin">
     </div>

     <button type="submit" class="btn-green w-full mt-2">
      + Tambah User
     </button>
    </form>
   </div>
  </div>

  <!-- Users List Table -->
  <div class="lg:col-span-2">
   <div class="card-admin overflow-hidden shadow-sm">
    <div class="p-5 border-b border-slate-200 flex items-center justify-between">
     <h2 class="font-bold text-slate-900 text-base">Daftar Pengguna Terdaftar</h2>
     <span class="text-xs bg-slate-100 text-slate-700 font-bold px-3 py-1 rounded-full">
      Total: {{ $users->total() }} User
     </span>
    </div>

    <div class="overflow-x-auto">
     <table class="w-full text-left text-sm">
      <thead class="bg-slate-50 text-slate-500 font-bold uppercase text-[11px] border-b border-slate-200">
       <tr>
        <th class="px-5 py-3">Nama</th>
        <th class="px-5 py-3">Email</th>
        <th class="px-5 py-3">Terdaftar</th>
        <th class="px-5 py-3 text-right">Aksi</th>
       </tr>
      </thead>
      <tbody class="divide-y divide-slate-200">
       @forelse ($users as $user)
        <tr class="hover:bg-slate-50/80 transition-colors">
         <td class="px-5 py-3.5 font-bold text-slate-900">{{ $user->name }}</td>
         <td class="px-5 py-3.5 text-slate-600">{{ $user->email }}</td>
         <td class="px-5 py-3.5 text-slate-500 text-xs">{{ $user->created_at->format('d M Y') }}</td>
         <td class="px-5 py-3.5 text-right">
          <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user {{ $user->name }}?');" class="inline-block">
           @csrf
           @method('DELETE')
           <button type="submit" class="btn-red">
            Hapus
           </button>
          </form>
         </td>
        </tr>
       @empty
        <tr>
         <td colspan="4" class="px-5 py-8 text-center text-slate-400">Belum ada user terdaftar.</td>
        </tr>
       @endforelse
      </tbody>
     </table>
    </div>

    @if ($users->hasPages())
     <div class="p-4 border-t border-slate-200">
      {{ $users->links() }}
     </div>
    @endif
   </div>
  </div>
 </div>
@endsection
