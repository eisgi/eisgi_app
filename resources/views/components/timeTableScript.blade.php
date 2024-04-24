 <script src="{{ asset('style/emploi/js/modernizr.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script>
        var jqueryUrl = "{{ asset('style/emploi/js/main.js') }}";
        if (!window.jQuery) document.write('<script src="' + jqueryUrl + '"><\/script>');
    </script>

    <script src="{{ asset('style/emploi/js/main.js') }}"></script>