<!doctype html>
<html lang="id">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Login') — Slot atau Deposito?</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Fraunces:opsz,wght@9..144,700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
  <style>
    body { font-family: 'DM Sans', system-ui, sans-serif; }
    .display-font { font-family: 'Fraunces', Georgia, serif; }
    .glass-auth {
      background: rgba(15, 23, 42, 0.75);
      backdrop-filter: blur(24px);
      border: 1px solid rgba(255,255,255,0.07);
    }
    .input-field {
      background: rgba(30, 41, 59, 0.8);
      border: 1px solid rgba(71, 85, 105, 0.7);
      color: #f1f5f9;
      transition: border-color 0.2s, box-shadow 0.2s;
    }
    .input-field:focus {
      border-color: #10b981;
      box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
      outline: none;
    }
    .input-field::placeholder { color: #64748b; }
    .btn-primary {
      background: linear-gradient(135deg, #10b981, #0d9488);
      transition: all 0.2s;
    }
    .btn-primary:hover {
      background: linear-gradient(135deg, #059669, #0f766e);
      transform: translateY(-1px);
      box-shadow: 0 8px 25px rgba(16, 185, 129, 0.35);
    }
    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(3deg); }
    }
    .orb { animation: float 6s ease-in-out infinite; }
  </style>
 </head>
 <body class="min-h-screen bg-slate-950 flex items-center justify-center p-4 relative overflow-hidden">

  <!-- Decorative background orbs -->
  <div class="absolute top-[-10%] right-[-5%] w-96 h-96 rounded-full bg-emerald-600/10 blur-3xl orb pointer-events-none"></div>
  <div class="absolute bottom-[-10%] left-[-5%] w-80 h-80 rounded-full bg-blue-600/10 blur-3xl pointer-events-none" style="animation: float 8s ease-in-out infinite reverse;"></div>

  <div class="w-full max-w-md relative z-10">
   <!-- Logo -->
   <div class="text-center mb-8">
    <a href="/" class="inline-flex items-center gap-3 no-underline">
     <span class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-blue-600 via-indigo-600 to-emerald-500 text-white grid place-items-center shadow-lg shadow-blue-500/30">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h18"/></svg>
     </span>
     <div class="text-left">
      <p class="display-font font-bold text-xl text-white leading-none">Slot atau Deposito?</p>
      <p class="text-xs text-slate-400 mt-0.5">Simulasi Literasi Keuangan</p>
     </div>
    </a>
   </div>

   <!-- Card -->
   <div class="glass-auth rounded-3xl p-8 shadow-2xl">
    @yield('auth-content')
   </div>
  </div>

 </body>
</html>
