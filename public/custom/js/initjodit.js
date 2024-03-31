// Initialize Jodit Editor
const newArticle = document.getElementById('new-article');
let JoditEditor;
if (newArticle) {
    JoditEditor = Jodit.make("#new-article", {
        "uploader": {
            "insertImageAsBase64URI": true
        },
        "placeholder": "Type your article here...",
        "height": "700px",
    })
}

const smallEditors = document.querySelectorAll("[data-editor=\"true\"]")

smallEditors.forEach(editor => {
    ClassicEditor
        .create(editor)
        .then(editor => {
            editor.editing.view.change(writer => {
                writer.setStyle('min-height', '300px', editor.editing.view.document.getRoot());
            })
        })
        .catch(error => {
            console.error(error);
        });
})
