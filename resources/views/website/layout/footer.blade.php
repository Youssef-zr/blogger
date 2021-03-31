        <footer class="container">
            <section class="footer bg-primary pt-5 pb-3 px-2 mt-5 mb-1 text-center">
                <div class="logo mx-auto">
                    <img src="{{url('/assets/img/logo-lg.png')}}" alt="logo" >
                </div>
                <p class="text-white mt-3">
                    البوابة الاخبارية القريبة منكم<br>
                    جميع الحقوق محفوظة لأخبار اليوم &copy; 2021
                </p>
            </section>
        </footer>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
        <script src="{{url('/assets/js/main.js')}}"></script>
        
        {{-- javascript links --}}
        @yield('js')
    </body>
</html>