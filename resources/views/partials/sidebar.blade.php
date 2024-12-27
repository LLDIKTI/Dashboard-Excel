<aside id="sidebar" class="transition-all duration-300 w-64 bg-white/50 backdrop-blur-lg border border-gray p-3 sticky top-0 h-screen flex flex-col justify-between">
  <div>
    <!-- Tombol untuk minimize -->
    <button id="toggleSidebar" class="flex items-center mb-4 text-indigo-600 font-bold">
      <i id="sidebarIconToggle" class="fa-solid fa-bars fa-lg mr-2"></i>
      <span id="sidebarTitle" class="text-2xl">LLdikti<span class="text-indigo-500"> 8</span></span>
    </button>

    <!-- Navigasi -->
    <nav id="sidebarMenu" class="space-y-4">
      <a href="/" class="flex items-center p-2 text-slate-700 font-bold hover:bg-gray-700 hover:text-white rounded">
        <i class="fa-solid fa-house fa-lg mr-3 sidebar-icon"></i>
        <span class="sidebar-text">Dashboard</span>
      </a>
      <a href="/import-pddikti" class="flex items-center p-2 text-slate-700 font-bold hover:bg-gray-700 hover:text-white rounded">
        <i class="fa-solid fa-file-import fa-lg mr-3 sidebar-icon"></i>
        <span class="sidebar-text">Import Excel</span>
      </a>
      <a href="/import-history" class="flex items-center p-2 text-slate-700 font-bold hover:bg-gray-700 hover:text-white rounded">
        <i class="fa-solid fa-clock-rotate-left fa-lg mr-3 sidebar-icon"></i>
        <span class="sidebar-text">Riwayat Import</span>
      </a>
    </nav>
  </div>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="flex justify-between items-center p-2 bg-red-500 text-white font-bold hover:bg-gray-700 hover:text-white rounded w-full" type="submit">
      <i class="fa-solid fa-right-from-bracket fa-lg sidebar-icon"></i>
      <span class="sidebar-text">Logout</span>
    </button>
  </form>
</aside>