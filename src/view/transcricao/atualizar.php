<head><title>Transcricao - Memorial Digital</title></head>

<?php require __DIR__ . "/../share/head.php"; ?>


<link rel="stylesheet" href="/librares/trumbowyg/ui/trumbowyg.min.css">
<link rel="stylesheet" href="/librares/trumbowyg/plugins/emoji/ui/trumbowyg.emoji.min.css">
<link rel="stylesheet" href="/librares/trumbowyg/plugins/colors/ui/trumbowyg.colors.min.css">
<link rel="stylesheet" href="/librares/css/view/transcricao.css">

<h2 >Atualize o Documento</h2>

<form action="/transcricao/update?id=<?php echo $listarDocumentos->id; ?>" method="POST">
<div class="form-floating">
    <input class="form-control" type="text" name="titulo" placeholder="Titulo" value="<?php echo $listarDocumentos->titulo; ?>"><br><br>
    <label for="floatingInput">Titulo</label>
</div>

    <textarea name="transcricao" id="trumbowyg-editor" rows="5"><?php echo $listarDocumentos->documento; ?></textarea><br><br>

    <button type="submit" class="btn btn-dark" style="width: 100%;">Atualizar</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="/librares/trumbowyg/trumbowyg.min.js"></script>

<script type="text/javascript" src="/librares/trumbowyg/langs/pt_br.min.js"></script>

<script src="/librares/trumbowyg/plugins/emoji/trumbowyg.emoji.min.js"></script>

<script src="/librares/trumbowyg/plugins/fontsize/trumbowyg.fontsize.min.js"></script>

<script src="/librares/trumbowyg/plugins/allowtagsfrompaste/trumbowyg.allowtagsfrompaste.min.js"></script>

<script src="/librares/trumbowyg/plugins/fontfamily/trumbowyg.fontfamily.min.js"></script>

<script src="/librares/trumbowyg/plugins/allowtagsfrompaste/trumbowyg.allowtagsfrompaste.min.js"></script>

<script src="/librares/trumbowyg/plugins/base64/trumbowyg.base64.min.js"></script>

<script src="//rawcdn.githack.com/RickStrahl/jquery-resizable/0.35/dist/jquery-resizable.min.js"></script>
<!-- Import Trumbowyg plugins... -->
<script src="/librares/trumbowyg/plugins/resizimg/trumbowyg.resizimg.min.js"></script>

<script src="/librares/trumbowyg/plugins/colors/trumbowyg.colors.min.js"></script>

<script src="/librares/trumbowyg/plugins/pasteimage/trumbowyg.pasteimage.min.js"></script>

<script src="/librares/trumbowyg/plugins/pasteembed/trumbowyg.pasteembed.min.js"></script>

<script src="/librares/trumbowyg/plugins/lineheight/trumbowyg.lineheight.min.js"></script>

<script src="/librares/trumbowyg/plugins/indent/trumbowyg.indent.min.js"></script>

<script src="/librares/trumbowyg/plugins/cleanpaste/trumbowyg.cleanpaste.min.js"></script>

<script>
    $('#trumbowyg-editor').trumbowyg({
    lang: 'pt_br',
    btns: [
        ['viewHTML'],
        ['undo', 'redo'], // Only supported in Blink browsers
        ['formatting'],
        ['fontsize'],
        ['fontfamily'],
        ['strong', 'em', 'del'],
        ['foreColor', 'backColor'],
        ['superscript', 'subscript'],
        ['link'],
       // ['insertImage'],
        ['base64'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['indent', 'outdent'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
       // ['fullscreen'],
       // ['emoji'],
        ['lineheight']
        
    ],
    plugins: {
        allowTagsFromPaste: {
            allowedTags: [
                'a',
            'abbr',
            'address',
            'b',
            'bdi',
            'bdo',
            'blockquote',
            'br',
            'cite',
            'code',
            'del',
            'dfn',
            'details',
            'em',
            'h1',
            'h2',
            'h3',
            'h4',
            'h5',
            'h6',
            'hr',
            'i',
            'ins',
            'kbd',
            'mark',
            'meter',
            'pre',
            'progress',
            'q',
            'rp',
            'rt',
            'ruby',
            's',
            'samp',
            'small',
            'span',
            'strong',
            'sub',
            'summary',
            'sup',
            'time',
            'u',
            'var',
            'wbr',
            'img',
            'map',
            'area',
            'canvas',
            'figcaption',
            'figure',
            'picture',
            'audio',
            'source',
            'track',
            'video',
            'ul',
            'ol',
            'li',
            'dl',
            'dt',
            'dd',
            'table',
            'caption',
            'th',
            'tr',
            'td',
            'thead',
            'tbody',
            'tfoot',
            'col',
            'colgroup',
            'style',
            'div',
            'p',
            'form',
            'input',
            'textarea',
            'button',
            'select',
            'optgroup',
            'option',
            'label',
            'fieldset',
            'legend',
            'datalist',
            'keygen',
            'output',
            'iframe',
            'link',
            'nav',
            'header',
            'hgroup',
            'footer',
            'main',
            'section',
            'article',
            'aside',
            'dialog',
            'script',
            'noscript',
            'embed',
            'object',
            'param'
            ]
        },
        resizimg: {
            minSize: 64,
            step: 16,
        }
    },
    autogrow: true
});
</script>

<?php require __DIR__ . "/../share/footer.php"; ?>