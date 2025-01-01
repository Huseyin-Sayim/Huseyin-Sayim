<script>
    ClassicEditor
            .create( document.querySelector( '#inceleme' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>