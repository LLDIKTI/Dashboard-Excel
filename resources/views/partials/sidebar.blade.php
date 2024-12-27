<aside class="w-64 bg-white/50 backdrop-blur-lg border border-gray p-6  sticky top-0 h-screen d-flex justify-between flex-col">
  <div>
    <div class="text-Indigo-600 font-bold text-2xl mb-8">LLdikti<span class="text-indigo-500"> 8</span></div>
    <nav class="space-y-4">
      <a href="/" class="flex items-center p-2 text-slate-700 font-bold hover:bg-gray-700 hover:text-white rounded">
        <i class="fa-solid fa-house mr-3 fa-lg"></i> Dashboard
      </a>
      <a href="/import-pddikti" class="flex items-center p-2 text-slate-700 font-bold hover:bg-gray-700 hover:text-white rounded">
        <i class="fa-solid fa-file-import fa-xl mr-3"></i>Import Excel
      </a>
      <a href="/import-history" class="flex items-center p-2 text-slate-700 font-bold hover:bg-gray-700 hover:text-white rounded">
        <i class="fa-solid fa-clock-rotate-left fa-xl mr-3"></i> Riwayat Import
      </a>
    </nav>
  </div>

  <form method="POST" action="{{ route('logout') }}" class="d-flex  gap-3 justify-between align-items-center">
    @csrf
    <i class="fa-solid fa-right-from-bracket fa-xl"></i>
    <button class="flex items-center p-2 bg-red-500 text-white text-center font-bold hover:bg-gray-700 hover:text-white rounded w-full" type="submit">Logout</button>
  </form>
</aside>