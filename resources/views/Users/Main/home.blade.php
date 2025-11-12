{{-- <div>
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
</div> --}}
@include('users.template.header')
    <main class="pt-20 min-h-screen mx-auto">
        @include('users.template.hero')
        @include('users.template.linecatalog')
        @include('users.template.AboutHome')
    </main>
@include('users.template.footer')