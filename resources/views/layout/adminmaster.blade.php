<!DOCTYPE html>
<html lang="en" data-theme="light">
    @include('partials.head')

<body class="dark:bg-neutral-800 bg-neutral-100 dark:text-white">

    <!-- ..::  header area start ::.. -->
    @include('partials.sidebar')
    <!-- ..::  header area end ::.. -->

    <main class="dashboard-main">

        <!-- ..::  navbar start ::.. -->
        @include('partials.navbar')
        <!-- ..::  navbar end ::.. -->

        <div class="dashboard-main-body">
            <!-- ..::  breadcrumb  start ::.. -->
            @include('partials.breadcrumb', ['title' => $title, 'subTitle' => $subTitle])
            <!-- ..::  breadcrumb end ::.. -->

            {{-- This is where page content will be injected --}}
            @yield('content')
        </div>

        <!-- ..::  footer  start ::.. -->
        @include('partials.footer')
        <!-- ..::  footer end ::.. -->

    </main>

    <!-- ..::  scripts  start ::.. -->
    @include('partials.script')
    <!-- ..::  scripts  end ::.. -->

    @yield('script')

        <!-- SweetAlert CSS & JS -->
<!-- Blade Template -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
  icon: 'success',
  title: 'Success!',
  text: '{{ session('success') }}',
});
</script>
@endif
</body>
</html>
