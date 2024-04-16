
<script>
	//message with toastr
    @if(session()->has('success'))

    alert('{{ session('success') }}');
        

    @elseif(session()->has('error'))

     alert('{{ session('error') }}')
            
    @endif
</script>
