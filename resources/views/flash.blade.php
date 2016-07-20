@if (session()->has('flash_message'))
    <script>
      swal({
        title: '{{ session('flash_message.title') }}',
        text: '{{ session('flash_message.message') }}',
        type: '{{ session('flash_message.level') }}',
        allowOutsideClick: true,
        timer: 2000,
        showConfirmButton: false,
      });
    </script>
@elseif (session()->has('flash_message_overlay'))
    <script>
      swal({
        title: '{{ session('flash_message_overlay.title') }}',
        text: '{{ session('flash_message_overlay.message') }}',
        type: '{{ session('flash_message_overlay.level') }}',
        allowOutsideClick: true,
        confirmButtonText: 'Okay',
      });
    </script>
@endif