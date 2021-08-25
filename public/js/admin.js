function tinymce_init_callback(editor){
    editor.settings.paste_as_text = true;
    var editor_id  = "richtextbox";
    editor.execCommand('mceRemoveEditor',true, editor_id);
    editor.execCommand('mceAddEditor',true, editor_id);
    // editor.EditorManager.editors = [];
    // editor.init(editor.settings);
    console.log(editor);
}