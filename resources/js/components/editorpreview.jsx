import "@blocknote/core/fonts/inter.css";
import { BlockNoteView, useCreateBlockNote } from "@blocknote/react";
import "@blocknote/react/style.css";
import "../css/style.css";

const EditorPreview = ({ contents }) => {
    const editor = useCreateBlockNote({
        initialContent: JSON.parse(contents),
    });

    return <BlockNoteView editor={editor} editable={false} />;
};

export default EditorPreview;
