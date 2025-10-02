<!DOCTYPE html>
<html lang="en" data-theme="light">

@yield('partials/head')

<body class="dark:bg-neutral-800 bg-neutral-100 dark:text-white">

    <!-- ..::  header area start ::.. -->
    @yield('partials/sidebar') 
    <!-- ..::  header area end ::.. -->

    <main class="dashboard-main">

        <!-- ..::  navbar start ::.. -->
       @yield('partials/navbar')
        <!-- ..::  navbar end ::.. -->
        <div class="dashboard-main-body">
            
            <!-- ..::  breadcrumb  start ::.. -->
            @yield('partials/breadcrumb') 
            <!-- ..::  header area end ::.. -->

            @yield('content') 
        
        </div>
        <!-- ..::  footer  start ::.. -->
        @yiled('partials/footer') 
        <!-- ..::  footer area end ::.. -->

    </main>

    <!-- ..::  scripts  start ::.. -->

    @yield('partials/script')
    
    <!-- ..::  scripts  end ::.. -->

    @yiled('script') 
</body>

</html>