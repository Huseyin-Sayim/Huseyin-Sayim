<script>
    ClassicEditor
            .create( document.querySelector( '#yazi' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>