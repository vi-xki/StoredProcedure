<!DOCTYPE html>
<html>
<head>
    <title>WYSIWYG Editor</title>
    <!-- Include Quill.js -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        
        .editor-container {
            max-width: 900px;
            margin: 40px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 25px;
        }
        
        #editor {
            border: 1px solid #ddd;
            min-height: 200px;
        }
        
        .ql-toolbar.ql-snow {
            border: 1px solid #ddd;
            border-bottom: none;
            padding: 8px;
            background-color: #fafafa;
        }
        
        button[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
        }
        
        /* Hide default icons and use a cleaner design */
        .ql-snow .ql-formats {
            margin-right: 12px;
        }
        /* Add this to your style section to make it closer to your example */
.ql-toolbar.ql-snow {
    background-color: #fff;
    border-bottom: 1px solid #e3e3e3;
    padding: 8px 0;
    display: flex;
    flex-wrap: wrap;
}

.ql-toolbar.ql-snow .ql-formats {
    display: flex;
    align-items: center;
    margin-right: 15px;
}

.ql-toolbar button {
    width: 28px;
    height: 28px;
    padding: 3px;
}

.ql-editor {
    padding: 12px 15px;
    min-height: 150px;
}

.ql-editor::before {
    color: #ccc;
    content: attr(data-placeholder);
    font-style: italic;
    pointer-events: none;
    position: absolute;
}

/* Add a separator between tool groups */
.ql-formats:not(:last-child):after {
    content: "";
    display: inline-block;
    width: 1px;
    height: 24px;
    background: #e3e3e3;
    margin-left: 15px;
}
    </style>
</head>
<body>
    <div class="editor-container">
        <form method="post" action="<?php echo site_url('Orders/save_content'); ?>">
            <!-- Create the editor container -->
            <div id="editor"></div>
            <input type="hidden" name="content" id="hidden-content">
            <button type="submit" onclick="updateHiddenField()">Save Content</button>
        </form>
    </div>
    
    <script>
        // Initialize Quill editor
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],
            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            ['link', 'image', 'video'],                       // media
            ['clean'],                                         // remove formatting button
            ['code']                                           // HTML/source code view
        ];
        
        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
        
        function updateHiddenField() {
            document.getElementById('hidden-content').value = quill.root.innerHTML;
        }
    </script>
</body>
</html>