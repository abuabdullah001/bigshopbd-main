<script src="{{ asset('backend/assets/ckeditor5/build/ckeditor.js') }}"></script>
<script type="text/javascript">
    document.querySelectorAll('.editor').forEach(function(editorElement) {
        ClassicEditor
        .create(editorElement)
        .catch(error => {
            console.error(error);
        });
    });
</script>