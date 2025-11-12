{{-- <div>
    <!-- It always seems impossible until it is done. - Nelson Mandela -->
</div> --}}
@include('admin.template.header')
@include('admin.template.aside')

<main class="flex-1 ml-0 md:ml-64 py-25 px-18 bg-gray-800 min-h-screen text-white ">
    @include('admin.template.dashboardwarn')
    <h1 class="text-2xl font-bold">Konten Admin</h1>
    <p>Ini konten yang tampil di kanan sidebar.</p>
  </main>

@include('admin.template.footer')

