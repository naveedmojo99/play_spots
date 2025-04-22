@if(session('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('success-alert');
            if (alert) alert.style.display = 'none';
        }, 3000); // 3000ms = 3 seconds
    </script>
@endif
