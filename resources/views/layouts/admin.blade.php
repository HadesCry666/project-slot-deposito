<!doctype html>
<html lang="id">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin') — Slot atau Deposito?</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Fraunces:opsz,wght@9..144,700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
  <style>
    * { box-sizing: border-box; }
    body { font-family: 'DM Sans', system-ui, sans-serif; }
    .display-font { font-family: 'Fraunces', Georgia, serif; }
    .sidebar { background: #0f172a; border-right: 1px solid rgba(255,255,255,0.06); }
    .nav-item { transition: all 0.15s; border-radius: 0.75rem; }
    .nav-item:hover { background: rgba(255,255,255,0.06); }
    .nav-item.active { background: linear-gradient(135deg, rgba(16,185,129,0.2), rgba(13,148,136,0.15)); border: 1px solid rgba(16,185,129,0.25); color: #34d399; }
    .nav-item.active svg { color: #34d399; }
    .card-admin { background: #fff; border: 1px solid #e2e8f0; border-radius: 1rem; }
    .btn-green { background: linear-gradient(135deg, #10b981, #0d9488); color: white; border-radius: 0.75rem; padding: 0.6rem 1.25rem; font-weight: 700; font-size: 0.875rem; transition: all 0.2s; border: none; cursor: pointer; }
    .btn-green:hover { background: linear-gradient(135deg, #059669, #0f766e); transform: translateY(-1px); box-shadow: 0 6px 20px rgba(16,185,129,0.3); }
    .btn-red { background: linear-gradient(135deg, #ef4444, #dc2626); color: white; border-radius: 0.625rem; padding: 0.4rem 0.9rem; font-weight: 700; font-size: 0.75rem; transition: all 0.2s; border: none; cursor: pointer; }
    .btn-red:hover { background: linear-gradient(135deg, #dc2626, #b91c1c); }
    .input-admin { border: 1px solid #cbd5e1; border-radius: 0.625rem; padding: 0.6rem 0.875rem; font-size: 0.875rem; width: 100%; transition: border-color 0.2s, box-shadow 0.2s; }
    .input-admin:focus { border-color: #10b981; box-shadow: 0 0 0 3px rgba(16,185,129,0.12); outline: none; }
    .alert-success { background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; border-radius: 0.75rem; padding: 0.875rem 1rem; font-size: 0.875rem; }
    .alert-error { background: #fff1f2; border: 1px solid #fecaca; color: #991b1b; border-radius: 0.75rem; padding: 0.875rem 1rem; font-size: 0.875rem; }
    @media (max-width: 768px) {
      .sidebar { width: 100%; height: auto; position: static; }
      .admin-layout { flex-direction: column; }
    }
  </style>
 </head>
 <body class="bg-slate-100 min-h-screen">

  <div class="flex min-h-screen admin-layout">
   <!-- Sidebar -->
   <aside class="sidebar w-64 shrink-0 flex flex-col min-h-screen sticky top-0 h-screen overflow-y-auto">
    <!-- Logo -->
    <div class="p-5 border-b border-slate-800">
     <a href="{{ route('home') }}" class="flex items-center gap-3 no-underline">
      <span class="w-9 h-9 rounded-xl bg-gradient-to-tr from-blue-600 via-indigo-600 to-emerald-500 text-white grid place-items-center shadow-md shrink-0">
       <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h18"/></svg>
      </span>
      <div>
       <p class="text-white font-bold text-sm leading-none">Admin Panel</p>
       <p class="text-slate-500 text-[11px] mt-0.5">Slot atau Deposito?</p>
      </div>
     </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-4 space-y-1">
     <p class="text-[10px] font-bold text-slate-600 uppercase tracking-widest px-3 py-2">Menu Utama</p>

     <a href="{{ route('admin.dashboard') }}"
        class="nav-item flex items-center gap-3 px-3 py-2.5 text-sm font-semibold text-slate-400 no-underline {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
      Dashboard
     </a>

     <a href="{{ route('admin.content.index') }}"
        class="nav-item flex items-center gap-3 px-3 py-2.5 text-sm font-semibold text-slate-400 no-underline {{ request()->routeIs('admin.content.*') ? 'active' : '' }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>
      Edit Konten
     </a>

     <a href="{{ route('admin.users.index') }}"
        class="nav-item flex items-center gap-3 px-3 py-2.5 text-sm font-semibold text-slate-400 no-underline {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      Manajemen User
     </a>

     <div class="pt-3 mt-3 border-t border-slate-800">
      <p class="text-[10px] font-bold text-slate-600 uppercase tracking-widest px-3 py-2">Aksi</p>

      <a href="{{ route('home') }}" target="_blank"
         class="nav-item flex items-center gap-3 px-3 py-2.5 text-sm font-semibold text-slate-400 no-underline">
       <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
       Lihat Website
      </a>
     </div>
    </nav>

    <!-- User info & logout -->
    <div class="p-4 border-t border-slate-800">
     <div class="flex items-center gap-3 mb-3">
      <div class="w-9 h-9 rounded-xl bg-emerald-900 text-emerald-300 grid place-items-center font-bold text-sm shrink-0">
       {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
      </div>
      <div class="min-w-0">
       <p class="text-slate-200 text-sm font-semibold truncate">{{ auth()->user()->name }}</p>
       <p class="text-slate-500 text-[11px] truncate">{{ auth()->user()->email }}</p>
      </div>
     </div>
     <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="w-full flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-bold text-slate-400 bg-slate-800/60 hover:bg-slate-800 hover:text-rose-400 transition-all">
       <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
       Logout
      </button>
     </form>
    </div>
   </aside>

   <!-- Main Content -->
   <main class="flex-1 overflow-auto">
    <!-- Top bar -->
    <div class="bg-white border-b border-slate-200 px-7 py-4 flex items-center justify-between sticky top-0 z-10 shadow-sm">
     <div>
      <h1 class="font-bold text-slate-900 text-lg">@yield('page-title', 'Dashboard')</h1>
      <p class="text-slate-500 text-xs mt-0.5">@yield('page-subtitle', 'Panel administrasi Slot atau Deposito')</p>
     </div>
     <div class="flex items-center gap-2">
      <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold border border-emerald-200">
       Admin
      </span>
     </div>
    </div>

    <!-- Alerts -->
    <div class="px-7 pt-5">
     @if (session('success'))
      <div class="alert-success flex items-center gap-2 mb-5">
       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
       <span class="font-semibold">{{ session('success') }}</span>
      </div>
     @endif
     @if (session('error'))
      <div class="alert-error flex items-center gap-2 mb-5">
       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
       <span class="font-semibold">{{ session('error') }}</span>
      </div>
     @endif
    </div>

    <div class="px-7 pb-10">
     @yield('admin-content')
    </div>
   </main>
  </div>

 </body>
</html>
