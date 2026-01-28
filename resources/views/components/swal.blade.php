@if(session('swal'))
    <script>console.log("SWAL COMPONENT EJECUTADO")</script>

    <script>
        Swal.fire(@json(session('swal')));
    </script>
@endif