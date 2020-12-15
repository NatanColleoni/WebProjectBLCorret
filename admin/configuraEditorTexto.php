<script type="text/javascript" src="<?=$pathSite?>admin/library/tinymce/tinymce.min.js"></script>
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        tinymce.init({
            language: "pt_BR",
            selector: ".tinymce",
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor fontsizeselect emoticons",
            max_chars: $(".tinymce.limit").attr("maxlength"), // max. allowed chars

            setup: function (ed) {
                if (this.settings.max_chars) {
                    var allowedKeys = [8, 13, 16, 17, 18, 20, 33, 34, 35, 36, 37, 38, 39, 40, 46];
                    ed.on("keydown", function (e) {
                        if (allowedKeys.indexOf(e.keyCode) != -1) return true;
                        if (tinymce_getContentLength() + 1 > this.settings.max_chars) {
                            e.preventDefault();
                            e.stopPropagation();
                            return false;
                        }
                        return true;
                    });

                    ed.on("keyup", function (e) {
                        tinymce_updateCharCounter(this, tinymce_getContentLength());
                    });
                }
            },

            init_instance_callback: function () { // initialize counter div
                var editor = tinymce.get(tinymce.activeEditor.id);
                if (editor.settings.max_chars) {
                    $("#" + this.id).prev().append('<div class="char_count" style="text-align:right">Maxímo de Characteres:&ensp;</div>');
                    tinymce_updateCharCounter(this, tinymce_getContentLength());
                }
            },

            paste_preprocess: function (plugin, args) {
                var editor = tinymce.get(tinymce.activeEditor.id);
                var len = editor.contentDocument.body.innerText.length;
                if (editor.settings.max_chars) {
                    if (len + args.content.length > editor.settings.max_chars) {
                        swal("Ops" , "Colando isto, excede o número máximo permitido de " + editor.settings.max_chars, "error");
                        args.content = '';
                    }
                    tinymce_updateCharCounter(editor, len + args.content.length);
                }
            }
        });

        tinymce.init({
            language: "pt_BR",
            selector: ".tiny-title",
            menubar: false,
            toolbar: 'undo redo | bold italic'
        });
    });

    function tinymce_updateCharCounter(el, len) {
        $("#" + el.id).prev().find(".char_count").text("Maxímo de Characteres: " + len + "/" + el.settings.max_chars);
    }

    function tinymce_getContentLength() {
        return tinymce.get(tinymce.activeEditor.id).contentDocument.body.innerText.length;
    }
</script>